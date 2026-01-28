<!DOCTYPE html>
<html lang="id">
<head>
    <title>@yield('title', 'Batik Marni Jaya')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/Logomarnijaya-polos.png') }}"/>
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    
    <!-- Custom CSS -->
    <style>
        .main-menu li a.active,
        .main-menu-m li a.active {
            color: #7d4000 !important;
            border-bottom: 2px solid #7d4000;
        }
    </style>
    
    @stack('styles')
</head>
<body class="animsition">
    
    <!-- Header -->
    <header class="header-v4">
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Pengkol Rt. 05, Desa Gedongan, Kecamatan Plupuh, Kabupaten Sragen, Jawa Tengah, Indonesia
                    </div>
                    
                    <div class="right-top-bar flex-w h-full">
                        <a href="tel:+6282323259808" class="flex-c-m trans-04 p-lr-25">
                            +62 823 2325 9808
                        </a>

                        <a href="mailto:Batikmarnijaya@gmail.com" class="flex-c-m trans-04 p-lr-25">
                            Batikmarnijaya@gmail.com
                        </a>
                        
                        <a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25" style="font-weight: bold; background-color: #d2a26f;">
                            Login
                        </a>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop how-shadow1">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->		
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('images/icons/Logomarnijaya.png') }}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                            </li>

                            <li>
                                <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">Produk</a>
                            </li>

                            <li>
                                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>	
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile" style="background-color: #DEA057">
            <!-- Logo moblie -->		
            <div class="logo-mobile">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/icons/Marnijayalogo.png') }}" alt="IMG-LOGO" style="width: 170px; height: auto;">
                </a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="main-menu-m" style="background-color: #FCFFE7;">
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" style="color: black;">Beranda</a>
                </li>

                <li>
                    <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}" style="color: black;">Produk</a>
                </li>

                <li>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}" style="color: black;">Tentang</a>
                </li>
                
                <li>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}" style="color: black;">Kontak</a>
                </li>

                <li>
                    <a href="{{ route('login') }}" style="color: black; background-color: #DEA057; margin-left: 10px;">Login</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{ asset('images/icons/icon-close2.png') }}" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-25">
                    <div class="p-t-27">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ asset('images/icons/Logomarnijaya.png') }}" alt="IMG-LOGO">
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-25">
                    <h4 class="stext-301 cl0 p-b-30">
                        MENU
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }} stext-107 cl7 hov-cl1 trans-04">Beranda</a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }} stext-107 cl7 hov-cl1 trans-04">Produk</a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }} stext-107 cl7 hov-cl1 trans-04">Tentang</a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }} stext-107 cl7 hov-cl1 trans-04">Kontak</a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-25">
                    <h4 class="stext-301 cl0 p-b-30">
                        ALAMAT
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        Pengkol Rt. 05, Desa Gedongan, Kecamatan Plupuh, Kabupaten Sragen, Jawa Tengah, Indonesia
                    </p>
                    <br>
                    <ul>
                        <li class="p-b-10">
                            <i class="fa fa-whatsapp fs-18 cl7 hov-cl1 trans-04 m-r-16"></i>
                            <a href="https://api.whatsapp.com/send?phone=6282323259808" class="stext-107 cl7 hov-cl1 trans-04">+62 823 2325 9808</a>
                        </li>
                        
                        <li class="p-b-10">
                            <i class="fa fa-envelope-o fs-18 cl7 hov-cl1 trans-04 m-r-16"></i>
                            <a href="mailto:Batikmarnijaya@gmail.com" class="stext-107 cl7 hov-cl1 trans-04">Batikmarnijaya@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-25">
                    <h4 class="stext-301 cl0 p-b-30">
                        MAPS
                    </h4>

                    <iframe 
                        src="https://maps.google.com/maps?q=-7.456916,110.900403&z=15&output=embed" 
                        width="100%" 
                        height="200" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>

            <div class="p-t-40" style="padding:0;">
                <p class="stext-107 cl6 txt-left">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
                    All rights reserved by <a href="https://github.com/Diowisn" target="_blank">Diowisn</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="{{ asset('images/icons/icon-close.png') }}" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb js-modal-gallery">
                                    <!-- Images will be loaded here by JavaScript -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14"></h4>
                            <span class="mtext-106 cl2 js-price-detail"></span>

                            <div class="flex-w flex-t p-t-15">
                                <div class="size-205 cl4">Berat Satuan</div>
                                <div class="size-206 cl6 js-berat-detail p-b-5">-</div>
                            </div>

                            <div class="flex-w flex-t">
                                <div class="size-205 cl4">Motif</div>
                                <div class="size-206 cl6 js-motif-detail p-b-5">-</div>
                            </div>

                            <div class="flex-w flex-t">
                                <div class="size-205 cl4">Kategori</div>
                                <div class="size-206 cl6 js-category-detail p-b-5">-</div>
                            </div>

                            <div class="flex-w flex-t">
                                <div class="size-205 cl4">Bahan</div>
                                <div class="size-206 cl6 js-bahan-detail p-b-5">-</div>
                            </div>

                            <div class="flex-w flex-t">
                                <div class="size-205 cl4">Ukuran</div>
                                <div class="size-206 cl6 js-ukuran-detail p-b-5">-</div>
                            </div>

                            <div class="flex-w flex-t">
                                <div class="size-205 cl4">Panjang Tali</div>
                                <div class="size-206 cl6 js-panjang-detail p-b-5">-</div>
                            </div>

                            <div class="flex-w flex-t p-t-15">
                                <div class="size-205 cl4">Deskripsi</div>
                                <p class="stext-102 cl3 p-t-10 js-desc-detail"></p>
                            </div>
                            
                            <div class="p-t-20">
                                <div class="flex-col">
                                    <div class="size-205 cl4">Jumlah Beli</div>
                                    <small>Minimal beli: 1</small>
                                </div>
                                <!-- Quantity dan Add to Cart -->
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1" id="modal-quantity" min="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Pesan Via WhatsApp
                                        </button>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
    <script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    
    <!-- Main JS -->
    <script src="{{ asset('js/slick-custom.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

