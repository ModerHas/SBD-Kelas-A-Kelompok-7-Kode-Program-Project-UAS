
<?php

include 'config.php';
session_start();
include("auth.php");

$view = $dbconnect -> query("SELECT * FROM role");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Role</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">

    <?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

        <div class="alert alert-success" role="alert">
            <?=$_SESSION['success'] ?>
        </div>
        
        
        <?php 
        }
        $_SESSION['success'] = '';  
        ?>
        
        <h1>Daftar Role User</h1>
        <p><a href="role_add.php" class="btn btn-primary">Tambah Data </a></p>
        
        <table class="table table-bordered">
            <tr>
                <th>ID Role</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php
            
            while ($row = $view->fetch_array()) { ?>

            <tr>
                <td> <?= $row['id_role'] ?> </td>
                <td> <?= $row['role'] ?> </td>
                <td>
                    <a href="role_edit.php?id=<?=$row['id_role']?>">Edit</a> | 
                    <a href="role_hapus.php?id=<?=$row['id_role']?>" onclick="return confirm('apakah anda yakin ?')">Hapus</a>
                </td>
            </tr>
            
            <?php }
            ?>
            
        </table>
    </div>
</body>
</html>
        


    