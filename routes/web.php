<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!session()->has('lang')) {
        session(['lang' => 'en']);
    }
    $lang = session('lang');
    return view('front.register', compact('lang'));
});

Route::post('set-language', function (\Illuminate\Http\Request $request) {
    session(['lang' => $request->lang]);
    return response()->json(['status' => 'ok']);
})->name('set.language');


