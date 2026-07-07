<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require_once '../config/koneksi.php';

// Get all tables
$query = "SELECT * FROM tables ORDER BY table_number";
$result = mysqli_query($conn, $query);

$tables = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tables[] = $row;
}

echo json_encode(['success' => true, 'tables' => $tables]);

mysqli_close($conn);
?>
