<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\Perusahaan\ProfileController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\Perusahaan\PerusahaanJobsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Alumni\AlumniDashboardController;
use App\Http\Controllers\KegiatanBkkController;
use App\Http\Controllers\ImportTracerController;
use App\Http\Controllers\TracerStudyController;

// -----------------------------
// Root-level routes
// -----------------------------
Route::get('/', [TracerStudyController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// -----------------------------
// Public resource routes
// -----------------------------
Route::prefix('lowongan')->group(function () {
    Route::get('/', [LowonganController::class, 'publicIndex'])->name('lowongan.public');
    Route::get('/{slug}', [LowonganController::class, 'publicShow'])->name('lowongan.show.public');
});

Route::prefix('kegiatan')->group(function () {
    Route::get('/', [KegiatanBkkController::class, 'publicIndex'])->name('kegiatan.public');
    Route::get('/{id}', [KegiatanBkkController::class, 'publicShow'])->name('kegiatan.show.public');
});

// -----------------------------
// Auth routes
// -----------------------------
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// -----------------------------
// Authenticated routes
// -----------------------------
Route::prefix('notifikasi')->middleware('auth')->group(function () {
    Route::get('/', [NotifikasiController::class, 'index'])->name('notifikasi.index');
    Route::post('/mark-as-read/{id}', [NotifikasiController::class, 'markAsRead'])->name('notifikasi.read');
    Route::post('/mark-all-read', [NotifikasiController::class, 'markAllAsRead'])->name('notifikasi.read.all');
    Route::delete('/{id}', [NotifikasiController::class, 'destroy'])->name('notifikasi.destroy');
    Route::delete('/clear-read', [NotifikasiController::class, 'clearRead'])->name('notifikasi.clear.read');
});

// API routes
Route::prefix('api')->middleware('auth')->group(function () {
    Route::get('/notifikasi/unread-count', [NotifikasiController::class, 'unreadCount'])->name('notifikasi.unread-count');
    Route::get('/notifikasi/terbaru', [NotifikasiController::class, 'latestNotifications'])->name('notifikasi.latest');
});

// Profile routes
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -----------------------------
// Admin routes
// -----------------------------
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // CRUD Lowongan Admin
    Route::prefix('lowongan')->group(function () {
        Route::get('/', [LowonganController::class, 'index'])->name('lowongan.index');
        Route::get('/create', [LowonganController::class, 'create'])->name('lowongan.create');
        Route::post('/', [LowonganController::class, 'store'])->name('lowongan.store');
        Route::get('/{lowongan}/edit', [LowonganController::class, 'edit'])->name('lowongan.edit');
        Route::put('/{lowongan}', [LowonganController::class, 'update'])->name('lowongan.update');
        Route::delete('/{lowongan}', [LowonganController::class, 'destroy'])->name('lowongan.destroy');
        Route::post('/{lowongan}/toggle-status', [LowonganController::class, 'toggleStatus'])->name('lowongan.toggle-status');
    });

    // CRUD Perusahaan Admin
    Route::prefix('perusahaan')->group(function () {
        Route::get('/dashboard', [PerusahaanController::class, 'dashboard'])->name('perusahaan.admin.dashboard');
        Route::get('/', [PerusahaanController::class, 'index'])->name('perusahaan.index');
        Route::get('/create', [PerusahaanController::class, 'create'])->name('perusahaan.create');
        Route::post('/', [PerusahaanController::class, 'store'])->name('perusahaan.store');
        Route::get('/show/{perusahaan}', [PerusahaanController::class, 'show'])->name('perusahaan.show');
        Route::get('/{perusahaan}/edit', [PerusahaanController::class, 'edit'])->name('perusahaan.edit');
        Route::put('/{perusahaan}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
        Route::delete('/{perusahaan}', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');
        Route::get('/{id}/verify', [PerusahaanController::class, 'verify'])->name('perusahaan.verify');
    });

    // CRUD Lamaran Admin
    Route::prefix('lamaran')->group(function () {
        Route::get('/', [LamaranController::class, 'index'])->name('lamaran.index');
        Route::get('/{lamaran}', [LamaranController::class, 'show'])->name('lamaran.show');
        Route::delete('/{lamaran}', [LamaranController::class, 'destroy'])->name('lamaran.destroy');
        Route::get('/download-cv/{alumni}', [LamaranController::class, 'downloadCv'])->name('lamaran.download-cv');
    });

    // CRUD Kegiatan Admin
    Route::prefix('kegiatan')->group(function () {
        Route::get('/', [KegiatanBkkController::class, 'index'])->name('kegiatan.index');
        Route::get('/create', [KegiatanBkkController::class, 'create'])->name('kegiatan.create');
        Route::post('/', [KegiatanBkkController::class, 'store'])->name('kegiatan.store');
        Route::get('/{kegiatan}', [KegiatanBkkController::class, 'show'])->name('kegiatan.show');
        Route::get('/{kegiatan}/edit', [KegiatanBkkController::class, 'edit'])->name('kegiatan.edit');
        Route::put('/{kegiatan}', [KegiatanBkkController::class, 'update'])->name('kegiatan.update');
        Route::delete('/{kegiatan}', [KegiatanBkkController::class, 'destroy'])->name('kegiatan.destroy');
    });

    // Import Tracer
    Route::get('/tracer', function () {
        return view('admin.tracer.import');
    })->name('admin.tracer.import.form');
    Route::post('/tracer/import', [ImportTracerController::class, 'store'])->name('admin.tracer.import.store');
});

// -----------------------------
// Alumni routes
// -----------------------------
// CRUD Alumni Admin
Route::prefix('alumni')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AlumniController::class, 'index'])->name('alumni.index'); // Daftar alumni
    Route::get('/create', [AlumniController::class, 'create'])->name('alumni.create');
    Route::post('/', [AlumniController::class, 'store'])->name('alumni.store');
    Route::get('/{alumni}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
    Route::put('/{alumni}', [AlumniController::class, 'update'])->name('alumni.update');
    Route::delete('/{alumni}', [AlumniController::class, 'destroy'])->name('alumni.destroy');
});


