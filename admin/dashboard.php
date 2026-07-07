<?php
require_once "../config/auth.php";
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Warmindo Admin - Order Management</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
<h1 class="font-headline-lg text-headline-lg text-secondary-fixed">Warmindo Admin</h1>
<p class="font-label-sm text-label-sm text-surface-variant/70">Shop Manager</p>
</div>
<nav class="flex-1 space-y-xs">
<a class="flex items-center gap-sm bg-secondary text-on-secondary rounded-lg px-md py-sm my-xs active:translate-x-1 duration-150 transition-all font-label-sm text-label-sm" href="dashboard.php">
<span class="material-symbols-outlined">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-sm text-surface-variant hover:bg-surface-variant/10 rounded-lg px-md py-sm my-xs active:translate-x-1 duration-150 transition-all font-label-sm text-label-sm" href="revenue.php">
<span class="material-symbols-outlined">payments</span>
<span>Revenue</span>
</a>
<a class="flex items-center gap-sm text-surface-variant hover:bg-surface-variant/10 rounded-lg px-md py-sm my-xs active:translate-x-1 duration-150 transition-all font-label-sm text-label-sm" href="meja.php">
<span class="material-symbols-outlined">qr_code</span>
<span>Table & QR</span>
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
<h2 class="font-headline-lg text-headline-lg text-on-background">Live Order Management</h2>
<p class="text-on-surface-variant font-body-md">Manage and track customer orders in real-time.</p>
</div>
<div class="flex items-center gap-md">
<button class="relative p-sm bg-surface-container-high rounded-full hover:bg-surface-container-highest transition-colors active:scale-95">
<span class="material-symbols-outlined text-primary">notifications</span>
<span class="absolute top-0 right-0 w-4 h-4 bg-secondary text-white text-[10px] flex items-center justify-center rounded-full border-2 border-surface" id="notification-badge">0</span>
</button>
<div class="flex items-center gap-sm px-md py-xs bg-white rounded-full shadow-sm border border-outline-variant/30">
<div class="w-8 h-8 rounded-full overflow-hidden bg-primary-container flex items-center justify-center">
<span class="material-symbols-outlined text-on-primary-container text-[18px]">person</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface" id="admin-name">Admin</span>
</div>
</div>
</header>
<div class="grid grid-cols-1 md:grid-cols-4 gap-md">
<div class="kanban-column flex flex-col gap-md bg-error-container/5 p-sm rounded-xl border border-error-container/20">
<div class="flex justify-between items-center px-xs">
<div class="flex items-center gap-xs">
<span class="w-2 h-2 bg-error rounded-full"></span>
<h3 class="font-title-md text-title-md uppercase tracking-wider">Menunggu</h3>
</div>
<span class="bg-surface-container-high px-sm rounded-full text-label-sm" id="pending-count">0</span>
</div>
<div class="flex-1 space-y-md overflow-y-auto" id="pending-orders">
<div class="flex items-center justify-center h-32 opacity-50">
<span class="material-symbols-outlined text-[40px]">hourglass_empty</span>
</div>
</div>
</div>
<div class="kanban-column flex flex-col gap-md bg-primary-container/10 p-sm rounded-xl border border-primary-container/20">
<div class="flex justify-between items-center px-xs">
<div class="flex items-center gap-xs">
<span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
<h3 class="font-title-md text-title-md uppercase tracking-wider">Dibuat</h3>
</div>
<span class="bg-primary-container px-sm rounded-full text-label-sm text-on-primary-container" id="cooking-count">0</span>
</div>
<div class="flex-1 space-y-md overflow-y-auto" id="cooking-orders">
<div class="flex items-center justify-center h-32 opacity-50">
<span class="material-symbols-outlined text-[40px]">soup_kitchen</span>
</div>
</div>
</div>
<div class="kanban-column flex flex-col gap-md bg-tertiary-container/5 p-sm rounded-xl border border-tertiary-container/20">
<div class="flex justify-between items-center px-xs">
<div class="flex items-center gap-xs">
<span class="w-2 h-2 bg-tertiary rounded-full"></span>
<h3 class="font-title-md text-title-md uppercase tracking-wider">Disajikan</h3>
</div>
<span class="bg-tertiary-container px-sm rounded-full text-label-sm text-on-tertiary-container" id="served-count">0</span>
</div>
<div class="flex-1 space-y-md overflow-y-auto" id="served-orders">
<div class="flex items-center justify-center h-32 opacity-50">
<span class="material-symbols-outlined text-[40px]">room_service</span>
</div>
</div>
</div>
<div class="kanban-column flex flex-col gap-md bg-surface-container-high/30 p-sm rounded-xl border border-outline-variant/10">
<div class="flex justify-between items-center px-xs opacity-60">
<div class="flex items-center gap-xs">
<span class="w-2 h-2 bg-on-surface-variant rounded-full"></span>
<h3 class="font-title-md text-title-md uppercase tracking-wider">Selesai</h3>
</div>
<span class="bg-surface-container-highest px-sm rounded-full text-label-sm" id="done-count">0</span>
</div>
<div class="flex-1 space-y-md overflow-y-auto max-h-96" id="done-orders">
<div class="flex items-center justify-center h-32 opacity-50">
<span class="material-symbols-outlined text-[40px]">history</span>
</div>
</div>
</div>
</div>
</main>
<div class="fixed bottom-lg right-lg bg-inverse-surface text-inverse-on-surface px-lg py-md rounded-xl shadow-2xl translate-y-20 opacity-0 transition-all duration-300 flex items-center gap-sm z-[100]" id="toast">
<span class="material-symbols-outlined text-tertiary-fixed">check_circle</span>
<span class="font-label-sm">Order updated successfully</span>
</div>
<script type="module">

