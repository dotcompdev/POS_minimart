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
<body>';

$html .= '
<div class="col-12 mt-3">
<div style="text-align: center">
<h4>Minimart</h4>
<h5>Jl. Sayap Kemerdekaan No. 17</h5>
</div>
<hr />';

foreach ($struk as $st) :
    
$html .= '
<div class="row">
<div class="col-6">
<label>' . $st["tgl_transaksi"] . '</label>
<br />
<label>' . $st["id_trans_jual"] . '</label>
</div>
<div class="col-6">
<label>' . $st["user_id"] . '</label>
</div>
</div>
<hr />
';
endforeach;
$html .= '

    <table class="table table-sm" rules="all">
        <thead>
            <tr>
                <th scope="col">Barang</th>
                <th scope="col">QTY</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>

        ';
        foreach ($belanja as $bel) :
        $html .= '
            <tr>
                <td>' .$bel["barang"]  . '</td>
                <td>' . $bel["qty"] . '</td>
                <td>' . indo_currency($bel["harga_jual"]) . '</td>
            </tr>
        ';
        $html .= '   
            
        </tbody>
    </table>

    <hr />

    ';
    $html .= '
    <div class="row d-flex justify-content-end">
        <table class="col-8">
            <thead>
                <tr class="border-bottom-1">
                    <th>Total</th>
                    <th>:</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Diskon</td>
                    <td>:</td>
                    <td style="text-align: right;">Jumlah diskon</td>
                </tr>
                <tr>
                    <td>Bayar</td>
                    <td>:</td>
                    <td style="text-align: right;">Jumlah Bayar</td>
                </tr>
                <tr>
                    <td>Kembali</td>
                    <td>:</td>
                    <td style="text-align: right;">Uang Kembali</td>
                </tr>';
                $html .= '
            </tbody>
        </table>
    </div>

    <div class="row d-flex justify-content-center mt-4">
        <h4>------Terima kasih------</h4>
        <h5>telah belanja di Minimart</h5>
    </div>
</div>

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
</html>
';
$html.='
';

$mpdf->WriteHTML($html);
$mpdf->Output('struk-penjualan.pdf', \Mpdf\Output\Destination::INLINE);

?>