Route::prefix('lamaran')->group(function () {
    Route::get('/', [LamaranController::class, 'index'])->name('lamaran.index');
    Route::get('/create', [LamaranController::class, 'create'])->name('lamaran.create'); // <-- ini yang hilang
    Route::post('/', [LamaranController::class, 'store'])->name('lamaran.store');       // untuk menyimpan data baru
    Route::get('/{lamaran}', [LamaranController::class, 'show'])->name('lamaran.show');
    Route::delete('/{lamaran}', [LamaranController::class, 'destroy'])->name('lamaran.destroy');
    Route::get('/download-cv/{alumni}', [LamaranController::class, 'downloadCv'])->name('lamaran.download-cv');
});

// -----------------------------
// Perusahaan routes (authenticated + lowongan)
// -----------------------------
Route::prefix('perusahaan')->middleware(['auth', 'perusahaan'])->group(function () {

    Route::get('/dashboard', [PerusahaanController::class, 'dashboard'])->name('perusahaan.dashboard');
    Route::get('/profile', [PerusahaanController::class, 'profile'])->name('perusahaan.profile');
    Route::put('/profile', [PerusahaanController::class, 'updateProfile'])->name('perusahaan.profile.update');
    Route::get('/lamaran', [PerusahaanController::class, 'myLamaran'])->name('perusahaan.lamaran');

    // ---- CRUD Lowongan ----
    Route::prefix('lowongan')->group(function(){
        Route::get('/', [PerusahaanJobsController::class, 'index'])->name('perusahaan.jobs.index');
        Route::get('/create', [PerusahaanJobsController::class, 'create'])->name('perusahaan.jobs.create');
        Route::post('/', [PerusahaanJobsController::class, 'store'])->name('perusahaan.jobs.store');
        Route::get('/{lowongan}/edit', [PerusahaanJobsController::class, 'edit'])->name('perusahaan.jobs.edit');
        Route::put('/{lowongan}', [PerusahaanJobsController::class, 'update'])->name('perusahaan.jobs.update');
        Route::delete('/{lowongan}', [PerusahaanJobsController::class, 'destroy'])->name('perusahaan.jobs.destroy');
    });

});

// -----------------------------
// Public perusahaan routes
// -----------------------------
Route::prefix('perusahaan')->group(function () {
    Route::get('/', [PerusahaanController::class, 'publicIndex'])->name('perusahaan.public');
    Route::get('/show/{id}', [PerusahaanController::class, 'publicShow'])->name('perusahaan.show.public');

});

   Route::prefix('perusahaan')->middleware(['auth', 'perusahaan'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('perusahaan.profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('perusahaan.profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('perusahaan.profile.update');
});
// ===============================
// DASHBOARD ALUMNI
// ===============================
Route::middleware(['auth', 'alumni'])->prefix('alumni')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Alumni\DashboardAlumniController::class, 'index'])
        ->name('alumni.dashboard');
});

Route::get('/alumni/dashboard', function () {
    return view('alumni.dashboard');
})->name('alumni.dashboard');
