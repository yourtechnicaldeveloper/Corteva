<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Kaydee123\Msg91Laravel\Facades\Msg91;

class HomeController extends Controller
{
    public function SendOtp(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'identifier' => 'required'
            ]);
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
                ], 500);
            }
            $data = json_decode($response, true);
            $message = $data['message'] ?? null;
            $type    = $data['type'] ?? null;
            if ($type === 'success') {
                session()->flash('msg91_request_id', $message);
            }
            return response()->json(json_decode($response, true));
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
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
            if (!$reqId) {
                return response()->json([
                    'success' => false,
                    'message' => 'OTP session expired. Please resend OTP.'
                ], 422);
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
                session()->flash('otp_error', $error);
                return response()->json([
                    'success' => false,
                    'message' => $error
                ], 500);
            }
            $data = json_decode($response, true);
            if (($data['type'] ?? '') === 'success') {
                session()->forget('msg91_request_id');
                session()->flash('msg91_access_token', $data['message']);
                return response()->json([
                    'success' => true,
                    'message' => 'OTP verified successfully',
                    'verified_token' => $data['message']
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => $data['message'] ?? 'Invalid OTP'
            ], 422);
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 422);
        }
    }
    public function VerifyAccessToken(Request $request)
    {
        try {
            // access_token should be stored after verifyOtp
            $accessToken = session('msg91_access_token');
            if (!$accessToken) {
                return response()->json([
                    'success' => false,
                    'message' => 'Access token not found. Please verify OTP again.'
                ], 422);
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
                return response()->json([
                    'success' => false,
                    'message' => $error
                ], 500);
            }
            $data = json_decode($response, true);
            if (($data['type'] ?? '') === 'success') {
                session()->forget('msg91_access_token');
                return response()->json([
                    'success' => true,
                    'message' => 'OTP Verified Successfully',
                    'data' => $data
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => $data['message'] ?? 'Invalid access token'
            ], 422);
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 422);
        }
    }

}
