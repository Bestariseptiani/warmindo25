<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../admin/login.php");
    exit;
}

if ($_SESSION['role'] != "kitchen") {
    header("Location: ../admin/dashboard.php");
    exit;
}
?>