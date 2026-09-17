@extends('layouts.app')

@section('content')
<!-- Tailwind Play Config & External Assets -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        corePlugins: { preflight: false },
        theme: {
            extend: {
                colors: {
                    brand: {
                        50: '#e6f7f2',
                        100: '#c0ebd9',
                        500: '#0d9488',
                        600: '#05845c',
                        700: '#046a4a',
                        800: '#035239',
                        900: '#023c2a'
                    }
                }
            }
        }
    }
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="bg-slate-50 min-h-screen font-sans text-slate-800 pb-16">

    <!-- 1. HERO BANNER DAMPAK (Full Width Melebar Sampai Ujung Layar) -->
    <div class="relative w-full overflow-hidden bg-slate-800 min-h-[480px] lg:min-h-[520px] flex items-center justify-between shadow-md">
        
        <!-- Background Image -->
        <img src="{{ asset('images/hero8.png') }}" 
             alt="Background Dampak" 
             onclick="zoomImage(this.src)"
             onerror="this.src='https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=1600';"
             class="absolute inset-0 w-full h-full object-cover object-center opacity-90 hover:scale-105 transition-all duration-700 cursor-zoom-in">

        <!-- Gradient Overlay Cerah & Halus -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/80 via-slate-900/40 to-transparent pointer-events-none"></div>

        <!-- Konten Teks Hero (Container di dalam agar teks rapi di tengah) -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16">
            <div class="max-w-2xl text-white space-y-4">
                <h1 class="text-4xl sm:text-5xl font-black tracking-tight drop-shadow-md">
                    Dampak
                </h1>

                <p class="text-xl sm:text-2xl font-bold text-slate-100 leading-snug drop-shadow-sm">
                    Data Nyata, Perubahan Berkelanjutan
                </p>

                <p class="text-slate-200 text-sm sm:text-base leading-relaxed max-w-xl drop-shadow-sm">
                    Kami mengukur dampak program secara transparan dan terukur, melalui pendekatan ESG untuk masa depan yang lebih baik.
                </p>

                <div class="pt-2">
                    <button class="px-6 py-3 bg-brand-600 hover:bg-brand-700 active:scale-95 text-white rounded-full font-bold text-sm shadow-xl transition cursor-pointer border-0 flex items-center gap-2">
                        Lihat Dashboard Lengkap <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Filter Tahun -->
        <div class="absolute top-8 right-8 z-20">
            <button class="px-4 py-2 rounded-full bg-slate-900/60 hover:bg-slate-800/80 text-white text-xs font-semibold backdrop-blur-md border border-white/20 flex items-center gap-2 cursor-pointer transition shadow-md">
                Tahun 2025 <i class="fa-solid fa-chevron-down text-[10px]"></i>
            </button>
        </div>

        <!-- Wave / Gelombang Bawah Halaman -->
        <div class="absolute bottom-0 inset-x-0 w-full overflow-hidden leading-none z-10 pointer-events-none">
            <svg class="relative block w-full h-12 sm:h-16 text-slate-50" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

   <!-- 2. KONTEN HALAMAN SELANJUTNYA -->
<!-- Ditambahkan class relative, z-20 (agar melayang di atas wave), dan -mt-16 (menarik ke atas) -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-20 -mt-16 sm:-mt-20">

    <!-- STATISTIK CARDS (ANIMATED NUMBERS) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-md flex items-center gap-4 hover:shadow-lg transition">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-hand-holding-heart"></i>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900 counter" data-target="24">0</div>
                <div class="text-xs font-semibold text-slate-500">Desa <span class="block text-[11px] text-slate-400 font-normal">Penerima Manfaat</span></div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-md flex items-center gap-4 hover:shadow-lg transition">
            <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900 counter" data-target="1240" data-format="comma">0</div>
                <div class="text-xs font-semibold text-slate-500">Pemuda <span class="block text-[11px] text-slate-400 font-normal">Terlibat Aktif</span></div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-md flex items-center gap-4 hover:shadow-lg transition">
            <div class="w-12 h-12 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-store"></i>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900 counter" data-target="326">0</div>
                <div class="text-xs font-semibold text-slate-500">UMKM <span class="block text-[11px] text-slate-400 font-normal">Berkembang</span></div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-md flex items-center gap-4 hover:shadow-lg transition">
            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-list-check"></i>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900 counter" data-target="48">0</div>
                <div class="text-xs font-semibold text-slate-500">Program <span class="block text-[11px] text-slate-400 font-normal">Terlaksana</span></div>
            </div>
        </div>
    </div>

    <!-- Taruh Chart dan Konten Dampak Lainnya di Bawah Ini -->

