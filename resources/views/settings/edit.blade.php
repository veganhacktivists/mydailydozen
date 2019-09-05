@extends('layouts.app')

@section('title', title('Settings'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Settings</h1>

        @if (session('success'))
          <div class="alert alert-success" role="alert">
            Your settings have been saved!
          </div>
        @elseif (session('resent'))
          <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
          </div>
        @endif

        {{ Form::model($user, [
          'route' => 'settings.update',
          'method' => 'PUT',
        ]) }}
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">
              {{ __('Name') }}
            </label>

            <div class="col-md-6">
              {{ Form::text('name', null, [
                'class' => 'form-control'.($errors->has('name') ? ' is-invalid' : ''),
                'id' => 'name',
                'required' => true,
              ]) }}

              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">
              {{ __('Email') }}
            </label>

            <div class="col-md-6">
              {{ Form::text('email', null, [
                'class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ''),
                'id' => 'email',
                'required' => true,
              ]) }}

              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @elseif (!Auth::user()->hasVerifiedEmail())
                <div class="mt-1">
                  {{ link_to_route('verification.resend', __('Resend verification email'), [], [
                    'onclick' => "event.preventDefault(); document.getElementById('email-verification-form').submit()",
                  ]) }}
                </div>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="old-password" class="col-md-4 col-form-label text-md-right">
              {{ __('Old Password') }}
            </label>

            <div class="col-md-6">
              {{ Form::password('old_password', [
                'class' => 'form-control'.($errors->has('old_password') ? ' is-invalid' : ''),
                'id' => 'old-password',
              ]) }}

              @error('old_password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">
              {{ __('New Password') }}
            </label>

            <div class="col-md-6">
              {{ Form::password('password', [
                'class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ''),
                'id' => 'password',
              ]) }}

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="password-confirmation" class="col-md-4 col-form-label text-md-right">
              {{ __('Confirm New Password') }}
            </label>

            <div class="col-md-6">
              {{ Form::password('password_confirmation', [
                'class' => 'form-control'.($errors->has('password_confirmation') ? ' is-invalid' : ''),
                'id' => 'password-confirmation',
              ]) }}

              @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6 offset-md-4">
              <div class="form-check">
                {{ Form::checkbox('subscribe', 'true', $user->isSubscribedToNewsletter(), [
                  'id' => 'subscribe',
                  'class' => 'form-check-input',
                ]) }}
                {{ Form::label('subscribe', __('Keep up to date with Vegan Hacktivist news'), [
                  'class' => 'form-check-label',
                ]) }}
              </div>
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <div class="d-flex justify-between">
                {{ Form::submit(__('Save'), [
                  'class' => 'btn btn-primary',
                ]) }}
              </div>
            </div>
          </div>
          {{ Form::close() }}

          {{ Form::open([
            'class' => 'offset-md-4 mt-2',
            'method' => 'DELETE',
            'route' => 'account.destroy',
            'onsubmit' => implode('', [
              "return confirm('",
              __('Are you sure you want to delete your account? This cannot be undone.'),
              "')",
            ]),
          ]) }}
          {{ Form::submit(__('Delete your account'), [
            'class' => 'btn border-0 text-danger',
          ]) }}
          {{ Form::close() }}
      </div>
    </div>
  </div>
  @if (!Auth::user()->hasVerifiedEmail())
    {{ Form::open([
      'route' => 'verification.resend',
      'method' => 'POST',
      'class' => 'd-none',
      'id' => 'email-verification-form',
    ]) }}
    {{ Form::close() }}
  @endif
@endsection
