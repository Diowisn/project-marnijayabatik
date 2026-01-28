@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')

<!-- Welcome Message -->
<div class="row mt-4">
    <div class="col-12">
        <div class="alert alert-light border-0 shadow-sm" role="alert" style="background: linear-gradient(135deg, rgba(245, 222, 179, 0.2) 0%, rgba(245, 222, 179, 0.3) 100%); border-left: 4px solid #8b4513 !important;">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <h5 class="alert-heading mb-1" style="color: #8b4513;">
                        <i class="bi bi-emoji-smile me-2"></i>Selamat datang, {{ Auth::user()->name }}!
                    </h5>
                    <p class="mb-0">Anda login sebagai administrator sistem Marni Jaya Batik. Dashboard ini memberikan gambaran cepat tentang status toko Anda.</p>
                </div>
                <div class="ms-3">
                    <i class="bi bi-shop-window display-6" style="color: #8b4513; opacity: 0.7;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistic Cards -->
<div class="row g-4 mb-5">
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="stat-card card border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Produk</h6>
                        <h2 class="mb-0 fw-bold" style="color: #8b4513;">{{ $total_products }}</h2>
                        <small class="text-muted">Terbaru: {{ $recent_products->count() }} produk</small>
                    </div>
                    <div class="rounded-circle p-3" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%);">
                        <i class="bi bi-box-seam display-6" style="color: #8b4513;"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.products.index') }}" class="text-decoration-none small" style="color: #8b4513;">
                        Lihat semua produk <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="stat-card card border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Kategori</h6>
                        <h2 class="mb-0 fw-bold" style="color: #8b4513;">{{ $total_categories }}</h2>
                        <small class="text-muted">Kategori aktif</small>
                    </div>
                    <div class="rounded-circle p-3" style="background: linear-gradient(135deg, rgba(160, 82, 45, 0.1) 0%, rgba(160, 82, 45, 0.2) 100%);">
                        <i class="bi bi-tags display-6" style="color: #a0522d;"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.categories.index') }}" class="text-decoration-none small" style="color: #8b4513;">
                        Kelola kategori <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="stat-card card border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Users</h6>
                        <h2 class="mb-0 fw-bold" style="color: #8b4513;">{{ $total_users }}</h2>
                        <small class="text-muted">Admin: 1 user</small>
                    </div>
                    <div class="rounded-circle p-3" style="background: linear-gradient(135deg, rgba(101, 67, 33, 0.1) 0%, rgba(101, 67, 33, 0.2) 100%);">
                        <i class="bi bi-people display-6" style="color: #654321;"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-muted small">Sistem admin</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="stat-card card border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Statistik</h6>
                        <h2 class="mb-0 fw-bold" style="color: #8b4513;">100%</h2>
                        <small class="text-muted">Sistem aktif</small>
                    </div>
                    <div class="rounded-circle p-3" style="background: linear-gradient(135deg, rgba(245, 222, 179, 0.2) 0%, rgba(245, 222, 179, 0.3) 100%);">
                        <i class="bi bi-bar-chart-line display-6" style="color: #f5deb3;"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-muted small">Dashboard real-time</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Products & Quick Actions -->
