<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get 4 latest products with relationships
        $products = Produk::with(['kategoriRelasi', 'motif'])
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        // Get categories for filter
        $kategoriOptions = Kategori::whereHas('produk')
            ->select('id', 'nama_kategori')
            ->distinct()
            ->orderBy('nama_kategori')
            ->get();

        // Get unique etalase values
        $etalaseOptions = Produk::whereNotNull('etalase')
            ->where('etalase', '!=', '')
            ->select('etalase')
            ->distinct()
            ->orderBy('etalase')
            ->get();

        // Get unique proses_batik values
        $prosesOptions = Produk::whereNotNull('proses_batik')
            ->where('proses_batik', '!=', '')
            ->select('proses_batik')
            ->distinct()
            ->orderBy('proses_batik')
            ->get();

        // Gallery images (you might want to modify this)
        $galleryImages = Produk::inRandomOrder()
            ->take(9)
            ->pluck('gambar')
            ->toArray();

        return view('home', compact(
            'products',
            'kategoriOptions',
            'etalaseOptions',
            'prosesOptions',
            'galleryImages'
        ));
    }
}