
<?php

include 'config.php';
session_start();
include("auth.php");

$role = mysqli_query ($dbconnect, "SELECT * FROM role");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($dbconnect, "SELECT * FROM users where id_user='$id'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    
    $id_role = $_POST['id_role'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($dbconnect, "UPDATE users SET id_role='$id_role', nama='$nama', username='$username', password='$password' WHERE id_user='$id'");
    
    $_SESSION['success'] = 'Berhasil merubah data';

    header("location:user.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Perbarui User</h1>
        <form method="post">
        <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama user" value="<?=$data['nama']?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$data['username']?>">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="text" name="password" class="form-control" placeholder="Password" value="<?=$data['password']?>">
            </div>
            <div class="form-group">
                <label>Role Akses</label>
                <select class="form-control" name="id_role">
                    <option value="">Pilih Role Akses</option>
            <?php while($row = mysqli_fetch_array($role)) {?>
                <option value="<?=$row['id_role']?>"<?=$row['id_role']==$data['id_role']?'selected':''?> ><?=$row['role']?></option>
            <?php } ?>
                </select>
            </div>
            <input type="submit" name="update" value="Perbarui" class="btn btn-primary">
            <a href="user.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>