<div class="row g-4">
    <!-- Recent Products -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header card-header-custom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-clock-history me-2"></i>Produk Terbaru
                    </h5>
                    <span class="badge bg-light text-dark">{{ $recent_products->count() }} produk</span>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-custom mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nama Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_products as $index => $product)
                            <tr>
                                <td class="text-center align-middle">
                                    <span class="badge badge-brown">{{ $index + 1 }}</span>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        @if($product->gambar)
                                            <img src="{{ asset('images/products/' . $product->gambar) }}" 
                                                alt="{{ $product->nama_produk }}"
                                                class="rounded"
                                                style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #f5deb3;">
                                        @else
                                            <div class="rounded me-3 d-flex align-items-center justify-content-center" 
                                                style="width: 40px; height: 40px; background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%);">
                                                <i class="bi bi-image" style="color: #8b4513;"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $product->nama_produk }}</h6>
                                            <small class="text-muted">
                                                ID: {{ $product->id_produk }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <span class="fw-bold" style="color: #8b4513;">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="text-center align-middle">
                                    @if($product->stok > 10)
                                        <span class="badge bg-success">{{ $product->stok }} pcs</span>
                                    @elseif($product->stok > 0)
                                        <span class="badge bg-warning">{{ $product->stok }} pcs</span>
                                    @else
                                        <span class="badge bg-danger">Habis</span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('admin.products.edit', $product->id_produk) }}" 
                                    class="btn btn-sm btn-outline-brown">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <div class="py-3">
                                        <i class="bi bi-inbox display-4 text-muted mb-3"></i>
                                        <p class="text-muted">Belum ada produk</p>
                                        <a href="{{ route('admin.products.create') }}" class="btn btn-brown">
                                            <i class="bi bi-plus-circle me-2"></i>Tambah Produk
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($recent_products->count() > 0)
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">
                        Menampilkan {{ $recent_products->count() }} produk terbaru
                    </small>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-brown btn-sm">
                        Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Quick Actions & Info -->
    <div class="col-lg-4">
        <!-- Quick Actions -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header card-header-custom">
                <h5 class="mb-0">
                    <i class="bi bi-lightning-charge me-2"></i>Aksi Cepat
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-brown">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Produk Baru
                    </a>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-brown">
                        <i class="bi bi-plus-lg me-2"></i>Tambah Kategori
                    </a>
                    <a href="{{ route('admin.motifs.create') }}" class="btn btn-outline-brown">
                        <i class="bi bi-plus-lg me-2"></i>Tambah Motif
                    </a>
                </div>
            </div>
        </div>
        
        <!-- System Info -->
        <div class="card border-0 shadow-sm">
            <div class="card-header card-header-custom">
                <h5 class="mb-0">
                    <i class="bi bi-info-circle me-2"></i>Info Sistem
                </h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-2">
                        <span class="text-muted">
                            <i class="bi bi-calendar me-2"></i>Hari ini
                        </span>
                        <span class="fw-bold">{{ now()->format('d F Y') }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-2">
                        <span class="text-muted">
                            <i class="bi bi-clock me-2"></i>Jam
                        </span>
                        <span class="fw-bold">{{ now()->format('H:i') }} WIB</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-2">
                        <span class="text-muted">
                            <i class="bi bi-box me-2"></i>Uploads
                        </span>
                        <span class="fw-bold">{{ $total_products }} produk</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-2">
                        <span class="text-muted">
                            <i class="bi bi-shield-check me-2"></i>Status
                        </span>
                        <span class="badge bg-success">Aktif</span>
                    </div>
                </div>
                
                <div class="mt-3 pt-3 border-top">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <small class="text-muted">Terakhir login</small>
                            <div class="fw-bold">{{ Auth::user()->updated_at->diffForHumans() }}</div>
                        </div>
                        <i class="bi bi-person-check" style="color: #8b4513; font-size: 1.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart Placeholder -->
<div class="row mt-2">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header card-header-custom">
                <h5 class="mb-0">
                    <i class="bi bi-graph-up me-2"></i>Aktivitas Sistem
                </h5>
            </div>
            <div class="card-body">
                <div class="text-center py-5">
                    <i class="bi bi-bar-chart display-4 mb-3" style="color: rgba(139, 69, 19, 0.2);"></i>
                    <h6 class="text-muted">Grafik aktivitas akan ditampilkan di sini</h6>
                    <p class="text-muted small">Fitur ini akan tersedia dalam pembaruan berikutnya</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Additional Custom Styles */
    .stat-card {
        background: white;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(139, 69, 19, 0.15) !important;
    }
    
    .table-custom tbody tr {
        transition: all 0.2s ease;
    }
    
    .table-custom tbody tr:hover {
        background-color: rgba(139, 69, 19, 0.08) !important;
        transform: scale(1.01);
    }
    
    .badge-brown {
        background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 500;
    }
</style>

<script>
    // Add animation to cards on load
    document.addEventListener('DOMContentLoaded', function() {
        // Animate stat cards
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100 * index);
        });
        
        // Add hover effect to table rows
        const tableRows = document.querySelectorAll('.table-custom tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 4px 12px rgba(139, 69, 19, 0.1)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.boxShadow = 'none';
            });
        });
    });
</script>
@endsection