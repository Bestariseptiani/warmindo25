<?php

header("Content-Type: application/json");

include "../config/koneksi.php";

$id     = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
$status = isset($_POST["status"]) ? trim($_POST["status"]) : "";

if($id<=0 || $status==""){

    echo json_encode([
        "success"=>false,
        "message"=>"Data tidak lengkap."
    ]);
    exit;

}

mysqli_begin_transaction($conn);

try{

    /*
    ===============================
    MULAI MASAK
    ===============================
    */

    if($status=="Diproses"){

        $sql="
        UPDATE orders
        SET
            status=?,
            cooking_start=NOW(),
            cooking_finish=NULL,
            actual_minutes=NULL,
            eta_result=NULL
        WHERE id=?
        ";

        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"si",$status,$id);

    }

    /*
    ===============================
    SELESAI MASAK
    ===============================
    */

    elseif($status=="Disajikan"){

        /*
        Ambil ETA
        */

        $q=mysqli_query($conn,"
            SELECT
                eta_minutes,
                cooking_start
            FROM orders
            WHERE id=$id
        ");

        $order=mysqli_fetch_assoc($q);

        $eta=(int)$order["eta_minutes"];

        if($eta<=0){
            $eta=10;
        }

        /*
        Hitung aktual
        */

        $start=strtotime($order["cooking_start"]);
        $finish=time();

        $actual=max(1,floor(($finish-$start)/60));

        /*
        Tentukan hasil
        */

        if($actual<$eta){

            $result="Lebih Cepat";

        }elseif($actual==$eta){

            $result="Tepat Waktu";

        }else{

            $result="Terlambat";

        }

        /*
        Simpan semuanya
        */

        $sql="
        UPDATE orders
        SET
            status=?,
            cooking_finish=NOW(),
            actual_minutes=?,
            eta_result=?
        WHERE id=?
        ";

        $stmt=mysqli_prepare($conn,$sql);

        mysqli_stmt_bind_param(
            $stmt,
            "sisi",
            $status,
            $actual,
            $result,
            $id
        );

    }

    /*
    ===============================
    STATUS LAIN
    ===============================
    */

    else{

        $sql="
        UPDATE orders
        SET status=?
        WHERE id=?
        ";

        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"si",$status,$id);

    }

    if(!mysqli_stmt_execute($stmt)){
        throw new Exception(mysqli_error($conn));
    }

    mysqli_commit($conn);

    echo json_encode([
        "success"=>true,
        "message"=>"Status berhasil diperbarui."
    ]);

}catch(Exception $e){

    mysqli_rollback($conn);

    echo json_encode([
        "success"=>false,
        "message"=>$e->getMessage()
    ]);

}