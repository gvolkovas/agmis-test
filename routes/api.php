<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('items/{id}', [ProductController::class, 'fetch']);
