# TypeLab 📘

Dự án **TypeLab** được xây dựng trên nền tảng **Laravel 13** (PHP) kết hợp với **Vite** và **Tailwind CSS** cho phần frontend. Đây là một ứng dụng web full-stack với database SQLite mặc định.

---

## 🛠️ Tech Stack

| Công nghệ | Phiên bản | Mục đích |
|---|---|---|
| PHP | ^8.3 | Ngôn ngữ backend chính |
| Laravel | ^13.8 | PHP Framework |
| Vite | ^8.0.0 | Build tool cho frontend |
| Tailwind CSS | ^4.0.0 | CSS Framework |
| MySQL | 3306 | Cơ sở dữ liệu chính |
| Laragon | — | Môi trường phát triển local |

---

## 🚀 Cách chạy dự án

```bash
# 1. Cài đặt PHP dependencies
composer install

# 2. Tạo file môi trường
cp .env.example .env
php artisan key:generate

# 3. Tạo database và chạy migration
php artisan migrate

# 4. Cài đặt Node dependencies
npm install

# 5. Chạy toàn bộ dự án (server + queue + log + vite)
composer run dev
```

> Hoặc có thể dùng lệnh setup tự động: `composer run setup`

---

## 📁 Cấu trúc thư mục & Chức năng từng file

### 📌 File gốc (Root)

| File | Chức năng & Công dụng |
|---|---|
| `.env` | **Biến môi trường thực tế** — Chứa các thông tin nhạy cảm như APP_KEY, thông tin kết nối database, cấu hình mail, Redis,... File này **KHÔNG được** đẩy lên GitHub (đã có trong `.gitignore`). |
| `.env.example` | **Template môi trường mẫu** — Bản sao của `.env` nhưng đã xóa hết các giá trị nhạy cảm. Dùng để người dùng mới clone dự án biết cần cấu hình những biến nào. |
| `.editorconfig` | **Cấu hình Editor** — Đảm bảo tất cả thành viên trong team dùng cùng kiểu indent (tab/space), charset (UTF-8), và line endings khi code, bất kể IDE họ dùng. |
| `.gitattributes` | **Cấu hình Git attributes** — Quy định cách Git xử lý từng loại file (ví dụ: chuẩn hóa line endings khi commit để tránh xung đột giữa Windows/Linux/macOS). |
| `.gitignore` | **Danh sách file bỏ qua Git** — Liệt kê các file/thư mục sẽ KHÔNG được track bởi Git: `.env`, `node_modules/`, `vendor/`, `public/build/`, log files,... |
| `.npmrc` | **Cấu hình npm** — Thiết lập tùy chọn cho npm, ví dụ như registry nguồn, cấu hình package khi cài đặt. |
| `artisan` | **Công cụ dòng lệnh của Laravel** — File PHP thực thi để chạy các lệnh Artisan (`php artisan migrate`, `php artisan serve`, `php artisan make:controller`,...). Đây là "cây dao đa năng" của Laravel. |
| `composer.json` | **Quản lý PHP dependencies** — Khai báo các thư viện PHP cần dùng (Laravel framework, Tinker,...), các lệnh script (`dev`, `setup`, `test`), cấu hình autoload PSR-4. |
| `composer.lock` | **Khóa phiên bản PHP dependencies** — Ghi lại chính xác phiên bản của từng package PHP đã được cài đặt để đảm bảo tất cả môi trường cài cùng một phiên bản. Nên commit file này lên Git. |
| `package.json` | **Quản lý Node.js dependencies** — Khai báo các thư viện JS cần dùng (`vite`, `tailwindcss`, `laravel-vite-plugin`,...) và các script npm (`dev`, `build`). |
| `phpunit.xml` | **Cấu hình PHPUnit** — Cấu hình bộ test runner PHPUnit: chỉ định thư mục chứa test, thiết lập môi trường test (dùng database in-memory), các coverage options. |
| `vite.config.js` | **Cấu hình Vite** — Cấu hình build tool frontend: xác định file đầu vào (`resources/css/app.css`, `resources/js/app.js`), tích hợp Tailwind CSS plugin, tích hợp Bunny Fonts (`Instrument Sans`), và bật hot-reload khi phát triển. |
| `README.md` | **Tài liệu dự án** (file này) — Mô tả tổng quan dự án, cách cài đặt, và chức năng của từng file/thư mục. |

---

### 📁 `app/` — Logic ứng dụng chính

#### `app/Http/Controllers/`

| File | Chức năng & Công dụng |
|---|---|
| `Controller.php` | **Base Controller (abstract)** — Lớp controller gốc mà tất cả các controller khác trong dự án sẽ kế thừa. Hiện tại để trống, nhưng bạn có thể thêm các method dùng chung ở đây (ví dụ: xử lý response chuẩn, middleware mặc định). |

#### `app/Models/`

| File | Chức năng & Công dụng |
|---|---|
| `User.php` | **Model người dùng** — Đại diện cho bảng `users` trong database. Xác định các trường có thể điền dữ liệu (`name`, `email`, `password`), các trường ẩn khi serialize ra JSON (`password`, `remember_token`), và cách cast dữ liệu (`password` → tự động hash, `email_verified_at` → datetime). |

