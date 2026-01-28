@extends('layouts.app')

@section('title', 'Batik Marni Jaya - Beranda')

@section('content')
<body class="animsition">
	
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

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						Batik Marni Jaya 
					</span>

					<div class="flex-w flex-sb p-t-36 gallery-lb">
						@php
							// Ambil beberapa gambar produk untuk gallery
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
							$galleryImages = array_slice(array_unique($galleryImages), 0, 6);
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
							@endif
						@endforeach
						
						@php
							$imageCount = count($galleryImages);
						@endphp
						
						@for($i = $imageCount; $i < 6; $i++)
							@php
								$defaultImage = 'images/gallery-0' . (($i % 6) + 1) . '.jpg';
							@endphp
							<!-- item gallery sidebar default -->
							<div class="wrap-item-gallery m-b-10">
								<a class="item-gallery bg-img1" href="{{ asset($defaultImage) }}" data-lightbox="gallery" 
								style="background-image: url('{{ asset($defaultImage) }}');"></a>
							</div>
						@endfor
					</div>
				</div>

				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						Tentang Kami
					</span>

					<p class="stext-108 cl6 p-t-27">
						Batik adalah kain Budaya Jawa Indonesia bergambar yang pembuatannya secara khusus dengan menuliskan atau menerakan malam pada kain itu, kemudian pengolahannya diproses dengan cara tertentu yang memiliki kekhasan. sebagai keseluruhan teknik, teknologi, serta pengembangan motif dan budaya yang terkait, oleh UNESCO telah ditetapkan sebagai Warisan Kemanusiaan untuk Budaya Lisan dan Nonbendawi sejak 2 Oktober 2009. Sejak saat itu, 2 Oktober ditetapkan sebagai Hari Batik Nasional.
					</p>
				</div>
			</div>
		</div>
	</aside>

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">
				<div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('images/slide-08.jpg') }});" data-thumb="{{ asset('images/thumb-04.jpg') }}" data-caption="Batik Marni Jaya">
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

				<div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('images/slide-09.jpg') }});" data-thumb="{{ asset('images/thumb-05.jpg') }}" data-caption="Batik Marni Jaya">
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

				<div class="item-slick1 bg-overlay1" style="background-image: url({{ asset('images/slide-08.jpg') }});" data-thumb="{{ asset('images/thumb-04.jpg') }}" data-caption="Batik Marni Jaya">
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

	<!-- Banner -->
	<div class="sec-banner bg0 p-t-40 p-b-40">
		<!-- Banner content jika ada -->
	</div>

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
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
						@if($category->nama_kategori)
							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" 
									data-filter=".kategori-{{ Str::slug($category->nama_kategori) }}">
								{{ $category->nama_kategori }}
							</button>
						@endif
					@endforeach
				</div>
				<div class="flex-w flex-c-m m-tb-10">
					<!-- Filter dan search buttons -->
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Cari produk...">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Kategori
							</div>
							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active" data-filter="*">
										Semua Kategori
									</a>
								</li>
								@foreach($categories as $category)
									@if($category->nama_kategori)
										<li class="p-b-6">
											<a href="#" class="filter-link stext-106 trans-04" data-filter=".kategori-{{ Str::slug($category->nama_kategori) }}">
												{{ $category->nama_kategori }}
											</a>
										</li>
									@endif
								@endforeach
							</ul>
						</div>
						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Etalase
							</div>
							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active" data-filter="*">
										Semua Etalase
									</a>
								</li>
								@php
									$etalaseOptions = \App\Models\Product::select('etalase')
										->whereNotNull('etalase')
										->where('etalase', '!=', '')
										->distinct()
										->orderBy('etalase')
										->pluck('etalase');
								@endphp
								@foreach($etalaseOptions as $etalase)
									<li class="p-b-6">
										<a href="#" class="filter-link stext-106 trans-04" data-filter=".etalase-{{ Str::slug($etalase) }}">
											{{ $etalase }}
										</a>
									</li>
								@endforeach
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Proses Batik
							</div>
							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active" data-filter="*">
										Semua Proses
									</a>
								</li>
								@php
									$prosesOptions = \App\Models\Product::select('proses_batik')
										->whereNotNull('proses_batik')
										->where('proses_batik', '!=', '')
										->distinct()
										->orderBy('proses_batik')
										->pluck('proses_batik');
								@endphp
								@foreach($prosesOptions as $proses)
									<li class="p-b-6">
										<a href="#" class="filter-link stext-106 trans-04" data-filter=".proses-{{ Str::slug($proses) }}">
											{{ $proses }}
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
				@foreach($products as $product)
    @php
        // Ambil gambar detail pertama dan kedua
        $gambarDetail1 = '';
        $gambarDetail2 = '';
        
        if (!empty($product->gambar_detail)) {
            $details = explode(',', $product->gambar_detail);
            $gambarDetail1 = trim($details[0]) ?? '';
        }
        
        if (!empty($product->gambar_detail2)) {
            $details2 = explode(',', $product->gambar_detail2);
            $gambarDetail2 = trim($details2[0]) ?? '';
        }
    @endphp
    
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="{{ asset('images/products/' . $product->gambar) }}" 
                    alt="{{ $product->nama_produk }}"
                    style="height: 300px; object-fit: cover;">

                <button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"
                    data-product-id="{{ $product->id_produk }}"
                    data-product-name="{{ $product->nama_produk }}"
                    data-product-price="{{ $product->harga }}"
                    data-product-desc="{{ $product->deskripsi }}"
                    data-product-category="{{ $product->category->nama_kategori ?? '' }}"  
                    data-product-motif="{{ $product->motif->nama_motif ?? '' }}"        
                    data-product-berat="{{ $product->berat }} gram"        
                    data-product-bahan="{{ $product->jenis_kain }}"
                    data-product-ukuran="{{ $product->ukuran }} cm"        
                    data-product-panjang="{{ $product->panjang_tali }} cm"
                    data-product-image="{{ $product->gambar }}"
                    data-product-detail1="{{ $gambarDetail1 }}"
                    data-product-detail2="{{ $gambarDetail2 }}">
                    Lihat Detail
                </button>
            </div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l">
									<a href="{{ route('products.show', $product->id_produk) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{ $product->nama_produk }}
									</a>

									<span class="stext-105 cl3">
										Rp {{ number_format($product->harga, 0) }}
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<button class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 js-whatsapp-direct"
										data-product-name="{{ $product->nama_produk }}"
										data-product-price="{{ number_format($product->harga, 2, '.', '') }}"
										data-product-category="{{ $product->category->nama_kategori ?? '' }}"  
										data-product-motif="{{ $product->motif->nama_motif ?? '' }}"        
										data-product-berat="{{ $product->berat }} gram"        
										data-product-bahan="{{ $product->jenis_kain }}"
										data-product-ukuran="{{ $product->ukuran }} cm"        
										data-product-panjang="{{ $product->panjang_tali }} cm"
										data-product-desc="{{ $product->deskripsi }}">
										<img class="icon-heart1 dis-block trans-04" src="{{ asset('images/icons/icon-heart-01.png') }}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('images/icons/icon-heart-02.png') }}" alt="ICON">
									</button>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<!-- Tombol Lihat Semua -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="{{ route('products.index') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
					Lihat Semua Produk
				</a>
			</div>
		</div>
	</section>
</body>

@push('scripts')
<script>
	// Filter functionality
	$(document).ready(function() {
		// Filter by category, etalase, and proses batik
		$('.filter-link').on('click', function(e) {
			e.preventDefault();
			var filterValue = $(this).data('filter');
			
			// Remove active class from all links
			$('.filter-link').removeClass('filter-link-active');
			// Add active class to clicked link
			$(this).addClass('filter-link-active');
			
			// Filter products
			if (filterValue == '*') {
				$('.isotope-item').show();
			} else {
				$('.isotope-item').hide();
				$(filterValue).show();
			}
		});

		// Filter by category buttons
		$('.filter-tope-group button').on('click', function() {
			var filterValue = $(this).data('filter');
			
			// Remove active class from all buttons
			$('.filter-tope-group button').removeClass('how-active1');
			// Add active class to clicked button
			$(this).addClass('how-active1');
			
			// Filter products
			if (filterValue == '*') {
				$('.isotope-item').show();
			} else {
				$('.isotope-item').hide();
				$(filterValue).show();
			}
		});
	});
</script>
@endpush
@endsection