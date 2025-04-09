<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel PWA') }}</title>

    <!-- PWA  -->
    <meta name="theme-color" content="#4a5568"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Laravel PWA">
    <link rel="apple-touch-icon" href="images/icons/icon-192x192.png">
    <link rel="manifest" href="manifest.json">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
        }
        .content {
            text-align: center;
            padding: 2rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 2rem;
            color: #1f2937;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="title">{{config('pwa-config.site_name')}}</div>
            <p>Your Progressive Web App is now ready!</p>
            @include('pwa::components.pwa-install-button')
        </div>
    </div>

    <script>
        // Register service worker after page load to ensure better performance
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/js/serviceworker.js')
                    .then(function(registration) {
                        //console.log('Service Worker registered with scope:', registration.scope);
                    })
                    .catch(function(error) {
                        console.error('Service Worker registration failed:', error);
                    });
            });

            // Add extra console logs to debug install button issues
            //console.log('Service Worker API is available');
        } else {
            //console.log('Service Worker API is not available in this browser');
        }
    </script>
</body>
</html>
