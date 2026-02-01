@extends('layouts.app')

@section('title', 'Kontak - Batik Marni Jaya')

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
            Hubungi Kami
        </h2>
    </section>
</div>	

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form id="whatsappContactForm">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Kirim Pesan
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" 
                               type="text" 
                               name="name" 
                               id="name" 
                               placeholder="Nama Lengkap" 
                               required>
                        <img class="how-pos4 pointer-none" 
                             src="{{ asset('assets/images/icons/icon-user.png') }}" 
                             alt="ICON">
                    </div>

                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" 
                                  name="message" 
                                  id="message" 
                                  placeholder="Tuliskan pesan Anda..." 
                                  rows="6" 
                                  required></textarea>
                    </div>

                    <button type="submit" 
                            class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        <i class="fa fa-whatsapp m-r-10"></i>
                        Kirim via WhatsApp
                    </button>
                    
                    <div class="p-t-20">
                        <p class="stext-107 cl6">
                            <small>
                                <i class="fa fa-info-circle m-r-5"></i> 
                                Pesan akan dikirim langsung ke WhatsApp kami. Pastikan Anda sudah menginstal WhatsApp di perangkat Anda.
                            </small>
                        </p>
                    </div>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <i class="fa fa-map-marker"></i>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Alamat
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            Pengkol Rt. 05, Desa Gedongan, Kecamatan Plupuh, Kabupaten Sragen, Jawa Tengah, Indonesia
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <i class="fa fa-whatsapp"></i>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            WhatsApp
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            <a href="https://api.whatsapp.com/send?phone=6282323259808&text=Halo%20Batik%20Marni%20Jaya,%20saya%20ingin%20bertanya" 
                               target="_blank" 
                               class="stext-115 cl1 size-213 p-t-18">
                                <i class="fa fa-whatsapp m-r-10"></i> +62 823 2325 9808
                            </a>
                        </p>
                        
                        <p class="stext-107 cl6 p-t-5">
                            <small>Klik untuk langsung chat di WhatsApp</small>
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <i class="fa fa-envelope"></i>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Email
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            <a href="mailto:Batikmarnijaya@gmail.com" 
                               class="stext-115 cl6 size-213 p-t-18">
                                <i class="fa fa-envelope m-r-10"></i> Batikmarnijaya@gmail.com
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>	

<!-- Map -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d15082.537288934614!2d110.900403!3d-7.4569160000000005!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMjcnMjQuOSJTIDExMMKwNTQnMDEuNSJF!5e1!3m2!1sid!2sus!4v1769689478439!5m2!1sid!2sus" 
        width="100%" 
        height="400" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>
</div>
@endsection

