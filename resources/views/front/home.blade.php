@extends('layouts.app')

@section('title', 'Batik Marni Jaya - Beranda')

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
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1 rs2-slick1">
            <div class="slick1">
                <div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('assets/banner/slide-08.jpg') }});" data-thumb="{{ asset('assets/banner/thumb-04.jpg') }}" data-caption="Batik Marni Jaya">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    Koleksi Batik Marni Jaya
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    Batik Tulis
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="{{ route('products.index') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    Beli Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('assets/banner/slide-09.jpg') }});" data-thumb="{{ asset('assets/banner/thumb-05.jpg') }}" data-caption="Batik Marni Jaya">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    Batik Marni Jaya
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    Produk Terbaru
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="{{ route('products.index') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    Beli Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('assets/banner/slide-08.jpg') }});" data-thumb="{{ asset('assets/banner/thumb-04.jpg') }}" data-caption="Batik Marni Jaya">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    Batik Marni Jaya
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    Koleksi Batik Tulis
                                </h2>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="{{ route('products.index') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    Beli Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-slick1-dots p-lr-10"></div>
        </div>
    </section>

    <!-- Product -->
    <section class="bg0 p-t-95 p-b-130">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Produk Terbaru
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        Semua Produk
                    </button>

                    @foreach($categories as $category)
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".kategori-{{ $category->id }}">
                            {{ $category->nama_kategori }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="row isotope-grid">
                @foreach($products as $product)
                    @php
                        $gambarUtama = $product->gambar ?: 'default.jpeg';
                        $gambarPath = public_path('images/products/' . $gambarUtama);
                        
                        if (!file_exists($gambarPath) || empty($product->gambar)) {
                            $gambarUtama = 'default.jpeg';
                        }
                        
                        $kategoriId = $product->kategori;
                        
                        $isNew = $product->created_at->diffInDays(now()) <= 7;
                    @endphp
                    
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item kategori-{{ $kategoriId }}">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0 {{ $isNew ? 'label-new' : '' }}" data-label="{{ $isNew ? 'Baru' : '' }}">
                                <img src="{{ asset('images/products/' . $gambarUtama) }}" 
                                    alt="{{ $product->nama_produk }}"
                                    style="height: 300px; object-fit: cover;">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"
                                    data-product-id="{{ $product->id_produk }}"
                                    data-product-name="{{ $product->nama_produk }}"
                                    data-product-price="{{ $product->harga }}"
                                    data-product-desc="{{ $product->deskripsi }}"
                                    data-product-category="{{ $product->kategori->nama_kategori ?? '' }}"  
                                    data-product-motif="{{ $product->motif->nama_motif ?? '' }}"        
                                    data-product-berat="{{ $product->berat }} gram"        
                                    data-product-bahan="{{ $product->jenis_kain }}"
                                    data-product-ukuran="{{ $product->ukuran }} cm"        
                                    data-product-panjang="{{ $product->panjang_tali }} cm"
                                    data-product-image="{{ $gambarUtama }}"
                                    data-product-detail1="{{ $product->gambar_detail }}"
                                    data-product-detail2="{{ $product->gambar_detail2 }}">
                                    Lihat Detail
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{ route('products.show', $product->id_produk) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->nama_produk }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <button class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 js-whatsapp-direct"
                                        data-product-name="{{ $product->nama_produk }}"
                                        data-product-price="{{ $product->harga }}">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tombol Lihat Semua -->
            <div class="flex-c-m flex-w w-full p-t-38">
                <a href="{{ route('products.index') }}" class="flex-c-m stext-101 cl0 size-103 bg3 bor2 hov-btn3 p-lr-15 trans-04">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Tunggu sebentar untuk memastikan DOM siap
        setTimeout(function() {
            // Inisialisasi Isotope
            var $grid = $('.isotope-grid').isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                filter: '*'
            });
            
            console.log('Isotope initialized with ' + $('.isotope-item').length + ' items');
            
            // Filter by category buttons
            $('.filter-tope-group button').on('click', function(e) {
                e.preventDefault();
                
                var filterValue = $(this).data('filter');
                console.log('Filter clicked:', filterValue);
                
                // Remove active class from all buttons
                $('.filter-tope-group button').removeClass('how-active1');
                // Add active class to clicked button
                $(this).addClass('how-active1');
                
                // Filter products
                if (filterValue) {
                    $grid.isotope({ filter: filterValue });
                }
            });
            
            // Paksa layout ulang setelah semua gambar dimuat
            $grid.imagesLoaded().progress(function() {
                $grid.isotope('layout');
            });
            
        }, 500); // Tunggu 500ms
        
        // Modal functionality
        $(document).on('click', '.js-show-modal1', function(e) {
            e.preventDefault();
            
            var productName = $(this).data('product-name');
            var productPrice = $(this).data('product-price');
            var productCategory = $(this).data('product-category');
            var productDesc = $(this).data('product-desc');
            var productImage = $(this).data('product-image');
            
            // Isi data ke modal
            $('#product-modal-name').text(productName);
            $('#product-modal-price').text('Rp ' + parseInt(productPrice).toLocaleString('id-ID'));
            $('#product-modal-category').text(productCategory || '-');
            $('#product-modal-desc').text(productDesc || 'Tidak ada deskripsi');
            
            // Set gambar
            if (productImage) {
                $('#product-modal-main-image').attr('src', '{{ asset("images/products") }}/' + productImage);
            }
            
            // Tampilkan modal
            $('.js-modal1').addClass('show-modal1');
        });
        
        // Tutup modal
        $('.js-hide-modal1').on('click', function() {
            $('.js-modal1').removeClass('show-modal1');
        });
    });
</script>
@endpush