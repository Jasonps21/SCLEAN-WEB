<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo base_url() ?>">Beranda</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Keranjang</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="product-thumbnail">Gambar</th>
                            <th class="product-name">Nama Barang</th>
                            <th class="product-price">Harga</th>
                            <th class="product-quantity">Jumlah</th>
                            <th class="product-total">Total</th>
                            <th class="product-remove">Hapus</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($this->cart->total_items() == 0) {
                            ?>
                            <tr class="text-center">
                                <td colspan="6">Tidak ada barang di kerangjang</td>
                            </tr>
                            <?php
                        } else {
                            foreach ($this->cart->contents() as $items) { ?>
                                <tr>
                                    <td class="product-thumbnail"><img
                                                src="<?php echo base_url() ?>assets/images/produk/<?php echo $items['gambar'] ?>"
                                                alt="Image" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black"><?php echo $items['name'] ?></h2>
                                    </td>
                                    <td><?php echo "Rp. " . number_format($items['price']) ?></td>
                                    <td><?php echo $items['qty'] ?></td>
                                    <td><?php echo $items['subtotal'] ?></td>
                                    <td><a href="#" class="hapus_cart btn btn-primary btn-sm"
                                           id="<?php echo $items['rowid']; ?>" data-qty="<?php echo $items['qty'] ?>" data-id="<?php echo $items['id'] ?>">X</a></td>
                                </tr>
                            <?php }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-4">
                        <a class="btn btn-danger btn-sm btn-block" href="<?php echo base_url() ?>Cart/HapusAllCart">Hapus
                            Semua</a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-outline-primary btn-sm btn-block" href="<?php echo base_url() ?>Product">Lanjut
                            Belanja</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Total Keranjang</h3>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black"><?php echo "Rp. " . number_format($this->cart->total()) ?></strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg py-3 btn-block"
                                        onclick="window.location='<?php echo base_url() ?>Checkout'">Proses Bayar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>