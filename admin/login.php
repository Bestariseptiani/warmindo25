
<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Warmindo Admin Portal | Login</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "on-primary-fixed": "#2f1400",
        "surface-container-lowest": "#ffffff",
        "background": "#f3faff",
        "on-error": "#ffffff",
        "on-secondary": "#ffffff",
        "on-primary": "#ffffff",
        "inverse-on-surface": "#dff4ff",
        "tertiary-fixed": "#8cf5e4",
        "surface-container-highest": "#c6e8f8",
        "surface-dim": "#bedfef",
        "surface": "#f3faff",
        "tertiary": "#006a60",
        "surface-container": "#d8f2ff",
        "surface-tint": "#8e4e14",
        "secondary-fixed": "#ffdad2",
        "on-tertiary-fixed-variant": "#005048",
        "on-surface": "#001f29",
        "on-secondary-fixed": "#3c0700",
        "inverse-primary": "#ffb780",
        "on-secondary-container": "#731a04",
        "on-tertiary-fixed": "#00201c",
        "on-surface-variant": "#534439",
        "outline-variant": "#d8c2b5",
        "on-background": "#001f29",
        "primary-fixed": "#ffdcc4",
        "primary-container": "#f4a261",
        "surface-variant": "#c6e8f8",
        "surface-container-high": "#ccedfe",
        "error-container": "#ffdad6",
        "secondary-container": "#ff8162",
        "secondary": "#a33d23",
        "on-tertiary-container": "#005048",
        "error": "#ba1a1a",
        "tertiary-fixed-dim": "#6fd8c8",
        "inverse-surface": "#123441",
        "on-primary-container": "#6f3800",
        "surface-container-low": "#e6f6ff",
        "on-primary-fixed-variant": "#6f3800",
        "tertiary-container": "#5cc6b7",
        "primary": "#8e4e14",
        "on-secondary-fixed-variant": "#83260e",
        "surface-bright": "#f3faff",
        "outline": "#867468",
        "on-tertiary": "#ffffff",
        "primary-fixed-dim": "#ffb780",
        "on-error-container": "#93000a",
        "secondary-fixed-dim": "#ffb4a2"
      },
      borderRadius: {
        DEFAULT: "0.25rem",
        lg: "0.5rem",
        xl: "0.75rem",
        full: "9999px"
      },
      spacing: {
        md: "24px",
        sm: "12px",
        lg: "48px",
        xs: "4px",
        gutter: "24px",
        "container-max": "1280px",
        base: "8px",
        xl: "80px"
      },
      fontFamily: {
        "body-lg": ["Plus Jakarta Sans"],
        "title-md": ["Plus Jakarta Sans"],
        "display-lg": ["Plus Jakarta Sans"],
        "headline-lg-mobile": ["Plus Jakarta Sans"],
        "headline-lg": ["Plus Jakarta Sans"],
        "body-md": ["Plus Jakarta Sans"],
        "label-sm": ["Plus Jakarta Sans"]
      },
      fontSize: {
        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
        "title-md": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
        "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800"}],
        "headline-lg-mobile": ["28px", {"lineHeight": "36px", "fontWeight": "700"}],
        "headline-lg": ["32px", {"lineHeight": "40px", "fontWeight": "700"}],
        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
        "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}]
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
  background: rgba(255, 255, 255, 0.85);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}
