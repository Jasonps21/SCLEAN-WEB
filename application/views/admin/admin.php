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
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                data-target="#adminModal" href="#" target="_blank">Tambah Admin</button>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="data-tables">
                        <table id="table1" class="text-center">
                            <thead class="bg-light text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Terakhir Login</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($daftarAdmin as $u) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++ ?></td>
                                    <td class="text-center"><?php echo $u->nama ?></td>
                                    <td class="text-center"><?php echo $u->email ?></td>
                                    <td class="text-center"><?php echo $u->last_login ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-warning"
                                           data-toggle="modal" data-target=#editAdminModal onClick="editadmin('<?php echo $u->id?>','<?php echo $u->nama?>','<?php echo $u->email?>')"
                                           href="#"><i class="ti-pencil"></i></a>
                                        <a class="btn btn-sm btn-danger"
                                           onclick="javascript: return confirm('Apakah Anda yakin ingin hapus data ini?')"
                                           href="<?php echo base_url() . 'Admin/hapus_admin/' . $u->id ?>"><i
                                                    class="ti-trash"></i></a>
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
<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!--modal Header-->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--modal Body-->
            <div class="modal-body">

                <form action="<?php echo base_url(); ?>Admin/tambah_admin" method="post">

                    <div class="form-group">
                        <label class="text-black" for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="nama">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="nama">Password</label>
                        <input type="password" name="password" class="form-control" required>
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
<div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="editadminModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <!--modal Header-->
            <div class="modal-header">
                <h4 class="modal-title">Edit Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--modal Body-->
            <div class="modal-body">

                <form action="<?php echo base_url(); ?>Admin/edit_admin" method="post">

                    <div class="form-group">
                        <label class="text-black" for="nama">Nama</label>
                        <input type="text" id="id" name="id" class="form-control" required hidden>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="nama">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="nama">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
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