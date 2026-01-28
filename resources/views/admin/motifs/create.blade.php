{{-- resources/views/admin/motifs/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Motif')
@section('page-title', 'Tambah Motif Baru')

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
                <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Form Tambah Motif</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.motifs.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label required">Nama Motif</label>
                        <input type="text" 
                               name="nama_motif" 
                               class="form-control @error('nama_motif') is-invalid @enderror" 
                               value="{{ old('nama_motif') }}"
                               placeholder="Contoh: Mega Mendung, Parang, Kawung, dll"
                               required
                               style="border-color: #8b4513;">
                        @error('nama_motif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Masukkan nama motif batik yang umum dikenal</div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-brown btn-lg">
                            <i class="bi bi-check-circle me-2"></i>Simpan Motif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection