@extends('layouts.app')

@section('title', 'Tentang Kami - Batik Marni Jaya')

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
            Tentang Kami
        </h2>
    </section>
</div>	

<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Batik Marni Jaya: Melestarikan Warisan Budaya, Memberdayakan Masyarakat Desa Gedongan
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Batik merupakan salah satu mahakarya seni tekstil khas Indonesia yang telah diakui dunia. Setiap goresan canting dan sapuan warna bukan hanya menghasilkan motif indah, tetapi juga menyimpan filosofi mendalam yang diwariskan dari generasi ke generasi. Di antara berbagai daerah penghasil batik, Kabupaten Sragen, Jawa Tengah, dikenal sebagai salah satu sentra produksi batik tulis berkualitas tinggi setelah Pekalongan dan Surakarta.
                    </p>
                    
                    <p class="stext-113 cl6 p-b-26">
                        Di tengah semangat menjaga warisan budaya sekaligus menggerakkan roda ekonomi lokal, lahirlah Batik Marni Jaya pada tahun 2015. Usaha ini dirintis oleh Bapak Undin Muslimin di Desa Gedongan, Kecamatan Plupuh, Sragen, dengan visi menjadikan batik tulis tidak sekadar kain, tetapi karya seni yang memiliki nilai budaya dan ekonomi.
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        Sejak awal berdirinya, Batik Marni Jaya berkomitmen menghadirkan batik tulis asli buatan tangan pengrajin lokal yang sarat dengan detail, kehalusan motif, serta ketekunan dalam setiap prosesnya. Kami percaya bahwa setiap helai kain batik adalah cerita yang ditulis dengan canting, diciptakan melalui kerja penuh cinta, dan diwariskan sebagai bagian dari identitas bangsa.
                    </p>
                    
                    <p class="stext-113 cl6 p-b-26">
                        Selain menjaga tradisi, Batik Marni Jaya juga berperan penting dalam mendukung kesejahteraan masyarakat sekitar. Dengan menciptakan lapangan kerja bagi warga lokal, usaha ini tidak hanya berfokus pada produksi batik, tetapi juga menjadi wadah pemberdayaan masyarakat desa.
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        Kini, Batik Marni Jaya telah mengantongi legalitas usaha dari Kementerian Investasi dan Penanaman Modal, sebagai langkah nyata dalam membangun kepercayaan konsumen serta memperluas pasar. Kami terus berinovasi, menggabungkan sentuhan tradisi dengan tren modern, agar batik tetap relevan dan dicintai lintas generasi.
                    </p>
                    
                    <p class="stext-113 cl6 p-b-26">
                        Melalui produk batik tulis kami, Anda tidak hanya membeli sebuah kain, tetapi juga turut serta melestarikan budaya, mendukung karya pengrajin lokal, serta menjadi bagian dari perjalanan panjang batik Indonesia.
                    </p>
                    
                    <!-- Informasi kontak singkat -->
                    <div class="p-t-40">
                        <h4 class="mtext-111 cl2 p-b-16">
                            Hubungi Kami
                        </h4>
                        
                        <div class="stext-113 cl6 p-b-10">
                            <i class="fa fa-map-marker m-r-10"></i>
                            Pengkol Rt. 05, Desa Gedongan, Kecamatan Plupuh, Kabupaten Sragen, Jawa Tengah
                        </div>
                        
                        <div class="stext-113 cl6 p-b-10">
                            <i class="fa fa-phone m-r-10"></i>
                            +62 823 2325 9808
                        </div>
                        
                        <div class="stext-113 cl6 p-b-10">
                            <i class="fa fa-envelope m-r-10"></i>
                            Batikmarnijaya@gmail.com
                        </div>
                        
                        <div class="stext-113 cl6">
                            <i class="fa fa-clock-o m-r-10"></i>
                            Buka: Senin - Minggu, 08:00 - 17:00 WIB
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{ asset('assets/images/about/about-04.jpg') }}" alt="Gambar Batik Marni Jaya 1">
                    </div>
                </div>
                
                <br><br>
                
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{ asset('assets/images/about/about-02.jpg') }}" alt="Gambar Batik Marni Jaya 2">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Map section -->
        <div class="row p-t-80">
            <div class="col-12">
                <h3 class="mtext-111 cl2 txt-center p-b-40">
                    Lokasi Kami
                </h3>
            </div>
            
            <div class="col-12">
                <div class="how-bor2">
                    <iframe 
                        src="https://maps.google.com/maps?q=-7.456916,110.900403&z=15&output=embed" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                    
                    <div class="p-t-20 p-b-20 p-l-30 p-r-30">
                        <p class="stext-107 cl6 txt-center">
                            <i class="fa fa-map-marker m-r-10"></i>
                            Pengkol Rt. 05, Desa Gedongan, Kecamatan Plupuh, Kabupaten Sragen, Jawa Tengah, Indonesia
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .head-konten {
        background-size: cover;
        background-position: center;
    }
    
    .how-bor2 {
        border: 1px solid #e6e6e6;
        padding: 10px;
        border-radius: 5px;
        overflow: hidden;
    }
    
    .hov-img0 {
        overflow: hidden;
    }
    
    .hov-img0 img {
        width: 100%;
        transition: transform 0.5s ease;
    }
    
    .hov-img0:hover img {
        transform: scale(1.05);
    }
    
    .how-pos5-parent {
        position: relative;
        text-align: center;
        padding: 30px 15px;
        background: #f9f9f9;
        border-radius: 10px;
        height: 100%;
    }
    
    .how-pos5 {
        position: absolute;
        top: -25px;
        left: 50%;
        transform: translateX(-50%);
        background: #DEA057;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    
    .how-pos5 .ltext-102 {
        color: white;
        font-weight: bold;
        line-height: 1;
    }
    
    .how-pos5 .stext-109 {
        color: white;
        font-size: 10px;
        line-height: 1;
    }
</style>
@endpush