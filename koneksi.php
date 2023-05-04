<?php
$servername = "localhost"; // nama server
$username = "root"; // nama pengguna
$password = ""; // password
$dbname = "dbsekolah"; // nama database

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>

