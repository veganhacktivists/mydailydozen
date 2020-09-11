@extends('layouts.app')

@section('title', title(__('Welcome')))

@section('content')

  <div class="container">

    <div class="d-flex flex-column flex-md-row justify-content-between">
      <div>
        < date picker >
      </div>

      <div>
        <div class="mr-4 inline">12 of 26 {{__('servings')}}</div>
        <div class="custom-control custom-switch d-inline-block d-sm-none d-md-block">
          <input type="checkbox" class="custom-control-input" id="darkmode"/>
          <label class="custom-control-label" for="darkmode"></label>
        </div>
      </div>
    </div>

   @include('inc.groupview', $groups)

  </div>

@endsection
