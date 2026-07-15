<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Warmindo Admin - Revenue & Reports</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
        "on-tertiary-fixed": "#00201c"
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
.glass-card {
  background: rgba(255, 255, 255, 0.8);
  -webkit-backdrop-filter: blur(12px);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}
.chart-bar {
  transition: height 1s cubic-bezier(0.4, 0, 0.2, 1);
}
::-webkit-scrollbar {
  width: 8px;
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
<body class="bg-background text-on-background font-body-md min-h-screen flex overflow-hidden">
<aside class="admin-sidebar fixed left-0 top-0 h-full w-64 flex flex-col p-md space-y-sm shadow-xl z-50">
<div class="mb-lg px-md">
<h1 class="font-headline-lg text-headline-lg text-secondary-fixed">Warmindo Admin</h1>
<p class="font-label-sm text-label-sm text-surface-variant/70">Shop Manager</p>
</div>
<nav class="flex-1 space-y-xs">
<a class="flex items-center gap-sm text-surface-variant hover:bg-surface-variant/10 rounded-lg px-md py-sm my-xs transition-all active:translate-x-1 duration-150 font-label-sm text-label-sm" href="dashboard.php">
<span class="material-symbols-outlined">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-sm bg-secondary text-on-secondary rounded-lg px-md py-sm my-xs transition-all active:translate-x-1 duration-150 font-label-sm text-label-sm" href="revenue.php">
<span class="material-symbols-outlined">payments</span>
<span>Revenue</span>
</a>
<a class="flex items-center gap-sm text-surface-variant hover:bg-surface-variant/10 rounded-lg px-md py-sm my-xs transition-all active:translate-x-1 duration-150 font-label-sm text-label-sm" href="meja.php">
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
<main class="ml-64 flex-1 h-screen overflow-y-auto bg-surface-container-low">
<header class="sticky top-0 z-40 bg-surface/80 backdrop-blur-md px-lg py-md border-b border-outline-variant/30 flex justify-between items-center">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Revenue & Reports</h2>
<p class="text-on-surface-variant font-body-md">Real-time overview of your shop's performance</p>
</div>
<div class="flex items-center gap-md">
<button class="bg-primary text-on-primary px-md py-sm rounded-xl font-label-sm text-label-sm flex items-center gap-xs shadow-md active:scale-95 transition-transform" onclick="exportReport()">
<span class="material-symbols-outlined text-[18px]">download</span>
Export Report
</button>
</div>
</header>
<div class="p-lg max-w-container-max mx-auto space-y-lg">

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- Today's Revenue -->
        <div class="bg-white rounded-2xl shadow-md border-l-4 border-green-500 p-6 hover:shadow-xl transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Today's Revenue</p>
                    <h2 id="daily-revenue" class="text-3xl font-bold text-green-600 mt-2">
                        Rp 0
                    </h2>
                </div>

                <div class="bg-green-100 p-3 rounded-full">
                    <span class="material-symbols-outlined text-green-600">
                        payments
                    </span>
                </div>
            </div>
        </div>

        <!-- Monthly Revenue -->
        <div class="bg-white rounded-2xl shadow-md border-l-4 border-blue-500 p-6 hover:shadow-xl transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Monthly Revenue</p>
                    <h2 id="monthly-revenue" class="text-3xl font-bold text-blue-600 mt-2">
                        Rp 0
                    </h2>
                </div>

                <div class="bg-blue-100 p-3 rounded-full">
                    <span class="material-symbols-outlined text-blue-600">
                        calendar_month
                    </span>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-white rounded-2xl shadow-md border-l-4 border-purple-500 p-6 hover:shadow-xl transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total Revenue</p>
                    <h2 id="total-revenue" class="text-3xl font-bold text-purple-600 mt-2">
                        Rp 0
                    </h2>
                </div>

                <div class="bg-purple-100 p-3 rounded-full">
                    <span class="material-symbols-outlined text-purple-600">
                        account_balance_wallet
                    </span>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="bg-white rounded-2xl shadow-md border-l-4 border-orange-500 p-6 hover:shadow-xl transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Completed Orders</p>
                    <h2 id="total-orders" class="text-3xl font-bold text-orange-600 mt-2">
                        0
                    </h2>
                </div>

                <div class="bg-orange-100 p-3 rounded-full">
                    <span class="material-symbols-outlined text-orange-600">
                        shopping_bag
                    </span>
                </div>
            </div>
        </div>

    </div>

<div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 px-6 py-5 bg-gray-50 border-b">

        <div>
            <h2 class="text-xl font-bold text-gray-800">
                Transaction History
            </h2>
            <p class="text-sm text-gray-500">
                Semua riwayat transaksi pelanggan
            </p>
        </div>

        <div class="flex items-center gap-3">
            <select id="period-filter"
                    class="px-4 py-2 rounded-xl border border-gray-300">
                <option value="day">Per Day</option>
                <option value="month">Per Month</option>
                <option value="year">Per Year</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto px-5 py-5">

        <table class="min-w-full">

            <thead>

                <tr class="bg-orange-50 text-gray-700 uppercase text-sm">

                    <th class="px-6 py-4 text-left rounded-l-xl">
                        Date & Time
                    </th>

                    <th class="px-6 py-4 text-left">
                        Order ID
                    </th>

                    <th class="px-6 py-4 text-left">
                        Table
                    </th>

                    <th class="px-6 py-4 text-left">
                        Items
                    </th>

                    <th class="px-6 py-4 text-right">
                        Amount
                    </th>

                    <th class="px-6 py-4 text-center rounded-r-xl">
                        Receipt
                    </th>

                </tr>

            </thead>

            <tbody
                id="transactions-body"
                class="divide-y divide-gray-200">

                <tr>

                    <td colspan="7" class="py-12 text-center text-gray-500">

                        <span class="material-symbols-outlined animate-spin text-3xl mb-2">
                            progress_activity
                        </span>

                        <p>Loading transactions...</p>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

    <!-- Footer -->

    <div class="flex justify-between items-center px-6 py-4 bg-gray-50 border-t">

        <p class="text-sm text-gray-500">

            Showing
            <span id="showing-count" class="font-semibold text-orange-600">
                0
            </span>
            transactions

        </p>

    </div>

</div>
<footer class="w-full mt-auto border-t border-outline-variant/30 bg-surface-container-lowest flex flex-col md:flex-row justify-between items-center px-xl py-md gap-md">
<div class="flex flex-col md:flex-row items-center gap-md">
<span class="font-title-md text-title-md text-primary">Warmindo</span>
<span class="font-label-sm text-label-sm text-on-surface-variant/70">2024 Powered by Warmindo</span>
</div>
<div class="flex gap-md">
<a class="font-label-sm text-label-sm text-on-surface-variant/70 hover:text-secondary transition-colors" href="#">Privacy Policy</a>
<a class="font-label-sm text-label-sm text-on-surface-variant/70 hover:text-secondary transition-colors" href="#">Terms of Service</a>
</div>
</footer>
</main>
<div class="fixed inset-0 z-[100] flex items-center justify-center p-md hidden" id="receipt-modal">
<div class="absolute inset-0 bg-on-background/40 backdrop-blur-sm" onclick="closeReceipt()"></div>
<div class="relative w-full max-w-md mx-auto" id="receipt-modal-content"></div>
</div>
<script type="module">

function formatPrice(price) {
    return 'Rp ' + price.toLocaleString('id-ID');
}

async function loadTransactions() {
    try {

        const response = await fetch("../api/get_revenue.php");
        const data = await response.json();

        const filter = document.getElementById("period-filter").value;
        const now = new Date();
        let transaksi = data.filter(item=>{
            const t = new Date(item.order_time);
            if(filter==="day"){
                return t.getDate()===now.getDate()
                    && t.getMonth()===now.getMonth()
                    && t.getFullYear()===now.getFullYear();
            }

            if(filter==="month"){
                return t.getMonth()===now.getMonth()
                    && t.getFullYear()===now.getFullYear();
            }

            if(filter==="year"){
                return t.getFullYear()===now.getFullYear();
            }
            return true;
        });

        const tbody = document.getElementById("transactions-body");
        document.getElementById("showing-count").textContent = transaksi.length;

        if (transaksi.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center py-5">
                        Tidak ada transaksi
                    </td>
                </tr>
            `;

            document.getElementById("daily-revenue").textContent = "Rp 0";
            document.getElementById("monthly-revenue").textContent = "Rp 0";
            document.getElementById("total-orders").textContent = data.length;
            return;
        }

        let dailyRevenue = 0;
        let monthlyRevenue = 0;
        let totalRevenue = 0;

        const today = new Date();
        data.forEach(item => {
            const amount = parseInt(item.total) || 0;
            const t = new Date(item.order_time);

            // Total semua transaksi
            totalRevenue += amount;

            // Pendapatan hari ini
            if (
                t.getDate() === today.getDate() &&
                t.getMonth() === today.getMonth() &&
                t.getFullYear() === today.getFullYear()
            ) {
                dailyRevenue += amount;
            }

            // Pendapatan bulan ini
            if (
                t.getMonth() === today.getMonth() &&
                t.getFullYear() === today.getFullYear()
            ) {
                monthlyRevenue += amount;
            }
        });

        document.getElementById("daily-revenue").textContent =
            formatPrice(dailyRevenue);
        document.getElementById("monthly-revenue").textContent =
            formatPrice(monthlyRevenue);
        document.getElementById("total-revenue").textContent =
            formatPrice(totalRevenue);
        document.getElementById("total-orders").textContent =
            transaksi.length;


        tbody.innerHTML = transaksi.map((item,index)=>`
            <tr>
                <td>${new Date(item.order_time).toLocaleString("id-ID")}</td>
                <td>#${index + 1}</td>
                <td>${item.nomor_meja ? "Meja " + item.nomor_meja : "-"}</td>
                <td>${item.items ?? "-"}</td>
                <td class="text-right">${formatPrice(parseInt(item.total))}</td>
                <td class="text-center">
                    <button onclick="previewReceipt(${item.id})">🧾</button>
                </td>
            </tr>
        `).join("");

    } catch (err) {
        console.error(err);
    }
}

        window.previewReceipt = async function(orderId){
            try{
                const response = await fetch("../api/get_receipt.php?id=" + orderId);
                const data = await response.json();
                    if(!data.success){
                        alert(data.message);
                        return;
                    }
                const subtotal = data.items.reduce((total,item)=>{
                    return total + parseInt(item.subtotal);
                },0);

                    const tax = Math.round(subtotal * 0.10);
                    const service = 2000;
                    const total = subtotal + tax + service;
                    const modalContent = document.getElementById("receipt-modal-content");

                modalContent.innerHTML = `

        <div class="bg-white rounded-xl overflow-hidden shadow-xl">
            <div class="p-5">
                <h2 class="text-2xl font-bold text-center">
                    Warmindo 25
                </h2>
                <p class="text-center text-gray-500 mb-4">
                    Receipt
                </p>
                <hr class="mb-4">
                <p><b>Order :</b> #${data.order.id}</p>
                <p><b>Meja :</b> ${data.order.nomor_meja}</p>
                <p><b>Customer :</b> ${data.order.customer_name}</p>
                <p><b>Pembayaran :</b> ${data.order.payment_method}</p>
                <p><b>Status :</b> ${data.order.status}</p>
                <p><b>Waktu :</b> ${new Date(data.order.order_time).toLocaleString("id-ID")}</p>
              
                <hr class="my-4">
                ${data.items.map(item=>`
                    <div class="flex justify-between py-1">
                        <span>${item.qty} x ${item.nama_menu}</span>
                        <span>${formatPrice(item.subtotal)}</span>
                    </div>
                `).join("")}

                <hr class="my-4">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span>${formatPrice(subtotal)}</span>
                </div>
                <div class="flex justify-between">
                    <span>Pajak (10%)</span>
                    <span>${formatPrice(tax)}</span>
                </div>

                <div class="flex justify-between">
                    <span>Service</span>
                    <span>${formatPrice(service)}</span>
                </div>

                <hr class="my-3">
                <div class="flex justify-between font-bold text-xl">
                    <span>Total</span>
                    <span>${formatPrice(total)}</span>
                </div>

                <div class="flex gap-3 mt-6">
                    <button
                        onclick="window.print()"
                        class="flex-1 bg-blue-600 text-white rounded-lg py-2">
                        Print
                    </button>

                    <button
                        onclick="closeReceipt()"
                        class="flex-1 bg-red-600 text-white rounded-lg py-2">

                        Close

                    </button>

                </div>

            </div>

        </div>

        `;

                document.getElementById("receipt-modal").classList.remove("hidden");

            }catch(err){

                console.error(err);
                alert("Gagal mengambil receipt.");

            }

        }
window.closeReceipt = function() {
    document.getElementById('receipt-modal').classList.add('hidden');
};

window.exportReport = function() {
    alert('Exporting revenue report...');
};

document.getElementById("period-filter").addEventListener("change",loadTransactions);

setInterval(loadTransactions,3000);

loadTransactions();
</script>
</body>
</html>
