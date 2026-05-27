<?php

require_once __DIR__ . '/Database.php';


class Produk extends Database
{
    // PRIVATE PROPERTY - hanya bisa diakses di dalam class ini
    private $nama;
    private $jenis;
    private $harga;
    private $stok;
    private $jenis_stok;

    // PROTECTED PROPERTY - bisa diakses di class ini & class turunan
    protected $table = 'produk';

    // CONSTRUCTOR - dipanggil saat: $mhs = new Mahasiswa()
    public function __construct()
    {
        // Memanggil constructor class induk (Database)
        parent::__construct();
    }

    public function getNama() { return $this->nama; }
    public function getJenis() { return $this->jenis; }
    public function getHarga() { return $this->harga; }
    public function getStok()  { return $this->stok; }
    public function getJenisStok() { return $this->jenis_stok; }

    public function setNama($nama) { $this->nama = $nama; }
    public function setJenis($jenis) { $this->jenis = $jenis; }
    public function setHarga($harga) { $this->harga = $harga; }
    public function setStok($stok)   { $this->stok = $stok; }
    public function setJenisStok($jenis_stok) { $this->jenis_stok = $jenis_stok; }

    /**
     * CREATE - Tambah data produk baru
     */
    public function tambah()
    {
        $sql = "INSERT INTO {$this->table} (nama, jenis, harga, stok, jenis_stok) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssis", $this->nama, $this->jenis, $this->harga, $this->stok, $this->jenis_stok);
        return $stmt->execute();
    }

    /**
     * READ - Ambil semua data produk
     */
    public function ambilSemua()
    {
        $sql    = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $result = $this->conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * READ - Ambil satu data berdasarkan ID
     */
    public function ambilSatu($id)
    {
        $sql  = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    /**
     * UPDATE - Ubah data produk
     */
    public function ubah($id)
    {
        $sql = "UPDATE {$this->table} 
                SET nama = ?, jenis = ?, harga = ?, stok = ?, jenis_stok = ? 
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssisi", $this->nama, $this->jenis, $this->harga, $this->stok, $this->jenis_stok, $id);

        return $stmt->execute();
    }

    /**
     * DELETE - Hapus data produk
     */
    public function hapus($id)
    {
        $sql  = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}
