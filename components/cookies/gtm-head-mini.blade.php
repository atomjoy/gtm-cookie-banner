<!-- Google Consent Mode -->
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}

    const currentConsent = localStorage.getItem('cookie_consent');

    gtag('consent', 'default', {
        'analytics_storage': currentConsent === 'accepted' ? 'granted' : 'denied',
        'ad_storage': currentConsent === 'accepted' ? 'granted' : 'denied',
        'ad_user_data': currentConsent === 'accepted' ? 'granted' : 'denied',
        'ad_personalization': currentConsent === 'accepted' ? 'granted' : 'denied',
        'wait_for_update': 500
    });
</script>