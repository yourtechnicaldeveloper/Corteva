<!DOCTYPE html>
<html lang="gu">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Product Verification')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

    @stack('styles')
</head>
<body>

<div class="page-wrapper">
    <div class="form-card">

        {{-- Common Header --}}
        @include('common.header')

        {{-- Page Content --}}
        @yield('content')

    </div>
</div>

@stack('scripts')
</body>
</html>
