<?php
session_start();
header("Content-Type: application/json");

require_once "../config/koneksi.php";

$data = json_decode(file_get_contents("php://input"), true);

$username = trim($data['username'] ?? '');
$password = md5(trim($data['password'] ?? ''));

$stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE username=?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {

    if ($password == $row['password']) {

        $_SESSION['login'] = true;
        $_SESSION['id_admin'] = $row['id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        echo json_encode([
            "success" => true
        ]);

    } else {

        echo json_encode([
            "success" => false,
            "message" => "Password salah"
        ]);

    }

} else {

    echo json_encode([
        "success" => false,
        "message" => "Username tidak ditemukan"
    ]);

}