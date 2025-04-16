# PWA Progressive Web App for Laravel

## Installation

```bash
composer require 976-tuna/pwa
php artisan vendor:publish
```

## Integration
to add a install button to your site, add this 
@include('pwa::components.pwa-install-button')

Add the following to your layout file:

### In the `<head>` section:
```html
<link rel="manifest" href="{{ url('/manifest.json') }}">
```

### In the `<body>` section:
```javascript
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
```
### where ever you would like the button to show add this
```html 
@include('pwa::components.pwa-install-button')
```
