<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsletterController;

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::resource('/admin/newsletters', NewsletterController::class);
Route::post('/admin/newsletters/{id}/recover', [NewsletterController::class, 'recover'])->name('admin.newsletters.recover');





