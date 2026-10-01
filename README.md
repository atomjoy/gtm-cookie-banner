# GTM Cookie Consent Banner

Laravel js cookie consent banner for GTM.

## View components

Copy files to view directory.

## Install

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
