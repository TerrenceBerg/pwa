<?php

use Illuminate\Support\Facades\Route;

Route::get('/pwa', function () {
    return view('pwa::pwa');
});

Route::get('/offline', function () {
    return view('pwa::offline');
});

