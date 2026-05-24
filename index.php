<?php

require_once __DIR__ . '/classes/Produk.php';

// Membuat OBJECT dari class Produk
$produk  = new Produk();
$data = $produk->ambilSemua();

// Tangani pesan notifikasi
$pesan = $_GET['pesan'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 18px;
            font-weight: 600;
        }

        header span {
            font-size: 12px;
            opacity: 0.7;
        }

        .container {
            padding: 28px 32px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .top-bar h2 {
            font-size: 16px;
            color: #1e3a5f;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: #1e3a5f;
            color: white;
        }

        .btn-edit {
            background: #e8f0fe;
            color: #1e3a5f;
        }

        .btn-delete {
            background: #fdecea;
            color: #c0392b;
        }

        .btn:hover {
            opacity: 0.85;
        }

        .notif {
            padding: 10px 14px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 13px;
        }

        .notif.sukses {
            background: #eafaf1;
            color: #1e8449;
            border-left: 4px solid #1e8449;
        }

        .notif.gagal {
            background: #fdecea;
            color: #c0392b;
            border-left: 4px solid #c0392b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .08);
        }

        thead {
            background: #1e3a5f;
            color: white;
        }

        th,
        td {
            padding: 11px 14px;
            text-align: left;
        }

        th {
            font-weight: 600;
            font-size: 13px;
        }

        td {
            border-bottom: 1px solid #f0f0f0;
            font-size: 13px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .aksi {
            display: flex;
            gap: 6px;
        }

        .kosong {
            text-align: center;
            padding: 40px;
            color: #aaa;
            background: white;
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <header>
        <h1>KRAPYAK PEDULI SAMPAH</h1>
        <span>Sistem Data Produk KPS</span>
    </header>

    <div class="container">

        <div class="top-bar">
            <h2>Daftar Produk</h2>
            <a href="pages/tambah.php" class="btn btn-primary">+ Tambah Produk</a>
        </div>

        <?php if ($pesan === 'tambah'): ?>
            <div class="notif sukses">Data berhasil ditambahkan.</div>
        <?php elseif ($pesan === 'ubah'): ?>
            <div class="notif sukses">Data berhasil diubah.</div>
        <?php elseif ($pesan === 'hapus'): ?>
            <div class="notif sukses">Data berhasil dihapus.</div>
        <?php endif; ?>

        <?php if (count($data) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga Satuan</th>
                        <th>Stok</th>
                        <th>Jenis Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $i => $row): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['jenis']) ?></td>
                            <td> Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                            <td><?= htmlspecialchars($row['stok']) ?></td>
                            <td><?= htmlspecialchars($row['jenis_stok']) ?></td>
                            <td>
                                <div class="aksi">
                                    <a href="pages/edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                                    <a href="pages/hapus.php?id=<?= $row['id'] ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="kosong">Belum ada data produk.</div>
        <?php endif; ?>

    </div>

</body>

</html>