@push('styles')
<style>
    .head-konten {
        background-size: cover;
        background-position: center;
        min-height: 200px;
    }
    
    .bg-success {
        background-color: #25D366 !important;
    }
    
    .bg-success:hover {
        background-color: #1da851 !important;
    }
    
    .map {
        position: relative;
        height: 400px;
    }
    
    .map iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
    
    /* Style untuk form */
    .bor8 {
        border: 1px solid #e6e6e6;
        transition: border-color 0.3s ease;
    }
    
    .bor8:focus-within {
        border-color: #DEA057;
    }
    
    .how-pos4-parent {
        position: relative;
    }
    
    .how-pos4 {
        position: absolute;
        top: 50%;
        left: 20px;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .flex-tr {
            flex-direction: column;
        }
        
        .w-full-md {
            width: 100% !important;
        }
        
        .size-210 {
            width: 100%;
        }
        
        .p-lr-70, .p-lr-93 {
            padding-left: 30px !important;
            padding-right: 30px !important;
        }
    }
    
    @media (max-width: 576px) {
        .p-lr-70, .p-lr-93 {
            padding-left: 15px !important;
            padding-right: 15px !important;
        }
        
        .flex-w {
            flex-wrap: wrap;
        }
        
        .m-r-10 {
            margin-right: 10px;
            margin-bottom: 10px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Form WhatsApp Submission
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('whatsappContactForm');
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Ambil nilai form
            const name = document.getElementById('name').value.trim();
            const message = document.getElementById('message').value.trim();
            
            // Validasi sederhana
            if (!name) {
                alert('Mohon masukkan nama Anda');
                document.getElementById('name').focus();
                return;
            }
            
            if (!message) {
                alert('Mohon tuliskan pesan Anda');
                document.getElementById('message').focus();
                return;
            }
            
            // Format pesan untuk WhatsApp
            let whatsappMessage = `*Halo Batik Marni Jaya,*%0A%0A`;
            whatsappMessage += `Nama saya: *${name}*%0A%0A`;
            whatsappMessage += `*Pesan saya:*%0A`;
            whatsappMessage += `${message}%0A%0A`;
            whatsappMessage += `_Pesan ini dikirim melalui website Batik Marni Jaya_`;
            
            // Nomor WhatsApp tujuan
            const phoneNumber = '6282323259808';
            
            // Buat URL WhatsApp
            const whatsappUrl = `https://wa.me/${phoneNumber}?text=${whatsappMessage}`;
            
            // Buka WhatsApp di tab baru
            window.open(whatsappUrl, '_blank');
            
            // Reset form setelah dikirim
            form.reset();
            
            // Tampilkan pesan sukses (opsional)
            showSuccessMessage();
        });
        
        // Fungsi untuk menampilkan pesan sukses
        function showSuccessMessage() {
            // Buat elemen pesan sukses
            const successDiv = document.createElement('div');
            successDiv.className = 'success-message';
            successDiv.innerHTML = `
                <div style="
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: #4CAF50;
                    color: white;
                    padding: 15px 20px;
                    border-radius: 5px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                    z-index: 9999;
                    animation: slideIn 0.3s ease;
                    max-width: 300px;
                ">
                    <div style="display: flex; align-items: center;">
                        <i class="fa fa-check-circle" style="font-size: 20px; margin-right: 10px;"></i>
                        <div>
                            <strong style="display: block;">Pesan Terkirim!</strong>
                            <small style="opacity: 0.9;">Membuka WhatsApp...</small>
                        </div>
                        <button onclick="this.parentElement.parentElement.remove()" 
                                style="
                                    background: none;
                                    border: none;
                                    color: white;
                                    font-size: 18px;
                                    cursor: pointer;
                                    margin-left: 15px;
                                    padding: 0 5px;
                                ">×</button>
                    </div>
                </div>
            `;
            
            // Tambahkan ke body
            document.body.appendChild(successDiv);
            
            // Hapus otomatis setelah 5 detik
            setTimeout(() => {
                if (successDiv.parentNode) {
                    successDiv.remove();
                }
            }, 5000);
        }
        
        // Tambahkan style untuk animasi
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(style);
    });
    
    // Fungsi untuk menghitung karakter pesan
    document.addEventListener('DOMContentLoaded', function() {
        const messageInput = document.getElementById('message');
        const charCounter = document.createElement('div');
        charCounter.className = 'char-counter';
        charCounter.style.cssText = `
            text-align: right;
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            margin-bottom: 15px;
        `;
        
        // Tambahkan counter setelah textarea
        messageInput.parentNode.insertBefore(charCounter, messageInput.nextSibling);
        
        // Update counter saat mengetik
        messageInput.addEventListener('input', function() {
            const length = this.value.length;
            charCounter.textContent = `${length} karakter`;
            
            // Ubah warna jika terlalu panjang
            if (length > 1000) {
                charCounter.style.color = '#f44336';
            } else if (length > 500) {
                charCounter.style.color = '#ff9800';
            } else {
                charCounter.style.color = '#666';
            }
        });
        
        // Trigger awal
        messageInput.dispatchEvent(new Event('input'));
    });
</script>
@endpush