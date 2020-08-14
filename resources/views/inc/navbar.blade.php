<nav class="navbar navbar-expand-md navbar-light navbar-green shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="/img/logo.png" width="240px" alt="logo">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      {{-- Left Side Of Navbar --}}
      <ul class="navbar-nav mr-auto">

      </ul>

      {{-- Right Side Of Navbar --}}
      <ul class="navbar-nav ml-auto">
        <li class="nav-item px-2
          @if (Route::currentRouteName()==='home')
            border border-white rounded-pill
          @endif
        ">
          <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
        </li>
        <li class="nav-item px-2
          @if (Route::currentRouteName()==='donate')
            border border-white rounded-pill
          @endif
        ">
          <a class="nav-link" href="https://www.patreon.com/veganhacktivists">{{ __('Donate') }}</a>
        </li>
        <li class="nav-item px-2
          @if (Route::currentRouteName()==='contact.form')
            border border-white rounded-pill
          @endif
        ">
          <a class="nav-link" href="{{ route('contact.form') }}">{{ __('Contact') }}</a>
        </li>
        @guest
          <li class="nav-item px-2
          @if (Route::currentRouteName()==='login')
            border border-white rounded-pill
          @endif
          ">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Log In') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item px-2
            @if (Route::currentRouteName()==='register')
              border border-white rounded-pill
            @endif
            ">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              @role('admin', 'backpack')
                <a href="{{ route('backpack.dashboard') }}" class="dropdown-item" data-turbolinks="false">{{ __('Admin') }}</a>
              @endrole
              <a href="{{ route('settings.edit') }}" class="dropdown-item">{{ __('Settings') }}</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
              {{ Form::open(['route' => 'logout', 'id' => 'logout-form', 'class' => 'd-none']) }}
              {{ Form::close() }}
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

