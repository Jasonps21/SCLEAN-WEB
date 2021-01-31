<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <?php
            $this->load->helper('form');
            $error = $this->session->flashdata('error');
            if ($error) {
                ?>
                <div class="no-padding">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $error; ?>
                    </div>
                </div>
            <?php }
            $success = $this->session->flashdata('success');
            if ($success) {
                ?>
                <div class="no-padding">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $success; ?>
                    </div>
                </div>
            <?php } ?>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?php echo base_url(); ?>Laporan/LaporanByDate" method="POST">
                                <div class="form-group">
                                    <label>Tanggal Transaksi</label>
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="startDate" name="startDate" VALUE="<?php echo $tgl_awal?>">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">To</span>
                                                </div>
                                                <input type="text" class="form-control" id="endDate" name="endDate" VALUE="<?php echo $tgl_akhir?>">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <input type="submit" id="lihat_buku_tahun"
                                                   class="btn btn-primary" value="Cari">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-body">
                    <div class="data-tables">
                        <table id="tabel_laporan_transaksi" class="text-center">
                            <thead class="bg-light text-capitalize">
                            <tr>
                                <th width="1%">No Pemesanan</th>
                                <th>Nama Pemesanan</th>
                                <th width="8%">Nama Barang</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Tanggal Pesan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($daftartransaksi as $u) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $u->id_pemesanan ?></td>
                                    <td class="text-center"><?php echo $u->nama ?></td>
                                    <td class="text-center"><?php echo $u->nama_barang ?></td>
                                    <td class="text-center"><?php echo $u->stok ?></td>
                                    <td class="text-center"><?php echo $u->harga ?></td>
                                    <td class="text-center"><?php echo $u->total ?></td>
                                    <td class="text-center"><?php echo $u->tgl_pesan ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>