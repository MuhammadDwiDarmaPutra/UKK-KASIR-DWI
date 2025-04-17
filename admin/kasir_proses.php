<?php
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data user
$NamaUser = $_POST['nm_user'];
$Username = $_POST['username'];
$Password = md5($_POST['password']);
$Role = ($_POST['role']);

mysqli_query($koneksi, "INSERT INTO tb_user values ('', '$NamaUser','$Username','$Password','$Role')");

header("location:kasir_data.php");