<script>
    // Define base URL untuk JavaScript
    window.baseUrl = '{{ url("/") }}';
    console.log('Base URL:', window.baseUrl);
</script>
    <script src="{{ asset('js/product-modal.js') }}"></script>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Select2 initialization
            $(".js-select2").each(function(){
                $(this).select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $(this).next('.dropDownSelect2')
                });
            });

            // Parallax
            $('.parallax100').parallax100();

            // Magnific Popup for galleries
            $('.gallery-lb').each(function() {
                $(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery: {
                        enabled:true
                    },
                    mainClass: 'mfp-fade'
                });
            });

            // Perfect Scrollbar
            $('.js-pscroll').each(function(){
                $(this).css('position','relative');
                $(this).css('overflow','hidden');
                var ps = new PerfectScrollbar(this, {
                    wheelSpeed: 1,
                    scrollingThreshold: 1000,
                    wheelPropagation: false,
                });

                $(window).on('resize', function(){
                    ps.update();
                });
            });

            // WhatsApp Functionality
            console.log('WhatsApp script loaded');
            
            // Show modal for product details
            // $(document).on('click', '.js-show-modal1', function(e) {
            //     e.preventDefault();
            //     console.log('Show modal diklik');
                
            //     const productData = $(this).data();
            //     const productId = productData.productId;
            //     const productName = productData.productName;
            //     const productPrice = productData.productPrice;
            //     const productDesc = productData.productDesc || 'Tidak ada deskripsi';
            //     const productCategory = productData.productCategory || '-';
            //     const productMotif = productData.productMotif || '-';
            //     const productBerat = productData.productBerat || '-';
            //     const productBahan = productData.productBahan || '-';
            //     const productUkuran = productData.productUkuran || '-';
            //     const productPanjang = productData.productPanjang || '-';
                
            //     // Ambil gambar dari data attribute yang benar
            //     const mainImage = productData.productImage || '';
            //     const detailImage1 = productData.productDetail1 || '';
            //     const detailImage2 = productData.productDetail2 || '';
                
            //     console.log('Product data:', {productId, productName, productPrice});
            //     console.log('Images:', {mainImage, detailImage1, detailImage2});
                
            //     // Fill modal with product data
            //     $('.js-name-detail').text(productName || 'Produk');
            //     $('.js-price-detail').text('Rp ' + parseInt(productPrice || 0).toLocaleString('id-ID'));
            //     $('.js-desc-detail').text(productDesc);
            //     $('.js-category-detail').text(productCategory);
            //     $('.js-motif-detail').text(productMotif);
            //     $('.js-berat-detail').text(productBerat);
            //     $('.js-bahan-detail').text(productBahan);
            //     $('.js-ukuran-detail').text(productUkuran);
            //     $('.js-panjang-detail').text(productPanjang);
                
            //     // Populate gallery images dengan urutan yang benar
            //     const galleryContainer = $('.gallery-lb');
            //     galleryContainer.empty();
                
            //     // Array untuk menyimpan semua gambar
            //     const allImages = [];
                
            //     // Tambahkan gambar utama jika ada
            //     if (mainImage) {
            //         allImages.push({
            //             src: "{{ asset('images/products') }}/" + mainImage,
            //             thumb: "{{ asset('images/products') }}/" + mainImage,
            //             alt: productName
            //         });
            //     }
                
            //     // Tambahkan gambar detail 1 jika ada
            //     if (detailImage1) {
            //         allImages.push({
            //             src: "{{ asset('images/products/detail') }}/" + detailImage1,
            //             thumb: "{{ asset('images/products/detail') }}/" + detailImage1,
            //             alt: productName + ' - Detail 1'
            //         });
            //     }
                
            //     // Tambahkan gambar detail 2 jika ada
            //     if (detailImage2) {
            //         allImages.push({
            //             src: "{{ asset('images/products/detail2') }}/" + detailImage2,
            //             thumb: "{{ asset('images/products/detail2') }}/" + detailImage2,
            //             alt: productName + ' - Detail 2'
            //         });
            //     }
                
            //     // Jika tidak ada gambar sama sekali, tambahkan gambar default
            //     if (allImages.length === 0) {
            //         allImages.push({
            //             src: "{{ asset('images/default-product.jpg') }}",
            //             thumb: "{{ asset('images/default-product.jpg') }}",
            //             alt: 'Produk tidak memiliki gambar'
            //         });
            //     }
                
            //     // Tambahkan semua gambar ke gallery
            //     allImages.forEach((image, index) => {
            //         galleryContainer.append(`
            //             <div class="item-slick3" data-thumb="${image.thumb}">
            //                 <div class="wrap-pic-w pos-relative">
            //                     <img src="${image.src}" alt="${image.alt}">
            //                     <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="${image.src}">
            //                         <i class="fa fa-expand"></i>
            //                     </a>
            //                 </div>
            //             </div>
            //         `);
            //     });
                
            //     // Set data untuk WhatsApp button
            //     $('.js-addcart-detail').data({
            //         'product-id': productId,
            //         'product-name': productName,
            //         'product-price': productPrice,
            //         'product-category': productCategory,
            //         'product-motif': productMotif,
            //         'product-berat': productBerat,
            //         'product-bahan': productBahan,
            //         'product-ukuran': productUkuran,
            //         'product-panjang': productPanjang,
            //         'product-desc': productDesc
            //     });
                
            //     // Reset quantity
            //     $('#quantity-input').val(1);
                
            //     // Destroy existing slick slider jika ada
            //     if ($('.slick3').hasClass('slick-initialized')) {
            //         $('.slick3').slick('unslick');
            //     }
                
            //     // Reinitialize slick slider setelah delay kecil
            //     setTimeout(() => {
            //         $('.slick3').slick({
            //             slidesToShow: 1,
            //             slidesToScroll: 1,
            //             arrows: true,
            //             fade: true,
            //             adaptiveHeight: true,
            //             infinite: allImages.length > 1,
            //             prevArrow: '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
            //             nextArrow: '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
            //             dots: allImages.length > 1,
            //             appendDots: '.wrap-slick3-dots',
            //             dotsClass: 'slick3-dots',
            //             customPaging: function(slick, index) {
            //                 var thumb = $(slick.$slides[index]).data('thumb');
            //                 return '<img src="' + thumb + '">';
            //             }
            //         });
                    
            //         // Juga reinitialize magnific popup
            //         $('.gallery-lb').magnificPopup({
            //             delegate: 'a',
            //             type: 'image',
            //             gallery: {
            //                 enabled: true
            //             },
            //             mainClass: 'mfp-fade'
            //         });
            //     }, 100);
                
            //     // Show modal
            //     $('.js-modal1').addClass('show-modal1');
            // });
            
            // Handle WhatsApp button in modal
            $(document).on('click', '.js-addcart-detail', function(e) {
                e.preventDefault();
                console.log('Tombol WhatsApp modal diklik');
                
                const productData = $(this).data();
                const productName = productData['product-name'] || 'Produk';
                const productPrice = productData['product-price'] || 0;
                const productCategory = productData['product-category'] || '';
                const productMotif = productData['product-motif'] || '';
                const productBerat = productData['product-berat'] || '';
                const productBahan = productData['product-bahan'] || '';
                const productUkuran = productData['product-ukuran'] || '';
                const productPanjang = productData['product-panjang'] || '';
                const productDesc = productData['product-desc'] || 'Tidak ada deskripsi';
                
                const quantity = $('#quantity-input').val() || 1;
                
                sendWhatsAppMessage(productName, productPrice, productCategory, productMotif, 
                                 productBerat, productBahan, productUkuran, productPanjang, 
                                 productDesc, quantity);
            });
            
            // Handle direct WhatsApp buttons
            $(document).on('click', '.js-whatsapp-direct', function(e) {
                e.preventDefault();
                console.log('Tombol WhatsApp direct diklik');
                
                const productData = $(this).data();
                const productName = productData['product-name'] || 'Produk';
                const productPrice = productData['product-price'] || 0;
                const productCategory = productData['product-category'] || '';
                const productMotif = productData['product-motif'] || '';
                const productBerat = productData['product-berat'] || '';
                const productBahan = productData['product-bahan'] || '';
                const productUkuran = productData['product-ukuran'] || '';
                const productPanjang = productData['product-panjang'] || '';
                const productDesc = productData['product-desc'] || 'Tidak ada deskripsi';
                
                const quantity = 1; // Default quantity for direct buttons
                
                sendWhatsAppMessage(productName, productPrice, productCategory, productMotif, 
                                 productBerat, productBahan, productUkuran, productPanjang, 
                                 productDesc, quantity);
            });
            
            // Function to send WhatsApp message
            function sendWhatsAppMessage(productName, productPrice, category, motif, berat, bahan, ukuran, panjang, desc, quantity) {
                if (!productName || productName === 'Produk') {
                    alert('Nama produk tidak valid!');
                    return;
                }
                
                const price = parseInt(productPrice) || 0;
                const phone = '6282323259808';
                
                const message = `Halo, saya ingin memesan produk berikut:\n\n` +
                              ` - ${productName}\n` +
                              ` - Harga: Rp ${price.toLocaleString('id-ID')}\n` +
                              ` - Kategori: ${category || '-'}\n` +
                              ` - Berat: ${berat || '-'}\n` +
                              ` - Motif: ${motif || '-'}\n` +
                              ` - Bahan: ${bahan || '-'}\n` +
                              ` - Ukuran: ${ukuran || '-'}\n` +
                              ` - Panjang Tali: ${panjang || '-'}\n` +
                              ` - Jumlah: ${quantity}\n\n` +
                              ` - Deskripsi:\n${desc || 'Tidak ada deskripsi'}\n\n` +
                              `Apakah produk ini tersedia?`;
                
                const whatsappUrl = `https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(message)}`;
                
                console.log('WhatsApp URL:', whatsappUrl);
                window.open(whatsappUrl, '_blank');
                
                // Show success message
                swal(productName, "Berhasil melakukan pemesanan via WhatsApp", "success");
            }
            
            // Quantity buttons
            $(document).on('click', '.btn-num-product-down', function(){
                var input = $(this).next('.num-product');
                var numProduct = Number(input.val());
                if(numProduct > 1) input.val(numProduct - 1);
            });

            $(document).on('click', '.btn-num-product-up', function(){
                var input = $(this).prev('.num-product');
                var numProduct = Number(input.val());
                input.val(numProduct + 1);
            });
            
            // Close modal
            $(document).on('click', '.js-hide-modal1', function() {
                $('.js-modal1').removeClass('show-modal1');
            });
            
            // Hide modal search
            $(document).on('click', '.js-hide-modal-search', function() {
                $('.js-modal-search').removeClass('show-modal-search');
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>