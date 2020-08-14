<div class="d-flex flex-column">
  <div class="mb-4">
    <div class="w-100">
    </div>
    <div class="row">
      @each('inc.card', $groups['daily_dozen'], 'item')
    </div>
  </div>

  <div class="mb-4">
    <div class="w-100">
      <h2 class="display-4">{{ __('Recommended') }}</h2>
    </div>
    <div class="row">
      @each('inc.card', $groups['supplements'], 'item')
    </div>

  </div>
  <div class="mb-4">
    <div class="w-100">
      <h2 class="display-4">{{__('Custom')}}</h2>
    </div>
    <div class="row">
      @each('inc.card', $groups['tweaks'], 'item')
    </div>
  </div>
</div>
