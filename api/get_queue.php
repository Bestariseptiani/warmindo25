<?php

header("Content-Type: application/json");

include "../config/koneksi.php";

$sql="
SELECT
COALESCE(SUM(oi.quantity),0) AS total_porsi
FROM orders o
JOIN order_items oi
ON o.id=oi.order_id
WHERE o.status IN('Pending','Diproses')
";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

echo json_encode([
    "success"=>true,
    "total_porsi"=>(int)$row["total_porsi"]
]);