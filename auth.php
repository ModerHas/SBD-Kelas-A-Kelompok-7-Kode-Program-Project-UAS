<?php

if(isset($_SESSION['userid']))
{
    if($_SESSION['id_role']==2){
        header("location:kasir.php");
    }
}
else {
    header("location:login.php");
    $_SESSION['error'] = 'Anda harus login terlebih dahulu';
}

?>