@php
    $currentRouteName = 'home';
@endphp
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Auth::check())
                <ul class="navbar-nav me-auto">
                    <!-- Left Side Of Navbar -->
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}"
                            class="nav-link @if ($currentRouteName == 'home') active @endif">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('sewalapangan') }}"
                            class="nav-link @if ($currentRouteName == 'sewalapangan') active @endif">Sewa Lapangan</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('admin.index') }}"
                            class="nav-link @if ($currentRouteName == 'admin.index') active @endif">Tambah Lapangan</a>
                    </li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('reqsewa') }}"
                            class="nav-link @if ($currentRouteName == 'request_sewa') active @endif">Request Sewa</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('accsewa') }}"
                            class="nav-link @if ($currentRouteName == 'acc_request_sewa') active @endif">Acc Request Sewa</a>
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
                <ul class="navbar-nav me-auto">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}"
                            class="nav-link @if ($currentRouteName == 'home') active @endif">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('sewalapangan') }}"
                            class="nav-link @if ($currentRouteName == 'sewalapangan') active @endif">Sewa Lapangan</a></li>
                </ul>
            @endif

        </div>
</nav>
