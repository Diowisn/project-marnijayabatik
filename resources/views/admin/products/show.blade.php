@extends('layouts.admin')

@section('title', 'Detail Produk')
@section('page-title', 'Detail Produk')

@section('page-actions')
<div class="d-flex gap-2">
    <a href="{{ route('admin.products.edit', $product->id_produk) }}" class="btn btn-brown">
        <i class="bi bi-pencil"></i> Edit
    </a>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-brown">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header card-header-custom">
                <h5 class="mb-0">
                    <i class="bi bi-box-seam me-2"></i>Detail Produk
                    <span class="badge bg-light text-dark float-end">ID: {{ $product->id_produk }}</span>
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Product Images -->
                    <div class="col-lg-5">
                        <!-- Main Image -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="main-image-container mb-3">
                                        @if($product->gambar)
                                            <img src="{{ asset('images/products/' . $product->gambar) }}" 
                                                 alt="{{ $product->nama_produk }}"
                                                 class="img-fluid rounded shadow"
                                                 id="mainProductImage"
                                                 style="max-height: 400px; object-fit: contain;">
                                        @else
                                            <div class="rounded d-flex align-items-center justify-content-center mx-auto"
                                                 style="width: 100%; height: 300px; background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%);">
                                                <i class="bi bi-image display-1" style="color: #8b4513; opacity: 0.5;"></i>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Thumbnail Images -->
                                    @php
                                        $allImages = [];
                                        // Add main image
                                        if($product->gambar) {
                                            $allImages[] = [
                                                'src' => asset('images/products/' . $product->gambar),
                                                'type' => 'main'
                                            ];
                                        }
                                        
                                        // Add detail images
                                        if($product->gambar_detail) {
                                            $detailImages = explode(',', $product->gambar_detail);
                                            foreach($detailImages as $image) {
                                                if(trim($image)) {
                                                    $allImages[] = [
                                                        'src' => asset('images/products/detail/' . trim($image)),
                                                        'type' => 'detail'
                                                    ];
                                                }
                                            }
                                        }
                                        
                                        // Add detail2 images
                                        if($product->gambar_detail2) {
                                            $detail2Images = explode(',', $product->gambar_detail2);
                                            foreach($detail2Images as $image) {
                                                if(trim($image)) {
                                                    $allImages[] = [
                                                        'src' => asset('images/products/detail2/' . trim($image)),
                                                        'type' => 'detail2'
                                                    ];
                                                }
                                            }
                                        }
                                    @endphp
                                    
                                    @if(count($allImages) > 1)
                                    <div class="thumbnail-container">
                                        <div class="row g-2 justify-content-center">
                                            @foreach($allImages as $index => $image)
                                            <div class="col-3 col-md-2">
                                                <img src="{{ $image['src'] }}" 
                                                     alt="Gambar {{ $index + 1 }}"
                                                     class="img-thumbnail thumbnail-image {{ $index == 0 ? 'active' : '' }}"
                                                     style="cursor: pointer; height: 70px; object-fit: cover;"
                                                     onclick="changeMainImage('{{ $image['src'] }}', this)">
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Stats -->
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm text-center" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.05) 0%, rgba(139, 69, 19, 0.1) 100%);">
                                    <div class="card-body py-3">
                                        <i class="bi bi-box display-6 mb-2" style="color: #8b4513;"></i>
                                        <h5 class="mb-1 fw-bold">{{ $product->stok }}</h5>
                                        <small class="text-muted">Stok Tersedia</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm text-center" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.05) 0%, rgba(139, 69, 19, 0.1) 100%);">
                                    <div class="card-body py-3">
                                        <i class="bi bi-currency-exchange display-6 mb-2" style="color: #8b4513;"></i>
                                        <h5 class="mb-1 fw-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</h5>
                                        <small class="text-muted">Harga</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Details -->
                    <div class="col-lg-7">
                        <!-- Basic Information -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-light border-bottom">
                                <h6 class="mb-0"><i class="bi bi-info-circle me-2"></i>Informasi Produk</h6>
                            </div>
                            <div class="card-body">
                                <h2 class="fw-bold mb-3" style="color: #8b4513;">{{ $product->nama_produk }}</h2>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-circle me-3">
                                                <i class="bi bi-tag" style="color: #8b4513; font-size: 1.2rem;"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Kategori</small>
                                                <span class="fw-bold">
                                                    {{ $product->kategori->nama_kategori ?? 'Tidak ada kategori' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-circle me-3">
                                                <i class="bi bi-palette" style="color: #8b4513; font-size: 1.2rem;"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Motif</small>
                                                <span class="fw-bold">
                                                    {{ $product->motif->nama_motif ?? 'Tidak ada motif' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-circle me-3">
                                                <i class="bi bi-shop" style="color: #8b4513; font-size: 1.2rem;"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Etalase</small>
                                                <span class="fw-bold">
                                                    {{ $product->etalase ?? 'Tidak ditentukan' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-circle me-3">
                                                <i class="bi bi-gear" style="color: #8b4513; font-size: 1.2rem;"></i>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Proses Batik</small>
                                                <span class="fw-bold">
                                                    {{ $product->proses_batik ?? 'Tidak ditentukan' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <h6 class="fw-bold mb-2" style="color: #8b4513;">Deskripsi Produk</h6>
                                    <div class="product-description">
                                        {!! nl2br(e($product->deskripsi)) ?: '<span class="text-muted">Tidak ada deskripsi</span>' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Specifications -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-light border-bottom">
                                <h6 class="mb-0"><i class="bi bi-list-check me-2"></i>Spesifikasi</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <small class="text-muted d-block">Jenis Kain</small>
                                            <span class="fw-bold">{{ $product->jenis_kain ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <small class="text-muted d-block">Ukuran</small>
                                            <span class="fw-bold">{{ $product->ukuran ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <small class="text-muted d-block">Berat</small>
                                            <span class="fw-bold">{{ $product->berat ? $product->berat . ' gram' : '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <small class="text-muted d-block">Panjang Tali</small>
                                            <span class="fw-bold">{{ $product->panjang_tali ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <small class="text-muted d-block">Minimal Beli</small>
                                            <span class="fw-bold">{{ $product->min_beli ?? 1 }} pcs</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <small class="text-muted d-block">Status</small>
                                            @if($product->stok > 10)
                                                <span class="badge bg-success">Tersedia</span>
                                            @elseif($product->stok > 0)
                                                <span class="badge bg-warning">Terbatas</span>
                                            @else
                                                <span class="badge bg-danger">Habis</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product Metadata -->
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar-plus me-3" style="color: #8b4513; font-size: 1.5rem;"></i>
                                            <div>
                                                <small class="text-muted d-block">Dibuat</small>
                                                <span class="fw-bold">{{ $product->created_at->format('d F Y H:i') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar-check me-3" style="color: #8b4513; font-size: 1.5rem;"></i>
                                            <div>
                                                <small class="text-muted d-block">Terakhir Update</small>
                                                <span class="fw-bold">{{ $product->updated_at->format('d F Y H:i') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="card-footer border-top bg-light">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                        </a>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.products.edit', $product->id_produk) }}" class="btn btn-brown">
                            <i class="bi bi-pencil"></i> Edit Produk
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id_produk) }}" 
                              method="POST" 
                              onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .thumbnail-image {
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }
    
    .thumbnail-image:hover,
    .thumbnail-image.active {
        border-color: #8b4513;
        transform: scale(1.05);
    }
    
    .product-description {
        line-height: 1.6;
        color: #555;
    }
    
    .product-description ul,
    .product-description ol {
        padding-left: 20px;
    }
    
    .card-header-custom {
        background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
        color: white;
        border: none;
        padding: 15px 20px;
    }
    
    .bg-light {
        background-color: rgba(139, 69, 19, 0.05) !important;
    }
</style>

<script>
    function changeMainImage(src, element) {
        // Update main image
        document.getElementById('mainProductImage').src = src;
        
        // Update active thumbnail
        document.querySelectorAll('.thumbnail-image').forEach(img => {
            img.classList.remove('active');
        });
        element.classList.add('active');
    }
    
    // Initialize image gallery
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.thumbnail-image');
        if (thumbnails.length > 0) {
            thumbnails[0].classList.add('active');
        }
    });
</script>
@endsection