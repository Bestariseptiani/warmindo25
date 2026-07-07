<?php

header("Content-Type: application/json");

include "../config/koneksi.php";

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

$sql = "
SELECT
    o.id,
    o.customer_name,
    o.total,
    o.payment_method,
    o.status,
    o.order_time,
    t.nomor_meja
FROM orders o
LEFT JOIN tables t
    ON o.table_id = t.id
WHERE o.id = '$id'
";

$result = mysqli_query($conn, $sql);

if(!$result){
    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
    exit;
}

$order = mysqli_fetch_assoc($result);

if(!$order){
    echo json_encode([
        "success" => false,
        "message" => "Order tidak ditemukan"
    ]);
    exit;
}

$itemSql = "
SELECT
    m.nama_menu,
    oi.quantity AS qty,
    oi.price,
    oi.subtotal
FROM order_items oi
LEFT JOIN menu m
    ON oi.menu_id = m.id
WHERE oi.order_id = '$id'
";

$itemResult = mysqli_query($conn, $itemSql);

if(!$itemResult){
    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
    exit;
}

$items = [];

while($row = mysqli_fetch_assoc($itemResult)){

    $items[] = [
        "nama_menu" => $row["nama_menu"],
        "qty" => (int)$row["qty"],
        "price" => (int)$row["price"],
        "subtotal" => (int)$row["subtotal"]
    ];

}

echo json_encode([
    "success" => true,
    "order" => $order,
    "total" => (int)$order["total"],
    "items" => $items
]);