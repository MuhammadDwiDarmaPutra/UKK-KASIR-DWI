<?php
include "../config/koneksi.php";

//Menangkap UserID Dari URL
$UserID = $_GET['UserID'];

//Query untuk menghapus data
mysqli_query($koneksi,"DELETE from tb_user where UserID = '$UserID'");

header("location:kasir_data.php");