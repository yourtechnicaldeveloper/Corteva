<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!session()->has('lang')) {
        session(['lang' => 'gu']);
    }
    $lang = session('lang');
    return view('front.register', compact('lang'));
});

Route::post('set-language', function (\Illuminate\Http\Request $request) {
    session(['lang' => $request->lang]);
    return response()->json(['status' => 'ok']);
})->name('set.language');

Route::post('/send-otp', [HomeController::class, 'SendOtp']);
Route::post('/verify-otp', [HomeController::class, 'VerifyOtp']);
Route::post('/verify-access-token', [HomeController::class, 'VerifyAccessToken']);
Route::any('/product-list', [HomeController::class, 'ProductList'])->name('product.list');
Route::any('/reward', [HomeController::class, 'Reward'])->name('reward');