document.getElementById("admin-name").textContent = "Admin";

function formatPrice(price) {
    return 'Rp ' + price.toLocaleString('id-ID');
}

function getTimeAgo(dateStr) {
    const diff = Date.now() - new Date(dateStr).getTime();
    const mins = Math.floor(diff / 60000);
    if (mins < 1) return 'Just now';
    if (mins < 60) return `${mins}m ago`;
    const hrs = Math.floor(mins / 60);
    return `${hrs}h ago`;
}

function renderOrderCard(order, status) {
    const items = order.items || [];
    const table = order.tables.nomor_meja
    const tableName =
    order.tables.nomor_meja
    ? `Table #${String(order.tables.nomor_meja).padStart(2,'0')}`
    : "Take Away";

    let borderClass = 'border-error';
    let progressHtml = '';

    if (status === 'cooking') {
        borderClass = 'border-primary';
        progressHtml = `
            <div class="mb-sm">
                <div class="w-full bg-surface-container-high rounded-full h-1.5 overflow-hidden">
                    <div class="bg-primary h-full w-2/3 rounded-full"></div>
                </div>
                <p class="text-[10px] text-primary mt-1 font-bold">SEDANG DIMASAK</p>
            </div>
        `;
    } else if (status === 'served') {
        borderClass = 'border-tertiary';
    }

    return `
        <div class="glass-card p-md rounded-xl shadow-md border-l-4 ${borderClass} hover:shadow-lg transition-shadow">
            <div class="flex justify-between items-start mb-sm">
                <span class="font-bold text-secondary text-lg">${tableName}</span>
                <span class="text-xs text-on-surface-variant flex items-center gap-xs">
                    <span class="material-symbols-outlined text-sm">schedule</span>
                    ${getTimeAgo(order.created_at)}
                </span>
            </div>
            ${progressHtml}
            <ul class="space-y-xs mb-md border-b border-outline-variant/20 pb-sm">
                ${items.map(item => `
                    <li class="flex justify-between text-on-surface">
                        <span class="font-medium"><span class="text-primary font-bold">${item.qty}x</span> ${item.nama_menu || 'Unknown'}</span>
                    </li>
                `).join('')}
            </ul>
            <div class="flex justify-between items-center mb-xs">
                <span class="text-on-surface-variant text-sm">Total:</span>
                <span class="font-bold text-secondary">${formatPrice(order.total)}</span>
            </div>
            <div class="flex gap-xs">
                ${getActionButtons(order, status)}
            </div>
        </div>
    `;
}

