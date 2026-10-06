<?php

header("Content-Type: application/json");
include "../config/koneksi.php";

$sql = "
SELECT
    o.id,
    o.customer_name,
    o.payment_method,
    o.total,
    o.status,
    o.order_time AS created_at,

    o.cooking_start,
    o.cooking_finish,
    o.actual_minutes,
    o.eta_minutes,
    o.eta_result,

    t.nomor_meja

FROM orders o

LEFT JOIN tables t
ON o.table_id = t.id

ORDER BY o.id DESC
";

$result = mysqli_query($conn,$sql);

if(!$result){

    echo json_encode([
        "success"=>false,
        "message"=>mysqli_error($conn)
    ]);
    exit;

}

$orders=[];

while($row=mysqli_fetch_assoc($result)){

    $orderId=(int)$row["id"];

    $items=[];

    $itemSql="
    SELECT
        oi.quantity AS qty,
        oi.price,
        oi.subtotal,
        m.nama_menu

    FROM order_items oi

    LEFT JOIN menu m
    ON oi.menu_id=m.id

    WHERE oi.order_id=$orderId
    ";

    $itemResult=mysqli_query($conn,$itemSql);

    while($item=mysqli_fetch_assoc($itemResult)){

        $items[]=[

            "qty"=>(int)$item["qty"],
            "price"=>(int)$item["price"],
            "subtotal"=>(int)$item["subtotal"],
            "nama_menu"=>$item["nama_menu"]

        ];

    }

    // ===========================
    // ETA
    // ===========================

    $eta = (int)$row["eta_minutes"];

    if($eta<=0){
        $eta=10;
    }

    // ===========================
    // Hitung waktu aktual
    // ===========================

    $actual=0;

    if(!empty($row["cooking_start"])){

        $start=strtotime($row["cooking_start"]);

        if(!empty($row["cooking_finish"])){

            $finish=strtotime($row["cooking_finish"]);

        }else{

            // jika masih dimasak maka realtime
            $finish=time();

        }

        $actual=max(0,floor(($finish-$start)/60));

    }

    // ===========================
    // Tentukan hasil ETA
    // ===========================

    $etaResult="-";
    $difference=0;

    if($actual<$eta){

        $etaResult="Lebih Cepat";
        $difference=$eta-$actual;

    }elseif($actual==$eta){

        $etaResult="Tepat Waktu";

    }else{

        $etaResult="Terlambat";
        $difference=$actual-$eta;

    }

    $orders[]=[

        "id"=>$orderId,

        "customer_name"=>$row["customer_name"],

        "payment_method"=>$row["payment_method"],

        "total"=>(int)$row["total"],

        "status"=>$row["status"],

        "created_at"=>$row["created_at"],

        "eta"=>$eta,

        "actual_minutes"=>$actual,

        "difference"=>$difference,

        "eta_result"=>$etaResult,

        "cooking_start"=>$row["cooking_start"],

        "cooking_finish"=>$row["cooking_finish"],

        "tables"=>[
            "nomor_meja"=>$row["nomor_meja"]
        ],

        "items"=>$items

    ];

}

echo json_encode($orders);