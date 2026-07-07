<?php

require_once "../config/koneksi.php";

$jumlah=(int)$_POST['jumlah'];

$cari=mysqli_query($conn,"
SELECT MAX(nomor_meja) AS nomor
FROM tables
");

$data=mysqli_fetch_assoc($cari);

$nomor=$data['nomor'];

if($nomor==""){

    $nomor=0;

}

for($i=1;$i<=$jumlah;$i++){

    $nomor++;

    mysqli_query($conn,"
    INSERT INTO tables(
        nomor_meja,
        status
    )
    VALUES(
        '$nomor',
        'Kosong'
    )
    ");

}

echo json_encode([
    "success"=>true
]);