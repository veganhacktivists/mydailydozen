{{-- Cookieless, so no consent banner. Kept off the password reset page, whose URL holds the reset token --}}
@if (($umamiWebsiteId = config('services.umami.website_id')) && ! request()->routeIs('password.reset'))
    <script defer src="{{ config('services.umami.script_url') }}" data-website-id="{{ $umamiWebsiteId }}" data-exclude-search="true"></script>
@endif
