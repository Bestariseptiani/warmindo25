<?php
header("Content-Type: application/json");
include "../config/koneksi.php";

$sql = "
SELECT
    o.id,
    o.total,
    o.status,
    o.order_time,
    t.nomor_meja,
    GROUP_CONCAT(m.nama_menu SEPARATOR ', ') AS items
FROM orders o
LEFT JOIN tables t
    ON o.table_id = t.id
LEFT JOIN order_items oi
    ON oi.order_id = o.id
LEFT JOIN menu m
    ON oi.menu_id = m.id
GROUP BY o.id
ORDER BY o.order_time DESC
";

$result = mysqli_query($conn,$sql);

$data=[];

while($row=mysqli_fetch_assoc($result)){
    $data[]=$row;
}

echo json_encode($data);