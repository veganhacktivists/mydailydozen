@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Register') }}</div>

          <div class="card-body">
            {{ Form::open(['route' => 'register']) }}
              <div class="form-group row">
                {{ Form::label('name', __('Name'), [
                  'class' => 'col-md-4 col-form-label text-md-right',
                ]) }}

                <div class="col-md-6">
                  {{ Form::text('name', null, [
                    'id' => 'name',
                    'class' => 'form-control'.($errors->has('name') ? ' is-invalid' : ''),
                    'required' => true,
                    'autofocus' => true,
                  ]) }}

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                {{ Form::label('email', __('E-Mail Address'), [
                  'class' => 'col-md-4 col-form-label text-md-right',
                ]) }}

                <div class="col-md-6">
                  {{ Form::email('email', null, [
                    'id' => 'email',
                    'class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ''),
                    'required' => true,
                  ]) }}

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                {{ Form::label('password', __('Password'), [
                  'class' => 'col-md-4 col-form-label text-md-right',
                ]) }}

                <div class="col-md-6">
                  {{ Form::password('password', [
                    'id' => 'password',
                    'class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ''),
                    'required' => true,
                  ]) }}

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                {{ Form::label('password-confirm', __('Confirm Password'), [
                  'class' => 'col-md-4 col-form-label text-md-right',
                ]) }}

                <div class="col-md-6">
                  {{ Form::password('password_confirmation', [
                    'id' => 'password-confirm',
                    'class' => 'form-control',
                    'required' => true,
                  ]) }}
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    {{ Form::checkbox('subscribe', 'true', false, [
                      'id' => 'subscribe',
                      'class' => 'form-check-input',
                    ]) }}
                    {{ Form::label('subscribe', 'Keep up to date with Vegan Hacktivist news', [
                      'class' => 'form-check-label',
                    ]) }}
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  By signing up, you agree to the
                  {{ link_to_route('privacy_policy', 'Privacy Policy', [], ['target' => '_blank']) }}.
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  {{ Form::submit(__('Register'), ['class' => 'btn btn-primary']) }}
                </div>
              </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
