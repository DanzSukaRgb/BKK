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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KegiatanBkkController;

/*-------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
| Routes accessible to all users (no authentication required)
*/
Route::name('public.')->group(function () {
    // Home and contact
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');

    // Public resources
    Route::prefix('lowongan')->name('lowongan.')->group(function () {
        Route::get('/', [LowonganController::class, 'publicIndex'])->name('index');
        Route::get('/{slug}', [LowonganController::class, 'publicShow'])->name('show');
    });

    Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
        Route::get('/', [KegiatanBkkController::class, 'publicIndex'])->name('index');
        Route::get('/{id}', [KegiatanBkkController::class, 'publicShow'])->name('show');
    });

    Route::prefix('perusahaan')->name('perusahaan.')->group(function () {
        Route::get('/', [PerusahaanController::class, 'publicIndex'])->name('index');
        Route::get('/{id}', [PerusahaanController::class, 'publicShow'])->name('show');
        Route::get('/create', [PerusahaanController::class, 'create'])->name('create');
    });
});

/*-------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
| Routes for user authentication
*/
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

/*-------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
| Routes that require authentication (no specific role)
*/
Route::middleware('auth')->group(function () {
    // Notifications
    Route::prefix('notifikasi')->name('notifikasi.')->group(function () {
        Route::get('/', [NotifikasiController::class, 'index'])->name('index');
        Route::post('/mark-as-read/{id}', [NotifikasiController::class, 'markAsRead'])->name('read');
        Route::post('/mark-all-read', [NotifikasiController::class, 'markAllAsRead'])->name('read.all');
        Route::delete('/{id}', [NotifikasiController::class, 'destroy'])->name('destroy');
        Route::delete('/clear-read', [NotifikasiController::class, 'clearRead'])->name('clear.read');
    });

    // API endpoints
    Route::prefix('api')->name('api.')->group(function () {
        Route::get('/notifikasi/unread-count', [NotifikasiController::class, 'unreadCount'])->name('notifikasi.unread-count');
        Route::get('/notifikasi/terbaru', [NotifikasiController::class, 'latestNotifications'])->name('notifikasi.latest');
    });

    // Profile management
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

/*-------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Routes accessible only to users with admin role
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Lowongan management
    Route::prefix('lowongan')->name('lowongan.')->group(function () {
        Route::get('/', [LowonganController::class, 'index'])->name('index');
        Route::get('/create', [LowonganController::class, 'create'])->name('create');
        Route::post('/', [LowonganController::class, 'store'])->name('store');
        Route::get('/{lowongan}/edit', [LowonganController::class, 'edit'])->name('edit');
        Route::put('/{lowongan}', [LowonganController::class, 'update'])->name('update');
        Route::delete('/{lowongan}', [LowonganController::class, 'destroy'])->name('destroy');
        Route::post('/{lowongan}/toggle-status', [LowonganController::class, 'toggleStatus'])->name('toggle-status');
    });

    // Alumni management
    Route::prefix('alumni')->name('alumni.')->group(function () {
        Route::get('/', [AlumniController::class, 'index'])->name('index');
        Route::get('/create', [AlumniController::class, 'create'])->name('create');
        Route::post('/', [AlumniController::class, 'store'])->name('store');
        Route::get('/{alumni}', [AlumniController::class, 'show'])->name('show');
        Route::get('/{alumni}/edit', [AlumniController::class, 'edit'])->name('edit');
        Route::put('/{alumni}', [AlumniController::class, 'update'])->name('update');
        Route::delete('/{alumni}', [AlumniController::class, 'destroy'])->name('destroy');
    });

    // Perusahaan management
    Route::prefix('perusahaan')->name('perusahaan.')->group(function () {
        Route::get('/', [PerusahaanController::class, 'index'])->name('index');
        Route::get('/create', [PerusahaanController::class, 'create'])->name('create');
        Route::post('/', [PerusahaanController::class, 'store'])->name('store');
        Route::get('/show/{perusahaan}', [PerusahaanController::class, 'show'])->name('show');
        Route::get('/{perusahaan}/edit', [PerusahaanController::class, 'edit'])->name('edit');
        Route::put('/{perusahaan}', [PerusahaanController::class, 'update'])->name('update');
        Route::delete('/{perusahaan}', [PerusahaanController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/verify', [PerusahaanController::class, 'verify'])->name('verify');
    });

    // Lamaran management
    Route::prefix('lamaran')->name('lamaran.')->group(function () {
        Route::get('/', [LamaranController::class, 'index'])->name('index');
        Route::get('/create', [LamaranController::class, 'create'])->name('create');
        Route::post('/', [LamaranController::class, 'store'])->name('store');
        Route::get('/{lamaran}', [LamaranController::class, 'show'])->name('show');
        Route::get('/{lamaran}/edit', [LamaranController::class, 'edit'])->name('edit');
        Route::put('/{lamaran}', [LamaranController::class, 'update'])->name('update');
        Route::delete('/{lamaran}', [LamaranController::class, 'destroy'])->name('destroy');
        Route::get('/download-cv/{alumni}', [LamaranController::class, 'downloadCv'])->name('download-cv');
    });

    // Kegiatan management
    Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
        Route::get('/', [KegiatanBkkController::class, 'index'])->name('index');
        Route::get('/create', [KegiatanBkkController::class, 'create'])->name('create');
        Route::post('/', [KegiatanBkkController::class, 'store'])->name('store');
        Route::get('/{kegiatan}', [KegiatanBkkController::class, 'show'])->name('show');
        Route::get('/{kegiatan}/edit', [KegiatanBkkController::class, 'edit'])->name('edit');
        Route::put('/{kegiatan}', [KegiatanBkkController::class, 'update'])->name('update');
        Route::delete('/{kegiatan}', [KegiatanBkkController::class, 'destroy'])->name('destroy');
    });
});

/*-------------------------------------------------------------------------
| Alumni Routes
|--------------------------------------------------------------------------
| Routes accessible only to users with alumni role
*/
Route::prefix('alumni')->name('alumni.')->middleware(['auth', 'alumni'])->group(function () {
    Route::get('/dashboard', [AlumniController::class, 'dashboard'])->name('dashboard');

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [AlumniController::class, 'profile'])->name('show');
        Route::put('/', [AlumniController::class, 'updateProfile'])->name('update');
    });

    // Lamaran
    Route::post('/lowongan/{id}/lamar', [LamaranController::class, 'store'])->name('lamaran.store');
});

/*-------------------------------------------------------------------------
| Perusahaan Routes
|--------------------------------------------------------------------------
| Routes accessible only to users with perusahaan role
*/
Route::prefix('perusahaan')->name('perusahaan.')->middleware(['auth', 'perusahaan'])->group(function () {
    Route::get('/dashboard', [PerusahaanController::class, 'dashboard'])->name('dashboard');

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [PerusahaanController::class, 'profile'])->name('show');
        Route::put('/', [PerusahaanController::class, 'updateProfile'])->name('update');
    });

    // Lowongan
    Route::get('/lowongan', [PerusahaanController::class, 'myLowongan'])->name('lowongan.index');

    // Lamaran
    Route::prefix('lamaran')->name('lamaran.')->group(function () {
        Route::get('/', [PerusahaanController::class, 'myLamaran'])->name('index');
        Route::post('/{id}/process', [LamaranController::class, 'process'])->name('process');
    });
});