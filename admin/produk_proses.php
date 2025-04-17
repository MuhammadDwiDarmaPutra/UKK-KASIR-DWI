<?php
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data produk
$NamaProduk = $_POST['nm_produk'];
$Harga = $_POST['harga'];
$Stok = $_POST['stok'];

mysqli_query($koneksi, "INSERT INTO tb_produk VALUES ('', '$NamaProduk','$Harga','$Stok')");

header("location:produk_data.php");