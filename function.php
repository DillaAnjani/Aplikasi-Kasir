<?php
session_start();

$koneksi = mysqli_connect('localhost','root','','kasir');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='password'")
    $hitung = mysqli_num_rows($check);

    if ($hitung > 0) {
        $_SESSION['login'] = true;
        header('location:index.php');
    } else {
        echo '
        <script>
        alert("username atau password salah")
        window.location.href="login.php"
        </script>';
    }
}
if(isset($_POST['tambahproduk'])){
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];

    $insert_produk = mysqli_query($koneksi,"INSERT INTO produk (nama_produk, deskripsi, harga, stock)
    VALUES ('$nama_produk', '$deskripsi', '$harga', '$stock')");

    if ($insert_produk) {
        header('location:stock.php');
    } else {
        echo '
        <script>
        alert("gagal tambah produk")
        window.location.href="stock.php"
        </script>';
    }
}