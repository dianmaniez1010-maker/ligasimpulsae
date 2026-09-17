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
        --brand-green: #05845c;
        --brand-green-hover: #046c4b;
        --brand-cyan: #2dd4bf;
    }

    body {
        background-color: var(--bg-light);
        color: var(--text-dark);
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .desa-wrapper {
        overflow-x: hidden;
    }

    /* ==========================================
   1. HERO SECTION (24 Desa)
========================================== */
.hero-desa {
    position: relative;
    width: 100%;
    min-height: 520px; /* Samakan tinggi dengan Liga Desa & Dampak */
    background: linear-gradient(to right, rgba(2, 6, 23, 0.85) 0%, rgba(15, 23, 42, 0.45) 60%, transparent 100%), 
                url('{{ asset('images/hero6.png') }}') center/cover no-repeat;
    display: flex;
    align-items: center;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.hero-container {
    max-width: 1280px;
    width: 100%;
    margin: 0 auto;
    padding: 60px 20px 80px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    z-index: 10;
}

.hero-text-side {
    max-width: 600px;
}

.hero-title-main {
    font-size: 48px;
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 8px;
    color: #ffffff;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}

    .hero-subtitle {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        margin-bottom: 24px;
    }

    .btn-peta-lengkap {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: #ffffff;
        border: 1.5px solid rgba(255, 255, 255, 0.7);
        padding: 10px 22px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 13px;
        text-decoration: none;
        backdrop-filter: blur(4px);
        transition: all 0.3s ease;
    }

    .btn-peta-lengkap:hover {
        background: #ffffff;
        color: var(--brand-green);
        border-color: #ffffff;
    }

    /* Floating Filter Bar di Kanan Bawah Hero */
    .hero-quick-filter {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 12px 20px;
        border-radius: 14px;
        display: flex;
        gap: 16px;
        align-items: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .quick-filter-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--text-dark);
        font-size: 13px;
        font-weight: 700;
        padding: 6px 12px;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.2s;
    }

    .quick-filter-item:hover {
        background: #f1f5f9;
    }

    .quick-filter-item i {
        color: var(--brand-green);
        font-size: 15px;
    }

    /* ==========================================
       2. MAIN CONTENT (MAP & SIDE CARD)
    ========================================== */
    .main-section {
        max-width: 1200px;
        margin: 30px auto 60px;
        padding: 0 20px;
    }

    /* Filter Tabs & Search Bar Header */
    .filter-header-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        gap: 20px;
    }

    .tab-filters {
        display: flex;
        gap: 10px;
        overflow-x: auto;
    }

    .tab-btn {
        background: #ffffff;
        border: 1px solid var(--border-color);
        color: var(--text-muted);
        padding: 8px 18px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.3s ease;
    }

    .tab-btn.active, .tab-btn:hover {
        background: var(--brand-green);
        color: #ffffff;
        border-color: var(--brand-green);
    }

    .search-box-desa {
        position: relative;
        min-width: 260px;
    }

    .search-box-desa input {
        width: 100%;
        background: #ffffff;
        border: 1px solid var(--border-color);
        padding: 9px 38px 9px 16px;
        border-radius: 20px;
        font-size: 13px;
        outline: none;
        transition: border-color 0.3s;
    }

    .search-box-desa input:focus {
        border-color: var(--brand-green);
    }

    .search-box-desa i {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        font-size: 14px;
    }

    /* Grid Layout Map + Side Card */
    .map-content-grid {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 24px;
        margin-bottom: 50px;
    }

    /* Container Peta Visual */
    .map-container-box {
        background: #eef7f4;
        border-radius: 20px;
        border: 1px solid var(--border-color);
        position: relative;
        min-height: 480px;
        overflow: hidden;
        box-shadow: inset 0 0 20px rgba(5, 132, 92, 0.05);
    }

    /* SVG Map Vector Placeholder Styling */
    .svg-map-bg {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    /* Animasi Pin Map Berdenyut (Pulse) */
    .map-pin {
        position: absolute;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: rgba(5, 132, 92, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.3s ease;
        animation: pulsePin 2s infinite;
    }

    .map-pin i {
        font-size: 18px;
        color: var(--brand-green);
    }

    .map-pin.blue i {
        color: #0284c7;
    }

    @keyframes pulsePin {
        0% { box-shadow: 0 0 0 0 rgba(5, 132, 92, 0.4); }
        70% { box-shadow: 0 0 0 12px rgba(5, 132, 92, 0); }
        100% { box-shadow: 0 0 0 0 rgba(5, 132, 92, 0); }
    }

    .map-pin:hover {
        transform: scale(1.3) translateY(-4px);
        z-index: 10;
    }

    /* Side Card Preview (Desa Pilihan) */
    .side-desa-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid var(--border-color);
        padding: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .side-desa-card h4.card-header-title {
        font-size: 15px;
        font-weight: 800;
        margin-bottom: 14px;
        color: var(--text-dark);
    }

    .preview-img-box {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
        height: 160px;
        margin-bottom: 16px;
    }

    .preview-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .side-desa-card:hover .preview-img-box img {
        transform: scale(1.08);
    }

    .desa-info-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 16px;
    }

    .desa-info-header h3 {
        font-size: 18px;
        font-weight: 800;
        margin: 0;
    }

    .desa-info-header p {
        font-size: 12px;
        color: var(--text-muted);
        margin: 2px 0 0 0;
    }

    .badge-aktif {
        background: #dcfce7;
        color: var(--brand-green);
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 700;
    }

    /* List Stats Dalam Side Card */
    .desa-stats-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-bottom: 20px;
    }

    .stat-row-item {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .stat-row-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: #e6f4fe;
        color: var(--brand-green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .stat-row-text p {
        font-size: 11px;
        color: var(--text-muted);
        margin: 0;
    }

    .stat-row-text strong {
        font-size: 13px;
        color: var(--text-dark);
    }

    .btn-lihat-detail-desa {
        width: 100%;
        background: var(--brand-green);
        color: #ffffff;
        border: none;
        padding: 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-lihat-detail-desa:hover {
        background: var(--brand-green-hover);
        transform: translateY(-2px);
    }

    /* ==========================================
       3. DAFTAR GRID DESA (BOTTOM CARDS)
    ========================================== */
    .grid-desa-header {
        font-size: 18px;
        font-weight: 800;
        margin-bottom: 16px;
    }

    .desa-cards-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }

    .desa-card-item {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid var(--border-color);
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .desa-card-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.08);
        border-color: var(--brand-green);
    }

    .desa-card-img {
        height: 120px;
        width: 100%;
        overflow: hidden;
    }

    .desa-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .desa-card-item:hover .desa-card-img img {
        transform: scale(1.1);
    }

    .desa-card-body {
        padding: 14px;
    }

    .desa-card-body h5 {
        font-size: 14px;
        font-weight: 800;
        margin: 0 0 2px 0;
    }

    .desa-card-body p {
        font-size: 11px;
        color: var(--text-muted);
        margin: 0;
    }

    .pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 16px;
    margin-top: 24px;
}

.page-btn {
    background: #ffffff;
    border: 1px solid var(--border-color);
    color: var(--text-dark);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
}

.page-btn:hover:not(:disabled) {
    background: var(--brand-green);
    color: #ffffff;
    border-color: var(--brand-green);
}

.page-btn:disabled {
    opacity: 0.4;
    cursor: not-allowed;
}

.page-info {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-muted);
}

    /* RESPONSIVE LAYOUT */
    @media (max-width: 1024px) {
        .map-content-grid { grid-template-columns: 1fr; }
        .desa-cards-grid { grid-template-columns: repeat(2, 1fr); }
        .hero-container { flex-direction: column; align-items: flex-start; gap: 20px; }
    }

    @media (max-width: 640px) {
        .desa-cards-grid { grid-template-columns: 1fr; }
        .hero-title-main { font-size: 30px; }
        .filter-header-bar { flex-direction: column; align-items: stretch; }
    }
