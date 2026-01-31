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
<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-100 p-lr-0-lg">
        <a href="{{ route('home') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="{{ route('products.index') }}" class="stext-109 cl8 hov-cl1 trans-04">
            Produk
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        {{-- PERBAIKAN: Cek apakah relasi kategori ada DAN bisa diakses --}}
        @php
            // Cek apakah relasi kategori dimuat dan tersedia
            $kategori = $product->kategori; // Ini adalah relasi object (jika dengan() atau load())
        @endphp
        
        @if($kategori && is_object($kategori) && property_exists($kategori, 'id'))
            <a href="{{ route('products.index', ['kategori' => $kategori->id]) }}" class="stext-109 cl8 hov-cl1 trans-04">
                {{ $kategori->nama_kategori }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
        @elseif($product->kategori && is_numeric($product->kategori))
            {{-- Jika $product->kategori adalah integer (foreign key) --}}
            @php
                // Coba ambil kategori dari database
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
                                // Siapkan array semua gambar
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
                                           name="num-product" value="1" id="quantity-main" min="{{ max(1, $product->min_beli ?? 1) }}">

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
        // Quantity handler
        $('.btn-num-product-down').on('click', function(e){
            e.preventDefault();
            var numProduct = Number($(this).next().val());
            if(numProduct > {{ max(1, $product->min_beli ?? 1) }}) {
                $(this).next().val(numProduct - 1);
            }
        });

        $('.btn-num-product-up').on('click', function(e){
            e.preventDefault();
            var numProduct = Number($(this).prev().val());
            $(this).prev().val(numProduct + 1);
        });

        // WhatsApp handler for detail page
        $('.js-whatsapp-main').on('click', function(e) {
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
            var quantity = $('#quantity-main').val();
            
            // Build WhatsApp message
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
    });
</script>
@endpush