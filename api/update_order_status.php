<?php

header("Content-Type: application/json");

include "../config/koneksi.php";

$id     = $_POST["id"];
$status = $_POST["status"];

// Update status order
$sql = "UPDATE orders SET status=? WHERE id=?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "si", $status, $id);

if (mysqli_stmt_execute($stmt)) {

    // Jika order selesai, kosongkan meja
    if ($status == "Selesai") {

        $result = mysqli_query($conn, "
            SELECT table_id
            FROM orders
            WHERE id='$id'
        ");

        $row = mysqli_fetch_assoc($result);

        mysqli_query($conn, "
            UPDATE tables
            SET status='Kosong'
            WHERE id='".$row['table_id']."'
        ");
    }

    echo json_encode([
        "success" => true
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);

}