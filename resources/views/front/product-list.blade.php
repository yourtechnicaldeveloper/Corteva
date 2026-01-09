<!DOCTYPE html>
<html lang="gu">
<head>
    <meta charset="UTF-8">
    <title>Product Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap JS (required) -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="page-wrapper">
    <div class="form-card">
        <!-- Header -->
        <nav class="navbar navbar-light bg-gray px-3 d-flex justify-content-between align-items-center sticky-top bg-white">
            <a class="navbar-brand m-0" href="{{ url('/') }}">
                <img src="https://galileo.farmerconnect.in/static/media/logo.99f102123a31c266a6ea.jpg"
                    height="32"
                    alt="Corteva">
            </a>
            <div class="dropdown" style="position: relative; display: inline-block;">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAWCAYAAAA1vze2AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKXSURBVHgBtVVBUttAEOxZifuSawIWP3BeEFPYVbkFXoD9gsALMC8AXiDzAsgtFUyhvMDkBYiQM2zOsXfSq4BLgBSrimSq7NVqd6dnpntWYjuJlVhTAB3+LJqZU+jIjb/vNtkcI/KHgFidyls0tSVYAU5sd/UngYYL9y93W2p7SbtqLWRZd872VvrLvdYEDcwU/7/gqhZZxhO7sXpYeVKjHL5ZeU3dgu0mHQ4dEdn+W0YvAoH6voiO+HSJ2O/gBRZXvWTkCQG2/cwPGEYukB1mlgG+UwoigYgl+cM655iakcvyvBKEiuNBcWLM3IFAL1RxXN6mqp84JFUuRMhXrBPbfbMV12Whsay5z3ke3lGBE2ZzfHd+XS2CGnvVTYaKaO85J9GsrcDXB4B7a3tBVu1odciSVXLmgUwUScgkEPuRY9G97vzmlNk8d1iSeaG2pdlmeFaVd2xMx75x9OowizLy8KglYhUZ/OneVtGQbny9Tjn0Of+AOosobTX90ptlzg8oEqeCAedZebsUkb1PEszCQU1V/ZaISVX8/F6ig5TXzlpQSvmw3VjZDJkXKButK41k133JT+fr7LXgsyA+1J9AGaYB1RyQ5P27s5vRPMxuK32aTHGxiqZUD0sTtxkJygBlmxMfgCjTfXb40e04X6iiUHcGcySITnjuQL3U3siPJHzb5EZ9yGJJJ+wTy9QDyQTUlBnvsazrz4hHM3OIpwnH/CEL1nsQANxZflkAh7suzMsAfpYgMk6aIBRNpWxQUAyirjaS8Y+sAOy9plJNW7zZo3qPGoHcR7pDpfQhtdd7i1/LIWJzLFO9guIb+R0FfhuDLAyCHz4GcUHFnbJB+3fj67lvg39kgRuWZp0Am8w2x/+0oLynH7nfQsIf1z/ulfYAAAAASUVORK5CYII="
                    alt="Language Icon"
                    class="dropdown-toggle"
                    data-bs-toggle="dropdown"
                    style="cursor:pointer;width: 40px;">
                <ul class="dropdown-menu header_dropdown">
                    <li><button class="dropdown-item" data-lang="hi">हिन्दी</button></li>
                    <li><button class="dropdown-item" data-lang="gu">ગુજરાતી</button></li>
                    <li><button class="dropdown-item" data-lang="en">English</button></li>
                </ul>
            </div>
        </nav>
        <div class="card">
            <div class="title">ઉત્પાદનની અધિકૃતતાની ચકાસણી</div>
            <div class="subtitle"><span class="inner_subtitle">ઉત્પાદન</span>: <strong>GALILEO (400ML)</strong></div>
            <div class="product-image">
                <img src="https://fs.pioneeractivity.com/ATP/DelegateImages/Galileo.png" alt="Galileo Product">
            </div>
            <div class="tick-icon">
                <img src="data:image/png;base64,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" alt="Right">
            </div>
            <div class="bottom_message">
                આ એક કોર્ટવા દ્વારા બનાવાયેલ અસલ ઉત્પાદન છે
            </div>
        </div>
    </div>
</div>
<script>
    let currentLang = "{{ $lang }}";
    $(document).ready(function() {
        initValidation(currentLang);
    });
    function initValidation(lang) {
        $('.title').text(
            lang === 'hi' ? 'उत्पाद की प्रामाणिकता का सत्यापन' :
            lang === 'gu' ? 'ઉત્પાદનની અધિકૃતતાની ચકાસણી' :
            'Verification of product authenticity'
        );
        $('.inner_subtitle').text(
            lang === 'hi' ? 'उत्पाद' :
            lang === 'gu' ? 'ઉત્પાદન' :
            'Product'
        );
        $('.bottom_message').text(
            lang === 'hi' ? 'यह कोर्टवा द्वारा निर्मित एक मूल उत्पाद है।' :
            lang === 'gu' ? 'આ એક કોર્ટવા દ્વારા બનાવાયેલ અસલ ઉત્પાદન છે' :
            'This is an original product made by Kortva.'
        );
    }
    /* Language Change */
    $('.dropdown-item').on('click', function () {
        const currlang = $(this).data('lang');
        $.ajax({
            url: "{{ route('set.language') }}",
            type: "POST",
            data: {
                lang: currlang,
                _token: "{{ csrf_token() }}"
            },
            success: function () {
                initValidation(currlang);
            }
        });
    });
</script>
</body>
</html>

