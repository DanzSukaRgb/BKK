<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\KegiatanBkkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/pendaftaran', function () {
//     return view('pendaftaran-alumni');
// });
Route::get('/lowongan', [LowonganController::class, 'publicIndex'])->name('lowongan.public');
Route::get('/lowongan/{slug}', [LowonganController::class, 'publicShow'])->name('lowongan.show.public');
Route::get('/kegiatan', [KegiatanBkkController::class, 'publicIndex'])->name('kegiatan.public');
Route::get('/kegiatan/{id}', [KegiatanBkkController::class, 'publicShow'])->name('kegiatan.show.public');
Route::get('/perusahaan', [PerusahaanController::class, 'publicIndex'])->name('perusahaan.public');
Route::get('/perusahaan/{id}', [PerusahaanController::class, 'publicShow'])->name('perusahaan.show.public');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Notifikasi routes
Route::prefix('notifikasi')->middleware('auth')->group(function () {
    Route::get('/', [NotifikasiController::class, 'index'])->name('notifikasi.index');
    Route::post('/mark-as-read/{id}', [NotifikasiController::class, 'markAsRead'])->name('notifikasi.read');
    Route::post('/mark-all-read', [NotifikasiController::class, 'markAllAsRead'])->name('notifikasi.read.all');
    Route::delete('/{id}', [NotifikasiController::class, 'destroy'])->name('notifikasi.destroy');
    Route::delete('/clear-read', [NotifikasiController::class, 'clearRead'])->name('notifikasi.clear.read');
});

// API Routes untuk notifikasi
Route::prefix('api')->middleware('auth')->group(function () {
    Route::get('/notifikasi/unread-count', [NotifikasiController::class, 'unreadCount']);
    Route::get('/notifikasi/terbaru', [NotifikasiController::class, 'latestNotifications']);
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('lowongan', LowonganController::class)->except(['show']);

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('alumni', AlumniController::class)->except(['show']);
    Route::get('/alumni/{alumni}', [AlumniController::class, 'show'])->name('alumni.show');
    Route::resource('perusahaan', PerusahaanController::class)->except(['show']);
    Route::resource('lamaran', LamaranController::class);
    Route::resource('kegiatan', KegiatanBkkController::class)->except(['show']);
    Route::post('/perusahaan/{id}/verify', [PerusahaanController::class, 'verify'])->name('perusahaan.verify');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

// Alumni routes
Route::post('/lowongan/{id}/lamar', [LamaranController::class, 'store'])->name('lamaran.store');
Route::middleware(['auth', 'alumni'])->group(function () {
    Route::get('/alumni/dashboard', [AlumniController::class, 'dashboard'])->name('alumni.dashboard');
    Route::get('/alumni/profile', [AlumniController::class, 'profile'])->name('alumni.profile');
    Route::put('/alumni/profile', [AlumniController::class, 'updateProfile'])->name('alumni.profile.update');
    // Perusahaan routes
});

Route::middleware(['auth', 'perusahaan'])->group(function () {
    Route::get('/perusahaan/dashboard', [PerusahaanController::class, 'dashboard'])->name('perusahaan.dashboard');
    Route::get('/perusahaan/profile', [PerusahaanController::class, 'profile'])->name('perusahaan.profile');
    Route::put('/perusahaan/profile', [PerusahaanController::class, 'updateProfile'])->name('perusahaan.profile.update');
    Route::get('/perusahaan/lowongan', [PerusahaanController::class, 'myLowongan'])->name('perusahaan.lowongan');
    Route::get('/perusahaan/lamaran', [PerusahaanController::class, 'myLamaran'])->name('perusahaan.lamaran');
    Route::post('/lamaran/{id}/process', [LamaranController::class, 'process'])->name('lamaran.process');
});