<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKemitraansTable extends Migration {
    public function up(): void {
        Schema::create('kemitraans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->string('jenis_mitra');
            $table->string('bidang_usaha');
            $table->text('alamat');
            $table->string('nama_penanggung_jawab');
            $table->string('jabatan');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('bentuk_kemitraan');
            $table->text('deskripsi');
            $table->string('lampiran')->nullable();
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('kemitraans');
    }
}