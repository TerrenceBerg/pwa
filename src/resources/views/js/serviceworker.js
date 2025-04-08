const staticCacheName = "pwa-cache-v1";
const filesToCache = [
  "/",
  "/offline",
  "/manifest.json",
  "/images/icons/icon-72x72.png",
  "/images/icons/icon-96x96.png",
  "/images/icons/icon-128x128.png",
  "/images/icons/icon-144x144.png",
  "/images/icons/icon-152x152.png",
  "/images/icons/icon-192x192.png",
  "/images/icons/icon-maskable-192x192.png",
  "/images/icons/icon-384x384.png",
  "/images/icons/icon-512x512.png"
];

// Cache on install
self.addEventListener("install", event => {
  event.waitUntil(
    caches.open(staticCacheName)
      .then(cache => {
        // Use a different approach that doesn't fail on missing resources
        return Promise.allSettled(
          filesToCache.map(url =>
            fetch(url)
              .then(response => {
                if (response.ok) {
                  return cache.put(url, response);
                }
                //console.log(`Failed to fetch ${url}`);
                return Promise.resolve();
              })
              .catch(error => {
                //console.log(`Error fetching ${url}: ${error.message}`);
                return Promise.resolve();
              })
          )
        );
      })
  );
  self.skipWaiting(); // Ensure service worker activates immediately
});

// Clear cache on activate
self.addEventListener("activate", event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames
          .filter(cacheName => cacheName !== staticCacheName)
          .map(cacheName => caches.delete(cacheName))
      );
    })
  );
  return self.clients.claim(); // Take control of all clients
});

// Serve from Cache
self.addEventListener("fetch", event => {
  event.respondWith(
    fetch(event.request)
      .catch(() => {
        return caches.match(event.request)
          .then(cachedResponse => {
            if (cachedResponse) {
              return cachedResponse;
            }

            // For HTML navigation requests, show the offline page if there's no cached version
            if (event.request.mode === 'navigate' ||
                (event.request.method === 'GET' &&
                 event.request.headers.get('accept').includes('text/html'))) {
              return caches.match('/offline');
            }

            // Return a default empty response for other resource types
            return new Response('', {
              status: 408,
              headers: { 'Content-Type': 'text/plain' }
            });
          });
      })
  );
});
