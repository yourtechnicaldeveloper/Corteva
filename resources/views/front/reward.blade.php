@extends('layouts.app')
@section('title', 'QR Scanner')
@section('content')

<div class="banner without-scanning">
    <div class="campaign-logo">
        <img src="{{ asset('img/scan-win-logo-gj.png') }}" width="30%" alt="Scan & Win">
    </div>
    <div class="status-card">
        <div class="status-title">અભિનંદન !!!</div>
        <div class="status-message">
            તમને <strong>GALILEO (400ML)</strong> ખરીદી પર <span>3 સ્કેન અને વિન કોડ્સ</span> પ્રાપ્ત થયા છે.
        </div>
    </div>
    <div class="actions">
        <div class="action-box">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABBCAYAAABy4uKPAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAmtSURBVHgB1VxNVuNIEo5Mi3WLWk+D+gQDJ2gzUPNm13CCcp2A4gQ2Jyg4wVAn6GI370F1u05Q9AnG0L0u1GtsZccXmZJTsgy2/sr9vcezrLSldGRk/HwRQlFNhP0opCA5VaTe4a0hGlOSfIh/+f0qPPpHn4w+Vkq9wRj/3RllruhJX/Nx7L53zMd7MpYkl/gebRAU1UD4OtpTifmZrxJRc7gzU3UQjycxbQA0VQRrTpQJR9HEkDowSu2zRpzjvffRzzI2VT/w+Fsy9Js3dodz2Ri0CtoU8HU3BJU1KDzcuZKtA+E8qf3iikOA/BKXaYJsS37hsUnuPDTSmF9JtursIL79Y0x/V2wf7Rr8iZ1pEK+OopG99s5H2gBU2mKsAXvuMG56lRNFIhjeliFtAKrZoIDs5A01bkjjmwmM9DZNxbt9cwRUBQEb4SnBgrWyypviwYBKGhT/T4wrfkRYZoNgoMOj3Z/Do513Zd/n8+/ZyP+3dMwa8I1BZTdvjPlgj3qnC4Nbsz67xzRAzAECQFDJY4Oy66qe+bJ9uPt/2hBUFhApLcYUgoB7zo099e7k1ZQEkAFlBr44xB5sKHFV9Vk1jspTiW8nY36xrtiY94XhiXsNXTzkQwTEKYkfMMq2NGRGdoyDzQ1BrbVibyPRL2tRH3YlPe+M7L29w6yf/1Ji3xtzl56SbdeTAJEU52rsya7S87Bx8rco6E5QKxcDwn99P1Bai8EVDVCza3railVgcK7PtuqKZtpqxBaFaXpiEnNOib6Sc0Y+C82KTaD2aTqN2LYNIXj/XpIIK3WGUIA6Qr1k9WhnmGbx1B7uJd5S9M/0BBYivn3oZBtWz8V4SznhANhSf1J97HrHH7GF05go/E8U6VkyMsZ5RsM5oEnO26ZHKglIbEZgHnFsEv4Rv1ib0QReHe5ccGZ/iu0U394fLNz7dTRQZIaZh4SgtDppa9tVTTWsq+bJNSkcIJmxXSJZuT6CyWIgCgP+eHNv6RHQKpZuiaglVNMgVnc1NRLMgcsp0hZ1EB5F71hDcmGDQTgxZeNcch94tybvX0RlG8SUBNxyn+B5mPiiBqCssRfthLvHS87mzIRpnFCHqG6koUUzjl1M8+rNXuqcvdRo4T5WSPtdJrO14yDWpC+EVRfaNankerXqIS4ayoRYc77ePLz1x30h+cLrArUEhNwpSw+Yj67jSVLvtexabJs4AZZoO3Z2rxMtqk7as3eZ5068qjXd7NdPD4ipxjhGtF2kPVzuhz+UmQbUEapSrpEyPZteGHPZlMpzmjF33SWVDU5ir+2R+ok6QiUBqWBe7uE8a0QNAUQcey2xPy4BHuY+EFBKsex1RaytLSDhbFKj3Gu+wIetxJpyhmNOZUZ+oOiYTLAEIfUKLEFLWFtAbG+O7as6dxNuHCykC0rtEW9lX1t4S1sOSulT6gDrCyhQJ6iUppxNW2BPdVJqj+ZMZr/pmlwZasdBbcJz7dDcM3YG0Kx5FM+B4+On+x+oRaykQciPuErxa9cVh4I9ep9y3763a3tOL2qQuPTAJabfqF7ua0yaaiC6phnX91tmF18sHPpc8ePNy8KBtrEoV49TTHIZf/r92To8NIbZgy/WHiXwomdtOYginhWQSyUiPoyTnl4pz2KbgYh4l1YEbyFUN54VEITBgj+BPQKLycb5uitNXrrF8ltr9QRRVH+6kOHvsQaeppk/B4MnXO0IKenFvE3Gq8ZSWb7WYVa/VEBS3XTRMhg8qgmhabd4m9TIyAvXuOBrnFHLKBVQLksPOHNeY7/b2ET3y2+mfqSMZDOXcnKqr9YhwXKuvyaDsAoWBJTbWkhEbZa9MtjjgMxf2fWibsb3eEtr4NXrnSswjcuI/SaxaKR7yUjkhjgj0Be0JnhVz9gzRWVjngaJ8PlETFp/pDWRPOl3vIg/STTNhcs2Sz85DQoPvz9WSktYj6pBk+mEaCZCBtUMK4hWPWPLP60a7JyAMsNM5vrx9uGYKsL2Tk+9jg+9pwx7nwaNPrD9muf7jNF3PdwD/oytyhrzeV1tywSUq7GvaZgLk8o0pWQ4Zs08aMqwhocRa7wksgs0rN8xW/jaWn3YWS7GW0vIKTHM9aLU0BOO6/Iw1+iflh/RoNeJP01gv8ZkadjMmWQ93Gl3P+dzLMgPlPVhJ8NV7yFGGq6TEDFXNMwFTOQ6ovp017aXYW92yT+eXb86ZcFciGag5UbpyPVwZ9qShgjrRONWg4wlwdFWVzfHwWTANFJJ31AbcFok/ZIZmd9TfbzI7/G2EtgBp0n40EpapEUd017CwNbFa086xy3zah1Gb6hF8D0u3ZFNkhPX3mcWc0LOKUeULd7LhJued4CZ6yYzZKyscq10vGoXC32MDSKZkpgF+dHwXCnrqNSg2Jkmi2fndU9BMHnp2pqv4jhmywE3ia+3kxE5I1pW62oKbhuN5Y2eHXs1NN4VZqHdGJz34+19tIpCaJbyj/YwaSWnWcotN30fY2xTqFJz1pHqc9fwYnZVVdBKJOrYvwMQXqnRXpaFpw/g8eF3tCZ4oSP3+iY83PmOnhK8EePtipwLwalsP1k0M142J4Una3DQdJ/PwmTQGWabNUupW59BaAM+6Z/Nye+UW0InqzT7bltAgMufBqz+fX//+1E8yQN4ZkwNQSP3sz1GpU0PL7X8SfuKPPf176hy7lUX2RyOdkbUAkD6u+svxGTQIiiJG1+gdjQbt89yNHMN3t8GNgSY1o7iS5F27ktMVgg3JLCdjw+LnlbPK5XddUyUwKr9VmmCWx9T77mQxccmbKnbPmeby+kAzV++kwmiCNdBKXcJJMSAEW/6kQNniLO0Ypnb9yL/oT8HoTsy8oknygHUPnUM1zWLVj4XcuSemq4HI9fEX8wR/bUY7CUkW1qg9A22CMhJGTx02FW1oIis17EtQChb6uC5Xsdce7Nz+3PCbE4+Qd0GnEt9oI7gxUAxEs+kybSHTUfamQ+hsM2duHis3O17VC4aI1TpIJUHVm0hpXqb5sFT+A2gbEK2s61UUlHJ76bZQa67A8llypdIN0WxBa4tpAzkU/MJM+CSV0BsXObWke0XH3WwGmXz0kRFC+0vX28eBmoeF4ywuoh0qV1YNQ/wnFjzsIzp/D4vEmdpc7w2k+W1+bKnapgzIpV8pOnLPMpa4FqckHa4h5q9bfT6LHRJVmGLvCb13FbCQ396dolAjO0TBHacVl/Uc9eWZ7SmNDDKvGnjkYNOkTad+jmgl0AXIW2G0DRaEfByWifHJlHocAWV2Qr51QKsZ2TWsfQfrVgDPuJD8GIY/42FM0rt1l+sT3a5A//MrAAAAABJRU5ErkJggg==" alt="Wallet">
            <a href="{{ route('view.codes') }}" class="action-btn first-btn">રકમ જુઓ</a>
        </div>
        <div class="action-box">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAD4AAAA+CAYAAABzwahEAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAObSURBVHgB7ZtBdtowEIZnBIvu6nTdgHsDeoKSQt7rkp4g5ARNTkBygoYTlJwg6a7vhTTOCUpPUEO7BmXXRfB0RrYTymsT2xRcsL6NZbCMfiRLo5kxwgxO83kdSLUQcU9OISEE4On+cAdWgNOsvEfAgxRVtLQPYNrV/R9e/CEucMPfoFvc0p6vYYk4ddfBMk0gIwR0ovujQykb4X8QfU1EftIbglKevvB7sAKcXbcNQVCDhCOSR6/Lh1fxeSwendfbbVTqQ3gV+FTCHf3J92GDcN64Lk7pilW7ck4w3VH8l7TiCzZRtCCaRNv9J6WO4qFghgFPANebKDom0uZJmZ/vmoL4WSH6BhsOIQ2joqOgoFjhRcMKLxplWBAxIyGFXf+P0Iuax5mFO43tFqDqIFANcmCrWR1QEHT15+89yECmoW7MXFRnYghAftTE1DYdkIFMPc4/+C4qat7MnLIptNRd2TwKwSUyW2e2uFWHD+eQklnhN0kqhM90OLwR6XzSH2Xeyi6C06hoNrelAzKNOoVE3bCkBolqPLmfyAKCIeTFzCjjznCTVVKeqYrUU+PL0YFxIqxoP50nolG0ji9G+2ZyW7bn5H8i1mott6JhhRcNK7xoWOFJibyV4bqPyofcUFEbwOe12YdVIA56Z3e7DTnjNNwWR1by3CFaLBaLxZIn+NgFTrN6hghrtVZSQB5M1eFDDpYHhbMvq4Zl+gJrCCG+ZFfTX/2Ij/b4s0blhG8y3+Ovoto+5OVwRKjGqR18/DrrfERAb9z3jx6unhKTT3IbJhEQ0LHuj44gB5xm5YgFdkw7bvFFWnvd7s6KRrGFR6HeQqG2ZJ0u00QioLDhiEbWS2ybXEmPh2HWKN/tUX7OREYJ8hsp8VIGJjriJ6pTwroceCmrpw4TizUkQXmQ+DTiHkctn/KdVruW8x8eZViLimTBzjkyxcc5Nn3MEcczLkoD2rBqZqwPAuxCBjLN6vrSP2drbt9Ybvkx4A54mzXKmzkHJvrBXuGSf+5aEDZg7cLM1nIrGlZ40Si08Cj4hi5sOEhYDQswEOGDsAz15Pli60ekrS5lBBooNvmO4y+xRFebKF40ibb4PKDg1Fi9kUMxzk81r0xC8hfubvjaQdYs4rSY7XPSnaTAjzBGPS0QUVdfjg7uzP158WmZ9IepHZdpWfQVS95YnY4vRm0p383qJrUT5KU0+ggpTVCK82GXTGQee5AOLZpEWyxa+AU2hV2+/zGP4wAAAABJRU5ErkJggg==" alt="Scan">
            <a href="javascript:void(0)" class="action-btn second-btn">વધુ સ્કેન કરો</a>
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
        $('.status-title').text(
            lang === 'hi' ? 'बधाई हो!!!' :
            lang === 'gu' ? 'અભિનંદન !!!' :
            'Congratulations!!!'
        );
        $('.first-btn').text(
            lang === 'hi' ? 'कोड देखो' :
            lang === 'gu' ? 'રકમ જુઓ' :
            'View Codes'
        );
        $('.second-btn').text(
            lang === 'hi' ? 'और भी स्कैन करें' :
            lang === 'gu' ? 'વધુ સ્કેન કરો' :
            'Scan More'
        );
        $('.scan-title').text(
            lang === 'hi' ? 'बोतल पर दिए गए क्यूआर कोड को स्कैन करें।' :
            lang === 'gu' ? 'બોટલ પર આપેલ QR કોડ સ્કેન કરો.' :
            'Scan the QR code given on the bottle'
        );
        $('.scan-btn').text(
            lang === 'hi' ? 'स्कैन' :
            lang === 'gu' ? 'સ્કેન કરો' :
            'Scan'
        );

        let logoPath = lang === 'hi' ? "{{ asset('img/scan-win-logo-hi.png') }}" :
        lang === 'gu' ? "{{ asset('img/scan-win-logo-gj.png') }}" :
        "{{ asset('img/scan-win-logo-en.png') }}"
        $('.campaign-logo img').attr('src', logoPath);
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
