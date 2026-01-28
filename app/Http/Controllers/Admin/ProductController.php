<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Motif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['kategori', 'motif'])->latest();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama_produk', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        }
        
        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('kategori', $request->category);
        }
        
        // Filter by stock
        if ($request->has('stock') && $request->stock != '') {
            if ($request->stock == 'available') {
                $query->where('stok', '>', 0);
            } elseif ($request->stock == 'out') {
                $query->where('stok', '<=', 0);
            }
        }
        
        $products = $query->paginate(10);
        $categories = Category::all();
        
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $motifs = Motif::all();
        return view('admin.products.create', compact('categories', 'motifs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'berat' => 'nullable|numeric|min:0',
            'min_beli' => 'nullable|integer|min:1',
            'jenis_kain' => 'nullable|string|max:100',
            'motif_id' => 'nullable|exists:tabel_motif,id',
            'etalase' => 'nullable|string|max:100',
            'ukuran' => 'nullable|string|max:50',
            'panjang_tali' => 'nullable|string|max:50',
            'proses_batik' => 'nullable|string|max:50',
            'stok' => 'required|integer|min:0',
            'kategori' => 'nullable|exists:tabel_kategori,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar_detail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar_detail2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Upload main image
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = 'produk_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['gambar'] = $imageName;
        }

        // Upload detail image 1 (single)
        if ($request->hasFile('gambar_detail')) {
            $image = $request->file('gambar_detail');
            $imageName = 'detail_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products/detail'), $imageName);
            $validated['gambar_detail'] = $imageName;
        }

        // Upload detail image 2 (single)
        if ($request->hasFile('gambar_detail2')) {
            $image = $request->file('gambar_detail2');
            $imageName = 'detail2_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products/detail2'), $imageName);
            $validated['gambar_detail2'] = $imageName;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $product = Product::with(['kategori', 'motif'])->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $motifs = Motif::all();
        return view('admin.products.edit', compact('product', 'categories', 'motifs'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'berat' => 'nullable|numeric|min:0',
            'min_beli' => 'nullable|integer|min:1',
            'jenis_kain' => 'nullable|string|max:100',
            'motif_id' => 'nullable|exists:tabel_motif,id',
            'etalase' => 'nullable|string|max:100',
            'ukuran' => 'nullable|string|max:50',
            'panjang_tali' => 'nullable|string|max:50',
            'proses_batik' => 'nullable|string|max:50',
            'stok' => 'required|integer|min:0',
            'kategori' => 'nullable|exists:tabel_kategori,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar_detail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar_detail2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Update main image
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($product->gambar && file_exists(public_path('images/products/' . $product->gambar))) {
                unlink(public_path('images/products/' . $product->gambar));
            }
            
            $image = $request->file('gambar');
            $imageName = 'produk_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['gambar'] = $imageName;
        } elseif ($request->has('remove_main_image') && $product->gambar) {
            // Remove main image if checkbox is checked
            if (file_exists(public_path('images/products/' . $product->gambar))) {
                unlink(public_path('images/products/' . $product->gambar));
            }
            $validated['gambar'] = null;
        } else {
            $validated['gambar'] = $product->gambar;
        }

        // Update detail image 1
        if ($request->hasFile('gambar_detail')) {
            // Delete old image
            if ($product->gambar_detail && file_exists(public_path('images/products/detail/' . $product->gambar_detail))) {
                unlink(public_path('images/products/detail/' . $product->gambar_detail));
            }
            
            $image = $request->file('gambar_detail');
            $imageName = 'detail_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products/detail'), $imageName);
            $validated['gambar_detail'] = $imageName;
        } elseif ($request->has('remove_detail1_image') && $product->gambar_detail) {
            // Remove detail 1 image if checkbox is checked
            if (file_exists(public_path('images/products/detail/' . $product->gambar_detail))) {
                unlink(public_path('images/products/detail/' . $product->gambar_detail));
            }
            $validated['gambar_detail'] = null;
        } else {
            $validated['gambar_detail'] = $product->gambar_detail;
        }

        // Update detail image 2
        if ($request->hasFile('gambar_detail2')) {
            // Delete old image
            if ($product->gambar_detail2 && file_exists(public_path('images/products/detail2/' . $product->gambar_detail2))) {
                unlink(public_path('images/products/detail2/' . $product->gambar_detail2));
            }
            
            $image = $request->file('gambar_detail2');
            $imageName = 'detail2_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products/detail2'), $imageName);
            $validated['gambar_detail2'] = $imageName;
        } elseif ($request->has('remove_detail2_image') && $product->gambar_detail2) {
            // Remove detail 2 image if checkbox is checked
            if (file_exists(public_path('images/products/detail2/' . $product->gambar_detail2))) {
                unlink(public_path('images/products/detail2/' . $product->gambar_detail2));
            }
            $validated['gambar_detail2'] = null;
        } else {
            $validated['gambar_detail2'] = $product->gambar_detail2;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete main image
        if ($product->gambar && file_exists(public_path('images/products/' . $product->gambar))) {
            unlink(public_path('images/products/' . $product->gambar));
        }
        
        // Delete detail image 1
        if ($product->gambar_detail && file_exists(public_path('images/products/detail/' . $product->gambar_detail))) {
            unlink(public_path('images/products/detail/' . $product->gambar_detail));
        }
        
        // Delete detail image 2
        if ($product->gambar_detail2 && file_exists(public_path('images/products/detail2/' . $product->gambar_detail2))) {
            unlink(public_path('images/products/detail2/' . $product->gambar_detail2));
        }
        
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}