</div>

        <!-- 3. MAIN CONTENT (REALISASI DAMPAK & ESG) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            <!-- GRAFIK REALISASI DAMPAK (KIRI) -->
            <div class="lg:col-span-7 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Realisasi Dampak</h3>
                    
                    <!-- Tab Filter Tombol -->
                    <div class="flex items-center gap-2 mt-4 mb-2">
                        <button id="btn-sosial" onclick="switchImpactTab('sosial')" class="impact-tab-btn px-4 py-1.5 rounded-full bg-brand-600 text-white text-xs font-bold border-0 cursor-pointer transition">Sosial</button>
                        <button id="btn-ekonomi" onclick="switchImpactTab('ekonomi')" class="impact-tab-btn px-4 py-1.5 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold border-0 cursor-pointer transition">Ekonomi</button>
                        <button id="btn-lingkungan" onclick="switchImpactTab('lingkungan')" class="impact-tab-btn px-4 py-1.5 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold border-0 cursor-pointer transition">Lingkungan</button>
                    </div>

                    <p id="impact-desc" class="text-xs text-slate-500 mb-6">Peningkatan kapasitas pemuda dan penguatan komunitas desa.</p>
                </div>

                <!-- Section Grafik & Gauge Circle -->
                <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                    
                    <!-- Circular Score (Dynamic) -->
                    <div class="sm:col-span-4 flex flex-col items-center justify-center p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="relative w-24 h-24 flex items-center justify-center">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                                <path class="text-slate-200" stroke-width="3.5" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <path id="gauge-circle" class="text-brand-600 transition-all duration-700" stroke-dasharray="78, 100" stroke-width="3.5" stroke-linecap="round" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                            </svg>
                            <span id="gauge-text" class="absolute text-xl font-black text-slate-800">0%</span>
                        </div>
                        <div class="mt-2 text-[11px] text-slate-500 font-semibold text-center">
                            Target <span id="target-text" class="text-slate-700 font-bold block">> 70%</span>
                        </div>
                    </div>

                    <!-- Bar Chart Container -->
                    <div class="sm:col-span-8 h-44 relative">
                        <canvas id="impactBarChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- DIAGRAM ESG (KANAN) -->
            <div class="lg:col-span-5 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Dampak ESG</h3>
                </div>

                <!-- Banner Visual ESG -->
                <div class="relative rounded-2xl overflow-hidden min-h-[220px] flex items-center justify-center group">
                    <img src="https://images.unsplash.com/photo-1511497584788-8767611136f6?auto=format&fit=crop&q=80&w=800" 
                         alt="ESG Background" 
                         onclick="zoomImage(this.src)"
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-all duration-500 cursor-zoom-in">
                    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px] pointer-events-none"></div>

                    <!-- Hub Node ESG -->
                    <div class="relative z-10 w-full max-w-[280px] h-[180px] pointer-events-none">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 rounded-full bg-white/90 backdrop-blur shadow-lg border-2 border-slate-200 flex items-center justify-center font-black text-slate-800 text-xs hover:scale-110 transition">
                            ESG
                        </div>

                        <!-- Node S -->
                        <div class="absolute top-2 left-1/2 -translate-x-1/2 flex flex-col items-center">
                            <div class="w-12 h-12 rounded-full bg-sky-500 text-white font-black flex items-center justify-center text-sm shadow-md ring-4 ring-sky-500/30">
                                S
                            </div>
                            <span class="text-[10px] text-white font-bold bg-slate-900/60 px-2 py-0.5 rounded-full mt-1">Social</span>
                        </div>

                        <!-- Node E -->
                        <div class="absolute bottom-4 left-2 flex flex-col items-center">
                            <div class="w-14 h-14 rounded-full bg-emerald-600 text-white font-black flex items-center justify-center text-base shadow-md ring-4 ring-emerald-600/30">
                                E
                            </div>
                            <span class="text-[10px] text-white font-bold bg-slate-900/60 px-2 py-0.5 rounded-full mt-1">Environmental</span>
                        </div>

                        <!-- Node G -->
                        <div class="absolute bottom-4 right-2 flex flex-col items-center">
                            <div class="w-12 h-12 rounded-full bg-slate-600 text-white font-black flex items-center justify-center text-sm shadow-md ring-4 ring-slate-600/30">
                                G
                            </div>
                            <span class="text-[10px] text-white font-bold bg-slate-900/60 px-2 py-0.5 rounded-full mt-1">Governance</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- 4. BOTTOM BANNER -->
        <div class="relative overflow-hidden rounded-3xl bg-slate-900 min-h-[160px] flex items-center p-6 sm:p-10 shadow-md group">
            <img src="{{ asset('images/hero6.png') }}" 
                 alt="Landscape Desa" 
                 onclick="zoomImage(this.src)"
                 class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-105 transition-all duration-500 cursor-zoom-in">

            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/80 via-slate-900/50 to-transparent pointer-events-none"></div>

            <div class="relative z-10 w-full flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="max-w-xl space-y-1">
                    <h3 class="text-lg sm:text-xl font-extrabold text-white leading-tight">
                        Bersama, Kita Wujudkan Desa yang Lebih Mandiri, Inklusif dan Berkelanjutan
                    </h3>
                </div>

                <button class="px-5 py-2.5 bg-white hover:bg-slate-100 active:scale-95 text-slate-900 rounded-full font-bold text-xs sm:text-sm shadow-lg transition cursor-pointer border-0 shrink-0 flex items-center gap-2">
                    Lihat Laporan Dampak <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </div>
        </div>

    </div>

