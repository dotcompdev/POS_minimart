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

<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
</script>
<script src="<?= base_url('assets/my-js/chart.js'); ?>"></script>

<script src="<?= base_url('assets/my-js/script.js'); ?>"></script>


<script type='text/javascript'>
    $(document).ready(function() {
        $(document).on("click", "#pilih", function() {
            var kode_brg = $(this).data("kode");
            var nama_brg = $(this).data("nama");
            var kategori = $(this).data("kategori");
            var satuan = $(this).data("satuan");
            var harga = $(this).data("harga");
            var qty = $(this).data("qty");
            $("#kode_barang").val(kode_brg);
            $("#nama_barang").val(nama_brg);
            $("#kategori").val(kategori);
            $("#satuan").val(satuan);
            $("#harga_jual").val(harga);
            $("#qtyA").val(qty);
            $("#modalBarang").modal("hide");
        });
    });
</script>

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
                        '<td>' + data[i].qty_jual + '</td>' +
                        '<td>' + data[i].barang_id + '</td>' +
                        '<td><button id="pilihItem" class="btn btn-primary btn-sm" type="button data-invoice="' + data[i].barang_id + '">Pilih</button></td>' +
                        '</tr>'
                }
                $('#containerItem').html(baris);
            }
        });
    }
</script>

<script type='text/javascript'>
    $(document).ready(function() {
        $(document).on("click", "#pilihItem", function() {
            var invoice = $(this).data("invoice");
            $("#id_transaksi").val(invoice);
            $("#modalTransJual").modal("hide");
        });
    });
</script>

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

<script>
    //GET CONFIRM DELETE
    $('.delete-record').on('click', function() {
        var invoice_id = $(this).data('invoice');
        $('[name="delete_id"]').val(invoice_id);
    });
</script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
</body>

</html>