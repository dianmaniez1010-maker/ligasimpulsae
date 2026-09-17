@extends('layouts.app')

@section('title', 'Liga Desa - Kompetisi Inovasi Antar Desa Kota Batu')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        corePlugins: { preflight: false },
        theme: {
            extend: {
                colors: {
                    brand: {
                        50: '#e6f7f2', 100: '#c0ebd9', 500: '#0d9488',
                        600: '#05845c', 700: '#046a4a', 800: '#035239', 900: '#023c2a',
                    }
                },
                fontFamily: { handwritten: ['"Caveat"', 'cursive'] }
            }
        }
    }
</script>

<style>
    @keyframes floatSlow {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-12px) rotate(1.5deg); }
    }
    .animate-float { animation: floatSlow 4s ease-in-out infinite; }
    @keyframes subtlePan {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    .animate-bg-pan { animation: subtlePan 20s ease-in-out infinite; }
</style>
@endpush

@section('content')
<div class="w-full bg-slate-50 text-slate-800">

    <!-- HERO BANNER SECTION (Liga Desa) -->
<div class="relative w-full overflow-hidden bg-slate-800 min-h-[480px] lg:min-h-[520px] flex items-center justify-between shadow-md">
    
    <!-- Background Image & Overlay -->
    <img src="{{ asset('images/hero all.png') }}" 
         alt="Pemandangan Alam Kota Batu" 
         onclick="zoomImage(this.src)"
         onerror="this.src='https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=1600';"
         class="absolute inset-0 w-full h-full object-cover object-center opacity-90 hover:scale-105 transition-all duration-700 cursor-zoom-in">

    <!-- Gradient Overlay Cerah & Halus -->
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/80 via-slate-900/40 to-transparent pointer-events-none"></div>

    <!-- Konten Utama Hero -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            
            <!-- Kolom Teks -->
            <div class="lg:col-span-7 space-y-4 text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-slate-900/60 border border-white/20 text-emerald-300 text-xs font-semibold backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Kompetisi Inovasi Desa 2025/2026
                </div>
                
                <h1 class="text-4xl sm:text-5xl font-black tracking-tight text-white leading-tight drop-shadow-md">
                    Liga Desa
                </h1>
                
                <h2 class="text-xl sm:text-2xl font-bold text-emerald-300 -mt-1 drop-shadow-sm">
                    Kompetisi Inovasi Antar Desa
                </h2>
                
                <p class="text-slate-200 text-sm sm:text-base leading-relaxed max-w-lg font-normal drop-shadow-sm">
                    24 desa, 5 kategori, 1 tujuan. Mendorong inovasi, kolaborasi, dan dampak nyata untuk masa depan desa yang lebih baik.
                </p>
                
                <div class="pt-2">
                    <a href="#peringkat-section" onclick="scrollToLeaderboard()" class="inline-flex items-center gap-2.5 px-6 py-3 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm shadow-xl transition-all no-underline">
                        <span>Lihat Ranking</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Kolom Visual Piala & Handwriting -->
            <div class="lg:col-span-5 relative flex flex-col items-center justify-center">
                <div class="absolute -top-4 right-2 sm:right-6 z-20 pointer-events-none transform rotate-[-6deg]">
                    <p class="font-handwritten text-2xl sm:text-3xl lg:text-4xl text-amber-300 drop-shadow-[0_2px_8px_rgba(0,0,0,0.9)] leading-tight text-right">
                        Desa Hebat,<br>Inovasi Kuat,<br>Dampak Nyata
                    </p>
                </div>
                
                <div class="relative mt-6 lg:mt-0 w-48 h-48 sm:w-64 sm:h-64 flex items-center justify-center">
                    <div class="absolute w-44 h-44 rounded-full bg-emerald-500/20 blur-2xl animate-pulse"></div>
                    <div class="relative z-10 animate-float flex flex-col items-center">
                        <svg class="w-36 h-36 sm:w-48 sm:h-48 filter drop-shadow-[0_12px_20px_rgba(0,0,0,0.6)]" viewBox="0 0 24 24" fill="none">
                            <path d="M12 15C15.866 15 19 11.866 19 8V3H5V8C5 11.866 8.13401 15 12 15Z" fill="url(#trophyGradient)"/>
                            <path d="M5 5H2V7C2 9.20914 3.79086 11 6 11V9.17071C5.39726 8.64817 5 7.86987 5 7V5Z" fill="#F59E0B"/>
                            <path d="M19 5H22V7C22 9.20914 20.2091 11 18 11V9.17071C18.6027 8.64817 19 7.86987 19 7V5Z" fill="#F59E0B"/>
                            <path d="M12 15V18" stroke="#D97706" stroke-width="2.5" stroke-linecap="round"/>
                            <path d="M8 21H16" stroke="#D97706" stroke-width="3" stroke-linecap="round"/>
                            <path d="M8 18H16L17 21H7L8 18Z" fill="#B45309"/>
                            <circle cx="12" cy="8" r="2.5" fill="#FEF3C7"/>
                            <defs>
                                <linearGradient id="trophyGradient" x1="5" y1="3" x2="19" y2="15" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FBBF24"/><stop offset="0.5" stop-color="#F59E0B"/><stop offset="1" stop-color="#D97706"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Wave / Gelombang Bawah Halaman -->
    <div class="absolute bottom-0 inset-x-0 w-full overflow-hidden leading-none z-10 pointer-events-none">
        <svg class="relative block w-full h-12 sm:h-16 text-slate-50" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z" fill="currentColor"></path>
        </svg>
    </div>
</div>

    <!-- CONTAINER KONTEN LIGA DESA -->
    <main class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-16">

        <!-- KATEGORI PENILAIAN -->
        <section id="kategori" class="space-y-6">
            <div class="text-left">
                <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Kategori Penilaian</h3>
                <p class="text-slate-500 text-sm sm:text-base mt-1">Desa dinilai berdasarkan 5 kategori utama yang mencerminkan potensi dan dampak.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-5">
                <div onclick="filterByCategory('potensi')" class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all cursor-pointer relative overflow-hidden text-center">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-emerald-500"></div>
                    <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl"><i class="fa-solid fa-seedling"></i></div>
                    <h4 class="font-bold text-slate-900 text-base mb-1">Potensi Lokal</h4>
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-xs mb-3">20%</span>
                    <p class="text-slate-500 text-xs leading-relaxed">Pertanian, perikanan, pariwisata</p>
                </div>
                <div onclick="filterByCategory('digital')" class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all cursor-pointer relative overflow-hidden text-center">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-sky-500"></div>
                    <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center text-2xl"><i class="fa-solid fa-laptop-code"></i></div>
                    <h4 class="font-bold text-slate-900 text-base mb-1">Inovasi Digital</h4>
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-sky-50 text-sky-700 font-extrabold text-xs mb-3">20%</span>
                    <p class="text-slate-500 text-xs leading-relaxed">Teknologi, pelayanan digital</p>
                </div>
                <div onclick="filterByCategory('ekonomi')" class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all cursor-pointer relative overflow-hidden text-center">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-amber-500"></div>
                    <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-2xl"><i class="fa-solid fa-chart-line"></i></div>
                    <h4 class="font-bold text-slate-900 text-base mb-1">Dampak Ekonomi</h4>
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-700 font-extrabold text-xs mb-3">20%</span>
                    <p class="text-slate-500 text-xs leading-relaxed">UMKM, lapangan kerja</p>
                </div>
                <div onclick="filterByCategory('sosial')" class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all cursor-pointer relative overflow-hidden text-center">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-purple-500"></div>
                    <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-2xl"><i class="fa-solid fa-users"></i></div>
                    <h4 class="font-bold text-slate-900 text-base mb-1">Dampak Sosial</h4>
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-purple-50 text-purple-700 font-extrabold text-xs mb-3">20%</span>
                    <p class="text-slate-500 text-xs leading-relaxed">Pendidikan, kesehatan</p>
                </div>
                <div onclick="filterByCategory('sustainability')" class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all cursor-pointer relative overflow-hidden text-center">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-emerald-600"></div>
                    <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl"><i class="fa-solid fa-leaf"></i></div>
                    <h4 class="font-bold text-slate-900 text-base mb-1">Sustainability</h4>
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 font-extrabold text-xs mb-3">20%</span>
                    <p class="text-slate-500 text-xs leading-relaxed">Lingkungan & energi</p>
                </div>
            </div>
        </section>

        <!-- SECTION: PERINGKAT SEMENTARA -->
        <section id="peringkat-section" class="space-y-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Peringkat Sementara</h3>
                    <p id="leaderboardSubtext" class="text-slate-500 text-sm mt-1">Klasemen resmi 24 desa berdasarkan akumulasi skor indikator.</p>
                </div>

                <!-- Filter Kecamatan -->
                <div class="flex flex-wrap items-center gap-1.5 bg-slate-200/60 p-1.5 rounded-xl">
                    <button onclick="filterKecamatan('Semua', this)" class="kec-btn active px-4 py-2 rounded-lg text-xs font-bold bg-brand-600 text-white shadow-sm border-0 cursor-pointer">Semua Desa</button>
                    <button onclick="filterKecamatan('Bumiaji', this)" class="kec-btn px-4 py-2 rounded-lg text-xs font-bold text-slate-600 bg-transparent border-0 cursor-pointer">Kec. Bumiaji</button>
                    <button onclick="filterKecamatan('Batu', this)" class="kec-btn px-4 py-2 rounded-lg text-xs font-bold text-slate-600 bg-transparent border-0 cursor-pointer">Kec. Batu</button>
                    <button onclick="filterKecamatan('Junrejo', this)" class="kec-btn px-4 py-2 rounded-lg text-xs font-bold text-slate-600 bg-transparent border-0 cursor-pointer">Kec. Junrejo</button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- TABEL DESA DENGAN PAGINASI -->
                <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse mb-0">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-100 text-[11px] font-bold uppercase text-slate-400 tracking-wider">
                                    <th class="py-4 px-4 text-center w-16">Pos</th>
                                    <th class="py-4 px-4">Nama Desa</th>
                                    <th class="py-4 px-4">Kecamatan</th>
                                    <th class="py-4 px-4 text-center">Skor</th>
                                    <th class="py-4 px-4 text-center">Tren</th>
                                </tr>
                            </thead>
                            <tbody id="leaderboardTableBody" class="divide-y divide-slate-100 text-xs sm:text-sm">
                                <!-- JS Populated -->
                            </tbody>
                        </table>
                    </div>

                    <!-- BOTTON CONTROLS: PAGINATION NAVIGATION -->
                    <div class="p-4 border-t border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <span id="paginationInfo" class="text-xs text-slate-500 font-medium text-center sm:text-left">
                            Menampilkan 1 - 10 dari 24 Desa
                        </span>

                        <div class="flex items-center gap-2">
                            <button id="btnPrevPage" onclick="changePage(-1)" class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-slate-600 font-bold text-xs shadow-sm cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed transition">
                                <i class="fa-solid fa-chevron-left mr-1"></i> Prev
                            </button>
                            
                            <div id="paginationNumbers" class="flex items-center gap-1">
                                <!-- JS Populated Buttons (1, 2, 3) -->
                            </div>

                            <button id="btnNextPage" onclick="changePage(1)" class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-slate-600 font-bold text-xs shadow-sm cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed transition">
                                Next <i class="fa-solid fa-chevron-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDE WIDGET -->
                <div class="lg:col-span-5 space-y-4">
                    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden group">
                        <div class="relative h-56 sm:h-64 overflow-hidden bg-slate-900">
                            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80" alt="Kick Off Liga Desa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                            <span class="absolute top-3 right-3 px-3 py-1 rounded-full bg-brand-600 text-white text-[10px] font-bold uppercase tracking-wider shadow">Event Highlight</span>
                        </div>
                        <div class="p-6 space-y-4">
                            <h4 class="text-lg font-bold text-slate-900 leading-snug">Kick Off Liga Desa 2025</h4>
                            <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">Saksikan bagaimana 24 desa berkompetisi untuk menunjukkan potensi terbaiknya demi mewujudkan inovasi berkelanjutan di Kota Batu.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
</div>

<!-- MODAL 1: VILLAGE DETAIL & RADAR CHART -->
<div id="villageModal" onclick="handleBackdropClick(event)" class="hidden fixed inset-0 z-[9999] bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden relative my-auto">
        <button type="button" onclick="closeVillageModal()" aria-label="Tutup" class="absolute top-4 right-4 z-50 w-10 h-10 rounded-full bg-slate-900/60 hover:bg-slate-900 text-white flex items-center justify-center border-0 cursor-pointer shadow-lg backdrop-blur-md transition-all">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>

        <div class="relative h-48 bg-slate-900">
            <img id="modalVillageImg" src="" alt="Detail Desa" class="w-full h-full object-cover opacity-80">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
            <div class="absolute bottom-4 left-6 right-16 text-white">
                <span id="modalVillageBadge" class="px-2.5 py-1 rounded-md bg-brand-600 text-xs font-bold shadow-sm">Posisi #1</span>
                <h3 id="modalVillageTitle" class="text-2xl font-extrabold mt-1 mb-0 text-white leading-tight">Desa Punten</h3>
                <p id="modalVillageSub" class="text-xs text-slate-300 m-0 mt-0.5">Kecamatan Bumiaji • Kota Batu</p>
            </div>
        </div>

        <div class="p-6 space-y-6 max-h-[70vh] overflow-y-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                    <h5 class="text-xs font-bold text-slate-500 uppercase tracking-wider text-center mb-2">Breakdown Skor Radar</h5>
                    <div class="w-full h-56 flex items-center justify-center">
                        <canvas id="radarChart"></canvas>
                    </div>
                </div>

                <div class="space-y-3">
                    <h5 class="text-xs font-bold text-slate-500 uppercase tracking-wider">Perolehan Nilai Kategori</h5>
                    <div class="space-y-2 text-xs">
                        <div class="flex justify-between items-center p-2 rounded-lg bg-emerald-50"><span class="font-semibold text-emerald-900"><i class="fa-solid fa-seedling mr-1"></i> Potensi Lokal</span><span id="scorePotensi" class="font-bold text-emerald-700">95 / 100</span></div>
                        <div class="flex justify-between items-center p-2 rounded-lg bg-sky-50"><span class="font-semibold text-sky-900"><i class="fa-solid fa-laptop-code mr-1"></i> Inovasi Digital</span><span id="scoreDigital" class="font-bold text-sky-700">90 / 100</span></div>
                        <div class="flex justify-between items-center p-2 rounded-lg bg-amber-50"><span class="font-semibold text-amber-900"><i class="fa-solid fa-chart-line mr-1"></i> Dampak Ekonomi</span><span id="scoreEkonomi" class="font-bold text-amber-700">92 / 100</span></div>
                        <div class="flex justify-between items-center p-2 rounded-lg bg-purple-50"><span class="font-semibold text-purple-900"><i class="fa-solid fa-users mr-1"></i> Dampak Sosial</span><span id="scoreSosial" class="font-bold text-purple-700">91 / 100</span></div>
                        <div class="flex justify-between items-center p-2 rounded-lg bg-teal-50"><span class="font-semibold text-teal-900"><i class="fa-solid fa-leaf mr-1"></i> Sustainability</span><span id="scoreSustainability" class="font-bold text-teal-700">94 / 100</span></div>
                    </div>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-brand-50 border border-brand-100 space-y-1">
                <span class="text-[10px] font-bold text-brand-700 uppercase tracking-wider">Inovasi Unggulan Desa</span>
                <h6 id="modalProgramName" class="font-bold text-brand-900 text-sm m-0">Wisata Hortikultura & Sistem Smart Irrigation</h6>
                <p id="modalProgramDesc" class="text-slate-600 text-xs leading-relaxed m-0">Pemanfaatan IoT untuk efisiensi pengairan serta integrasi e-commerce hasil tani desa.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Data diambil dinamis dari Controller Laravel & penilaian DB
    let ALL_DESA = @json($desas ?? []);

if (!ALL_DESA || ALL_DESA.length === 0) {
    ALL_DESA = [
        { pos: 1, nama: "Desa Punten", kecamatan: "Bumiaji", skor: 92.5, tren: "+2", isUp: true, potensi: 95, digital: 90, ekonomi: 92, sosial: 91, sustainability: 94, img: "https://via.placeholder.com/800", program: "Agro Cerdas", desc: "Digitalisasi rantai pasok" },
        { pos: 2, nama: "Desa Sumbergondo", kecamatan: "Bumiaji", skor: 89.7, tren: "+1", isUp: true, potensi: 92, digital: 88, ekonomi: 89, sosial: 90, sustainability: 89, img: "https://via.placeholder.com/800", program: "Bank Sampah", desc: "Pengelolaan limbah" },
        { pos: 3, nama: "Desa Bulukerto", kecamatan: "Bumiaji", skor: 87.3, tren: "0", isUp: false, potensi: 85, digital: 80, ekonomi: 88, sosial: 89, sustainability: 86, img: "https://via.placeholder.com/800", program: "Wisata Buah", desc: "Pengembangan petik apel" }
    ];
}

    // PAGINATION VARIABLES
    let currentData = [...ALL_DESA];
    let currentPage = 1;
    const itemsPerPage = 10;
    let radarChartInstance = null;

    document.addEventListener("DOMContentLoaded", function() {
        renderLeaderboardTable();
    });

    function renderLeaderboardTable() {
        const tbody = document.getElementById('leaderboardTableBody');
        if (!tbody) return;
        tbody.innerHTML = '';

        // Hitung Data Terkait Halaman Aktif
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const pageData = currentData.slice(startIndex, endIndex);

        pageData.forEach((d) => {
            const tr = document.createElement('tr');
            tr.className = "hover:bg-brand-50/40 transition-colors cursor-pointer group";
            tr.onclick = () => openVillageModal(d);

            // Badge Posisi Rangking
            let posBadgeHtml = '';
            if (d.pos === 1) {
                posBadgeHtml = `<span class="w-7 h-7 mx-auto rounded-full bg-amber-500 text-white font-black flex items-center justify-center text-xs shadow-md ring-2 ring-amber-200">1</span>`;
            } else if (d.pos === 2) {
                posBadgeHtml = `<span class="w-7 h-7 mx-auto rounded-full bg-slate-400 text-white font-black flex items-center justify-center text-xs shadow-md ring-2 ring-slate-200">2</span>`;
            } else if (d.pos === 3) {
                posBadgeHtml = `<span class="w-7 h-7 mx-auto rounded-full bg-amber-700 text-white font-black flex items-center justify-center text-xs shadow-md ring-2 ring-amber-300">3</span>`;
            } else {
                posBadgeHtml = `<span class="w-7 h-7 mx-auto rounded-full bg-slate-100 text-slate-600 font-bold flex items-center justify-center text-xs">${d.pos}</span>`;
            }

            // Indikator Tren
            const trendColor = d.isUp ? 'text-emerald-600 font-bold' : (d.tren === '0' || !d.tren ? 'text-slate-400' : 'text-rose-500 font-bold');
            const trendIcon = d.isUp ? '▲' : (d.tren === '0' || !d.tren ? '•' : '▼');

            // Format Skor Aman (mencegah error .toFixed jika d.skor bertipe string)
            const formattedSkor = Number(d.skor || 0).toFixed(1);

            tr.innerHTML = `
                <td class="py-3.5 px-4 text-center">${posBadgeHtml}</td>
                <td class="py-3.5 px-4 font-bold text-slate-900 group-hover:text-brand-700 transition-colors">${d.nama}</td>
                <td class="py-3.5 px-4 text-slate-500 font-medium">${d.kecamatan || '-'}</td>
                <td class="py-3.5 px-4 text-center font-extrabold text-slate-900">${formattedSkor}</td>
                <td class="py-3.5 px-4 text-center ${trendColor} text-xs">${trendIcon} ${d.tren || '0'}</td>
            `;

            tbody.appendChild(tr);
        });

        if (typeof updatePaginationControls === 'function') {
            updatePaginationControls();
        }
    }

    function updatePaginationControls() {
        const totalItems = currentData.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        const startItem = totalItems === 0 ? 0 : (currentPage - 1) * itemsPerPage + 1;
        const endItem = Math.min(currentPage * itemsPerPage, totalItems);

        document.getElementById('paginationInfo').innerText = `Menampilkan ${startItem} - ${endItem} dari ${totalItems} Desa`;

        document.getElementById('btnPrevPage').disabled = currentPage === 1;
        document.getElementById('btnNextPage').disabled = currentPage === totalPages;

        const numContainer = document.getElementById('paginationNumbers');
        numContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.innerText = i;
            btn.onclick = () => { currentPage = i; renderLeaderboardTable(); };
            
            if (i === currentPage) {
                btn.className = "w-8 h-8 rounded-lg bg-brand-600 text-white font-bold text-xs shadow-sm border-0 cursor-default";
            } else {
                btn.className = "w-8 h-8 rounded-lg bg-white hover:bg-slate-100 text-slate-600 font-bold text-xs border border-slate-200 cursor-pointer transition";
            }
            numContainer.appendChild(btn);
        }
    }

    function changePage(direction) {
        currentPage += direction;
        renderLeaderboardTable();
    }

    function filterKecamatan(kec, btn) {
        document.querySelectorAll('.kec-btn').forEach(b => {
            b.classList.remove('bg-brand-600', 'text-white', 'shadow-sm');
            b.classList.add('text-slate-600', 'bg-transparent');
        });

        btn.classList.add('bg-brand-600', 'text-white', 'shadow-sm');
        btn.classList.remove('text-slate-600', 'bg-transparent');

        if (kec === 'Semua') {
            currentData = [...ALL_DESA];
        } else {
            currentData = ALL_DESA.filter(d => d.kecamatan.toLowerCase() === kec.toLowerCase());
        }

        currentPage = 1;
        document.getElementById('leaderboardSubtext').innerText = `Menampilkan ${currentData.length} desa di Kecamatan ${kec}.`;
        renderLeaderboardTable();
    }

    function filterByCategory(catKey) {
        currentData.sort((a, b) => b[catKey] - a[catKey]);
        currentPage = 1;
        renderLeaderboardTable();
        scrollToLeaderboard();
    }

    // MODAL FUNCTIONS
    function openVillageModal(desa) {
        document.getElementById('modalVillageTitle').innerText = desa.nama;
        document.getElementById('modalVillageSub').innerText = `Kecamatan ${desa.kecamatan} • Kota Batu`;
        document.getElementById('modalVillageBadge').innerText = `Peringkat #${desa.pos} • Total Skor: ${desa.skor}`;
        document.getElementById('modalVillageImg').src = desa.img;
        
        document.getElementById('scorePotensi').innerText = `${desa.potensi} / 100`;
        document.getElementById('scoreDigital').innerText = `${desa.digital} / 100`;
        document.getElementById('scoreEkonomi').innerText = `${desa.ekonomi} / 100`;
        document.getElementById('scoreSosial').innerText = `${desa.sosial} / 100`;
        document.getElementById('scoreSustainability').innerText = `${desa.sustainability} / 100`;

        document.getElementById('modalProgramName').innerText = desa.program;
        document.getElementById('modalProgramDesc').innerText = desa.desc;

        document.getElementById('villageModal').classList.remove('hidden');

        setTimeout(() => { renderRadarChart(desa); }, 50);
    }

    function closeVillageModal() {
        document.getElementById('villageModal').classList.add('hidden');
    }

    function handleBackdropClick(event) {
        if (event.target.id === 'villageModal') closeVillageModal();
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeVillageModal();
    });

    function renderRadarChart(desa) {
        const ctx = document.getElementById('radarChart').getContext('2d');
        if (radarChartInstance) radarChartInstance.destroy();

        radarChartInstance = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Potensi', 'Digital', 'Ekonomi', 'Sosial', 'Sustainability'],
                datasets: [{
                    label: 'Skor Kategori',
                    data: [desa.potensi, desa.digital, desa.ekonomi, desa.sosial, desa.sustainability],
                    backgroundColor: 'rgba(13, 148, 136, 0.25)',
                    borderColor: '#05845c',
                    borderWidth: 2,
                    pointBackgroundColor: '#05845c'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        min: 50, max: 100,
                        ticks: { display: false },
                        grid: { color: 'rgba(226, 232, 240, 0.8)' },
                        pointLabels: { font: { size: 10, weight: 'bold' }, color: '#475569' }
                    }
                },
                plugins: { legend: { display: false } }
            }
        });
    }

    function scrollToLeaderboard() {
        const el = document.getElementById('peringkat-section');
        if (el) el.scrollIntoView({ behavior: 'smooth' });
    }
</script>
@endpush