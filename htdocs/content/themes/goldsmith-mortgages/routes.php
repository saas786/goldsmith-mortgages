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

Route::any('single', function () {
    return view('blog.single');
});
