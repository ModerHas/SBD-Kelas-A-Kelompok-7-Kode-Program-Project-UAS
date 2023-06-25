
<?php

include 'config.php';
session_start();
include("auth.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM member where id_member='$id'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];


    mysqli_query($dbconnect, "UPDATE member SET nama='$nama' where id_member='$id' ");

    $_SESSION['success'] = 'Berhasil merubah data';

    header("location:member.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Member</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Perbarui Member</h1>
        <form method="post">
            <div class="form-group">
                <label>Member</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Member" value="<?=$data['nama']?>">
            </div>

            <input type="submit" name="update" value="Perbarui" class="btn btn-primary">
            <a href="member.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>





