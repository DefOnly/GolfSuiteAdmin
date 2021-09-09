<?php

use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminController::class, 'create'])
                ->middleware('guest')
                ->name('admin');

Route::post('/admin', [AdminController::class, 'store'])
                ->middleware('guest');