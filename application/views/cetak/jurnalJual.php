<?php

require_once FCPATH . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Jurnal Pembelian</title>

    <style>
        table, th, td {
            border : 1px solid black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>


                    <h1 class="m-0">Jurnal Penjualan</h1>
             

    

                        <table border="1" cellpadding="10" cellspacing="0">

                            <thead>
                            <tr>
                            <th width="200px">Waktu</th>
                            <th width="200px">User</th>
                            <th width="100px">Invoice</th>
                            <th style="text-align: center;" width="100px">Total</th>
                            <th width="150px">Cash</th>
                            </tr>
                            </thead>

                            <tbody>';
                            foreach ($penjualan as $jual) :
                                $html .= ' <tr>
                                <td align="center">' . date("d F Y", $jual["waktu_trans"]) . '</td>
                                <td align="center>' . $jual["user"] . '</td>
                                <td align="center">' . $jual["invoice"] . '</td>
                                <td align="right">' . $jual["total_bayar"] . '</td>
                                <td align="right">' . indo_currency($jual["cash"]) . '</td>
                                </tr>';
                            endforeach;
                            $html .= '    </tbody>
                        </table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('jurnal-penjualan.pdf', \Mpdf\Output\Destination::INLINE);

