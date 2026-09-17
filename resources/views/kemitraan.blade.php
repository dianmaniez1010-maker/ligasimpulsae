@extends('layouts.app')

@push('styles')
<!-- CDN TAILWIND CSS & FONT AWESOME -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Font Handwriting */
    @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap');
    .font-handwritten {
        font-family: 'Caveat', cursive;
    }

    /* Animation Smooth Hover */
    .partner-logo {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .partner-logo:hover {
        transform: translateY(-5px) scale(1.03);
    }
</style>
@endpush

@section('content')
<!-- ==================== 1. HERO SECTION (Persis Seperti Berita) ==================== -->
<div class="relative w-full overflow-hidden bg-slate-800 min-h-[460px] sm:min-h-[480px] lg:min-h-[520px] flex items-center justify-between shadow-md">
    
    <!-- Background Image & Overlay -->
    <img src="{{ asset('images/hero9.png') }}" 
         alt="Kemitraan SimpulSae" 
         onclick="zoomImage(this.src)"
         onerror="this.src='https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=1600';"
         class="absolute inset-0 w-full h-full object-cover object-center opacity-90 hover:scale-105 transition-all duration-700 cursor-zoom-in">

    <!-- Gradient Overlay Cerah & Halus -->
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-900/60 to-transparent pointer-events-none"></div>

    <!-- Konten Utama Hero -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-12 sm:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            
            <!-- Kolom Teks -->
            <div class="lg:col-span-8 space-y-3 sm:space-y-4 text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-slate-900/60 border border-white/20 text-emerald-300 text-xs font-semibold backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Kolaborasi & Kolaboratif
                </div>
                
                <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white leading-tight drop-shadow-md">
                    Kemitraan
                </h1>
                
                <h2 class="text-lg sm:text-2xl font-bold text-emerald-300 -mt-1 drop-shadow-sm">
                    Bersama untuk Dampak Lebih Luas
                </h2>
                
                <p class="text-slate-200 text-xs sm:text-base leading-relaxed max-w-xl font-normal drop-shadow-sm">
                    Kami membuka peluang kolaborasi dengan berbagai pihak untuk memperkuat ekosistem desa dan memperluas dampak positif secara berkelanjutan di Kota Batu.
                </p>
                
                <div class="pt-2 flex flex-wrap gap-3">
                    <a href="{{ url('/kemitraan/formulir') }}" class="inline-flex items-center gap-2.5 px-6 py-3 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs sm:text-sm shadow-xl hover:shadow-emerald-900/40 hover:-translate-y-0.5 transition-all no-underline">
                        <span>Jadi Mitra</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                    <a href="#bentukKemitraan" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white font-bold text-xs sm:text-sm border border-white/20 backdrop-blur-md transition-all no-underline">
                        <span>Pelajari Bentuk Kemitraan</span>
                    </a>
                </div>
            </div>

            <!-- Kolom Visual Handwriting -->
            <div class="lg:col-span-4 relative flex flex-col items-end lg:items-center justify-center mt-2 lg:mt-0">
                <div class="relative z-20 pointer-events-none transform rotate-[-4deg] lg:rotate-[-6deg]">
                    <p class="font-handwritten text-xl sm:text-3xl lg:text-4xl text-amber-300 drop-shadow-[0_2px_8px_rgba(0,0,0,0.9)] leading-tight text-right">
                        Sinergi Desa,<br>Tumbuh Bersama,<br>Dampak Nyata
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Wave / Gelombang Bawah Halaman -->
    <div class="absolute bottom-0 inset-x-0 w-full overflow-hidden leading-none z-10 pointer-events-none">
        <svg class="relative block w-full h-10 sm:h-16 text-slate-50" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z" fill="currentColor"></path>
        </svg>
    </div>
</div>

<!-- ==================== 2. BENTUK KEMITRAAN ==================== -->
<section id="bentukKemitraan" class="py-12 sm:py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10 text-left">
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Bentuk Kemitraan</h2>
            <p class="text-slate-500 text-xs sm:text-sm mt-1">Bersama, kita bisa melakukan lebih banyak hal bermanfaat.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- KARTU 1: Pendanaan -->
            <div onclick="window.location.href='{{ url('/kemitraan/formulir?tipe=pendanaan') }}'" 
                 class="group bg-white p-6 rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold mb-4 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-2 group-hover:text-emerald-600 transition-colors">Pendanaan</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Dukungan finansial dan pendanaan hibah untuk program serta inovasi desa.</p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-emerald-600">
                    <span>Ajukan Program</span>
                    <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                </div>
            </div>

            <!-- KARTU 2: Pendampingan -->
            <div onclick="window.location.href='{{ url('/kemitraan/formulir?tipe=pendampingan') }}'" 
                 class="group bg-white p-6 rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl font-bold mb-4 group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-2 group-hover:text-teal-600 transition-colors">Pendampingan</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Mentoring profesional, pelatihan SDM, dan penguatan kapasitas warga.</p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-teal-600">
                    <span>Gabung Mentoring</span>
                    <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                </div>
            </div>

            <!-- KARTU 3: Kolaborasi Program -->
            <div onclick="window.location.href='{{ url('/kemitraan/formulir?tipe=kolaborasi') }}'" 
                 class="group bg-white p-6 rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-diagram-project"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">Kolaborasi Program</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Sinergi kegiatan lintas instansi dan penggabungan proyek strategis.</p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-blue-600">
                    <span>Buat Proyek</span>
                    <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                </div>
            </div>

            <!-- KARTU 4: Inovasi Teknologi -->
            <div onclick="window.location.href='{{ url('/kemitraan/formulir?tipe=teknologi') }}'" 
                 class="group bg-white p-6 rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl font-bold mb-4 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-2 group-hover:text-indigo-600 transition-colors">Inovasi Teknologi</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Penyediaan solusi perangkat digital dan sistem modern untuk percepatan desa.</p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-indigo-600">
                    <span>Integrasi Solusi</span>
                    <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==================== 3. MITRA KAMI (LOGO SLIDER / GRID INTERAKTIF) ==================== -->
<section class="py-12 sm:py-16 bg-white border-y border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Mitra Kami</h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">Terima kasih kepada seluruh pihak yang telah tumbuh bersama SimpulSae.</p>
            </div>
            <a href="#footerBanner" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition">
                <span>Lihat Semua Mitra</span>
                <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </a>
        </div>

        <!-- LOGO MITRA (Klik membuka website mitra / animasi bergerak) -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 sm:gap-6">
            
            <a href="https://www.bri.co.id" target="_blank" rel="noopener noreferrer" 
               class="partner-logo bg-slate-50 hover:bg-white border border-slate-200/80 rounded-2xl p-6 flex items-center justify-center shadow-sm hover:shadow-md cursor-pointer group">
                <span class="font-extrabold text-blue-900 text-xl tracking-tighter group-hover:scale-110 transition-transform">BRI</span>
            </a>

            <a href="https://www.telkom.co.id" target="_blank" rel="noopener noreferrer" 
               class="partner-logo bg-slate-50 hover:bg-white border border-slate-200/80 rounded-2xl p-6 flex items-center justify-center shadow-sm hover:shadow-md cursor-pointer group">
                <span class="font-extrabold text-red-600 text-base tracking-tight group-hover:scale-110 transition-transform">Telkom Indonesia</span>
            </a>

            <a href="https://www.pln.co.id" target="_blank" rel="noopener noreferrer" 
               class="partner-logo bg-slate-50 hover:bg-white border border-slate-200/80 rounded-2xl p-6 flex items-center justify-center shadow-sm hover:shadow-md cursor-pointer group">
                <span class="font-black text-amber-500 text-xl tracking-wider group-hover:scale-110 transition-transform">PLN</span>
            </a>

            <a href="https://www.pertamina.com" target="_blank" rel="noopener noreferrer" 
               class="partner-logo bg-slate-50 hover:bg-white border border-slate-200/80 rounded-2xl p-6 flex items-center justify-center shadow-sm hover:shadow-md cursor-pointer group">
                <span class="font-black text-slate-800 text-sm tracking-widest uppercase group-hover:scale-110 transition-transform">PERTAMINA</span>
            </a>

            <a href="https://www.bca.co.id" target="_blank" rel="noopener noreferrer" 
               class="partner-logo bg-slate-50 hover:bg-white border border-slate-200/80 rounded-2xl p-6 flex items-center justify-center shadow-sm hover:shadow-md cursor-pointer group">
                <span class="font-black text-blue-800 text-xl tracking-tight group-hover:scale-110 transition-transform">BCA</span>
            </a>

            <a href="https://ioh.co.id" target="_blank" rel="noopener noreferrer" 
               class="partner-logo bg-slate-50 hover:bg-white border border-slate-200/80 rounded-2xl p-6 flex items-center justify-center shadow-sm hover:shadow-md cursor-pointer group">
                <span class="font-black text-yellow-500 text-base tracking-tight group-hover:scale-110 transition-transform">indosat</span>
            </a>

        </div>
    </div>
</section>

<!-- ==================== 4. BANNER AJAKAN KEMITRAAN ==================== -->
<section id="footerBanner" class="py-12 sm:py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="relative rounded-3xl overflow-hidden bg-slate-900 shadow-2xl p-8 sm:p-12 border border-slate-800">
            <!-- Background Image Overlay -->
            <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&q=80&w=1600" 
                 alt="Bangun Desa" 
                 class="absolute inset-0 w-full h-full object-cover object-center opacity-30 mix-blend-overlay">
            
            <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                
                <div class="space-y-2 max-w-xl">
                    <h3 class="text-2xl sm:text-3xl font-black text-white leading-tight">
                        Mari Bangun Desa Bersama
                    </h3>
                    <p class="text-slate-300 text-xs sm:text-sm font-normal">
                        Punya gagasan, ingin berkolaborasi, atau menjadi bagian dari perubahan positif di Kota Batu?
                    </p>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
                    <button onclick="openContactModal()" 
                            class="px-6 py-3 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs sm:text-sm shadow-lg hover:shadow-emerald-900/50 hover:scale-105 transition-all flex items-center justify-center gap-2">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Hubungi Kami</span>
                    </button>
                    
                    <a href="{{ url('/kemitraan/formulir') }}" 
                       class="px-6 py-3 rounded-full bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs sm:text-sm border border-slate-700 hover:border-slate-500 hover:scale-105 transition-all flex items-center justify-center gap-2 no-underline">
                        <span>Ajukan Kemitraan</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- MODAL CONTACT US -->
<div id="contactModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl relative transform transition-all scale-95 opacity-0" id="modalBox">
        <button onclick="closeContactModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="text-center space-y-3">
            <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto text-xl">
                <i class="fa-solid fa-headset"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900">Hubungi Tim Kemitraan</h3>
            <p class="text-slate-500 text-xs">Kirimkan pertanyaan atau tawaran kerjasama langsung melalui kontak di bawah ini.</p>
        </div>
        <div class="mt-6 space-y-3">
            <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center gap-3 p-3.5 bg-slate-50 hover:bg-emerald-50 rounded-2xl border border-slate-200 text-slate-800 font-medium text-xs transition no-underline">
                <i class="fa-brands fa-whatsapp text-emerald-600 text-lg"></i>
                <span>WhatsApp: +62 812-3456-7890</span>
            </a>
            <a href="mailto:kemitraan@simpulae.batukota.go.id" class="flex items-center gap-3 p-3.5 bg-slate-50 hover:bg-blue-50 rounded-2xl border border-slate-200 text-slate-800 font-medium text-xs transition no-underline">
                <i class="fa-regular fa-envelope text-blue-600 text-lg"></i>
                <span>Email: kemitraan@simpulae.batukota.go.id</span>
            </a>
        </div>
    </div>
</div>

<!-- MODAL ZOOM GAMBAR HERO -->
<div id="imageModal" class="fixed inset-0 bg-black/80 z-50 hidden flex items-center justify-center p-4" onclick="closeImage()">
    <div class="relative max-w-4xl w-full flex justify-center">
        <img id="modalImg" src="" class="max-h-[85vh] rounded-xl shadow-2xl object-contain">
    </div>
</div>

@push('scripts')
<script>
    // MODAL CONTACT
    function openContactModal() {
        const modal = document.getElementById('contactModal');
        const modalBox = document.getElementById('modalBox');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeContactModal() {
        const modal = document.getElementById('contactModal');
        const modalBox = document.getElementById('modalBox');
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    }

    // ZOOM GAMBAR HERO
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