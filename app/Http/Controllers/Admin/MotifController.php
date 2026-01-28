<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motif;
use Illuminate\Http\Request;

class MotifController extends Controller
{
    public function index()
    {
        $motifs = Motif::withCount('produk')->latest()->paginate(10);
        return view('admin.motifs.index', compact('motifs'));
    }

    public function create()
    {
        return view('admin.motifs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_motif' => 'required|string|max:255|unique:tabel_motif,nama_motif',
        ]);

        Motif::create($validated);

        return redirect()->route('admin.motifs.index')
            ->with('success', 'Motif berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $motif = Motif::findOrFail($id);
        return view('admin.motifs.edit', compact('motif'));
    }

    public function update(Request $request, $id)
    {
        $motif = Motif::findOrFail($id);
        
        $validated = $request->validate([
            'nama_motif' => 'required|string|max:255|unique:tabel_motif,nama_motif,' . $id,
        ]);

        $motif->update($validated);

        return redirect()->route('admin.motifs.index')
            ->with('success', 'Motif berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $motif = Motif::findOrFail($id);
        
        // Check if motif has products
        if ($motif->produk()->count() > 0) {
            return redirect()->route('admin.motifs.index')
                ->with('error', 'Tidak dapat menghapus motif karena masih digunakan oleh produk.');
        }
        
        $motif->delete();

        return redirect()->route('admin.motifs.index')
            ->with('success', 'Motif berhasil dihapus.');
    }
}