</style>

<div class="desa-wrapper">

    <!-- 1. HERO SECTION (24 Desa) -->
<section class="hero-desa">

    <!-- Kontainer Utama Teks & Quick Filter -->
    <div class="hero-container">
        
        <!-- Teks Sisi Kiri -->
        <div class="hero-text-side" data-aos="fade-right">
            <h1 class="hero-title-main">24 Desa</h1>
            <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 14px; color: #6ee7b7; text-shadow: 0 1px 4px rgba(0,0,0,0.4);">
                Satu Ekosistem, Banyak Potensi
            </h2>
            <p class="hero-subtitle" style="font-size: 15px; color: #e2e8f0; line-height: 1.6; margin-bottom: 24px;">
                Jelajahi 24 desa di Kota Batu yang menjadi bagian dari program Liga Desa SimpulSae. Setiap desa memiliki potensi unik untuk dikembangkan bersama.
            </p>
            <a href="#mapSection" style="display: inline-flex; align-items: center; gap: 10px; padding: 12px 26px; border-radius: 9999px; background-color: #059669; color: #ffffff; font-weight: 700; font-size: 14px; text-decoration: none; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);">
                <span>Lihat Peta Lengkap</span>
                <i class="fa-solid fa-arrow-right" style="font-size: 12px;"></i>
            </a>
        </div>

        <!-- Floating Quick Filter di Kanan -->
        <div class="hero-quick-filter" data-aos="fade-left" style="display: flex; flex-direction: column; gap: 12px; min-width: 210px;">
            <div style="padding: 12px 20px; border-radius: 16px; background-color: rgba(15, 23, 42, 0.65); backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.2); color: #ffffff; font-size: 14px; font-weight: 600; display: flex; align-items: center; gap: 12px;">
                <div style="width: 32px; height: 32px; border-radius: 50%; background-color: rgba(16, 185, 129, 0.2); display: flex; align-items: center; justify-content: center; color: #34d399;">
                    <i class="fa-solid fa-house-chimney" style="font-size: 14px;"></i>
                </div>
                <span>24 Desa</span>
            </div>

            <div style="padding: 12px 20px; border-radius: 16px; background-color: rgba(15, 23, 42, 0.65); backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.2); color: #ffffff; font-size: 14px; font-weight: 600; display: flex; align-items: center; gap: 12px;">
                <div style="width: 32px; height: 32px; border-radius: 50%; background-color: rgba(16, 185, 129, 0.2); display: flex; align-items: center; justify-content: center; color: #34d399;">
                    <i class="fa-solid fa-location-dot" style="font-size: 14px;"></i>
                </div>
                <span>3 Kecamatan</span>
            </div>

            <div style="padding: 12px 20px; border-radius: 16px; background-color: rgba(15, 23, 42, 0.65); backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.2); color: #ffffff; font-size: 14px; font-weight: 600; display: flex; align-items: center; gap: 12px;">
                <div style="width: 32px; height: 32px; border-radius: 50%; background-color: rgba(16, 185, 129, 0.2); display: flex; align-items: center; justify-content: center; color: #34d399;">
                    <i class="fa-solid fa-coins" style="font-size: 14px;"></i>
                </div>
                <span>Kategori Utama</span>
            </div>
        </div>

    </div>

    <!-- Wave / Gelombang Bawah Halaman -->
    <div style="position: absolute; bottom: 0; left: 0; right: 0; width: 100%; overflow: hidden; line-height: 0; z-index: 10; pointer-events: none;">
        <svg style="position: relative; display: block; width: 100%; height: 55px; color: #f8fafc;" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z" fill="currentColor"></path>
        </svg>
    </div>

