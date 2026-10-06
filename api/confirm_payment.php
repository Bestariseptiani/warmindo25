<?php

header("Content-Type: application/json");

include "../config/koneksi.php";

$id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

if ($id <= 0) {
    echo json_encode([
        "success" => false,
        "message" => "ID Order tidak valid."
    ]);
    exit;
}

$sql = "
UPDATE orders
SET
    payment_status='Sudah Dibayar',
    status='Pending'
WHERE id=?

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {

    echo json_encode([
        "success" => true
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);

}