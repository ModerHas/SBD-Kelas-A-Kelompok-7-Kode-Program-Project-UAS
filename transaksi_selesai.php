<?php

include "config.php";
session_start();
include "auth_kasir.php";
// print_r($_SESSION);

// $_SESSION ['id_role'] = $_SESSION['role_id'];

$id_trx = $_GET['id_trx'];

$data = mysqli_query($dbconnect, "SELECT * FROM transaksi WHERE id_transaksi = '$id_trx'");

$trx = mysqli_fetch_assoc($data);

$detail = mysqli_query($dbconnect, "SELECT transaksi_detail.*, item.nama, item.harga FROM transaksi_detail INNER JOIN item ON transaksi_detail.id_item = item.id_item WHERE transaksi_detail.id_transaksi = '$id_trx'");

$member = mysqli_query($dbconnect, "SELECT transaksi.*, member.nama FROM transaksi INNER JOIN member ON transaksi.id_member = member.id_member WHERE transaksi.id_transaksi = '$id_trx'");

$mbr = mysqli_fetch_assoc($member);

?>




<!DOCTYPE html>
<html>
<head>
    <title>Struk Pembayaran</title>
    <style type="text/css">
        body{
            color: #a7a7a7;
        }
    </style>
</head>
<body>
    <div align="center">
        <table width="400" border="0" cellpadding="1" cellspacing="0">
            <tr>
                <th>PANJI MART <br>
                Jl. Durian Tarung No.1, Ps. Ambacang, Kec. Kuranji <br>
                Kota Padang, Sumatera Barat 25175</th>            
            </tr>
            <tr align="center"><td><hr></td></tr>
        </table>
        <table width="400" border="0" cellpadding="3" cellspacing="0">
            <tr>
                <td align="left">Tgl: <?=date('d-m-Y H:i:s',strtotime($trx['tgl_waktu']))?> <br>
                Kasir : <?=$_SESSION['nama']?></td>
                <td align="right">#<?=$trx['id_transaksi']?></td>
            </tr>
            <td colspan="4"><hr></td>
        </table>
        <table width="400" border="0" cellpadding="3" cellspacing="0">
            <?php while($row = mysqli_fetch_array($detail)){ ?>
            <tr>
                <td><?=$row['nama']?></td>
                <td><?=$row['qty']?></td>
                <td align="right"><?=number_format($row['harga'])?></td>
                <td align="right"><?=number_format($row['total'])?></td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="4"><hr></td>
            </tr>
            <tr>
                <td align="right" colspan="3">Total</td>
                <td align="right"><?=number_format($trx['total'])?></td>
            </tr>
            <tr>
                <td align="right" colspan="3">Bayar</td>
                <td align="right"><?=number_format($trx['bayar'])?></td>
            </tr>
            <tr>
                <td align="right" colspan="3">Kembali</td>
                <td align="right"><?=number_format($trx['kembali'])?></td>
            </tr>
            <tr>
                <td colspan="4"><hr></td>
            </tr>
        </table>
        <table width="400" border="0" cellpadding="3" cellspacing="0">
            <tr>
                <td>Member : <?=$mbr['nama']?> </td>
            </tr>
            <tr>
                <td colspan="4"><hr></td>
            </tr>           
        </table>
        <table width="400" border="0" cellpadding="3" cellspacing="0">
        <tr>
                <th>Terima Kasih<br>
                Telah Berbelanja di PANJI MART</th>            
            </tr>
        </table>

    </div>
</body>
</html>