<?php
header('Content-Type: application/json');
require_once '../koneksi/connection.php';

try {
    $sql = 'SELECT * FROM informasi_perusahaan ORDER BY id ASC';
    $stmt = $database_connection->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll();
    echo json_encode($data, JSON_PRETTY_PRINT);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error fetching data: " . $e->getMessage()]);
}
?>