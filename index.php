<?php

session_start();
include("auth.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kasir test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<div class = "container">
    <h1>Selamat Datang</h1>
    <a href="barang.php">Item</a> |
    <a href="role.php">Role</a> |
    <a href="user.php">User</a> |
    <a href="member.php">Member</a> |
    <a href="logout.php">Logout</a>
</div>
</body>
</html>