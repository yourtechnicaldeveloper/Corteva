@extends('layouts.app')
@section('title', 'Product Verification')
@section('content')
<div class="banner">
    <div class="card">
        <div class="title">ઉત્પાદનની અધિકૃતતાની ચકાસણી</div>
        <div class="subtitle"><span class="inner_subtitle">ઉત્પાદન</span>: <strong>GALILEO (400ML)</strong></div>
        <div class="product-image">
            <img src="{{ asset('img/bottle-prooduct.png') }}" alt="Galileo Product">
        </div>
        <div class="tick-icon">
            <img src="{{ asset('img/tick-sign.png') }}" alt="Right">
        </div>
        <div class="bottom_message">
            આ એક કોર્ટવા દ્વારા બનાવાયેલ અસલ ઉત્પાદન છે
        </div>
        <div>
            <a href="{{ route('reward')}}" class="action-btn btn-name">કોર્ટેવા 'સ્કેન&વીન' દાખલ કરો</a>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    let currentLang = "{{ $lang }}";
    $(document).ready(function() {
        initValidation(currentLang);
    });
    function initValidation(lang) {
        $('.title').text(
            lang === 'hi' ? 'उत्पाद की प्रामाणिकता जाँच​' :
            lang === 'gu' ? 'ઉત્પાદનની અધિકૃતતાની ચકાસણી' :
            'Product Authenticity Check'
        );
        $('.inner_subtitle').text(
            lang === 'hi' ? 'उत्पाद' :
            lang === 'gu' ? 'ઉત્પાદન' :
            'Product'
        );
        $('.bottom_message').text(
            lang === 'hi' ? 'यह कॉर्टेवा द्वारा निर्मित एक वास्तविक उत्पाद है।' :
            lang === 'gu' ? 'આ એક અસલી કોર્ટેવા દ્વારા ઉત્પાદિત ઉત્પાદન છે.' :
            'This is a Genuine Corteva Manufactured Product'
        );
        $('.btn-name').text(
            lang === 'hi' ? "कॉर्टेवा 'स्कैन & विन' से जुड़ें" :
            lang === 'gu' ? "કોર્ટેવા 'સ્કેન&વીન' દાખલ કરો" :
            "Enter Corteva ‘Scan & Win’"
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
@endpush

