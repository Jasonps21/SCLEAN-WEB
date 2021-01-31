<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;

}

?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo base_url() ?>">Beranda</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Produk</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-9 order-2">

                <div class="row">
                    <div class="col-md-12 ">
                        <div class="float-md-left mb-4"><h2 class="text-black h5">Semua Produk</h2></div>
                    </div>
                </div>
                <div class="row mb-5">
                    <?php
                    if (sizeof($daftarBarang) == 0) {
                        ?>
                        <div class="col-md-12 text-center text-black">
                            <h2><span class="icon icon-find_in_page"></span> Tidak ditemukan produk yang anda cari</h2>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-md-12 text-center mb-3">
                            <h2>produk yang anda cari dengan kata kunci "<?php echo $cari ?>"</h2>
                        </div>
                        <?php
                    }
                    foreach ($daftarBarang as $u) {
                        ?>

                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                            <div class="block-4 text-center border">
                                <figure class="block-4-image">
                                    <img
                                                src="<?php echo base_url() ?>assets/images/produk/<?php echo $u->file ?>"
                                                alt="Image placeholder" class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><?php echo $u->nama_barang ?></h3>
                                    <p class="mb-0">Jumlah Stok : <?php echo $u->stok ?></p>
                                    <p class="text-primary font-weight-bold"><?php echo rupiah($u->harga) ?></p>
                                    <div class="input-group mb-3 mx-auto" style="max-width: 120px">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;
                                            </button>
                                        </div>
                                        <input type="text" class="form-control text-center qtyproduk" value="1"
                                               name="quantity"
                                               id="<?php echo $u->id_barang; ?>"
                                               aria-label="Example text with button addon"
                                               aria-describedby="button-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;
                                            </button>
                                        </div>
                                    </div>
                                    <button class="add_cart btn btn-primary btn-sm text-white"
                                            data-produkid="<?php echo $u->id_barang; ?>"
                                            data-produknama="<?php echo $u->nama_barang; ?>"
                                            data-produkharga="<?php echo $u->harga; ?>"
                                            data-produkstok="<?php echo $u->stok; ?>"
                                            data-produkgambar="<?php echo $u->file; ?>">

                                        <span class="icon icon-shopping_cart"></span> Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>


                </div>
            </div>

            <div class="col-md-3 order-1 mb-5 mb-md-0">
                <div class="border p-4 rounded mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Kategori</h3>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><a href="<?php echo base_url()?>Product" class="d-flex"><span>Semua Kategori</span> <span
                                        class="text-black ml-auto"></span></a></li>
                        <?php
                        $no = 1;
                        foreach ($daftarKategori as $u) {
                            ?>
                            <li class="mb-1"><a href="<?php echo base_url()?>KategoriProduk/<?php echo $u->id ?>" class="d-flex"><span><?php echo $u->nama_kategori ?></span>
                                    <span
                                            class="text-black ml-auto"></span></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
