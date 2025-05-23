<?php

use Illuminate\Support\Facades\Route;

Route::get('/pwa', function () {
    return view('pwa::pwa');
});

Route::get('/offline', function () {
    return view('pwa::offline');
});

Route::get('/manifest.json', function () {
    return response()->json([
        'name' => env('APP_NAME', 'Laravel App'),
        'short_name' => 'LPWA',
        'start_url' => '/',
        'display' => 'standalone',
        'background_color' => '#ffffff',
        'theme_color' => '#4a5568',
        'orientation' => 'portrait',
        'icons' => [
            ['src' => 'images/icons/icon-72x72.png', 'sizes' => '72x72', 'type' => 'image/png'],
            ['src' => 'images/icons/icon-96x96.png', 'sizes' => '96x96', 'type' => 'image/png'],
            ['src' => 'images/icons/icon-128x128.png', 'sizes' => '128x128', 'type' => 'image/png'],
            ['src' => 'images/icons/icon-144x144.png', 'sizes' => '144x144', 'type' => 'image/png'],
            ['src' => 'images/icons/icon-152x152.png', 'sizes' => '152x152', 'type' => 'image/png'],
            ['src' => 'images/icons/icon-192x192.png', 'sizes' => '192x192', 'type' => 'image/png'],
            ['src' => 'images/icons/icon-maskable-192x192.png', 'sizes' => '192x192', 'type' => 'image/png', 'purpose' => 'maskable'],
            ['src' => 'images/icons/icon-384x384.png', 'sizes' => '384x384', 'type' => 'image/png'],
            ['src' => 'images/icons/icon-512x512.png', 'sizes' => '512x512', 'type' => 'image/png'],
        ],
        'screenshots' => [
            ['src' => 'images/screenshots/desktop1.png', 'sizes' => '1280x800', 'type' => 'image/png', 'form_factor' => 'wide', 'label' => 'Dashboard on Desktop'],
            ['src' => 'images/screenshots/desktop2.png', 'sizes' => '1280x800', 'type' => 'image/png', 'form_factor' => 'wide', 'label' => 'Features on Desktop'],
            ['src' => 'images/screenshots/mobile1.png', 'sizes' => '390x844', 'type' => 'image/png', 'label' => 'Dashboard on Mobile'],
            ['src' => 'images/screenshots/mobile2.png', 'sizes' => '390x844', 'type' => 'image/png', 'label' => 'Features on Mobile'],
        ],
    ]);
});