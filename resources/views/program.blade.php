@extends('layouts.app')

@section('content')
<!-- FontAwesome, AOS Animation, & SweetAlert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    :root {
        --bg-light: #f8fafc;
        --white: #ffffff;
        --text-dark: #0f172a;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --radius-lg: 16px;
        --radius-md: 12px;
        
        /* Warna Brand & Card Icons */
        --brand-green: #12A874;
        --color-green: #05845c;
        --color-blue: #0284c7;
        --color-cyan: #06b6d4;
        --color-orange: #ea580c;
        --color-purple: #7c3aed;
    }

    body {
        background-color: var(--bg-light);
        color: var(--text-dark);
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .program-wrapper {
        overflow-x: hidden;
    }

    /* ==========================================
       ANIMASI KHUSUS (FLOATING & ROTATE)
    ========================================== */
    /* Animasi Mengapung (Floating) Halus untuk Card */
    @keyframes floatingCard {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
        100% { transform: translateY(0px); }
    }

    /* Efek Gambar Berputar saat di-klik (Trigger Class .flip-active) */
    .interactive-img {
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        perspective: 1000px;
    }

    .interactive-img.flip-active {
        transform: rotateY(360deg) scale(1.03);
    }

    /* ==========================================
   1. HERO SECTION (Program SimpulSae)
========================================== */
.hero-program {
    position: relative;
    width: 100%;
    min-height: 520px; /* Samakan tinggi dengan Halaman Dampak */
    background: linear-gradient(to right, rgba(2, 6, 23, 0.85) 0%, rgba(15, 23, 42, 0.5) 60%, transparent 100%), 
                url("{{ asset('images/hero2.png') }}") center/cover no-repeat;
    display: flex;
    align-items: center;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    color: var(--white);
}

.hero-container {
    max-width: 1280px;
    width: 100%;
    margin: 0 auto;
    padding: 60px 20px 80px;
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 50px;
    align-items: center;
    position: relative;
    z-index: 10;
}

.hero-text-side {
    max-width: 540px;
}

.hero-title-main {
    font-size: 48px;
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 6px;
    color: #ffffff;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}

.gradient-cyan-text {
    background: linear-gradient(90deg, #2dd4bf 0%, #10b981 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: block;
}

.hero-subtitle {
    font-size: 20px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 14px;
    opacity: 0.95;
}

.hero-desc {
    font-size: 15px;
    color: #e2e8f0;
    line-height: 1.6;
    margin-bottom: 24px;
}

.btn-detail-program {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #059669; /* Disamakan dengan warna tombol hijau Dampak */
    color: #ffffff;
    border: none;
    padding: 12px 26px;
    border-radius: 9999px;
    font-weight: 700;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
}

.btn-detail-program:hover {
    transform: translateY(-2px);
    background: #10b981;
}

.hero-img-side {
    perspective: 1000px;
}

.hero-img-side img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    border-radius: 16px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
}

    /* ==========================================
       2. STATS FLOATING CARDS (5 KOLOM)
    ========================================== */
    .stats-section {
        max-width: 1200px;
        margin: -45px auto 70px;
        padding: 0 20px;
        position: relative;
        z-index: 20;
    }

    .stats-grid-5 {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 16px;
    }

    .stat-card-item {
        background: var(--white);
        padding: 16px 18px;
        border-radius: 14px;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        gap: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        animation: floatingCard 4s ease-in-out infinite;
    }

    /* Staggered Delay untuk Efek Mengapung Bergantian */
    .stat-card-item:nth-child(1) { animation-delay: 0s; }
    .stat-card-item:nth-child(2) { animation-delay: 0.8s; }
    .stat-card-item:nth-child(3) { animation-delay: 1.6s; }
    .stat-card-item:nth-child(4) { animation-delay: 2.4s; }
    .stat-card-item:nth-child(5) { animation-delay: 3.2s; }

    .stat-card-item:hover {
        transform: translateY(-10px) scale(1.02) !important;
        box-shadow: 0 18px 35px rgba(5, 132, 92, 0.15);
        border-color: var(--brand-green);
    }

    .stat-icon-circle {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 16px;
        flex-shrink: 0;
        transition: transform 0.4s ease;
    }

    .stat-card-item:hover .stat-icon-circle {
        transform: rotate(360deg) scale(1.1);
    }

    .bg-green { background: var(--color-green); }
    .bg-blue { background: var(--color-blue); }
    .bg-cyan { background: var(--color-cyan); }
    .bg-orange { background: var(--color-orange); }
    .bg-purple { background: var(--color-purple); }

    .stat-info-text h3 {
        font-size: 20px;
        font-weight: 800;
        margin: 0;
        color: var(--text-dark);
        line-height: 1.2;
    }

    .stat-info-text strong {
        font-size: 13px;
        color: var(--text-dark);
        display: block;
    }

    .stat-info-text p {
        font-size: 10px;
        color: var(--text-muted);
        margin: 1px 0 0 0;
        line-height: 1.2;
    }

    /* ==========================================
       3. TAHAPAN PROGRAM SECTION
    ========================================== */
    .tahapan-section {
        max-width: 1200px;
        margin: 0 auto 70px;
        padding: 0 20px;
    }

    .section-title-text {
        font-size: 24px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 4px;
    }

    .section-subtitle-text {
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 30px;
    }

    .tahapan-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 24px;
    }

    .tahapan-card {
        background: var(--white);
        border-radius: 16px;
        padding: 24px 20px;
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        position: relative;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .tahapan-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border-color: var(--color-green);
    }

    .tahapan-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .tahapan-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 20px;
        transition: transform 0.4s ease;
    }

    .tahapan-card:hover .tahapan-icon {
        transform: rotate(360deg);
    }

    .step-number {
        font-size: 14px;
        font-weight: 800;
        color: #94a3b8;
    }

    .tahapan-card h4 {
        font-size: 16px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 6px;
    }

    .tahapan-card p {
        font-size: 12px;
        color: var(--text-muted);
        margin: 0;
    }

    .btn-detail-tahapan {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: var(--text-muted);
        border: 1px solid var(--border-color);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-detail-tahapan:hover {
        background: var(--white);
        color: var(--color-green);
        border-color: var(--color-green);
    }

    /* ==========================================
       4. BANNER CTA BOTTOM
    ========================================== */
    .cta-banner-container {
        max-width: 1200px;
        margin: 0 auto 80px;
        padding: 0 20px;
    }

    .cta-banner-card {
        background: linear-gradient(rgba(10, 30, 25, 0.85), rgba(10, 30, 25, 0.85)), 
                    url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
        border-radius: 20px;
        padding: 40px;
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        gap: 30px;
        align-items: center;
        color: #ffffff;
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }

    .cta-left-content {
        max-width: 440px;
    }

    .cta-badge-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 20px;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 12px;
    }

    .cta-badge-icon {
        color: #2dd4bf;
        font-size: 18px;
    }

    .cta-subtitle {
        font-size: 16px;
        font-weight: 700;
        color: #2dd4bf;
        margin-bottom: 12px;
    }

    .cta-desc {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.6;
        margin-bottom: 24px;
    }

    .btn-cta-green {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #008F63;
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-cta-green:hover {
        background: #006B4F;
        transform: translateY(-2px);
    }

    .cta-right-img img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    /* RESPONSIVE LAYOUT */
    @media (max-width: 1024px) {
        .stats-grid-5 { grid-template-columns: repeat(3, 1fr); }
        .tahapan-grid { grid-template-columns: repeat(2, 1fr); }
        .hero-container, .cta-banner-card { grid-template-columns: 1fr; }
    }

    @media (max-width: 640px) {
        .stats-grid-5 { grid-template-columns: repeat(2, 1fr); }
        .tahapan-grid { grid-template-columns: 1fr; }
        .hero-title-main { font-size: 32px; }
    }
</style>

<div class="program-wrapper">

    <!-- 1. HERO SECTION -->
<section class="hero-program">

    <div class="hero-container">
        <!-- TEKS KIRI -->
        <div class="hero-text-side" data-aos="fade-right">
            <h1 class="hero-title-main">
                Program<br>
                <span class="gradient-cyan-text">SimpulSae</span>
            </h1>
            <div class="hero-subtitle">Rencana Akselerasi Desa</div>
            <p class="hero-desc">
                Program pemberdayaan pemuda, digitalisasi, UMKM dan penguatan potensi desa melalui 4 tahapan terukur.
            </p>
            <a href="#tahapan" class="btn-detail-program">
                Lihat Detail Program &rarr;
            </a>
        </div>

        <!-- GAMBAR BERPUTAR SAAT DI-KLIK (KANAN) -->
        <div class="hero-img-side" data-aos="fade-left">
            <img src="{{ asset('images/hero4.png') }}" 
                 alt="Pemuda SimpulSae" 
                 class="interactive-img" 
                 onclick="rotateImage(this)">
        </div>
    </div>

    <!-- Wave / Gelombang Bawah Halaman (Samakan dengan Halaman Dampak) -->
    <div style="position: absolute; bottom: 0; left: 0; right: 0; width: 100%; overflow: hidden; line-height: 0; z-index: 10; pointer-events: none;">
        <svg style="position: relative; display: block; width: 100%; height: 55px; color: #f8fafc;" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z" fill="currentColor"></path>
        </svg>
    </div>

</section>

    <!-- 2. STATS FLOATING CARDS (DENGAN ANIMASI ANGKA BERJALAN) -->
    <div class="stats-section">
        <div class="stats-grid-5" data-aos="zoom-in">
            <!-- Card 1 -->
            <div class="stat-card-item" onclick="showPopup('12 Bulan Durasi Program', 'Program dijalankan secara terstruktur dan berkelanjutan selama 1 tahun penuh.')">
                <div class="stat-icon-circle bg-green"><i class="fa-solid fa-calendar-days"></i></div>
                <div class="stat-info-text">
                    <h3 class="counter" data-target="12">0</h3>
                    <strong>Bulan</strong>
                    <p>Durasi Program</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="stat-card-item" onclick="showPopup('24 Desa Lokasi Program', 'Mencakup 24 Desa dan Kelurahan aktif se-Kota Batu.')">
                <div class="stat-icon-circle bg-blue"><i class="fa-solid fa-house-chimney"></i></div>
                <div class="stat-info-text">
                    <h3 class="counter" data-target="24">0</h3>
                    <strong>Desa</strong>
                    <p>Lokasi Program</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="stat-card-item" onclick="showPopup('1.240 Pemuda', 'Terlibat aktif dalam pelatihan digitalisasi dan aksi sosial desa.')">
                <div class="stat-icon-circle bg-cyan"><i class="fa-solid fa-users"></i></div>
                <div class="stat-info-text">
                    <h3 class="counter" data-target="1240">0</h3>
                    <strong>Pemuda</strong>
                    <p>Penerima Manfaat</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="stat-card-item" onclick="showPopup('326 UMKM Didampingi', 'Mendapatkan pendampingan kemasan, digital marketing, dan sertifikasi.')">
                <div class="stat-icon-circle bg-orange"><i class="fa-solid fa-store"></i></div>
                <div class="stat-info-text">
                    <h3 class="counter" data-target="326">0</h3>
                    <strong>UMKM</strong>
                    <p>Dampak Ekonomi</p>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="stat-card-item" onclick="showPopup('4 Fase Utama', 'Tahapan eksekusi program mulai dari Riset, Pelatihan, Kompetisi hingga Mandiri.')">
                <div class="stat-icon-circle bg-purple"><i class="fa-solid fa-layer-group"></i></div>
                <div class="stat-info-text">
                    <h3 class="counter" data-target="4">0</h3>
                    <strong>Fase</strong>
                    <p>Tahapan Program</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. TAHAPAN PROGRAM SECTION -->
    <section class="tahapan-section" id="tahapan">
        <h2 class="section-title-text" data-aos="fade-up">Tahapan Program</h2>
        <p class="section-subtitle-text" data-aos="fade-up" data-aos-delay="100">Dari pemetaan potensi hingga dampak berkelanjutan.</p>

        <div class="tahapan-grid">
            <!-- Tahapan 1 -->
            <div class="tahapan-card" data-aos="fade-up" data-aos-delay="200" onclick="showPopup('Fase 1: Pemetaan Potensi', 'Melakukan survey mendalam potensi desa & pendataan talenta pemuda lokal (Bulan 1 - 2).')">
                <div class="tahapan-card-header">
                    <div class="tahapan-icon bg-green"><i class="fa-solid fa-seedling"></i></div>
                    <span class="step-number">01</span>
                </div>
                <h4>Pemetaan Potensi</h4>
                <p>Bulan 1 - 2</p>
            </div>

            <!-- Tahapan 2 -->
            <div class="tahapan-card" data-aos="fade-up" data-aos-delay="300" onclick="showPopup('Fase 2: Kapasitas Pemuda', 'Pelatihan intensif bidang digital, branding, manajemen bisnis & kepemimpinan (Bulan 3 - 5).')">
                <div class="tahapan-card-header">
                    <div class="tahapan-icon bg-blue"><i class="fa-solid fa-users"></i></div>
                    <span class="step-number">02</span>
                </div>
                <h4>Kapasitas Pemuda</h4>
                <p>Bulan 3 - 5</p>
            </div>

            <!-- Tahapan 3 -->
            <div class="tahapan-card" data-aos="fade-up" data-aos-delay="400" onclick="showPopup('Fase 3: Akselerasi Liga Desa', 'Implementasi proyek lapangan & ekosistem kompetisi antar desa (Bulan 6 - 8).')">
                <div class="tahapan-card-header">
                    <div class="tahapan-icon bg-orange"><i class="fa-solid fa-trophy"></i></div>
                    <span class="step-number">03</span>
                </div>
                <h4>Akselerasi Liga Desa</h4>
                <p>Bulan 6 - 8</p>
            </div>

            <!-- Tahapan 4 -->
            <div class="tahapan-card" data-aos="fade-up" data-aos-delay="500" onclick="showPopup('Fase 4: Dampak & ESG', 'Evaluasi dampak sosial, ekonomi, dan penyerahan kemandirian penuh (Bulan 9 - 12).')">
                <div class="tahapan-card-header">
                    <div class="tahapan-icon bg-purple"><i class="fa-solid fa-chart-line"></i></div>
                    <span class="step-number">04</span>
                </div>
                <h4>Dampak & ESG</h4>
                <p>Bulan 9 - 12</p>
            </div>
        </div>

        <button class="btn-detail-tahapan" data-aos="fade-up" onclick="showPopup('Alur Program Lengkap', 'Setiap tahapan dirancang untuk memastikan integrasi pemuda dan UMKM berjalan maksimal.')">
            Lihat Detail Tahapan &rarr;
        </button>
    </section>

    <!-- 4. BANNER CTA BOTTOM (GAMBAR BISA DI-KLIK BERPUTAR) -->
    <div class="cta-banner-container" data-aos="fade-up">
        <div class="cta-banner-card">
            <div class="cta-left-content">
                <div class="cta-badge-title">
                    Bersama <i class="fa-solid fa-leaf cta-badge-icon"></i>
                </div>
                <div class="cta-subtitle">Membangun Desa</div>
                <div class="cta-subtitle" style="color:#ffffff; margin-top:-6px;">Menuju Masa Depan</div>
                <p class="cta-desc">
                    Program SimpulSae hadir untuk memperkuat potensi desa, memberdayakan pemuda, dan menciptakan dampak berkelanjutan secara terukur.
                </p>
                <a href="{{ url('/tentang') }}" class="btn-cta-green">
                    Tentang SimpulSae &rarr;
                </a>
            </div>

            <div class="cta-right-img">
                <img src="{{ asset('images/hero5.png') }}" 
                     alt="Kegiatan Desa" 
                     class="interactive-img" 
                     onclick="rotateImage(this)">
            </div>
        </div>
    </div>

</div>

<!-- JS Animation & Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });

    // 1. ANIMASI GAMBAR BERPUTAR (3D ROTATE) SAAT DI-KLIK
    function rotateImage(element) {
        element.classList.add('flip-active');
        setTimeout(() => {
            element.classList.remove('flip-active');
        }, 850);
    }

    // 2. ANIMASI ANGKA COUNTER BERGERAK (Mulai dari 0 sampai Nilai Asli)
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.counter');
        const speed = 100; // Kecepatan hitung

        const animateCounters = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                let count = 0;
                const inc = target / speed;

                const updateCount = () => {
                    count += inc;
                    if (count < target) {
                        counter.innerText = Math.ceil(count).toLocaleString('id-ID');
                        setTimeout(updateCount, 15);
                    } else {
                        counter.innerText = target.toLocaleString('id-ID');
                    }
                };
                updateCount();
            });
        };

        // Trigger animasi angka saat elemen terkejar scroll
        let animated = false;
        window.addEventListener('scroll', () => {
            const statsSection = document.querySelector('.stats-section');
            if(statsSection) {
                const position = statsSection.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;
                if(position < screenPosition && !animated) {
                    animateCounters();
                    animated = true;
                }
            }
        });

        // Jalankan langsung jika sudah berada di viewport atas
        animateCounters();
    });

    // 3. POPUP MODAL SAAT CARD DI-KLIK
    function showPopup(title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'info',
            confirmButtonColor: '#05845c',
            confirmButtonText: 'Tutup'
        });
    }
</script>
@endsection