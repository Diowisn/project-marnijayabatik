{{-- resources/views/admin/motifs/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Motif')
@section('page-title', 'Manajemen Motif')

@section('page-actions')
<a href="{{ route('admin.motifs.create') }}" class="btn btn-brown">
    <i class="bi bi-plus-circle"></i> Tambah Motif
</a>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header card-header-custom">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-palette me-2"></i>Daftar Motif
            </h5>
            <span class="badge bg-light text-dark">{{ $motifs->total() }} motif</span>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-custom mb-0">
                <thead>
                    <tr>
                        <th width="60" class="text-center">#</th>
                        <th>Nama Motif</th>
                        <th class="text-center">Jumlah Produk</th>
                        <th class="text-center">Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($motifs as $motif)
                    <tr>
                        <td class="text-center align-middle">
                            <span class="badge badge-brown">{{ $loop->iteration + (($motifs->currentPage() - 1) * $motifs->perPage()) }}</span>
                        </td>
                        <td class="align-middle">
                            <h6 class="mb-0 fw-bold">{{ $motif->nama_motif }}</h6>
                        </td>
                        <td class="text-center align-middle">
                            <span class="badge" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%); color: #8b4513; border: 1px solid #8b4513;">
                                {{ $motif->produk_count }} produk
                            </span>
                        </td>
                        <td class="text-center align-middle">
                            <small class="text-muted">{{ $motif->created_at->format('d/m/Y') }}</small>
                        </td>
                        <td class="text-center align-middle">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('admin.motifs.edit', $motif->id) }}" 
                                   class="btn btn-outline-brown"
                                   data-bs-toggle="tooltip"
                                   title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.motifs.destroy', $motif->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Hapus motif ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-outline-danger"
                                            data-bs-toggle="tooltip"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="py-3">
                                <i class="bi bi-palette display-4 text-muted mb-3"></i>
                                <p class="text-muted mb-4">Belum ada motif</p>
                                <a href="{{ route('admin.motifs.create') }}" class="btn btn-brown">
                                    <i class="bi bi-plus-circle me-2"></i>Tambah Motif
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($motifs->hasPages())
        <div class="card-footer border-0 bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Menampilkan {{ $motifs->firstItem() }} - {{ $motifs->lastItem() }} dari {{ $motifs->total() }} motif
                    </small>
                </div>
                <div>
                    {{ $motifs->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection