<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel PWA - Offline</title>

    <!-- PWA  -->
    <meta name="theme-color" content="#4a5568"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-192x192.png') }}">
    <link rel="manifest" href="{{ url('/manifest.json') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
            <div class="text-center">
                <h1 class="text-xl font-medium text-black">You are offline</h1>
                <p class="text-gray-500">Please check your internet connection and try again.</p>
                <button onclick="window.location.reload()" class="mt-4 px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-md">
                    Retry
                </button>
            </div>
        </div>
    </div>

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/serviceworker.js')
                    .then(function(registration) {
                        //console.log('Service Worker registered with scope:', registration.scope);
                    })
                    .catch(function(error) {
                        //console.log('Service Worker registration failed:', error);
                    });
            });
        }
    </script>
</body>
</html>
