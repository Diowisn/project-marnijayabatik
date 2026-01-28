@extends('layouts.admin')

@section('title', 'Edit Produk')
@section('page-title', 'Edit Produk')

@section('page-actions')
<a href="{{ route('admin.products.index') }}" class="btn btn-outline-brown">
    <i class="bi bi-arrow-left"></i> Kembali
</a>
@endsection

@section('content')
@php
    // Helper function untuk cek file exists
    function checkImage($path) {
        return file_exists(public_path($path));
    }
@endphp

<div class="row">
    <div class="col-lg-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header card-header-custom">
                <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Produk</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.update', $product->id_produk) }}" method="POST" enctype="multipart/form-data" id="productForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-4">
                        <!-- Basic Information -->
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header bg-light border-bottom">
                                    <h6 class="mb-0"><i class="bi bi-info-circle me-2"></i>Informasi Dasar</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label required">Nama Produk</label>
                                            <input type="text" 
                                                   name="nama_produk" 
                                                   class="form-control @error('nama_produk') is-invalid @enderror" 
                                                   value="{{ old('nama_produk', $product->nama_produk) }}"
                                                   required
                                                   style="border-color: #8b4513;">
                                            @error('nama_produk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label required">Kategori</label>
                                            <select name="kategori" 
                                                    class="form-select @error('kategori') is-invalid @enderror"
                                                    style="border-color: #8b4513;">
                                                <option value="">Pilih Kategori</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ (old('kategori', $product->kategori) == $category->id) ? 'selected' : '' }}>
                                                        {{ $category->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kategori')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Motif</label>
                                            <select name="motif_id" 
                                                    class="form-select @error('motif_id') is-invalid @enderror"
                                                    style="border-color: #8b4513;">
                                                <option value="">Pilih Motif</option>
                                                @foreach($motifs as $motif)
                                                    <option value="{{ $motif->id }}" {{ (old('motif_id', $product->motif_id) == $motif->id) ? 'selected' : '' }}>
                                                        {{ $motif->nama_motif }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('motif_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label required">Harga (Rp)</label>
                                            <input type="number" 
                                                   name="harga" 
                                                   class="form-control @error('harga') is-invalid @enderror" 
                                                   value="{{ old('harga', $product->harga) }}"
                                                   min="0"
                                                   step="100"
                                                   required
                                                   style="border-color: #8b4513;">
                                            @error('harga')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label required">Stok</label>
                                            <input type="number" 
                                                   name="stok" 
                                                   class="form-control @error('stok') is-invalid @enderror" 
                                                   value="{{ old('stok', $product->stok) }}"
                                                   min="0"
                                                   required
                                                   style="border-color: #8b4513;">
                                            @error('stok')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-12">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi" 
                                                      class="form-control @error('deskripsi') is-invalid @enderror" 
                                                      rows="4"
                                                      style="border-color: #8b4513;">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Additional Information -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header bg-light border-bottom">
                                    <h6 class="mb-0"><i class="bi bi-tags me-2"></i>Informasi Tambahan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Berat (gram)</label>
                                            <input type="number" 
                                                   name="berat" 
                                                   class="form-control" 
                                                   value="{{ old('berat', $product->berat) }}"
                                                   min="0"
                                                   step="10"
                                                   style="border-color: #8b4513;">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Minimal Beli</label>
                                            <input type="number" 
                                                   name="min_beli" 
                                                   class="form-control" 
                                                   value="{{ old('min_beli', $product->min_beli) }}"
                                                   min="1"
                                                   style="border-color: #8b4513;">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Jenis Kain</label>
                                            <input type="text" 
                                                   name="jenis_kain" 
                                                   class="form-control" 
                                                   value="{{ old('jenis_kain', $product->jenis_kain) }}"
                                                   style="border-color: #8b4513;">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Etalase</label>
                                            <select name="etalase" class="form-select" style="border-color: #8b4513;">
                                                <option value="">Pilih Etalase</option>
                                                <option value="Kain Batik Tulis" {{ (old('etalase', $product->etalase) == 'Kain Batik Tulis') ? 'selected' : '' }}>Kain Batik Tulis</option>
                                                <option value="Kain Batik Cap" {{ (old('etalase', $product->etalase) == 'Kain Batik Cap') ? 'selected' : '' }}>Kain Batik Cap</option>
                                                <option value="Kain Batik Printing" {{ (old('etalase', $product->etalase) == 'Kain Batik Printing') ? 'selected' : '' }}>Kain Batik Printing</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Ukuran</label>
                                            <input type="text" 
                                                   name="ukuran" 
                                                   class="form-control" 
                                                   value="{{ old('ukuran', $product->ukuran) }}"
                                                   style="border-color: #8b4513;">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">Panjang Tali</label>
                                            <input type="text" 
                                                   name="panjang_tali" 
                                                   class="form-control" 
                                                   value="{{ old('panjang_tali', $product->panjang_tali) }}"
                                                   style="border-color: #8b4513;">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label class="form-label">Proses Batik</label>
                                            <select name="proses_batik" class="form-select" style="border-color: #8b4513;">
                                                <option value="">Pilih Proses Batik</option>
                                                <option value="Tulis, manual" {{ (old('proses_batik', $product->proses_batik) == 'Tulis, manual') ? 'selected' : '' }}>Tulis, manual</option>
                                                <option value="Print, mesin" {{ (old('proses_batik', $product->proses_batik) == 'Print, mesin') ? 'selected' : '' }}>Print, mesin</option>
                                                <option value="Cap, manual" {{ (old('proses_batik', $product->proses_batik) == 'Cap, manual') ? 'selected' : '' }}>Cap, manual</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Image Upload -->
                        <div class="col-lg-4">
                            <!-- Main Image (SINGLE) -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header bg-light border-bottom">
                                    <h6 class="mb-0"><i class="bi bi-image me-2"></i>Gambar Utama</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Current Image -->
                                    <div class="text-center mb-3">
                                        <div id="mainImagePreview" 
                                             class="border rounded d-flex align-items-center justify-content-center mx-auto"
                                             style="width: 200px; height: 200px; background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%); overflow: hidden;">
                                            @if($product->gambar && checkImage('images/products/' . $product->gambar))
                                                <img src="{{ asset('images/products/' . $product->gambar) }}" 
                                                     alt="{{ $product->nama_produk }}"
                                                     class="img-fluid image-preview"
                                                     id="currentMainImage">
                                            @else
                                                <i class="bi bi-image display-4" style="color: #8b4513; opacity: 0.5;"></i>
                                            @endif
                                        </div>
                                        @if($product->gambar)
                                            <small class="text-muted mt-2 d-block">
                                                Gambar saat ini: {{ $product->gambar }}
                                            </small>
                                        @endif
                                    </div>
                                    
                                    <!-- New Image Upload -->
                                    <div class="mb-3">
                                        <label class="form-label">Ganti Gambar Utama</label>
                                        <input type="file" 
                                               name="gambar" 
                                               id="mainImageInput" 
                                               class="form-control @error('gambar') is-invalid @enderror" 
                                               accept="image/*"
                                               style="border-color: #8b4513;">
                                        <div class="form-text">Kosongkan jika tidak ingin mengganti gambar. Format: JPEG, PNG, JPG, GIF, WEBP. Max: 2MB</div>
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Remove Current Image Option -->
                                    @if($product->gambar && checkImage('images/products/' . $product->gambar))
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="remove_main_image" 
                                               value="1" 
                                               id="removeMainImage">
                                        <label class="form-check-label text-danger" for="removeMainImage">
                                            Hapus gambar saat ini
                                        </label>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Detail Image 1 (SINGLE) -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header bg-light border-bottom">
                                    <h6 class="mb-0"><i class="bi bi-image me-2"></i>Gambar Detail 1</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Current Image -->
                                    <div class="text-center mb-3">
                                        <div id="detail1ImagePreview" 
                                             class="border rounded d-flex align-items-center justify-content-center mx-auto"
                                             style="width: 200px; height: 200px; background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%); overflow: hidden;">
                                            @if($product->gambar_detail && checkImage('images/products/detail/' . $product->gambar_detail))
                                                <img src="{{ asset('images/products/detail/' . $product->gambar_detail) }}" 
                                                     alt="Detail 1"
                                                     class="img-fluid image-preview"
                                                     id="currentDetail1Image">
                                            @else
                                                <i class="bi bi-image display-4" style="color: #8b4513; opacity: 0.5;"></i>
                                            @endif
                                        </div>
                                        @if($product->gambar_detail)
                                            <small class="text-muted mt-2 d-block">
                                                Gambar detail 1 saat ini
                                            </small>
                                        @endif
                                    </div>
                                    
                                    <!-- New Image Upload -->
                                    <div class="mb-3">
                                        <label class="form-label">Ganti Gambar Detail 1</label>
                                        <input type="file" 
                                               name="gambar_detail" 
                                               id="detail1ImageInput" 
                                               class="form-control" 
                                               accept="image/*"
                                               style="border-color: #8b4513;">
                                        <div class="form-text">Kosongkan jika tidak ingin mengganti gambar</div>
                                    </div>
                                    
                                    <!-- Remove Current Image Option -->
                                    @if($product->gambar_detail && checkImage('images/products/detail/' . $product->gambar_detail))
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="remove_detail1_image" 
                                               value="1" 
                                               id="removeDetail1Image">
                                        <label class="form-check-label text-danger" for="removeDetail1Image">
                                            Hapus gambar detail 1
                                        </label>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Detail Image 2 (SINGLE) -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header bg-light border-bottom">
                                    <h6 class="mb-0"><i class="bi bi-image me-2"></i>Gambar Detail 2</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Current Image -->
                                    <div class="text-center mb-3">
                                        <div id="detail2ImagePreview" 
                                             class="border rounded d-flex align-items-center justify-content-center mx-auto"
                                             style="width: 200px; height: 200px; background: linear-gradient(135deg, rgba(139, 69, 19, 0.1) 0%, rgba(139, 69, 19, 0.2) 100%); overflow: hidden;">
                                            @if($product->gambar_detail2 && checkImage('images/products/detail2/' . $product->gambar_detail2))
                                                <img src="{{ asset('images/products/detail2/' . $product->gambar_detail2) }}" 
                                                     alt="Detail 2"
                                                     class="img-fluid image-preview"
                                                     id="currentDetail2Image">
                                            @else
                                                <i class="bi bi-image display-4" style="color: #8b4513; opacity: 0.5;"></i>
                                            @endif
                                        </div>
                                        @if($product->gambar_detail2)
                                            <small class="text-muted mt-2 d-block">
                                                Gambar detail 2 saat ini
                                            </small>
                                        @endif
                                    </div>
                                    
                                    <!-- New Image Upload -->
                                    <div class="mb-3">
                                        <label class="form-label">Ganti Gambar Detail 2</label>
                                        <input type="file" 
                                               name="gambar_detail2" 
                                               id="detail2ImageInput" 
                                               class="form-control" 
                                               accept="image/*"
                                               style="border-color: #8b4513;">
                                        <div class="form-text">Kosongkan jika tidak ingin mengganti gambar</div>
                                    </div>
                                    
                                    <!-- Remove Current Image Option -->
                                    @if($product->gambar_detail2 && checkImage('images/products/detail2/' . $product->gambar_detail2))
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="remove_detail2_image" 
                                               value="1" 
                                               id="removeDetail2Image">
                                        <label class="form-check-label text-danger" for="removeDetail2Image">
                                            Hapus gambar detail 2
                                        </label>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-brown btn-lg" id="submitBtn">
                                    <i class="bi bi-check-circle me-2"></i>Update Produk
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .required:after {
        content: " *";
        color: #dc3545;
    }
    
    .image-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }
    
    #mainImagePreview, #detail1ImagePreview, #detail2ImagePreview {
        border: 2px solid #8b4513;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const mainImageInput = document.getElementById('mainImageInput');
    const mainImagePreview = document.getElementById('mainImagePreview');
    const currentMainImage = document.getElementById('currentMainImage');
    const removeMainImageCheckbox = document.getElementById('removeMainImage');
    
    const detail1ImageInput = document.getElementById('detail1ImageInput');
    const detail1ImagePreview = document.getElementById('detail1ImagePreview');
    const currentDetail1Image = document.getElementById('currentDetail1Image');
    const removeDetail1ImageCheckbox = document.getElementById('removeDetail1Image');
    
    const detail2ImageInput = document.getElementById('detail2ImageInput');
    const detail2ImagePreview = document.getElementById('detail2ImagePreview');
    const currentDetail2Image = document.getElementById('currentDetail2Image');
    const removeDetail2ImageCheckbox = document.getElementById('removeDetail2Image');
    
    const form = document.getElementById('productForm');
    const submitBtn = document.getElementById('submitBtn');
    
    // Main Image Preview
    mainImageInput.addEventListener('change', function(e) {
        handleImagePreview(this, mainImagePreview, currentMainImage);
    });
    
    // Detail Image 1 Preview
    detail1ImageInput.addEventListener('change', function(e) {
        handleImagePreview(this, detail1ImagePreview, currentDetail1Image);
    });
    
    // Detail Image 2 Preview
    detail2ImageInput.addEventListener('change', function(e) {
        handleImagePreview(this, detail2ImagePreview, currentDetail2Image);
    });
    
    // Function to handle single image preview
    function handleImagePreview(input, previewContainer, currentImageElement) {
        const file = input.files[0];
        if (file) {
            // Check file size
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran gambar maksimal 2MB');
                input.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                if (currentImageElement) {
                    currentImageElement.src = e.target.result;
                } else {
                    previewContainer.innerHTML = `<img src="${e.target.result}" class="image-preview">`;
                }
            };
            reader.readAsDataURL(file);
        }
    }
    
    // Handle remove image checkboxes
    [removeMainImageCheckbox, removeDetail1ImageCheckbox, removeDetail2ImageCheckbox].forEach(checkbox => {
        if (checkbox) {
            checkbox.addEventListener('change', function() {
                const inputId = this.id.replace('remove', '').replace('Image', '');
                const input = document.getElementById(inputId.toLowerCase() + 'ImageInput');
                const preview = document.getElementById(inputId.toLowerCase() + 'ImagePreview');
                
                if (this.checked) {
                    preview.innerHTML = '<i class="bi bi-image display-4" style="color: #8b4513; opacity: 0.5;"></i>';
                    if (input) input.disabled = true;
                } else {
                    if (input) input.disabled = false;
                    // Note: You might want to restore the original image here
                }
            });
        }
    });
    
    // Form validation
    form.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Reset previous error states
        const errorElements = form.querySelectorAll('.is-invalid');
        errorElements.forEach(el => el.classList.remove('is-invalid'));
        
        // Validate required fields
        const requiredFields = form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            }
        });
        
        // Validate image sizes
        const imageInputs = [mainImageInput, detail1ImageInput, detail2ImageInput];
        imageInputs.forEach(input => {
            if (input && input.files[0] && input.files[0].size > 2 * 1024 * 1024) {
                input.classList.add('is-invalid');
                isValid = false;
                alert(`Ukuran gambar ${input.name} maksimal 2MB`);
            }
        });
        
        // Validate price and stock
        const harga = form.querySelector('input[name="harga"]');
        const stok = form.querySelector('input[name="stok"]');
        
        if (harga.value && parseFloat(harga.value) < 0) {
            harga.classList.add('is-invalid');
            isValid = false;
            alert('Harga tidak boleh negatif');
        }
        
        if (stok.value && parseInt(stok.value) < 0) {
            stok.classList.add('is-invalid');
            isValid = false;
            alert('Stok tidak boleh negatif');
        }
        
        if (!isValid) {
            e.preventDefault();
            const firstError = form.querySelector('.is-invalid');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        } else {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Menyimpan...';
        }
        
        return isValid;
    });
});
</script>
@endsection