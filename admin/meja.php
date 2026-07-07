<?php
require_once "../config/auth.php";
require_once "../config/koneksi.php";

/* ===========================
   AMBIL DATA MEJA
=========================== */

$result = mysqli_query($conn, "
SELECT *
FROM tables
ORDER BY nomor_meja ASC
");

if(!$result){
    die("Query Error : ".mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Warmindo Admin | QR Management</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
        <style>
            body{
            font-family:'Plus Jakarta Sans',sans-serif;
            }

            .material-symbols-outlined{
            font-variation-settings:
            'FILL'0,
            'wght'400,
            'GRAD'0,
            'opsz'24;
            }

            .glass-card{
            background:rgba(255,255,255,.85);
            backdrop-filter:blur(15px);
            border:1px solid rgba(255,255,255,.3);
            transition:.25s;
            }

            .glass-card:hover{
            transform:translateY(-4px);
            box-shadow:0 12px 30px rgba(0,0,0,.08);

        }
    </style>

</head>
<body class="bg-slate-50">
            <!-- SIDEBAR -->
             <aside class="fixed left-0 top-0 w-64 h-screen bg-slate-900 text-white p-6">
                    <h1 class="text-2xl font-bold text-orange-400"> Warmindo Admin </h1>
                    
                      <p class="text-sm opacity-70 mb-8"> Shop Manager </p> <nav class="space-y-2"> 
                    <a href="dashboard.php" class="flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-slate-700">
                    <span class="material-symbols-outlined"> dashboard</span> Dashboard </a>

                     <a href="revenue.php" class="flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-slate-700"> 
                    <span class="material-symbols-outlined"> payments </span> Revenue </a>

                      <a href="meja.php" class="flex items-center gap-2 px-4 py-3 rounded-lg bg-orange-500"> 
                    <span class="material-symbols-outlined">table_restaurant </span> QR Generator </a>

                    <a href="../api/logout.php" class="flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-red-600 mt-8">
                        <span class="material-symbols-outlined">logout</span>
                        Logout
                    </a>
                </nav>
            </aside>

            <!-- CONTENT -->
            <main class="ml-64 p-8">
                <div class="flex justify-between items-center mb-8"> <div>
                    <h2 class="text-3xl font-bold"> QR Code Management </h2>

                     <p class="text-slate-500"> Manage table status & QR Code </p> </div>
                <button onclick="document.getElementById('modal').classList.remove('hidden')" class="bg-orange-500 text-white px-5 py-3 rounded-lg font-semibold"> + New Table </button>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
                <?php while($row = mysqli_fetch_assoc($result)): ?>

            <?php
            $status = $row['status'];
            $warna = ($status == "Kosong")
                ? "bg-green-500"
                : "bg-red-500";
            $icon = ($status == "Kosong")
                ? "check_circle"
                : "restaurant";
            $nomor = $row['nomor_meja'];
            ?>
            <div class="glass-card rounded-2xl p-4">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-orange-600"> Meja <?= $nomor ?></h3>
                <span id="badge<?= $row['id']?>" class="<?= $warna ?> text-white text-xs px-3 py-1 rounded-full"> <?= $status ?> </span>
            </div>


            <!-- QR -->
            <div class="bg-white rounded-xl border p-6 flex justify-center items-center h-48">
                    <?php
                if(!empty($row['qr_code']) && file_exists("../qr/".$row['qr_code'])){ ?>
                    <img src="../qr/<?= $row['qr_code']?>" class="w-40">
                <?php }else{ ?>
                    <span class="material-symbols-outlined text-8xl text-gray-300"> qr_code_2</span>
                <?php } ?>
            </div>


            <div class="mt-4">

            <?php if($status=="Terisi"){ ?>

            <button
            onclick="kosongkanMeja(<?= $row['id']?>)"
            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-xl font-semibold"> Kosongkan Meja
</button>
            <?php }else{ ?> <div class="w-full bg-slate-100 text-center py-3 rounded-xl text-slate-500 font-semibold"> Meja Kosong
            </div>
            <?php } ?>
            </div>


        </div> <!-- Tutup glass-card -->

        <?php endwhile; ?>

    </div> <!-- Tutup grid -->

    <!-- MODAL TAMBAH MEJA -->
    <div id="modal" class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50">
        <div class="bg-white rounded-2xl w-96 p-6 shadow-xl">

            <h2 class="text-2xl font-bold mb-5">
                Tambah Meja
            </h2>

            <label class="block mb-2 font-medium">
                Jumlah Meja Baru
            </label>

            <input
                id="jumlah"
                type="number"
                min="1"
                class="border rounded-xl w-full p-3"
            >

            <div class="flex justify-end gap-3 mt-6">

                <button
                    onclick="document.getElementById('modal').classList.add('hidden')"
                    class="px-5 py-2 rounded-xl border hover:bg-gray-100">
                    Batal
                </button>

                <button
                    onclick="tambahMeja()"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-xl">
                    Tambah
                </button>

            </div>

        </div>
    </div>

<script>

        // ===============================
        // UPDATE STATUS MEJA
        // ===============================

        function kosongkanMeja(id){

            if(!confirm("Yakin ingin mengosongkan meja ini?")){
                return;
            }

            fetch("../api/update_table.php",{
                method:"POST",
                headers:{
                    "Content-Type":"application/x-www-form-urlencoded"
                },
                body:"id="+id+"&status=Kosong"
            })
            .then(res=>res.json())
            .then(data=>{

                if(data.success){

                    alert("Meja berhasil dikosongkan");
                    location.reload();

                }else{

                    alert(data.message || "Gagal mengubah status meja");

                }

            })
            .catch(err=>{
                console.log(err);
                alert("Terjadi kesalahan.");
            });

        }



                // ===============================
                // TAMBAH MEJA
                // ===============================

                function tambahMeja(){
                    let jumlah=document.getElementById("jumlah").value;
                    if(jumlah==""){
                        alert("Masukkan jumlah meja");
                        return;
                    }

                    fetch("../api/tambah_meja.php",{
                        method:"POST",
                        headers:{
                            "Content-Type":"application/x-www-form-urlencoded"
                        },
                        body:"jumlah="+jumlah
                    })

                    .then(res=>res.json())
                    .then(data=>{
                        if(data.success){
                            alert("Meja berhasil ditambahkan");
                            location.reload();
                        }else{
                            alert(data.message);
                        }
                    });
                }
            </script>
        </main>
    </body>
</html>