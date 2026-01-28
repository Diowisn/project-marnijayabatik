<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 8 produk terbaru
        $products = Product::with(['kategori', 'motif'])
            ->latest()
            ->take(8)
            ->get();
            
        // Ambil semua kategori untuk filter
        $categories = Category::all();
        
        return view('front.home', compact('products', 'categories'));
    }
}