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

Route::get('/', function () use ($theme) {
    Asset::add('testimonial-style', 'css/testimonial.css', [], $theme->getHeader('version'))->to('front');
    Asset::add('testimonial-script', 'js/testimonial.js', [], $theme->getHeader('version'))->to('front');

    $contact = Asset::add('contact-script', 'js/contact.js', [], $theme->getHeader('version'))->to('front');
    $contact->localize('contact_script_data', [
        'wp_ajax'                     => admin_url('admin-ajax.php'),
        'wp_nonce'                    => wp_create_nonce('wp-nonce'),
        'enquiry_title'               => get_field('enquiry_title', 'option'),
        'enquiry_content'             => get_field('enquiry_content', 'option'),
        'enquiry_label_1'             => get_field('enquiry_label_1', 'option'),
        'enquiry_label_2'             => get_field('enquiry_label_2', 'option'),
        'enquiry_label_3'             => get_field('enquiry_label_3', 'option'),
        'enquiry_label_4'             => get_field('enquiry_label_4', 'option'),
        'enquiry_label_5'             => get_field('enquiry_label_5', 'option'),
        'enquiry_tnc_content_1a'      => get_field('enquiry_tnc_content_1a', 'option'),
        'enquiry_tnc_content_1b'      => get_field('enquiry_tnc_content_1b', 'option'),
        'enquiry_tnc_content_1c'      => get_field('enquiry_tnc_content_1c', 'option'),
        'enquiry_tnc_content_1_page'  => get_field('enquiry_tnc_content_1_page', 'option'),
        'google_recaptcha_site_key'   => get_field('google_recaptcha_site_key', 'option'),
        'google_recaptcha_secret_key' => get_field('google_recaptcha_secret_key', 'option'),
    ]);

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

Route::get('services', function () use ($theme) {
    Asset::add('testimonial-style', 'css/testimonial.css', [], $theme->getHeader('version'))->to('front');
    Asset::add('testimonial-script', 'js/testimonial.js', [], $theme->getHeader('version'))->to('front');

    $contact = Asset::add('contact-script', 'js/contact.js', [], $theme->getHeader('version'))->to('front');
    $contact->localize('contact_script_data', [
        'wp_ajax'                     => admin_url('admin-ajax.php'),
        'wp_nonce'                    => wp_create_nonce('wp-nonce'),
        'enquiry_title'               => get_field('enquiry_title', 'option'),
        'enquiry_content'             => get_field('enquiry_content', 'option'),
        'enquiry_label_1'             => get_field('enquiry_label_1', 'option'),
        'enquiry_label_2'             => get_field('enquiry_label_2', 'option'),
        'enquiry_label_3'             => get_field('enquiry_label_3', 'option'),
        'enquiry_label_4'             => get_field('enquiry_label_4', 'option'),
        'enquiry_label_5'             => get_field('enquiry_label_5', 'option'),
        'enquiry_tnc_content_1a'      => get_field('enquiry_tnc_content_1a', 'option'),
        'enquiry_tnc_content_1b'      => get_field('enquiry_tnc_content_1b', 'option'),
        'enquiry_tnc_content_1c'      => get_field('enquiry_tnc_content_1c', 'option'),
        'enquiry_tnc_content_1_page'  => get_field('enquiry_tnc_content_1_page', 'option'),
        'google_recaptcha_site_key'   => get_field('google_recaptcha_site_key', 'option'),
        'google_recaptcha_secret_key' => get_field('google_recaptcha_secret_key', 'option'),
    ]);

    $service = new WP_Query([
        'post_type' => 'service',
        'orderby'   => 'ID',
        'order'     => 'ASC',
    ]);
    $service_array = $service->get_posts();
    $service_array = array_slice($service_array, 0, 3);

    return view('pages.services', compact('service', 'service_array'));
});

Route::get('{locale}/services', function () use ($theme) {
    Asset::add('testimonial-style', 'css/testimonial.css', [], $theme->getHeader('version'))->to('front');
    Asset::add('testimonial-script', 'js/testimonial.js', [], $theme->getHeader('version'))->to('front');

    $contact = Asset::add('contact-script', 'js/contact.js', [], $theme->getHeader('version'))->to('front');
    $contact->localize('contact_script_data', [
        'wp_ajax'                     => admin_url('admin-ajax.php'),
        'wp_nonce'                    => wp_create_nonce('wp-nonce'),
        'enquiry_title'               => get_field('enquiry_title', 'option'),
        'enquiry_content'             => get_field('enquiry_content', 'option'),
        'enquiry_label_1'             => get_field('enquiry_label_1', 'option'),
        'enquiry_label_2'             => get_field('enquiry_label_2', 'option'),
        'enquiry_label_3'             => get_field('enquiry_label_3', 'option'),
        'enquiry_label_4'             => get_field('enquiry_label_4', 'option'),
        'enquiry_label_5'             => get_field('enquiry_label_5', 'option'),
        'enquiry_tnc_content_1a'      => get_field('enquiry_tnc_content_1a', 'option'),
        'enquiry_tnc_content_1b'      => get_field('enquiry_tnc_content_1b', 'option'),
        'enquiry_tnc_content_1c'      => get_field('enquiry_tnc_content_1c', 'option'),
        'enquiry_tnc_content_1_page'  => get_field('enquiry_tnc_content_1_page', 'option'),
        'google_recaptcha_site_key'   => get_field('google_recaptcha_site_key', 'option'),
        'google_recaptcha_secret_key' => get_field('google_recaptcha_secret_key', 'option'),
    ]);

    $service = new WP_Query([
        'post_type' => 'service',
        'orderby'   => 'ID',
        'order'     => 'ASC',
    ]);
    $service_array = $service->get_posts();
    $service_array = array_slice($service_array, 0, 3);

    return view('pages.services', compact('service', 'service_array'));
})->where(['locale' => 'en|zh']);

Route::get('contact-us', function () use ($theme) {
    $contact = Asset::add('contact-script', 'js/contact.js', [], $theme->getHeader('version'))->to('front');
    $contact->localize('contact_script_data', [
        'wp_ajax'                     => admin_url('admin-ajax.php'),
        'wp_nonce'                    => wp_create_nonce('wp-nonce'),
        'enquiry_title'               => get_field('enquiry_title', 'option'),
        'enquiry_content'             => get_field('enquiry_content', 'option'),
        'enquiry_label_1'             => get_field('enquiry_label_1', 'option'),
        'enquiry_label_2'             => get_field('enquiry_label_2', 'option'),
        'enquiry_label_3'             => get_field('enquiry_label_3', 'option'),
        'enquiry_label_4'             => get_field('enquiry_label_4', 'option'),
        'enquiry_label_5'             => get_field('enquiry_label_5', 'option'),
        'enquiry_tnc_content_1a'      => get_field('enquiry_tnc_content_1a', 'option'),
        'enquiry_tnc_content_1b'      => get_field('enquiry_tnc_content_1b', 'option'),
        'enquiry_tnc_content_1c'      => get_field('enquiry_tnc_content_1c', 'option'),
        'enquiry_tnc_content_1_page'  => get_field('enquiry_tnc_content_1_page', 'option'),
        'google_recaptcha_site_key'   => get_field('google_recaptcha_site_key', 'option'),
        'google_recaptcha_secret_key' => get_field('google_recaptcha_secret_key', 'option'),
    ]);

    $map = Asset::add('map-script', 'js/map.js', [], $theme->getHeader('version'))->to('front');
    $map->localize('map_script_data', [
        'google_maps_api_key'   => get_field('google_maps_api_key', 'option'),
        'google_maps_latitude'  => get_field('google_maps_latitude', 'option'),
        'google_maps_longitude' => get_field('google_maps_longitude', 'option'),
    ]);

    return view('pages.contact-us');
});

Route::get('{locale}/contact-us', function () use ($theme) {
    $contact = Asset::add('contact-script', 'js/contact.js', [], $theme->getHeader('version'))->to('front');
    $contact->localize('contact_script_data', [
        'wp_ajax'                     => admin_url('admin-ajax.php'),
        'wp_nonce'                    => wp_create_nonce('wp-nonce'),
        'enquiry_title'               => get_field('enquiry_title', 'option'),
        'enquiry_content'             => get_field('enquiry_content', 'option'),
        'enquiry_label_1'             => get_field('enquiry_label_1', 'option'),
        'enquiry_label_2'             => get_field('enquiry_label_2', 'option'),
        'enquiry_label_3'             => get_field('enquiry_label_3', 'option'),
        'enquiry_label_4'             => get_field('enquiry_label_4', 'option'),
        'enquiry_label_5'             => get_field('enquiry_label_5', 'option'),
        'enquiry_tnc_content_1a'      => get_field('enquiry_tnc_content_1a', 'option'),
        'enquiry_tnc_content_1b'      => get_field('enquiry_tnc_content_1b', 'option'),
        'enquiry_tnc_content_1c'      => get_field('enquiry_tnc_content_1c', 'option'),
        'enquiry_tnc_content_1_page'  => get_field('enquiry_tnc_content_1_page', 'option'),
        'google_recaptcha_site_key'   => get_field('google_recaptcha_site_key', 'option'),
        'google_recaptcha_secret_key' => get_field('google_recaptcha_secret_key', 'option'),
    ]);

    $map = Asset::add('map-script', 'js/map.js', [], $theme->getHeader('version'))->to('front');
    $map->localize('map_script_data', [
        'google_maps_api_key'   => get_field('google_maps_api_key', 'option'),
        'google_maps_latitude'  => get_field('google_maps_latitude', 'option'),
        'google_maps_longitude' => get_field('google_maps_longitude', 'option'),
    ]);

    return view('pages.contact-us');
})->where(['locale' => 'en|zh']);
