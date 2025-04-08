<div>
    <div id="pwa-install-container" style="display: none;" class="mt-4">
        <button id="pwa-install-button" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-md hover:bg-blue-600 transition-colors">
            Install App
        </button>
    </div>

    <script>
        let deferredPrompt = null;
        const installButton = document.getElementById('pwa-install-button');
        const installContainer = document.getElementById('pwa-install-container');

        // Detect standalone mode
        const isInStandaloneMode = () =>
            (window.matchMedia('(display-mode: standalone)').matches) ||
            (window.navigator.standalone) ||
            document.referrer.includes('android-app://');

        // Hide button if already installed
        if (isInStandaloneMode()) {
            if (installContainer) installContainer.style.display = 'none';
        }

        window.addEventListener('beforeinstallprompt', (e) => {
            // Don't prevent the default behavior
            // This will allow the browser to show its own install banner
            // e.preventDefault(); // Removing this line to allow default banner

            //console.log('beforeinstallprompt event was fired');

            // Still store the event for our custom button
            deferredPrompt = e;

            // Show our custom install button
            if (installContainer) installContainer.style.display = 'block';
        });

        // Only add the click event if the button actually exists
        if (installButton) {
            installButton.addEventListener('click', async () => {
                //console.log('Install button clicked, deferredPrompt:', deferredPrompt);
                if (!deferredPrompt) {
                    //console.log('No installation prompt available');
                    return;
                }

                // Show the install prompt
                deferredPrompt.prompt();

                try {
                    // Wait for the user to respond to the prompt
                    const { outcome } = await deferredPrompt.userChoice;
                    //console.log(`User response to the install prompt: ${outcome}`);
                } catch (error) {
                    console.error('Error with install prompt:', error);
                }

                // We no longer need the prompt. Clear it up
                deferredPrompt = null;

                // Hide the install button
                if (installContainer) installContainer.style.display = 'none';
            });
        }

        // Listen for the app installed event
        window.addEventListener('appinstalled', (e) => {
            //console.log('PWA was installed');
            // App is installed, hide the install button
            if (installContainer) {
                installContainer.style.display = 'none';
            }
        });
    </script>
</div>
