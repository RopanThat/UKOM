CREATE DATABASE db_aspirasi_ukom26;

CREATE TABLE tb_kelas (
    id_kelas INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(50) NOT NULL,
    tahun_ajaran VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tb_kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tb_kategori (
    id_feedback INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_aspirasi INT NOT NULL,
    isi_feedback VARCHAR(150) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tb_user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(15) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(20) NOT NULL,
    jenis_kelamin ENUM('P', 'L') NOT NULL, 
    id_kelas INT NOT NULL,
    role ENUM('admin', 'siswa') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);