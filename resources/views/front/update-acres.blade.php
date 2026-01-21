@extends('layouts.app')
@section('title', 'Update Acres')
<style>
    .update-acres label{
        display: inline-block;
        margin-bottom: .5rem;
        color: #7d7d7d !important;
        font-weight: 500;
    }
</style>
@section('content')

<div class="banner without-scanning">
    <img id="banner_img" class="banner_img" alt="Corteva Banner">
    <form method="POST" class="update-acres" action="#">
        @csrf
        <div class="form-group">
            <label class="label-content">Update Cultivated Acres</label>
            <input type="text" name="acres" id="acres" placeholder="Acres" value="{{ ($getCustomerAcres)?$getCustomerAcres->acres:0 }}" required>
        </div>
        <button type="submit" id="sbn-btn" class="btn-submit">
            SUBMIT
        </button>
    </form>
</div>
<div class="banner with-scanning" style="display: none">
    <h3 class="scan-title">
        બોટલ પર આપેલ QR કોડ સ્કેન કરો.
    </h3>
    <div class="camera-card">
        <div id="scannerPlaceholder">
            <div id="qr-reader"></div>
        </div>
    </div>
    <button class="scan-btn" id="startScan">
        સ્કેન કરો
    </button>
</div>
@endsection
@push('scripts')
<script>
    const validationMessages = {
        en: {
            acres_required: "Please enter acres",
            acres_digits: "Only numbers are allowed"
        },
        gu: {
            acres_required: "કૃપા કરીને એકર દાખલ કરો",
            acres_digits: "માત્ર આંકડા માન્ય છે"
        },
        hi: {
            acres_required: "कृपया एकड़ दर्ज करें",
            acres_digits: "केवल अंक मान्य हैं"
        }
    };
    function getActiveForm() {
        return $(".update-acres:visible");
    }
    let lang = "{{ $lang }}";
    $(document).ready(function() {
        initValidation(lang);
    });
    function initValidation(lang) {

        /* Text + language handling (unchanged) */
        $('.label-content').text(
            lang === 'hi' ? 'कृषित एकड़ अपडेट करें' :
            lang === 'gu' ? 'ખેતી કરેલા એકર અપડેટ કરો' :
            'Update Cultivated Acres'
        );

        $('#sbn-btn').text(
            lang === 'hi' ? 'जमा करें' :
            lang === 'gu' ? 'સબમિટ કરો' :
            'Submit'
        );

        if (lang === 'gu') {
            $('#banner_img').attr('src', "{{ asset('img/register-banner-guj.png') }}");
            $('#acres').attr('placeholder', 'એકર');
        } else if (lang === 'hi') {
            $('#banner_img').attr('src', "{{ asset('img/register-banner-hi.png') }}");
            $('#acres').attr('placeholder', 'एकड़');
        } else {
            $('#banner_img').attr('src', "{{ asset('img/register-banner-hi.png') }}");
            $('#acres').attr('placeholder', 'Acres');
        }

        const $form = $('.update-acres');
        $('.update-acres').find('span.text-danger').remove();
        $form.find('.error').removeClass('error');
        if ($form.data('validator')) {
            $form.validate('destroy');
        }
        $form.removeData('validator');
        $form.removeData('unobtrusiveValidation');
        $form.validate({
            rules: {
                acres: {
                    required: true,
                    digits: true
                }
            },
            messages: {
                acres: {
                    required: validationMessages[lang].acres_required,
                    digits: validationMessages[lang].acres_digits
                }
            },
            errorClass: 'text-danger',
            errorElement: 'span'
        });
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
    $('.update-acres').on('submit', function (e) {
        e.preventDefault();

        if (!$(this).valid()) {
            return;
        }

        $('#pageLoader').fadeIn();

        const acres = $('#acres').val();

        // AJAX call
        $.ajax({
            url: "/update-new-acres",
            type: "POST",
            data: {
                acres: acres,
                _token: "{{ csrf_token() }}"
            },
            success: function (res) {
                alert(res.message)
                if (res.success) {
                    window.location.href = "{{ route('reward.more') }}";
                }
                $('#pageLoader').fadeOut();
            },
            error: function () {
                $('#pageLoader').fadeOut();
            }
        });
    });
</script>
@endpush
