@extends('layouts.app')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .scrollbar-none::-webkit-scrollbar { display: none; }
    .scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }

    @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap');
    .font-handwritten { font-family: 'Caveat', cursive; }

    /* Style Tab Aktif & Non-Aktif */
    .tab-btn.active {
        background-color: #0f172a !important;
        color: #ffffff !important;
        border-color: #0f172a !important;
    }
    .tab-btn {
        background-color: #ffffff;
        color: #475569;
        border: 1px solid #e2e8f0;
    }
</style>
@endpush

@section('content')
<!-- HERO SECTION -->
<div class="relative w-full overflow-hidden bg-slate-800 min-h-[460px] sm:min-h-[480px] lg:min-h-[520px] flex items-center justify-between shadow-md">
    <img src="{{ asset('images/hero6.png') }}" 
         alt="Berita & Cerita Kota Batu" 
         onclick="zoomImage(this.src)"
         onerror="this.src='https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=1600';"
         class="absolute inset-0 w-full h-full object-cover object-center opacity-90 hover:scale-105 transition-all duration-700 cursor-zoom-in">

    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-900/60 to-transparent pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-12 sm:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            <div class="lg:col-span-7 space-y-3 sm:space-y-4 text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-slate-900/60 border border-white/20 text-emerald-300 text-xs font-semibold backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Pusat Informasi & Cerita
                </div>
                <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white leading-tight drop-shadow-md">
                    Berita & Cerita
                </h1>
                <h2 class="text-lg sm:text-2xl font-bold text-emerald-300 -mt-1 drop-shadow-sm">
                    Kisah Nyata dari Desa Kota Batu
                </h2>
                <p class="text-slate-200 text-xs sm:text-base leading-relaxed max-w-lg font-normal drop-shadow-sm">
                    Ikuti perkembangan program, cerita inspiratif pemuda, dan kisah sukses berbagai inovasi desa di seluruh wilayah Kota Batu.
                </p>
                <div class="pt-2">
                    <a href="#kumpulanBerita" class="inline-flex items-center gap-2.5 px-5 sm:px-6 py-2.5 sm:py-3 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs sm:text-sm shadow-xl transition-all no-underline">
                        <span>Jelajahi Semua Berita</span>
                        <i class="fa-solid fa-arrow-down text-xs"></i>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5 relative flex flex-col items-end lg:items-center justify-center mt-2 lg:mt-0">
                <div class="relative z-20 pointer-events-none transform rotate-[-4deg] lg:rotate-[-6deg]">
                    <p class="font-handwritten text-xl sm:text-3xl lg:text-4xl text-amber-300 drop-shadow-[0_2px_8px_rgba(0,0,0,0.9)] leading-tight text-right">
                        Kabar Desa,<br>Inspirasi Bersama,<br>Maju Bersama
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 inset-x-0 w-full overflow-hidden leading-none z-10 pointer-events-none">
        <svg class="relative block w-full h-10 sm:h-16 text-slate-50" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z" fill="currentColor"></path>
        </svg>
    </div>
</div>

