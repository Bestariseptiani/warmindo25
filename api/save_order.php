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

// Debug request (hapus jika sudah selesai testing)
file_put_contents(
    "debug_request.txt",
    print_r($data, true)
);

$table_id = intval($data["table_id"] ?? 0);
$customer_name = trim($data["customer_name"] ?? "Guest");
$payment = trim($data["payment_method"] ?? "cash");
$total = intval($data["total"] ?? 0);
$items = $data["items"] ?? [];

$customer_name = mysqli_real_escape_string($conn, $customer_name);
$payment = mysqli_real_escape_string($conn, $payment);

mysqli_begin_transaction($conn);

try {

    // Simpan Order
    $sql = "
INSERT INTO orders
(
table_id,
customer_name,
total,
payment_method,
payment_status,
status
)
VALUES
(
'$table_id',
'$customer_name',
'$total',
'$payment',
'Belum Dibayar',
'Menunggu Pembayaran'
)
    ";

    if (!mysqli_query($conn, $sql)) {
        throw new Exception(mysqli_error($conn));
    }

    $order_id = mysqli_insert_id($conn);

    // Update status meja
    $updateTable = mysqli_query($conn,"
        UPDATE tables
        SET status='Terisi'
        WHERE id='$table_id'
    ");

    if(!$updateTable){
        throw new Exception(mysqli_error($conn));
    }

    // Simpan Order Items
    foreach($items as $item){

        $menu_id = intval($item["menu_id"]);
        $qty = intval($item["quantity"]);
        $price = intval($item["price"]);
        $subtotal = $qty * $price;

        $sqlItem = "
            INSERT INTO order_items
            (
                order_id,
                menu_id,
                quantity,
                price,
                subtotal
            )
            VALUES
            (
                '$order_id',
                '$menu_id',
                '$qty',
                '$price',
                '$subtotal'
            )
        ";

        if(!mysqli_query($conn,$sqlItem)){
            throw new Exception(mysqli_error($conn));
        }

    }

    // Simpan Receipt
    $sqlReceipt = "
        INSERT INTO receipts
        (
            order_id,
            receipt_number,
            total,
            payment_status
        )
        VALUES
        (
            '$order_id',
            CONCAT('WRM',LPAD('$order_id',5,'0')),
            '$total',
            'Paid'
        )
    ";

    if(!mysqli_query($conn,$sqlReceipt)){
        throw new Exception(mysqli_error($conn));
    }

    mysqli_commit($conn);

    echo json_encode([
        "success"=>true,
        "order_id"=>$order_id,
        "customer_name"=>$customer_name
    ]);

}catch(Exception $e){

    mysqli_rollback($conn);

    echo json_encode([
        "success"=>false,
        "message"=>$e->getMessage()
    ]);

}