<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/106a6c241b8797f52e1e77317b96a201', function () {
    if (!session()->has('lang')) {
        session(['lang' => 'gu']);
    }
    $lang = session('lang');
    return view('front.register', compact('lang'));
});
Route::get('/', function () {
    if (!session()->has('lang')) {
        session(['lang' => 'gu']);
    }
    $lang = session('lang');
    return view('front.register', compact('lang'));
});
Route::post('set-language', function (Request $request) {
    session(['lang' => $request->lang]);
    return response()->json(['status' => 'ok']);
})->name('set.language');
Route::post('send-otp', [HomeController::class, 'SendOtp']);
Route::post('verify-otp', [HomeController::class, 'VerifyOtp']);
Route::post('verify-access-token', [HomeController::class, 'VerifyAccessToken']);
Route::middleware('check.access.token')->group(function () {
    Route::any('product-list', [HomeController::class, 'ProductList'])->name('product.list');
    Route::any('reward', [HomeController::class, 'Reward'])->name('reward');
    Route::post('scan-qr', [HomeController::class, 'Scaning'])->name('qr.scan');
    Route::any('view-codes', [HomeController::class, 'ViewCodes'])->name('view.codes');
});

