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
                        <table id="table1" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="10%">No Nota</th>
                                    <th>Nama Pemesan</th>
                                    <th>Lokasi Laundry</th>
                                    <th width="10%">Tanggal Pesan</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th width="12%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>