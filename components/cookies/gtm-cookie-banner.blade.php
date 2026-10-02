<div id="cookie-banner" class="fixed bottom-0 left-0 right-0 bg-gray-900 text-white p-4 z-50 hidden">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex gap-2">
            <img src="https://raw.githubusercontent.com/atomjoy/gtm-cookie-banner/refs/heads/main/img/cookie.svg" width="50" height="50">
            <span>We use cookies (including GTM/Analytics) to ensure you get the best experience on our website. You can accept all or decline optional tracking scripts.</span>
        </div>
        <div class="flex gap-2 shrink-0">
            <button id="cookie-reject" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2.5 rounded text-sm font-semibold transition cursor-pointer">
                Reject All
            </button>
            <button id="cookie-accept" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2.5 rounded text-sm font-semibold transition cursor-pointer">
                Accept All
            </button>
        </div>
    </div>
</div>

<button id="open-cookie-settings" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 underline transition cursor-pointer group">
    <svg class="w-4 h-4 text-gray-400 group-hover:text-gray-600 transition" xmlns="http://w3.org" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 2a10 10 0 1 0 10 10c0-2.28-1-4.27-2.6-5.7a4.22 4.22 0 0 1-5.7-5.7A9.93 9.93 0 0 0 12 2z"/>
        <path d="M18 14h.01"/>
        <path d="M14 18h.01"/>
        <path d="M9 17h.01"/>
        <path d="M7 12h.01"/>
        <path d="M10 8h.01"/>
    </svg>
    <span>Cookie Settings</span>
</button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const banner = document.getElementById('cookie-banner');
        const acceptBtn = document.getElementById('cookie-accept');
        const rejectBtn = document.getElementById('cookie-reject');
        const resetBtn = document.getElementById('open-cookie-settings');

        if (!localStorage.getItem('cookie_consent')) {
            banner.classList.remove('hidden');
        }

        function updateGtmConsent(status) {
            if (typeof gtag === 'function') {
                gtag('consent', 'update', {
                    'analytics_storage': status,
                    'ad_storage': status,
                    'ad_user_data': status,
                    'ad_personalization': status
                });
                // GTM Event
                window.dataLayer.push({'event': 'cookie_consent_' + status});
            }
        }

        acceptBtn.addEventListener('click', function () {
            localStorage.setItem('cookie_consent', 'accepted');
            banner.classList.add('hidden');
            updateGtmConsent('granted');
        });

        rejectBtn.addEventListener('click', function () {
            localStorage.setItem('cookie_consent', 'rejected');
            banner.classList.add('hidden');
            updateGtmConsent('denied');
        });

        if (resetBtn) {
            resetBtn.addEventListener('click', function (e) {
                e.preventDefault();
                localStorage.removeItem('cookie_consent');
                banner.classList.remove('hidden');
                banner.scrollIntoView({ behavior: 'smooth' });
            });
        }
    });
</script>
