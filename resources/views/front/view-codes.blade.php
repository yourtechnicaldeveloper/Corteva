@extends('layouts.app')
@section('title', 'View Codes')
@section('content')
<div class="banner">
    <div class="reward-page">
        <div class="reward-content">
            <!-- Title -->
            <div class="program-title">
                ગેલિલિયો કાર્યક્રમ 2025
            </div>
            <!-- Score -->
            <div class="score-box">
                <span class="score-text">એકર - મર્યાદા:</span>{{ ($checkCustomerAcres)? (float) $checkCustomerAcres->acres:0.00 }}/10
                <span class="progress-item-small active"></span>
                <span class="score-box-label-1 label">છંટકાવ કર્યો</span>
                <span class="progress-item-small"></span>
                <span class="score-box-label-2 label">હજુ સુધી સ્પ્રે</span>
            </div>

            <!-- Progress Boxes -->
            <div class="progress-grid">
                @for($i = 1; $i <= 10; $i++)
                    <div class="progress-item {{ $i <= $checkCustomerAcres->acres ? 'active' : '' }}"></div>
                @endfor
            </div>
            <!-- Product Details -->
            <div class="product-box">
                <div class="row mb-2">
                    <div class="col-5 label product-box-label-1">उत्पाद का नाम</div>
                    <div class="col-7 value">GALILEO (400ML)</div>
                </div>
                <div class="row">
                    <div class="col-5 label product-box-label-2">टैग या जीवित कोड</div>
                    <div class="col-7 value">GE5HFL7, GSJYY8I, G9Z0I64</div>
                </div>
            </div>
        </div>
        <!-- Button -->
        <div class="reward-footer">
            <a href="{{ url('/reward-more') }}" class="btn footer-btn">
                હોમ પેજ પર જાઓ
            </a>
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
        $('.program-title').text(
            lang === 'hi' ? 'गैलीलियो प्रोग्राम 2025' :
            lang === 'gu' ? 'ગેલિલિયો પ્રોગ્રામ 2025' :
            'Galileo Program 2025'
        );
        $('.product-box-label-1').text(
            lang === 'hi' ? 'उत्पाद का नाम' :
            lang === 'gu' ? 'ઉત્પાદન નામ' :
            'Product Name'
        );
        $('.product-box-label-2').text(
            lang === 'hi' ? 'स्कैन और जीतने का कोड' :
            lang === 'gu' ? 'સ્કેન અને વિન કોડ' :
            'Scan and win code'
        );
        $('.footer-btn').text(
            lang === 'hi' ? 'होम पेज पर जाये' :
            lang === 'gu' ? 'પાછા હોમ પેજ પર જાઓ​' :
            'Back to Home Page'
        );
        $('.score-text').text(
            lang === 'hi' ? 'स्प्रे - एकड़ सीमा:' :
            lang === 'gu' ? 'એકર - મર્યાદા એકર - મર્યાદા:' :
            'Spray - Acres Acres Limit:'
        );
        $('.score-box-label-1').text(
            lang === 'hi' ? 'स्प्रे किया गया' :
            lang === 'gu' ? 'છંટકાવ કર્યો' :
            'Sprayed'
        );
        $('.score-box-label-2').text(
            lang === 'hi' ? 'अभी स्प्रे करना बाकी है' :
            lang === 'gu' ? 'હજુ સુધી સ્પ્રે' :
            'Yet to Spray'
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
