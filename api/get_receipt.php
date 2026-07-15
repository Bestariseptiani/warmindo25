<?php

header("Content-Type: application/json");

include "../config/koneksi.php";

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

if($id <= 0){
    echo json_encode([
        "success"=>false,
        "message"=>"ID Order tidak valid"
    ]);
    exit;
}

/* ===========================
   AMBIL DATA ORDER
=========================== */

$stmt = $conn->prepare("
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
WHERE o.id = ?
");

$stmt->bind_param("i",$id);
$stmt->execute();

$result = $stmt->get_result();

$order = $result->fetch_assoc();

if(!$order){
    echo json_encode([
        "success"=>false,
        "message"=>"Order tidak ditemukan"
    ]);
    exit;
}


/* ===========================
   AMBIL ITEM ORDER
=========================== */

$stmt = $conn->prepare("
SELECT
    m.nama_menu,
    oi.quantity,
    oi.price,
    oi.subtotal
FROM order_items oi
LEFT JOIN menu m
    ON oi.menu_id = m.id
WHERE oi.order_id = ?
");

$stmt->bind_param("i",$id);
$stmt->execute();

$itemResult = $stmt->get_result();

$items = [];

$totalPorsiOrderIni = 0;

while($row = $itemResult->fetch_assoc()){

    $qty = (int)$row["quantity"];

    $items[] = [
        "nama_menu"=>$row["nama_menu"],
        "qty"=>$qty,
        "price"=>(int)$row["price"],
        "subtotal"=>(int)$row["subtotal"]
    ];

    $totalPorsiOrderIni += $qty;

}


/* ===========================
   HITUNG TOTAL PORSI
   YANG MASIH ANTRE
=========================== */

$stmt = $conn->prepare("
SELECT
SUM(oi.quantity) AS total_porsi
FROM orders o
JOIN order_items oi
ON o.id = oi.order_id
WHERE o.id < ?
AND o.status IN('Pending','Diproses')
");

$stmt->bind_param("i",$id);
$stmt->execute();

$queueResult = $stmt->get_result()->fetch_assoc();

$totalPorsiSebelumnya = (int)$queueResult["total_porsi"];


/* ===========================
   PERHITUNGAN ETA
=========================== */

$kapasitasDapur = 6;      // hasil wawancara
$waktuPerBatch = 10;      // menit

/*
contoh

sebelumnya = 8 porsi

order ini = 3 porsi

berarti pelanggan masuk batch ke

ceil((8+3)/6)=2

ETA =20 menit
*/

$batch = ceil(
    ($totalPorsiSebelumnya + $totalPorsiOrderIni)
    /
    $kapasitasDapur
);

if($batch < 1){
    $batch = 1;
}

$eta = $batch * $waktuPerBatch;


/* ===========================
   RESPONSE
=========================== */

echo json_encode([

    "success"=>true,
    "order"=>$order,
    "total"=>(int)$order["total"],
    "items"=>$items,
    "eta"=>$eta,
    "queue_portion"=>$totalPorsiSebelumnya,
    "order_portion"=>$totalPorsiOrderIni,
    "capacity"=>$kapasitasDapur

]);
