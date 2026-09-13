<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect user đến trang xác thực Google.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Xử lý callback từ Google sau khi user xác thực.
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('status', 'Không thể đăng nhập bằng Google. Vui lòng thử lại.');
        }

        // Tìm user theo google_id trước
        $user = User::where('google_id', $googleUser->getId())->first();

        if (!$user) {
            // Nếu chưa có google_id, kiểm tra email đã tồn tại chưa
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Liên kết tài khoản hiện tại với Google
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]);
            } else {
                // Tạo tài khoản hoàn toàn mới
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'email_verified_at' => now(),
                    'password' => null,
                ]);
            }
        } else {
            // Cập nhật avatar mới nhất từ Google
            $user->update([
                'avatar' => $googleUser->getAvatar(),
            ]);
        }

        Auth::login($user, remember: true);

        // Admin → dashboard, customer → trang chủ
        $destination = $user->isAdmin()
            ? route('dashboard', absolute: false)
            : route('home', absolute: false);

        return redirect()->intended($destination);
    }
}
