CREATE DATABASE IF NOT EXISTS db_crud;
USE db_crud;

CREATE TABLE IF NOT EXISTS produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL
);

INSERT INTO produk (nama, harga, stok) VALUES
('Kopi Hitam', 15000, 50),
('Teh Manis', 10000, 30);
