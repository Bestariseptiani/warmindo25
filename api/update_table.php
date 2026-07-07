<?php

require_once "../config/koneksi.php";

$id=$_POST['id'];
$status=$_POST['status'];

$query=mysqli_query($conn,"
UPDATE tables
SET status='$status'
WHERE id='$id'
");

echo json_encode([
    "success"=>$query
]);