</section>

    <!-- 2. MAIN SECTION (MAP & PREVIEW) -->
    <section class="main-section" id="mapSection">
        
        <!-- Filter Tabs & Search Bar -->
<div class="filter-header-bar" data-aos="fade-up">
    <div class="tab-filters">
        <button class="tab-btn active" onclick="filterKecamatan('all', this)">Semua Desa</button>
        <button class="tab-btn" onclick="filterKecamatan('bumiaji', this)">Kecamatan Bumiaji</button>
        <button class="tab-btn" onclick="filterKecamatan('batu', this)">Kecamatan Batu</button>
        <button class="tab-btn" onclick="filterKecamatan('junrejo', this)">Kecamatan Junrejo</button>
    </div>

    <div class="search-box-desa">
        <input type="text" id="searchInput" placeholder="Cari nama desa..." onkeyup="onSearchInput()">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
</div>

<!-- Grid Layout Peta dan Side Card Preview -->
<div class="map-content-grid">
    
    <!-- Peta Visual Interaktif -->
    <div class="map-container-box" data-aos="zoom-in">
        <svg class="svg-map-bg" viewBox="0 0 800 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M150 120 C 250 80, 450 60, 600 100 C 700 150, 750 300, 650 420 C 500 480, 250 450, 120 380 C 50 300, 80 180, 150 120 Z" fill="#d1fae5" stroke="#a7f3d0" stroke-width="3"/>
            <path d="M200 160 C 300 130, 420 140, 520 180 C 580 250, 500 360, 380 390 C 240 380, 180 280, 200 160 Z" fill="#a7f3d0" opacity="0.5"/>
        </svg>

        <!-- Dynamic Map Pins (Rendered via JS) -->
        <div id="mapPinsContainer"></div>
    </div>

    <!-- Side Card Preview Desa Pilihan -->
    <div class="side-desa-card" data-aos="fade-left">
        <h4 class="card-header-title">Desa Pilihan</h4>

        <div class="preview-img-box">
            <img id="previewImg" src="" alt="Foto Desa">
        </div>

        <div class="desa-info-header">
            <div>
                <h3 id="previewTitle">-</h3>
                <p id="previewKecamatan">-</p>
            </div>
            <span class="badge-aktif">Aktif</span>
        </div>

        <div class="desa-stats-list">
            <div class="stat-row-item">
                <div class="stat-row-icon"><i class="fa-solid fa-seedling"></i></div>
                <div class="stat-row-text">
                    <p>Potensi Utama</p>
                    <strong id="previewPotensi">-</strong>
                </div>
            </div>

            <div class="stat-row-item">
                <div class="stat-row-icon"><i class="fa-solid fa-store"></i></div>
                <div class="stat-row-text">
                    <p>UMKM Terdaftar</p>
                    <strong class="counter-num" id="previewUMKM">0</strong>
                </div>
            </div>

            <div class="stat-row-item">
                <div class="stat-row-icon"><i class="fa-solid fa-users"></i></div>
                <div class="stat-row-text">
                    <p>Pemuda Pelopor</p>
                    <strong class="counter-num" id="previewPemuda">0</strong>
                </div>
            </div>
        </div>

        <button class="btn-lihat-detail-desa" onclick="openDetailPopup()">
            Lihat Detail Desa &rarr;
        </button>
    </div>
