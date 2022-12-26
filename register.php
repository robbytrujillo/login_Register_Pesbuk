<?php
require_once("config.php");

if(isset($_POST['register'])) {

    //filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(":name" => $name, ":username" => $username, ":password" => $password, ":email" => $email);
 
    // eksekusi query untuk menimpan ke databse
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pesbuk</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    </head>
<body>
    <body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <p>$larr; <a href="index.php">Home</a>

            <h4>Bergabunglah bersama ribuan orang lain...</h4>
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input class="form-control" type="text" name="name" placeholder="Nama kamu" />
            </div>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Usernama" />
            </div>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Email" />
            </div>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Password</label>
                    <input class="form-control" type="text" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
            </form>
            </div class="col-md-6"><img class="img img-responsive" src="img/connect.png" />
            </div>
            </div>
            </div>
</body> 
</html>