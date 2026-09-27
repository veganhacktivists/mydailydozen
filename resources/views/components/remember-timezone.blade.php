<script>
    const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    const savedTimezone = document.cookie.split('; ').find(cookie => cookie.startsWith('timezone='))?.slice(9);

    if (savedTimezone !== encodeURIComponent(timezone)) {
        document.cookie = 'timezone=' + encodeURIComponent(timezone) + '; path=/; max-age=31536000; samesite=lax' + (location.protocol === 'https:' ? '; secure' : '');
        @auth
        location.replace(location.href);
        @endauth
    }
</script>
