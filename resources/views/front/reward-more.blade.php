@extends('layouts.app')
@section('title', 'QR Scanner')
@section('content')

<div class="banner without-scanning">
    <img id="banner_img" class="banner_img" alt="Corteva Banner">
    <div class="reward-page">
        <a href="javascript:void(0)" class="card-link second-btn">
            <div class="card full-card">
                <img src="{{ asset('img/reward-1.png') }}" alt="" class="card-img">
                <div class="card-overlay center">
                    <span class="caption-1">વધુ સ્કેન કરો​</span>
                </div>
            </div>
        </a>
        <div class="card-grid">
            <a href="{{ route('update.acres') }}" class="card-link">
                <div class="card half-card">
                    <img src="{{ asset('img/reward-2.png') }}" alt="">
                    <div class="card-overlay center">
                        <span class="caption-2">ખેતી કરેલા એકર અપડેટ કરો</span>
                    </div>
                </div>
            </a>
            <a href="{{ route('view.codes') }}" class="card-link">
                <div class="card half-card">
                    <img src="{{ asset('img/reward-3.png') }}" alt="">
                    <div class="card-overlay center">
                        <span class="caption-3">ઇનામ</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
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
    let currentLang = "{{ $lang }}";
    $(document).ready(function() {
        initValidation(currentLang);
    });
    function initValidation(lang) {
        $('.scan-title').text(
            lang === 'hi' ? 'बोतल पर दिया क्यूआर कोड स्कैन करें।' :
            lang === 'gu' ? 'બોટલ પર QR કોડ સ્કેન કરો.' :
            'Scan the QR code given on the bottle'
        );
        $('.scan-btn').text(
            lang === 'hi' ? 'स्कैन करें' :
            lang === 'gu' ? 'સ્કેન કરો' :
            'Scan'
        );
        if (lang === 'en') {
            $('#banner_img').attr('src', "{{ asset('img/register-banner-hi.png') }}");
            $('.caption-1').text('Scan More');
            $('.caption-2').text('Update Cultivated Acres');
            $('.caption-3').text('Rewards');
        } if (lang === 'gu') {
            $('#banner_img').attr('src', "{{ asset('img/register-banner-guj.png') }}");
            $('.caption-1').text('વધુ સ્કેન કરો​');
            $('.caption-2').text('ખેતી કરેલા એકર અપડેટ કરો');
            $('.caption-3').text('ઇનામ');
        } else if (lang === 'hi'){
            $('#banner_img').attr('src', "{{ asset('img/register-banner-hi.png') }}");
            $('.caption-1').text('और भी स्कैन करें​');
            $('.caption-2').text('कृषित एकड़ अपडेट करें');
            $('.caption-3').text('पुरस्कार');
        }
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

    // Here Scaning Code
    let html5QrCode;
    let isScanning = false;
    html5QrCode = new Html5Qrcode("qr-reader");
    function sendQrToServer(decodedText) {
        $.ajax({
            url: "{{ route('qr.scan') }}",
            type: "POST",
            data: {
                qr_code: decodedText,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = "{{ route('product.list') }}";
                } else {
                    alert(response.message)
                }
            },
            error: function(xhr) {
                console.error('Error sending QR code:', xhr);
                alert('Something went wrong while sending QR code.');
            }
        });
    }
    function onScanSuccess(decodedText, decodedResult) {
        // $('#qr-result').text("Scanned Code: " + decodedText);

        // Stop scanner after a successful scan
        html5QrCode.stop().then(() => {
            console.log('🛑 Scanner stopped after success');
            isScanning = false;

            // Send QR code to server
            sendQrToServer(decodedText);
        }).catch(err => {
            console.error('Error stopping scanner:', err);
        });
    }
    $('#startScan').on('click', function () {
        if (isScanning) return;

        html5QrCode = new Html5Qrcode("qr-reader");

        Html5Qrcode.getCameras().then(devices => {
            if (!devices || devices.length === 0) {
                alert('No camera found');
                return;
            }

            // Prefer back camera
            let backCamera = devices.find(device =>
                device.label.toLowerCase().includes('back') ||
                device.label.toLowerCase().includes('rear')
            );

            isScanning = true;

            html5QrCode.start(
                backCamera ? backCamera.id : { facingMode: "environment" },
                {
                    fps: 10,              // 10 frames per second
                    qrbox: { width: 250, height: 250 } // scanning area, optional
                },
                onScanSuccess,
                errorMessage => {
                    // Silent errors for frames without a QR code
                    // Uncomment below line to see debug logs
                    // console.log('Scanning...', errorMessage);
                }
            ).then(() => {
                console.log('✅ QR Scanner started successfully');
            }).catch(err => {
                console.error('❌ Failed to start QR Scanner:', err);
            });
        }).catch(err => {
            console.error('Camera error:', err);
        });
    });
    $('.second-btn').on('click', function () {
        $('.without-scanning').hide();
        $('.with-scanning').show();
        if (isScanning) return;
        Html5Qrcode.getCameras().then(devices => {
            if (!devices || devices.length === 0) {
                alert('No camera found');
                return;
            }
            // Prefer back camera
            let backCamera = devices.find(device =>
                device.label.toLowerCase().includes('back') ||
                device.label.toLowerCase().includes('rear')
            );
            isScanning = true;
            html5QrCode.start(
                backCamera ? backCamera.id : { facingMode: "environment" },
                {
                    fps: 10,              // 10 frames per second
                    qrbox: { width: 250, height: 250 } // scanning area, optional
                },
                onScanSuccess,
                errorMessage => {
                    // Silent errors for frames without a QR code
                    // Uncomment below line to see debug logs
                    // console.log('Scanning...', errorMessage);
                }
            ).then(() => {
                // console.log('✅ QR Scanner started successfully');
            }).catch(err => {
                // console.error('❌ Failed to start QR Scanner:', err);
            });
        }).catch(err => {
            console.error('Camera error:', err);
        });
    });
</script>
@endpush
