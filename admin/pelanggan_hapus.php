<?php
include "../config/koneksi.php";

//Menangkap PelangganID Dari URL
$PelangganID = $_GET['PelangganID'];

//Query untuk menghapus data
mysqli_query($koneksi,"DELETE from tb_pelanggan where PelangganID = '$PelangganID'");

header("location:pelanggan_data.php");