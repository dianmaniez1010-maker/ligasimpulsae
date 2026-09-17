@extends('layouts.admin')

@push('styles')
<style>
    /* Efek Card 3D Lift pada Hover */
    .stat-card {
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-style: preserve-3d;
    }
    .stat-card:hover {
        transform: translateY(-6px) rotateX(4deg) rotateY(-2deg);
        box-shadow: 0 15px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
    }
</style>
@endpush

@section('content')
<div class="flex min-h-screen bg-slate-50 font-sans">

    <!-- ==================== SIDEBAR ==================== -->
<aside class="w-64 bg-white border-r border-slate-200 p-5 flex flex-col justify-between hidden md:flex shrink-0">
    <div class="space-y-6">
        
        <!-- LOGO HEADER DI SAMPING (Pemkot Batu, Mbatu Sae, Batuversity) -->
        <div class="pb-4 border-b border-slate-100">
            <div class="flex items-center gap-2 mb-3">
                <!-- Logo Kota Batu -->
                <img src="{{ asset('images/logo-kota-batu.png') }}" alt="Pemkot Batu" class="h-6 w-auto max-w-[45px] object-contain">
                
                <!-- Logo Mbatu Sae -->
                <img src="{{ asset('images/batu-sae.png') }}" alt="Mbatu Sae" class="h-5 w-auto max-w-[55px] object-contain">
                
                <!-- Logo Batuversity -->
                <img src="{{ asset('images/batu-versity.png') }}" alt="Batuversity" class="h-5 w-auto max-w-[65px] object-contain border-l border-slate-300 pl-2">
            </div>
            
            <div class="flex items-center gap-2 pt-2">
                <div class="w-7 h-7 bg-emerald-600 rounded-lg flex items-center justify-center text-white font-black text-xs shadow-md shadow-emerald-600/30 shrink-0">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <div>
                    <h1 class="font-bold text-slate-800 text-sm leading-none">SimpulSae</h1>
                    <span class="text-[9px] text-slate-400 block mt-0.5">Desa Terhubung, Masa Depan Tumbuh</span>
                </div>
            </div>
        </div>

        <!-- Menu Navigation -->
        <nav class="space-y-1 text-xs font-semibold text-slate-500">
            <div class="text-[10px] uppercase font-bold text-slate-400 tracking-wider px-3 mb-2">Dashboard</div>
            
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition">
                <i class="fa-solid fa-house text-slate-400 w-4"></i> Beranda
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition">
                <i class="fa-solid fa-building-user text-slate-400 w-4"></i> 24 Desa
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition">
                <i class="fa-solid fa-cubes text-slate-400 w-4"></i> Program
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition">
                <i class="fa-solid fa-trophy text-slate-400 w-4"></i> Liga Desa
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition">
                <i class="fa-solid fa-chart-pie text-slate-400 w-4"></i> Dampak
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition">
                <i class="fa-regular fa-newspaper text-slate-400 w-4"></i> Berita & Cerita
            </a>

            <!-- Kemitraan Menu Group -->
            <div class="pt-2">
                <div class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-emerald-50 text-emerald-700 font-bold">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-handshake text-emerald-600 w-4"></i> Kemitraan
                    </div>
                    <i class="fa-solid fa-chevron-down text-[10px]"></i>
                </div>
                <div class="ml-4 pl-3 border-l border-emerald-200 mt-1 space-y-1">
                    <a href="{{ route('admin.kemitraan.index') }}" class="flex items-center gap-2 px-3 py-2 text-emerald-700 font-bold bg-emerald-100/60 rounded-lg text-xs">
                        <i class="fa-solid fa-circle text-[6px]"></i> Pesan Masuk
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 text-slate-500 hover:text-slate-900 rounded-lg text-xs transition">
                        <i class="fa-solid fa-circle text-[6px] text-slate-300"></i> Kelola Mitra
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 text-slate-500 hover:text-slate-900 rounded-lg text-xs transition">
                        <i class="fa-solid fa-circle text-[6px] text-slate-300"></i> Laporan
                    </a>
                </div>
            </div>

            <div class="text-[10px] uppercase font-bold text-slate-400 tracking-wider px-3 pt-4 mb-2">Pengaturan</div>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition">
                <i class="fa-regular fa-user text-slate-400 w-4"></i> Profil
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-rose-500 hover:bg-rose-50 transition">
                <i class="fa-solid fa-arrow-right-from-bracket w-4"></i> Keluar
            </a>
        </nav>
    </div>

    <!-- Sidebar Footer Badge -->
    <div class="mt-6 rounded-2xl bg-emerald-800/10 p-4 border border-emerald-100 relative overflow-hidden hidden lg:block">
        <i class="fa-solid fa-mountain-sun text-4xl text-emerald-600/20 absolute -bottom-1 -right-1"></i>
        <p class="text-[10px] text-emerald-800 font-semibold relative z-10">Batu Sae Dashboard</p>
        <p class="text-[9px] text-emerald-600 relative z-10">Pemberdayaan Desa Berkelanjutan</p>
    </div>
