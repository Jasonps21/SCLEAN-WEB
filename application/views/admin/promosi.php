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
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#promosiModal" href="#" target="_blank">Tambah Promosi</button>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="data-tables">
                        <table id="table1" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($daftarPromosi as $u) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td class="text-center"><img src="<?php echo base_url() . "assets/images/promosi/" . $u->photo ?>" width="200px"></td>
                                        <td class="text-center"><?php echo $u->keterangan ?></td>
                                        <td class="text-center"><?php echo $u->tgl_awal ?></td>
                                        <td class="text-center"><?php echo $u->tgl_akhir ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target=#editPromosiModal onClick="editPromosi('<?php echo $u->id ?>', '<?php echo $u->photo ?>', '<?php echo $u->keterangan ?>','<?php echo $u->tgl_awal ?>', '<?php echo $u->tgl_akhir ?>')" href="#"><i class="ti-pencil"></i></a>
                                            <a class="btn btn-sm btn-danger" onclick="javascript: return confirm('Apakah Anda yakin ingin hapus data ini?')" href="<?php echo base_url() . 'Promosi/hapus_promosi/' . $u->id . '/' . $u->photo ?>"><i class="ti-trash"></i></a>
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

<!--Modal Tambah Admin-->
<div class="modal fade" id="promosiModal" tabindex="-1" role="dialog" aria-labelledby="promosiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!--modal Header-->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Promosi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--modal Body-->
            <div class="modal-body">

                <form action="<?php echo base_url(); ?>Promosi/tambah_promosi" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="text-black" for="nama">Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="nama">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="nama">Tanggal Awal</label>
                        <input type="date" name="tgl_awal" class="form-control" required value="<?php print(date("Y-m-d")); ?>" />
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="nama">Tanggal Akhir</label>
                        <input type="date" name="tgl_akhir" class="form-control" required value="<?php print(date("Y-m-d")); ?>" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<!--End Modal Tambah ADmin-->

<!--Modal edit Admin-->
<div class="modal fade" id="editPromosiModal" tabindex="-1" role="dialog" aria-labelledby="editPromosiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!--modal Header-->
            <div class="modal-header">
                <h4 class="modal-title">Edit Promosi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--modal Body-->
            <div class="modal-body">

                <form action="<?php echo base_url(); ?>Promosi/edit_promosi" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="text-black" for="nama">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                        <input type="text" id="gambar_temp" name="gambar_temp" class="form-control" hidden>
                        <input type="text" id="id_promosi" name="id_promosi" class="form-control" hidden>
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="nama">Keterangan</label>
                        <input type="text" id="keterangan" name="keterangan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="nama">Tanggal Awal</label>
                        <input type="date" id="tgl_awal" name="tgl_awal" class="form-control" required value="<?php print(date("Y-m-d")); ?>" />
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="nama">Tanggal Akhir</label>
                        <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control" required value="<?php print(date("Y-m-d")); ?>" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<!--End Modal edit ADmin-->