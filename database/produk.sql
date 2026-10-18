CREATE DATABASE IF NOT EXISTS toko_db;
USE toko_db;

CREATE TABLE IF NOT EXISTS produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_barang VARCHAR(20) NOT NULL UNIQUE,
    nama_produk VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produk (kode_barang, nama_produk, kategori, harga, stok) VALUES
('PRD001', 'Laptop ASUS Vivobook', 'Elektronik', 8500000, 10),
('PRD002', 'Mouse Wireless Logitech', 'Aksesoris', 150000, 25),
('PRD003', 'Keyboard Mechanical', 'Aksesoris', 450000, 15);