<?php
session_start();

// Tidak boleh cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// Belum login
if (!isset($_SESSION['login'])) {
    header("Location: ../admin/login.php");
    exit;
}

// Bukan owner
if ($_SESSION['role'] != "owner") {
    header("Location: ../admin/login.php");
    exit;
}