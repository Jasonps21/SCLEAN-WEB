</div>
<!-- main content area end -->
<!-- footer area start-->
<footer>
    <div class="footer-area">
        <p>© Copyright
            <script>document.write(new Date().getFullYear());</script>
            . All right reserved.
        </p>
    </div>
</footer>
<!-- footer area end-->
</div>
<!-- page container area end -->

<!-- jquery latest version -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slicknav.min.js"></script>

<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- all line chart activation -->
<script src="<?php echo base_url(); ?>assets/js/line-chart.js"></script>
<!-- all bar chart activation -->
<script src="<?php echo base_url(); ?>assets/js/bar-chart.js"></script>
<!-- all pie chart -->
<script src="<?php echo base_url(); ?>assets/js/pie-chart.js"></script>
<!-- others plugins -->
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });

    var tgl_awal = $('#startDate').val();
    var tgl_akhir = $('#endDate').val();

    var table2 = $('#tabel_laporan_transaksi').DataTable({
        dom: 'Bfrtip',
        lengthChange: false,
        buttons: [
            'copy',
            'excel',
            {
                extend: 'pdf',
                text: 'PDF',
                title: 'Laporan Transaksi \n Tanggal ' + tgl_awal + ' - ' + tgl_akhir,
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
            }
        ]
    });

    function handleChange(input) {
        if (input.value < 0) input.value = 0;
        if (input.value > 10000) input.value = 10000;
    }

    function editLayanan(id, nama, estimasi, harga, satuan) {
        document.getElementById('id_layanane').value = id;
        document.getElementById('nama_layanane').value = nama;
        document.getElementById('estimasie').value = estimasi;
        document.getElementById('hargae').value = harga;
        document.getElementById('satuane').value = satuan;
    }

    function editadmin(id, nama, email) {
        document.getElementById('id').value = id;
        document.getElementById('nama').value = nama;
        document.getElementById('email').value = email;
    }

    function editPromosi(id, photo, keterangan, tgl_awal, tgl_akhir) {
        document.getElementById('id_promosi').value = id;
        document.getElementById('gambar_temp').value = photo;
        document.getElementById('keterangan').value = keterangan;
        document.getElementById('tgl_awal').value = tgl_awal;
        document.getElementById('tgl_akhir').value = tgl_akhir;
    }

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('#startDate').datepicker({
        uiLibrary: 'bootstrap4',
        todayBtn: true,
        format: 'yyyy/mm/dd'
    });
    $('#endDate').datepicker({
        uiLibrary: 'bootstrap4',
        todayBtn: true,
        format: 'yyyy/mm/dd'
    });
</script>
</body>

</html>
