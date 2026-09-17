<?php

namespace App\Http\Controllers;

use App\Models\Kemitraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKemitraanController extends Controller
{
    // Menampilkan daftar pesan kemitraan yang masuk
    public function index() {
        $mitraList = Kemitraan::latest()->paginate(10);
        return view('admin.kemitraan.index', compact('mitraList'));
    }

    // Menghapus data mitra
    public function destroy($id) {
        $item = Kemitraan::findOrFail($id);
        if ($item->lampiran) {
            Storage::disk('public')->delete($item->lampiran);
        }
        $item->delete();
        return back()->with('success', 'Data permohonan berhasil dihapus.');
    }

    // Export data langsung ke format Excel (CSV)
    public function exportExcel() {
        $fileName = 'data_mitra_' . date('Y-m-d_H-i-s') . '.csv';
        $mitra = Kemitraan::all();

        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['ID', 'Tanggal', 'Organisasi/Perusahaan', 'Jenis Mitra', 'Bidang Usaha', 'PJ', 'Jabatan', 'Email', 'WhatsApp', 'Bentuk Kemitraan', 'Pesan'];

        $callback = function() use($mitra, $columns) {
            $file = fopen('php://output', 'w');
            fputs($file, "\xEF\xBB\xBF"); // Fitur pendukung agar huruf/karakter di Excel rapi
            fputcsv($file, $columns);

            foreach ($mitra as $row) {
                fputcsv($file, [
                    $row->id,
                    $row->created_at->format('Y-m-d H:i'),
                    $row->nama_organisasi,
                    $row->jenis_mitra,
                    $row->bidang_usaha,
                    $row->nama_penanggung_jawab,
                    $row->jabatan,
                    $row->email,
                    $row->whatsapp,
                    $row->bentuk_kemitraan,
                    $row->deskripsi,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}