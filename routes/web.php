<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddProductController;

Route::get('/', [AddProductController::class, 'index']);
Route::post('/addproduct', [AddProductController::class, 'addproduct']);