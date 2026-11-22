CREATE DATABASE IF NOT EXISTS utb_pastel_patisserie;
USE utb_pastel_patisserie;

CREATE TABLE IF NOT EXISTS informasi_perusahaan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    kategori VARCHAR(80) NOT NULL,
    tanggal VARCHAR(50) NOT NULL,
    isi TEXT NOT NULL,
    photo VARCHAR(255) DEFAULT ''
);

INSERT INTO informasi_perusahaan (judul, kategori, tanggal, isi, photo) VALUES
('Peluncuran Sakura Strawberry Mochi', 'Produk Unggulan', '15 November 2026', 'Sakura Strawberry Mochi merupakan menu unggulan terbaru dari Mochi & Bloom Patisserie dengan isian krim vanila dan stroberi segar.', ''),
('Pembukaan Gerai Pastel Garden Dago', 'Berita Cabang', '18 November 2026', 'Mochi & Bloom Patisserie resmi membuka gerai baru bernuansa taman bunga pastel di kawasan Dago, Bandung.', ''),
('Layanan Hampers Custom Perusahaan', 'Layanan Korporat', '20 November 2026', 'Paket bingkisan kue eksklusif dengan kemasan pita pastel untuk acara seminar, wisuda, maupun perusahaan.', '');