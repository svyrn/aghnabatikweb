<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$produk = query('SELECT * FROM produk');

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Produk</title>

    <link href="css/print.css" rel="stylesheet">
  </head>
  <body>
    <h2>Daftar Produk</h2>
    <table>
      <tr>
        <th>No.</th>
        <th>Preview</th>
        <th>Motif</th>
        <th>Jenis Kain</th>
        <th>Jenis Batik</th>
        <th>Size</th>
        <th>Stok</th>
      </tr>';

$i = 1;
foreach($produk as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td class="preview"><img src="img/produk/'.$row["gambar"].'" width="100" height="100" /></td>
                <td>' . $row['motif'] . '</td>
                <td>' . $row['jeniskain'] . '</td>
                <td>' . $row['jenisbatik'] . '</td>
                <td>' . $row['size'] . '</td>
                <td>' . $row['stok'] . '</td>
              </tr>';
}

$html .= '</table>
  </body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-produk.pdf', \Mpdf\Output\Destination::INLINE);
