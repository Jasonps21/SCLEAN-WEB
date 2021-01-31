<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th class="product-name">No Pesanan</th>
                            <th class="product-price">Tanggal Pesan</th>
                            <th class="product-total">Total</th>
                            <th class="product-price">Tanggal Bayar</th>
                            <th class="product-total">Status</th>
                            <th class="product-remove">Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (sizeof($daftarpemesanan) == 0) {
                            ?>
                            <tr class="text-center">
                                <td colspan="6">Tidak ada barang di kerangjang</td>
                            </tr>
                            <?php
                        } else {
                            $no=1;
                            foreach ($daftarpemesanan as $items) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black"><?php echo $items->id_pemesanan ?></h2>
                                    </td>
                                    <td><?php echo $items->tgl_pesan ?></td>
                                    <td><?php echo $items->total?></td>
                                    <td><?php echo $items->tgl_bayar?></td>
                                    <td><?php
                                        if ($items->status == 1) {
                                            ?>
                                            <span class="badge badge-info">Menunggu Pembayaran</span>
                                            <?php
                                        } else if ($items->status == 2) {
                                            ?>
                                            <span class="badge badge-warning">Menunggu Konfirmasi pembayaran</span>
                                            <?php
                                        } else if ($items->status == 3) {
                                            ?>
                                            <span class="badge badge-success">Pemesanan Berhasil</span>
                                            <?php
                                        } else if ($items->status == 4) {
                                            ?>
                                            <span class="badge badge-danger">Pemesanan dibatalkan</span>
                                            <?php
                                        }
                                        ?></td>
                                    <td><a class="btn btn-sm btn-primary"
                                           href="<?php echo base_url() . 'Konfirmasi/' . $items->id_pemesanan ?>"><i
                                                class="ti-eye"></i></a></td>
                                </tr>
                            <?php }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>