function getActionButtons(order, status) {
        if (status === "pending") {
            return `
                <button
                    class="w-full bg-orange-500 text-white py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-orange-600 transition"
                    onclick="updateOrderStatus(${order.id}, 'Diproses')">
                    <span class="material-symbols-outlined">restaurant</span>
                    Masak Sekarang
                </button>
            `;
}  else if (status === "cooking") {
    return `
        <button
            class="w-full bg-green-600 text-white py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-green-700 transition"
            onclick="updateOrderStatus(${order.id}, 'Selesai')">
            <span class="material-symbols-outlined">done_all</span>
            Selesai Masak
        </button>
    `;
}  else if (status === "served") {
    return `
        <button
            class="flex-1 bg-surface-container-highest text-on-surface py-2 rounded-lg"
            onclick="printOrderReceipt(${order.id})">
            <span class="material-symbols-outlined">print</span>
            Print
        </button>

        <button
            class="flex-1 bg-blue-600 text-white py-2 rounded-lg"
            onclick="updateOrderStatus(${order.id}, 'Batal')">
            <span class="material-symbols-outlined">check_circle</span>
            Pesanan Diantar
        </button>
    `;
}
    return '';
}

    window.updateOrderStatus = async function(id, status){
        const res = await fetch("../api/update_order_status.php",{
            method:"POST",
            headers:{
                "Content-Type":"application/x-www-form-urlencoded"
            },
            body:`id=${id}&status=${status}`
        });

        const data = await res.json();
        if(data.success){
            loadOrders();
        }else{
            alert(data.message);
        }
    }

window.printOrderReceipt = async function(orderId){

    const res = await fetch("../api/get_receipt.php?id=" + orderId);
    const data = await res.json();

    if(!data.success){
        alert("Data tidak ditemukan");
        return;
    }

    const order = data.order;
    const items = data.items;

    let htmlItems = "";

    items.forEach(item => {
        htmlItems += `
            <tr>
                <td>${item.qty} x ${item.nama_menu}</td>
                <td style="text-align:right">
                    ${formatPrice(item.subtotal)}
                </td>
            </tr>
        `;
    });

    const printWindow = window.open("", "", "width=400,height=700");

    printWindow.document.write(`
        <html>
        <head>
            <title>Receipt</title>
            <style>
                body{
                    font-family:Arial;
                    padding:20px;
                    font-size:14px;
                }
                h2{
                    text-align:center;
                    margin:0;
                }
                table{
                    width:100%;
                    border-collapse:collapse;
                    margin-top:15px;
                }
                td{
                    padding:5px 0;
                }
                hr{
                    margin:15px 0;
                }
            </style>
        </head>
        <body>

            <h2>WARMINDO</h2>
            <hr>
            <p>
                <b>Order #${order.id}</b><br>
                ${order.customer_name}<br>
                ${order.payment_method}<br>
                ${order.created_at}
            </p>
            <table>
                ${htmlItems}
            </table>

            <hr>

            <table>
                <tr>
                    <td><b>Total</b></td>
                    <td style="text-align:right">
                        <b>${formatPrice(order.total)}</b>
                    </td>
                </tr>
            </table>

            <br>

            <center>Terima kasih 🙏</center>

        </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.focus();
    printWindow.print();

}

function showToast(message) {
    const toast = document.getElementById('toast');
    toast.querySelector('span:last-child').textContent = message;
    toast.classList.remove('translate-y-20', 'opacity-0');
    setTimeout(() => {
        toast.classList.add('translate-y-20', 'opacity-0');
    }, 3000);
}

async function loadOrders(){

    const res=await fetch("../api/get_orders.php");

    const data=await res.json();

    const pending = data.filter(o => o.status === "Pending");
    const cooking = data.filter(o => o.status === "Diproses");
    const served = data.filter(o => o.status === "Selesai");
    const done = data.filter(o => o.status === "Batal");

    renderOrderList("pending-orders",pending,"pending");
    renderOrderList("cooking-orders",cooking,"cooking");
    renderOrderList("served-orders",served,"served");
    renderOrderList("done-orders",done,"done");

    document.getElementById("pending-count").innerHTML=pending.length;
    document.getElementById("cooking-count").innerHTML=cooking.length;
    document.getElementById("served-count").innerHTML=served.length;
    document.getElementById("done-count").innerHTML=done.length;

}

function renderOrderList(containerId, orders, status) {
    const container = document.getElementById(containerId);

    if (orders.length === 0) {
        container.innerHTML = `
            <div class="flex items-center justify-center h-32 opacity-50">
                <span class="material-symbols-outlined text-[40px]">${status === 'pending' ? 'hourglass_empty' : status === 'cooking' ? 'soup_kitchen' : status === 'served' ? 'room_service' : 'history'}</span>
            </div>
        `;
        return;
    }

    container.innerHTML = orders.map(order => renderOrderCard(order, status)).join('');
}
loadOrders();

setInterval(loadOrders,3000);
</script>
</body>
</html>
