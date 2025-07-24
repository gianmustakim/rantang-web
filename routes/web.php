<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RantangController;
use App\Http\Controllers\InputController;

Route::get('/', function () {
    $totalRantangDapur = \App\Models\Rantang::where('lokasi_terakhir', 'Dapur')->count();
    $totalRantangBaik = \App\Models\Rantang::where('kondisi', 'Baik')->count();
    $totalRantangRusak = \App\Models\Rantang::where('kondisi', 'Rusak')->count();
    return view('welcome', compact('totalRantangDapur', 'totalRantangBaik', 'totalRantangRusak'));
})->name('welcome');
Route::get('/rantang', [RantangController::class, 'index'])->name('rantang.index');
Route::put('/rantang/{id}', [RantangController::class, 'update'])->name('rantang.update');
Route::get('/input/{id}', [InputController::class, 'index'])->name('input.index');