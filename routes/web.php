<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LigaDesaController;
use App\Http\Controllers\KemitraanController; 
use App\Http\Controllers\AdminKemitraanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Route untuk Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Halaman Publik (View Static)
Route::get('/tentang', function () { return view('tentang'); });
Route::get('/program', function () { return view('program'); });
Route::get('/desa', function () { return view('desa'); });
Route::get('/liga-desa', [LigaDesaController::class, 'index'])->name('liga-desa');
Route::get('/dampak', function () { return view('dampak'); });
Route::get('/berita', function () { return view('berita'); });

// ROUTE KEMITRAAN (PUBLIK)
Route::get('/kemitraan', [KemitraanController::class, 'dashboard'])->name('kemitraan.dashboard');
Route::get('/kemitraan/formulir', [KemitraanController::class, 'formulir'])->name('kemitraan.formulir');
Route::post('/kemitraan/simpan', [KemitraanController::class, 'store'])->name('kemitraan.simpan');

// ROUTE ADMIN (PROTECTED WITH AUTH)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/kemitraan', [AdminKemitraanController::class, 'index'])->name('kemitraan.index');
    Route::get('/kemitraan/export-excel', [AdminKemitraanController::class, 'exportExcel'])->name('kemitraan.export');
    Route::delete('/kemitraan/{id}', [AdminKemitraanController::class, 'destroy'])->name('kemitraan.destroy');
});

// ROUTE AUTHENTICATION (LOGIN & LOGOUT)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/kemitraan');
    }

    return back()->withErrors([
        'email' => 'Email atau password yang Anda masukkan salah.',
    ])->onlyInput('email');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');