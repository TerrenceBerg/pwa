composer require 976-tuna/pwa
php artisan vendor:publish


add this to your layout file 
add this to the body
<link rel="manifest" href="{{ url('/manifest.json') }}">
add this to the content area
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