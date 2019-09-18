<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    @stack('head')
</head>
<body>
@include('partials.header')
<div id="app">
    <main class="py-4">
        @foreach (['warning', 'danger', 'success', 'info'] as $status)
            @if (Session::has($status))
                <div class="container">
                    <div class="alert alert-{{ $status }} mb-3">
                        {!! Session::get($status); !!}
                    </div>
                </div>
            @endif
        @endforeach
        @yield('content')
    </main>
    <footer class="mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Navigatie</h3>
                    <ul class="list-unstyled">
                        <li><a href="https://astro-info.nl/advertenties">Advertenties</a></li>
                        <li><a data-toggle="collapse" href="#fcalculate" role="button" aria-expanded="false"
                               aria-controls="fcalculate">Berkenen</a>
                        </li>
                        <div class="collapse" id="fcalculate">
                            <ul class="list-unstyled ml-2">
                                <li><a href="">Brandafstandpunt / openingsverhouding</a></li>
                                <li><a href="">Vergroting</a></li>
                            </ul>
                        </div>
                        <li><a href="https://astro-info.nl/inloggen">Inloggen</a></li>
                        <li><a href="https://astro-info.nl/registreren">Registreren</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Evenementen</h3>
                    <ul class="list-unstyled">
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Contact</h3>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope"></i> <a
                                    href="mailto:info@gameplayparty.nl">info@gameplayparty.nl</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{ asset('libs/jquery.js') }}"></script>
<script src="{{ asset('libs/popper.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
@stack('js')
</body>
</html>