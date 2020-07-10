<footer class="footer">
  <div class="container d-flex flex-column flex-md-row justify-content-between">
    <div class="flex-column">

      <div class="">
        Built with love by the  {{ link_to('https://veganhacktivists.org', 'Vegan Hacktivists.', ['target' => '_blank']) }}
      </div>
      <div class="">
        {{ link_to_route('contact.form', __('Contact'), null, ['class' => '']) }}
        &middot;
        {{ link_to('https://www.instagram.com/veganhacktivists', 'instagram', ['target' => '_blank']) }}

        &middot;
        Please support us
        {{ link_to('https://www.patreon.com/veganhacktivists', 'on Patreon.', ['target' => '_blank']) }}
      </div>

    </div>
    <div class="flex-column">

      <div class="text-md-right">
       Download the app! &middot;
        {{ link_to('https://play.google.com/store/apps/details?id=org.nutritionfacts.dailydozen&hl=en', 'Android', ['target' => '_blank']) }}
        |
        {{ link_to('https://apps.apple.com/us/app/dr-gregers-daily-dozen/id1060700802', 'iOS', ['target' => '_blank']) }}
      </div>

      <div>
        This app is <strong>not</strong> officially supported by {{ link_to('https://nutritionfacts.org', 'Dr Michael Gregor', ['target' => '_blank']) }}
      </div>

    </div>
  </div>
</footer>