.noodle-gradient {
  background: linear-gradient(135deg, #8e4e14 0%, #a33d23 100%);
}
</style>
</head>
<body class="bg-background text-on-background min-h-screen flex items-center justify-center font-body-md overflow-hidden">
<div class="flex h-screen w-screen overflow-hidden">
<div class="hidden lg:block lg:w-3/5 relative overflow-hidden h-full">
<div class="absolute inset-0 z-10 bg-gradient-to-r from-transparent to-background/20"></div>
<div class="absolute inset-0 w-full h-full" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBFV5LGYkxFBIf7q3c9TOiPWsHVm7JlVPZrE_omlPn88-9Mj8CtPnUf9nD6TYnEapUDq2-KixSXJDllY6ofnvr4SPal_NonqjhYLHlYvn96NTzRJdrkRO4YXWseaSuvRUcuFFQUkjCdG43OntwcXNcGmNRTgsOnZVatnYCYPg8TaghHHukaobmoylIulcjPZZJUvqXzbLx4f_8amYkEb-2zyrrGlyRbqGDQyfpmErY0kLHqWyp6WhAQzaqp-N_OnK-VN-alDog_nKw'); background-size: cover; background-position: center;"></div>
<div class="absolute bottom-xl left-xl z-20 max-w-md">
<div class="bg-on-background/10 backdrop-blur-md p-md rounded-xl border border-white/20">
<h2 class="font-display-lg text-display-lg text-surface-container-lowest mb-sm">Mastering the Aroma.</h2>
<p class="font-body-lg text-body-lg text-surface-container-lowest/90">Efficiently managing your shop's heartbeat, from fresh noodles to happy customers.</p>
</div>
</div>
</div>
<div class="w-full lg:w-2/5 flex flex-col items-center justify-center p-md lg:p-xl relative bg-background">
<div class="w-full max-w-md flex flex-col">
<div class="mb-lg text-center lg:text-left">
<div class="inline-flex items-center gap-xs mb-sm">
<span class="material-symbols-outlined text-secondary font-black text-4xl">table_restaurant</span>
<span class="font-display-lg text-headline-lg text-on-background tracking-tight">Warmindo <span class="text-secondary">Admin</span></span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-background mb-xs">Welcome Back, Manager</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Sign in to your dashboard to manage orders.</p>
</div>
<form class="space-y-md" id="login-form" method="POST">
<div class="space-y-xs">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block" for="username">Username or Email</label>
<div class="relative group">
<span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline group-focus-within:text-secondary transition-colors">person</span>
<input class="w-full pl-[52px] pr-md py-sm bg-surface-container-low border-2 border-transparent rounded-xl focus:border-secondary focus:ring-0 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-outline-variant font-body-md" id="username" placeholder="admin" type="text" required/>
</div>
</div>
<div class="space-y-xs">
<div class="flex justify-between items-center">
<label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider" for="password">Password</label>
</div>
<div class="relative group">
<span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline group-focus-within:text-secondary transition-colors">lock</span>
<input class="w-full pl-[52px] pr-[52px] py-sm bg-surface-container-low border-2 border-transparent rounded-xl focus:border-secondary focus:ring-0 focus:bg-surface-container-lowest transition-all text-on-surface placeholder:text-outline-variant font-body-md" id="password" placeholder="Enter password" type="password" required/>
<button class="absolute right-md top-1/2 -translate-y-1/2 text-outline hover:text-on-surface" type="button" onclick="togglePassword()">
<span class="material-symbols-outlined" id="toggle-icon">visibility</span>
</button>
</div>
</div>
<div class="flex items-center gap-sm">
<input class="w-5 h-5 rounded border-outline-variant text-secondary focus:ring-secondary cursor-pointer" id="remember" type="checkbox"/>
<label class="font-body-md text-body-md text-on-surface-variant cursor-pointer select-none" for="remember">Remember this device</label>
</div>
<div id="error-message" class="hidden bg-error-container text-on-error-container px-md py-sm rounded-xl flex items-center gap-sm">
<span class="material-symbols-outlined">error</span>
<span class="font-label-sm">Username atau password salah!</span>
</div>
<button class="w-full noodle-gradient text-on-secondary font-title-md text-title-md py-sm rounded-xl shadow-lg shadow-secondary/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-sm mt-lg" type="submit" id="submit-btn">
<span id="btn-text">Login to Dashboard</span>
<span class="material-symbols-outlined" id="btn-icon">arrow_forward</span>
</button>
</form>
<div class="mt-xl flex flex-col items-center gap-sm">
<p class="font-label-sm text-label-sm text-on-surface-variant/60">Powered by Warmindo 2024</p>
<div class="flex gap-md">
<a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Security Policy</a>
<a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Contact Support</a>
</div>
</div>
</div>
<div class="absolute top-0 right-0 p-lg opacity-20 pointer-events-none">
<span class="material-symbols-outlined text-[120px] text-secondary-container">restaurant_menu</span>
</div>
</div>
</div>
<div class="fixed inset-0 -z-10 pointer-events-none opacity-[0.03]">
<svg height="100%" width="100%">
<pattern height="40" id="pattern-grid" patternunits="userSpaceOnUse" width="40" x="0" y="0">
<path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1"></path>
</pattern>
<rect fill="url(#pattern-grid)" height="100%" width="100%"></rect>
</svg>
</div>
<script>
const form = document.getElementById("login-form");
const errorDiv = document.getElementById("error-message");

window.togglePassword = function () {
    const passwordInput = document.getElementById("password");
    const toggleIcon = document.getElementById("toggle-icon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.textContent = "visibility_off";
    } else {
        passwordInput.type = "password";
        toggleIcon.textContent = "visibility";
    }
};

form.addEventListener("submit", async function(e){

    e.preventDefault();

    const username=document.getElementById("username").value;
    const password=document.getElementById("password").value;

    const response=await fetch("../api/login.php",{
        method:"POST",
        headers:{
            "Content-Type":"application/json"
        },
        body:JSON.stringify({
            username:username,
            password:password
        })
    });

    const result=await response.json();

    if(result.success){

        window.location.href="dashboard.php";

    }else{

        errorDiv.classList.remove("hidden");

    }

});
</script>
</body>
</html>
