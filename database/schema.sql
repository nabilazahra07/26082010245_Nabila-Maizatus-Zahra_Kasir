CREATE DATABASE IF NOT EXISTS kasir_db;
USE kasir_db;

CREATE TABLE kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL,
    keterangan VARCHAR(255)
);

CREATE TABLE produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga DECIMAL(12,2) NOT NULL,
    stok INT NOT NULL,
    id_kategori INT,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori)
);

CREATE TABLE transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_produk INT NOT NULL,
    jumlah INT NOT NULL,
    total DECIMAL(12,2) NOT NULL,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);

INSERT INTO kategori (nama_kategori, keterangan) VALUES
('Makanan', 'Produk makanan'),
('Minuman', 'Produk minuman'),
('Snack', 'Makanan ringan'),
('Sembako', 'Kebutuhan sehari-hari'),
('Alat Tulis', 'Perlengkapan alat tulis');

INSERT INTO produk (nama_produk, harga, stok, id_kategori) VALUES
('Nasi Goreng', 15000, 20, 1),
('Es Teh', 5000, 30, 2),
('Keripik Kentang', 10000, 25, 3),
('Minyak Goreng', 18000, 15, 4),
('Pulpen', 3000, 50, 5);

INSERT INTO transaksi (id_produk, jumlah, total, tanggal) VALUES
(1, 2, 30000, '2026-10-06 10:00:00'),
(2, 3, 15000, '2026-10-06 10:15:00'),
(3, 1, 10000, '2026-10-06 10:30:00'),
(4, 2, 36000, '2026-10-06 11:00:00'),
(5, 5, 15000, '2026-10-06 11:30:00');
