<?php

require_once "../config/koneksi.php";

$query = mysqli_query($conn,"
SELECT *
FROM menu
WHERE status='Tersedia'
ORDER BY kategori,nama_menu
");

$data=[];

while($row=mysqli_fetch_assoc($query)){
    $data[]=$row;
}

header("Content-Type: application/json");

echo json_encode($data);