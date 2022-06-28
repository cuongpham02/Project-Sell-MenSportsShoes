<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;

Route::get('/',[BrandController::class, 'index'])->name('index');
Route::get('create',[BrandController::class, 'create'])->name('create');
Route::get('{brand}',[BrandController::class, 'edit'])->name('edit');
Route::get('get-soft-delete-roles',[BrandController::class, 'listSoftDelete'])->name('soft-delete');
Route::get('restore/{id}',[BrandController::class, 'restore'])->name('restore');
Route::post('change-status',[BrandController::class, 'changeStatus'])->name('change-status');
Route::post('',[BrandController::class, 'store'])->name('store');
Route::patch('{id}',[BrandController::class, 'update'])->name('update');
Route::delete('{id}',[BrandController::class, 'delete'])->name('delete');
Route::delete('force-delete/{id}',[BrandController::class, 'forceDelete'])->name('force-delete');
