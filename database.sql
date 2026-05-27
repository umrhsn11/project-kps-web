-- Jalankan SQL ini di phpMyAdmin atau MySQL CLI

CREATE DATABASE IF NOT EXISTS db_mahasiswa;

USE db_mahasiswa;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    nim      VARCHAR(15)  NOT NULL UNIQUE,
    nama     VARCHAR(100) NOT NULL,
    jurusan  VARCHAR(100) NOT NULL,
    angkatan INT          NOT NULL
);

-- Data contoh
INSERT INTO mahasiswa (nim, nama, jurusan, angkatan) VALUES
('2024001', 'Andi Saputra',   'Teknik Informatika',  2024),
('2024002', 'Budi Santoso',   'Sistem Informasi',    2024),
('2024003', 'Citra Dewi',     'Teknik Komputer',     2024);
