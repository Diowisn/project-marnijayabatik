<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['kategori', 'motif']);
        
        // Filter by kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }
        
        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('harga', '>=', $request->min_price);
        }
        
        if ($request->has('max_price')) {
            $query->where('harga', '<=', $request->max_price);
        }
        
        // Search
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            });
        }
        
        // Default order
        $query->latest();
        
        $products = $query->paginate(12);
        $categories = Category::all();
        
        return view('front.products.index', compact('products', 'categories'));
    }
    
    public function show($id)
    {
        // PERBAIKAN: Tambahkan check untuk relasi
        $product = Product::with(['kategori', 'motif'])->findOrFail($id);
        
        // Debug: Cek apakah relasi kategori ada
        if (!$product->kategori) {
            \Log::warning("Product {$id} doesn't have kategori relation");
        }
        
        // Ambil gambar detail
        $gambarDetailArray = [];
        if (!empty($product->gambar_detail)) {
            $details = explode(',', $product->gambar_detail);
            foreach ($details as $gambar) {
                $gambar = trim($gambar);
                if (!empty($gambar)) {
                    $gambarDetailArray[] = $gambar;
                }
            }
        }
        
        // Ambil gambar detail2
        $gambarDetail2Array = [];
        if (!empty($product->gambar_detail2)) {
            $details2 = explode(',', $product->gambar_detail2);
            foreach ($details2 as $gambar) {
                $gambar = trim($gambar);
                if (!empty($gambar)) {
                    $gambarDetail2Array[] = $gambar;
                }
            }
        }
        
        // PERBAIKAN: Gunkan kolom 'kategori' untuk filter
        $relatedProducts = Product::with(['kategori', 'motif'])
            ->where('kategori', $product->kategori) // Kolom 'kategori' bukan relasi
            ->where('id_produk', '!=', $id)
            ->take(4)
            ->get();
        
        return view('front.products.show', compact('product', 'relatedProducts', 'gambarDetailArray', 'gambarDetail2Array'));
    }
}