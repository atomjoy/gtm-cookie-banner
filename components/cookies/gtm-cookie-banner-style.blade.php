<div id="cookie-banner" class="cookie-hidden" style="z-index:99999; position: fixed; bottom:0px; left:0px; width:100%; background:#222; color:#fff;">
    <div style="display: flex;  gap: 1rem; padding: 20px">
        <div style="display: flex; gap: 9px; align-items: center">
            <img src="https://raw.githubusercontent.com/atomjoy/gtm-cookie-banner/refs/heads/main/img/cookie.svg" width="50" height="50">
            <span>We use cookies (including GTM/Analytics) to ensure you get the best experience on our website. You can accept all or decline optional tracking scripts.</span>
        </div>
        <div style="display: flex; gap: 5px; align-items: center; justify-content: center; font-size: 14px; font-weight: 600;">
            <button id="cookie-reject" style="background: #f25; color: #fff; padding:10px 20px; border-radius: 10px; border: 0px; cursor: pointer; white-space: nowrap;">
                Reject All
            </button>
            <button id="cookie-accept" style="background: #5c5; color: #fff; padding:10px 20px; border-radius: 10px; border: 0px; cursor: pointer; white-space: nowrap;">
                Accept All
            </button>
        </div>
    </div>
</div>

<button id="open-cookie-settings" style="padding: 10px; margin: 5px; display: inline-flex; align-items: center; gap: 10px; font-size: 16px; line-height: 1.25rem; color: #6b7280; text-decoration: underline; cursor: pointer; border: 0px; background: transparent;">
    <svg style="width: 1rem; height: 1rem; color: #999; transition: all 150ms cubic-bezier(0.4, 0, 0.2, 1);" xmlns="http://w3.org" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 2a10 10 0 1 0 10 10c0-2.28-1-4.27-2.6-5.7a4.22 4.22 0 0 1-5.7-5.7A9.93 9.93 0 0 0 12 2z" />
        <path d="M18 14h.01" />
        <path d="M14 18h.01" />
        <path d="M9 17h.01" />
        <path d="M7 12h.01" />
        <path d="M10 8h.01" />
    </svg>
    <span>Cookies Settings</span>
</button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const banner = document.getElementById('cookie-banner');
        const acceptBtn = document.getElementById('cookie-accept');
        const rejectBtn = document.getElementById('cookie-reject');
        const resetBtn = document.getElementById('open-cookie-settings');

        if (!localStorage.getItem('cookie_consent')) {
            banner.classList.remove('cookie-hidden');
        } else {
            banner.classList.add('cookie-hidden');
        }

        function updateGtmConsent(status) {
            if (typeof gtag === 'function') {
                gtag('consent', 'update', {
                    'analytics_storage': status,
                    'ad_storage': status,
                    'ad_user_data': status,
                    'ad_personalization': status
                });

                window.dataLayer.push({'event': 'cookie_consent_' + status});

                console.log("GTM Cookies", 'cookie_consent_' + status);
            }
        }

        acceptBtn.addEventListener('click', function () {
            localStorage.setItem('cookie_consent', 'accepted');
            banner.classList.add('cookie-hidden');
            updateGtmConsent('granted');
        });

        rejectBtn.addEventListener('click', function () {
            localStorage.setItem('cookie_consent', 'rejected');
            banner.classList.add('cookie-hidden');
            updateGtmConsent('denied');
        });

        if (resetBtn) {
            resetBtn.addEventListener('click', function (e) {
                e.preventDefault();
                localStorage.removeItem('cookie_consent');
                banner.classList.remove('cookie-hidden');
                banner.scrollIntoView({ behavior: 'smooth' });
            });
        }
    });
</script>

<style>
    @media all and (max-width: 768px) {
        #cookie-banner > div {
            flex-direction: column;
        }
    }
    .cookie-hidden {
        display: none !important;
    }
</style>