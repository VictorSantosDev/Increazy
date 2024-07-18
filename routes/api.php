<?php

use App\Http\Controllers\SearchViaCepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/search/local/{ceps}', [SearchViaCepController::class, 'findAddressByCepsAction'])->name('find-address');