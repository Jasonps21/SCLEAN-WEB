<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-area">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="iv-left col-6">
                                    <span>INVOICE</span>
                                </div>
                                <div class="iv-right col-6 text-md-right">
                                    <span>#<?php echo $detailpemesanan['id_pemesanan'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="invoice-address">
                                    <h3>invoiced to</h3>
                                    <h5><?php echo $detailpemesanan['nama'] ?></h5>
                                    <p><?php echo $detailpemesanan['nama_toko'] ?> <?php echo $detailpemesanan['alamat'] ?>
                                        , <?php echo $detailpemesanan['kota'] ?> </p>
                                    <p>Kecamatan : <b><?php echo $detailpemesanan['kecamatan'] ?></b>, Kelurahan :
                                        <b><?php echo $detailpemesanan['kelurahan'] ?></b>, Kode Pos :
                                        <b><?php echo $detailpemesanan['kode_pos'] ?></b></p>
                                    <p>Email : <?php echo $detailpemesanan['email'] ?></p>
                                    <p>Telp : <?php echo $detailpemesanan['nomor_hp'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="invoice-date">
                                    <li>Tanggal pesan : <?php echo $detailpemesanan['tgl_pesan'] ?></li>
                                    <li>Tanggal bayar : <?php echo $detailpemesanan['tgl_bayar'] ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-table table-responsive mt-5">
                            <table class="table table-bordered table-hover text-right">
                                <thead>
                                <tr class="text-capitalize">
                                    <th class="text-center" style="width: 5%;">No</th>
                                    <th class="text-left" style="width: 45%; min-width: 130px;">Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th style="min-width: 100px">Harga</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                foreach ($detailorder as $u) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td class="text-left"><?php echo $u->nama_barang ?></td>
                                        <td><?php echo $u->stok ?></td>
                                        <td>Rp. <?php echo number_format($u->harga) ?></td>
                                        <td>Rp. <?php echo number_format($u->total) ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4">Total keseluruhan :</td>
                                    <td>Rp. <?php echo number_format($detailpemesanan['total']) ?></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="invoice-address">
                                <h5>Catatan Order</h5>
                                <p><?php if ($detailpemesanan['catatan_order'] == "") {
                                        echo "Tidak ada pesan catatan order";
                                    } else {
                                        echo $detailpemesanan['catatan_order'];
                                    }
                                    ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <div class="invoice-address">
                                <h5>Status Pemesanan</h5>
                                <?php
                                if ($detailpemesanan['status'] == 1) {
                                    ?>
                                    <span class="badge badge-info p-2">Menunggu Pembayaran</span>
                                    <?php
                                } else if ($detailpemesanan['status'] == 2) {
                                    ?>
                                    <span class="badge badge-warning p-2">Menunggu Konfirmasi pembayaran</span>
                                    <?php
                                } else if ($detailpemesanan['status'] == 3) {
                                    ?>
                                    <span class="badge badge-success p-2">Pemesanan Berhasil</span>
                                    <?php
                                } else if ($detailpemesanan['status'] == 4) {
                                    ?>
                                    <span class="badge badge-danger p-2">Pemesanan dibatalkan</span>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>