<!-- KONTEN UTAMA BERITA -->
<main class="bg-slate-50 py-10 sm:py-12 min-h-screen" id="kumpulanBerita">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- TAB FILTER KATEGORI -->
        <div class="flex items-center justify-between flex-wrap gap-4 mb-8 sm:mb-10 pb-4 border-b border-slate-200">
            <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none w-full md:w-auto">
                <button onclick="filterBerita('semua', this)" class="tab-btn active px-5 py-2.5 rounded-xl font-bold text-xs shrink-0 shadow-sm transition">Semua</button>
                <button onclick="filterBerita('berita', this)" class="tab-btn px-5 py-2.5 rounded-xl font-semibold text-xs hover:bg-slate-100 transition shrink-0">Berita</button>
                <button onclick="filterBerita('inspiratif', this)" class="tab-btn px-5 py-2.5 rounded-xl font-semibold text-xs hover:bg-slate-100 transition shrink-0">Cerita Inspiratif</button>
                <button onclick="filterBerita('kegiatan', this)" class="tab-btn px-5 py-2.5 rounded-xl font-semibold text-xs hover:bg-slate-100 transition shrink-0">Kegiatan</button>
                <button onclick="filterBerita('pengumuman', this)" class="tab-btn px-5 py-2.5 rounded-xl font-semibold text-xs hover:bg-slate-100 transition shrink-0">Pengumuman</button>
            </div>

            <span class="text-xs text-slate-500 font-medium hidden md:inline-block">
                Halaman <strong id="currentPageText" class="text-slate-800">1</strong> dari <strong id="totalPagesText" class="text-slate-800">2</strong>
            </span>
        </div>

        <!-- ================= HALAMAN 1 ================= -->
        <div id="page-1" class="news-page grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-10 sm:mb-12">

            <article data-category="berita" class="news-item group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="relative w-full h-48 sm:h-52 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/hero1.png') }}" alt="Desa Punten" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow">Berita</span>
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-2.5">
                            <i class="fa-regular fa-calendar-check text-emerald-600"></i>
                            <span class="font-bold text-slate-700">12 Mei 2025</span>
                            <span>•</span>
                            <span>5 Min Baca</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 leading-snug mb-2.5 group-hover:text-emerald-600 transition">
                            <a href="{{ url('/berita/1') }}">Desa Punten Raih Juara 1 Liga Desa 2025</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                            Inovasi digital dan pengoptimalan potensi wisata lokal membawa Desa Punten meraih penghargaan tertinggi.
                        </p>
                    </div>
                </div>
                <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-2 border-t border-slate-50">
                    <a href="{{ url('/berita/1') }}" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>

            <article data-category="inspiratif" class="news-item group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="relative w-full h-48 sm:h-52 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/hero2.png') }}" alt="Petani Kopi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-teal-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow">Cerita Inspiratif</span>
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-2.5">
                            <i class="fa-regular fa-calendar-check text-teal-600"></i>
                            <span class="font-bold text-slate-700">10 Mei 2025</span>
                            <span>•</span>
                            <span>4 Min Baca</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 leading-snug mb-2.5 group-hover:text-emerald-600 transition">
                            <a href="{{ url('/berita/2') }}">Dari Petani Kopi Jadi Pengusaha Digital</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                            Pemuda Desa Sumbergondo berhasil memanfaatkan platform digital SimpulSae untuk memasarkan olahan kopi.
                        </p>
                    </div>
                </div>
                <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-2 border-t border-slate-50">
                    <a href="{{ url('/berita/2') }}" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>

            <article data-category="kegiatan" class="news-item group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="relative w-full h-48 sm:h-52 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/hero3.png') }}" alt="Digital Marketing" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow">Kegiatan</span>
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-2.5">
                            <i class="fa-regular fa-calendar-check text-blue-600"></i>
                            <span class="font-bold text-slate-700">08 Mei 2025</span>
                            <span>•</span>
                            <span>3 Min Baca</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 leading-snug mb-2.5 group-hover:text-emerald-600 transition">
                            <a href="{{ url('/berita/3') }}">Pelatihan Digital Marketing UMKM Desa</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                            Pendampingan teknis bagi para pelaku UMKM lokal agar siap merambah pasar digital.
                        </p>
                    </div>
                </div>
                <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-2 border-t border-slate-50">
                    <a href="{{ url('/berita/3') }}" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>

            <article data-category="kegiatan" class="news-item group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="relative w-full h-48 sm:h-52 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/hero4.png') }}" alt="Festival Budaya" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-purple-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow">Kegiatan</span>
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-2.5">
                            <i class="fa-regular fa-calendar-check text-purple-600"></i>
                            <span class="font-bold text-slate-700">05 Mei 2025</span>
                            <span>•</span>
                            <span>6 Min Baca</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 leading-snug mb-2.5 group-hover:text-emerald-600 transition">
                            <a href="{{ url('/berita/4') }}">Meriahkan Festival Budaya & Kuliner</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                            Ribuan warga antusias menghadiri pegelaran seni dan pameran jajanan khas daerah.
                        </p>
                    </div>
                </div>
                <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-2 border-t border-slate-50">
                    <a href="{{ url('/berita/4') }}" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>

            <article data-category="pengumuman" class="news-item hidden md:flex group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex-col justify-between">
                <div>
                    <div class="relative w-full h-52 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/hero5.png') }}" alt="Inovasi Wisata" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-amber-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow">Pengumuman</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-2.5">
                            <i class="fa-regular fa-calendar-check text-amber-600"></i>
                            <span class="font-bold text-slate-700">01 Mei 2025</span>
                            <span>•</span>
                            <span>2 Min Baca</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 leading-snug mb-2.5 group-hover:text-emerald-600 transition">
                            <a href="{{ url('/berita/5') }}">Pembukaan Hibah Inovasi Desa II</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                            Pendaftaran pendanaan inkubasi ide program desa kreatif resmi dibuka kembali.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-2 border-t border-slate-50">
                    <a href="{{ url('/berita/5') }}" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>

            <article data-category="berita" class="news-item hidden md:flex group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex-col justify-between">
                <div>
                    <div class="relative w-full h-52 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/hero1.png') }}" alt="Smart Farming" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow">Berita</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-2.5">
                            <i class="fa-regular fa-calendar-check text-emerald-600"></i>
                            <span class="font-bold text-slate-700">28 April 2025</span>
                            <span>•</span>
                            <span>4 Min Baca</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 leading-snug mb-2.5 group-hover:text-emerald-600 transition">
                            <a href="{{ url('/berita/6') }}">Penerapan Smart Farming di Bumiaji</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                            Pemanfaatan sensor berbasis IoT membantu efisiensi penggunaan air dan pupuk.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-2 border-t border-slate-50">
                    <a href="{{ url('/berita/6') }}" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>

        </div>

        <!-- ================= HALAMAN 2 ================= -->
        <div id="page-2" class="news-page hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-10 sm:mb-12">

            <article data-category="pengumuman" class="news-item group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="relative w-full h-48 sm:h-52 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/hero5.png') }}" alt="Inovasi Wisata" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-amber-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow">Pengumuman</span>
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-2.5">
                            <i class="fa-regular fa-calendar-check text-amber-600"></i>
                            <span class="font-bold text-slate-700">01 Mei 2025</span>
                            <span>•</span>
                            <span>2 Min Baca</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 leading-snug mb-2.5 group-hover:text-emerald-600 transition">
                            <a href="{{ url('/berita/5') }}">Pembukaan Hibah Inovasi Desa II</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                            Pendaftaran pendanaan inkubasi ide program desa kreatif resmi dibuka kembali.
                        </p>
                    </div>
                </div>
                <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-2 border-t border-slate-50">
                    <a href="{{ url('/berita/5') }}" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>

            <article data-category="berita" class="news-item group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="relative w-full h-48 sm:h-52 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/hero1.png') }}" alt="Smart Farming" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow">Berita</span>
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="flex items-center gap-2 text-xs text-slate-500 font-medium mb-2.5">
                            <i class="fa-regular fa-calendar-check text-emerald-600"></i>
                            <span class="font-bold text-slate-700">28 April 2025</span>
                            <span>•</span>
                            <span>4 Min Baca</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 leading-snug mb-2.5 group-hover:text-emerald-600 transition">
                            <a href="{{ url('/berita/6') }}">Penerapan Smart Farming di Bumiaji</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                            Pemanfaatan sensor berbasis IoT membantu efisiensi penggunaan air dan pupuk.
                        </p>
                    </div>
                </div>
                <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-2 border-t border-slate-50">
                    <a href="{{ url('/berita/6') }}" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>

        </div>

        <!-- NAVIGATION PAGINASI NEXT / PREV / 1 / 2 -->
        <div id="paginationContainer" class="flex justify-center items-center gap-2 pt-4">
            <button id="prevBtn" onclick="changePage(currentPage - 1)" class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-100 transition text-xs shadow-sm cursor-pointer">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            
            <button id="btnPage1" onclick="changePage(1)" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-900 text-white font-bold text-xs shadow-sm cursor-pointer transition">
                1
            </button>
            
            <button id="btnPage2" onclick="changePage(2)" class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-100 transition font-bold text-xs cursor-pointer">
                2
            </button>
            
            <button id="nextBtn" onclick="changePage(currentPage + 1)" class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-100 transition text-xs shadow-sm cursor-pointer">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

    </div>
