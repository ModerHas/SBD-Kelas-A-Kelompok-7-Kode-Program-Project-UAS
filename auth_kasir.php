<?php

if(isset($_SESSION['userid']))
{
    if($_SESSION['id_role']==1){
        header("location:index.php");
    }
}
else {
    header("location:login.php");
    $_SESSION['error'] = 'Anda harus login terlebih dahulu';
}



?>