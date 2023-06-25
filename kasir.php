<?php

include "config.php";
session_start();
include("auth_kasir.php");
// print_r($_SESSION);

$item = mysqli_query($dbconnect, "SELECT * FROM item");
$member = mysqli_query($dbconnect, "SELECT * FROM member");

$sum = 0;
if(isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $sum += $value['harga'] * $value['qty'];
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Kasir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column-md-12">
                <h1>Kasir</h1>
                <h3>Hai, <?=$_SESSION['nama']?></h3>
                <a href="logout.php">Logout</a> |
                <a href="keranjang_reset.php">Reset Keranjang</a>
                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8">
                <form method="post" action="keranjang_act.php" class="form-inline">
                    <div class="input-group">
                        <select class="form-control" name="id_item">
                            <option value="">Pilih barang</option>
                            <?php while ($row=mysqli_fetch_array($item)) { ?>
                                <option value="<?=$row['id_item']?>"><?=$row['nama']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-group">
                        <input type="number" name="qty" class="form-control" placeholder="Jumlah">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </span>
                    </div>
                </form>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Sub Total</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach($_SESSION['cart'] as $key => $value) { ?>
                        <tr>
                            <td><?=$value['nama']?></td>
                            <td align="right"><?=number_format($value['harga'])?></td>
                            <td class="col-md-2"><input type="number" name="qty[]" value="<?=$value['qty']?>" class="form-control"></td>
                            <td align="right"><?=number_format($value['qty']*$value['harga'])?></td>
                            <td align="middle"><a href="keranjang_hapus.php?id=<?=$value['id']?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>

                    <?php } ?>

                </table>
                <button type="submit" class="btn btn-success">Perbarui</button>
            </div>
            <div class="col-md-4">
                <h3>Total Rp. <?=number_format($sum)?></h3>
                <br>
                <form action="transaksi_act.php" method="post">
                    <input type="hidden" name="total" value="<?=$sum?>">
                    <div class="form-group">
                        <p><label>Bayar</label></p>
                        <input type="text" id="bayar" name="bayar" class="form-control">
                        <br>
                        <p><label>Member</label></p>
                        <select class="form-control" name="id_member">
                            <option value="">Member</option>
                        <?php while($row = mysqli_fetch_array($member)) {?>
                            <option value="<?=$row['id_member']?>"><?=$row['nama']?></option>
                        <?php } ?>
                </select>
                        <br>
                        <p><label>ID</label></p>
                        <input type="text" name="id_transaksi" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        var bayar = document.getElementById('bayar');

        bayar.addEventListener('keyup', function(e) {
            bayar.value = formatRupiah(this.value, 'Rp. '); 
            
        });

        function formatRupiah (angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah ;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function cleanrupiah(rupiah) {
            var clean = rupiah.replace(/\D/g, '');
            return clean;
        }

    </script>


</body>
</html>
