<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the application homepage with featured products.
     */
    public function home()
    {
        $products = Product::where('is_active', true)->latest()->take(8)->get();
        return view('welcome', compact('products'));
    }

    /**
     * Display a listing of the resource (Shop page).
     */
    public function index()
    {
        $products = Product::where('is_active', true)->latest()->paginate(12);
        return view('products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        
        // Lấy sản phẩm tương tự (cùng category)
        $relatedProducts = Product::where('category', $product->category)
                                ->where('id', '!=', $product->id)
                                ->where('is_active', true)
                                ->inRandomOrder()
                                ->take(4)
                                ->get();
                                
        return view('products.show', compact('product', 'relatedProducts'));
    }
}
