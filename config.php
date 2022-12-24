<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_db = "logreg_pesbuk";

try {
    //create PDO connection
    $db = new PDO("mysql:host=$server;$nama_db", $user, $password);
} catch(PDOException $e) {
    //Muncul Error
    die("Terjadi masalah: " . $e->getMessage());
}
?>