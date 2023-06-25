
<?php

include 'config.php';
session_start();
include("auth.php");

$view = $dbconnect -> query("SELECT * FROM member");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Member</title>
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
        
        <h1>Daftar Member</h1>
        <p><a href="member_add.php" class="btn btn-primary">Tambah Member </a></p>
        
        <table class="table table-bordered">
            <tr>
                <th>ID Member</th>
                <th>nama</th>
                <th>Aksi</th>
            </tr>
            <?php
            
            while ($row = $view->fetch_array()) { ?>

            <tr>
                <td> <?= $row['id_member'] ?> </td>
                <td> <?= $row['nama'] ?> </td>
                <td>
                    <a href="member_edit.php?id=<?=$row['id_member']?>">Edit</a> | 
                    <a href="member_hapus.php?id=<?=$row['id_member']?>" onclick="return confirm('apakah anda yakin ?')">Hapus</a>
                </td>
            </tr>
            
            <?php }
            ?>
            
        </table>
    </div>
</body>
</html>
        


    