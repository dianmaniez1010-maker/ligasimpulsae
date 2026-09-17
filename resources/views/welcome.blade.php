@extends('layouts.app')

@section('title', 'Liga Desa Simpulsae | Kota Batu')

@push('styles')
<style>
/* --- LANGUAGE SWITCHER BAR --- */
.lang-switcher-bar {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 8px;
    padding: 10px 15px;
    background: #092139;
    color: #fff;
    font-size: 12px;
}
.lang-btn {
    background: transparent;
    border: 1px solid rgba(255, 255, 255, 0.4);
    color: #fff;
    padding: 4px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 11px;
    font-weight: 600;
    transition: all 0.2s;
}
.lang-btn.active, .lang-btn:hover {
    background: #05845c;
    border-color: #05845c;
}

/* --- HERO SLIDER --- */
.hero-swiper { 
    width: 100%; 
    min-height: 520px; 
    position: relative; 
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.hero-slide {
    position: relative; 
    background-size: cover; 
    background-position: center;
    display: flex; 
    align-items: center; 
    min-height: 520px;
}

/* Gradien overlay disesuaikan persis dengan Halaman Dampak */
.hero-slide::before {
    content: ''; 
    position: absolute; 
    inset: 0;
    background: linear-gradient(to right, rgba(2, 6, 23, 0.85) 0%, rgba(15, 23, 42, 0.5) 60%, transparent 100%);
    z-index: 1;
}

.hero-slide .container { 
    position: relative; 
    z-index: 2; 
    color: #ffffff; 
    padding-top: 60px; 
    padding-bottom: 80px; 
    max-width: 1280px;
    margin: 0 auto;
    width: 100%;
}

/* HERO TITLE SIMPULSAE DENGAN BANNER HIJAU TRANSPARAN & DAUN */
.hero-content { max-width: 650px; }
.hero-title-top {
    font-size: 44px;
    font-weight: 900;
    color: #ffffff;
    letter-spacing: 1.5px;
    line-height: 1;
    text-transform: uppercase;
    margin-bottom: 6px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.hero-title-badge-green {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: rgba(5, 132, 92, 0.85);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    padding: 6px 20px 6px 16px;
    border-radius: 4px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    margin-bottom: 16px;
    position: relative;
    max-width: 100%;
}

.hero-title-badge-green span {
    font-size: 42px;
    font-weight: 900;
    letter-spacing: 2px;
    color: #ffffff;
    text-transform: uppercase;
    line-height: 1;
}

/* Icon Daun Putih */
.leaf-icon {
    width: 32px;
    height: 32px;
    fill: #ffffff;
    flex-shrink: 0;
}

.hero-subtitle-bold { font-size: 20px; font-weight: 800; color: #ffffff; margin-bottom: 8px; line-height: 1.3; }
.hero-subtitle-desc { font-size: 15px; color: #e2e8f0; margin-bottom: 24px; line-height: 1.6; }

.hero-buttons { display: flex; gap: 12px; flex-wrap: wrap; }

.btn-primary-hero { 
    background: #059669; 
    color: #ffffff; 
    padding: 12px 26px; 
    border-radius: 9999px; 
    font-size: 14px; 
    font-weight: 700; 
    display: inline-flex; 
    align-items: center; 
    justify-content: center; 
    gap: 10px; 
    border: 0; 
    text-decoration: none; 
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
    transition: all 0.2s; 
}
.btn-primary-hero:hover { background: #10b981; color: #fff; }

.btn-outline-hero { 
    border: 1px solid rgba(255,255,255,0.4); 
    background: rgba(15, 23, 42, 0.4);
    backdrop-filter: blur(4px);
    color: #ffffff; 
    padding: 12px 26px; 
    border-radius: 9999px; 
    font-size: 14px; 
    font-weight: 700; 
    text-decoration: none; 
    display: inline-flex; 
    align-items: center; 
    justify-content: center;
    transition: all 0.2s;
}
.btn-outline-hero:hover { background: rgba(255, 255, 255, 0.15); color: #fff; }

/* --- STATS BAR --- */
.stats-wrapper { margin-top: -30px; position: relative; z-index: 10; padding: 0 15px; }
.stats-card { background: #ffffff; border-radius: 12px; padding: 18px 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.06); display: grid; grid-template-columns: 160px repeat(5, 1fr); align-items: center; gap: 12px; border: 1px solid #e2e8f0; }
.stats-title { font-size: 14px; font-weight: 800; color: #0f172a; line-height: 1.2; }
.stat-item { display: flex; align-items: center; gap: 10px; border-left: 1px solid #e2e8f0; padding-left: 12px; }
.stat-icon { width: 34px; height: 34px; border-radius: 50%; background: #eaf6f2; color: #05845c; display: grid; place-items: center; font-size: 14px; flex-shrink: 0; }
.stat-number { font-size: 16px; font-weight: 800; color: #0f172a; display: block; }
.stat-label { font-size: 11px; color: #64748b; display: block; }

/* --- SECTIONS COMMON & NAV ARROWS --- */
.section { padding: 45px 0; }
.section-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 20px; gap: 15px; }
.section-title { font-size: 22px; font-weight: 800; color: #0f172a; margin-bottom: 4px; }
.section-subtitle { font-size: 13px; color: #64748b; }

.nav-controls { display: flex; gap: 8px; flex-shrink: 0; }
.nav-arrow {
    width: 34px; height: 34px; border-radius: 50%; background: #fff; border: 1px solid #cbd5e1;
    display: flex; align-items: center; justify-content: center; color: #0f172a; cursor: pointer;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08); z-index: 10; transition: all 0.2s;
}
.nav-arrow:hover { background: #05845c; color: #fff; border-color: #05845c; }

/* --- MENGAPA LIGA DESA --- */
.feature-card { background: #fff; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; height: 100%; display: flex; flex-direction: column; }
.feature-img { height: 140px; background-size: cover; background-position: center; width: 100%; }
.feature-body { padding: 14px; position: relative; flex-grow: 1; }
.feature-icon-badge { width: 28px; height: 28px; background: #05845c; color: #fff; border-radius: 50%; display: grid; place-items: center; margin-top: -28px; margin-bottom: 8px; border: 2px solid #fff; font-size: 11px; }
.feature-body h3 { font-size: 14px; font-weight: 700; margin-bottom: 4px; color: #0f172a; }
.feature-body p { font-size: 12px; color: #64748b; line-height: 1.4; }

.cta-card {
    background: #092139; color: #fff; padding: 20px; border-radius: 12px;
    display: flex; flex-direction: column; justify-content: space-between; height: 100%;
    background-image: linear-gradient(135deg, rgba(5, 132, 92, 0.4) 0%, rgba(9, 33, 57, 1) 100%);
}
.cta-card h3 { font-size: 16px; font-weight: 800; margin-bottom: 8px; line-height: 1.3; }
.cta-card p { font-size: 12px; opacity: 0.9; margin-bottom: 12px; }

/* --- PILAR & TAHAPAN IMPLEMENTASI --- */
.sae-tahapan-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    align-items: stretch;
}

.pilar-section-wrapper {
    background: #ffffff;
    border-radius: 16px;
    padding: 24px;
    border: 1px solid #f1f5f9;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.pilar-grid-horizontal {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-top: 20px;
}

.pilar-col {
    padding-right: 12px;
    border-right: 1px solid #e2e8f0;
}
.pilar-col:last-child {
    border-right: none;
    padding-right: 0;
}

.pilar-header-inline {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
}

.pilar-circle-icon {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 15px;
    flex-shrink: 0;
}

.pilar-circle-icon.green { background: #05845c; }
.pilar-circle-icon.blue { background: #0284c7; }
.pilar-circle-icon.orange { background: #f59e0b; }

.pilar-letter { font-size: 24px; font-weight: 900; }
.pilar-letter.green { color: #05845c; }
.pilar-letter.blue { color: #0284c7; }
.pilar-letter.orange { color: #f59e0b; }

.pilar-item-title { font-size: 14px; font-weight: 800; margin-bottom: 6px; }
.pilar-item-title.green { color: #05845c; }
.pilar-item-title.blue { color: #0284c7; }
.pilar-item-title.orange { color: #f59e0b; }

.pilar-item-desc { font-size: 11px; color: #64748b; line-height: 1.45; margin: 0; }

.tahapan-wrapper-green {
    background: #f0fdf4;
    border: 1px solid #dcfce7;
    border-radius: 16px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.tahapan-flow-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
    margin-top: 20px;
    position: relative;
}

.tahap-flow-card { position: relative; text-align: left; }

.tahap-node-wrapper {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
    position: relative;
}

.tahap-circle-num {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    color: #ffffff;
    font-weight: 800;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
    flex-shrink: 0;
}

.tahap-circle-num.c1 { background: #05845c; }
.tahap-circle-num.c2 { background: #0284c7; }
.tahap-circle-num.c3 { background: #047857; }
.tahap-circle-num.c4 { background: #064e3b; }

.tahap-line-arrow {
    flex-grow: 1;
    height: 2px;
    background: #cbd5e1;
    position: relative;
    margin: 0 4px;
}

.tahap-line-arrow::after {
    content: '';
    position: absolute;
    right: 0;
    top: -3px;
    width: 0;
    height: 0;
    border-top: 4px solid transparent;
    border-bottom: 4px solid transparent;
    border-left: 6px solid #cbd5e1;
}

.tahap-flow-card h4 { font-size: 12px; font-weight: 800; color: #0f172a; line-height: 1.3; margin: 0 0 8px 0; }
.tahap-flow-card ul { list-style: none; padding: 0; margin: 0; }
.tahap-flow-card ul li { font-size: 10px; color: #475569; line-height: 1.4; margin-bottom: 4px; position: relative; padding-left: 8px; }
.tahap-flow-card ul li::before { content: '•'; position: absolute; left: 0; color: #94a3b8; }

/* --- JELAJAHI 24 DESA --- */
.desa-section-grid { display: grid; grid-template-columns: 1fr 320px; gap: 20px; align-items: stretch; }
.desa-card { background: #fff; border-radius: 10px; overflow: hidden; border: 1px solid #e2e8f0; height: 100%; display: flex; flex-direction: column; }
.desa-img { height: 120px; background-size: cover; background-position: center; width: 100%; }
.desa-body { padding: 12px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between; }
.desa-body h4 { font-size: 13px; font-weight: 700; color: #0f172a; margin: 0; }
.desa-body small { color: #64748b; font-size: 10px; display: block; margin-bottom: 8px; }
.tags { display: flex; gap: 4px; flex-wrap: wrap; margin-bottom: 8px; }
.tag { font-size: 9px; padding: 2px 6px; background: #f1f5f9; border-radius: 4px; color: #475569; }

/* SIDEBAR PETA */
.map-sidebar {
    background: #092139; color: #fff; border-radius: 12px; padding: 20px;
    display: flex; flex-direction: column; justify-content: space-between;
    position: relative; overflow: hidden;
    background-image: radial-gradient(rgba(255,255,255,0.12) 1.5px, transparent 1.5px);
    background-size: 14px 14px;
}
.map-sidebar h3 { font-size: 16px; font-weight: 800; margin-bottom: 4px; }
.map-sidebar p { font-size: 11px; opacity: 0.8; }
.map-vector-container { position: relative; width: 100%; height: 180px; margin: 15px 0; border-radius: 8px; background: rgba(255,255,255,0.03); display: grid; place-items: center; }
.map-pin { width: 10px; height: 10px; background: #10b981; border: 2px solid #ffffff; border-radius: 50%; position: absolute; box-shadow: 0 0 8px #10b981; }

/* --- KISAH DESA & BANNER MITRA --- */
.news-grid-layout { display: grid; grid-template-columns: minmax(0, 2fr) minmax(0, 1fr); gap: 24px; align-items: stretch; }

/* MEDIA QUERIES RESPONSIVE (TABLET & MOBILE) */
@media (max-width: 1024px) {
    .sae-tahapan-container { grid-template-columns: 1fr; }
    .tahapan-flow-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; }
    .tahap-line-arrow { display: none; }
    .desa-section-grid { grid-template-columns: 1fr; }
    .map-sidebar { min-height: 280px; }
    .news-grid-layout { grid-template-columns: 1fr; }
}

@media (max-width: 768px) {
    .stats-card { grid-template-columns: 1fr 1fr; gap: 16px; }
    .stats-title { grid-column: span 2; font-size: 16px; text-align: center; margin-bottom: 4px; }
    .stat-item { border-left: none; padding-left: 0; }
    .pilar-grid-horizontal { grid-template-columns: 1fr; gap: 16px; }
    .pilar-col { border-right: none; border-bottom: 1px solid #e2e8f0; padding-right: 0; padding-bottom: 12px; }
    .pilar-col:last-child { border-bottom: none; padding-bottom: 0; }
}

@media (max-width: 640px) {
    .hero-swiper { min-height: 480px; }
    .hero-slide { min-height: 480px; }
    .hero-title-top { font-size: 28px; letter-spacing: 1px; }
    .hero-title-badge-green { padding: 4px 12px; margin-bottom: 12px; }
    .hero-title-badge-green span { font-size: 26px; letter-spacing: 1px; }
    .leaf-icon { width: 22px; height: 22px; }
    .hero-subtitle-bold { font-size: 16px; line-height: 1.35; }
    .hero-subtitle-desc { font-size: 13px; line-height: 1.5; margin-bottom: 20px; }
    .btn-primary-hero, .btn-outline-hero { padding: 10px 16px; font-size: 12px; width: 100%; text-align: center; justify-content: center; }
    .hero-buttons { flex-direction: column; gap: 8px; width: 100%; }
    
    .stats-card { grid-template-columns: 1fr 1fr; gap: 12px; padding: 16px; }
    .stat-number { font-size: 16px; }
    .stat-label { font-size: 11px; }

    /* 1. Tahapan: 2 kolom (Sudah terbukti pas) */
    .tahapan-flow-grid { display: grid !important; grid-template-columns: repeat(2, 1fr) !important; gap: 12px !important; }

    /* 2. Pilar: Pembungkus luar tetapkan Flex Column agar judul tetap di atas */
    .pilar-section, [class*="pilar-section"] { display: flex !important; flex-direction: column !important; }

    /* Hanya 3 Kartunya yang dibuat 3 Kolom Menyamping */
    .pilar-grid, .pilar-cards, .pilar-flow-grid { 
        display: grid !important; 
        grid-template-columns: repeat(3, 1fr) !important; 
        gap: 6px !important; 
    }

    /* Penyesuaian isi kartu pilar agar teks fit di layar HP */
    .pilar-card, [class*="pilar-card"] { padding: 6px !important; text-align: center; }
    .pilar-card p, [class*="pilar-card"] p { font-size: 9px !important; line-height: 1.2 !important; }
    .pilar-card h3, .pilar-card h4 { font-size: 13px !important; margin-bottom: 4px !important; }

    .section-title { font-size: 18px; }
    .section-subtitle { font-size: 13px; }
}

/* 1. Tampilan Default (HP / Mobile): Menumpuk ke bawah (1 kolom) */
.desa-section-grid {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.desa-card {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.map-sidebar {
    width: 100%;
    padding: 20px;
    box-sizing: border-box;
}

.map-vector-container {
    height: 160px;
    position: relative;
}

/* 2. Tampilan Laptop/Desktop (Lebar layar di atas 992px): Sejajar samping (2 kolom) */
@media (min-width: 992px) {
    .desa-section-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        align-items: stretch;
    }

    .desa-card, .map-sidebar {
        height: 100%;
    }

    .map-vector-container {
        height: 140px;
    }
}
* Animasi Ken Burns (Zoom In Halus) untuk Hero Slider */
    .hero-slide {
        overflow: hidden; /* Memastikan gambar tidak meluap keluar dari bingkai saat membesar */
    }

    .hero-slide img {
        transition: transform 6s ease-in-out;
        transform: scale(1);
    }

    .hero-slide.swiper-slide-active img {
        transform: scale(1.15); /* Gambar membesar perlahan saat slide aktif */
    }
</style>
@endpush

@section('content')
<!-- HERO SLIDER SECTION -->
<section class="hero-swiper swiper">
    <div class="swiper-wrapper">
        
        <!-- Slide 1 -->
        <div class="swiper-slide hero-slide" style="background: url('{{ asset('images/hero-1.png') }}') center/cover no-repeat;">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-title-top notranslate" translate="no">LIGA DESA</div>
                    <div class="hero-title-badge-green">
                        <span class="notranslate" translate="no">SIMPULSAE</span>
                        <svg class="leaf-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M17,8C14,8 10,10 8,13C7,14.5 6.5,16.5 6.5,18.5C6.5,19 7,19.5 7.5,19.5C8,19.5 12,19 14.5,17C17.5,14.5 19,11 19,8C19,7.5 18.5,7 18,7C17.7,7 17.3,7.5 17,8M8.9,16.2C9.5,15.1 10.5,13.8 11.8,12.7C13.1,11.6 14.6,10.6 16,10C15.2,11.5 14,13 12.6,14.2C11.2,15.4 9.8,16.1 8.9,16.2Z"/>
                        </svg>
                    </div>
                    <h2 class="hero-subtitle-bold lang-text" data-id="Memberdayakan Desa Melalui Digitalisasi dan Inovasi Pemuda" data-en="Empowering Villages Through Digitalization and Youth Innovation">Memberdayakan Desa Melalui Digitalisasi dan Inovasi Pemuda</h2>
                    <p class="hero-subtitle-desc lang-text" data-id="Bersama 24 desa di Kota Batu, kita wujudkan desa berkelanjutan dengan teknologi, kolaborasi dan pemberdayaan pemuda." data-en="Together with 24 villages in Batu City, we realize sustainable villages through technology, collaboration, and youth empowerment.">Bersama 24 desa di Kota Batu, kita wujudkan desa berkelanjutan dengan teknologi, kolaborasi dan pemberdayaan pemuda.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn-primary-hero lang-text" data-id="Jelajahi 24 Desa →" data-en="Explore 24 Villages →">Jelajahi 24 Desa <i class="fa-solid fa-arrow-right"></i></a>
                        <a href="#" class="btn-outline-hero lang-text" data-id="Tentang Program >" data-en="About Program >">Tentang Program &gt;</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide hero-slide" style="background: url('{{ asset('images/hero2.png') }}') center/cover no-repeat;">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-title-top notranslate" translate="no">LIGA DESA</div>
                    <div class="hero-title-badge-green">
                        <span class="notranslate" translate="no">SIMPULSAE</span>
                        <svg class="leaf-icon" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M17,8C14,8 10,10 8,13C7,14.5 6.5,16.5 6.5,18.5C6.5,19 7,19.5 7.5,19.5C8,19.5 12,19 14.5,17C17.5,14.5 19,11 19,8C19,7.5 18.5,7 18,7C17.7,7 17.3,7.5 17,8M8.9,16.2C9.5,15.1 10.5,13.8 11.8,12.7C13.1,11.6 14.6,10.6 16,10C15.2,11.5 14,13 12.6,14.2C11.2,15.4 9.8,16.1 8.9,16.2Z"/>
                        </svg>
                    </div>
                    <h2 class="hero-subtitle-bold lang-text" data-id="Kemitraan Strategis Berbasis Impact ESG & Potensi Ekonomi Lokal" data-en="Strategic Partnerships Based on ESG Impact & Local Economic Potential">Kemitraan Strategis Berbasis Impact ESG &amp; Potensi Ekonomi Lokal</h2>
                    <p class="hero-subtitle-desc lang-text" data-id="Mengintegrasikan program CSR perusahaan dengan akselerasi ekonomi digital desa secara inklusif dan terukur." data-en="Integrating corporate CSR programs with inclusive and measurable village digital economy acceleration.">Mengintegrasikan program CSR perusahaan dengan akselerasi ekonomi digital desa secara inklusif dan terukur.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn-primary-hero lang-text" data-id="Lihat Program ESG →" data-en="View ESG Programs →">Lihat Program ESG <i class="fa-solid fa-arrow-right"></i></a>
                        <a href="#" class="btn-outline-hero lang-text" data-id="Gabung Kemitraan >" data-en="Join Partnership >">Gabung Kemitraan &gt;</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <div class="swiper-pagination"></div>

    <!-- Wave / Gelombang Bawah Halaman (Samakan dengan Halaman Dampak) -->
    <div style="position: absolute; bottom: 0; left: 0; right: 0; width: 100%; overflow: hidden; line-height: 0; z-index: 10; pointer-events: none;">
        <svg style="position: relative; display: block; width: 100%; height: 55px; color: #f8fafc;" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z" fill="currentColor"></path>
        </svg>
    </div>
</section>

<!-- STATS BAR -->
<div class="container stats-wrapper">
    <div class="stats-card">
        <div class="stats-title lang-text" data-id="Dampak Nyata<br>untuk Kota Batu" data-en="Real Impact<br>for Batu City">Dampak Nyata<br>untuk Kota Batu</div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fa-solid fa-house-flag"></i></div>
            <div><span class="stat-number counter" data-target="24">0</span><span class="stat-label lang-text" data-id="Desa" data-en="Villages">Desa</span></div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
            <div><span class="stat-number counter" data-target="1240">0</span><span class="stat-label lang-text" data-id="Pemuda" data-en="Youths">Pemuda</span></div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fa-solid fa-store"></i></div>
            <div><span class="stat-number counter" data-target="326">0</span><span class="stat-label">UMKM</span></div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fa-solid fa-diagram-project"></i></div>
            <div><span class="stat-number counter" data-target="48">0</span><span class="stat-label lang-text" data-id="Program" data-en="Programs">Program</span></div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fa-solid fa-leaf"></i></div>
            <div><span class="stat-number counter" data-target="76">0</span><span class="stat-label lang-text" data-id="Program ESG" data-en="ESG Programs">Program ESG</span></div>
        </div>
    </div>
</div>

<!-- MENGAPA LIGA DESA -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <div>
                <h2 class="section-title lang-text" data-id="Mengapa Liga Desa Simpulsae?" data-en="Why Liga Desa Simpulsae?">Mengapa Liga Desa Simpulsae?</h2>
                <p class="section-subtitle lang-text" data-id="Tiga tantangan utama yang kami jawab bersama." data-en="Three main challenges we solve together.">Tiga tantangan utama yang kami jawab bersama.</p>
            </div>
            <div class="nav-controls">
                <button class="nav-arrow why-prev"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="nav-arrow why-next"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>

        <div class="swiper whySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="feature-card">
                        <div class="feature-img" style="background-image: url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=500&q=80');"></div>
                        <div class="feature-body">
                            <div class="feature-icon-badge"><i class="fa-solid fa-users"></i></div>
                            <h3 class="lang-text" data-id="Bonus Demografi Desa" data-en="Village Demographic Bonus">Bonus Demografi Desa</h3>
                            <p class="lang-text" data-id="Melimpahnya usia produktif di pedesaan yang membutuhkan wadah pengembangan kapasitas dan akses peluang ekonomi." data-en="Abundance of productive age in rural areas requiring capacity building and economic opportunity access.">Melimpahnya usia produktif di pedesaan yang membutuhkan wadah pengembangan kapasitas dan akses peluang ekonomi.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature-card">
                        <div class="feature-img" style="background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=500&q=80');"></div>
                        <div class="feature-body">
                            <div class="feature-icon-badge"><i class="fa-solid fa-chart-line"></i></div>
                            <h3 class="lang-text" data-id="Akselerasi Digital" data-en="Digital Acceleration">Akselerasi Digital</h3>
                            <p class="lang-text" data-id="Pentingnya transformasi digital inklusif agar potensi lokal, UMKM desa dan tata kelola mampu bersaing secara nasional." data-en="The importance of inclusive digital transformation so local potential, village MSMEs, and governance can compete nationally.">Pentingnya transformasi digital inklusif agar potensi lokal, UMKM desa dan tata kelola mampu bersaing secara nasional.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="feature-card">
                        <div class="feature-img" style="background-image: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=500&q=80');"></div>
                        <div class="feature-body">
                            <div class="feature-icon-badge"><i class="fa-solid fa-seedling"></i></div>
                            <h3 class="lang-text" data-id="Dampak ESG Terukur" data-en="Measurable ESG Impact">Dampak ESG Terukur</h3>
                            <p class="lang-text" data-id="Kebutuhan korporasi akan kemitraan CSR yang memberikan dampak nyata pada aspek Environmental, Social, and Governance." data-en="Corporate need for CSR partnerships delivering real impact on Environmental, Social, and Governance aspects.">Kebutuhan korporasi akan kemitraan CSR yang memberikan dampak nyata pada aspek Environmental, Social, and Governance.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="cta-card">
                        <div>
                            <h3 class="lang-text" data-id="Kota Batu Punya 24 Desa dengan Potensi Luar Biasa" data-en="Batu City Has 24 Villages with Extraordinary Potential">Kota Batu Punya 24 Desa dengan Potensi Luar Biasa</h3>
                            <p class="lang-text" data-id="Dari pertanian, wisata, UMKM hingga ekonomi digital, semua ada di sini." data-en="From agriculture, tourism, MSMEs to digital economy, everything is here.">Dari pertanian, wisata, UMKM hingga ekonomi digital, semua ada di sini.</p>
                        </div>
                        <a href="#" class="btn-primary-hero lang-text" data-id="Lihat Semua Desa →" data-en="See All Villages →" style="width: fit-content; margin-top:10px;">Lihat Semua Desa →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PILAR PROGRAM & TAHAPAN IMPLEMENTASI -->
<section class="section" style="background: #ffffff; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; padding: 40px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">
        
        <div class="sae-tahapan-container">
            
            <!-- SISI KIRI: PILAR PROGRAM - SAE -->
            <div class="pilar-section-wrapper">
                <h2 class="lang-text" data-id="Pilar Program – SAE" data-en="Program Pillars – SAE" style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Pilar Program – SAE</h2>
                <p class="lang-text" data-id="Tiga pilar utama yang menjadi landasan filosofi dan operasional program." data-en="Three main pillars serving as the philosophical and operational foundation of the program." style="font-size: 12px; color: #64748b; margin: 0;">Tiga pilar utama yang menjadi landasan filosofi dan operasional program.</p>
                
                <div class="pilar-grid-horizontal">
                    
                    <!-- PILAR S -->
                    <div class="pilar-col">
                        <div class="pilar-header-inline">
                            <div class="pilar-circle-icon green">
                                <i class="fa-solid fa-leaf"></i>
                            </div>
                            <span class="pilar-letter green">S</span>
                        </div>
                        <h4 class="pilar-item-title green">Sustainable</h4>
                        <p class="pilar-item-desc lang-text" data-id="Membangun ekosistem ekonomi mandiri, ramah lingkungan, dan memberikan dampak sosial jangka panjang." data-en="Building an independent, eco-friendly economic ecosystem with long-term social impact.">Membangun ekosistem ekonomi mandiri, ramah lingkungan, dan memberikan dampak sosial jangka panjang.</p>
                    </div>

                    <!-- PILAR A -->
                    <div class="pilar-col">
                        <div class="pilar-header-inline">
                            <div class="pilar-circle-icon blue">
                                <i class="fa-solid fa-gear"></i>
                            </div>
                            <span class="pilar-letter blue">A</span>
                        </div>
                        <h4 class="pilar-item-title blue">Adaptive</h4>
                        <p class="pilar-item-desc lang-text" data-id="Mendorong pemanfaatan teknologi digital yang terjangkau, fleksibel, dan responsif terhadap perubahan zaman." data-en="Promoting affordable, flexible, and responsive digital technology adoption for changing times.">Mendorong pemanfaatan teknologi digital yang terjangkau, fleksibel, dan responsif terhadap perubahan zaman.</p>
                    </div>

                    <!-- PILAR E -->
                    <div class="pilar-col">
                        <div class="pilar-header-inline">
                            <div class="pilar-circle-icon orange">
                                <i class="fa-solid fa-user-group"></i>
                            </div>
                            <span class="pilar-letter orange">E</span>
                        </div>
                        <h4 class="pilar-item-title orange">Empowerment</h4>
                        <p class="pilar-item-desc lang-text" data-id="Mengasah kapasitas SDM lokal dan pemuda agar menjadi penggerak utama (agent of change) di desanya." data-en="Sharpening local human resources and youth capacity to become agents of change in their villages.">Mengasah kapasitas SDM lokal dan pemuda agar menjadi penggerak utama (agent of change) di desanya.</p>
                    </div>

                </div>
            </div>

            <!-- SISI KANAN: 4 TAHAPAN IMPLEMENTASI -->
            <div class="tahapan-wrapper-green">
                <div>
                    <h2 class="lang-text" data-id="4 Tahapan Implementasi" data-en="4 Implementation Stages" style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">4 Tahapan Implementasi</h2>
                    <p class="lang-text" data-id="Program dirancang secara terstruktur dan berkelanjutan untuk hasil yang optimal." data-en="Structured and sustainable program design for optimal results." style="font-size: 12px; color: #64748b; margin: 0;">Program dirancang secara terstruktur dan berkelanjutan untuk hasil yang optimal.</p>
                </div>

                <div class="tahapan-flow-grid">
                    
                    <!-- TAHAP 01 -->
                    <div class="tahap-flow-card">
                        <div class="tahap-node-wrapper">
                            <div class="tahap-circle-num c1">01</div>
                            <div class="tahap-line-arrow"></div>
                        </div>
                        <h4 class="lang-text" data-id="Inisiasi & Pemetaan Potensi" data-en="Initiation & Potential Mapping">Inisiasi &amp; Pemetaan Potensi</h4>
                        <ul>
                            <li class="lang-text" data-id="Pemetaan Pemuda & SDM" data-en="Youth & HR Mapping">Pemetaan Pemuda &amp; SDM</li>
                            <li class="lang-text" data-id="Riset Kebutuhan Digital" data-en="Digital Needs Research">Riset Kebutuhan Digital</li>
                        </ul>
                    </div>

                    <!-- TAHAP 02 -->
                    <div class="tahap-flow-card">
                        <div class="tahap-node-wrapper">
                            <div class="tahap-circle-num c2">02</div>
                            <div class="tahap-line-arrow"></div>
                        </div>
                        <h4 class="lang-text" data-id="Kapasitasi via Simpulsae Hub" data-en="Capacity Building via Simpulsae Hub">Kapasitasi via Simpulsae Hub</h4>
                        <ul>
                            <li class="lang-text" data-id="Training Literasi Digital" data-en="Digital Literacy Training">Training Literasi Digital</li>
                            <li class="lang-text" data-id="Kewirausahaan & Leadership" data-en="Entrepreneurship & Leadership">Kewirausahaan &amp; Leadership</li>
                        </ul>
                    </div>

                    <!-- TAHAP 03 -->
                    <div class="tahap-flow-card">
                        <div class="tahap-node-wrapper">
                            <div class="tahap-circle-num c3">03</div>
                            <div class="tahap-line-arrow"></div>
                        </div>
                        <h4 class="lang-text" data-id="Akselerasi via Liga Desa" data-en="Acceleration via Liga Desa">Akselerasi via Liga Desa</h4>
                        <ul>
                            <li class="lang-text" data-id="Kompetisi Inovasi Desa" data-en="Village Innovation Competition">Kompetisi Inovasi Desa</li>
                            <li class="lang-text" data-id="Expo Produk Digital" data-en="Digital Product Expo">Expo Produk Digital</li>
                        </ul>
                    </div>

                    <!-- TAHAP 04 -->
                    <div class="tahap-flow-card">
                        <div class="tahap-node-wrapper">
                            <div class="tahap-circle-num c4">04</div>
                        </div>
                        <h4 class="lang-text" data-id="Monitoring & Dampak" data-en="Monitoring & Impact">Monitoring &amp; Dampak</h4>
                        <ul>
                            <li class="lang-text" data-id="Pelaporan ESG Terukur" data-en="Measurable ESG Reporting">Pelaporan ESG Terukur</li>
                            <li class="lang-text" data-id="Dashboard Real-time" data-en="Real-time Dashboard">Dashboard Real-time</li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- JELAJAHI 24 DESA -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <div>
                <h2 class="section-title lang-text" data-id="Jelajahi 24 Desa Kota Batu" data-en="Explore 24 Villages in Batu City">Jelajahi 24 Desa Kota Batu</h2>
                <p class="section-subtitle lang-text" data-id="Temukan potensi, program dan kisah inspiratif dari setiap desa." data-en="Discover potentials, programs, and inspiring stories from every village.">Temukan potensi, program dan kisah inspiratif dari setiap desa.</p>
            </div>
            <div class="nav-controls">
                <button class="nav-arrow desa-prev"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="nav-arrow desa-next"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>

        <div class="desa-section-grid">
            <div style="min-width: 0; width: 100%; overflow: hidden;">
                <div class="swiper desaSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="desa-card">
                                <div class="desa-img" style="background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=400&q=80');"></div>
                                <div class="desa-body">
                                    <div>
                                        <h4>Desa Sumbergondo</h4>
                                        <small>Kec. Bumiaji</small>
                                        <div class="tags"><span class="tag lang-text" data-id="Pertanian" data-en="Agriculture">Pertanian</span><span class="tag lang-text" data-id="Wisata" data-en="Tourism">Wisata</span><span class="tag">UMKM</span></div>
                                    </div>
                                    <a href="#" class="lang-text" data-id="Lihat Detail →" data-en="View Detail →" style="color:#05845c; font-weight:700; font-size:11px; text-decoration:none;">Lihat Detail →</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="desa-card">
                                <div class="desa-img" style="background-image: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=400&q=80');"></div>
                                <div class="desa-body">
                                    <div>
                                        <h4>Desa Punten</h4>
                                        <small>Kec. Bumiaji</small>
                                        <div class="tags"><span class="tag lang-text" data-id="Wisata" data-en="Tourism">Wisata</span><span class="tag">UMKM</span><span class="tag">Digital</span></div>
                                    </div>
                                    <a href="#" class="lang-text" data-id="Lihat Detail →" data-en="View Detail →" style="color:#05845c; font-weight:700; font-size:11px; text-decoration:none;">Lihat Detail →</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="desa-card">
                                <div class="desa-img" style="background-image: url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=400&q=80');"></div>
                                <div class="desa-body">
                                    <div>
                                        <h4>Desa Bumiaji</h4>
                                        <small>Kec. Bumiaji</small>
                                        <div class="tags"><span class="tag lang-text" data-id="Pertanian" data-en="Agriculture">Pertanian</span><span class="tag">UMKM</span><span class="tag lang-text" data-id="Pemuda" data-en="Youth">Pemuda</span></div>
                                    </div>
                                    <a href="#" class="lang-text" data-id="Lihat Detail →" data-en="View Detail →" style="color:#05845c; font-weight:700; font-size:11px; text-decoration:none;">Lihat Detail →</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="desa-card">
                                <div class="desa-img" style="background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=400&q=80');"></div>
                                <div class="desa-body">
                                    <div>
                                        <h4>Desa Oro-Oro Ombo</h4>
                                        <small>Kec. Batu</small>
                                        <div class="tags"><span class="tag lang-text" data-id="Wisata" data-en="Tourism">Wisata</span><span class="tag lang-text" data-id="Ekonomi Kreatif" data-en="Creative Economy">Ekonomi Kreatif</span></div>
                                    </div>
                                    <a href="#" class="lang-text" data-id="Lihat Detail →" data-en="View Detail →" style="color:#05845c; font-weight:700; font-size:11px; text-decoration:none;">Lihat Detail →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SIDEBAR PETA -->
            <div class="map-sidebar">
                <div>
                    <<div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:6px;">
                    <h3 class="lang-text" data-id="Peta 24 Desa Kota Batu" data-en="24 Villages Map Batu City" style="margin:0; font-size:15px;">Peta 24 Desa Kota Batu</h3>
                    <a href="https://cdn.arcgis.com/home/webmap/viewer.html?webmap=7c2dd313aeae4b1ab78835bcd3ffdcb5" target="_blank" rel="noopener noreferrer" class="btn-primary-hero lang-text" data-id="Lihat Peta Interaktif ↗" data-en="Interactive Map ↗" style="padding: 4px 8px; font-size:10px; background:#05845c;">Lihat Peta Interaktif ↗</a>
                    </div>
                    <p class="lang-text" data-id="Visualisasi geospasial sebaran program dan potensi desa." data-en="Geospatial visualization of program distribution and village potential." style="margin-top:4px;">Visualisasi geospasial sebaran program dan potensi desa.</p>
                    </div>

                <div class="map-vector-container">
                    <div class="map-pin" style="top:30%; left:40%;"></div>
                    <div class="map-pin" style="top:20%; left:65%;"></div>
                    <div class="map-pin" style="top:50%; left:30%;"></div>
                    <div class="map-pin" style="top:60%; left:55%;"></div>
                    <div class="map-pin" style="top:75%; left:70%;"></div>
                    <div class="map-pin" style="top:40%; left:80%;"></div>
                    <svg width="80%" height="80%" viewBox="0 0 100 100" fill="none" style="opacity:0.3;">
                        <path d="M20 30 L40 10 L70 15 L90 40 L80 85 L40 90 L10 60 Z" stroke="#10b981" stroke-width="2" fill="rgba(16,185,129,0.1)"/>
                    </svg>
                </div>

                <a href="#" class="btn-outline-hero lang-text" data-id="Lihat Semua Desa →" data-en="See All Villages →" style="text-align:center; font-size:11px; width:100%; box-sizing:border-box;">Lihat Semua Desa →</a>
            </div>
        </div>
    </div>
</section>

<!-- KISAH DESA & BANNER MITRA STRATEGIS -->
<section class="section" style="background: #fff; border-top: 1px solid #e2e8f0; padding: 40px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">
        
        <div class="news-grid-layout">
            
            <!-- KOLOM KIRI: KISAH DESA -->
            <div style="min-width: 0; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 16px; gap: 10px;">
                        <div>
                            <h2 class="lang-text" data-id="Kisah Desa & Kegiatan Terbaru" data-en="Village Stories & Latest Activities" style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Kisah Desa &amp; Kegiatan Terbaru</h2>
                            <p class="lang-text" data-id="Berita, cerita inspiratif, dan event terkini dari seluruh desa." data-en="News, inspiring stories, and latest events from all villages." style="font-size: 12px; color: #64748b; margin: 0;">Berita, cerita inspiratif, dan event terkini dari seluruh desa.</p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 8px; flex-shrink: 0;">
                            <a href="#" class="lang-text" data-id="Lihat Semua" data-en="View All" style="color:#0f172a; border: 1px solid #cbd5e1; padding: 6px 14px; font-size:11px; border-radius: 6px; text-decoration: none; font-weight: 600; white-space: nowrap;">Lihat Semua</a>
                            <button class="news-prev" style="width: 28px; height: 28px; border-radius: 50%; border: 1px solid #cbd5e1; background: #fff; cursor: pointer; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-chevron-left" style="font-size: 10px;"></i></button>
                            <button class="news-next" style="width: 28px; height: 28px; border-radius: 50%; border: 1px solid #cbd5e1; background: #fff; cursor: pointer; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-chevron-right" style="font-size: 10px;"></i></button>
                        </div>
                    </div>

                    <div class="swiper newsSwiper" style="width: 100%; overflow: hidden; border-radius: 8px;">
                        <div class="swiper-wrapper">
                            
                            <div class="swiper-slide">
                                <div style="border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; background: #fff; height: 100%;">
                                    <div style="background-image: url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=400&q=80'); height: 140px; background-size: cover; background-position: center;"></div>
                                    <div style="padding: 12px;">
                                        <h4 class="lang-text" data-id="Pemuda Desa Sumbergondo Ciptakan Aplikasi Pertanian Digital" data-en="Sumbergondo Village Youth Creates Digital Agriculture App" style="font-size: 12px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">Pemuda Desa Sumbergondo Ciptakan Aplikasi Pertanian Digital</h4>
                                        <small style="color:#94a3b8; font-size:10px;">12 Juni 2025</small>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div style="border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; background: #fff; height: 100%;">
                                    <div style="background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=400&q=80'); height: 140px; background-size: cover; background-position: center;"></div>
                                    <div style="padding: 12px;">
                                        <h4 class="lang-text" data-id="Liga Desa 2025 Resmi Dibuka di Kota Batu" data-en="Liga Desa 2025 Officially Opened in Batu City" style="font-size: 12px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">Liga Desa 2025 Resmi Dibuka di Kota Batu</h4>
                                        <small style="color:#94a3b8; font-size:10px;">8 Juni 2025</small>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div style="border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; background: #fff; height: 100%;">
                                    <div style="background-image: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=400&q=80'); height: 140px; background-size: cover; background-position: center;"></div>
                                    <div style="padding: 12px;">
                                        <h4 class="lang-text" data-id="UMKM Kopi Bumiaji Go Digital Berkat Simpulsae Hub" data-en="Bumiaji Coffee MSME Goes Digital Thanks to Simpulsae Hub" style="font-size: 12px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">UMKM Kopi Bumiaji Go Digital Berkat Simpulsae Hub</h4>
                                        <small style="color:#94a3b8; font-size:10px;">3 Juni 2025</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: BANNER MITRA STRATEGIS -->
            <div style="min-width: 0; background: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=600&q=80') center/cover; border-radius: 10px; padding: 24px; color: #fff; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <h3 class="lang-text" data-id="Bergabung Menjadi Mitra Strategis untuk Desa Berkelanjutan" data-en="Join as a Strategic Partner for Sustainable Villages" style="font-size: 16px; font-weight: 800; line-height: 1.4; margin: 0 0 10px 0;">Bergabung Menjadi Mitra Strategis untuk Desa Berkelanjutan</h3>
                    <p class="lang-text" data-id="Wujudkan dampak nyata melalui kemitraan CSR dan program pemberdayaan desa berbasis ESG & digital." data-en="Create real impact through CSR partnerships and ESG & digital-based village empowerment programs." style="font-size: 11px; opacity: 0.85; line-height: 1.5; margin: 0;">Wujudkan dampak nyata melalui kemitraan CSR dan program pemberdayaan desa berbasis ESG &amp; digital.</p>
                </div>
                <div style="display: flex; flex-direction: column; gap: 8px; margin-top: 20px;">
                    <a href="#" class="lang-text" data-id="Download Proposal →" data-en="Download Proposal →" style="background: #10b981; color: #fff; text-align: center; padding: 9px 12px; border-radius: 6px; text-decoration: none; font-size: 11px; font-weight: 700;">Download Proposal →</a>
                    <a href="#" class="lang-text" data-id="Hubungi Tim Kemitraan" data-en="Contact Partnership Team" style="border: 1px solid rgba(255, 255, 255, 0.4); color: #fff; text-align: center; padding: 9px 12px; border-radius: 6px; text-decoration: none; font-size: 11px; font-weight: 600;">Hubungi Tim Kemitraan</a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    // SCRIPT FITUR SWITCHER BAHASA (ID & EN)
    function setLanguage(lang) {
        const elements = document.querySelectorAll('.lang-text');
        elements.forEach(el => {
            if (el.dataset[lang]) {
                el.innerHTML = el.dataset[lang];
            }
        });

        document.getElementById('btn-id').classList.toggle('active', lang === 'id');
        document.getElementById('btn-en').classList.toggle('active', lang === 'en');
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Hero Swiper
        new Swiper('.hero-swiper', {
            loop: true,
            speed: 1200,
            autoplay: { delay: 6000, disableOnInteraction: false },
            fadeEffect: { crossFade: true }
        });

        // Mengapa Swiper
        new Swiper('.whySwiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            navigation: { nextEl: '.why-next', prevEl: '.why-prev' },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 4 }
            }
        });

        // Desa Swiper (Sudah dirapikan dari inisialisasi ganda)
        new Swiper('.desaSwiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            observer: true,
            observeParents: true,
            navigation: { nextEl: '.desa-next', prevEl: '.desa-prev' },
            breakpoints: {
                480: { slidesPerView: 2 },
                768: { slidesPerView: 3 }
            }
        });

        // News Swiper
        new Swiper('.newsSwiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            navigation: { nextEl: '.news-next', prevEl: '.news-prev' },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });

        // ANIMASI COUNTER ANGKA STATISTIK
        const counters = document.querySelectorAll('.counter');
        const speed = 100;

        const startCounter = (counter) => {
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
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        counters.forEach(counter => observer.observe(counter));
    });
</script>
@endpush