<div class="wrap-modal1 js-modal-related p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal-related"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal-related">
                <img src="{{ asset('assets/images/icons/icon-close.png') }}" alt="CLOSE">
            </button>

            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w" id="wrap-slick3-related">
                            <div class="wrap-slick3-dots" id="wrap-slick3-dots-related"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w" id="wrap-slick3-arrows-related"></div>

                            <div class="slick3 gallery-lb" id="slick3-related">
                                {{-- Gambar akan dimuat melalui JavaScript --}}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 id="modal-related-product-name" class="mtext-105 cl2 js-name-detail p-b-14"></h4>
                        <span id="modal-related-product-price" class="mtext-106 cl2"></span>

                        <!-- Informasi Produk -->
                        <div class="flex-w flex-t p-t-15">
                            <div class="size-205 cl4">Kategori</div>
                            <div id="modal-related-product-category" class="size-206 cl6 p-b-5">-</div>
                        </div>

                        <div class="flex-w flex-t">
                            <div class="size-205 cl4">Motif</div>
                            <div id="modal-related-product-motif" class="size-206 cl6 p-b-5">-</div>
                        </div>

                        <div class="flex-w flex-t">
                            <div class="size-205 cl4">Berat</div>
                            <div id="modal-related-product-berat" class="size-206 cl6 p-b-5">-</div>
                        </div>

                        <div class="flex-w flex-t">
                            <div class="size-205 cl4">Bahan</div>
                            <div id="modal-related-product-bahan" class="size-206 cl6 p-b-5">-</div>
                        </div>

                        <div class="flex-w flex-t">
                            <div class="size-205 cl4">Ukuran</div>
                            <div id="modal-related-product-ukuran" class="size-206 cl6 p-b-5">-</div>
                        </div>

                        <div class="flex-w flex-t">
                            <div class="size-205 cl4">Panjang Tali</div>
                            <div id="modal-related-product-panjang" class="size-206 cl6 p-b-5">-</div>
                        </div>

                        <div class="flex-w flex-t p-t-15">
                            <div class="size-205 cl4">Deskripsi</div>
                            <div class="size-206">
                                <p id="modal-related-product-desc" class="stext-102 cl3 p-t-10"></p>
                            </div>
                        </div>
                        
                        <!-- Quantity dan WhatsApp -->
                        <div class="p-t-20">
                            <div class="flex-col">
                                <div class="size-205 cl4">Jumlah Beli</div>
                                <small>Minimal beli: 1</small>
                            </div>
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m js-btn-minus-related">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        
                                        <input class="mtext-104 cl3 txt-center num-product" 
                                               type="number" 
                                               name="quantity" 
                                               value="1" 
                                               min="1" 
                                               id="quantity-input-related">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m js-btn-plus-related">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>

                                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-whatsapp-modal-related">
                                        Pesan via WhatsApp
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