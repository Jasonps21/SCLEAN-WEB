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
                    <form action="<?php echo base_url(); ?>Laundry/aksi_edit_laundry" method="post" enctype="multipart/form-data">

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="text-black" for="nama_laundry">Nama Laundry</label>
                                <input type="text" name="id_laundry" class="form-control" value="<?php echo $detailLaundry['id_laundry']?>" hidden required>
                                <input type="text" name="nama_laundry" class="form-control" value="<?php echo $detailLaundry['nama_laundry']?>" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="text-black" for="nomor_telepon">Nomor Telepon</label>
                                <input type="number" name="nomor_telepon" class="form-control" value="<?php echo $detailLaundry['nomor_telepon']?>" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="text-black" for="jam_buka">Jam Buka</label>
                                <input type="time" name="jam_buka" class="form-control" value="<?php echo $detailLaundry['jam_buka']?>" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="text-black" for="jam_tutup">Jam Tutup</label>
                                <input type="time" name="jam_tutup" class="form-control" value="<?php echo $detailLaundry['jam_tutup']?>" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="text-black" for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="<?php echo $detailLaundry['alamat']?>" required>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label class="text-black" for="biaya_pengantaran">biaya_pengantaran</label>
                                <input type="number" name="biaya_pengantaran" class="form-control" value="<?php echo $detailLaundry['biaya_pengantaran']?>" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="text-black" for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="5" id="deskripsi"><?php echo $detailLaundry['deskripsi']?></textarea>
                                <input type="text" name="gambar" class="form-control" value="<?php echo $detailLaundry['photo']?>" hidden>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="text-black" for="gambar">Gambar</label>                                

                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                        <img class="form-control" id="uploadPreview" src="<?php echo base_url()?>assets/images/produk/<?php echo $detailLaundry['photo']?>" style="width: 200px; height: 200px;"/><br>
                                    </div>
                                    <div class="col-auto">
                                        <input type="file" id="uploadImage" name="myPhoto" onchange="PreviewImage();"
                                               class="form-control-file" accept="image/*" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row float-right">
                            <div class="form-group float-right p-1">
                                <a href="<?php echo base_url()?>Laundry" class="btn btn-warning btn-lg btn-block">Batal</a>
                            </div>
                            <div class="form-group float-right p-1">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>