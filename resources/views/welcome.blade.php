@extends('layouts.app')

@section('title', title(__('Welcome')))

@section('content')

  <div class="container">

    <div class="d-flex flex-column flex-md-row justify-content-between">
      <div>
        < date picker >
      </div>

      <div>
        <span class="mr-4">12 of 26 servings</span>
        <div class="custom-control custom-switch d-inline-block">
          <input type="checkbox" class="custom-control-input" id="darkmode"/>
          <label class="custom-control-label" for="darkmode"></label>
        </div>
      </div>
    </div>

    <div class="d-flex flex-column">
      <div>
        <div class="w-100">
        </div>
        <div class="row">
          @each('inc.card', $groups['main'], 'item')
        </div>
      </div>

      <div>
        <div class="w-100">
          <h6>{{ __('Recommended') }}</h6>
        </div>
        <div class="row">
          @each('inc.card', $groups['recc'], 'item')
        </div>

      </div>
      <div>
        <div class="w-100">
          <h6>{{__('Custom')}}</h6>
        </div>
        <div class="row">
          @each('inc.card', $groups['custom'], 'item')
        </div>
      </div>
    </div>

  </div>

@endsection
