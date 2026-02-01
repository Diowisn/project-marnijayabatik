@extends('layouts.app2')

@section('title', $product->nama_produk . ' - Batik Marni Jaya')

@section('sidebar-gallery')
<div class="sidebar-gallery w-full p-tb-30">
    <span class="mtext-101 cl5">
        Galeri Produk
    </span>

    <div class="flex-w flex-sb p-t-36 gallery-lb">
        @php
            // Ambil gambar produk untuk gallery sidebar
            $galleryImages = [];
            foreach($products as $product) {
                if($product->gambar) {
                    $galleryImages[] = $product->gambar;
                }
                if($product->gambar_detail) {
                    $galleryImages[] = $product->gambar_detail;
                }
                if($product->gambar_detail2) {
                    $galleryImages[] = $product->gambar_detail2;
                }
            }
            $galleryImages = array_slice(array_unique($galleryImages), 0, 9);
        @endphp
        
        @foreach($galleryImages as $index => $image)
            @php
                // Cek path gambar
                $imagePath = 'images/products/' . $image;
                if (!file_exists(public_path($imagePath))) {
                    $imagePath = 'images/products/detail/' . $image;
                }
                if (!file_exists(public_path($imagePath))) {
                    $imagePath = 'images/products/detail2/' . $image;
                }
            @endphp
            
            @if(file_exists(public_path($imagePath)))
            <!-- item gallery sidebar -->
            <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="{{ asset($imagePath) }}" data-lightbox="gallery" 
                style="background-image: url('{{ asset($imagePath) }}');"></a>
            </div>
            @else
            <!-- item gallery sidebar default -->
            <div class="wrap-item-gallery m-b-10">
                <a class="item-gallery bg-img1" href="{{ asset('images/gallery-0' . (($index % 9) + 1) . '.jpg') }}" data-lightbox="gallery" 
                style="background-image: url('{{ asset('images/gallery-0' . (($index % 9) + 1) . '.jpg') }}');"></a>
            </div>
            @endif
        @endforeach
    </div>
</div>
@endsection

@section('sidebar-about')
<div class="sidebar-gallery w-full">
    <span class="mtext-101 cl5">
        Tentang Batik Marni Jaya
    </span>

    <p class="stext-108 cl6 p-t-27">
        Batik adalah kain Budaya Jawa Indonesia bergambar yang pembuatannya secara khusus dengan menuliskan atau menerakan malam pada kain itu, kemudian pengolahannya diproses dengan cara tertentu yang memiliki kekhasan. sebagai keseluruhan teknik, teknologi, serta pengembangan motif dan budaya yang terkait, oleh UNESCO telah ditetapkan sebagai Warisan Kemanusiaan untuk Budaya Lisan dan Nonbendawi sejak 2 Oktober 2009. Sejak saat itu, 2 Oktober ditetapkan sebagai Hari Batik Nasional.
    </p>
</div>
@endsection

@section('content')
<!-- Title page -->
<div class="head-konten bg-img1" style="background-image: url('{{ asset('assets/images/about/bg-01.jpg') }}'); ">
    <section class="txt-center p-lr-15 p-tb-92" style="background: rgba(0, 0, 0, 0.3);">
        <h2 class="ltext-105 cl0 txt-center">
            Produk Detail
        </h2>
    </section>
</div>	

