<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    >
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css"
        rel="stylesheet"
    >
    <link
        rel="icon"
        href="{{ asset('icon.png') }}"
    >
    <link
        rel="dns-prefetch"
        href="//fonts.gstatic.com"
    >
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap"
        rel="stylesheet"
    >
    @stack('head')
    <title>{{ env('APP_NAME') }}</title>
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
    @include('partials.footer')
</div>
{{--<script src="{{ asset('libs/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('libs/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>--}}
<script
    src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
@stack('js')
</body>
</html>
