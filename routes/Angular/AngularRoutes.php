<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    // return view('frontend.index');
    return view('frontend.angular.index');
});

Route::get('/privacy-policy', function () {
    // return view('frontend.index');
    return view('frontend.angular.index');
});

Route::get('/terms-of-service', function () {
    // return view('frontend.index');
    return view('frontend.angular.index');
});