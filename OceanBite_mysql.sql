-- --------------------------------------------------------
-- Database: OCEANBITE (Konversi dari Oracle ke MySQL)
-- --------------------------------------------------------

-- 1. Tabel USERS
CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    nama_lengkap VARCHAR(100),
    no_hp VARCHAR(20),
    role VARCHAR(20)
);

-- 2. Tabel KATEGORI
CREATE TABLE kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100)
);

-- 3. Tabel MENU
CREATE TABLE menu (
    id_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_kategori INT,
    nama_menu VARCHAR(100),
    harga INT,
    stok INT,
    deskripsi VARCHAR(255),
    gambar VARCHAR(255),
    CONSTRAINT fk_menu_kategori FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori) ON DELETE SET NULL
);

-- 4. Tabel PESANAN
CREATE TABLE pesanan (
    id_pesanan INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    tanggal_pesan DATE,
    total_harga INT,
    status_pesanan VARCHAR(50),
    CONSTRAINT fk_pesanan_user FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
);

-- 5. Tabel DETAIL_PESANAN
CREATE TABLE detail_pesanan (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT,
    id_menu INT,
    jumlah INT,
    subtotal INT,
    CONSTRAINT fk_detail_pesanan FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan) ON DELETE CASCADE,
    CONSTRAINT fk_detail_menu FOREIGN KEY (id_menu) REFERENCES menu(id_menu) ON DELETE CASCADE
);

-- 6. Tabel PEMBAYARAN
CREATE TABLE pembayaran (
    id_pembayaran INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT,
    metode_pembayaran VARCHAR(50),
    bukti_bayar VARCHAR(255),
    status_verifikasi VARCHAR(50),
    CONSTRAINT fk_pembayaran_pesanan FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan) ON DELETE CASCADE
);

-- --------------------------------------------------------
-- INSERT DATA (DML)
-- --------------------------------------------------------

-- Insert USERS
INSERT INTO users (id_user, username, password, nama_lengkap, no_hp, role) VALUES 
(1, 'admin', 'admin123', 'Administrator', '081234567890', 'admin'),
(2, 'mia', 'mia123', 'Mia Rizki', '081234567891', 'user'),
(21, 'miarizki@gmail.com', '$2y$10$tpHcVBdWdEfQai6eUPQrvuuFJyeYMkAgPjlQMhjLVfjd.DDAlzgDK', 'Mia Rizki Aminarti', '081269197525', 'user'),
(22, 'zizi@gmail.com', '$2y$10$5v0jRBh.KSQgau2SyI2UzerPhRGMUZgGl8dIWEyhPPwrbHnB0aelm', 'zizi', '081256783425', 'user'),
(41, 'hanna', '$2y$10$7a6rsIuNUUbyOtmRb29aH.ZChWYSxPke4XyncdYbjODU6ug.O1lJC', 'hanna t', '081234561234', 'user'),
(44, 'miarizki', '$2y$10$HZAPuIYqaiUIvYEija16F.CiBOhz9pMadv3F0mR5KfgD1MY7U.Tii', 'mia rizki', '0854123456789', 'user');

-- Insert KATEGORI
INSERT INTO kategori (id_kategori, nama_kategori) VALUES 
(1, 'Seafood'),
(2, 'Dimsum'),
(3, 'Dessert'),
(4, 'Drinks');

