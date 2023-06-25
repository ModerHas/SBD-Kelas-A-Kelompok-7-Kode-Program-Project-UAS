
<?php

include 'config.php';
session_start();
print_r($_SESSION);

if (isset($_POST['masuk'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($dbconnect, "SELECT * FROM users WHERE username = '$username' and password = '$password'");

    $data = mysqli_fetch_assoc($query);

    $check = mysqli_num_rows($query);

    if (!$check) {
        $_SESSION['error'] = 'Username & password salah';
    }
    else {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['id_role'] = $data['id_role'];

        header("location:index.php");
        
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['error']) && $_SESSION['error']!='') {?>

            <div class="alert alert-danger" role="alert">
                <?=$_SESSION['error']?>
            </div>

        <?php
        }

        $_SESSION['error']='';
        ?>
        
        <h1>login</h1>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Username</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <input type="submit" name="masuk" value="Masuk" class="btn btn-default">
        </form>
    </div>
</body>
</html>
    





        



