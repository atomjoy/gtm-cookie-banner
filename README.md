# GTM Cookie Consent Banner

Laravel js cookie consent banner for GTM.

## View components

Copy files to view directory.

## Install

Use **components.cookies.gtm-cookie-banner** for tailwind or **components.cookies.gtm-cookie-banner-style** for inline css style.

```php
<!DOCTYPE html>
<html>
    <head>

        @include('components.cookies.gtm-head', ['gtmId' => 'GTM-123456'])
    </head>
    <body class="font-sans antialiased">        

        @include('components.cookies.gtm-cookie-banner')
    </body>
</html>
```

## Policy

Add a link to the **policy.html** file (change email, address and company before uploading).

## Google Tag Manager Configuration (Optional)

To ensure your tracking tags (like Google Analytics 4 or Facebook Pixel) fire only after user consent, follow these steps in your GTM container:

### 1. Create a Custom Event Trigger

1. Go to your **Google Tag Manager Dashboard**.
2. Navigate to **Triggers** (Reguły) on the left menu and click **New** (Nowa).
3. Name your trigger: `Cookie Consent - Accepted`.
4. Click **Trigger Configuration** (Konfiguracja reguły) and choose **Custom Event** (Zdarzenie niestandardowe).
5. In the **Event name** (Nazwa zdarzenia) field, type exactly:
   ```text
   cookie_consent_granted
   ```
6. Set the trigger to fire on **All Custom Events** (Wszystkie zdarzenia niestandardowe).
7. Click **Save** (Zapisz) in the upper right corner.

### 2. Apply the Trigger to your Tags

1. Go to **Tags** (Tagi) on the left menu.
2. Open the tag you want to restrict (e.g., your *Google Tag / GA4 Configuration* tag).
3. Scroll down to the **Triggering** (Odniesienia) section.
4. **Remove** the default `Initialization - All Pages` or `All Pages` trigger.
5. Click anywhere in the triggering box and select your newly created **`Cookie Consent - Accepted`** trigger.
6. Click **Save**.

### 3. (Optional) Advanced Google Consent Mode v2 Support

If you want Google tags to automatically adjust their behavior based on the native consent update signals sent by this banner (`analytics_storage` and `ad_storage`), you should:
1. In GTM, go to **Admin** (Administracja) -> **Container Settings** (Ustawienia kontenera).
2. Check the box: **Enable consent overview** (Włącz przegląd ustawień zgody) under Additional Settings.
3. Now, in the **Tags** section, you will see a shield icon that allows you to manage built-in consent checks for all Google tags.

