<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SimpulSae</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-10">

    <!-- Container Card Login -->
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 border border-slate-100 min-h-[640px]">
        
        <!-- SISI KIRI: Background & Info Banner -->
        <div class="lg:col-span-7 relative p-8 sm:p-12 flex flex-col justify-between text-white overflow-hidden bg-emerald-950 min-h-[400px] lg:min-h-full">
            <!-- Background Image dengan Overlay Gradient -->
            <img src="{{ asset('images/hero-7.png') }}" 
                 alt="Pemandangan Alam SimpulSae" 
                 class="absolute inset-0 w-full h-full object-cover object-center opacity-40">
            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/90 via-emerald-950/40 to-emerald-900/60"></div>

            <!-- Logo Sisi Kiri -->
            <div class="relative z-10 flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-500/80 backdrop-blur-md rounded-xl flex items-center justify-center text-white text-lg">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <div>
                    <h2 class="font-extrabold text-xl tracking-tight leading-none text-white">SimpulSae</h2>
                    <p class="text-[10px] text-emerald-200 mt-0.5">Desa Tumbuh, Masa Depan Tumbuh</p>
                </div>
            </div>

            <!-- Konten Teks Sisi Kiri -->
            <div class="relative z-10 my-auto py-8">
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight leading-tight mb-3">
                    Selamat Datang,<br>
                    <span class="text-emerald-300">Admin SimpulSae</span>
                </h1>
                <p class="text-slate-200 text-xs sm:text-sm max-w-md leading-relaxed mb-8">
                    Masuk ke dashboard admin untuk mengelola kemitraan, program, dan data desa secara terpadu.
                </p>

                <!-- Feature Items -->
                <div class="space-y-5 max-w-md">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-md flex items-center justify-center text-emerald-300 shrink-0 text-sm border border-white/10">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xs sm:text-sm text-white">Kelola Mitra</h4>
                            <p class="text-[11px] text-slate-300 leading-snug">Pantau dan kelola mitra kolaborasi SimpulSae.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-md flex items-center justify-center text-emerald-300 shrink-0 text-sm border border-white/10">
                            <i class="fa-regular fa-file-lines"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xs sm:text-sm text-white">Pantau Program</h4>
                            <p class="text-[11px] text-slate-300 leading-snug">Kelola program dan progres implementasi di 24 desa.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-md flex items-center justify-center text-emerald-300 shrink-0 text-sm border border-white/10">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xs sm:text-sm text-white">Lihat Dampak</h4>
                            <p class="text-[11px] text-slate-300 leading-snug">Akses data dampak dan laporan secara real-time.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hiasan Ornamen Daun (Bawah Kiri) -->
            <div class="relative z-10 pointer-events-none opacity-20">
                <i class="fa-solid fa-seedling text-6xl text-emerald-300"></i>
            </div>
        </div>

        <!-- SISI KANAN: Form Login -->
        <div class="lg:col-span-5 p-8 sm:p-12 flex flex-col justify-between bg-white relative">
            
            <div class="w-full max-w-sm mx-auto my-auto">
                <!-- Logo Top Center (Kanan) -->
                <div class="flex flex-col items-center text-center mb-8">
                    <div class="flex items-center gap-2 mb-1">
                        <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center text-white text-base">
                            <i class="fa-solid fa-leaf"></i>
                        </div>
                        <span class="font-bold text-xl text-slate-800 tracking-tight">SimpulSae</span>
                    </div>
                    <span class="text-[10px] text-slate-400">Desa Tumbuh, Masa Depan Tumbuh</span>

                    <h2 class="text-xl font-extrabold text-slate-800 mt-6">Login Admin</h2>
                    <p class="text-xs text-slate-400 mt-1">Silakan masuk dengan akun Anda untuk melanjutkan ke dashboard.</p>
                </div>

                <!-- Session Alert / Notification -->
                @if(session('error'))
                    <div class="mb-4 p-3 rounded-xl bg-red-50 border border-red-200 text-red-600 text-xs text-center font-medium">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Form Login -->
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Input Email/Username -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-slate-700 mb-1.5">Email atau Username</label>
                        <div class="relative">
                            <i class="fa-regular fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                                   placeholder="Masukkan email atau username" 
                                   class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-emerald-500 focus:bg-white transition">
                        </div>
                        @error('email')
                            <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Password -->
                    <div>
                        <label for="password" class="block text-xs font-bold text-slate-700 mb-1.5">Password</label>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                            <input type="password" id="password" name="password" required
                                   placeholder="Masukkan password" 
                                   class="w-full pl-9 pr-10 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-emerald-500 focus:bg-white transition">
                            <button type="button" onclick="togglePassword()" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 text-xs">
                                <i class="fa-regular fa-eye-slash" id="eyeIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Checkbox & Lupa Password -->
                    <div class="flex items-center justify-between text-xs pt-1">
                        <label class="flex items-center gap-2 cursor-pointer text-slate-500 text-[11px]">
                            <input type="checkbox" name="remember" class="w-3.5 h-3.5 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span>Ingat saya</span>
                        </label>
                        <a href="#" class="text-[11px] font-bold text-emerald-600 hover:underline">Lupa password?</a>
                    </div>

                    <!-- Tombol Masuk -->
                    <button type="submit" 
                            class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-lg shadow-emerald-600/20 transition flex items-center justify-center gap-2 mt-2">
                        <span>Masuk</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-6 text-center">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                    <span class="relative px-3 bg-white text-[10px] text-slate-400">atau</span>
                </div>

                <!-- Google Login Option -->
                <button type="button" 
                        class="w-full py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 font-semibold text-xs rounded-xl transition flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                    </svg>
                    <span>Login dengan Google</span>
                </button>
            </div>

            <!-- Footer Hiasan (Peta Desa Transparan) -->
            <div class="absolute bottom-0 right-0 left-0 pointer-events-none opacity-10 flex justify-center overflow-hidden">
                <i class="fa-solid fa-city text-9xl text-emerald-800 -mb-6"></i>
            </div>
        </div>
    </div>

    <!-- Script Toggle Password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
</body>
</html>