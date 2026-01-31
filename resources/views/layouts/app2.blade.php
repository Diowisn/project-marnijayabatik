<!DOCTYPE html>
<html lang="id">
<head>
    <title>@yield('title', 'Batik Marni Jaya')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/Logomarnijaya-polos.png') }}" type="image/x-icon">
    
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

    <style>
        /* Style untuk menu aktif di desktop */
        .main-menu li a.active {
            color: #613400 !important;
            font-weight: 600;
        }
        
        /* Style untuk menu aktif di mobile */
        .main-menu-m li a.active {
            color: #613400 !important;
            font-weight: 600;
        }
        
        /* Optional: tambahkan underline atau border untuk lebih jelas */
        .main-menu li a.active {
            position: relative;
        }
        
        .main-menu li a.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #613400;
        }
    </style>
    
    @stack('styles')
</head>
<body class="animsition">
    
    <!-- Header -->
    <header class="header-v3">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop2 p-l-45">
                    
                    <!-- Logo desktop -->		
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('assets/images/Marnijayalogo.png') }}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            @php
                                // Debug: Cek current route
                                $currentRoute = request()->route()->getName();
                            @endphp
                            <li>
                                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                    Beranda
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
                                    Produk
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                    Tentang
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                    Kontak
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-lr-19">
                            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>	
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile" style="background-color: #DEA057;">
            <!-- Logo moblie -->		
            <div class="logo-mobile">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/Marnijayalogo.png') }}" alt="IMG-LOGO" style="width: 170px; height: auto;">
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
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" style="color: black;">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}" style="color: black;">
                        Produk
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}" style="color: black;">
                        Tentang
                    </a>
                </li>

                <li>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}" style="color: black;">
                        Kontak
                    </a>
                </li>

                <li>
                    <a href="{{ route('login') }}" style="color: black; background-color: #DEA057; margin-left: 10px;">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="wrap-sidebar js-sidebar">
        <div class="s-full js-hide-sidebar"></div>

        <div class="sidebar flex-col-l p-t-22 p-b-25">
            <div class="flex-r w-full p-b-30 p-r-27">
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
                <ul class="sidebar-link w-full">
                    <li class="p-b-13">
                        <a href="{{ route('home') }}" class="stext-102 cl2 hov-cl1 trans-04">
                            Beranda
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="{{ route('login') }}" class="stext-102 cl2 hov-cl1 trans-04">
                            Login
                        </a>
                    </li>
                </ul>

                <!-- Sidebar gallery -->
                @yield('sidebar-gallery')

                <!-- Sidebar about -->
                @yield('sidebar-about')
            </div>
        </div>
    </aside>

    <!-- Cart -->
    @yield('cart-section')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-25">
                    <div class="p-t-27">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/Marnijayalogo.png') }}" alt="IMG LOGO" style="max-width: 16rem; padding-top: 2rem;">
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-25">
                    <h4 class="stext-301 cl0 p-b-30">
                        Menu
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="{{ route('home') }}" class="stext-107 cl7 hov-cl1 trans-04">
                                Beranda
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{ route('products.index') }}" class="stext-107 cl7 hov-cl1 trans-04">
                                Produk
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{ route('about') }}" class="stext-107 cl7 hov-cl1 trans-04">
                                Tentang Kami
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{ route('contact') }}" class="stext-107 cl7 hov-cl1 trans-04">
                                Kontak
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-25">
                    <h4 class="stext-301 cl0 p-b-30">
                        HUBUNGI KAMI
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        Pengkol Rt. 05, Desa Gedongan, Kecamatan Plupuh, Kabupaten Sragen, Jawa Tengah, Indonesia
                    </p>

                    <div class="p-t-27">
                        <a href="https://api.whatsapp.com/send?phone=6282323259808" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-whatsapp"></i> +62 823 2325 9808
                        </a><br>
                        
                        <a href="mailto:Batikmarnijaya@gmail.com" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-envelope"></i> Batikmarnijaya@gmail.com
                        </a>
                    </div>
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

            <div class="p-t-40">
                <p class="stext-107 cl6">
                    Copyright &copy; {{ date('Y') }}
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

    <!-- Modal Product Detail -->
    @include('partials.product-modal')

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

    <!-- Product Modal Script -->
    <script>
    $(document).ready(function() {
        // ========================================
        // MODAL FUNCTIONALITY
        // ========================================
        
        // Show modal when clicking "Lihat Detail"
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
            $('#modal-product-name').text(productName);
            $('#modal-product-price').text('Rp ' + parseInt(productPrice).toLocaleString('id-ID'));
            $('#modal-product-desc').text(productDesc || 'Tidak ada deskripsi');
            $('#modal-product-category').text(productCategory || '-');
            $('#modal-product-motif').text(productMotif || '-');
            $('#modal-product-berat').text(productBerat || '-');
            $('#modal-product-bahan').text(productBahan || '-');
            $('#modal-product-ukuran').text(productUkuran || '-');
            $('#modal-product-panjang').text(productPanjang || '-');
            
            // ========================================
            // PERBAIKAN BUG: Destroy slider dan hapus semua gambar lama
            // ========================================
            
            // Destroy existing slick if initialized
            if ($('.slick3').hasClass('slick-initialized')) {
                $('.slick3').slick('unslick');
            }
            
            // PENTING: Hapus semua HTML lama dari slider
            $('.slick3').empty();
            $('.wrap-slick3-dots').empty();
            $('.wrap-slick3-arrows').empty();
            
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
            
            // Insert fresh images into slider
            $('.slick3').html(imageHtml);
            
            // Small delay to ensure DOM is updated
            setTimeout(function() {
                // Initialize slick slider with fresh content
                $('.slick3').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    infinite: true,
                    autoplay: false,
                    autoplaySpeed: 6000,
                    arrows: true,
                    appendArrows: $('.wrap-slick3-arrows'),
                    prevArrow:'<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                    nextArrow:'<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
                    dots: true,
                    appendDots: $('.wrap-slick3-dots'),
                    dotsClass:'slick3-dots',
                    customPaging: function(slick, index) {
                        var portrait = $(slick.$slides[index]).data('thumb');
                        return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
                    },  
                });
                
                // Re-initialize magnific popup for modal gallery
                $('.slick3').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery: {
                        enabled: true
                    },
                    mainClass: 'mfp-fade'
                });
            }, 100);
            
            // Store product data for WhatsApp
            $('.js-whatsapp-modal').data({
                'product-name': productName,
                'product-price': productPrice
            });
            
            // Reset quantity
            $('#quantity-input').val(1);
            
            // Show modal
            $('.js-modal1').addClass('show-modal1');
        });
        
        // Hide modal
        $('.js-hide-modal1, .overlay-modal1').on('click', function() {
            $('.js-modal1').removeClass('show-modal1');
            
            // Cleanup saat modal ditutup
            if ($('.slick3').hasClass('slick-initialized')) {
                $('.slick3').slick('unslick');
            }
            $('.slick3').empty();
            $('.wrap-slick3-dots').empty();
            $('.wrap-slick3-arrows').empty();
        });
        
        // WhatsApp integration from modal
        $(document).on('click', '.js-whatsapp-modal', function(e) {
            e.preventDefault();
            
            const productName = $(this).data('product-name');
            const productPrice = $(this).data('product-price');
            const quantity = $('#quantity-input').val() || 1;
            const phone = '6282323259808';
            
            const message = `Halo, saya tertarik dengan produk:\n\n` +
                          `Nama: ${productName}\n` +
                          `Harga: Rp ${parseInt(productPrice).toLocaleString('id-ID')}\n` +
                          `Jumlah: ${quantity}\n\n` +
                          `Apakah produk ini tersedia?`;
            
            const whatsappUrl = `https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
            
            // Close modal and cleanup
            $('.js-modal1').removeClass('show-modal1');
            if ($('.slick3').hasClass('slick-initialized')) {
                $('.slick3').slick('unslick');
            }
            $('.slick3').empty();
        });
        
        // Quantity buttons
        $('.btn-num-product-down').on('click', function(){
            var numProduct = Number($(this).next().val());
            if(numProduct > 1) $(this).next().val(numProduct - 1);
        });

        $('.btn-num-product-up').on('click', function(){
            var numProduct = Number($(this).prev().val());
            $(this).prev().val(numProduct + 1);
        });
    });
    </script>

    <!-- Custom Scripts -->
    <script>
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

        // Wishlist functionality
        $('.js-addwish-b2').on('click', function(e){
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function(){
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        // Add to cart functionality
        $('.js-addcart-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to cart !", "success");
            });
        });

        // WhatsApp integration (direct from product card)
        $(document).ready(function() {
            $('.js-whatsapp-direct').on('click', function(e) {
                e.preventDefault();
                
                const productName = $(this).data('product-name');
                const productPrice = $(this).data('product-price');
                const phone = '6282323259808';
                
                const message = `Halo, saya tertarik dengan produk:\n\n` +
                              `Nama: ${productName}\n` +
                              `Harga: Rp ${parseInt(productPrice).toLocaleString('id-ID')}\n\n` +
                              `Apakah produk ini tersedia?`;
                
                const whatsappUrl = `https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>