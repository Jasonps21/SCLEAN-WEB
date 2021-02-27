<?php $isLoggedIn = $this->session->userdata('status'); ?>
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
                    <div class="align-items-center">
                        <a class="btn btn-primary btn-sm float-right" href="<?php echo base_url() ?>Laundry/tambah_laundry">Tambah Laundry</a>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="data-tables">
                        <table id="table1" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="8%">Gambar</th>
                                    <?php
                                    if ($isLoggedIn === "Admin") {
                                    ?>
                                        <th>Pemilik</th>
                                    <?php } ?>
                                    <th>Laundry</th>
                                    <th>Alamat</th>
                                    <th width="10%">Nomor Telepon</th>
                                    <th width="10%">Biaya Pengantaran</th>
                                    <th width="8%">Jam Buka</th>
                                    <?php
                                    if ($isLoggedIn === "Admin") {
                                    ?>
                                        <th width="5%">Rekomendasi</th>
                                    <?php } ?>
                                    <th width="10%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($daftarLaundry as $u) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td class="text-center"><img src="<?php echo base_url() . "assets/images/produk/" . $u->photo ?>" width="200px" height="200px"> </td>
                                        <?php
                                        if ($isLoggedIn === "Admin") {
                                        ?>
                                            <td class="text-center"><?php echo $u->nama ?></td>
                                        <?php } ?>
                                        <td class="text-center"><?php echo $u->nama_laundry ?></td>
                                        <td class="text-center"><?php echo $u->alamat ?></td>
                                        <td class="text-center"><?php echo $u->nomor_telepon ?></td>
                                        <td class="text-center"><?php echo $u->biaya_pengantaran ?></td>
                                        <td class="text-center"><?php echo date_format(new DateTime($u->jam_buka), 'H:i') . ' - ' . date_format(new DateTime($u->jam_tutup), 'H:i'); ?></td>
                                        <?php
                                        if ($isLoggedIn === "Admin") {
                                        ?>
                                            <td class="text-center">
                                                <?php
                                                if ($u->is_recommend == 0) {
                                                ?>
                                                    <span class="badge badge-danger">Tidak</span>
                                                <?php
                                                } else if ($u->is_recommend == 1) {
                                                ?>
                                                    <span class="badge badge-success">Ya</span>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        <?php } ?>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-warning" href="<?php echo base_url() . 'Laundry/edit_laundry/' . $u->id_laundry ?>"><i class="ti-pencil"></i></a>
                                            <a class="btn btn-sm btn-danger" onclick="javascript: return confirm('Apakah Anda yakin ingin hapus data ini?')" href="<?php echo base_url() . 'Laundry/hapus_laundry/' . $u->id_laundry . '/' . $u->photo ?>"><i class="ti-trash"></i></a>
                                            <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'Laundry/daftar_layanan/' . $u->id_laundry ?>"><i class="ti-eye"></i></a>
                                            <?php if ($isLoggedIn === "Admin") { ?>
                                                <a class="btn btn-sm <?php if ($u->is_recommend == 0) {
                                                                            echo 'btn-primary';
                                                                        } else {
                                                                            echo 'btn-dark';
                                                                        } ?>" <?php if ($u->is_recommend == 0) {
                                                                                echo 'data-toggle="tooltip" data-placement="bottom" title="Set Rekomendasi"';
                                                                            } else {
                                                                                echo 'data-toggle="tooltip" data-placement="bottom" title="Batal Rekomendasi"';
                                                                            } ?> href="<?php echo base_url() . 'Laundry/laundry_set_recommend/' . $u->id_laundry ?>"><i class="ti-star"></i></a>
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