</main>

<!-- MODAL ZOOM GAMBAR -->
<div id="imageModal" class="fixed inset-0 bg-black/80 z-50 hidden flex items-center justify-center p-4" onclick="closeImage()">
    <div class="relative max-w-4xl w-full flex justify-center">
        <img id="modalImg" src="" class="max-h-[85vh] rounded-xl shadow-2xl object-contain">
    </div>
</div>

@push('scripts')
<script>
    let currentPage = 1;
    let currentCategory = 'semua';
    const totalPages = 2;

    // FUNGSI GANTI HALAMAN (NEXT/PREV/1/2)
    function changePage(page) {
        if (page < 1 || page > totalPages) return;

        currentPage = page;

        document.querySelectorAll('.news-page').forEach(el => el.classList.add('hidden'));
        document.getElementById(`page-${currentPage}`).classList.remove('hidden');

        const pageText = document.getElementById('currentPageText');
        if (pageText) pageText.innerText = currentPage;

        const btn1 = document.getElementById('btnPage1');
        const btn2 = document.getElementById('btnPage2');

        if (currentPage === 1) {
            btn1.className = "w-10 h-10 flex items-center justify-center rounded-xl bg-slate-900 text-white font-bold text-xs shadow-sm cursor-pointer transition";
            btn2.className = "w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-100 transition font-bold text-xs cursor-pointer";
        } else {
            btn2.className = "w-10 h-10 flex items-center justify-center rounded-xl bg-slate-900 text-white font-bold text-xs shadow-sm cursor-pointer transition";
            btn1.className = "w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-100 transition font-bold text-xs cursor-pointer";
        }

        applyCategoryFilter();
        document.getElementById('kumpulanBerita').scrollIntoView({ behavior: 'smooth' });
    }

    // FUNGSI TAB FILTER
    function filterBerita(category, btnElement) {
        currentCategory = category;

        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        btnElement.classList.add('active');

        applyCategoryFilter();
    }

    function applyCategoryFilter() {
        const activePageContainer = document.getElementById(`page-${currentPage}`);
        const articles = activePageContainer.querySelectorAll('.news-item');

        articles.forEach(article => {
            const articleCategory = article.getAttribute('data-category');
            if (currentCategory === 'semua' || articleCategory === currentCategory) {
                article.classList.remove('hidden');
            } else {
                article.classList.add('hidden');
            }
        });
    }

    function zoomImage(src) {
        document.getElementById('modalImg').src = src;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeImage() {
        document.getElementById('imageModal').classList.add('hidden');
    }
</script>
@endpush
@endsection