<?php
header('Content-Type: application/json');
require_once '../koneksi/connection.php';

$id = $_POST['id'] ?? '';

if (empty($id)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Parameter id wajib diisi!"]);
    exit;
}

try {
    $sql = 'DELETE FROM informasi_perusahaan WHERE id = ?';
    $stmt = $database_connection->prepare($sql);
    $stmt->execute([$id]);

    echo json_encode(["status" => "success", "message" => "Data informasi berhasil dihapus!"]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Gagal menghapus data: " . $e->getMessage()]);
}
?>