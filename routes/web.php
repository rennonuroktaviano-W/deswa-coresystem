<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvestigasiController;
use App\Http\Controllers\ReferenceController;


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard SSO
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | SSO Application Placeholders
    |--------------------------------------------------------------------------
    */

    Route::get('/raise', function () {
        return response()->json([
            'success' => true,
            'app' => 'RAISE',
            'message' => 'Aplikasi RAISE berhasil diakses melalui SSO.',
        ]);
    })->name('raise');


    Route::get('/bo', function () {
        return response()->json([
            'success' => true,
            'app' => 'BO',
            'message' => 'Aplikasi BO berhasil diakses melalui SSO.',
        ]);
    })->name('bo');


    Route::get('/sf', function () {
        return response()->json([
            'success' => true,
            'app' => 'SF',
            'message' => 'Aplikasi SF berhasil diakses melalui SSO.',
        ]);
    })->name('sf');


    /*
    |--------------------------------------------------------------------------
    | Pra Registrasi
    |--------------------------------------------------------------------------
    */

    // Halaman utama Pra Registrasi
    Route::get('/pra-registrasi', [InvestigasiController::class, 'index'])
        ->name('pra-registrasi.index');


    /*
    |--------------------------------------------------------------------------
    | Data JSON Pra Registrasi
    |--------------------------------------------------------------------------
    |
    | PENTING:
    | Route ini harus berada SEBELUM /pra-registrasi/{investigasi}
    | supaya "data" tidak dianggap sebagai ID investigasi.
    |
    */

    Route::get('/pra-registrasi/data', [InvestigasiController::class, 'data'])
        ->name('pra-registrasi.data');


    /*
    |--------------------------------------------------------------------------
    | CRUD Pra Registrasi
    |--------------------------------------------------------------------------
    */

    Route::post('/pra-registrasi', [InvestigasiController::class, 'store'])
        ->name('pra-registrasi.store');

    Route::get('/pra-registrasi/{investigasi}', [InvestigasiController::class, 'show'])
        ->name('pra-registrasi.show');

    Route::put('/pra-registrasi/{investigasi}', [InvestigasiController::class, 'update'])
        ->name('pra-registrasi.update');

    Route::delete('/pra-registrasi/{investigasi}', [InvestigasiController::class, 'destroy'])
        ->name('pra-registrasi.destroy');


    /*
    |--------------------------------------------------------------------------
    | Pra Registrasi Workflow
    |--------------------------------------------------------------------------
    |
    | status:
    | 0 = Draft
    | 1 = Diajukan
    | 2 = Disetujui
    | 3 = Selesai
    |
    */

    Route::post('/pra-registrasi/{investigasi}/submit', [InvestigasiController::class, 'submit'])
        ->name('pra-registrasi.submit');


    /*
    |--------------------------------------------------------------------------
    | Admin Workflow
    |--------------------------------------------------------------------------
    */

    Route::middleware('admin')->group(function () {

        Route::post('/pra-registrasi/{investigasi}/approve', [InvestigasiController::class, 'approve'])
            ->name('pra-registrasi.approve');

        Route::post('/pra-registrasi/{investigasi}/send-client', [InvestigasiController::class, 'sendClient'])
            ->name('pra-registrasi.send-client');

        Route::post('/pra-registrasi/{investigasi}/complete', [InvestigasiController::class, 'complete'])
            ->name('pra-registrasi.complete');
    });


    /*
    |--------------------------------------------------------------------------
    | Reference Data
    |--------------------------------------------------------------------------
    |
    | Digunakan frontend untuk mengambil:
    | - Asuransi
    | - Jenis Claim
    | - Investigator
    | - Mata Uang
    |
    */

    Route::get('/references', [ReferenceController::class, 'index'])
        ->name('references.index');
});