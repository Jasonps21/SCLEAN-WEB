<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo base_url()?>">Beranda</a> <span class="mx-2 mb-0">/</span> <a href="<?php echo base_url()?>/Cart">Keranjang</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Detail Pembeli</h2>
                <div class="p-3 p-lg-5 border">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_fname" class="text-black">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $detailuser['nama']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="alamat" class="text-black">Alamat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo $detailuser['alamat']?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama toko/perusahaan (optional)" id="nama_toko">
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="c_state_country" class="text-black">Kota <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $detailuser['kota'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="kecamatan" class="text-black">Kecamatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $detailuser['kecamatan'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="kelurahan" class="text-black">Kelurahan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo $detailuser['kelurahan'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="kode_pos" class="text-black">Kode Pos <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?php echo $detailuser['kode_pos'] ?>">
                        </div>
                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-md-6">
                            <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $detailuser['email']?>">
                        </div>
                        <div class="col-md-6">
                            <label for="nomor_hp" class="text-black">Nomor Telepon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Phone Number" value="<?php echo $detailuser['nomor_hp']?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="c_order_notes" class="text-black">Catatan Order</label>
                        <textarea name="catatan_order" id="catatan_order" cols="30" rows="5" class="form-control" placeholder="Masukkan catatan order anda disini..."></textarea>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Pesanan Anda</h2>
                        <div class="p-3 p-lg-5 border">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                <th>Nama Barang</th>
                                <th>Total</th>
                                </thead>
                                <tbody>
                                <?php foreach ($this->cart->contents() as $items) { ?>
                                <tr>
                                    <td><?php echo $items['name'] ?> <strong class="mx-2">x</strong> <?php echo $items['qty'] ?></td>
                                    <td><?php echo "Rp. ".number_format($items['subtotal']) ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                    <td class="text-black font-weight-bold"><strong><?php echo "Rp. " . number_format($this->cart->total()) ?></strong></td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transfer</a></h3>

                                <div class="collapse" id="collapsebank">
                                    <div class="py-2">
                                        <p class="mb-0">Silahkan lakukan pembayaran sesuai total harga yang telah tertera ke rekening  <strong class="text-primary">Mandiri 1520017613742, a/n Jessica Chandra</strong> dan lakukan transfer paling lambat 1x24 jam.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <a class="save_order text-white btn btn-primary btn-lg py-3 btn-block">Simpan Orderan</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- </form> -->
    </div>
</div>