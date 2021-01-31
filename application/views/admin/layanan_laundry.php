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
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#LayananModal" href="#" target="_blank">Tambah Layanan</button>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="data-tables">
                        <table id="table1" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Layanan</th>
                                    <th>Estimasi</th>
                                    <th>Harga</th>
                                    <th>Satuan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($daftarLayanan as $u) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td class="text-center"><?php echo $u->nama_layanan ?></td>
                                        <td class="text-center"><?php echo $u->estimasi ?></td>
                                        <td class="text-center"><?php echo $u->harga ?></td>
                                        <td class="text-center"><?php echo $u->satuan ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target=#editLayanan onClick="editLayanan('<?php echo $u->id ?>','<?php echo $u->nama_layanan ?>', '<?php echo $u->estimasi ?>', '<?php echo $u->harga ?>', '<?php echo $u->satuan ?>')" href="#"><i class="ti-pencil"></i></a>
                                            <a class="btn btn-sm btn-danger" onclick="javascript: return confirm('Apakah Anda yakin ingin hapus data ini?')" href="<?php echo base_url() . 'Laundry/hapus_layanan/' . $u->id . '/' . $u->id_laundry ?>"><i class="ti-trash"></i></a>
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

<!--Modal Tambah Kategori-->
<div class="modal fade" id="LayananModal" tabindex="-1" role="dialog" aria-labelledby="LayananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!--modal Header-->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--modal Body-->
            <div class="modal-body">

                <form action="<?php echo base_url(); ?>Laundry/tambah_layanan" method="post">

                    <div class="form-group">
                        <label class="text-black" for="nama_layanan">Nama Layanan</label>
                        <input type="text" name="nama_layanan" class="form-control" required>
                        <input type="text" name="id_laundry" class="form-control" required value="<?php echo $this->uri->segment(3) ?>" hidden>
                    </div>

                    <label class="text-black" for="estimasi">Estimasi</label>
                    <div class="input-group mb-3">
                        <input type="text" name="estimasi" class="form-control" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Hari</span>
                        </div>
                    </div>

                    <label class="text-black" for="harga">Harga</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Rp.</span>
                        </div>
                        <input type="number" name="harga" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="satuan">Satuan</label>
                        <input type="text" name="satuan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>


</div>
<!--End Modal Tambah Kategori-->

<!--Modal Edit Kategori-->
<div class="modal fade" id="editLayanan" tabindex="-1" role="dialog" aria-labelledby="editLayananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!--modal Header-->
            <div class="modal-header">
                <h4 class="modal-title">Edit Layanan Laundry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--modal Body-->
            <div class="modal-body">

                <form action="<?php echo base_url(); ?>Laundry/edit_layanan" method="post">
                    <div class="form-group">
                        <label class="text-black" for="nama_layanan">Nama Layanan</label>
                        <input type="text" id="nama_layanane" name="nama_layanan" class="form-control" required>
                        <input type="text" id="id_layanane" name="id_layanan" class="form-control" required" hidden>
                        <input type="text" name="id_laundry" class="form-control" required value="<?php echo $this->uri->segment(3) ?>" hidden>
                    </div>

                    <label class="text-black" for="estimasi">Estimasi</label>
                    <div class="input-group mb-3">
                        <input type="text" id="estimasie" name="estimasi" class="form-control" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Hari</span>
                        </div>
                    </div>

                    <label class="text-black" for="harga">Harga</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Rp.</span>
                        </div>
                        <input type="text" id="hargae" name="harga" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="satuan">Satuan</label>
                        <input type="text" id="satuane" name="satuan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>


</div>
<!--End Modal Tambah Kategori-->