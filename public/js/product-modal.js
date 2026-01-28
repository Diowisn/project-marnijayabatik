// product-modal.js
$(document).ready(function() {
    let currentProductImages = [];
    
    // Show modal function
    function showProductModal(productData) {
        // Clear previous images
        currentProductImages = [];
        const galleryContainer = $('.js-modal-gallery');
        galleryContainer.empty();
        
        // Collect all product images
        if (productData.mainImage) {
            currentProductImages.push({
                src: `${baseUrl}/images/products/${productData.mainImage}`,
                thumb: `${baseUrl}/images/products/${productData.mainImage}`,
                alt: productData.name
            });
        }
        
        if (productData.detail1) {
            currentProductImages.push({
                src: `${baseUrl}/images/products/detail/${productData.detail1}`,
                thumb: `${baseUrl}/images/products/detail/${productData.detail1}`,
                alt: `${productData.name} - Detail 1`
            });
        }
        
        if (productData.detail2) {
            currentProductImages.push({
                src: `${baseUrl}/images/products/detail2/${productData.detail2}`,
                thumb: `${baseUrl}/images/products/detail2/${productData.detail2}`,
                alt: `${productData.name} - Detail 2`
            });
        }
        
        // Add images to gallery
        currentProductImages.forEach((image, index) => {
            galleryContainer.append(`
                <div class="item-slick3" data-thumb="${image.thumb}">
                    <div class="wrap-pic-w pos-relative">
                        <img src="${image.src}" alt="${image.alt}">
                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" 
                           href="${image.src}" 
                           data-lightbox="gallery">
                            <i class="fa fa-expand"></i>
                        </a>
                    </div>
                </div>
            `);
        });
        
        // Fill product info
        $('.js-name-detail').text(productData.name);
        $('.js-price-detail').text(`Rp ${parseInt(productData.price).toLocaleString('id-ID')}`);
        $('.js-desc-detail').text(productData.desc);
        $('.js-category-detail').text(productData.category);
        $('.js-motif-detail').text(productData.motif);
        $('.js-berat-detail').text(productData.berat);
        $('.js-bahan-detail').text(productData.bahan);
        $('.js-ukuran-detail').text(productData.ukuran);
        $('.js-panjang-detail').text(productData.panjang);
        
        // Reset quantity
        $('#quantity-input').val(1);
        
        // Show modal
        $('.js-modal1').addClass('show-modal1');
        
        // Initialize slick slider
        initSlickSlider();
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
                infinite: currentProductImages.length > 1,
                prevArrow: '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                nextArrow: '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
                dots: currentProductImages.length > 1,
                appendDots: '.wrap-slick3-dots',
                dotsClass: 'slick3-dots',
                customPaging: function(slick, index) {
                    var thumb = $(slick.$slides[index]).data('thumb');
                    return '<img src="' + thumb + '">';
                }
            });
        }, 100);
    }
    
    // Handle modal show button click
    $(document).on('click', '.js-show-modal1', function(e) {
        e.preventDefault();
        
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
        
        showProductModal(productData);
    });
    
    // Close modal
    $(document).on('click', '.js-hide-modal1', function() {
        $('.js-modal1').removeClass('show-modal1');
        // Destroy slick on close
        if ($('.slick3').hasClass('slick-initialized')) {
            $('.slick3').slick('unslick');
        }
    });
});