</div>

<!-- MODAL LIGHTBOX FOR IMAGE ZOOM -->
<div id="imageLightbox" onclick="closeZoom()" class="fixed inset-0 z-50 hidden bg-slate-950/80 backdrop-blur-md flex items-center justify-center p-4">
    <div class="relative max-w-4xl w-full flex items-center justify-center">
        <button onclick="closeZoom()" class="absolute -top-12 right-0 text-white hover:text-slate-300 text-2xl border-0 bg-transparent cursor-pointer">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <img id="lightboxImg" src="" alt="Zoomed Image" class="max-h-[85vh] max-w-full rounded-2xl shadow-2xl object-contain border border-slate-700">
    </div>
</div>
@endsection

@push('scripts')
<script>
let impactChartInstance = null;

// Dataset untuk tiap Tab Realisasi Dampak
const TAB_DATA = {
    sosial: {
        desc: "Peningkatan kapasitas pemuda dan penguatan komunitas desa.",
        score: 78,
        target: "> 70%",
        chartData: [15, 22, 28, 35, 40, 42, 50, 58, 62, 70, 82, 95]
    },
    ekonomi: {
        desc: "Pertumbuhan omzet BUMDes dan penyerapan tenaga kerja lokal.",
        score: 84,
        target: "> 75%",
        chartData: [20, 25, 30, 42, 48, 55, 63, 72, 78, 85, 88, 92]
    },
    lingkungan: {
        desc: "Pengurangan volume sampah desa dan penghijauan lahan agrowisata.",
        score: 91,
        target: "> 85%",
        chartData: [10, 18, 32, 45, 52, 60, 68, 75, 80, 86, 90, 96]
    }
};

document.addEventListener("DOMContentLoaded", function() {
    startNumberCounters();
    initImpactChart();
    switchImpactTab('sosial');
});

// 1. EFEK ANIMASI ANGKA BERJALAN (COUNTER)
function startNumberCounters() {
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const isComma = counter.getAttribute('data-format') === 'comma';
        const duration = 1500; 
        const stepTime = 20;
        const steps = duration / stepTime;
        const increment = target / steps;
        let current = 0;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            counter.innerText = isComma ? Math.floor(current).toLocaleString('id-ID') : Math.floor(current);
        }, stepTime);
    });
}

// 2. FUNGSI TAB SWITCHER (SOSIAL, EKONOMI, LINGKUNGAN)
function switchImpactTab(tabKey) {
    const data = TAB_DATA[tabKey];
    if (!data) return;

    // Update active button state
    document.querySelectorAll('.impact-tab-btn').forEach(btn => {
        btn.classList.remove('bg-brand-600', 'text-white', 'font-bold');
        btn.classList.add('bg-slate-100', 'text-slate-600', 'font-semibold');
    });

    const activeBtn = document.getElementById(`btn-${tabKey}`);
    if (activeBtn) {
        activeBtn.classList.add('bg-brand-600', 'text-white', 'font-bold');
        activeBtn.classList.remove('bg-slate-100', 'text-slate-600', 'font-semibold');
    }

    // Update Text & Target
    document.getElementById('impact-desc').innerText = data.desc;
    document.getElementById('target-text').innerText = data.target;

    // Update Circular Gauge & Animasi Skor
    animateGaugeScore(data.score);

    // Update Chart Data
    if (impactChartInstance) {
        impactChartInstance.data.datasets[0].data = data.chartData;
        impactChartInstance.update();
    }
}

// Animasi skor % pada gauge lingkaran
function animateGaugeScore(targetScore) {
    const circle = document.getElementById('gauge-circle');
    const text = document.getElementById('gauge-text');
    
    // Set circle stroke dasharray
    circle.setAttribute('stroke-dasharray', `${targetScore}, 100`);

    let current = 0;
    const duration = 800;
    const stepTime = 20;
    const steps = duration / stepTime;
    const increment = targetScore / steps;

    const timer = setInterval(() => {
        current += increment;
        if (current >= targetScore) {
            current = targetScore;
            clearInterval(timer);
        }
        text.innerText = `${Math.floor(current)}%`;
    }, stepTime);
}

// 3. CHART.JS INITIALIZATION
function initImpactChart() {
    const ctx = document.getElementById('impactBarChart').getContext('2d');
    
    impactChartInstance = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                data: TAB_DATA.sosial.chartData,
                backgroundColor: '#05845c',
                borderRadius: 4,
                barThickness: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: true }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { font: { size: 10 }, color: '#94a3b8' }
                },
                y: {
                    display: false,
                    grid: { display: false }
                }
            }
        }
    });
}

// 4. EFEK ZOOM GAMBAR (LIGHTBOX)
function zoomImage(src) {
    document.getElementById('lightboxImg').src = src;
    document.getElementById('imageLightbox').classList.remove('hidden');
}

function closeZoom() {
    document.getElementById('imageLightbox').classList.add('hidden');
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeZoom();
});
</script>
@endpush