#### `app/Providers/`

| File | Chức năng & Công dụng |
|---|---|
| `AppServiceProvider.php` | **Service Provider chính** — Nơi đăng ký (register) các service vào IoC Container và khởi động (boot) các tính năng toàn ứng dụng khi Laravel khởi động. Hiện tại để trống, nhưng đây là nơi bạn sẽ thêm các cấu hình custom (ví dụ: đăng ký macros, observers, bindings). |

---

### 📁 `bootstrap/` — Khởi động ứng dụng

| File | Chức năng & Công dụng |
|---|---|
| `app.php` | **Điểm khởi tạo ứng dụng Laravel** — File quan trọng nhất, nơi ứng dụng Laravel được tạo ra và cấu hình: khai báo file route (`web.php`, `console.php`), đăng ký middleware, xử lý exceptions (trả về JSON cho các route API), và endpoint health check `/up`. |
| `providers.php` | **Danh sách Service Providers** — Liệt kê các Service Provider sẽ được Laravel load khi khởi động (được tự động tạo/cập nhật bởi Laravel). |
| `cache/` | **Cache của Bootstrap** — Thư mục chứa các file cache được tạo ra bởi các lệnh `php artisan config:cache`, `php artisan route:cache` để tăng tốc độ load ứng dụng. |

---

### 📁 `config/` — File cấu hình

| File | Chức năng & Công dụng |
|---|---|
| `app.php` | **Cấu hình ứng dụng** — Các thiết lập chung: tên app, môi trường (local/production), múi giờ, ngôn ngữ, locale, providers được load. |
| `auth.php` | **Cấu hình xác thực** — Định nghĩa guards (cách xác thực người dùng, mặc định là `session`) và providers (nguồn lấy thông tin user, mặc định là `users` model). |
| `cache.php` | **Cấu hình Cache** — Xác định driver cache mặc định (database, redis, file,...), thời gian tồn tại cache, và cấu hình từng driver. |
| `database.php` | **Cấu hình Database** — Khai báo các kết nối database được hỗ trợ (SQLite, MySQL, PostgreSQL, SQL Server) và cấu hình chi tiết cho từng loại. Mặc định dùng SQLite. |
| `filesystems.php` | **Cấu hình hệ thống file** — Cấu hình các "disk" lưu trữ (local, public, s3) để upload/download file. |
| `logging.php` | **Cấu hình Logging** — Xác định cách ghi log (channel: stack, single, daily, slack,...), mức độ log (debug, info, error,...). |
| `mail.php` | **Cấu hình Email** — Thiết lập driver gửi mail (smtp, sendmail, log,...), thông tin SMTP host/port/username/password, địa chỉ gửi mặc định. |
| `queue.php` | **Cấu hình Queue (hàng đợi)** — Xác định driver xử lý job hàng đợi (database, redis, sqs,...), cấu hình retry, timeout cho từng loại queue connection. |
| `services.php` | **Cấu hình bên thứ ba** — Nơi lưu API keys và cấu hình của các dịch vụ ngoài (Mailgun, Postmark, AWS SES,...). |
| `session.php` | **Cấu hình Session** — Thiết lập cách lưu trữ session người dùng (database, file, cookie, redis,...), thời gian hết hạn session, bảo mật cookie. |

---

### 📁 `database/` — Cơ sở dữ liệu

| File/Thư mục | Chức năng & Công dụng |
|---|---|
| `database.sqlite` | **File database SQLite** — File database thực tế của ứng dụng khi dùng driver SQLite. Toàn bộ dữ liệu (users, sessions, cache, jobs,...) được lưu trong file nhị phân này. |
| `migrations/0001_01_01_000000_create_users_table.php` | **Migration tạo bảng users** — Tạo bảng `users` (id, name, email, email_verified_at, password, remember_token, timestamps) và bảng `password_reset_tokens` cho chức năng quên mật khẩu. |
| `migrations/0001_01_01_000001_create_cache_table.php` | **Migration tạo bảng cache** — Tạo bảng `cache` và `cache_locks` trong database để lưu trữ cache khi dùng driver `database`. |
| `migrations/0001_01_01_000002_create_jobs_table.php` | **Migration tạo bảng queue** — Tạo bảng `jobs`, `job_batches`, và `failed_jobs` để Laravel có thể lưu và quản lý các job hàng đợi trong database. |
| `factories/UserFactory.php` | **Factory tạo dữ liệu giả User** — Dùng thư viện Faker để sinh ra dữ liệu người dùng ngẫu nhiên (tên, email, password) phục vụ việc test và seeding database trong quá trình phát triển. |
| `seeders/DatabaseSeeder.php` | **Seeder database** — Tự động điền dữ liệu mẫu vào database khi chạy `php artisan db:seed`. Hiện tại tạo 1 user mặc định: `test@example.com`. |

---

### 📁 `public/` — Thư mục công khai (Web Root)

