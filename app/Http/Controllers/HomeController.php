<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data Statistik
        $stats = [
            'desa'     => 24,
            'pemuda'   => 1240,
            'umkm'     => 326,
            'program'  => 48,
            'esg'      => 76,
        ];

        // Data 24 Desa (Contoh Data Dummy - nantinya bisa dari Model/Database: Desa::all())
        $desaList = [
            [
                'nama' => 'Desa Sumbergondo',
                'kecamatan' => 'Kec. Bumiaji',
                'tags' => ['Pertanian', 'Wisata'],
                'gambar' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=400&q=80',
                'slug' => 'sumbergondo'
            ],
            [
                'nama' => 'Desa Punten',
                'kecamatan' => 'Kec. Bumiaji',
                'tags' => ['Pertanian', 'UMKM'],
                'gambar' => 'https://images.unsplash.com/photo-1590682680695-43b964a3ae17?auto=format&fit=crop&w=400&q=80',
                'slug' => 'punten'
            ],
            [
                'nama' => 'Desa Bumiaji',
                'kecamatan' => 'Kec. Bumiaji',
                'tags' => ['Pertanian', 'Wisata'],
                'gambar' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80',
                'slug' => 'bumiaji'
            ],
            [
                'nama' => 'Desa Oro-Oro Ombo',
                'kecamatan' => 'Kec. Batu',
                'tags' => ['Wisata', 'Digital'],
                'gambar' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=400&q=80',
                'slug' => 'oro-oro-ombo'
            ],
        ];

        // Data Berita & Kisah Desa (Contoh Data Dummy - nantinya bisa dari Model Berita::latest()->get())
        $beritaList = [
            [
                'judul' => 'Pemuda Desa Sumbergondo Ciptakan Aplikasi Pertanian Digital',
                'tanggal' => '12 Juni 2025',
                'gambar' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=500&q=80',
                'slug' => 'pemuda-sumbergondo-aplikasi-digital'
            ],
            [
                'judul' => 'Liga Desa 2025 Resmi Dibuka di Kota Batu',
                'tanggal' => '8 Juni 2025',
                'gambar' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=500&q=80',
                'slug' => 'liga-desa-2025-resmi-dibuka'
            ],
            [
                'judul' => 'UMKM Kopi Bumiaji Go Digital Berkat Simpulsae Hub',
                'tanggal' => '3 Juni 2025',
                'gambar' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=500&q=80',
                'slug' => 'umkm-kopi-bumiaji-go-digital'
            ],
        ];

        // Kirim data ke view welcome.blade.php
        return view('welcome', compact('stats', 'desaList', 'beritaList'));
    }
}