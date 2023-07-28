@php
    $currentRouteName = Route::currentRouteName();
@endphp
<style>
    .nav-link {
        color: black;
    }

    .black a:hover {
        background-color: black;
        color: whitesmoke;

    }

    .nav-pills li a.active {
        background-color: black !important;
        color: whitesmoke !important;
    }
</style>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-thumbnail" style="max-height:75px;" src="{{ Vite::asset('resources/images/deportes.jpg') }}"
                alt="image">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Auth::check())
                <ul class="nav nav-pills black d-flex gap-3">
                    <!-- Left Side Of Navbar -->
                    <li class="nav-item col-2 col-md-auto "><a href="{{ route('home') }}"
                            class="nav-link @if ($currentRouteName == 'home') active @endif">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('sewalapangan') }}"
                            class="nav-link @if ($currentRouteName == 'sewalapangan') active @endif">Sewa Lapangan</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('admin.index') }}"
                            class="nav-link @if ($currentRouteName == 'admin.index') active @endif">Admin Lapangan</a>
                    </li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('reqsewa') }}"
                            class="nav-link @if ($currentRouteName == 'reqsewa') active @endif">Request Sewa</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('accsewa') }}"
                            class="nav-link @if ($currentRouteName == 'accsewa') active @endif">Acc Request Sewa</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            @else
                <ul class="nav nav-pills black">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}"
                            class="nav-link @if ($currentRouteName == 'home') active @endif">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('sewalapangan') }}"
                            class="nav-link  @if ($currentRouteName == 'sewalapangan') active @endif">Sewa Lapangan</a></li>
                </ul>
            @endif

        </div>
</nav>
