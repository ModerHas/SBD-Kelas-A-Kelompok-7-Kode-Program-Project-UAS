
<?php

include 'config.php';
session_start();
include("auth.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM role where id_role='$id'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $role = $_POST['role'];


    mysqli_query($dbconnect, "UPDATE role SET role='$role' where id_role='$id' ");

    $_SESSION['success'] = 'Berhasil merubah data';

    header("location:role.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Role</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Perbarui Role</h1>
        <form method="post">
            <div class="form-group">
                <label>Role</label>
                <input type="text" name="role" class="form-control" placeholder="Nama Role" value="<?=$data['role']?>">
            </div>

            <input type="submit" name="update" value="Perbarui" class="btn btn-primary">
            <a href="role.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>





