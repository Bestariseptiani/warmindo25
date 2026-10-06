<?php

header("Content-Type: application/json");
include "../config/koneksi.php";

$sql = "
SELECT
    o.id,
    o.order_time,
    o.eta_minutes,
    o.actual_minutes,
    o.eta_result,
    o.status,
    t.nomor_meja
FROM orders o
LEFT JOIN tables t
ON o.table_id = t.id
WHERE
    o.actual_minutes IS NOT NULL
    AND o.eta_result IS NOT NULL
ORDER BY o.order_time ASC
";

$result = mysqli_query($conn,$sql);

$data = [];

while($row = mysqli_fetch_assoc($result)){

    $data[] = [

        "id" => (int)$row["id"],

        "order_time" => $row["order_time"],

        "nomor_meja" => $row["nomor_meja"],

        "eta_minutes" => (int)$row["eta_minutes"],

        "actual_minutes" => (int)$row["actual_minutes"],

        "eta_result" => $row["eta_result"]

    ];

}

echo json_encode($data);