<?php

require_once FCPATH . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();


$html = '<!DOCTYPE html>
<html lang="en">
<head>
<style>
table, td, th {
  border: 1px solid black;
}
table {
    width: 100%;
    border-collapse: collapse;
  }
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Struk</title>
</head>
<body>

<div class="wrapper">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jurnal Pembelian</h1>
                </div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-body">
            <!-- TABEL -->
            <div class="row">
                <div class="col-lg">
                    <div class="card-body table-responsive p-0" style="height: 300px;">

                        <table class="table table-border table-head-fixed text-nowrap">

                            <thead>
                                <tr>
                                <th width="200px">Supplier</th>
                                <th width="200px">Nama Barang</th>
                                <th width="100px">Harga Beli</th>
                                <th style="text-align: center;" width="100px">QTY</th>
                                <th width="150px">Tanggal</th>
                                </tr>
                            </thead>

                            <tbody>';

                            foreach ($pembelian as $beli) :
                                $html .= ' <tr>
                                    <td align="center">' . $beli["supplier_nama"] . '</td>
                                    <td align="center">' . $beli["brg_nama"] . '</td>
                                    <td align="right">' . indo_currency($beli["harga_beli"]) . '</td>
                                    <td align="center">' . $beli["qty_beli"] . '</td>
                                    <td align="center">' . date("d F Y", $beli["tgl_beli"]) . '</td>
                                </tr>';
                            endforeach;


                            $html .= ' </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END TABEL -->
        </div>    
    </div>
    <!-- END CARD -->
</div>
<!-- End Content Wrapper -->

   

<script
	src="https://code.jquery.com/jquery-3.3.1.slim.min.js"		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"
></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
	integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
	crossorigin="anonymous"
></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
	integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
	crossorigin="anonymous"
></script>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('jurnal-pembelian.pdf', \Mpdf\Output\Destination::INLINE);
