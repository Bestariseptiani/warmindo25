<?php

header("Content-Type: application/json");

include "../config/koneksi.php";

$sql = "
SELECT
    o.*,
    o.order_time AS created_at,
    t.nomor_meja
FROM orders o
LEFT JOIN tables t
    ON o.table_id = t.id
ORDER BY o.id DESC
";

$result = mysqli_query($conn, $sql);

if(!$result){
    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
    exit;
}

$orders = [];

while($row = mysqli_fetch_assoc($result)){

    $orderId = $row["id"];

$itemSql = "
SELECT
    oi.quantity AS qty,
    oi.price,
    oi.subtotal,
    m.nama_menu
FROM order_items oi
LEFT JOIN menu m
    ON oi.menu_id = m.id
WHERE oi.order_id = '$orderId'
";

$itemResult = mysqli_query($conn, $itemSql);

if(!$itemResult){
    throw new Exception(mysqli_error($conn));
}

    while($item = mysqli_fetch_assoc($itemResult)){
        $items[] = [
            "qty" => (int)$item["qty"],
            "price" => (int)$item["price"],
            "subtotal" => (int)$item["subtotal"],
            "nama_menu" => $item["nama_menu"]
        ];
    }

    $orders[] = [
        "id" => (int)$row["id"],
        "customer_name" => $row["customer_name"],
        "payment_method" => $row["payment_method"],
        "total" => (int)$row["total"],
        "status" => $row["status"],
        "created_at" => $row["created_at"],

        "tables" => [
            "nomor_meja" => $row["nomor_meja"]
        ],

        "items" => $items
    ];
}

echo json_encode($orders);