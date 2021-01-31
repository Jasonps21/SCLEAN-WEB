<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo base_url();?>">Beranda</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Detail Profil</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Detail Profil</h2>
            </div>
            <div class="col-md-12">

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

                <form action="<?php echo base_url(); ?>User/update_user" method="post">

                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="nama" class="text-black">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $detailuser['nama'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="username" class="text-black">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $detailuser['username'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $detailuser['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="nomor_hp" class="text-black">Nomor Hp <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?php echo $detailuser['nomor_hp'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_message" class="text-black">Nama Toko <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Nama toko/perusahaan (optional)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_message" class="text-black">Alamat <span class="text-danger">*</span></label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $detailuser['alamat'] ?>" required>
                            </div>
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
                                <input type="text" class="form-control" id="keluarahan" name="kelurahan" value="<?php echo $detailuser['kelurahan'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="kode_pos" class="text-black">Kode Pos <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?php echo $detailuser['kode_pos'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Simpan">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>