<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Liga Desa Simpulsae | Kota Batu')</title>

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        :root {
            --blue-dark: #092139;    
            --blue-navy: #0f172a;    
            --green-main: #05845c;   
            --green-bg: #eaf6f2;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
            --white: #ffffff;
            --border-color: #e2e8f0;
            --radius: 12px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            color: var(--text-dark); 
            background: var(--bg-light); 
            line-height: 1.5; 
            overflow-x: hidden;
            top: 0 !important;
        }
        a { text-decoration: none; color: inherit; }
        .container { width: min(1280px, calc(100% - 32px)); margin: 0 auto; }

        /* Sembunyikan banner & elemen bawaan Google Translate */
        .goog-te-banner-frame, .skiptranslate { display: none !important; }
        #google_translate_element { display: none; }

        /* HEADER & NAVBAR */
        .site-header { 
            background: var(--white); 
            border-bottom: 1px solid var(--border-color); 
            position: sticky; top: 0; z-index: 100; 
        }
        .navbar { height: 70px; display: flex; align-items: center; justify-content: space-between; }
        
        /* LOGO HEADER STYLES */
        .brand-area { display: flex; align-items: center; gap: 12px; }
        .brand-logo-img { height: 32px; width: auto; object-fit: contain; }
        
        .main-nav { display: flex; gap: 16px; font-size: 12px; font-weight: 600; color: var(--text-muted); }
        .main-nav a.active, .main-nav a:hover { color: var(--green-main); }

        .nav-actions { display: flex; align-items: center; gap: 12px; }
        .lang-switcher { display: flex; background: #f1f5f9; border-radius: 20px; padding: 2px; font-size: 11px; font-weight: 700; }
        .lang-btn { padding: 3px 8px; border-radius: 16px; cursor: pointer; color: var(--text-muted); }
        .lang-btn.active { background: var(--green-main); color: var(--white); }

        .btn-login { background: var(--blue-dark); color: var(--white); padding: 8px 18px; border-radius: 8px; font-size: 12px; font-weight: 700; text-align: center; display: inline-block; }
        .menu-toggle { display: none; border: 0; background: transparent; font-size: 18px; color: var(--text-dark); cursor: pointer; }

        /* FOOTER BIRU TUA */
        .site-footer { 
            background: var(--blue-dark); 
            color: var(--white); 
            padding: 35px 0 20px; 
            margin-top: 60px; 
            font-size: 12px; 
        }
        .footer-navbar { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            border-bottom: 1px solid rgba(255,255,255,0.12); 
            padding-bottom: 25px; 
            margin-bottom: 15px; 
            flex-wrap: wrap; 
            gap: 15px; 
        }

        .footer-brand { display: flex; align-items: center; gap: 14px; }
        .footer-logo-img { height: 28px; width: auto; object-fit: contain; }

        .footer-links { display: flex; gap: 16px; font-weight: 500; font-size: 11px; opacity: 0.85; flex-wrap: wrap; }
        .footer-links a:hover { color: #86efac; }
        .footer-socials { display: flex; gap: 8px; }
        .footer-socials a { width: 30px; height: 30px; border-radius: 50%; background: rgba(255,255,255,0.08); display: grid; place-items: center; font-size: 12px; }
        .footer-socials a:hover { background: var(--green-main); }
        .footer-right-text { text-align: right; font-family: cursive, sans-serif; font-size: 14px; opacity: 0.9; }
        .footer-copyright { text-align: center; opacity: 0.4; font-size: 10px; }

        @media (max-width: 768px) {
            .hero-slide { background-position: right center !important; }
            .hero-content { padding-top: 20px; padding-bottom: 20px; }
            .stories-header, .section-header { flex-direction: column !important; align-items: flex-start !important; gap: 15px !important; }
            .stories-header-right, .section-header-actions { display: flex !important; align-items: center !important; justify-content: space-between !important; width: 100% !important; }
        }

        /* TAMPILAN KHUSUS HP (GAYA BCH.OR.ID) */
        @media (max-width: 991px) {
            .menu-toggle { display: block; }
            
            /* Sembunyikan tombol Masuk dari desktop navbar di HP, pindah ke dalam drawer menu */
            .nav-actions .desktop-login { display: none !important; }

            /* Kotak ID/EN dengan Garis Hijau Tetap Terlihat */
            .lang-switcher {
                border: 1.5px solid var(--green-main) !important;
                background: transparent !important;
            }
            .lang-btn.active {
                background: var(--green-main) !important;
                color: var(--white) !important;
            }

            /* Panel Menu Dropdown ala BCH */
            .main-nav {
                display: none;
                position: absolute;
                top: 70px;
                left: 0;
                right: 0;
                background: var(--white);
                flex-direction: column;
                padding: 20px;
                border-bottom: 1px solid var(--border-color);
                box-shadow: 0 10px 25px rgba(0,0,0,0.08);
                z-index: 999;
                gap: 12px;
            }
            .main-nav.show {
                display: flex !important;
            }

            /* Tombol Masuk di dalam Dropdown Menu HP */
            .main-nav .mobile-login-btn {
                display: block !important;
                width: 100%;
                margin-top: 10px;
            }

            /* Perataan & Penataan Footer Khusus HP */
            .footer-navbar { 
                flex-direction: column !important; 
                align-items: center !important; 
                text-align: center !important; 
                gap: 20px !important;
                padding-bottom: 20px !important;
            }
            .footer-brand { 
                justify-content: center !important; 
                width: 100% !important; 
            }
            .footer-links { 
                justify-content: center !important; 
                width: 100% !important; 
                gap: 12px 16px !important;
                line-height: 1.8 !important;
            }
            .footer-socials { 
                justify-content: center !important; 
                width: 100% !important; 
            }
            .footer-right-text { 
                text-align: center !important; 
                width: 100% !important;
            }
        }

        /* Sembunyikan tombol masuk versi mobile di layar komputer */
        @media (min-width: 992px) {
            .main-nav .mobile-login-btn { display: none !important; }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Container Tersembunyi untuk Engine Google Translate -->
    <div id="google_translate_element"></div>

    <header class="site-header">
        <div class="container">
            <div class="navbar">
                
                <!-- HEADER LOGOS -->
                <div class="brand-area notranslate" translate="no">
                    <a href="{{ url('/') }}" style="display: flex; align-items: center; gap: 12px;">
                        <img src="{{ asset('images/logo-kota-batu.png') }}" alt="Logo Kota Batu" class="brand-logo-img">
                        <img src="{{ asset('images/batu-sae.png') }}" alt="Logo Batu Sae" class="brand-logo-img">
                        <img src="{{ asset('images/batu-versity.png') }}" alt="Logo Batu Versity" class="brand-logo-img">
                    </a>
                </div>

                <!-- NAVIGASI & MENU UTAMA -->
                <nav class="main-nav" id="mainNav">
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ url('/tentang') }}" class="{{ request()->is('tentang') ? 'active' : '' }}">Tentang</a>
                    <a href="{{ url('/program') }}" class="{{ request()->is('program') ? 'active' : '' }}">Program</a>
                    <a href="{{ url('/desa') }}" class="{{ request()->is('desa') ? 'active' : '' }}">24 Desa</a>
                    <a href="{{ url('/liga-desa') }}" class="{{ request()->is('liga-desa') ? 'active' : '' }}">Liga Desa</a>
                    <a href="{{ url('/dampak') }}" class="{{ request()->is('dampak') ? 'active' : '' }}">Dampak</a>
                    <a href="{{ url('/berita') }}" class="{{ request()->is('berita') ? 'active' : '' }}">Berita &amp; Cerita</a>
                    <a href="{{ url('/kemitraan') }}" class="{{ request()->is('kemitraan') ? 'active' : '' }}">Kemitraan</a>
                    <!-- Tombol Masuk khusus muncul di dalam menu drawer HP -->
                    <!-- Cek Status Login -->
    @guest
        <!-- Tombol jika belum login -->
        <a href="{{ route('login') }}" class="btn-login mobile-login-btn">Masuk</a>
    @endguest

    @auth
        <!-- Tombol jika sudah login sebagai Admin -->
        <a href="{{ route('admin.kemitraan.index') }}" class="btn-login mobile-login-btn">Pesan Admin</a>
    @endauth
                </nav>

                <!-- AKSI KANAN (EN/ID, Search, Tombol Masuk Desktop, Tombol Garis 3) -->
                <div class="nav-actions">
                    <div class="lang-switcher notranslate" translate="no">
                        <span id="btn-lang-id" class="lang-btn active" onclick="switchLanguage('id')">ID</span>
                        <span id="btn-lang-en" class="lang-btn" onclick="switchLanguage('en')">EN</span>
                    </div>
                    <button style="border:0; background:none; cursor:pointer; font-size: 16px; color: var(--text-dark);" title="Cari"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <!-- Cek Status Login (Desktop) -->
    @guest
        <a href="{{ route('login') }}" class="btn-login desktop-login">Masuk</a>
    @endguest

    @auth
        <a href="{{ route('admin.kemitraan.index') }}" class="btn-login desktop-login">Pesan Admin</a>
    @endauth
                    <button class="menu-toggle" id="menuToggle"><i class="fa-solid fa-bars"></i></button>
                </div>
            </div>
        </div>
    </header>
    <!-- KONTEN HERO DINAMIS (Bisa dipanggil dari Halaman mana saja) -->
    @yield('hero')
    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-navbar">
                
                <!-- FOOTER LOGOS -->
                <div class="footer-brand notranslate" translate="no">
                    <a href="{{ url('/') }}" style="display: flex; align-items: center; gap: 14px;">
                        <img src="{{ asset('images/logo-kota-batu.png') }}" alt="Logo Kota Batu" class="footer-logo-img">
                        <img src="{{ asset('images/batu-sae-white.png') }}" alt="Logo Batu Sae White" class="footer-logo-img">
                        <img src="{{ asset('images/batu-versity-white.png') }}" alt="Logo Batu Versity White" class="footer-logo-img">
                    </a>
                </div>

                <div class="footer-links">
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ url('/tentang') }}" class="{{ request()->is('tentang') ? 'active' : '' }}">Tentang</a>
                    <a href="{{ url('/program') }}" class="{{ request()->is('program') ? 'active' : '' }}">Program</a>
                    <a href="{{ url('/desa') }}" class="{{ request()->is('desa') ? 'active' : '' }}">24 Desa</a>
                    <a href="{{ url('/liga-desa') }}" class="{{ request()->is('liga-desa') ? 'active' : '' }}">Liga Desa</a>
                    <a href="{{ url('/dampak') }}" class="{{ request()->is('dampak') ? 'active' : '' }}">Dampak</a>
                    <a href="{{ url('/berita') }}" class="{{ request()->is('berita') ? 'active' : '' }}">Berita &amp; Cerita</a>
                    <a href="{{ url('/kemitraan') }}" class="{{ request()->is('kemitraan') ? 'active' : '' }}">Kemitraan</a>
                </div>

                <div class="footer-socials">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-solid fa-globe"></i></a>
                </div>

                <div class="footer-right-text">
                    Desa Maju<br><span style="font-size: 11px; opacity: 0.7; font-style: normal;">Kota Batu Maju</span>
                </div>
            </div>

            <div class="footer-copyright">
                &copy; {{ date('Y') }} Liga Desa Simpulsae Kota Batu. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Script Google Translate -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'id,en',
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script>
        document.getElementById('menuToggle')?.addEventListener('click', function() {
            document.getElementById('mainNav').classList.toggle('show');
        });

        function switchLanguage(lang) {
            document.getElementById('btn-lang-id')?.classList.toggle('active', lang === 'id');
            document.getElementById('btn-lang-en')?.classList.toggle('active', lang === 'en');

            const selectEl = document.querySelector('.goog-te-combo');
            if (selectEl) {
                selectEl.value = lang;
                selectEl.dispatchEvent(new Event('change'));
            }
        }
    </script>
    @stack('scripts')
</body>
</html>