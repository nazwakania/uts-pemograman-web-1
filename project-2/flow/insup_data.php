<?php
header('Content-Type: application/json');
require_once '../koneksi/connection.php';

$judul    = $_POST['judul'] ?? '';
$kategori = $_POST['kategori'] ?? '';
$tanggal  = $_POST['tanggal'] ?? '';
$isi      = $_POST['isi'] ?? '';

$photo_name = $_FILES['filePhoto']['name'] ?? '';
$photo_tmp  = $_FILES['filePhoto']['tmp_name'] ?? '';
$photo_path = '';

if (!empty($photo_name) && !empty($photo_tmp)) {
    $target_dir = '../photo/';
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $clean_name = time() . '_' . basename($photo_name);
    if (move_uploaded_file($photo_tmp, $target_dir . $clean_name)) {
        $photo_path = 'photo/' . $clean_name;
    }
}

try {
    if (empty($_POST['id'])) {
        // INSERT DATA BARU
        $sql = 'INSERT INTO informasi_perusahaan (judul, kategori, tanggal, isi, photo) VALUES (?, ?, ?, ?, ?)';
        $stmt = $database_connection->prepare($sql);
        $stmt->execute([$judul, $kategori, $tanggal, $isi, $photo_path]);

        echo json_encode(["status" => "success", "message" => "Data informasi berhasil ditambahkan!"]);
    } else {
        // UPDATE DATA BERDASARKAN ID
        $id = $_POST['id'];
        if ($photo_path !== '') {
            $sql = 'UPDATE informasi_perusahaan SET judul = ?, kategori = ?, tanggal = ?, isi = ?, photo = ? WHERE id = ?';
            $stmt = $database_connection->prepare($sql);
            $stmt->execute([$judul, $kategori, $tanggal, $isi, $photo_path, $id]);
        } else {
            $sql = 'UPDATE informasi_perusahaan SET judul = ?, kategori = ?, tanggal = ?, isi = ? WHERE id = ?';
            $stmt = $database_connection->prepare($sql);
            $stmt->execute([$judul, $kategori, $tanggal, $isi, $id]);
        }

        echo json_encode(["status" => "success", "message" => "Data informasi berhasil diperbarui!"]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Gagal menyimpan data: " . $e->getMessage()]);
}
?>