<?php

/**
 * Theme routes.
 *
 * The routes defined inside your theme override any similar routes
 * defined on the application global scope.
 */

use Themosis\Support\Facades\Asset;
use Themosis\Support\Facades\Route;

$theme = app()->make('wp.theme');

Route::get('/', function () {
    return view('pages.home');
});

Route::get('news', function () {
    return view('blog.archive');
});

Route::get('{locale}/news', function () {
    return view('blog.archive');
})->where(['locale' => 'en|zh']);

Route::any('single', function () {
    return view('blog.single');
});

Route::get('about-us', function () {
    return view('pages.about-us');
});

Route::get('{locale}/about-us', function () {
    return view('pages.about-us');
})->where(['locale' => 'en|zh']);

Route::get('services', function () {
    return view('pages.services');
});

Route::get('{locale}/services', function () {
    return view('pages.services');
})->where(['locale' => 'en|zh']);

Route::get('contact-us', function () {
    return view('pages.contact-us');
});

Route::get('{locale}/contact-us', function () {
    return view('pages.contact-us');
})->where(['locale' => 'en|zh']);
