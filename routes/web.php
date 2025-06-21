<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaybillController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/waybills', [WaybillController::class, 'index'])->name('waybills.index');
Route::get('/waybills/search', [WaybillController::class, 'search'])->name('waybills.search');
Route::get('/waybills/create', [WaybillController::class, 'create'])->name('waybills.create');
Route::post('/waybills', [WaybillController::class, 'store'])->name('waybills.store');
Route::get('/waybills/{waybill}', [WaybillController::class, 'show'])->name('waybills.show');
Route::get('/waybills/{waybill}/edit', [WaybillController::class, 'edit'])->name('waybills.edit');
Route::put('/waybills/{waybill}', [WaybillController::class, 'update'])->name('waybills.update');
Route::delete('/waybills/{waybill}', [WaybillController::class, 'destroy'])->name('waybills.destroy');
