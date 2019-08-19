@extends('layouts.app')

@section('title', title('Contact'))

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ __("Thank you for contacting us! We'll respond as soon as we can.") }}
          </div>
        @endif

        <div class="card">
          <div class="card-header">{{ __('Contact Form') }}</div>

          <div class="card-body">
            {{ Form::open([
              'route' => 'contact.send',
            ])}}
              @csrf

              <div class="form-group row">
                {{ Form::label('email', __('E-Mail Address'), [
                  'class' => 'col-md-4 col-form-label text-md-right',
                ])}}

                <div class="col-md-6">
                  {{ Form::email('email', optional(Auth::user())->email, [
                    'class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ''),
                    'required' => true,
                  ])}}

                  @error('email')
                    <div class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                {{ Form::label('subject', __('Subject'), [
                  'class' => 'col-md-4 col-form-label text-md-right',
                ])}}

                <div class="col-md-6">
                  {{ Form::text('subject', '', [
                    'class' => 'form-control'.($errors->has('subject') ? ' is-invalid' : ''),
                    'required' => true,
                  ])}}

                  @error('subject')
                    <div class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                {{ Form::label('message', __('Message'), [
                  'class' => 'col-md-4 col-form-label text-md-right',
                ])}}

                <div class="col-md-6">
                  {{ Form::textarea('message', '', [
                    'class' => 'form-control'.($errors->has('message') ? ' is-invalid' : ''),

                    'required' => true,
                  ])}}

                  @error('message')
                    <div class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </div>
                  @enderror
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  {{ Form::submit(__('Submit'), ['class' => 'btn btn-primary']) }}
                </div>
              </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

