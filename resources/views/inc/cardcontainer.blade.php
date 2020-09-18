<div class="d-flex flex-column">
  <div>
    <div class="row">
      @each('inc.card', $groups['daily_dozen'], 'item')
    </div>
  </div>

  <div>
    <div class="w-100 my-4">
      <h4 class="group-heading">{{ __('Recommended') }}</h4>
    </div>
    <div class="row">
      @each('inc.card', $groups['supplements'], 'item')
    </div>

  </div>
  <div>
    <div class="w-100 my-4">
      <h4 class="group-heading">{{__('Custom')}}</h4>
    </div>
    <div class="row">
      @each('inc.card', $groups['tweaks'], 'item')
    </div>
  </div>
</div>
