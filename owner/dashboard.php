<?php
require_once "../config/auth_owner.php";
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Owner</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "error": "#ba1a1a",
        "on-background": "#001f29",
        "surface-variant": "#c6e8f8",
        "tertiary": "#006a60",
        "on-primary-fixed-variant": "#6f3800",
        "on-tertiary": "#ffffff",
        "surface-dim": "#bedfef",
        "on-secondary-fixed-variant": "#83260e",
        "surface-container-high": "#ccedfe",
        "primary": "#8e4e14",
        "surface-container": "#d8f2ff",
        "tertiary-container": "#5cc6b7",
        "surface-container-low": "#e6f6ff",
        "inverse-surface": "#123441",
        "on-tertiary-container": "#005048",
        "surface-container-lowest": "#ffffff",
        "on-tertiary-fixed-variant": "#005048",
        "secondary": "#a33d23",
        "outline-variant": "#d8c2b5",
        "inverse-primary": "#ffb780",
        "on-surface-variant": "#534439",
        "on-error-container": "#93000a",
        "surface": "#f3faff",
        "outline": "#867468",
        "primary-fixed-dim": "#ffb780",
        "surface-tint": "#8e4e14",
        "tertiary-fixed": "#8cf5e4",
        "background": "#f3faff",
        "surface-container-highest": "#c6e8f8",
        "inverse-on-surface": "#dff4ff",
        "on-primary-container": "#6f3800",
        "primary-container": "#f4a261",
        "on-secondary-container": "#731a04",
        "on-error": "#ffffff",
        "on-primary-fixed": "#2f1400",
        "secondary-fixed": "#ffdad2",
        "secondary-container": "#ff8162",
        "on-surface": "#001f29",
        "primary-fixed": "#ffdcc4",
        "surface-bright": "#f3faff",
        "error-container": "#ffdad6",
        "on-secondary-fixed": "#3c0700",
        "on-primary": "#ffffff",
        "tertiary-fixed-dim": "#6fd8c8",
        "secondary-fixed-dim": "#ffb4a2",
        "on-secondary": "#ffffff",
        "on-tertiary-fixed": "#00201c",
        "secondary-fixed-dim": "#ffb4a2"
      },
      borderRadius: {
        DEFAULT: "0.25rem",
        lg: "0.5rem",
        xl: "0.75rem",
        full: "9999px"
      },
      spacing: {
        base: "8px",
        "container-max": "1280px",
        lg: "48px",
        md: "24px",
        sm: "12px",
        xl: "80px",
        xs: "4px",
        gutter: "24px"
      },
      fontFamily: {
        "label-sm": ["Plus Jakarta Sans"],
        "body-md": ["Plus Jakarta Sans"],
        "headline-lg": ["Plus Jakarta Sans"],
        "headline-lg-mobile": ["Plus Jakarta Sans"],
        "body-lg": ["Plus Jakarta Sans"],
        "title-md": ["Plus Jakarta Sans"],
        "display-lg": ["Plus Jakarta Sans"]
      },
      fontSize: {
        "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
        "headline-lg": ["32px", {"lineHeight": "40px", "fontWeight": "700"}],
        "headline-lg-mobile": ["28px", {"lineHeight": "36px", "fontWeight": "700"}],
        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
        "title-md": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
        "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800"}]
      }
    }
  }
}
</script>
<style>
.material-symbols-outlined {
  font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
.kanban-column {
  min-height: calc(100vh - 180px);
}
.glass-card {
  background: rgba(255, 255, 255, 0.85);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}
::-webkit-scrollbar {
  width: 6px;
}
::-webkit-scrollbar-track {
  background: transparent;
}
::-webkit-scrollbar-thumb {
  background: #d8c2b5;
  border-radius: 10px;
}
.admin-sidebar {
  background-color: #001f29;
}
</style>
</head>
<body class="bg-surface text-on-surface font-body-md min-h-screen flex">
<aside class="admin-sidebar fixed left-0 top-0 h-full w-64 flex flex-col p-md space-y-sm shadow-xl z-50">
<div class="mb-lg px-md">
<h1 class="font-headline-lg text-headline-lg text-secondary-fixed">Warmindo Owner</h1>
<p class="font-label-sm text-label-sm text-surface-variant/70">Business Dashboard</p>
</div>
<nav class="flex-1 space-y-xs">

<a class="flex items-center gap-sm bg-secondary text-on-secondary rounded-lg px-md py-sm my-xs font-label-sm"
href="dashboard.php">
<span class="material-symbols-outlined">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-sm text-surface-variant hover:bg-surface-variant/10 rounded-lg px-md py-sm my-xs font-label-sm"
href="evaluation.php">
<span class="material-symbols-outlined">monitoring</span>
<span>Evaluasi Kitchen</span>
</a>
</nav>
<div class="pt-md border-t border-surface-variant/10">
<a class="flex items-center gap-sm text-surface-variant hover:bg-error/10 hover:text-error rounded-lg px-md py-sm transition-all active:translate-x-1 duration-150" href="../api/logout.php">
<span class="material-symbols-outlined">logout</span>
<span class="font-label-sm text-label-sm">Logout</span>
</a>
</div>
</aside>
<main class="ml-64 flex-1 p-md">
<header class="flex justify-between items-center mb-lg">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-background">Dashboard Owner </h2>
<p class="text-on-surface-variant font-body-md"> Pantau pendapatan serta performa operasional Warmindo.</p>
</div>
<div class="flex items-center gap-md">
<div class="flex items-center gap-sm px-md py-xs bg-white rounded-full shadow-sm border border-outline-variant/30">
<div class="w-8 h-8 rounded-full overflow-hidden bg-primary-container flex items-center justify-center">
<span class="material-symbols-outlined text-on-primary-container text-[18px]">person</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface" id="admin-name"> Owner </span>
</div>
</div>
</header>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
<div class="bg-white rounded-xl shadow p-5">
    <p class="text-gray-500">Pendapatan Hari Ini</p>
    <h2 class="text-3xl font-bold text-green-600" id="today-income">
        Rp 0
    </h2>
</div>
<div class="bg-white rounded-xl shadow p-5">
    <p class="text-gray-500">Pendapatan Bulan Ini</p>
    <h2 class="text-3xl font-bold text-blue-600" id="month-income">
        Rp 0
    </h2>
</div>
<div class="bg-white rounded-xl shadow p-5">
    <p class="text-gray-500">Pendapatan Tahun Ini</p>
    <h2 class="text-3xl font-bold text-orange-600" id="year-income">
        Rp 0
    </h2>
</div>
<div class="bg-white rounded-xl shadow p-5">
    <p class="text-gray-500">Total Order</p>
    <h2 class="text-3xl font-bold text-purple-600" id="total-order">
        0
    </h2>
</div>
</div>

<div class="bg-white rounded-xl shadow mt-6 overflow-hidden">

    <div class="flex justify-between items-center p-6 border-b">

        <div>
            <h2 class="text-3xl font-bold">
                Transaction History
            </h2>

            <p class="text-gray-500">
                View and manage all customer transaction history.
            </p>
        </div>

        <div class="flex gap-3">

            <select id="filter-period"
                class="border rounded-lg px-4 py-2">
                <option value="day">Daily</option>
                <option value="month" selected>Monthly</option>
                <option value="year">Yearly</option>
            </select>

            <select id="filter-month"
                class="border rounded-lg px-4 py-2">

                <option value="">All</option>
                <option value="0">Januari</option>
                <option value="1">Februari</option>
                <option value="2">Maret</option>
                <option value="3">April</option>
                <option value="4">Mei</option>
                <option value="5">Juni</option>
                <option value="6">Juli</option>
                <option value="7">Agustus</option>
                <option value="8">September</option>
                <option value="9">Oktober</option>
                <option value="10">November</option>
                <option value="11">Desember</option>

            </select>

        </div>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-orange-50">

            <tr>

                <th class="p-4 text-left">DATE & TIME</th>
                <th class="p-4">ORDER ID</th>
                <th class="p-4">TABLE</th>
                <th class="p-4 text-left">ITEMS</th>
                <th class="p-4">AMOUNT</th>
                <th class="p-4">RECEIPT</th>

            </tr>

            </thead>

            <tbody id="historyTable">

            </tbody>

        </table>

    </div>

</div>

<div class="bg-white rounded-xl shadow p-6 mt-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">
            Grafik Pendapatan
        </h2>
        <select id="filter-chart"
        class="border rounded-lg px-3 py-2">
            <option value="day">Harian</option>
            <option value="month">Bulanan</option>
            <option value="year">Tahunan</option>
        </select>
    </div>
    <div style="height:350px;">
        <canvas id="incomeChart"></canvas>
    </div>
</div>
</main>

<div class="fixed bottom-lg right-lg bg-inverse-surface text-inverse-on-surface px-lg py-md rounded-xl shadow-2xl translate-y-20 opacity-0 transition-all duration-300 flex items-center gap-sm z-[100]" id="toast">
<span class="material-symbols-outlined text-tertiary-fixed">check_circle</span>
<span class="font-label-sm">Order updated successfully</span>
</div>
</div>
<script>

function formatPrice(price){
    return "Rp " + Number(price).toLocaleString("id-ID");
}

async function loadDashboard(){
    try{
        const response = await fetch("../api/get_revenue.php");
        const data = await response.json();

        const filter = document.getElementById("filter-chart").value;

            const labels = [];
            const values = [];
            if(filter=="day"){
                const group={};
                data.forEach(item=>{
                    const d=new Date(item.order_time);
                    const key=d.toLocaleDateString("id-ID");
                    group[key]=(group[key]||0)+parseInt(item.total);

                });
                Object.keys(group).forEach(key=>{
                    labels.push(key);
                    values.push(group[key]);
                });
            }else if(filter=="month"){
                const group={};
                data.forEach(item=>{
                    const d=new Date(item.order_time);
                    const key=d.toLocaleString("id-ID",{
                        month:"long",
                        year:"numeric"
                    });
                    group[key]=(group[key]||0)+parseInt(item.total);
                });
                Object.keys(group).forEach(key=>{
                    labels.push(key);
                    values.push(group[key]);
                });
            }else{
                const group={};
                data.forEach(item=>{
                    const d=new Date(item.order_time);
                    const key=d.getFullYear();
                    group[key]=(group[key]||0)+parseInt(item.total);
                });
                Object.keys(group).forEach(key=>{
                    labels.push(key);
                    values.push(group[key]);
                });
            }

        let todayIncome = 0;
        let monthIncome = 0;
        let yearIncome = 0;

        const now = new Date();
        data.forEach(order=>{
            const total = parseInt(order.total) || 0;
            const date = new Date(order.order_time);
            // Hari ini
            if(
                date.getDate() === now.getDate() &&
                date.getMonth() === now.getMonth() &&
                date.getFullYear() === now.getFullYear()
            ){
                todayIncome += total;
            }
            // Bulan ini
            if(
                date.getMonth() === now.getMonth() &&
                date.getFullYear() === now.getFullYear()
            ){
                monthIncome += total;
            }
            // Tahun ini
            if(
                date.getFullYear() === now.getFullYear()
            ){
                yearIncome += total;
            }

        });

        document.getElementById("today-income").innerHTML =
            formatPrice(todayIncome);

        document.getElementById("month-income").innerHTML =
            formatPrice(monthIncome);

        document.getElementById("year-income").innerHTML =
            formatPrice(yearIncome);

        document.getElementById("total-order").innerHTML =
            data.length;
            
            const period = document.getElementById("filter-period").value;
const month = document.getElementById("filter-month").value;

let html = "";

data.forEach(order=>{

    const date = new Date(order.order_time);

    let tampil = true;

    if(period=="day"){

        const today = new Date();

        tampil =
            date.getDate()==today.getDate() &&
            date.getMonth()==today.getMonth() &&
            date.getFullYear()==today.getFullYear();

    }

    if(period=="month" && month!=""){

        tampil = date.getMonth()==parseInt(month);

    }

    if(period=="year"){

        tampil = date.getFullYear()==new Date().getFullYear();

    }

    if(!tampil) return;

    html += `

    <tr class="border-b hover:bg-gray-50">

        <td class="p-3">
            ${new Date(order.order_time).toLocaleString("id-ID")}
        </td>

        <td>#${order.id}</td>

        <td>${order.nomor_meja}</td>

        <td>${order.items ?? "-"}</td>

        <td class="font-semibold">
            ${formatPrice(order.total)}
        </td>

        <td class="text-center">
            📄
        </td>

    </tr>
    `;

});

document.getElementById("filter-period")
.addEventListener("change",function(){

    const bulan=document.getElementById("filter-month");

    bulan.disabled=this.value!="month";

});

document.getElementById("historyTable").innerHTML = html;

            const ctx = document.getElementById("incomeChart").getContext("2d");

if(incomeChart){
    incomeChart.destroy();
}

incomeChart = new Chart(ctx,{
    type:"line",
    data:{
        labels:labels,
        datasets:[{
            label:"Pendapatan",
            data:values,
            borderColor:"#f97316",
            backgroundColor:"rgba(249,115,22,.15)",
            fill:true,
            tension:0.4,
            borderWidth:3,
            pointRadius:4
        }]
    },
    options:{
        responsive:true,
        maintainAspectRatio:false,
        plugins:{
            legend:{
                display:false
            }
        },
        scales:{
            y:{
                beginAtZero:true
            }
        }
    }
});

    }catch(err){

        console.log(err);

    }

}



loadDashboard();

setInterval(loadDashboard,5000);
document.getElementById("filter-chart")
.addEventListener("change",loadDashboard);
document.getElementById("filter-period")
.addEventListener("change",loadDashboard);

document.getElementById("filter-month")
.addEventListener("change",loadDashboard);
let incomeChart;
</script>
</body>
</html>
