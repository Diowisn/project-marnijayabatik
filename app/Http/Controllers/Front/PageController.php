<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{
    public function about()
    {
        // Ambil 8 produk terbaru
        $products = Product::with(['kategori', 'motif'])
            ->latest()
            ->take(8)
            ->get();
            
        // Ambil semua kategori untuk filter
        $categories = Category::all();

        return view('front.about', compact('products', 'categories'));
    }
    
    public function contact()
    {
        return view('front.contact');
    }
}