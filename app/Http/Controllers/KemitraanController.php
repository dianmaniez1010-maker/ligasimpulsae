<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kemitraan;

class KemitraanController extends Controller
{
    public function dashboard()
    {
        return view('kemitraan');
    }

    public function formulir()
    {
        return view('kemitraan-formulir');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_organisasi'       => 'required|string|max:255',
            'jenis_mitra'           => 'required|string',
            'bidang_usaha'          => 'required|string',
            'alamat'                => 'required|string',
            'nama_penanggung_jawab' => 'required|string|max:255',
            'jabatan'               => 'required|string',
            'email'                 => 'required|email',
            'whatsapp'              => 'required|string',
            'bentuk_kemitraan'      => 'required|string',
            'deskripsi'             => 'required|string',
            'lampiran'              => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')->store('lampiran_kemitraan', 'public');
            $validated['lampiran'] = $path;
        }

        Kemitraan::create($validated);

        return redirect()->back()->with('success', 'Permohonan kemitraan berhasil dikirim!');
    }
}