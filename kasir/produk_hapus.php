<?php
include "../config/koneksi.php";

//Menangkap PelangganID Dari URL
$ProdukID = $_GET['ProdukID'];

//Query untuk menghapus data
mysqli_query($koneksi,"DELETE from tb_produk where ProdukID = '$ProdukID'");

header("location:produk_data.php");