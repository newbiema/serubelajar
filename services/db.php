<?php


$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'belajarseru';

$conn = new mysqli($hostname, $username, $password, $db);

if ($conn->connect_error) {
    die("Koneksi Gagal: ". $conn->connect_error);
}


?>
