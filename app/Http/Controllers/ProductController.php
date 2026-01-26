<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with(['kategoriRelasi', 'motif']);
        
        // Filter by kategori
        if ($request->has('kategori') && $request->kategori) {
            $query->whereHas('kategoriRelasi', function($q) use ($request) {
                $q->where('id', $request->kategori);
            });
        }
        
        // Filter by etalase
        if ($request->has('etalase') && $request->etalase) {
            $query->where('etalase', $request->etalase);
        }
        
        // Filter by proses_batik
        if ($request->has('proses_batik') && $request->proses_batik) {
            $query->where('proses_batik', $request->proses_batik);
        }
        
        // Search
        if ($request->has('search') && $request->search) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }
        
        $products = $query->orderBy('created_at', 'desc')->paginate(12);
        
        $kategoriOptions = Kategori::whereHas('produk')
            ->select('id', 'nama_kategori')
            ->distinct()
            ->orderBy('nama_kategori')
            ->get();

        $etalaseOptions = Produk::whereNotNull('etalase')
            ->where('etalase', '!=', '')
            ->select('etalase')
            ->distinct()
            ->orderBy('etalase')
            ->get();

        $prosesOptions = Produk::whereNotNull('proses_batik')
            ->where('proses_batik', '!=', '')
            ->select('proses_batik')
            ->distinct()
            ->orderBy('proses_batik')
            ->get();

        return view('products.index', compact(
            'products',
            'kategoriOptions',
            'etalaseOptions',
            'prosesOptions'
        ));
    }

    public function show($id)
    {
        $product = Produk::with(['kategoriRelasi', 'motif'])->findOrFail($id);
        
        // Get related products (same category)
        $relatedProducts = Produk::where('kategori', $product->kategori)
            ->where('id_produk', '!=', $id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('products.detail', compact('product', 'relatedProducts'));
    }
}