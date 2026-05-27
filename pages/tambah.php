<?php

<<<<<<< HEAD
=======
// Try to load the Produk class file. If the direct file isn't present,
// attempt to load any PHP file in the classes directory as a fallback.
>>>>>>> 5e6e10f712341319fcd275887a5a366f888e3de6
require_once __DIR__ . '/../classes/Produk.php';
if (!class_exists('Produk')) {
    foreach (glob(__DIR__ . '/../classes/*.php') as $file) {
        require_once $file;
    }
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Membuat object Produk
    $produk = new Produk();

    // Menggunakan SETTER untuk mengisi property
    $produk->setNama($_POST['nama']);
    $produk->setJenis($_POST['jenis']);
    $produk->setHarga($_POST['harga']);
    $produk->setStok($_POST['stok']);
    $produk->setJenisStok($_POST['jenis_stok']);

    // Memanggil method tambah()
    if ($produk->tambah()) {
        header("Location: ../index.php?pesan=tambah");
        exit;
    } else {
        $error = "Gagal menambahkan data. Pastikan NIM belum terdaftar.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <title>KRAPYAK PEDULI SAMPAH</title>
=======
    <title>Tambah Produk</title>
>>>>>>> 5e6e10f712341319fcd275887a5a366f888e3de6
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            font-size: 14px;
            background: #f4f6f8;
            color: #333;
        }

        header {
            background: #1e3a5f;
            color: white;
            padding: 16px 32px;
        }

        header h1 { font-size: 18px; font-weight: 600; }

        .container { padding: 32px; max-width: 520px; }

        h2 { font-size: 16px; color: #1e3a5f; margin-bottom: 20px; }

        .form-group { margin-bottom: 16px; }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #444;
        }

        input, select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 13px;
            background: white;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #1e3a5f;
        }

        .btn-group { display: flex; gap: 10px; margin-top: 20px; }

        .btn {
            padding: 9px 18px;
            border-radius: 4px;
            font-size: 13px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-primary { background: #1e3a5f; color: white; }
        .btn-secondary { background: #eee; color: #333; }
        .btn:hover { opacity: 0.85; }

        .error {
            padding: 10px 14px;
            background: #fdecea;
            color: #c0392b;
            border-left: 4px solid #c0392b;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<header>
    <h1>Sistem Data Produk</h1>
</header>

<div class="container">
    <h2>Tambah Produk Baru</h2>

    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama" placeholder="Nama produk" required>
        </div>
        <div class="form-group">
            <label>Jenis</label>
            <select name="jenis" required>
                <option value="">-- Pilih Asal Jenis Limbah/Sampah --</option>
                <option value="Organik">Organik</option>
                <option value="Anorganik">Anorganik</option>
                <option value="B3">B3</option>
            </select>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" placeholder="Harga produk" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" placeholder="Jumlah stok" required>
        </div>
        <div class="form-group">
            <label>Jenis Stok</label>
            <select name="jenis_stok" required>
                <option value="">-- Pilih Jenis Stok --</option>
                <option value="Pcs">Pcs</option>
                <option value="Kilogram">Kilogram</option>
                <option value="Liter">Liter</option>
                <option value="Package">Package</option>
            </select>
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="../index.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

</body>
</html>
