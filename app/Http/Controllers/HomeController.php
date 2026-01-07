<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kaydee123\Msg91Laravel\Facades\Msg91;

class HomeController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10'
        ]);

        $mobile = $request->mobile;

        $response = Msg91::otp()
            ->to('91' . $mobile)
            ->template('your_dlt_template_id') // optional but recommended
            ->send();

        return response()->json($response);
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10',
            'otp'    => 'required|digits:6'
        ]);

        $response = Msg91::otp()
            ->to('91' . $request->mobile)
            ->verify($request->otp);

        return response()->json($response);
    }
}
