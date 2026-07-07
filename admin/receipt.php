  <!DOCTYPE html>
  <html class="light" lang="en">
  <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Warmindo - Your Order Receipt</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
  <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "error": "#ba1a1a",
                    "on-background": "#001f29",
                    "surface-variant": "#c6e8f8",
                    "tertiary": "#006a60",
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
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "base": "8px",
                    "container-max": "1280px",
                    "lg": "48px",
                    "md": "24px",
                    "sm": "12px",
                    "xl": "80px",
                    "xs": "4px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "label-sm": ["Plus Jakarta Sans"],
                    "body-md": ["Plus Jakarta Sans"],
                    "headline-lg": ["Plus Jakarta Sans"],
                    "headline-lg-mobile": ["Plus Jakarta Sans"],
                    "body-lg": ["Plus Jakarta Sans"],
                    "title-md": ["Plus Jakarta Sans"],
                    "display-lg": ["Plus Jakarta Sans"]
            },
            "fontSize": {
                    "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "fontWeight": "700"}],
                    "headline-lg-mobile": ["28px", {"lineHeight": "36px", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "title-md": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                    "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800"}]
            }
          },
        },
      }
    </script>
  <style>
      .glass {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 8px 32px 0 rgba(142, 78, 20, 0.08);
      }
      .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }
      @media print {
        .no-print { display: none; }
        body { background: white; }
        .glass { box-shadow: none; border: 1px solid #eee; background: white; }
      }
    </style>
  </head>
  <body class="bg-background text-on-background font-body-md min-h-screen flex flex-col items-center justify-center p-md">
  <main class="w-full max-w-md mx-auto space-y-md">
  <div class="text-center space-y-sm pb-sm">
  <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-tertiary-container/30 text-tertiary mb-xs">
  <span class="material-symbols-outlined !text-[48px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
  </div>
  <h1 class="font-headline-lg-mobile text-headline-lg-mobile md:font-headline-lg md:text-headline-lg text-on-surface">Order Placed!</h1>
  <p class="font-body-md text-on-surface-variant">We've received your order. Dig in soon!</p>
  </div>
  <div class="glass rounded-xl overflow-hidden relative">
  <div class="h-2 w-full bg-gradient-to-r from-primary to-secondary"></div>
  <div class="p-md space-y-md">
  <div class="flex justify-between items-start">
  <div class="space-y-xs">
  <h2 class="font-display-lg text-title-md font-black text-secondary uppercase tracking-tight">Warmindo</h2>
  <p class="font-label-sm text-label-sm text-on-surface-variant opacity-70">Authentic Comfort Food</p>
  </div>
  <div class="text-right">
  <p class="font-label-sm text-label-sm text-on-surface-variant uppercase">Order ID</p>
  <p class="font-title-md text-title-md font-bold text-on-surface" id="order-id">#WRM-0000</p>
  </div>
  </div>
  <div class="grid grid-cols-2 gap-sm py-sm border-y border-outline-variant/30">
  <div>
  <p class="font-label-sm text-label-sm text-on-surface-variant uppercase">Table Number</p>
  <p class="font-body-lg text-body-lg font-bold text-on-surface">Table 12</p>
  </div>
  <div class="text-right">
  <p class="font-label-sm text-label-sm text-on-surface-variant uppercase">Date & Time</p>
  <p class="font-body-md text-body-md text-on-surface" id="order-date">-</p>
  </div>
  </div>
  <div class="space-y-sm" id="receipt-items"></div>
  <div class="pt-md border-t border-dashed border-outline-variant">
  <div class="flex justify-between items-center mb-xs">
  <span class="font-body-md text-on-surface-variant">Subtotal</span>
  <span class="font-body-md text-on-surface" id="receipt-subtotal">Rp 0</span>
  </div>
  <div class="flex justify-between items-center mb-xs" id="discount-row" style="display:none;">
  <span class="font-body-md text-tertiary">Discount</span>
  <span class="font-body-md text-tertiary" id="receipt-discount">- Rp 0</span>
  </div>
  <div class="flex justify-between items-center mb-xs">
  <span class="font-body-md text-on-surface-variant">Tax (10%)</span>
  <span class="font-body-md text-on-surface" id="receipt-tax">Rp 0</span>
  </div>
  <div class="flex justify-between items-center mb-xs">
  <span class="font-body-md text-on-surface-variant">Service Fee</span>
  <span class="font-body-md text-on-surface" id="receipt-service">Rp 2.000</span>
  </div>
  <div class="flex justify-between items-center">
  <span class="font-title-md text-title-md font-bold text-on-surface">Total</span>
  <span class="font-title-md text-title-md font-extrabold text-secondary" id="receipt-total">Rp 0</span>
  </div>
  </div>
  </div>
  <div class="flex justify-center items-center py-md bg-surface-container-low/50">
  <div class="text-center space-y-xs">
  <p class="font-label-sm text-label-sm text-on-surface-variant" id="payment-method-label">Paid via QRIS</p>
  <div class="flex justify-center gap-xs opacity-40">
  <span class="material-symbols-outlined !text-[20px]">barcode_scanner</span>
  <span class="material-symbols-outlined !text-[20px]">contactless</span>
  </div>
  </div>
  </div>
  </div>
  <div class="no-print space-y-sm pt-sm">
  <button class="w-full py-md px-lg bg-gradient-to-r from-secondary to-primary text-on-secondary rounded-xl font-title-md text-title-md shadow-lg shadow-secondary/20 flex items-center justify-center gap-sm active:scale-[0.98] transition-transform duration-150" onclick="window.location.href='../index.html'">
  <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">restaurant_menu</span>
          Order More
        </button>
  <div class="flex gap-sm">
  <button class="flex-1 py-sm px-md border-2 border-secondary text-secondary rounded-xl font-label-sm text-label-sm flex items-center justify-center gap-xs hover:bg-secondary/5 transition-colors" onclick="window.print()">
  <span class="material-symbols-outlined !text-[18px]">print</span>
            Print Receipt
          </button>
  <button class="flex-1 py-sm px-md border-2 border-outline-variant text-on-surface-variant rounded-xl font-label-sm text-label-sm flex items-center justify-center gap-xs hover:bg-surface-variant/20 transition-colors" onclick="shareReceipt()">
  <span class="material-symbols-outlined !text-[18px]">share</span>
            Share
          </button>
  </div>
  </div>
  <footer class="no-print text-center pt-md">
  <p class="font-label-sm text-label-sm text-on-surface-variant/60">
          Need help? <a class="text-primary underline font-bold" href="#">Contact Staff</a> or
          visit <a class="text-primary underline font-bold" href="#">Support</a>
  </p>
  <p class="font-label-sm text-label-sm text-on-surface-variant/40 mt-sm">Powered by Warmindo</p>
  </footer>
  </main>
  <script>
  const SERVICE_CHARGE = 2000;
  const TAX_RATE = 0.10;
  
  function formatPrice(price) {
      return 'Rp ' + price.toLocaleString('id-ID');
  }
  
  function loadReceiptData() {
      const data = localStorage.getItem('warmindo_receipt');
      if (!data) {
          window.location.href = '../index.html';
          return;
      }
      const receipt = JSON.parse(data);
      localStorage.removeItem('warmindo_receipt');
  
      document.getElementById('order-id').textContent = receipt.orderId;
      document.getElementById('order-date').textContent = receipt.date;
  
      const itemsContainer = document.getElementById('receipt-items');
      itemsContainer.innerHTML = receipt.items.map(item => `
          <div class="flex justify-between items-center py-xs">
              <div class="flex items-center gap-sm">
                  <span class="font-bold text-primary">${item.qty}x</span>
                  <span class="font-body-md text-on-surface">${item.name}</span>
              </div>
              <span class="font-body-md font-medium text-on-surface">${formatPrice(item.price * item.qty)}</span>
          </div>
      `).join('');
  
      document.getElementById('receipt-subtotal').textContent = formatPrice(receipt.subtotal);
  
      if (receipt.discountAmount > 0) {
          document.getElementById('discount-row').style.display = 'flex';
          document.getElementById('receipt-discount').textContent = '- ' + formatPrice(receipt.discountAmount);
      }
  
      document.getElementById('receipt-tax').textContent = formatPrice(receipt.tax);
      document.getElementById('receipt-total').textContent = formatPrice(receipt.total);
  
      const methodLabels = {
          qris: 'Paid via QRIS / E-Wallet',
          bank: 'Paid via Bank Transfer',
          cash: 'Paid at Cashier'
      };
      document.getElementById('payment-method-label').textContent = methodLabels[receipt.paymentMethod] || 'Paid';
  }
  
  function shareReceipt() {
      if (navigator.share) {
          navigator.share({
              title: 'Warmindo Receipt',
              text: `Order ${document.getElementById('order-id').textContent} - ${document.getElementById('receipt-total').textContent}`,
              url: window.location.href
          }).catch(() => {});
      } else {
          navigator.clipboard.writeText(window.location.href).then(() => {
              alert('Receipt link copied to clipboard!');
          });
      }
  }
  
  window.onload = loadReceiptData;
  </script>
  </body>
  </html>