-- Insert MENU
INSERT INTO menu (id_menu, id_kategori, nama_menu, harga, stok, deskripsi, gambar) VALUES 
(1, 1, 'Cumi Crispy', 35000, 30, 'Cumi goreng crispy dengan saus spesial', 'cumi.jpg'),
(2, 1, 'Udang Saus Padang', 45000, 25, 'Udang segar saus padang', 'udang.jpg'),
(3, 1, 'Fish Ball Seafood', 30000, 20, 'Bola ikan seafood premium', 'fishball.jpg'),
(4, 2, 'Dimsum Udang', 25000, 50, 'Dimsum isi udang premium', 'dimsum_udang.jpg'),
(5, 2, 'Hakau', 28000, 40, 'Hakau isi udang lembut', 'hakau.jpg'),
(6, 2, 'Siomay Kepiting', 27000, 35, 'Siomay kepiting lembut', 'siomay.jpg'),
(7, 3, 'Mango Sago', 22000, 30, 'Dessert mangga segar', 'mango.jpg'),
(8, 3, 'Pudding Caramel', 18000, 40, 'Pudding caramel lembut', 'pudding.jpg'),
(9, 3, 'Ice Cream Matcha', 20000, 35, 'Es krim matcha premium', 'matcha.jpg'),
(10, 4, 'Lychee Tea', 15000, 50, 'Minuman teh leci segar', 'lychee.jpg'),
(11, 4, 'Lemon Tea', 14000, 50, 'Teh lemon dingin', 'lemon.jpg'),
(12, 4, 'Thai Tea', 17000, 45, 'Thai tea creamy', 'thaitea.jpg');

-- Insert PESANAN
INSERT INTO pesanan (id_pesanan, id_user, tanggal_pesan, total_harga, status_pesanan) VALUES 
(1, 21, '2026-05-09', 162000, 'success'),
(2, 21, '2026-05-09', 14000, 'success'),
(3, 21, '2026-05-09', 45000, 'success'),
(4, 21, '2026-05-09', 35000, 'success'),
(5, 22, '2026-05-10', 18000, 'pending'),
(6, 22, '2026-05-10', 18000, 'pending'),
(7, 22, '2026-05-10', 18000, 'success'),
(8, 22, '2026-05-10', 35000, 'success'),
(9, 22, '2026-05-10', 22000, 'success'),
(10, 21, '2026-05-10', 28000, 'pending'),
(11, 21, '2026-05-10', 20000, 'pending'),
(12, 21, '2026-05-11', 35000, 'pending'),
(13, 21, '2026-05-11', 15000, 'pending'),
(14, 21, '2026-05-11', 52000, 'success');

-- Insert DETAIL_PESANAN
INSERT INTO detail_pesanan (id_detail, id_pesanan, id_menu, jumlah, subtotal) VALUES 
(1, 1, 12, 1, 17000),
(2, 1, 1, 2, 70000),
(3, 1, 3, 1, 30000),
(4, 1, 2, 1, 45000),
(5, 2, 11, 1, 14000),
(6, 3, 2, 1, 45000),
(7, 4, 1, 1, 35000),
(8, 5, 8, 1, 18000),
(9, 6, 8, 1, 18000),
(10, 7, 8, 1, 18000),
(11, 8, 1, 1, 35000),
(12, 9, 7, 1, 22000),
(13, 10, 5, 1, 28000),
(14, 11, 9, 1, 20000),
(15, 12, 1, 1, 35000),
(16, 13, 10, 1, 15000),
(17, 14, 1, 1, 35000),
(18, 14, 12, 1, 17000);

-- Insert PEMBAYARAN
INSERT INTO pembayaran (id_pembayaran, id_pesanan, metode_pembayaran, bukti_bayar, status_verifikasi) VALUES 
(1, 1, 'QRIS', '1778351409.png', 'verified'),
(2, 2, 'QRIS', '1778351946.png', 'verified'),
(3, 3, 'Transfer Bank', '1778352390.png', 'verified'),
(4, 4, 'QRIS', '1778354460.png', 'verified'),
(5, 7, 'Tunai', NULL, 'verified'),
(6, 8, 'QRIS', '1778400379.png', 'verified'),
(7, 9, 'Tunai', NULL, 'verified'),
(8, 10, 'QRIS', '1778405181.png', 'Pending Verifikasi'),
(9, 11, 'Tunai', NULL, 'Menunggu pembayaran di kasir'),
(10, 12, 'Tunai', NULL, 'Menunggu pembayaran di kasir'),
(11, 13, 'Tunai', NULL, 'Menunggu pembayaran di kasir'),
(12, 14, 'QRIS', '1778466525.png', 'verified');
