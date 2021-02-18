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
                    <div class="data-tables">
                        <table id="table_pemesan" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="10%">No Nota</th>
                                    <th>Nama Pemesan</th>
                                    <th>Lokasi Laundry</th>
                                    <th width="10%">Tanggal Pesan</th>
                                    <th>Alamat</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th width="12%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($daftarPemesan as $u) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $u->nomor_pesanan ?></td>
                                        <td class="text-center"><?php echo $u->nama_lengkap ?></td>
                                        <td class="text-center"><?php echo $u->nama_laundry ?></td>
                                        <td class="text-center"><?php echo $u->tgl_pesan ?></td>
                                        <td class="text-center"><?php echo $u->alamat . ' ,' . $u->kelurahan . ', ' . $u->kecamatan . ', ' . $u->kota.', ' . $u->kode_pos ?></td>
                                        <td class="text-center"><?php echo "Rp. " . number_format($u->total) ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($u->status == 0) {
                                            ?>
                                                <span class="badge badge-info">Menunggu Konfirmasi</span>
                                            <?php
                                            } else if ($u->status == 1) {
                                            ?>
                                                <span class="badge badge-warning">Menerima Pesanan</span>
                                            <?php
                                            } else if ($u->status == 2) {
                                            ?>
                                                <span class="badge badge-success">Pemesanan Selesai</span>
                                            <?php
                                            } else if ($u->status == 3) {
                                            ?>
                                                <span class="badge badge-danger">Pemesanan dibatalkan</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Detail Pemesanan" href="<?php echo  base_url() ?>Pemesanan/detail_pesanan/<?php echo $u->id_pesanan . "/". $u->nomor_pesanan ?> ?>"><i class="ti-eye"></i></a>
                                            <?php if ($u->status === '0') { ?>
                                                <a class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Konfirmasi Pesanan" href="<?php echo base_url() . 'Pemesanan/update_status/' . $u->id_pesanan . '/1' ?>"><i class="ti-check"></i></a>
                                            <?php } ?>
                                            <?php if ($u->status === '1') { ?>
                                                <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Konfirmasi Pesanan Selesai" href="<?php echo base_url() . 'Pemesanan/update_status/' . $u->id_pesanan . '/2' ?>"><i class="ti-check"></i></a>
                                            <?php } ?>
                                            <?php if ($u->status === '0' || $u->status === '1') { ?>
                                                <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Batalkan Pemesanan" onclick="javascript: return confirm('Apakah Anda yakin ingin batalkan pesanan ini?')" href="<?php echo base_url() . 'Pemesanan/update_status/' . $u->id_pesanan . '/3'?>"><i class="ti-close"></i></a>
                                            <?php } ?>
                                        </td>
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