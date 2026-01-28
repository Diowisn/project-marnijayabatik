{{-- resources/views/admin/products/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Produk')
@section('page-title', 'Manajemen Produk')

@section('page-actions')
<div class="d-flex gap-2">
    <button class="btn btn-outline-brown" data-bs-toggle="modal" data-bs-target="#filterModal">
        <i class="bi bi-funnel"></i> Filter
    </button>
    <a href="{{ route('admin.products.create') }}" class="btn btn-brown">
        <i class="bi bi-plus-circle"></i> Tambah Produk
    </a>
</div>
@endsection

@section('content')
<!-- Search and Filter Bar -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <form action="{{ route('admin.products.index') }}" method="GET" class="row g-3">
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-text" style="background-color: #f5deb3; border-color: #8b4513;">
                        <i class="bi bi-search" style="color: #8b4513;"></i>
                    </span>
                    <input type="text" 
                           class="form-control" 
                           name="search" 
                           placeholder="Cari produk..." 
                           value="{{ request('search') }}"
                           style="border-color: #8b4513;">
                    <button class="btn btn-brown" type="submit">Cari</button>
                </div>
            </div>
            <div class="col-md-4">
                <select name="category" class="form-select" style="border-color: #8b4513;" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>

<!-- Products Table -->
<div class="card border-0 shadow-sm">
    <div class="card-header card-header-custom">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-box-seam me-2"></i>Daftar Produk
            </h5>
            <span class="badge bg-light text-dark">{{ $products->total() }} produk</span>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-custom mb-0">
                <thead>
                    <tr>
                        <th width="60" class="text-center">#</th>
                        <th >Produk</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="text-center align-middle">
                            <span class="badge badge-brown">{{ $loop->iteration + (($products->currentPage() - 1) * $products->perPage()) }}</span>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <div class="product-image me-3">
                                    @if($product->gambar)
                                        <img src="{{ asset('images/products/' . $product->gambar) }}" 
                                             alt="{{ $product->nama_produk }}"
                                             class="rounded"
                                             style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #f5deb3;">
                                    @else
                                        <div class="rounded d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%);">
                                            <i class="bi bi-image" style="color: #8b4513; font-size: 1.5rem;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $product->nama_produk }}</h6>
                                    <small class="text-muted">
                                        ID: {{ $product->id_produk }} | 
                                        {{ Str::limit($product->deskripsi, 50) }}
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center align-middle">
                            @if($product->category)
                                <span class="badge" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%); color: #8b4513; border: 1px solid #8b4513;">
                                    {{ $product->category->nama_kategori }}
                                </span>
                            @else
                                <span class="badge bg-secondary">-</span>
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            <span class="fw-bold" style="color: #8b4513;">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="text-center align-middle">
                            <span class="fw-bold {{ $product->stok > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $product->stok }} pcs
                            </span>
                        </td>
                        <td class="text-center align-middle">
                            @if($product->stok > 10)
                                <span class="badge bg-success">Tersedia</span>
                            @elseif($product->stok > 0)
                                <span class="badge bg-warning">Terbatas</span>
                            @else
                                <span class="badge bg-danger">Habis</span>
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('admin.products.show', $product->id_produk) }}" 
                                   class="btn btn-outline-brown" 
                                   data-bs-toggle="tooltip" 
                                   title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', $product->id_produk) }}" 
                                   class="btn btn-outline-brown"
                                   data-bs-toggle="tooltip"
                                   title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id_produk) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Hapus produk ini?')">
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
                        <td colspan="7" class="text-center py-5">
                            <div class="py-3">
                                <i class="bi bi-inbox display-4 text-muted mb-3"></i>
                                <p class="text-muted mb-4">Belum ada produk</p>
                                <a href="{{ route('admin.products.create') }}" class="btn btn-brown">
                                    <i class="bi bi-plus-circle me-2"></i>Tambah Produk Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($products->hasPages())
        <div class="card-footer border-0 bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Menampilkan {{ $products->firstItem() }} - {{ $products->lastItem() }} dari {{ $products->total() }} produk
                    </small>
                </div>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header card-header-custom">
                <h5 class="modal-title"><i class="bi bi-funnel me-2"></i>Filter Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.products.index') }}" method="GET">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Status Stok</label>
                        <select name="stock" class="form-select" style="border-color: #8b4513;">
                            <option value="">Semua Status</option>
                            <option value="available" {{ request('stock') == 'available' ? 'selected' : '' }}>Stok Tersedia</option>
                            <option value="out" {{ request('stock') == 'out' ? 'selected' : '' }}>Stok Habis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Minimum</label>
                        <input type="number" 
                               name="min_price" 
                               class="form-control" 
                               placeholder="Rp 0"
                               value="{{ request('min_price') }}"
                               style="border-color: #8b4513;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Maksimum</label>
                        <input type="number" 
                               name="max_price" 
                               class="form-control" 
                               placeholder="Rp 1.000.000"
                               value="{{ request('max_price') }}"
                               style="border-color: #8b4513;">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Reset</a>
                    <button type="submit" class="btn btn-brown">Terapkan Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .product-image img {
        transition: transform 0.3s ease;
    }
    
    .product-image img:hover {
        transform: scale(1.1);
    }
    
    .table-custom tbody tr {
        transition: all 0.2s ease;
    }
    
    .table-custom tbody tr:hover {
        background-color: rgba(139, 69, 19, 0.05);
        transform: translateX(5px);
    }
    
    .pagination .page-link {
        color: #8b4513;
        border-color: #8b4513;
    }
    
    .pagination .page-item.active .page-link {
        background-color: #8b4513;
        border-color: #8b4513;
        color: white;
    }
    
    .pagination .page-link:hover {
        background-color: rgba(139, 69, 19, 0.1);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Table row click effect
        const tableRows = document.querySelectorAll('.table-custom tbody tr');
        tableRows.forEach(row => {
            row.style.cursor = 'pointer';
            
            row.addEventListener('click', function(e) {
                // Don't trigger if clicking on buttons or links
                if (!e.target.closest('a') && !e.target.closest('button') && !e.target.closest('form')) {
                    const productId = this.querySelector('a[href*="show"]')?.getAttribute('href').split('/').pop();
                    if (productId) {
                        window.location.href = '{{ url("admin/products") }}/' + productId;
                    }
                }
            });
        });
    });
</script>
@endsection