<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-55 p-lr-0-lg">
        <a href="{{ route('home') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="{{ route('products.index') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Produk
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        @php
            $kategori = $product->kategori;
        @endphp
        
        @if($kategori && is_object($kategori) && property_exists($kategori, 'id'))
            <a href="{{ route('products.index', ['kategori' => $kategori->id]) }}" class="stext-109 cl8 hov-cl1 trans-04">
                {{ $kategori->nama_kategori }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
        @elseif($product->kategori && is_numeric($product->kategori))
            @php
                $kategoriModel = \App\Models\Category::find($product->kategori);
            @endphp
            @if($kategoriModel)
                <a href="{{ route('products.index', ['kategori' => $kategoriModel->id]) }}" class="stext-109 cl8 hov-cl1 trans-04">
                    {{ $kategoriModel->nama_kategori }}
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>
            @endif
        @endif

        <span class="stext-109 cl4">
            {{ $product->nama_produk }}
        </span>
    </div>
</div>
    
<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            @php
                                $allImages = [];
                                
                                // Gambar utama
                                $gambarUtama = $product->gambar ?: 'default.jpeg';
                                $allImages[] = [
                                    'type' => 'main',
                                    'path' => 'images/products/' . $gambarUtama,
                                    'thumb' => 'images/products/' . $gambarUtama
                                ];
                                
                                // Gambar detail
                                if (!empty($gambarDetailArray)) {
                                    foreach ($gambarDetailArray as $gambar) {
                                        $allImages[] = [
                                            'type' => 'detail',
                                            'path' => 'images/products/detail/' . $gambar,
                                            'thumb' => 'images/products/detail/' . $gambar
                                        ];
                                    }
                                }
                                
                                // Gambar detail2
                                if (!empty($gambarDetail2Array)) {
                                    foreach ($gambarDetail2Array as $gambar) {
                                        $allImages[] = [
                                            'type' => 'detail2',
                                            'path' => 'images/products/detail2/' . $gambar,
                                            'thumb' => 'images/products/detail2/' . $gambar
                                        ];
                                    }
                                }
                            @endphp
                            
                            @foreach($allImages as $image)
                            <div class="item-slick3" data-thumb="{{ asset($image['thumb']) }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset($image['path']) }}" alt="{{ $product->nama_produk }}">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" 
                                       href="{{ asset($image['path']) }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{ $product->nama_produk }}
                    </h4>

                    <span class="mtext-106 cl2">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </span>

                    <!-- Informasi tambahan -->
                    <div class="stext-102 cl3 p-t-10">
                        @if($product->kategori && is_object($product->kategori))
                            <span class="cl6 size-206">{{ $product->kategori->nama_kategori }}</span>
                        @else
                            <span class="cl6 size-206">
                                {{ \App\Models\Category::find($product->kategori)->nama_kategori ?? 'Tidak ada kategori' }}
                            </span>
                        @endif
                        
                        @if($product->motif)
                        <div class="flex-w flex-t p-b-5">
                            <span class="cl3 size-205" style="width: 100px;">Motif:</span>
                            <span class="cl6 size-206">{{ $product->motif->nama_motif }}</span>
                        </div>
                        @endif
                        
                        @if($product->berat)
                        <div class="flex-w flex-t p-b-5">
                            <span class="cl3 size-205" style="width: 100px;">Berat:</span>
                            <span class="cl6 size-206">{{ $product->berat }} gram</span>
                        </div>
                        @endif
                        
                        @if($product->jenis_kain)
                        <div class="flex-w flex-t p-b-5">
                            <span class="cl3 size-205" style="width: 100px;">Bahan:</span>
                            <span class="cl6 size-206">{{ $product->jenis_kain }}</span>
                        </div>
                        @endif
                        
                        @if($product->ukuran)
                        <div class="flex-w flex-t p-b-5">
                            <span class="cl3 size-205" style="width: 100px;">Ukuran:</span>
                            <span class="cl6 size-206">{{ $product->ukuran }} cm</span>
                        </div>
                        @endif
                        
                        @if($product->panjang_tali)
                        <div class="flex-w flex-t p-b-5">
                            <span class="cl3 size-205" style="width: 100px;">Panjang Tali:</span>
                            <span class="cl6 size-206">{{ $product->panjang_tali }} cm</span>
                        </div>
                        @endif
                    </div>

                    <p class="stext-102 cl3 p-t-23">
                        {{ $product->deskripsi }}
                    </p>
                    
                    <!-- Quantity dan Add to Cart -->
                    <div class="p-t-33">
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" 
                                           name="num-product" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>

                                <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-whatsapp-main"
                                        data-product-id="{{ $product->id_produk }}"
                                        data-product-name="{{ $product->nama_produk }}"
                                        data-product-price="{{ $product->harga }}"
                                        data-product-category="{{ $product->kategori->nama_kategori ?? '' }}"
                                        data-product-motif="{{ $product->motif->nama_motif ?? '' }}"
                                        data-product-berat="{{ $product->berat }} gram"
                                        data-product-bahan="{{ $product->jenis_kain }}"
                                        data-product-ukuran="{{ $product->ukuran }} cm"
                                        data-product-panjang="{{ $product->panjang_tali }} cm"
                                        data-product-desc="{{ $product->deskripsi }}">
                                    Pesan Via WhatsApp
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Deskripsi</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Informasi Tambahan</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- Description -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {{ $product->deskripsi }}
                            </p>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    @if($product->berat)
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Berat
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->berat }} gram
                                        </span>
                                    </li>
                                    @endif

                                    @if($product->ukuran)
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Ukuran
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->ukuran }} cm
                                        </span>
                                    </li>
                                    @endif

                                    @if($product->jenis_kain)
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Bahan
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->jenis_kain }}
                                        </span>
                                    </li>
                                    @endif

                                    @if($product->motif)
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Motif
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->motif->nama_motif }}
                                        </span>
                                    </li>
                                    @endif

                                    @if($product->proses_batik)
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Proses Batik
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->proses_batik }}
                                        </span>
                                    </li>
                                    @endif
                                    
                                    @if($product->etalase)
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Etalase
                                        </span>
                                        <span class="stext-102 cl6 size-206">
                                            {{ $product->etalase }}
                                        </span>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <span class="stext-107 cl6 p-lr-25">
                Kategori: {{ $product->kategori->nama_kategori ?? 'Tidak ada kategori' }}
            </span>
            
            @if($product->stok)
            <span class="stext-107 cl6 p-lr-25">
                Stok: {{ $product->stok }} pcs
            </span>
            @endif
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Produk Terkait
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach($relatedProducts as $related)
                    @php
                        // Tentukan gambar utama
                        $relatedGambar = $related->gambar ?: 'default.jpeg';
                        $relatedGambarPath = public_path('images/products/' . $relatedGambar);
                        
                        if (!file_exists($relatedGambarPath) || empty($related->gambar)) {
                            $relatedGambar = 'default.jpeg';
                        }
                    @endphp
                    
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('images/products/' . $relatedGambar) }}" 
                                     alt="{{ $related->nama_produk }}">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"
                                    data-product-id="{{ $related->id_produk }}"
                                    data-product-name="{{ $related->nama_produk }}"
                                    data-product-price="{{ $related->harga }}"
                                    data-product-desc="{{ $related->deskripsi }}"
                                    data-product-category="{{ $related->kategori->nama_kategori ?? '' }}"  
                                    data-product-motif="{{ $related->motif->nama_motif ?? '' }}"        
                                    data-product-berat="{{ $related->berat }} gram"        
                                    data-product-bahan="{{ $related->jenis_kain }}"
                                    data-product-ukuran="{{ $related->ukuran }} cm"        
                                    data-product-panjang="{{ $related->panjang_tali }} cm"
                                    data-product-image="{{ $relatedGambar }}"
                                    data-product-detail1="{{ $related->gambar_detail }}"
                                    data-product-detail2="{{ $related->gambar_detail2 }}">
                                    Lihat Detail
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l">
                                    <a href="{{ route('products.show', $related->id_produk) }}" 
                                       class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $related->nama_produk }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        Rp {{ number_format($related->harga, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <button class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 js-whatsapp-direct"
                                        data-product-name="{{ $related->nama_produk }}"
                                        data-product-price="{{ $related->harga }}">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // ========================================
    // QUANTITY BUTTONS - MAIN PRODUCT (HALAMAN SHOW)
    // ========================================
    $('.sec-product-detail .btn-num-product-down').off('click').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        var $input = $(this).next('.num-product');
        var numProduct = Number($input.val());
        if(numProduct > 1) {
            $input.val(numProduct - 1);
        }
    });

    $('.sec-product-detail .btn-num-product-up').off('click').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        var $input = $(this).prev('.num-product');
        var numProduct = Number($input.val());
        $input.val(numProduct + 1);
    });

    // ========================================
    // WHATSAPP HANDLER - MAIN PRODUCT
    // ========================================
    $('.js-whatsapp-main').off('click').on('click', function(e) {
        e.preventDefault();
        
        var productName = $(this).data('product-name');
        var productPrice = $(this).data('product-price');
        var productCategory = $(this).data('product-category');
        var productMotif = $(this).data('product-motif');
        var productBerat = $(this).data('product-berat');
        var productBahan = $(this).data('product-bahan');
        var productUkuran = $(this).data('product-ukuran');
        var productPanjang = $(this).data('product-panjang');
        var productDesc = $(this).data('product-desc');
        var quantity = $('.sec-product-detail .num-product').first().val();
        
        var message = `Halo, saya tertarik dengan produk:\n\n` +
                     `📦 *${productName}*\n` +
                     `💰 Harga: Rp ${parseInt(productPrice).toLocaleString('id-ID')}\n` +
                     `📋 Kategori: ${productCategory}\n` +
                     `🎨 Motif: ${productMotif}\n` +
                     `⚖️ Berat: ${productBerat}\n` +
                     `🧵 Bahan: ${productBahan}\n` +
                     `📏 Ukuran: ${productUkuran}\n` +
                     `📐 Panjang Tali: ${productPanjang}\n` +
                     `🔢 Jumlah: ${quantity} pcs\n` +
                     `📝 Deskripsi: ${productDesc.substring(0, 100)}...\n\n` +
                     `Apakah produk ini tersedia?`;
        
        var whatsappUrl = `https://api.whatsapp.com/send?phone=6282323259808&text=${encodeURIComponent(message)}`;
        window.open(whatsappUrl, '_blank');
    });

    // ========================================
    // MODAL FUNCTIONALITY - PRODUK TERKAIT
    // ========================================
    
    // Show modal when clicking "Lihat Detail" pada produk terkait
    $(document).on('click', '.js-show-modal1', function(e) {
        e.preventDefault();
        
        // Get product data from data attributes
        const productName = $(this).data('product-name');
        const productPrice = $(this).data('product-price');
        const productDesc = $(this).data('product-desc');
        const productCategory = $(this).data('product-category');
        const productMotif = $(this).data('product-motif');
        const productBerat = $(this).data('product-berat');
        const productBahan = $(this).data('product-bahan');
        const productUkuran = $(this).data('product-ukuran');
        const productPanjang = $(this).data('product-panjang');
        const productImage = $(this).data('product-image');
        const productDetail1 = $(this).data('product-detail1');
        const productDetail2 = $(this).data('product-detail2');
        
        // Update modal content
        $('#modal-related-product-name').text(productName);
        $('#modal-related-product-price').text('Rp ' + parseInt(productPrice).toLocaleString('id-ID'));
        $('#modal-related-product-desc').text(productDesc || 'Tidak ada deskripsi');
        $('#modal-related-product-category').text(productCategory || '-');
        $('#modal-related-product-motif').text(productMotif || '-');
        $('#modal-related-product-berat').text(productBerat || '-');
        $('#modal-related-product-bahan').text(productBahan || '-');
        $('#modal-related-product-ukuran').text(productUkuran || '-');
        $('#modal-related-product-panjang').text(productPanjang || '-');
        
        // ========================================
        // PERBAIKAN BUG: Destroy slider dan hapus semua gambar lama
        // ========================================
        
        // Destroy existing slick if initialized - GUNAKAN ID
        if ($('#slick3-related').hasClass('slick-initialized')) {
            $('#slick3-related').slick('unslick');
        }
        
        // PENTING: Hapus semua HTML lama dari slider - GUNAKAN ID
        $('#slick3-related').empty();
        $('#wrap-slick3-dots-related').empty();
        $('#wrap-slick3-arrows-related').empty();
        
        // Build image gallery - HANYA untuk produk ini
        let imageHtml = '';
        const baseUrl = '{{ asset("") }}';
        
        // Main image
        if (productImage && productImage !== 'null' && productImage !== '' && productImage !== null) {
            const mainImageUrl = baseUrl + 'images/products/' + productImage;
            imageHtml += `
                <div class="item-slick3" data-thumb="${mainImageUrl}">
                    <div class="wrap-pic-w pos-relative">
                        <img src="${mainImageUrl}" alt="IMG-PRODUCT">
                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="${mainImageUrl}">
                            <i class="fa fa-expand"></i>
                        </a>
                    </div>
                </div>
            `;
        }
        
        // Detail image 1
        if (productDetail1 && productDetail1 !== 'null' && productDetail1 !== '' && productDetail1 !== null && productDetail1 !== 'undefined') {
            const detail1Url = baseUrl + 'images/products/detail/' + productDetail1;
            imageHtml += `
                <div class="item-slick3" data-thumb="${detail1Url}">
                    <div class="wrap-pic-w pos-relative">
                        <img src="${detail1Url}" alt="IMG-PRODUCT">
                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="${detail1Url}">
                            <i class="fa fa-expand"></i>
                        </a>
                    </div>
                </div>
            `;
        }
        
        // Detail image 2
        if (productDetail2 && productDetail2 !== 'null' && productDetail2 !== '' && productDetail2 !== null && productDetail2 !== 'undefined') {
            const detail2Url = baseUrl + 'images/products/detail2/' + productDetail2;
            imageHtml += `
                <div class="item-slick3" data-thumb="${detail2Url}">
                    <div class="wrap-pic-w pos-relative">
                        <img src="${detail2Url}" alt="IMG-PRODUCT">
                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="${detail2Url}">
                            <i class="fa fa-expand"></i>
                        </a>
                    </div>
                </div>
            `;
        }
        
        // Insert fresh images into slider - GUNAKAN ID
        $('#slick3-related').html(imageHtml);
        
        // Small delay to ensure DOM is updated
        setTimeout(function() {
            // Initialize slick slider with fresh content - GUNAKAN ID
            $('#slick3-related').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                infinite: true,
                autoplay: false,
                autoplaySpeed: 6000,
                arrows: true,
                appendArrows: $('#wrap-slick3-arrows-related'),
                prevArrow:'<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                nextArrow:'<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
                dots: true,
                appendDots: $('#wrap-slick3-dots-related'),
                dotsClass:'slick3-dots',
                customPaging: function(slick, index) {
                    var portrait = $(slick.$slides[index]).data('thumb');
                    return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
                },  
            });
            
            // Re-initialize magnific popup for modal gallery - GUNAKAN ID
            $('#slick3-related').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        }, 100);
        
        // Store product data for WhatsApp
        $('.js-whatsapp-modal-related').data({
            'product-name': productName,
            'product-price': productPrice
        });
        
        // Reset quantity
        $('#quantity-input-related').val(1);
        
        // Show modal
        $('.js-modal-related').addClass('show-modal1');
    });
    
    // Hide modal
    $('.js-hide-modal-related, .js-modal-related .overlay-modal1').on('click', function() {
        $('.js-modal-related').removeClass('show-modal1');
        
        // Cleanup saat modal ditutup - GUNAKAN ID
        if ($('#slick3-related').hasClass('slick-initialized')) {
            $('#slick3-related').slick('unslick');
        }
        $('#slick3-related').empty();
        $('#wrap-slick3-dots-related').empty();
        $('#wrap-slick3-arrows-related').empty();
    });
    
    // WhatsApp integration from modal
    $(document).on('click', '.js-whatsapp-modal-related', function(e) {
        e.preventDefault();
        
        const productName = $(this).data('product-name');
        const productPrice = $(this).data('product-price');
        const quantity = $('#quantity-input-related').val() || 1;
        const phone = '6282323259808';
        
        const message = `Halo, saya tertarik dengan produk:\n\n` +
                      `Nama: ${productName}\n` +
                      `Harga: Rp ${parseInt(productPrice).toLocaleString('id-ID')}\n` +
                      `Jumlah: ${quantity}\n\n` +
                      `Apakah produk ini tersedia?`;
        
        const whatsappUrl = `https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(message)}`;
        window.open(whatsappUrl, '_blank');
        
        // Close modal and cleanup - GUNAKAN ID
        $('.js-modal-related').removeClass('show-modal1');
        if ($('#slick3-related').hasClass('slick-initialized')) {
            $('#slick3-related').slick('unslick');
        }
        $('#slick3-related').empty();
        $('#wrap-slick3-dots-related').empty();
        $('#wrap-slick3-arrows-related').empty();
    });
    
    // Quantity buttons - Modal Related - GUNAKAN CLASS JS KHUSUS
    $(document).on('click', '.js-btn-minus-related', function(){
        var numProduct = Number($(this).next().val());
        if(numProduct > 1) $(this).next().val(numProduct - 1);
    });

    $(document).on('click', '.js-btn-plus-related', function(){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });
});
</script>
@endpush