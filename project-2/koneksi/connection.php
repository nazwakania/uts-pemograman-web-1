<?php
$database_hostname = "localhost";
$database_username = "utb_user";
$database_password = "242011002";
$database_name     = "utb_pastel_patisserie";
$database_port     = "3306";

try {
    $dsn = "mysql:host={$database_hostname};port={$database_port};dbname={$database_name};charset=utf8mb4";
    $database_connection = new PDO(
        $dsn,
        $database_username,
        $database_password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
    // echo "Koneksi Berhasil";
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Koneksi Gagal: " . $e->getMessage()]);
    exit;
}
?>