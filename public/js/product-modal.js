// product-modal.js
$(document).ready(function() {
    let currentProductData = null;
    
    // Show modal function
    function showProductModal(productData) {
        currentProductData = productData;
        
        // Clear previous images
        const galleryContainer = $('.js-modal-gallery');
        galleryContainer.empty();
        
        // Collect all product images
        const allImages = [];
        
        // Add main image if exists
        if (productData.mainImage) {
            const mainImagePath = `${baseUrl}/images/products/${productData.mainImage}`;
            allImages.push({
                src: mainImagePath,
                thumb: mainImagePath,
                alt: productData.name
            });
        }
        
        // Add detail images if exist
        if (productData.detail1) {
            const detail1Path = `${baseUrl}/images/products/detail/${productData.detail1}`;
            allImages.push({
                src: detail1Path,
                thumb: detail1Path,
                alt: `${productData.name} - Detail 1`
            });
        }
        
        if (productData.detail2) {
            const detail2Path = `${baseUrl}/images/products/detail2/${productData.detail2}`;
            allImages.push({
                src: detail2Path,
                thumb: detail2Path,
                alt: `${productData.name} - Detail 2`
            });
        }
        
        // If no images, add default
        if (allImages.length === 0) {
            const defaultImage = `${baseUrl}/images/default-product.jpg`;
            allImages.push({
                src: defaultImage,
                thumb: defaultImage,
                alt: 'Produk tidak memiliki gambar'
            });
        }
        
        // Add images to gallery
        allImages.forEach((image, index) => {
            galleryContainer.append(`
                <div class="item-slick3" data-thumb="${image.thumb}">
                    <div class="wrap-pic-w pos-relative">
                        <img src="${image.src}" alt="${image.alt}" style="width: 100%; max-height: 500px; object-fit: contain;">
                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" 
                           href="${image.src}">
                            <i class="fa fa-expand"></i>
                        </a>
                    </div>
                </div>
            `);
        });
        
        // Fill product info
        $('.js-name-detail').text(productData.name || 'Produk');
        $('.js-price-detail').text(`Rp ${parseInt(productData.price || 0).toLocaleString('id-ID')}`);
        $('.js-desc-detail').text(productData.desc || 'Tidak ada deskripsi');
        $('.js-category-detail').text(productData.category || '-');
        $('.js-motif-detail').text(productData.motif || '-');
        $('.js-berat-detail').text(productData.berat || '-');
        $('.js-bahan-detail').text(productData.bahan || '-');
        $('.js-ukuran-detail').text(productData.ukuran || '-');
        $('.js-panjang-detail').text(productData.panjang || '-');
        
        // Reset quantity
        $('.js-modal-quantity').val(1);
        
        // Show modal
        $('.js-modal1').addClass('show-modal1');
        
        // Initialize slick slider
        initSlickSlider();
        
        // Reinitialize magnific popup
        $('.gallery-lb').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    }
    
    function initSlickSlider() {
        // Destroy existing slick
        if ($('.slick3').hasClass('slick-initialized')) {
            $('.slick3').slick('unslick');
        }
        
        setTimeout(() => {
            $('.slick3').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: true,
                adaptiveHeight: true,
                infinite: $('.item-slick3').length > 1,
                prevArrow: '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                nextArrow: '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
                dots: $('.item-slick3').length > 1,
                appendDots: '.wrap-slick3-dots',
                dotsClass: 'slick3-dots',
                customPaging: function(slick, index) {
                    var thumb = $(slick.$slides[index]).data('thumb');
                    return '<img src="' + thumb + '" style="width: 60px; height: 60px; object-fit: cover;">';
                }
            });
        }, 100);
    }
    
    // Handle modal show button click
    $(document).on('click', '.js-show-modal1', function(e) {
        e.preventDefault();
        console.log('Show modal clicked');
        
        const productData = {
            id: $(this).data('product-id'),
            name: $(this).data('product-name'),
            price: $(this).data('product-price'),
            desc: $(this).data('product-desc'),
            category: $(this).data('product-category'),
            motif: $(this).data('product-motif'),
            berat: $(this).data('product-berat'),
            bahan: $(this).data('product-bahan'),
            ukuran: $(this).data('product-ukuran'),
            panjang: $(this).data('product-panjang'),
            mainImage: $(this).data('product-image'),
            detail1: $(this).data('product-detail1'),
            detail2: $(this).data('product-detail2')
        };
        
        console.log('Product data:', productData);
        showProductModal(productData);
    });
    
    // Handle WhatsApp button in modal
    $(document).on('click', '.js-addcart-detail', function(e) {
        e.preventDefault();
        console.log('WhatsApp modal button clicked');
        
        if (!currentProductData) {
            alert('Data produk tidak ditemukan!');
            return;
        }
        
        const quantity = $('.js-modal-quantity').val() || 1;
        
        sendWhatsAppMessage(
            currentProductData.name,
            currentProductData.price,
            currentProductData.category,
            currentProductData.motif,
            currentProductData.berat,
            currentProductData.bahan,
            currentProductData.ukuran,
            currentProductData.panjang,
            currentProductData.desc,
            quantity
        );
    });
    
    // Handle direct WhatsApp buttons
    $(document).on('click', '.js-whatsapp-direct', function(e) {
        e.preventDefault();
        console.log('Direct WhatsApp button clicked');
        
        const productData = {
            name: $(this).data('product-name'),
            price: $(this).data('product-price'),
            category: $(this).data('product-category'),
            motif: $(this).data('product-motif'),
            berat: $(this).data('product-berat'),
            bahan: $(this).data('product-bahan'),
            ukuran: $(this).data('product-ukuran'),
            panjang: $(this).data('product-panjang'),
            desc: $(this).data('product-desc')
        };
        
        const quantity = 1; // Default quantity for direct buttons
        
        sendWhatsAppMessage(
            productData.name,
            productData.price,
            productData.category,
            productData.motif,
            productData.berat,
            productData.bahan,
            productData.ukuran,
            productData.panjang,
            productData.desc,
            quantity
        );
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
                      `📦 *${productName}*\n` +
                      `💰 Harga: Rp ${price.toLocaleString('id-ID')}\n` +
                      `📁 Kategori: ${category || '-'}\n` +
                      `⚖️ Berat: ${berat || '-'}\n` +
                      `🎨 Motif: ${motif || '-'}\n` +
                      `🧵 Bahan: ${bahan || '-'}\n` +
                      `📐 Ukuran: ${ukuran || '-'}\n` +
                      `📏 Panjang Tali: ${panjang || '-'}\n` +
                      `🔢 Jumlah: ${quantity}\n\n` +
                      `📝 *Deskripsi:*\n${desc || 'Tidak ada deskripsi'}\n\n` +
                      `Apakah produk ini tersedia?`;
        
        const whatsappUrl = `https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(message)}`;
        
        console.log('Opening WhatsApp URL:', whatsappUrl);
        window.open(whatsappUrl, '_blank');
        
        // Show success message
        if (typeof swal !== 'undefined') {
            swal(productName, "Berhasil melakukan pemesanan via WhatsApp", "success");
        } else {
            alert(`Pemesanan ${productName} berhasil dibuka di WhatsApp!`);
        }
    }
    
    // Close modal when clicking overlay
    $(document).on('click', '.js-hide-modal1', function() {
        $('.js-modal1').removeClass('show-modal1');
        // Destroy slick on close
        if ($('.slick3').hasClass('slick-initialized')) {
            $('.slick3').slick('unslick');
        }
    });
    
    // Close modal when clicking overlay background
    $(document).on('click', '.overlay-modal1', function(e) {
        if (e.target === this) {
            $('.js-modal1').removeClass('show-modal1');
            if ($('.slick3').hasClass('slick-initialized')) {
                $('.slick3').slick('unslick');
            }
        }
    });
});