</div>

<!-- DAFTAR GRID DESA (BOTTOM CARDS) -->
<h3 class="grid-desa-header">Daftar Desa</h3>
<div class="desa-cards-grid" id="desaGrid"></div>

<!-- PAGINATION CONTROLS -->
<div class="pagination-wrapper">
    <button class="page-btn" id="prevBtn" onclick="changePage(-1)"><i class="fa-solid fa-chevron-left"></i> Prev</button>
    <span class="page-info" id="pageInfo">Halaman 1 dari 1</span>
    <button class="page-btn" id="nextBtn" onclick="changePage(1)">Next <i class="fa-solid fa-chevron-right"></i></button>
</div>
            </div>

        </div>

    </section>

</div>

<!-- JS Animations & Script Interaktif -->
<!-- 3. PENEMPATAN JAVASCRIPT ADA DI SINI (Di Paling Bawah) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        // MASTER DATA DESA DI KOTA BATU (24 Desa)
        const desaData = [
            // Bumiaji
            { nama: "Bumiaji", kecamatan: "bumiaji", potensi: "Wisata Petik Apel", umkm: 45, pemuda: 60, top: "25%", left: "28%", img: "https://images.unsplash.com/photo-1596495578065-6e0763fa1178?auto=format&fit=crop&w=600&q=80" },
            { nama: "Giripurno", kecamatan: "bumiaji", potensi: "Pertanian Hortikultura", umkm: 30, pemuda: 40, top: "30%", left: "45%", img: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=600&q=80" },
            { nama: "Gunungsari", kecamatan: "bumiaji", potensi: "Budidaya Bunga Hias", umkm: 38, pemuda: 52, top: "20%", left: "35%", img: "https://images.unsplash.com/photo-1513836279014-a89f7a76ae86?auto=format&fit=crop&w=600&q=80" },
            { nama: "Pandanrejo", kecamatan: "bumiaji", potensi: "Wisata Stroberi", umkm: 29, pemuda: 44, top: "38%", left: "48%", img: "https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=600&q=80" },
            { nama: "Punten", kecamatan: "bumiaji", potensi: "Agrowisata Jeruk", umkm: 32, pemuda: 46, top: "35%", left: "38%", img: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=600&q=80" },
            { nama: "Sumber Brantas", kecamatan: "bumiaji", potensi: "Pertanian Sayur", umkm: 25, pemuda: 39, top: "15%", left: "40%", img: "https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=600&q=80" },
            { nama: "Sumbergondo", kecamatan: "bumiaji", potensi: "Pengelolaan Sampah & Eco", umkm: 28, pemuda: 35, top: "50%", left: "55%", img: "https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=600&q=80" },
            { nama: "Tulungrejo", kecamatan: "bumiaji", potensi: "Wisata Coban Talun", umkm: 50, pemuda: 72, top: "65%", left: "45%", img: "https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=600&q=80" },

            // Batu
            { nama: "Oro-Oro Ombo", kecamatan: "batu", potensi: "Homestay & Destinasi Wisata", umkm: 65, pemuda: 80, top: "55%", left: "32%", img: "https://images.unsplash.com/photo-1596495578065-6e0763fa1178?auto=format&fit=crop&w=600&q=80" },
            { nama: "Pesanggrahan", kecamatan: "batu", potensi: "Kuliner & Kerajinan", umkm: 42, pemuda: 50, top: "48%", left: "28%", img: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=600&q=80" },
            { nama: "Sidomulyo", kecamatan: "batu", potensi: "Pusat Bunga Hias", umkm: 55, pemuda: 68, top: "42%", left: "36%", img: "https://images.unsplash.com/photo-1513836279014-a89f7a76ae86?auto=format&fit=crop&w=600&q=80" },

            // Junrejo
            { nama: "Beji", kecamatan: "junrejo", potensi: "Sentra Keripik & Tempe", umkm: 36, pemuda: 41, top: "68%", left: "60%", img: "https://images.unsplash.com/photo-1596495578065-6e0763fa1178?auto=format&fit=crop&w=600&q=80" },
            { nama: "Dadaprejo", kecamatan: "junrejo", potensi: "Kerajinan Gerabah", umkm: 27, pemuda: 38, top: "80%", left: "65%", img: "https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=600&q=80" },
            { nama: "Junrejo", kecamatan: "junrejo", potensi: "Kriya Kayu & Souvenir", umkm: 31, pemuda: 45, top: "62%", left: "58%", img: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=600&q=80" },
            { nama: "Mojorejo", kecamatan: "junrejo", potensi: "Olahan Makanan & Batik", umkm: 33, pemuda: 42, top: "75%", left: "55%", img: "https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=600&q=80" },
            { nama: "Pendem", kecamatan: "junrejo", potensi: "Kerajinan & Sentra Kuliner", umkm: 40, pemuda: 50, top: "72%", left: "68%", img: "https://images.unsplash.com/photo-1513836279014-a89f7a76ae86?auto=format&fit=crop&w=600&q=80" },
            { nama: "Tlekung", kecamatan: "junrejo", potensi: "Peternakan & Agro Edukasi", umkm: 22, pemuda: 30, top: "78%", left: "50%", img: "https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=600&q=80" },
            { nama: "Torongrejo", kecamatan: "junrejo", potensi: "Pertanian Organik", umkm: 26, pemuda: 34, top: "58%", left: "64%", img: "https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=600&q=80" }
        ];

        let currentPage = 1;
        const itemsPerPage = 4;
        let filteredDesa = [...desaData];

        document.addEventListener("DOMContentLoaded", () => {
            renderMapPins();
            renderDesaGrid();
            if(desaData.length > 0) {
                const d = desaData[0];
                selectDesa(d.nama, d.kecamatan, d.potensi, d.umkm, d.pemuda, d.img);
            }

            // TAMBAHKAN 4 BARIS INI:
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
            searchInput.addEventListener('input', onSearchInput);
            }
        });

        function renderMapPins() {
            const pinContainer = document.getElementById('mapPinsContainer');
            if (!pinContainer) return;
            pinContainer.innerHTML = desaData.map(d => `
                <div class="map-pin ${d.kecamatan === 'batu' ? 'blue' : ''}" 
                     style="top: ${d.top}; left: ${d.left};" 
                     onclick="selectDesa('${d.nama}', '${d.kecamatan}', '${d.potensi}', ${d.umkm}, ${d.pemuda}, '${d.img}')" 
                     title="Desa ${d.nama}">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
            `).join('');
        }

        function renderDesaGrid() {
    const grid = document.getElementById('desaGrid');
    if (!grid) return;
    grid.innerHTML = '';

    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const pageItems = filteredDesa.slice(start, end);

    if (pageItems.length === 0) {
        grid.innerHTML = `<p style="grid-column: 1/-1; text-align: center; color: var(--text-muted); padding: 20px;">Desa tidak ditemukan.</p>`;
    } else {
        pageItems.forEach(d => {
            const card = document.createElement('div');
            card.className = 'desa-card-item';
            card.style.cursor = 'pointer';
            card.onclick = () => selectDesa(d.nama, d.kecamatan, d.potensi, d.umkm, d.pemuda, d.img);
            card.innerHTML = `
                <div class="desa-card-img" style="height: 140px; overflow: hidden; border-radius: 12px 12px 0 0;">
                    <img src="${d.img}" alt="Desa ${d.nama}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="desa-card-body" style="padding: 12px; background: #ffffff; border-radius: 0 0 12px 12px;">
                    <h5 style="margin: 0; font-size: 16px; font-weight: 700; color: #1e293b;">Desa ${d.nama}</h5>
                    <p style="margin: 4px 0 0 0; font-size: 13px; color: #64748b;">Kecamatan ${capitalize(d.kecamatan)}</p>
                </div>
            `;
            grid.appendChild(card);
        });
    }

    updatePaginationControls();
}

        function updatePaginationControls() {
            const totalPages = Math.ceil(filteredDesa.length / itemsPerPage) || 1;
            const pageInfo = document.getElementById('pageInfo');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            
            if(pageInfo) pageInfo.innerText = `Halaman ${currentPage} dari ${totalPages}`;
            if(prevBtn) prevBtn.disabled = currentPage === 1;
            if(nextBtn) nextBtn.disabled = currentPage === totalPages;
        }

        function changePage(direction) {
            currentPage += direction;
            renderDesaGrid();
        }

        // 1. TAMBAHKAN FUNGSI HELPER CAPITALIZE (Agar tidak error saat dipanggil)
function capitalize(str) {
    if (!str) return '';
    return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
}

// FUNGSI SEARCH DESA (Otomatis Pindah Tab Kecamatan)
function onSearchInput() {
    const searchInput = document.getElementById('searchInput');
    if (!searchInput) return;

    let query = searchInput.value.toLowerCase().trim();
    query = query.replace(/^desa\s+/i, '').replace(/^kecamatan\s+/i, '');

    // 1. Jika input pencarian KOSONG, kembalikan ke tab "Semua Desa"
    if (query === '') {
        updateActiveTabUI('all');
        filteredDesa = [...desaData];
    } else {
        // 2. Cari desa yang cocok dengan kata kunci
        const matchedDesa = desaData.filter(d => 
            d.nama.toLowerCase().includes(query) || 
            d.kecamatan.toLowerCase().includes(query)
        );

        if (matchedDesa.length > 0) {
            // Jika pencarian mengarah ke 1 kecamatan tertentu, otomatis pindahkan Tab Active
            const firstMatchKec = matchedDesa[0].kecamatan.toLowerCase();
            const allSameKec = matchedDesa.every(d => d.kecamatan.toLowerCase() === firstMatchKec);

            if (allSameKec) {
                updateActiveTabUI(firstMatchKec); // Pindahkan highlight tombol hijau ke kecamatan tersebut
            } else {
                updateActiveTabUI('all');
            }

            filteredDesa = matchedDesa;

            // Update preview di kanan (Desa Pilihan)
            const d = matchedDesa[0];
            selectDesa(d.nama, d.kecamatan, d.potensi, d.umkm, d.pemuda, d.img);
        } else {
            filteredDesa = [];
        }
    }

    currentPage = 1;
    renderDesaGrid();
}

// FUNGSI HELPER: Memindahkan class 'active' (tombol hijau) pada Tab Kecamatan
function updateActiveTabUI(kecamatanTarget) {
    const buttons = document.querySelectorAll('.tab-btn');
    buttons.forEach(btn => {
        btn.classList.remove('active');
        const onclickAttr = (btn.getAttribute('onclick') || '').toLowerCase();
        
        if (kecamatanTarget === 'all' && onclickAttr.includes("'all'")) {
            btn.classList.add('active');
        } else if (kecamatanTarget !== 'all' && onclickAttr.includes(`'${kecamatanTarget}'`)) {
            btn.classList.add('active');
        }
    });
}

// 3. FUNGSI TAB KECAMATAN (Ditambahkan .toLowerCase() agar aman)
function filterKecamatan(kec, btnElement) {
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    btnElement.classList.add('active');

    const searchInput = document.getElementById('searchInput');
    let query = searchInput ? searchInput.value.toLowerCase().trim() : '';
    query = query.replace(/^desa\s+/i, '').replace(/^kecamatan\s+/i, '');

    const targetKec = kec.toLowerCase();

    if (targetKec === 'all') {
        filteredDesa = desaData.filter(d => d.nama.toLowerCase().includes(query));
    } else {
        filteredDesa = desaData.filter(d => d.kecamatan.toLowerCase() === targetKec && d.nama.toLowerCase().includes(query));
    }

    currentPage = 1;
    renderDesaGrid();

    if (filteredDesa.length > 0) {
        const d = filteredDesa[0];
        selectDesa(d.nama, d.kecamatan, d.potensi, d.umkm, d.pemuda, d.img);
    }
}

// 4. FUNGSI SELECT DESA
function selectDesa(nama, kecamatan, potensi, umkm, pemuda, imgSrc) {
    const elTitle = document.getElementById('previewTitle');
    const elKec = document.getElementById('previewKecamatan');
    const elPotensi = document.getElementById('previewPotensi');
    const elImg = document.getElementById('previewImg');

    if (elTitle) elTitle.innerText = 'Desa ' + nama;
    if (elKec) elKec.innerText = 'Kecamatan ' + capitalize(kecamatan);
    if (elPotensi) elPotensi.innerText = potensi;
    if (elImg) elImg.src = imgSrc;

    if (typeof animateSingleCounter === 'function') {
        animateSingleCounter('previewUMKM', umkm);
        animateSingleCounter('previewPemuda', pemuda);
    }
}

        function animateSingleCounter(elementId, targetValue) {
            const el = document.getElementById(elementId);
            if (!el) return;
            let start = 0;
            const duration = 400;
            const stepTime = 20;
            const steps = duration / stepTime;
            const increment = targetValue / steps;

            const timer = setInterval(() => {
                start += increment;
                if (start >= targetValue) {
                    el.innerText = targetValue;
                    clearInterval(timer);
                } else {
                    el.innerText = Math.ceil(start);
                }
            }, stepTime);
        }

        function capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        function openDetailPopup() {
            const namaDesa = document.getElementById('previewTitle').innerText;
            const kecamatan = document.getElementById('previewKecamatan').innerText;

            Swal.fire({
                title: namaDesa,
                text: `Informasi lengkap mengenai program pemberdayaan dan potensi unggulan di ${namaDesa}, ${kecamatan}.`,
                icon: 'info',
                confirmButtonColor: '#05845c',
                confirmButtonText: 'Tutup Detail'
            });
        }
    </script>

@endsection