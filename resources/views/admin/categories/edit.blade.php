@extends('layouts.admin')

@section('title', 'Edit Kategori')
@section('page-title', 'Edit Kategori')

@section('page-actions')
<a href="{{ route('admin.categories.index') }}" class="btn btn-outline-brown">
    <i class="bi bi-arrow-left"></i> Kembali
</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header card-header-custom">
                <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Kategori</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="form-label required">Nama Kategori</label>
                        <input type="text" 
                               name="nama_kategori" 
                               class="form-control @error('nama_kategori') is-invalid @enderror" 
                               value="{{ old('nama_kategori', $category->nama_kategori) }}"
                               placeholder="Contoh: Batik Tulis, Batik Cap, dll"
                               required
                               style="border-color: #8b4513;">
                        @error('nama_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Category Info -->
                    <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.05) 0%, rgba(139, 69, 19, 0.1) 100%);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-box me-2" style="color: #8b4513;"></i>
                                        <div>
                                            <small class="text-muted d-block">Jumlah Produk</small>
                                            <h6 class="mb-0 fw-bold">{{ $category->produk_count ?? 0 }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-calendar me-2" style="color: #8b4513;"></i>
                                        <div>
                                            <small class="text-muted d-block">Dibuat</small>
                                            <h6 class="mb-0 fw-bold">{{ $category->created_at->format('d/m/Y') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-brown btn-lg">
                            <i class="bi bi-check-circle me-2"></i>Update Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection