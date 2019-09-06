<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    {{ link_to_route('home', config('app.name'), null, ['class' => 'navbar-brand']) }}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      {{-- Left Side Of Navbar --}}
      <ul class="navbar-nav mr-auto">

      </ul>

      {{-- Right Side Of Navbar --}}
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          {{ link_to_route('contact.form', __('Contact'), null, ['class' => 'nav-link']) }}
        </li>
        @guest
          <li class="nav-item">
            {{ link_to_route('login', __('Login'), null, ['class' => 'nav-link']) }}
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              {{ link_to_route('register', __('Register'), null, ['class' => 'nav-link']) }}
            </li>
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              @role('admin', 'backpack')
                {{ link_to_route('backpack.dashboard', __('Admin'), null, [
                  'class' => 'dropdown-item',
                  'data-turbolinks' => 'false',
                ]) }}
              @endrole
              {{ link_to_route('settings.edit', __('Settings'), null, [
                'class' => 'dropdown-item',
              ]) }}
              {{ link_to_route('logout', __('Logout'), null, [
                'class' => 'dropdown-item',
                'onclick' => "event.preventDefault(); document.getElementById('logout-form').submit();",
              ]) }}

              {{ Form::open(['route' => 'logout', 'id' => 'logout-form', 'class' => 'd-none']) }}
              {{ Form::close() }}
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

