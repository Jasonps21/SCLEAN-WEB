<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <?php

            use SebastianBergmann\CodeCoverage\Driver\Selector;

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
                            <form action="<?php echo base_url(); ?>Laporan/LaporanAdminByDate" method="POST">
                                <div class="form-group">
                                    <label>Tanggal Transaksi</label>
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="startDate" name="startDate" VALUE="<?php echo $tgl_awal ?>">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">To</span>
                                                </div>
                                                <input type="text" class="form-control" id="endDate" name="endDate" VALUE="<?php echo $tgl_akhir ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-control selectpicker" data-live-search="true" name="id_laundry">
                                                <?php
                                                foreach ($daftarLaundry as $u) {
                                                ?>
                                                    <option value="<?php echo $u->id_laundry ?>" data-tokens="<?php echo $u->id_laundry ?>" <?php if ($id_laundry === $u->id_laundry) {
                                                                                                                                                echo 'selected';
                                                                                                                                            } ?>><?php echo $u->nama_laundry ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                        <div class="col-auto">
                                            <input type="submit" id="lihat_buku_tahun" class="btn btn-primary" value="Cari">
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
                                    <th>Tanggal Pesan</th>
                                    <th>Nama Laundry</th>
                                    <th>Nama Layanan</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_qty = 0;
                                $total_penjualan = 0;
                                foreach ($daftartransaksi as $u) {
                                    $total_qty += $u->qty;
                                    $total_penjualan += $u->total;
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $u->nomor_pesanan ?></td>
                                        <td class="text-center"><?php echo $u->tgl_pesan ?></td>
                                        <td class="text-center"><?php echo $u->nama_laundry ?></td>
                                        <td class="text-center"><?php echo $u->nama_layanan ?></td>
                                        <td class="text-center"><?php echo $u->qty . ' ' . $u->satuan ?></td>
                                        <td class="text-center"><?php echo $u->harga ?></td>
                                        <td class="text-center"><?php echo $u->total ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <th><?php echo $total_qty ?></th>
                                    <th></th>
                                    <th><?php echo "Rp. " . number_format($total_penjualan) ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>