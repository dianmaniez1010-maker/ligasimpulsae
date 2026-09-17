@extends('layouts.app')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
<!-- ==================== HERO SECTION ==================== -->
<div class="relative w-full overflow-hidden bg-slate-800 min-h-[380px] sm:min-h-[420px] flex items-center shadow-md">
    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=1600" 
         alt="Kemitraan SimpulSae" 
         class="absolute inset-0 w-full h-full object-cover object-center opacity-90">
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-900/70 to-transparent"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-12">
        <div class="max-w-2xl space-y-3">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900/60 border border-white/20 text-emerald-300 text-xs font-semibold backdrop-blur-md">
                <i class="fa-solid fa-leaf text-emerald-400"></i> Kemitraan
            </div>
            <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                Bersama Membangun Dampak yang Lebih Luas
            </h1>
            <p class="text-slate-200 text-xs sm:text-sm leading-relaxed">
                Kami percaya kolaborasi adalah kunci untuk mempercepat pembangunan desa. Mari bermitra dengan SimpulSae untuk menciptakan peluang, inovasi, dan dampak berkelanjutan.
            </p>
        </div>
    </div>
</div>

<!-- ==================== MAIN CONTENT SECTION ==================== -->
<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- KIRI: MENGAPA BERMITRA -->
            <div class="lg:col-span-4 space-y-6">
                <div>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-900 leading-snug">
                        Mengapa Bermitra<br>Bersama SimpulSae?
                    </h2>
                </div>

                <div class="space-y-5">
                    <!-- Point 1 -->
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100/70 text-emerald-600 flex items-center justify-center text-lg shrink-0">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Dampak Nyata</h3>
                            <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Bersama mendorong kemajuan 24 desa di Kota Batu.</p>
                        </div>
                    </div>

                    <!-- Point 2 -->
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100/70 text-emerald-600 flex items-center justify-center text-lg shrink-0">
                            <i class="fa-solid fa-diagram-project"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Kolaborasi Strategis</h3>
                            <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Terhubung dengan berbagai pihak: pemerintah, swasta, komunitas, dan akademisi.</p>
                        </div>
                    </div>

                    <!-- Point 3 -->
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100/70 text-emerald-600 flex items-center justify-center text-lg shrink-0">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Peluang Berkelanjutan</h3>
                            <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Dukungan untuk program inovatif dan potensi lokal desa.</p>
                        </div>
                    </div>

                    <!-- Point 4 -->
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100/70 text-emerald-600 flex items-center justify-center text-lg shrink-0">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Visibilitas & Reputasi</h3>
                            <p class="text-slate-500 text-xs mt-0.5 leading-relaxed">Menjadi bagian dari gerakan pembangunan desa yang berdampak luas.</p>
                        </div>
                    </div>
                </div>

                <!-- Banner Card Kiri -->
                <div class="relative rounded-2xl overflow-hidden shadow-md mt-6 h-48 flex items-end p-5">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=800" 
                         alt="Desa" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/30 to-transparent"></div>
                    <p class="relative z-10 text-white font-bold text-sm italic leading-tight">
                        Bersama,<br>desa lebih kuat,<br>masa depan lebih baik
                    </p>
                </div>
            </div>

            <!-- KANAN: FORMULIR KEMITRAAN -->
            <div class="lg:col-span-8 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm">
                
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center text-lg shadow-md shadow-emerald-500/20">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Formulir Kemitraan</h2>
                        <p class="text-slate-400 text-xs">Isi data berikut untuk menjalin kolaborasi bersama kami.</p>
                    </div>
                </div>

                <form action="{{ url('/kemitraan/simpan') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- STEP 1: INFORMASI MITRA -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white text-xs font-bold flex items-center justify-center">1</span>
                            <h3 class="text-sm font-bold text-slate-900">Informasi Mitra</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Organisasi / Perusahaan <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_organisasi" required placeholder="Masukkan nama organisasi atau perusahaan" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Jenis Mitra <span class="text-red-500">*</span></label>
                                <select name="jenis_mitra" required class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 text-slate-600 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                                    <option value="" disabled selected>Pilih jenis mitra</option>
                                    <option value="Perusahaan Swasta">Perusahaan Swasta</option>
                                    <option value="Instansi Pemerintah">Instansi Pemerintah</option>
                                    <option value="LSM / NGO">LSM / NGO</option>
                                    <option value="Akademisi / Perguruan Tinggi">Akademisi / Perguruan Tinggi</option>
                                    <option value="Komunitas">Komunitas</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Bidang Usaha / Keahlian <span class="text-red-500">*</span></label>
                                <select name="bidang_usaha" required class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 text-slate-600 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                                    <option value="" disabled selected>Pilih bidang usaha / keahlian</option>
                                    <option value="Teknologi & Informasi">Teknologi & Informasi</option>
                                    <option value="Pertanian & Perkebunan">Pertanian & Perkebunan</option>
                                    <option value="Pariwisata & Ekonomi Kreatif">Pariwisata & Ekonomi Kreatif</option>
                                    <option value="Keuangan & Perbankan">Keuangan & Perbankan</option>
                                    <option value="Pendidikan & Pelatihan">Pendidikan & Pelatihan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Alamat Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="alamat" required placeholder="Masukkan alamat lengkap" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: PENANGGUNG JAWAB -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white text-xs font-bold flex items-center justify-center">2</span>
                            <h3 class="text-sm font-bold text-slate-900">Penanggung Jawab</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_penanggung_jawab" required placeholder="Masukkan nama lengkap" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Jabatan <span class="text-red-500">*</span></label>
                                <input type="text" name="jabatan" required placeholder="Masukkan jabatan" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" required placeholder="contoh@domain.com" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">No. WhatsApp <span class="text-red-500">*</span></label>
                                <input type="tel" name="whatsapp" required placeholder="08xxxxxxxxxx" class="w-full text-xs px-3.5 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3: BENTUK KEMITRAAN YANG DIINGINKAN -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white text-xs font-bold flex items-center justify-center">3</span>
                            <h3 class="text-sm font-bold text-slate-900">Bentuk Kemitraan yang Diinginkan</h3>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                            <label class="cursor-pointer border border-slate-200 rounded-xl p-3 flex flex-col items-center text-center gap-1.5 hover:border-emerald-500 transition group has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50/40">
                                <input type="radio" name="bentuk_kemitraan" value="Dukungan Program" class="hidden peer" {{ request('tipe') == 'pendampingan' ? 'checked' : '' }}>
                                <i class="fa-solid fa-hand-holding-heart text-slate-400 peer-checked:text-emerald-600 group-hover:text-emerald-500 text-base"></i>
                                <span class="text-[11px] font-medium text-slate-600 peer-checked:text-emerald-700">Dukungan Program</span>
                            </label>

                            <label class="cursor-pointer border border-slate-200 rounded-xl p-3 flex flex-col items-center text-center gap-1.5 hover:border-emerald-500 transition group has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50/40">
                                <input type="radio" name="bentuk_kemitraan" value="Pendanaan" class="hidden peer" {{ request('tipe') == 'pendanaan' ? 'checked' : '' }}>
                                <i class="fa-solid fa-hand-holding-dollar text-slate-400 peer-checked:text-emerald-600 group-hover:text-emerald-500 text-base"></i>
                                <span class="text-[11px] font-medium text-slate-600 peer-checked:text-emerald-700">Pendanaan</span>
                            </label>

                            <label class="cursor-pointer border border-slate-200 rounded-xl p-3 flex flex-col items-center text-center gap-1.5 hover:border-emerald-500 transition group has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50/40">
                                <input type="radio" name="bentuk_kemitraan" value="Penyediaan Fasilitas" class="hidden peer" {{ request('tipe') == 'teknologi' ? 'checked' : '' }}>
                                <i class="fa-solid fa-building text-slate-400 peer-checked:text-emerald-600 group-hover:text-emerald-500 text-base"></i>
                                <span class="text-[11px] font-medium text-slate-600 peer-checked:text-emerald-700 leading-tight">Penyediaan Fasilitas/ Infrastruktur</span>
                            </label>

                            <label class="cursor-pointer border border-slate-200 rounded-xl p-3 flex flex-col items-center text-center gap-1.5 hover:border-emerald-500 transition group has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50/40">
                                <input type="radio" name="bentuk_kemitraan" value="Kolaborasi Kegiatan" class="hidden peer" {{ request('tipe') == 'kolaborasi' ? 'checked' : '' }}>
                                <i class="fa-solid fa-people-group text-slate-400 peer-checked:text-emerald-600 group-hover:text-emerald-500 text-base"></i>
                                <span class="text-[11px] font-medium text-slate-600 peer-checked:text-emerald-700">Kolaborasi Kegiatan</span>
                            </label>

                            <label class="cursor-pointer border border-slate-200 rounded-xl p-3 flex flex-col items-center text-center gap-1.5 hover:border-emerald-500 transition group has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50/40 col-span-2 sm:col-span-1">
                                <input type="radio" name="bentuk_kemitraan" value="Lainnya" class="hidden peer">
                                <i class="fa-solid fa-ellipsis text-slate-400 peer-checked:text-emerald-600 group-hover:text-emerald-500 text-base"></i>
                                <span class="text-[11px] font-medium text-slate-600 peer-checked:text-emerald-700">Lainnya</span>
                            </label>
                        </div>
                    </div>

                    <!-- STEP 4: PESAN / DESKRIPSI & LAMPIRAN -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white text-xs font-bold flex items-center justify-center">4</span>
                            <h3 class="text-sm font-bold text-slate-900">Pesan / Deskripsi</h3>
                        </div>

                        <div>
                            <textarea name="deskripsi" rows="4" required placeholder="Ceritakan lebih lanjut tentang rencana kemitraan Anda..." class="w-full text-xs p-3.5 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition resize-none"></textarea>
                        </div>

                        <!-- Upload File Container -->
                        <div class="p-4 rounded-xl border border-dashed border-slate-300 bg-slate-50/50 flex items-start gap-3">
                            <div class="text-slate-400 text-xl pt-0.5">
                                <i class="fa-solid fa-paperclip"></i>
                            </div>
                            <div class="flex-1">
                                <span class="text-xs font-semibold text-slate-800">Lampiran <span class="text-slate-400 font-normal">(Opsional)</span></span>
                                <p class="text-[11px] text-slate-400 mb-2">Proposal, profil perusahaan, atau dokumen pendukung lainnya (PDF, Max 5MB)</p>
                                <div class="flex items-center gap-3">
                                    <label class="px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-xs font-medium text-slate-700 hover:bg-slate-100 cursor-pointer transition shadow-sm">
                                        Pilih File
                                        <input type="file" name="lampiran" class="hidden" onchange="document.getElementById('fileName').innerText = this.files[0] ? this.files[0].name : 'Tidak ada file yang dipilih'">
                                    </label>
                                    <span id="fileName" class="text-xs text-slate-400 italic">Tidak ada file yang dipilih</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FOOTER BUTTONS -->
                    <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                        <button type="reset" class="px-5 py-2.5 rounded-full border border-slate-200 text-slate-600 hover:bg-slate-100 font-semibold text-xs transition">
                            Reset
                        </button>
                        <button type="submit" class="px-6 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs shadow-lg shadow-emerald-600/30 transition flex items-center gap-2">
                            <i class="fa-regular fa-paper-plane"></i>
                            <span>Kirim Permohonan</span>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
@endsection