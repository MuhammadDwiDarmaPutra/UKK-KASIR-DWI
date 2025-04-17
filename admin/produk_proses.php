<?php
include "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NamaProduk = $_POST['nm_produk'] ?? '';
    $Harga = $_POST['harga'] ?? '';
    $Stok = $_POST['stok'] ?? '';
    
    // Menangani upload gambar
    $img = $_FILES['img']['name'];
    $tmp_img = $_FILES['img']['tmp_name'];
    $folder = "admin/gambar/";

    if ($NamaProduk && $Harga && $Stok) {
        // Pindahkan file gambar ke folder tujuan
        move_uploaded_file($tmp_img, $folder . $img);
        
        // Simpan data produk ke database
        mysqli_query($koneksi, "INSERT INTO tb_produk (NamaProduk, Harga, Stok, img) VALUES ('$NamaProduk', '$Harga', '$Stok', '$img')") or die(mysqli_error($koneksi));
        header("Location: produk_data.php");
    } else {
        echo "Data tidak lengkap.";
    }
} else {
    echo "Akses tidak sah.";
}
