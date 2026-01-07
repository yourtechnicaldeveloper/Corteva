<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Corteva Form</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{-- <link rel="stylesheet" href="https://23c02a0b96d8.ngrok-free.app/css/app.css"> --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- Bootstrap JS (required) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="pageLoader" style="display:none;">
            <div class="loader-box">
                <div class="spinner"></div>
                <p>Please wait...</p>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="form-card">
                <!-- Header -->
                <nav class="navbar navbar-light bg-gray px-3 d-flex justify-content-between align-items-center sticky-top bg-white">
                    <a class="navbar-brand m-0" href="#">
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

                <!-- English Banner Image -->
                <div class="banner english_frm">
                    <img id="banner_img" alt="Corteva Banner">
                    <!-- Form -->
                    <form method="POST" class="register_frm" action="#">
                        @csrf
                        <div id="step1">
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="mobile" id="mobile" placeholder="Mobile No." required>
                            </div>

                        </div>
                        <div id="step2" style="display:none;">
                            <p id="otpLabel" class="otp-title">Enter OTP</p>
                            <div class="otp-wrapper">
                                <input type="text" class="otp-input" maxlength="1">
                                <input type="text" class="otp-input" maxlength="1">
                                <input type="text" class="otp-input" maxlength="1">
                                <input type="text" class="otp-input" maxlength="1">
                                <input type="text" class="otp-input" maxlength="1">
                                <input type="text" class="otp-input" maxlength="1">
                            </div>
                            <!-- Hidden field for validation -->
                            <input type="hidden" name="otp" id="otp">
                        </div>
                        <button type="submit" id="sbn-btn" class="btn-submit">
                            SUBMIT
                        </button>
                    </form>
                    <p class="note" id="note">
                        *Your profile is registered in 'Corteva Farmer Connect' app and you authorize Corteva to contact you for future marketing activities.
                    </p>
                </div>

            </div>
        </div>
        <script src="https://control.msg91.com/app/assets/otp-provider/otp-provider.js"></script>
        <script>
            /* Init on page load */
            let currentStep = 1;
            let otpTouched = false;
            let msg91Ready = false;
            let currentMobile = '';
            let currentLang = "{{ $lang }}";
            let msg91Instance = null;

            var configuration = {
                widgetId: "3661646c366b363637353038",
                tokenAuth: "486318THEpC5CKH695a6bd2P1",
                identifier: "",
                exposeMethods: true,
                success: function (data) {
                    console.log("✅ Widget callback - Operation successful", data);
                },
                failure: function (error) {
                    console.error("❌ Widget callback - Operation failed", error);
                }
            };

            $(document).ready(function() {
                initValidation(currentLang);

                setTimeout(function() {
                    if (typeof window.initSendOTP === 'function') {
                        console.log("✅ Initializing MSG91 widget...");
                        msg91Instance = window.initSendOTP(configuration);
                        msg91Ready = true;
                        console.log("✅ MSG91 is ready");
                    } else {
                        console.error('❌ MSG91 script not loaded');
                    }
                }, 500);

            });

            /* Language-wise Messages */
            const validationMessages = {
                en: {
                    name_required: "Name is required",
                    name_min: "Name must be at least 3 characters",
                    mobile_required: "Mobile number is required",
                    mobile_digits: "Please enter a valid 10 digit mobile number",
                    otp_required: "OTP is required",
                    otp_invalid: "Please enter a valid OTP"
                },
                hi: {
                    name_required: "नाम आवश्यक है",
                    name_min: "नाम कम से कम 3 अक्षरों का होना चाहिए",
                    mobile_required: "मोबाइल नंबर आवश्यक है",
                    mobile_digits: "कृपया 10 अंकों का सही मोबाइल नंबर दर्ज करें",
                    otp_required: "OTP आवश्यक है",
                    otp_invalid: "मान्य OTP दर्ज करें"
                },
                gu: {
                    name_required: "નામ ફરજિયાત છે",
                    name_min: "નામ ઓછામાં ઓછા 3 અક્ષરનું હોવું જોઈએ",
                    mobile_required: "મોબાઇલ નંબર ફરજિયાત છે",
                    mobile_digits: "કૃપા કરીને માન્ય 10 અંકનો મોબાઇલ નંબર દાખલ કરો",
                    otp_required: "OTP જરૂરી છે",
                    otp_invalid: "માન્ય OTP દાખલ કરો"
                }
            };
            function getActiveForm() {
                return $(".register_frm:visible");
            }

            /* Language-wise validation */
            function initValidation(lang) {
                if (lang === 'en') {
                    $('#banner_img').attr('src', 'https://galileo.farmerconnect.in/static/media/HindiBanner.626e325b6dfc3acf4a68.png');
                    $('#name').attr('placeholder', 'Name');
                    $('#mobile').attr('placeholder', 'Mobile No.');
                    $('#sbn-btn').text('Submit');
                    $('#note').text('*Your profile is registered in Corteva Farmer Connect app and you authorize Corteva to contact you for future marketing activities.');
                } if (lang === 'gu') {
                    $('#banner_img').attr('src', 'https://galileo.farmerconnect.in/static/media/GujaratiBanner.71d88c2d56b8dbb7652b.png');
                    $('#name').attr('placeholder', 'નામ');
                    $('#mobile').attr('placeholder', 'મોબાઇલ નંબર');
                    $('#sbn-btn').text('સબમિટ કરો');
                    $('#note').text('*તમારી પ્રોફાઇલ Corteva Farmer connect એપ્લિકેશનમાં નોંધાયેલ છે અને તમે ભવિષ્યની માર્કેટિંગ પ્રવૃત્તિઓ માટે તમારો સંપર્ક કરવા કોર્ટવાને અધિકૃત કરો છો.');
                } else if (lang === 'hi'){
                    $('#banner_img').attr('src', 'https://galileo.farmerconnect.in/static/media/HindiBanner.626e325b6dfc3acf4a68.png');
                    $('#name').attr('placeholder', 'नाम');
                    $('#mobile').attr('placeholder', 'मोबाइल नं.');
                    $('#sbn-btn').text('जमा करें');
                    $('#note').text('*आपकी प्रोफ़ाइल Corteva Farmer connect ऐप में पंजीकृत है और आप भविष्य की मार्केटिंग गतिविधियों के लिए आपसे संपर्क करने के लिए कोर्टेवा को अधिकृत करते हैं।');
                }
                if (currentStep == 2) {
                    $('.btn-submit').text(
                        lang === 'hi' ? 'जमा करें' :
                        lang === 'gu' ? 'લોગિન' :
                        'LOGIN'
                    );
                }
                const $form = getActiveForm();
                if (!$form.length) return;
                // destroy previous validator
                if ($form.data('validator')) {
                    $form.validate().destroy();
                }
                let rules = {};
                let messages = {};

                if (currentStep === 1) {
                    rules = {
                        name: { required: true, minlength: 3 },
                        mobile: { required: true, digits: true, minlength: 10, maxlength: 10 }
                    };

                    messages = {
                        name: {
                            required: validationMessages[lang].name_required,
                            minlength: validationMessages[lang].name_min
                        },
                        mobile: {
                            required: validationMessages[lang].mobile_required,
                            digits: validationMessages[lang].mobile_digits,
                            minlength: validationMessages[lang].mobile_digits,
                            maxlength: validationMessages[lang].mobile_digits
                        }
                    };
                }

                if (currentStep === 2) {
                    rules = {
                        otp: {
                            required: function () {
                                return otpTouched;
                            },
                            digits: true,
                            minlength: 6,
                            maxlength: 6
                        }
                    };

                    messages = {
                        otp: {
                            required: validationMessages[lang].otp_required,
                            digits: validationMessages[lang].otp_invalid,
                            minlength: validationMessages[lang].otp_invalid,
                            maxlength: validationMessages[lang].otp_invalid
                        }
                    };
                }
                $form.validate({
                    ignore: [],
                    rules: rules,
                    messages: messages,
                    errorElement: "small",
                    errorClass: "text-danger",
                    errorPlacement: function (error, element) {
                        if (element.attr("name") === "otp") {
                            error.insertAfter(".otp-wrapper");
                        } else {
                            error.insertAfter(element);
                        }
                    }
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
            // Submit
            $('.register_frm').on('submit', function (e) {
                e.preventDefault();

                if (currentStep === 2) {
                    otpTouched = true;
                }

                if (!$(this).valid()) return;

                $('#pageLoader').fadeIn();

                /* STEP 1 → SEND OTP */
                if (currentStep === 1) {
                    // Check all possible method names
                    const sendMethod = window.sendOTP || window.sendOtp || window.SendOTP;

                    if (!msg91Ready || !sendMethod) {
                        console.error("Available window methods:", Object.keys(window).filter(k => k.toLowerCase().includes('otp')));
                        alert("OTP service not ready. Please wait a moment and try again.");
                        $('#pageLoader').fadeOut();
                        return;
                    }
                    currentMobile = $('#mobile').val();

                    // Use the exposed sendOTP method
                    window.sendOTP(
                        "91" + currentMobile,
                        function (data) {
                            console.log("✅ OTP SENT", data);
                            currentStep = 2;
                            $('#step1').hide();
                            $('#step2').fadeIn();

                            // Update button text based on language
                            $('#sbn-btn').text(
                                currentLang === 'hi' ? 'सत्यापित करें' :
                                currentLang === 'gu' ? 'ચકાસો' :
                                'VERIFY'
                            );

                            initValidation(currentLang);
                            $('.otp-input').first().focus();
                            $('#pageLoader').fadeOut();
                        },
                        function (error) {
                            console.error("❌ SEND OTP FAILED", error);
                            $('#pageLoader').fadeOut();
                            alert(error?.message || "Failed to send OTP. Please try again.");
                        }
                    );
                }

                /* STEP 2 → VERIFY OTP */
                else if (currentStep === 2) {
                    let otp = '';
                    $('.otp-input').each(function () {
                        otp += $(this).val();
                    });

                    $('#otp').val(otp);

                    if (!msg91Ready || typeof window.verifyOTP !== 'function') {
                        alert("OTP service not ready");
                        $('#pageLoader').fadeOut();
                        return;
                    }

                    // Use the exposed verifyOTP method
                    window.verifyOTP(
                        otp,
                        function (data) {
                            console.log("✅ OTP VERIFIED", data);
                            $('#pageLoader').fadeOut();

                            // Now submit your actual form data to backend
                            submitFormData();
                        },
                        function (error) {
                            console.error("❌ VERIFY OTP FAILED", error);
                            $('#pageLoader').fadeOut();
                            alert(error?.message || "Invalid OTP. Please try again.");
                        }
                    );
                }
            });

            $('.otp-input').on('input', function () {
                this.value = this.value.replace(/\D/g, '');

                if (this.value && $(this).next('.otp-input').length) {
                    $(this).next('.otp-input').focus();
                }

                updateOtp();
            });

            $('.otp-input').on('keydown', function (e) {
                if (e.key === 'Backspace' && !this.value) {
                    $(this).prev('.otp-input').focus();
                }
            });

            function updateOtp() {
                let otp = '';
                $('.otp-input').each(function () {
                    otp += $(this).val();
                });
                $('#otp').val(otp);
            }
        </script>
    </body>
</html>
