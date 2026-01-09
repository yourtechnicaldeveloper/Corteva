<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Kaydee123\Msg91Laravel\Facades\Msg91;

class HomeController extends Controller
{
    // Send OTP
    public function SendOtp(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'identifier' => 'required'
            ]);
            $lang = session('lang');
            User::create([
                'name' => $request->name,
                'mobile' => $request->identifier,
            ]);
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.msg91.com/api/v5/widget/sendOtp",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode([
                    "widgetId"   => env('MSG91_WIDGETS_KEY'),
                    "identifier" => $request->identifier
                ]),
                CURLOPT_HTTPHEADER => [
                    "authkey: " . env('MSG91_AUTH_KEY'),
                    "Content-Type: application/json"
                ],
            ]);
            $response = curl_exec($curl);
            $error = curl_error($curl);
            if ($error) {
                return response()->json([
                    'success' => false,
                    'message' => $error
                ], 422);
            }
            $data = json_decode($response, true);
            $message = $data['message'] ?? null;
            $type    = $data['type'] ?? null;
            if ($type === 'success') {
                session()->put('msg91_request_id', $message);
            }
            $messages = [
                'en' => 'Sucessfully send OTP.',
                'hi' => 'ओटीपी सफलतापूर्वक भेज दिया गया।',
                'gu' => 'સફળતાપૂર્વક OTP મોકલો.',
            ];
            return response()->json([
                'success' => true,
                'message' => $messages[$lang] ?? $messages['en']
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 422);
        }
    }
    // Verify OTP
    public function VerifyOtp(Request $request)
    {
        try {
            $request->validate([
                'otp' => 'required|numeric'
            ]);
            $reqId = session('msg91_request_id');
            $lang = session('lang');
            if (!$reqId && !$lang) {
                $messages = [
                    'en' => 'OTP session expired. Please resend OTP.',
                    'hi' => 'OTP सत्र समाप्त हो गया है। कृपया ओटीपी दोबारा भेजें।',
                    'gu' => 'OTP સત્ર સમાપ્ત થયું. કૃપા કરીને OTP ફરીથી મોકલો.',
                ];
                return response()->json([
                    'success' => false,
                    'message' => $messages[$lang] ?? $messages['en']
                ]);
            }
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.msg91.com/api/v5/widget/verifyOtp",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode([
                    "widgetId" => env('MSG91_WIDGETS_KEY'),
                    "reqId"    => $reqId,
                    "otp"      => $request->otp
                ]),
                CURLOPT_HTTPHEADER => [
                    "authkey: " . env('MSG91_AUTH_KEY'),
                    "Content-Type: application/json"
                ],
            ]);
            $response = curl_exec($curl);
            $error = curl_error($curl);
            if ($error) {
                $messages = [
                    'en' => 'OTP can not be send. Please try again.',
                    'hi' => 'OTP भेजा नहीं जा सका। कृपया पुनः प्रयास करें।',
                    'gu' => 'OTP મોકલી શકાતો નથી. કૃપા કરીને ફરી પ્રયાસ કરો.',
                ];
                return response()->json([
                    'success' => false,
                    'message' => $messages[$lang] ?? $messages['en']
                ]);
            }
            $data = json_decode($response, true);
            if (($data['type'] ?? '') === 'success') {
                session()->put('msg91_access_token', $data['message']);
                $messages = [
                    'en' => 'OTP verified successfully',
                    'hi' => 'OTP सफलतापूर्वक सत्यापित हो गया',
                    'gu' => 'OTP સફળતાપૂર્વક ચકાસાયેલ',
                ];
                return response()->json([
                    'success' => true,
                    'message' => $messages[$lang] ?? $messages['en'],
                    'verified_token' => $data['message']
                ]);
            }
            $messages = [
                'en' => 'Invalid OTP',
                'hi' => 'अमान्य OTP',
                'gu' => 'અમાન્ય OTP',
            ];
            return response()->json([
                'success' => false,
                'message' => $messages[$lang] ?? $messages['en']
            ]);
        } catch (Exception $ex) {
            $messages = [
                'en' => 'Something went wrong',
                'hi' => 'कुछ गलत हो गया',
                'gu' => 'કંઈક ખોટું થયું',
            ];
            return response()->json([
                'success' => false,
                'message' => $messages[$lang] ?? $messages['en']
            ], 422);
        }
    }
    // Verify Access Token
    public function VerifyAccessToken(Request $request)
    {
        try {
            // access_token should be stored after verifyOtp
            $accessToken = session('msg91_access_token');
            $lang = session('lang');
            if (!$accessToken) {
                $messages = [
                    'en' => 'Access token not found. Please verify OTP again.',
                    'hi' => 'एक्सेस टोकन नहीं मिला। कृपया OTP दोबारा सत्यापित करें।',
                    'gu' => 'ઍક્સેસ ટોકન મળ્યું નથી. કૃપા કરીને ફરીથી OTP ચકાસો.',
                ];
                return response()->json([
                    'success' => false,
                    'message' => $messages[$lang] ?? $messages['en']
                ]);
            }
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.msg91.com/api/v5/widget/verifyAccessToken",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode([
                    "access-token" => $accessToken
                ]),
                CURLOPT_HTTPHEADER => [
                    "authkey: " . env('MSG91_AUTH_KEY'),
                    "Content-Type: application/json"
                ],
            ]);
            $response = curl_exec($curl);
            $error = curl_error($curl);
            if ($error) {
                session()->flash('otp_error', $error);
                $messages = [
                    'en' => 'OTP can not be verified. Please try again.',
                    'hi' => 'OTP सत्यापित नहीं हो सका। कृपया पुनः प्रयास करें',
                    'gu' => 'OTP ચકાસી શકાતો નથી. કૃપા કરીને ફરી પ્રયાસ કરો.',
                ];
                return response()->json([
                    'success' => false,
                    'message' => $messages[$lang] ?? $messages['en']
                ]);
            }
            $data = json_decode($response, true);
            if (($data['type'] ?? '') === 'success') {
                session()->forget('msg91_request_id');
                $messages = [
                    'en' => 'OTP Verified Successfully.',
                    'hi' => 'OTP का सत्यापन सफलतापूर्वक हो गया है।',
                    'gu' => 'OTP સફળતાપૂર્વક ચકાસાયેલ.',
                ];
                return response()->json([
                    'success' => true,
                    'message' => $messages[$lang] ?? $messages['en'],
                    'data' => $data
                ]);
            }
            $messages = [
                'en' => 'Invalid access token.',
                'hi' => 'अमान्य पहुँच टोकन',
                'gu' => 'અમાન્ય એક્સેસ ટોકન.',
            ];
            return response()->json([
                'success' => false,
                'message' => $messages[$lang] ?? $messages['en'],
            ]);
        } catch (Exception $ex) {
            $messages = [
                'en' => 'Something went wrong',
                'hi' => 'कुछ गलत हो गया',
                'gu' => 'કંઈક ખોટું થયું',
            ];
            return response()->json([
                'success' => false,
                'message' => $messages[$lang] ?? $messages['en']
            ], 422);
        }
    }
    function ProductList() {
        $lang = session('lang');
        $accessToken = session('msg91_access_token');
        if ($accessToken) {
            // session()->forget('msg91_access_token');
            return view('front.product-list', compact('lang'));
        } else {
            return redirect('/');
        }
    }
    function Reward() {
        $lang = session('lang');
        if ($lang) {
            return view('front.reward', compact('lang'));
        } else {
            return redirect('/');
        }
    }
}
