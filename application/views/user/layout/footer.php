<footer class="site-footer border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">Info Kontak</h3>
                    <ul class="list-unstyled">
                        <li class="address">jl  Laiya 111B, Makassar</li>
                        <li class="phone"><a href="tel://081242100060">+62 81242100060</a></li>
                        <li class="email">ikebanafloristmks@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | <i class="icon-heart" aria-hidden="true"></i> <a href="" class="text-primary">IKEBANA
                        FLORSIT</a>
                </p>
            </div>

        </div>
    </div>
</footer>
</div>

<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets_user/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets_user/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets_user/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets_user/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets_user/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets_user/js/aos.js"></script>

<script src="<?php echo base_url(); ?>assets_user/js/main.js"></script>

</body>
</html>


<script>
    $(document).ready(function () {
        $('#countItem').text('<?php echo count($this->cart->contents()); ?>');
        var tempsession = "<?php echo $this->session->userdata('status_user')?>";
        $('.add_cart').click(function () {
            if (tempsession != "User") {
                window.location = "<?php echo base_url()?>/login";
            } else {
                if ($(this).data("produkstok") < $('.qtyproduk').val()) {
                    alert("Stok Produk tidak mencukupi");
                } else {
                    var produk_id = $(this).data("produkid");
                    var produk_nama = $(this).data("produknama");
                    var produk_harga = $(this).data("produkharga");
                    var produk_gambar = $(this).data("produkgambar");
                    var quantity = $('#' + produk_id).val();
                    $.ajax({
                        url: "<?php echo base_url();?>Cart/add_to_cart",
                        method: "POST",
                        data: {
                            produk_id: produk_id,
                            produk_nama: produk_nama,
                            produk_harga: produk_harga,
                            produk_gambar: produk_gambar,
                            quantity: quantity
                        },
                        success: function (data) {
                            var dataObj = JSON.parse(data);
                            alert("Barang berhasil masukkan ke keranjang");
                            // alert(dataObj.stok['stok']);
                            $('#countItem').text(dataObj.countItem);
                            location.reload();
                        }
                    });
                }
            }
        });

        $(document).on('click', '.hapus_cart', function () {
            var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
            var qty = $(this).data("qty");
            var id_barang = $(this).data("id");
            $.ajax({
                url: "<?php echo base_url();?>Cart/hapus_cart",
                method: "POST",
                data: {row_id: row_id, quantity: qty, id_barang:id_barang},
                success: function (data) {
                    alert("Data berhasil dihapus");
                    $('#countItem').text(data);
                    location.reload();
                }
            });
        });

        $('.save_order').click(function () {
            var nama = $('#nama_lengkap').val();
            var alamat = $('#alamat').val();
            var nama_toko = $('#nama_toko').val();
            var kota = $('#kota').val();
            var kecamatan = $('#kecamatan').val();
            var kelurahan = $('#kelurahan').val();
            var kode_pos = $('#kode_pos').val();
            var email = $('#email').val();
            var nomor_hp = $('#nomor_hp').val();
            var catatan_order = $('#catatan_order').val();

            $.ajax({
                url: "<?php echo base_url();?>Checkout/save_orderan",
                method: "POST",
                data: {
                    nama: nama,
                    alamat: alamat,
                    nama_toko: nama_toko,
                    kota: kota,
                    kecamatan: kecamatan,
                    kelurahan: kelurahan,
                    kode_pos: kode_pos,
                    email: email,
                    nomor_hp: nomor_hp,
                    catatan_order: catatan_order
                },
                success: function (data) {
                    alert("Orderan Berhasil disimpan");
                    window.location = "<?php echo base_url()?>Konfirmasi/"+data;
                }
            });
        });
    });
</script>