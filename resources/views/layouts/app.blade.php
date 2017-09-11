<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/reciclanet.png') }}" alt="logo" class="logo" />
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- TODO: Borrar esto, es mientras siga el desarrollo -->
                    <ul class="nav navbar-nav navbar-right">
                      <a href="mailto:mikelmarcosramos@gmail.com?Subject=[IORT] Incidencia">Contactar</a>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Conectarse</a></li>
                            {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <nav>
        		<ul class="sidenav">
                  <li class="{{ Request::is('/')? 'active' : ''}}"><a href="{{ url('/')}}">Inicio</a></li>
                  <li class="{{ Request::is('personas')? 'active' : ''}}"><a href="{{ url('personas')}}">Personas</a></li>
                  <li class="{{ Request::is('organizaciones')? 'active' : ''}}"><a href="{{ url('organizaciones')}}">Organizaciones</a></li>
        		</ul>
      	</nav>

        <div class="content">
          @if (isset($breadcrumbs) && count($breadcrumbs))
              <ol class="breadcrumb">
                  @foreach ($breadcrumbs as $breadcrumb)
                      @if (array_key_exists('url', $breadcrumb))
                          <li><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
                      @else
                          <li class="active">{{ $breadcrumb['title'] }}</li>
                      @endif
                  @endforeach
              </ol>
          @endif
          @yield('content')
        </div>
    </div>

    @stack('scripts')

</body>
</html>
