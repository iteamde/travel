<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    // return view('frontend.index');
    return view('frontend.angular.index');
});

Route::get('/public', function () {
    return view('frontend.angular.index');
});

Route::get('/public/home', function () {
    return view('frontend.angular.index');
});

Route::get('/public/privacy-policy', function () {
    return view('frontend.angular.index');
});

Route::get('/public/terms-of-service', function () {
    return view('frontend.angular.index');
});

Route::get('/public/login', function () {
    return view('frontend.angular.index');
});

Route::get('/public/signup', function () {
    return view('frontend.angular.index');
});

Route::get('/public/signup/step1', function () {
    return view('frontend.angular.index');
});

Route::get('/public/signup/step2', function () {
    return view('frontend.angular.index');
});

Route::get('/public/signup/step3', function () {
    return view('frontend.angular.index');
});

Route::get('/public/signup/step4', function () {
    return view('frontend.angular.index');
});

Route::get('/public/signup/step5', function () {
    return view('frontend.angular.index');
});

Route::get('/public/forgot-password', function () {
    return view('frontend.angular.index');
});

Route::get('/public/reset-password', function () {
    return view('frontend.angular.index');
});

Route::get('/public/twitter-callback', function () {
    return view('frontend.angular.index');
});

Route::get('/public/logout', function () {
    return view('frontend.angular.index');
});