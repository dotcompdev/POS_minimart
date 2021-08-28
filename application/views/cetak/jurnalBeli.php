<?php

require_once FCPATH . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();


$html = '<!DOCTYPE html>
<html lang="en">
<head>
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
                        <table class="table table-head-fixed text-nowrap" table-bordered>
                            <thead>
                                <tr>
                                    <th style="text-align: left;" width="400px">Barang</th>
                                    <th style="text-align: center;" width="100px">QTY</th>
                                    <th style="text-align: right;" width="100px">Harga Jual</th>
                                    <th style="text-align: center;" width="150px">Diskon</th>
                                    <th style="text-align: right;" width="100px">Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                <tr>    
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                <tr>
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                <tr>    
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                <tr>
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                <tr>
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                <tr>
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                
                            </tbody>
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

?>

