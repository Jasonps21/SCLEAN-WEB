<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.html">Beranda</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Invoice</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if ($error) {
        ?>
        <div class="col-md-12 no-padding">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>
            </div>
        </div>
        <?php } ?>
        <!--            <div class="col-md-12">-->
        <!---->
        <!--                <div class="row mb-5">-->
        <!--                    <div class="col-md-12">-->
        <!--                        <h2 class="h3 mb-3 text-black text-center">Pesanan Anda</h2>-->
        <!--                        <div class="p-3 p-lg-5 border">-->
        <!--                            <table class="table site-block-order-table mb-5">-->
        <!--                                <thead>-->
        <!--                                <th>Nama Barang</th>-->
        <!--                                <th>Total</th>-->
        <!--                                </thead>-->
        <!--                                <tbody>-->
        <!--                                --><?php //foreach ($this->cart->contents() as $items) { ?>
        <!--                                    <tr>-->
        <!--                                        <td>--><?php //echo $items['name'] ?><!-- <strong-->
        <!--                                                    class="mx-2">x</strong> -->
        <?php //echo $items['qty'] ?><!--</td>-->
        <!--                                        <td>-->
        <?php //echo "Rp. " . number_format($items['subtotal']) ?><!--</td>-->
        <!--                                    </tr>-->
        <!--                                --><?php //} ?>
        <!--                                <tr>-->
        <!--                                    <td class="text-black font-weight-bold"><strong>Ongkos Kirim</strong></td>-->
        <!--                                    <td class="text-black">Rp. 100.000</td>-->
        <!--                                </tr>-->
        <!--                                <tr>-->
        <!--                                    <td class="text-black font-weight-bold"><strong>Order Total</strong></td>-->
        <!--                                    <td class="text-black font-weight-bold">-->
        <!--                                        <strong>-->
        <?php //echo "Rp. " . number_format($this->cart->total() + 100000) ?><!--</strong>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                </tbody>-->
        <!--                            </table>-->
        <!---->
        <!--                            <div class="border p-3 mb-3">-->
        <!--                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank"-->
        <!--                                                       role="button" aria-expanded="false" aria-controls="collapsebank">Direct-->
        <!--                                        Bank Transfer</a></h3>-->
        <!---->
        <!--                                <div class="collapse" id="collapsebank">-->
        <!--                                    <div class="py-2">-->
        <!--                                        <p class="mb-0">Make your payment directly into our bank account. Please use-->
        <!--                                            your Order ID as the payment reference. Your order won’t be shipped until-->
        <!--                                            the funds have cleared in our account.</p>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!---->
        <!--                            <div class="border p-3 mb-3">-->
        <!--                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque"-->
        <!--                                                       role="button" aria-expanded="false"-->
        <!--                                                       aria-controls="collapsecheque">Cheque Payment</a></h3>-->
        <!---->
        <!--                                <div class="collapse" id="collapsecheque">-->
        <!--                                    <div class="py-2">-->
        <!--                                        <p class="mb-0">Make your payment directly into our bank account. Please use-->
        <!--                                            your Order ID as the payment reference. Your order won’t be shipped until-->
        <!--                                            the funds have cleared in our account.</p>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!---->
        <!--                            <div class="form-group">-->
        <!--                                <a class="save_order text-white btn btn-primary btn-lg py-3 btn-block">Simpan-->
        <!--                                    Orderan</a>-->
        <!--                            </div>-->
        <!---->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!---->
        <!--            </div>-->


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
                                            <span><?php echo "#" . $detailpemesanan['id_pemesanan'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="invoice-address">
                                            <h3>invoiced to</h3>
                                            <h5><?php echo $detailpemesanan['nama'] ?></h5>
                                            <p>
                                                <b><?php echo $detailpemesanan['nama_toko'] ?></b> <?php echo $detailpemesanan['alamat'] ?>
                                                , <?php echo $detailpemesanan['kota'] ?>
                                                , <?php echo $detailpemesanan['kecamatan'] ?>
                                                , <?php echo $detailpemesanan['kelurahan'] ?>
                                                , <?php echo $detailpemesanan['kode_pos'] ?></p>
                                            <p><?php echo $detailpemesanan['email'] ?></p>
                                            <p><?php echo $detailpemesanan['nomor_hp'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <b><h5 class="text-black-50 text-black">Invoice Date
                                                : <?php echo $detailpemesanan['tgl_pesan'] ?></h5></b>
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
                                            <th>total</th>
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
            <br>
            <?php if ($detailpemesanan['status'] == 1) { ?>
                <form action="<?php echo base_url(); ?>Checkout/upload_struk" method="post"
                      enctype="multipart/form-data">
                    <div class="row col-lg-12 align-items-center mb-5">

                        <div class="col-md-6 border rounded p-2">
                            <p class="text-black">Silahkan upload bukti pembayaran anda dibawah ini</p>
                            <div class="input-group">
                                <div class="col-auto">
                                    <input type="text" id="uploadImage" name="id_pemesanan"
                                           value="<?php echo $detailpemesanan['id_pemesanan'] ?>" hidden
                                           class="form-control">
                                    <input type="file" id="uploadImage" name="myPhoto"
                                           class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="invoice-buttons text-right col-md-6">
                            <input type="submit" class="btn btn-primary" value="Upload Struk">
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>