| File | Chức năng & Công dụng |
|---|---|
| `index.php` | **Điểm vào duy nhất của ứng dụng (Entry Point)** — Tất cả HTTP request đều đi qua file này. Nó load autoloader của Composer và khởi động Laravel framework. Web server (Apache/Nginx) phải trỏ document root vào thư mục này. |
| `.htaccess` | **Cấu hình Apache** — Cấu hình URL rewriting cho Apache: chuyển hướng tất cả request về `index.php` để Laravel xử lý, bật HTTPS redirect, và các bảo mật cơ bản. |
| `robots.txt` | **Hướng dẫn cho Search Engine Crawlers** — Nói với các bot của Google, Bing,... trang nào được phép và không được phép index. |
| `favicon.ico` | **Icon tab trình duyệt** — Icon nhỏ hiển thị trên tab trình duyệt khi người dùng truy cập website. |

---

### 📁 `resources/` — Tài nguyên Frontend

| File | Chức năng & Công dụng |
|---|---|
| `css/app.css` | **File CSS gốc** — Điểm vào CSS chính của Tailwind CSS. Chứa các `@import` của Tailwind và có thể thêm CSS tùy chỉnh toàn cục tại đây. |
| `js/app.js` | **File JavaScript gốc** — Điểm vào JS chính của ứng dụng. Nơi import các thư viện JS và khởi tạo các component phía client. |
| `views/welcome.blade.php` | **Trang chủ (Landing Page)** — Template Blade duy nhất của dự án, hiển thị khi người dùng truy cập `/`. Đây là giao diện chính của TypeLab với thiết kế UI đầy đủ, được render phía server. |

---

### 📁 `routes/` — Định tuyến

| File | Chức năng & Công dụng |
|---|---|
| `web.php` | **Route Web chính** — Định nghĩa tất cả các URL của ứng dụng web. Hiện tại chỉ có 1 route: `GET /` → trả về view `welcome`. Đây là nơi bạn thêm các trang mới cho website. |
| `console.php` | **Route Artisan Commands** — Định nghĩa các lệnh Artisan tùy chỉnh chạy từ command line. Hiện có lệnh `inspire` để in ra một câu danh ngôn ngẫu nhiên. |

---

### 📁 `storage/` — Lưu trữ

> Thư mục dùng để lưu trữ dữ liệu do ứng dụng tự sinh ra.

| Thư mục con | Chức năng & Công dụng |
|---|---|
| `storage/app/` | Lưu file do người dùng upload hoặc do ứng dụng tạo ra (private files). |
| `storage/app/public/` | Lưu file cần truy cập công khai (cần chạy `php artisan storage:link` để tạo symlink vào `public/storage`). |
| `storage/framework/cache/` | Cache dữ liệu runtime của ứng dụng (khi dùng driver `file`). |
| `storage/framework/sessions/` | Dữ liệu session người dùng (khi dùng driver `file`). |
| `storage/framework/views/` | Cache các file Blade template đã được compile sang PHP thuần để tăng tốc độ render. |
| `storage/logs/` | Chứa file log `laravel.log` — ghi lại lỗi và thông tin debug của ứng dụng. |

---

### 📁 `tests/` — Kiểm thử

| File | Chức năng & Công dụng |
|---|---|
| `TestCase.php` | **Base Test Class** — Lớp gốc mà tất cả các test case kế thừa. Tích hợp với Laravel để các test có thể sử dụng đầy đủ tính năng của framework (database, route, middleware,...). |
| `Feature/ExampleTest.php` | **Test tính năng mẫu** — Ví dụ về Feature Test: kiểm tra rằng khi truy cập `GET /` sẽ trả về HTTP status 200. Đây là loại test kiểm tra từ góc độ người dùng (gửi request, kiểm tra response). |
| `Unit/ExampleTest.php` | **Test đơn vị mẫu** — Ví dụ về Unit Test: kiểm tra một đoạn logic nhỏ, độc lập (không cần database hay request). Dùng để test các hàm/phương thức riêng lẻ. |

---

### 📁 `vendor/` — Thư viện PHP

> Thư mục do Composer tự tạo ra khi chạy `composer install`. Chứa toàn bộ source code của các thư viện PHP bên thứ ba (Laravel framework, Faker,...). **KHÔNG chỉnh sửa** thư mục này và **KHÔNG commit** lên Git.

---

## 📝 Ghi chú phát triển

- **Thêm trang mới**: Tạo route trong `routes/web.php` → Tạo Controller trong `app/Http/Controllers/` → Tạo View trong `resources/views/`.
- **Thêm bảng database**: Tạo migration bằng `php artisan make:migration` → Chỉnh sửa file migration → Chạy `php artisan migrate`.
- **Thêm Model**: Dùng `php artisan make:model TenModel -mfc` để tự động tạo cả Migration, Factory, và Controller.
- **Chạy Test**: `composer run test` hoặc `php artisan test`.
- **Xem Log**: `php artisan pail` (real-time) hoặc đọc file `storage/logs/laravel.log`.
