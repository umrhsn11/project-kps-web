<?php

require_once __DIR__ . '/../classes/Produk.php';

$id    = $_GET['id'] ?? 0;
$produk = new Produk();
$data  = $produk->ambilSatu($id);
$error = '';

if (!$data) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Menggunakan SETTER untuk mengisi property
    $produk->setNama($_POST['nama']);
    $produk->setJenis($_POST['jenis']);
    $produk->setHarga($_POST['harga']);
    $produk->setStok($_POST['stok']);
    $produk->setJenisStok($_POST['jenis_stok']);

    // Memanggil method ubah()
    if ($produk->ubah($id)) {
        header("Location: ../index.php?pesan=ubah");
        exit;
    } else {
        $error = "Gagal mengubah data.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

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

        header h1 {
            font-size: 18px;
            font-weight: 600;
        }

        .container {
            padding: 32px;
            max-width: 520px;
        }

        h2 {
            font-size: 16px;
            color: #1e3a5f;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #444;
        }

        input,
        select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 13px;
            background: white;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #1e3a5f;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            padding: 9px 18px;
            border-radius: 4px;
            font-size: 13px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #1e3a5f;
            color: white;
        }

        .btn-secondary {
            background: #eee;
            color: #333;
        }

        .btn:hover {
            opacity: 0.85;
        }

        .error {
            padding: 10px 14px;
            background: #fdecea;
            color: #c0392b;
            border-left: 4px solid #c0392b;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 13px;
        }

        .info-id {
            font-size: 12px;
            color: #888;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Sistem Data Produk</h1>
    </header>

    <div class="container">
        <h2>Edit Data Produk</h2>

        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama"
                    value="<?= htmlspecialchars($data['nama']) ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis</label>
                <select name="jenis" required>
                    <option value="Organik" <?= $data['jenis'] === 'Organik' ? 'selected' : '' ?>>Organik</option>
                    <option value="Anorganik" <?= $data['jenis'] === 'Anorganik' ? 'selected' : '' ?>>Anorganik</option>
                    <option value="B3" <?= $data['jenis'] === 'B3' ? 'selected' : '' ?>>B3</option>
                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga"
                    value=" Rp <?= number_format($data['harga'], 0, ',', '.') ?>" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok"
                    value="<?= htmlspecialchars($data['stok']) ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Stok</label>
                <select name="jenis_stok" required>
                    <option value="Pcs" <?= $data['jenis_stok'] === 'Pcs' ? 'selected' : '' ?>>Pcs</option>
                    <option value="Kilogram" <?= $data['jenis_stok'] === 'Kilogram' ? 'selected' : '' ?>>Kilogram</option>
                    <option value="Liter" <?= $data['jenis_stok'] === 'Liter' ? 'selected' : '' ?>>Liter</option>
                    <option value="Package" <?= $data['jenis_stok'] === 'Package' ? 'selected' : '' ?>>Package</option>
                </select>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="../index.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

</body>

</html>
