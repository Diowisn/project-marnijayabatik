@extends('layouts.admin')

@section('title', 'Tambah Kategori')
@section('page-title', 'Tambah Kategori Baru')

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
                <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Form Tambah Kategori</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label required">Nama Kategori</label>
                        <input type="text" 
                               name="nama_kategori" 
                               class="form-control @error('nama_kategori') is-invalid @enderror" 
                               value="{{ old('nama_kategori') }}"
                               placeholder="Contoh: Batik Tulis, Batik Cap, dll"
                               required
                               style="border-color: #8b4513;">
                        @error('nama_kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Masukkan nama kategori yang jelas dan deskriptif</div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-brown btn-lg">
                            <i class="bi bi-check-circle me-2"></i>Simpan Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection