<?php

header("Content-Type: application/json");

include "../config/koneksi.php";

$id     = $_POST["id"];
$status = $_POST["status"];

// Update status order saja
$sql = "UPDATE orders SET status=? WHERE id=?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "si", $status, $id);

if(mysqli_stmt_execute($stmt)){

    echo json_encode([
        "success" => true
    ]);

}else{

    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);

}