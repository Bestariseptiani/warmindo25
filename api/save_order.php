<?php

header("Content-Type: application/json");

include "../config/koneksi.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode([
        "success" => false,
        "message" => "Data kosong"
    ]);
    exit;
}

$table_id      = intval($data["table_id"]);
$customer_name = mysqli_real_escape_string($conn, $data["customer_name"]);
$payment       = mysqli_real_escape_string($conn, $data["payment_method"]);
$total         = intval($data["total"]);
$items         = $data["items"];

// Debug (boleh dihapus nanti)
file_put_contents(
    "debug_cart.txt",
    print_r($items, true)
);

mysqli_begin_transaction($conn);

try {

    // Simpan order
    $insertOrder = mysqli_query($conn, "
        INSERT INTO orders
        (table_id, customer_name, total, payment_method, status)
        VALUES
        (
            '$table_id',
            '$customer_name',
            '$total',
            '$payment',
            'Pending'
        )
    ");

    if (!$insertOrder) {
        throw new Exception(mysqli_error($conn));
    }

$order_id = mysqli_insert_id($conn);

// Ubah status meja
$updateTable = mysqli_query($conn, "
    UPDATE tables
    SET status='Terisi'
    WHERE id='$table_id'
");

if (!$updateTable || mysqli_affected_rows($conn) == 0) {
    throw new Exception("Meja tidak ditemukan.");
}

// Simpan item
foreach ($items as $item) {

    $menu_id  = intval($item["menu_id"]);
    $qty      = intval($item["quantity"]);
    $price    = intval($item["price"]);
    $subtotal = $qty * $price;

    $insertItem = mysqli_query($conn, "
        INSERT INTO order_items
        (order_id, menu_id, quantity, price, subtotal)
        VALUES
        (
            '$order_id',
            '$menu_id',
            '$qty',
            '$price',
            '$subtotal'
        )
    ");

    if (!$insertItem) {
        throw new Exception(mysqli_error($conn));
    }
}
    // Simpan receipt
    $insertReceipt = mysqli_query($conn, "
        INSERT INTO receipts
        (order_id, receipt_number, total, payment_status)
        VALUES
        (
            '$order_id',
            CONCAT('WRM', LPAD($order_id,5,'0')),
            '$total',
            'Paid'
        )
    ");

    if (!$insertReceipt) {
        throw new Exception(mysqli_error($conn));
    }

    mysqli_commit($conn);

    echo json_encode([
        "success" => true,
        "order_id" => $order_id
    ]);

} catch (Exception $e) {

    mysqli_rollback($conn);

    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}