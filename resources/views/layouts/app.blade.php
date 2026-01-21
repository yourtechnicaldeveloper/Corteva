<!DOCTYPE html>
<html lang="gu">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Product Verification')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>
    @stack('styles')
</head>
<body>

<div class="page-wrapper">
    <div class="form-card">
        <div id="pageLoader" style="display: none">
            <div class="spinner"></div>
        </div>
        {{-- Common Header --}}
        @include('common.header')

        {{-- Page Content --}}
        @yield('content')

    </div>
</div>

@stack('scripts')
</body>
</html>
