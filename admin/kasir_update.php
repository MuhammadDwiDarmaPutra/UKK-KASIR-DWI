<?php
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal Edit data user
$UserID = $_POST['id_user'];
$NamaUser = $_POST['nm_user'];
$Username = $_POST['username'];
$Password = md5($_POST['password']);
$Role = ($_POST['role']);

//update data user
mysqli_query($koneksi, "UPDATE tb_user set NamaUser = '$NamaUser', username = '$Username', password = '$Password', role = '$Role' where UserID = '$UserID'");

header("location:kasir_data.php");