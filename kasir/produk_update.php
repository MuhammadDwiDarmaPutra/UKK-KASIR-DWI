<?php
include "../config/koneksi.php";

// Mengambil data yang dikirim dari modal Edit data produk
$ProdukID = $_POST['id_produk'];
$NamaProduk = $_POST['nm_produk'];
$Harga = $_POST['harga'];
$Stok = $_POST['stok'];

// Menangani upload gambar
$img_lama = $_POST['img_lama']; // Gambar lama yang sudah ada di database
$img_baru = $_FILES['img']['name'];
$tmp_img = $_FILES['img']['tmp_name'];
$folder = "admin/gambar/";

if ($img_baru) {
    // Pindahkan file gambar baru ke folder tujuan
    move_uploaded_file($tmp_img, $folder . $img_baru);
    // Hapus gambar lama jika ada
    if ($img_lama) {
        unlink($folder . $img_lama);
    }
    // Update data produk beserta gambar baru
    $query = "UPDATE tb_produk SET NamaProduk = '$NamaProduk', Harga = '$Harga', Stok = '$Stok', img = '$img_baru' WHERE ProdukID = '$ProdukID'";
} else {
    // Jika gambar tidak diubah, hanya update data produk lainnya
    $query = "UPDATE tb_produk SET NamaProduk = '$NamaProduk', Harga = '$Harga', Stok = '$Stok' WHERE ProdukID = '$ProdukID'";
}

mysqli_query($koneksi, $query);

header("location:produk_data.php");
