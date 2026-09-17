<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemitraan extends Model
{
    use HasFactory;

    // UBAH DARI 'kemitraan' MENJADI 'kemitraans'
    protected $table = 'kemitraans';

    protected $fillable = [
        'nama_organisasi', 
        'jenis_mitra', 
        'bidang_usaha', 
        'alamat',
        'nama_penanggung_jawab', 
        'jabatan', 
        'email', 
        'whatsapp',
        'bentuk_kemitraan', 
        'deskripsi', 
        'lampiran', 
        'status'
    ];
}