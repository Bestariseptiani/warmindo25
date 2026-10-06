<?php
session_start();
header("Content-Type: application/json");

require_once "../config/koneksi.php";

$data = json_decode(file_get_contents("php://input"), true);

$username = trim($data['username'] ?? '');
$password = trim($data['password'] ?? '');

// Ambil user berdasarkan username
$stmt = mysqli_prepare($conn, "SELECT id, username, password, role FROM admin WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {

    // Karena password di database masih plaintext (123456)
    if ($password === $row['password']) {

        $_SESSION['login'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        echo json_encode([
            "success" => true,
            "role" => $row['role']
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