</aside>

    <!-- ==================== MAIN CONTENT ==================== -->
    <main class="flex-1 p-6 md:p-8 overflow-y-auto">
        
        <!-- TOP HEADER BAR -->
        <header class="flex items-center justify-between gap-4 mb-6">
            <!-- Search Bar -->
            <div class="relative w-full max-w-md">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" placeholder="Cari menu, mitra, program, atau desa..." class="w-full pl-9 pr-4 py-2 bg-white rounded-xl text-xs border border-slate-200 focus:outline-none focus:border-emerald-500 shadow-sm transition">
            </div>

            <!-- Profile & Notification -->
            <div class="flex items-center gap-4">
                <button class="relative p-2 text-slate-400 hover:text-slate-600 transition bg-white rounded-xl border border-slate-200 shadow-sm">
                    <i class="fa-regular fa-bell text-sm"></i>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-rose-500"></span>
                </button>
                <div class="flex items-center gap-3 bg-white p-1.5 pr-3 rounded-xl border border-slate-200 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=200" alt="Admin" class="w-8 h-8 rounded-lg object-cover">
                    <div class="text-left hidden sm:block">
                        <h4 class="text-xs font-bold text-slate-800 leading-tight">Administrator</h4>
                        <p class="text-[10px] text-slate-400">Admin SimpulSae</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- BANNER WELCOME HERO -->
        <div class="relative rounded-3xl overflow-hidden mb-6 shadow-md bg-gradient-to-r from-slate-900/80 via-emerald-950/70 to-transparent min-h-[160px] flex items-center p-6 md:p-8 text-white">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&q=80&w=1200" alt="Hero Mountain" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay -z-10">
            <div class="max-w-xl z-10">
                <p class="text-xs font-medium text-emerald-300 tracking-wide">Selamat Datang,</p>
                <h1 class="text-2xl md:text-3xl font-black mt-0.5 tracking-tight">Administrator</h1>
                <p class="text-xs text-slate-200 mt-1 font-normal leading-relaxed">Pantau, kelola, dan wujudkan kolaborasi desa yang berdampak.</p>
            </div>
        </div>

        <!-- TITLE PAGE & ACTION BUTTON -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-xl font-black text-slate-900">Pesan Kemitraan</h2>
                <p class="text-xs text-slate-500 mt-0.5">Kelola dan pantau semua permintaan kemitraan yang masuk melalui website SimpulSae.</p>
            </div>
            
            <a href="{{ route('admin.kemitraan.export') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs rounded-xl shadow-md shadow-emerald-600/20 transition self-start sm:self-auto">
                <i class="fa-solid fa-file-excel"></i>
                <span>Download Excel</span>
            </a>
        </div>

        <!-- STATISTIC CARDS -->
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
            <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between stat-card">
                <div>
                    <h3 class="text-2xl font-black text-slate-800 count-up" data-target="12">0</h3>
                    <p class="text-[11px] font-semibold text-slate-400 mt-0.5">Total Pesan Masuk</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-base shrink-0">
                    <i class="fa-regular fa-envelope"></i>
                </div>
            </div>

            <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between stat-card">
                <div>
                    <h3 class="text-2xl font-black text-slate-800 count-up" data-target="5">0</h3>
                    <p class="text-[11px] font-semibold text-slate-400 mt-0.5">Menunggu Konfirmasi</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-500 flex items-center justify-center text-base shrink-0">
                    <i class="fa-regular fa-clock"></i>
                </div>
            </div>

            <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between stat-card">
                <div>
                    <h3 class="text-2xl font-black text-slate-800 count-up" data-target="6">0</h3>
                    <p class="text-[11px] font-semibold text-slate-400 mt-0.5">Dalam Proses</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center text-base shrink-0">
                    <i class="fa-regular fa-circle-check"></i>
                </div>
            </div>

            <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between stat-card">
                <div>
                    <h3 class="text-2xl font-black text-slate-800 count-up" data-target="8">0</h3>
                    <p class="text-[11px] font-semibold text-slate-400 mt-0.5">Mitra Bergabung</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-500 flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-users-viewfinder"></i>
                </div>
            </div>

            <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between col-span-2 lg:col-span-1 stat-card">
                <div>
                    <h3 class="text-2xl font-black text-slate-800 count-up" data-target="1">0</h3>
                    <p class="text-[11px] font-semibold text-slate-400 mt-0.5">Ditolak</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-500 flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </div>

        <!-- GRAFIK TREN KEMITRAAN -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm mb-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <i class="fa-solid fa-diagram-project text-xs"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-800">Tren Kemitraan</h3>
                </div>
                <select class="px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-600 font-semibold focus:outline-none focus:border-emerald-500">
                    <option>6 Bulan Terakhir</option>
                    <option>Tahun Ini</option>
                </select>
            </div>
            <div class="w-full h-56">
                <canvas id="trenKemitraanChart"></canvas>
            </div>
        </div>

        <!-- FILTER & SEARCH BAR -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm mb-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="relative w-full md:w-80">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" placeholder="Cari nama mitra, instansi, atau email..." class="w-full pl-9 pr-4 py-2 bg-slate-50 rounded-xl text-xs border border-slate-200 focus:outline-none focus:border-emerald-500 focus:bg-white transition">
            </div>

            <div class="flex flex-wrap md:flex-nowrap items-center gap-3 w-full md:w-auto">
                <div class="flex flex-col gap-1 w-full md:w-auto">
                    <label class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Status</label>
                    <select class="px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-600 focus:outline-none focus:border-emerald-500">
                        <option>Semua Status</option>
                        <option>Mitra Bergabung</option>
                        <option>Dalam Proses</option>
                        <option>Menunggu Konfirmasi</option>
                        <option>Ditolak</option>
                    </select>
                </div>

                <div class="flex flex-col gap-1 w-full md:w-auto">
                    <label class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Jenis Mitra</label>
                    <select class="px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-600 focus:outline-none focus:border-emerald-500">
                        <option>Semua Jenis</option>
                        <option>Perusahaan</option>
                        <option>BUMN</option>
                        <option>Perguruan Tinggi</option>
                        <option>NGO/Komunitas</option>
                        <option>UMKM</option>
                    </select>
                </div>

                <div class="flex flex-col gap-1 w-full md:w-auto">
                    <label class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Periode</label>
                    <select class="px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-600 focus:outline-none focus:border-emerald-500">
                        <option>Pilih periode</option>
                        <option>Bulan Ini</option>
                        <option>Tahun Ini</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- TABLE DATA MITRA LENGKAP -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200/80 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                            <th class="p-4 w-12 text-center">No</th>
                            <th class="p-4">Nama Mitra</th>
                            <th class="p-4">Jenis Mitra</th>
                            <th class="p-4">Bidang / Keahlian</th>
                            <th class="p-4">Tanggal Masuk</th>
                            <th class="p-4">Status</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs">
                        
                        <!-- Row 1 -->
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="p-4 text-center font-semibold text-slate-400">1</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-blue-50 border border-blue-100 flex items-center justify-center font-black text-blue-700 text-xs shrink-0">BRI</div>
                                    <div>
                                        <div class="font-bold text-slate-800">PT Bank Rakyat Indonesia (Persero) Tbk</div>
                                        <div class="text-[11px] text-slate-400">mitra@bri.co.id</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-md bg-sky-50 text-sky-600 font-semibold text-[10px]">Perusahaan</span>
                            </td>
                            <td class="p-4 text-slate-600 font-medium">Finansial & Perbankan</td>
                            <td class="p-4 text-slate-500">
                                <div class="font-semibold text-slate-700">12 Mei 2025</div>
                                <div class="text-[10px] text-slate-400">10:24 WIB</div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-600 font-bold text-[10px] inline-flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Mitra Bergabung
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2 text-slate-400">
                                    <button class="hover:text-emerald-600 p-1 transition"><i class="fa-regular fa-eye"></i></button>
                                    <button class="hover:text-emerald-600 p-1 transition"><i class="fa-solid fa-download"></i></button>
                                    <button class="hover:text-slate-600 p-1 transition"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="p-4 text-center font-semibold text-slate-400">2</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-amber-50 border border-amber-100 flex items-center justify-center font-black text-amber-500 text-xs shrink-0"><i class="fa-solid fa-bolt"></i></div>
                                    <div>
                                        <div class="font-bold text-slate-800">PT PLN (Persero)</div>
                                        <div class="text-[11px] text-slate-400">kemitraan@pln.co.id</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-md bg-purple-50 text-purple-600 font-semibold text-[10px]">BUMN</span>
                            </td>
                            <td class="p-4 text-slate-600 font-medium">Energi & Infrastruktur</td>
                            <td class="p-4 text-slate-500">
                                <div class="font-semibold text-slate-700">10 Mei 2025</div>
                                <div class="text-[10px] text-slate-400">14:32 WIB</div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-600 font-bold text-[10px] inline-flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Dalam Proses
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2 text-slate-400">
                                    <button class="hover:text-emerald-600 p-1 transition"><i class="fa-regular fa-eye"></i></button>
                                    <button class="hover:text-emerald-600 p-1 transition"><i class="fa-solid fa-download"></i></button>
                                    <button class="hover:text-slate-600 p-1 transition"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="p-4 text-center font-semibold text-slate-400">3</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-rose-50 border border-rose-100 flex items-center justify-center font-black text-rose-600 text-[10px] shrink-0">PERTAMINA</div>
                                    <div>
                                        <div class="font-bold text-slate-800">PT Pertamina (Persero)</div>
                                        <div class="text-[11px] text-slate-400">csr@pertamina.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-md bg-sky-50 text-sky-600 font-semibold text-[10px]">Perusahaan</span>
                            </td>
                            <td class="p-4 text-slate-600 font-medium">Energi & Lingkungan</td>
                            <td class="p-4 text-slate-500">
                                <div class="font-semibold text-slate-700">8 Mei 2025</div>
                                <div class="text-[10px] text-slate-400">09:17 WIB</div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full bg-sky-50 text-sky-600 font-bold text-[10px] inline-flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span> Menunggu Konfirmasi
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2 text-slate-400">
                                    <button class="hover:text-emerald-600 p-1 transition"><i class="fa-regular fa-eye"></i></button>
                                    <button class="hover:text-emerald-600 p-1 transition"><i class="fa-solid fa-download"></i></button>
                                    <button class="hover:text-slate-600 p-1 transition"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 4 -->
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="p-4 text-center font-semibold text-slate-400">4</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-blue-900 border border-blue-800 flex items-center justify-center font-black text-white text-xs shrink-0">BCA</div>
                                    <div>
                                        <div class="font-bold text-slate-800">PT Bank Central Asia Tbk</div>
                                        <div class="text-[11px] text-slate-400">corporate@bca.co.id</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-md bg-sky-50 text-sky-600 font-semibold text-[10px]">Perusahaan</span>
                            </td>
                            <td class="p-4 text-slate-600 font-medium">Keuangan & Digitalisasi</td>
                            <td class="p-4 text-slate-500">
                                <div class="font-semibold text-slate-700">5 Mei 2025</div>
                                <div class="text-[10px] text-slate-400">16:03 WIB</div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-600 font-bold text-[10px] inline-flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Mitra Bergabung
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2 text-slate-400">
                                    <button class="hover:text-emerald-600 p-1 transition"><i class="fa-regular fa-eye"></i></button>
                                    <button class="hover:text-emerald-600 p-1 transition"><i class="fa-solid fa-download"></i></button>
                                    <button class="hover:text-slate-600 p-1 transition"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 5 -->
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="p-4 text-center font-semibold text-slate-400">5</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-yellow-50 border border-yellow-200 flex items-center justify-center font-black text-yellow-600 text-[10px] shrink-0">indosat</div>
                                    <div>
                                        <div class="font-bold text-slate-800">PT Indosat Ooredoo Hutchison</div>
                                        <div class="text-[11px] text-slate-400">partnership@indosat.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-md bg-sky-50 text-sky-600 font-semibold text-[10px]">Perusahaan</span>
                            </td>
                            <td class="p-4 text-slate-600 font-medium">Telekomunikasi & Digital</td>
                            <td class="p-4 text-slate-500">
                                <div class="font-semibold text-slate-700">2 Mei 2025</div>
                                <div class="text-[10px] text-slate-400">11:20 WIB</div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-600 font-bold text-[10px] inline-flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Dalam Proses
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2 text-slate-400">
                                    <button class="hover:text-emerald-600 p-1 transition"><i class="fa-regular fa-eye"></i></button>
                                    <button class="hover:text-emerald-600 p-1 transition"><i class="fa-solid fa-download"></i></button>
                                    <button class="hover:text-slate-600 p-1 transition"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- PAGINATION FOOTER -->
            <div class="p-4 bg-white border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500">
                <div>Menampilkan <span class="font-bold text-slate-700">1 - 5</span> dari <span class="font-bold text-slate-700">12</span> data</div>
                <div class="flex items-center gap-1">
                    <button class="w-7 h-7 rounded-lg border border-slate-200 flex items-center justify-center hover:bg-slate-50 disabled:opacity-50" disabled><i class="fa-solid fa-chevron-left text-[10px]"></i></button>
                    <button class="w-7 h-7 rounded-lg bg-emerald-600 text-white font-bold flex items-center justify-center">1</button>
                    <button class="w-7 h-7 rounded-lg hover:bg-slate-100 font-semibold flex items-center justify-center text-slate-600">2</button>
                    <button class="w-7 h-7 rounded-lg border border-slate-200 flex items-center justify-center hover:bg-slate-50"><i class="fa-solid fa-chevron-right text-[10px]"></i></button>
                </div>
            </div>
        </div>

    </main>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Animasi Counter
    const counters = document.querySelectorAll('.count-up');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const duration = 1000;
        const increment = target / (duration / 16);
        let current = 0;
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.innerText = Math.ceil(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.innerText = target;
            }
        };
        updateCounter();
    });

    // 2. Render Chart
    const ctx = document.getElementById('trenKemitraanChart').getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 220);
    gradient.addColorStop(0, 'rgba(16, 185, 129, 0.25)');
    gradient.addColorStop(1, 'rgba(16, 185, 129, 0.0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Nov', 'Des', 'Jan', 'Feb', 'Mar', 'Apr'],
            datasets: [{
                label: 'Jumlah Mitra',
                data: [3, 6, 6.5, 10, 10.5, 17],
                borderColor: '#10b981',
                borderWidth: 2.5,
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#10b981',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false }, ticks: { color: '#94a3b8', font: { size: 11 } } },
                y: { min: 0, max: 20, ticks: { stepSize: 5, color: '#94a3b8', font: { size: 11 } }, grid: { color: '#f1f5f9' } }
            }
        }
    });
});
</script>
@endpush