@extends('layouts.app')

@section('content')
<!-- SweetAlert2 & AOS Animation Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    :root {
        --primary: #05845c;
        --primary-hover: #046c4b;
        --text-dark: #1e293b;
        --text-muted: #64748b;
        --bg-light: #f8fafc;
        --white: #ffffff;
        --border: #e2e8f0;
        --radius-lg: 16px;
        --radius-md: 12px;
        --shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
    }

    /* Container Dynamic Grid */
    .about-wrapper {
        color: var(--text-dark);
        background-color: var(--bg-light);
        overflow-x: hidden;
    }

    /* ==========================================
   1. HERO SECTION (Tentang)
========================================== */
.hero-about {
    position: relative;
    width: 100%;
    min-height: 520px; /* Samakan tinggi dengan Halaman Dampak */
    background: linear-gradient(to right, rgba(2, 6, 23, 0.85) 0%, rgba(15, 23, 42, 0.5) 60%, transparent 100%), 
                url('{{ asset('images/hero all.png') }}') center/cover no-repeat;
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
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: center;
    position: relative;
    z-index: 10;
}

.hero-text {
    max-width: 540px;
}

.hero-text h1 {
    font-size: 48px;
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 16px;
    color: #ffffff;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}

.hero-text p {
    font-size: 15px;
    color: #e2e8f0;
    line-height: 1.6;
}

    /* Interactive Image Card dengan Efek Floating & Pop-up */
    .interactive-img-box {
        position: relative;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        cursor: pointer;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .interactive-img-box:hover {
        transform: scale(1.03) rotate(1deg);
    }

    .interactive-img-box img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }

    .interactive-img-box:hover img {
        transform: scale(1.1);
    }

    .img-badge-overlay {
        position: absolute;
        bottom: 15px;
        left: 15px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(8px);
        padding: 8px 16px;
        border-radius: 20px;
        color: var(--primary);
        font-weight: 700;
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Stats Floating Cards */
    .stats-section {
        max-width: 1200px;
        margin: -50px auto 60px;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .stat-card {
        background: var(--white);
        padding: 24px;
        border-radius: var(--radius-lg);
        border: 1px solid var(--border);
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        gap: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        border-color: var(--primary);
        box-shadow: 0 12px 24px rgba(5, 132, 92, 0.15);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        background: #e6f4fe;
        color: var(--primary);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .stat-info h3 {
        font-size: 24px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0;
    }

    .stat-info p {
        font-size: 12px;
        color: var(--text-muted);
        margin: 2px 0 0 0;
    }

    /* Section Global */
    .section-block {
        max-width: 1200px;
        margin: 0 auto 70px;
        padding: 0 20px;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center;
    }

    .grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .grid-4 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .section-title {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 12px;
        color: var(--text-dark);
    }

    .section-desc {
        font-size: 14px;
        color: var(--text-muted);
        line-height: 1.6;
        margin-bottom: 24px;
    }

    /* Interactive Side Feature List */
    .feature-item {
        background: var(--white);
        padding: 20px;
        border-radius: var(--radius-md);
        border: 1px solid var(--border);
        margin-bottom: 16px;
        display: flex;
        gap: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        transform: translateX(8px);
        border-color: var(--primary);
        box-shadow: var(--shadow);
    }

    .feature-icon {
        width: 40px;
        height: 40px;
        background: rgba(5, 132, 92, 0.1);
        color: var(--primary);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .feature-text h4 {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .feature-text p {
        font-size: 12px;
        color: var(--text-muted);
        margin: 0;
        line-height: 1.5;
    }

    /* SAE Cards (Filosofi) */
    .sae-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        border: 1px solid var(--border);
        overflow: hidden;
        box-shadow: var(--shadow);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .sae-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .sae-header {
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .sae-badge {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--primary);
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
    }

    .sae-card img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        transition: transform 0.4s;
    }

    .sae-card:hover img {
        transform: scale(1.05);
    }

    .sae-body {
        padding: 20px;
    }

    .sae-body h4 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .sae-body p {
        font-size: 13px;
        color: var(--text-muted);
        line-height: 1.5;
        margin: 0;
    }

    /* Roadmap Step Cards */
    .step-card {
        background: var(--white);
        padding: 24px;
        border-radius: var(--radius-lg);
        border: 1px solid var(--border);
        position: relative;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .step-card:hover {
        transform: scale(1.03);
        border-color: var(--primary);
    }

    .step-num {
        width: 32px;
        height: 32px;
        background: #e6f4fe;
        color: var(--primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 13px;
        margin-bottom: 12px;
    }

    .step-card h4 {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .step-card p {
        font-size: 12px;
        color: var(--text-muted);
        line-height: 1.5;
        margin: 0;
    }

    /* CSR Benefits Cards */
    .csr-card {
        background: var(--white);
        padding: 20px;
        border-radius: var(--radius-md);
        border: 1px solid var(--border);
        cursor: pointer;
        transition: all 0.3s;
    }

    .csr-card:hover {
        background: #f0fdf4;
        border-color: var(--primary);
        transform: translateY(-4px);
    }

    .csr-icon {
        font-size: 24px;
        color: var(--primary);
        margin-bottom: 12px;
    }

    .csr-card h4 {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .csr-card p {
        font-size: 12px;
        color: var(--text-muted);
        line-height: 1.4;
        margin: 0;
    }

    /* RESPONSIVE MEDIA QUERIES (HP, Tablet, Desktop) */
    @media (max-width: 992px) {
        .hero-container, .grid-2 {
            grid-template-columns: 1fr;
            text-align: center;
        }
        .stats-grid, .grid-4 {
            grid-template-columns: repeat(2, 1fr);
        }
        .grid-3 {
            grid-template-columns: 1fr;
        }
        .hero-text h1 {
            font-size: 32px;
        }
    }

    @media (max-width: 576px) {
        .stats-grid, .grid-4 {
            grid-template-columns: 1fr;
        }
        .hero-about {
            padding: 40px 15px 80px;
        }
        .hero-text h1 {
            font-size: 26px;
        }
        .stat-card {
            padding: 16px;
        }
    }

    .interactive-video-box {
    position: relative;
    width: 100%;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    border: 2px solid rgba(255, 255, 255, 0.2);
    cursor: pointer;
}

.interactive-video-box video {
    width: 100%;
    height: 350px;
    object-fit: cover;
    display: block;
    border-radius: var(--radius-lg);
}

/* Style Tombol & Overlay Klik */
.video-overlay-btn {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.25); /* Efek redup sebelum diklik */
    backdrop-filter: blur(1px);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    color: #ffffff;
    font-weight: 700;
    font-size: 15px;
    transition: all 0.3s ease;
    z-index: 5;
}

.interactive-video-box:hover .video-overlay-btn {
    background: rgba(0, 0, 0, 0.2);
}

/* Icon Play Bulat Berdenyut */
.play-btn-icon {
    width: 60px;
    height: 60px;
    background: #05845c;
    color: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    box-shadow: 0 0 20px rgba(5, 132, 92, 0.6);
    transition: transform 0.3s ease;
    padding-left: 4px; /* Penyesuaian presisi icon play */
}

.interactive-video-box:hover .play-btn-icon {
    transform: scale(1.15);
}

@media (max-width: 768px) {
    .interactive-video-box video {
        height: 220px;
    }
}
</style>

<div class="about-wrapper">

    <!-- HERO SECTION -->
<section class="hero-about">
    <div class="hero-container">
        
        <!-- TEKS DI SEBELAH KIRI -->
        <div class="hero-text" data-aos="fade-right">
            <h1>Tentang<br>Liga Desa SimpulSae</h1>
            <p>Kemitraan strategis pemberdayaan desa berbasis digital dan bonus demografi untuk kemandirian lokal Kota Batu.</p>
        </div>
        
        <!-- VIDEO DI SEBELAH KANAN (TETAP UTUH) -->
        <div class="interactive-video-box" data-aos="fade-left" id="videoBox" onclick="playHeroVideo()">
            <video id="myHeroVideo" poster="{{ asset('images/hero3.png') }}" controls playsinline>
                <source src="{{ asset('videos/video-batu.mp4') }}" type="video/mp4">
                Browser kamu tidak mendukung pemutar video.
            </video>

            <div class="video-overlay-btn" id="videoOverlay">
                <div class="play-btn-icon">
                    <i class="fa-solid fa-play"></i>
                </div>
                <span>Klik untuk Memutar Video</span>
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

    <!-- STATS FLOATING CARDS -->
    <div class="stats-section">
        <div class="stats-grid">
            <div class="stat-card" data-aos="zoom-in" data-aos-delay="100" onclick="showDetail('24 Desa', 'Seluruh 24 Desa dan Kelurahan se-Kota Batu telah terintegrasi dalam platform SimpulSae.')">
                <div class="stat-icon"><i class="fa-solid fa-city"></i></div>
                <div class="stat-info">
                    <h3>24</h3>
                    <p>Desa Tergabung</p>
                </div>
            </div>

            <div class="stat-card" data-aos="zoom-in" data-aos-delay="200" onclick="showDetail('1.240 Pemuda', 'Pemuda produktif yang aktif menggerakkan inovasi digital dan potensi ekonomi lokal.')">
                <div class="stat-icon"><div class="stat-icon"><i class="fa-solid fa-users"></i></div></div>
                <div class="stat-info">
                    <h3>1.240</h3>
                    <p>Pemuda Berkontribusi</p>
                </div>
            </div>

            <div class="stat-card" data-aos="zoom-in" data-aos-delay="300" onclick="showDetail('326 UMKM', 'Usaha Mikro Kecil dan Menengah yang didampingi hingga menembus pasar digital.')">
                <div class="stat-icon"><i class="fa-solid fa-store"></i></div>
                <div class="stat-info">
                    <h3>326</h3>
                    <p>UMKM Didampingi</p>
                </div>
            </div>

            <div class="stat-card" data-aos="zoom-in" data-aos-delay="400" onclick="showDetail('48 Program', 'Inisiatif pemberdayaan lintas sektor yang terlaksana secara berkelanjutan.')">
                <div class="stat-icon"><i class="fa-solid fa-chart-line"></i></div>
                <div class="stat-info">
                    <h3>48</h3>
                    <p>Program Berjalan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MENGOPTIMALKAN POTENSI DESA & DAMPAK ESG -->
    <section class="section-block">
        <div class="grid-2">
            <div data-aos="fade-right">
                <h2 class="section-title">Mengoptimalkan Potensi Desa & Dampak ESG</h2>
                <p class="section-desc">Liga Desa SimpulSae hadir sebagai platform kolaborasi lintas sektor untuk mengakselerasi potensi desa melalui program CSR terintegrasi. Kami percaya bahwa desa yang kuat akan melahirkan masyarakat sejahtera dan berdampak positif bagi lingkungan, sosial, serta ekonomi.</p>
                
                <button class="btn btn-primary" style="background:var(--primary); border:none; padding:12px 24px; border-radius:8px; font-weight:700; color:#fff;" onclick="showDetail('Pelajari Lebih Lanjut', 'SimpulSae menghubungkan sektor industri (CSR), pemerintah lokal, dan komunitas pemuda desa.')">
                    Pelajari Lebih Lanjut →
                </button>
            </div>

            <div data-aos="fade-left">
                <div class="feature-item" onclick="showDetail('Bonus Demografi Desa', 'Memanfaatkan usia produktif di pedesaan untuk mendorong pertumbuhan ekonomi dan kreativitas lokal.')">
                    <div class="feature-icon"><i class="fa-solid fa-seedling"></i></div>
                    <div class="feature-text">
                        <h4>Bonus Demografi Desa</h4>
                        <p>Memanfaatkan usia produktif di pedesaan untuk mendorong pertumbuhan ekonomi dan kreativitas lokal.</p>
                    </div>
                </div>

                <div class="feature-item" onclick="showDetail('Akselerasi Digital Inklusif', 'Transformasi digital inklusif agar potensi lokal, UMKM desa, dan tata kelola mampu bersaing secara nasional.')">
                    <div class="feature-icon"><i class="fa-solid fa-network-wired"></i></div>
                    <div class="feature-text">
                        <h4>Akselerasi Digital Inklusif</h4>
                        <p>Transformasi digital inklusif agar potensi lokal, UMKM desa, dan tata kelola mampu bersaing secara nasional.</p>
                    </div>
                </div>

                <div class="feature-item" onclick="showDetail('Dampak ESG Terukur', 'Kebutuhan korporasi akan kemitraan CSR yang memberikan dampak nyata pada aspek Environmental, Social, and Governance.')">
                    <div class="feature-icon"><i class="fa-solid fa-globe"></i></div>
                    <div class="feature-text">
                        <h4>Dampak ESG Terukur</h4>
                        <p>Kebutuhan korporasi akan kemitraan CSR yang memberikan dampak nyata pada aspek Environmental, Social, and Governance.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LANDASAN FILOSOFI & OPERASIONAL (S-A-E) -->
    <section class="section-block">
        <div style="text-align: center; margin-bottom: 40px;" data-aos="fade-up">
            <h2 class="section-title">Landasan Filosofi & Operasional (S-A-E)</h2>
            <p class="section-desc">Tiga pilar utama yang menjadi roda penggerak ekosistem SimpulSae di setiap desa.</p>
        </div>

        <div class="grid-3">
            <!-- S Card -->
            <div class="sae-card" data-aos="fade-up" data-aos-delay="100" onclick="openImageModal('https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=80', 'Sustainable (Berkelanjutan)')">
                <div class="sae-header">
                    <div class="sae-badge">S</div>
                    <strong style="font-size:16px;">Sustainable</strong>
                </div>
                <div style="overflow:hidden;">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=600&q=80" alt="Sustainable">
                </div>
                <div class="sae-body">
                    <h4>Berkelanjutan</h4>
                    <p>Membangun ekosistem ekonomi mandiri, ramah lingkungan, dan memberikan dampak sosial jangka panjang bagi warga desa.</p>
                </div>
            </div>

            <!-- A Card -->
            <div class="sae-card" data-aos="fade-up" data-aos-delay="200" onclick="openImageModal('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=800&q=80', 'Adaptive (Adaptif)')">
                <div class="sae-header">
                    <div class="sae-badge" style="background:#0284c7;">A</div>
                    <strong style="font-size:16px;">Adaptive</strong>
                </div>
                <div style="overflow:hidden;">
                    <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=600&q=80" alt="Adaptive">
                </div>
                <div class="sae-body">
                    <h4>Adaptif</h4>
                    <p>Meningkatkan kapasitas desa dalam menghadapi perubahan dan memanfaatkan peluang baru di era digital.</p>
                </div>
            </div>

            <!-- E Card -->
            <div class="sae-card" data-aos="fade-up" data-aos-delay="300" onclick="openImageModal('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=800&q=80', 'Empowerment (Pemberdayaan)')">
                <div class="sae-header">
                    <div class="sae-badge" style="background:#d97706;">E</div>
                    <strong style="font-size:16px;">Empowerment</strong>
                </div>
                <div style="overflow:hidden;">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=600&q=80" alt="Empowerment">
                </div>
                <div class="sae-body">
                    <h4>Pemberdayaan</h4>
                    <p>Menguatkan peran pemuda, UMKM, dan masyarakat desa untuk mandiri, berdaya saing, dan sejahtera.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PETA JALAN IMPLEMENTASI SINGKAT -->
    <section class="section-block">
        <div style="margin-bottom: 30px;" data-aos="fade-right">
            <h2 class="section-title">Peta Jalan Implementasi Singkat</h2>
        </div>

        <div class="grid-4">
            <div class="step-card" data-aos="flip-left" data-aos-delay="100" onclick="showDetail('01. Inisiasi & Pemetaan', 'Identifikasi potensi desa, pemetaan kebutuhan, dan penyusunan rencana bersama.')">
                <div class="step-num">01</div>
                <h4>Inisiasi & Pemetaan</h4>
                <p>Identifikasi potensi desa, pemetaan kebutuhan, dan penyusunan rencana bersama.</p>
            </div>

            <div class="step-card" data-aos="flip-left" data-aos-delay="200" onclick="showDetail('02. Kapasitas Hub', 'Penguatan kapasitas SDM, fasilitasi kolaborasi, dan pengembangan ekosistem desa.')">
                <div class="step-num" style="background:#e0f2fe; color:#0284c7;">02</div>
                <h4>Kapasitas Hub</h4>
                <p>Penguatan kapasitas SDM, fasilitasi kolaborasi, dan pengembangan ekosistem desa.</p>
            </div>

            <div class="step-card" data-aos="flip-left" data-aos-delay="300" onclick="showDetail('03. Akselerasi Liga', 'Implementasi program, pendampingan intensif, dan perluasan kemitraan strategis.')">
                <div class="step-num" style="background:#fef3c7; color:#d97706;">03</div>
                <h4>Akselerasi Liga</h4>
                <p>Implementasi program, pendampingan intensif, dan perluasan kemitraan strategis.</p>
            </div>

            <div class="step-card" data-aos="flip-left" data-aos-delay="400" onclick="showDetail('04. Monitoring & Dampak', 'Evaluasi, pengukuran dampak, dan replikasi model terbaik ke desa lainnya.')">
                <div class="step-num" style="background:#dcfce7; color:#15803d;">04</div>
                <h4>Monitoring & Dampak</h4>
                <p>Evaluasi, pengukuran dampak, dan replikasi model terbaik ke desa lainnya.</p>
            </div>
        </div>
    </section>

    <!-- NILAI TAMBAH KEMITRAAN STRATEGIS (CSR BENEFIT) -->
    <section class="section-block">
        <div style="margin-bottom: 30px;" data-aos="fade-up">
            <h2 class="section-title">Nilai Tambah Kemitraan Strategis (CSR Benefit)</h2>
            <p class="section-desc">Kemitraan yang dikelola secara strategis memberikan nilai tambah bagi semua pihak.</p>
        </div>

        <div class="grid-4">
            <div class="csr-card" data-aos="zoom-in-up" data-aos-delay="100" onclick="showDetail('Kepatuhan ESG', 'Memenuhi kriteria dan indikator keberlanjutan sesuai standar ESG global dan nasional.')">
                <div class="csr-icon"><i class="fa-solid fa-shield-halved"></i></div>
                <h4>Kepatuhan ESG</h4>
                <p>Memenuhi kriteria dan indikator keberlanjutan sesuai standar ESG global dan nasional.</p>
            </div>

            <div class="csr-card" data-aos="zoom-in-up" data-aos-delay="200" onclick="showDetail('Pencitraan Brand', 'Meningkatkan reputasi dan brand equity perusahaan sebagai pelopor keberlanjutan.')">
                <div class="csr-icon"><i class="fa-solid fa-bullhorn"></i></div>
                <h4>Pencitraan Brand</h4>
                <p>Meningkatkan reputasi dan brand equity perusahaan sebagai pelopor keberlanjutan.</p>
            </div>

            <div class="csr-card" data-aos="zoom-in-up" data-aos-delay="300" onclick="showDetail('Dampak Terukur', 'Penyediaan data pencapaian (output & outcome) yang akurat melalui platform digital SimpulSae.')">
                <div class="csr-icon"><i class="fa-solid fa-chart-pie"></i></div>
                <h4>Dampak Terukur</h4>
                <p>Penyediaan data pencapaian (output & outcome) yang akurat melalui platform digital SimpulSae.</p>
            </div>

            <div class="csr-card" data-aos="zoom-in-up" data-aos-delay="400" onclick="showDetail('Ekosistem Pasar', 'Membuka peluang sinergi rantai pasok (supply chain), pemberdayaan UMKM binaan, maupun pengembangan basis konsumen baru.')">
                <div class="csr-icon"><i class="fa-solid fa-handshake"></i></div>
                <h4>Ekosistem Pasar</h4>
                <p>Membuka peluang sinergi rantai pasok, pemberdayaan UMKM binaan, maupun basis konsumen baru.</p>
            </div>
        </div>
    </section>

</div>

<!-- SCRIPT ANIMASI & EFEK KLIK -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // Inisialisasi AOS (Animate On Scroll)
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            once: true
        });
    });

    // Fungsi Pop-up Keterangan Detail saat Komponen Diklik
    function showDetail(title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'info',
            confirmButtonColor: '#05845c',
            confirmButtonText: 'Tutup'
        });
    }

    // Fungsi Lightbox Gambar ketika Gambar Diklik
    function openImageModal(imgSrc, caption) {
        Swal.fire({
            imageUrl: imgSrc,
            imageAlt: caption,
            title: caption,
            showCloseButton: true,
            showConfirmButton: false,
            background: '#ffffff',
            customClass: {
                image: 'img-fluid rounded'
            }
        });
    }

    // FUNGSI MEMUTAR VIDEO DENGAN OVERLAY KLIK
    function playHeroVideo() {
        var video = document.getElementById("myHeroVideo");
        var overlay = document.getElementById("videoOverlay");

        if (video) {
            video.play();
        }
        if (overlay) {
            overlay.style.display = "none";
        }
    }
</script>
@endsection