@extends('layouts.admin')

@section('title', 'Edit Motif')
@section('page-title', 'Edit Motif')

@section('page-actions')
<a href="{{ route('admin.motifs.index') }}" class="btn btn-outline-brown">
    <i class="bi bi-arrow-left"></i> Kembali
</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header card-header-custom">
                <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Motif</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.motifs.update', $motif->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="form-label required">Nama Motif</label>
                        <input type="text" 
                               name="nama_motif" 
                               class="form-control @error('nama_motif') is-invalid @enderror" 
                               value="{{ old('nama_motif', $motif->nama_motif) }}"
                               placeholder="Contoh: Mega Mendung, Parang, Kawung, dll"
                               required
                               style="border-color: #8b4513;">
                        @error('nama_motif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Motif Info -->
                    <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.05) 0%, rgba(139, 69, 19, 0.1) 100%);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-box me-2" style="color: #8b4513;"></i>
                                        <div>
                                            <small class="text-muted d-block">Jumlah Produk</small>
                                            <h6 class="mb-0 fw-bold">{{ $motif->produk_count ?? 0 }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-calendar me-2" style="color: #8b4513;"></i>
                                        <div>
                                            <small class="text-muted d-block">Dibuat</small>
                                            <h6 class="mb-0 fw-bold">{{ $motif->created_at->format('d/m/Y') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-brown btn-lg">
                            <i class="bi bi-check-circle me-2"></i>Update Motif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection