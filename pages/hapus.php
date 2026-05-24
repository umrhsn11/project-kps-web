<?php

require_once __DIR__ . '/../classes/Produk.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    // Membuat object Produk
    $produk = new Produk();

    // Memanggil method hapus()
    $produk->hapus($id);
}

header("Location: ../index.php?pesan=hapus");
exit;
