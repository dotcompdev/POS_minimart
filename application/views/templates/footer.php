<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Dotcomp</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
    </div>
</footer>

</div>



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('assets'); ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets'); ?>/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets'); ?>/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets'); ?>/dist/js/pages/dashboard2.js"></script>

<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('assets'); ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/inputmask/jquery.inputmask.min.js"></script>

<!-- date-range-picker -->
<script src="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
/
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url('assets'); ?>/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?= base_url('assets'); ?>/plugins/dropzone/min/dropzone.min.js"></script>
<!-- bootstrap select -->
<script src="<?php echo base_url('assets/js/bootstrap.bundle.js'); ?>"></script>
<script src="<?= base_url('assets'); ?>/my-js/bootstrap-select.js"></script>

<!-- select barang pada menu promos -->
<script>
    $(document).ready(function() {
        $('.bootstrap-select').selectpicker();
    });
</script>

<!-- muncul nama file pada upload foto -->
<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
</script>
<script src="<?= base_url('assets/my-js/chart.js'); ?>"></script>

<script src="<?= base_url('assets/my-js/script.js'); ?>"></script>

<!-- modal pilih hari untuk promo -->
<script type='text/javascript'>
    $(document).ready(function() {
        $(document).on("click", "#pilihHari", function() {
            var hari = $('#selectHari').val();
            $("#hari").val(hari);
            $("#modalPilihHari").modal("hide");
        });
    });
</script>

<!-- update item promo -->
<script type='text/javascript'>
    $(document).ready(function() {
        $(document).on("click", "#updateItemPromo", function() {
            var idpromo = $(this).data("id");
            var kode = $(this).data("kode");
            var nama = $(this).data("nama");
            var harga = $(this).data("harga");
            var qty = $(this).data("qty");
            var diskon = $(this).data("diskon");
            $("#idPromo").val(idpromo);
            $("#kodeBrg").val(kode);
            $("#namaBrg").val(nama);
            $("#hargaJual").val(harga);
            $("#qty").val(qty);
            $("#diskon").val(diskon);
        });
    });
</script>

<!-- View Promo -->
<script type='text/javascript'>
    $(document).ready(function() {
        $(document).on("click", "#updateP", function() {
            var idpromo = $(this).data("id");
            var nama = $(this).data("nama");
            var tglMulai = $(this).data("mulai");
            var tglBerakhir = $(this).data("berakhir");
            var hari = $(this).data("hari");
            ambilDataPromo(idpromo);
            $("#idP").val(idpromo);
            $("#namaP").val(nama);
            $("#tglMulai").val(tglMulai);
            $("#tglAkhir").val(tglBerakhir);
            $("#hariP").val(hari);
        });
    });

    function ambilDataPromo(itemPromo) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url() . "supervisor/getItem/" ?>' + itemPromo,
            dataType: 'json',
            success: function(data) {
                var baris = '';
                var kol = data[0].length;
                for (var i = 0; i < kol; i++) {
                    baris += '<tr>'
                    for (var j = 0; j < data.length; j++) {
                        baris +=
                            '<td>' + data[j][i] + '</td>'

                    }
                    baris += '</tr>'
                }
                $('#containerItemPromo').html(baris);
            }
        });
    }
</script>

<!-- pilih barang melalui modal box -->
<script type='text/javascript'>
    $(document).ready(function() {
        $(document).on("click", "#editTam", function() {
            var kode_brg = $(this).data("kode");
            var nama_brg = $(this).data("nama");
            var harga = $(this).data("harga");
            var qty = $(this).data("qty");
            var diskon = $(this).data("diskon");
            $("#kodBrg").val(kode_brg);
            $("#namBrg").val(nama_brg);
            $("#harBrg").val(harga);
            $("#qtyBrg").val(qty);
            $("#disk").val(diskon);
        });
    });
</script>

<!-- pilih ID transaksi untuk menu returment -->
<script type='text/javascript'>
    $(document).ready(function() {
        $(document).on("click", "#pilihID", function() {
            var invoice = $(this).data("invoice");
            $("#id_transaksi").val(invoice);
            ambilData(invoice);
            $("#modalTransJual").modal("hide");
        });
    });

    function ambilData(invoice) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url() . "Kasir/getItem/" ?>' + invoice,
            dataType: 'json',
            success: function(data) {
                var baris = '';
                for (var i = 0; i < data.length; i++) {
                    baris += '<tr>' +
                        '<td>' + data[i].barang_id + '</td>' +
                        '<td>' + data[i].barang_nama + '</td>' +
                        '<td>' + data[i].qty_jual + '</td>' +
                        '<td><button id="pilihItem" class="btn btn-primary btn-sm" type="button" data-invoice="' + data[i].invoice + '" data-harga="' + data[i].harga_jual + '" data-id="' + data[i].barang_id + '" data-nama="' + data[i].barang_nama + '">Pilih</button></td>' +
                        '</tr>'
                }
                $('#containerItem').html(baris);
            }
        });
    }
</script>

<!-- pilih barang untuk menu retur -->
<script type='text/javascript'>
    $(document).ready(function() {
        $(document).on("click", "#pilihItem", function() {
            var nama_brg = $(this).data("nama");
            var id_brg = $(this).data("id");
            var invoice = $(this).data("invoice");
            var harga = $(this).data("harga");
            $("#nama_barang").val(nama_brg);
            $("#id_barang").val(id_brg);
            $("#id_transaksi").val(invoice);
            $("#harga_barang").val(harga);
            $("#modalTransItem").modal("hide");
        });
    });
</script>

<!-- menghitung total belanjaan pada menu pejualan -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#cash").keyup(function() {
            var total = $("#total").val();
            var uang = $("#cash").val();

            var total = parseInt(uang) - parseInt(total);
            $("#kembali").val(total);
        });
    });
</script>

<!-- menghapus item barang pada tabel tampung untuk penjualan -->
<script>
    //GET CONFIRM DELETE
    $('.delete-record').on('click', function() {
        var invoice_id = $(this).data('invoice');
        $('[name="delete_id"]').val(invoice_id);
    });
</script>

<!-- fungsi pilih tanggal pada menu promo -->
<script type="text/javascript">
    $(function() {
        $('#datetimepicker7').datetimepicker();
        $('#datetimepicker8').datetimepicker({
            useCurrent: false
        });
        $("#datetimepicker7").on("change.datetimepicker", function(e) {
            $('#datetimepicker8').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker8").on("change.datetimepicker", function(e) {
            $('#datetimepicker7').datetimepicker('maxDate', e.date);
        });
    });
</script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
</body>

</html>