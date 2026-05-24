<?php

require_once __DIR__ . '/../config/database.php';

/**
 * Class Database
 * 
 * Class induk (parent) yang bertanggung jawab untuk koneksi ke database.
 * Class lain akan mewarisi (inherit) class ini.
 */
class Database
{
    // PROPERTY - atribut milik class
    protected $host;
    protected $user;
    protected $pass;
    protected $dbname;
    protected $conn; // menyimpan objek koneksi mysqli

    // CONSTRUCTOR - otomatis dipanggil saat objek dibuat
    public function __construct()
    {
        $this->host   = DB_HOST;
        $this->user   = DB_USER;
        $this->pass   = DB_PASS;
        $this->dbname = DB_NAME;

        $this->connect();
    }

    // METHOD - fungsi untuk membuat koneksi
    private function connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8");
    }

    // GETTER - mengambil nilai property conn (dari luar class)
    public function getConnection()
    {
        return $this->conn;
    }
}
