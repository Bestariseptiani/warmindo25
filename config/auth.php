<?php
session_start();

// Tidak boleh cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

// Belum login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Cek role
if ($_SESSION['role'] == "admin") {

    // tetap di dashboard admin

} elseif ($_SESSION['role'] == "kitchen") {

    header("Location: ../kitchen/dashboard.php");
    exit;

} elseif ($_SESSION['role'] == "owner") {

    header("Location: ../owner/dashboard.php");
    exit;

} else {

    session_destroy();
    header("Location: login.php");
    exit;

}