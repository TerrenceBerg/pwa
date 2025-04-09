composer require 976-tuna/pwa
php artisan vendor:publish


add this to your layout file 

    <link rel="manifest" crossorigin="use-credentials" href="{{ asset('/manifest.json') }}">

    
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