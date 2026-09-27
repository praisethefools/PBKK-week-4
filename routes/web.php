<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Tugas 4 PBKK
|--------------------------------------------------------------------------
| Semua rute diarahkan ke satu PageController:
| 1. Beranda: '/' (dan alias '/beranda')
| 2. Profil Mahasiswa: '/profil-mahasiswa'
| 3. Ide-Riset Agentic AI: '/ide-agent'
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/beranda', [PageController::class, 'beranda']);

Route::get('/profil-mahasiswa', [PageController::class, 'profil'])->name('profil');

Route::get('/ide-agent', [PageController::class, 'ideAgent'])->name('ide.agent');
Route::post('/ide-agent', [PageController::class, 'simpanIde'])->name('ide.store');
