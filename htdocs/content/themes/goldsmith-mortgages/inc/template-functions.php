<?php

use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
Filter::add('body_class', function ($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (! is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (! is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
});

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
Action::add('wp_head', function () {
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="'.esc_url(get_bloginfo('pingback_url')).'">';
    }
});

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
Action::add('after_setup_theme', function () {
    $GLOBALS['content_width'] = 640;
}, 0);

Action::add('after_setup_theme', function () {
    Filter::add('show_admin_bar', function () {
        return false;
    });
});

Action::add('login_enqueue_scripts', function () {
    echo '
    <style type="text/css">
        body {
            background-image: url(' . get_stylesheet_directory_uri() . '/assets/imgs/admin-bg.jpg) !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            background-position: bottom left !important;
        }

        #login h1 a {
            background-color: #ffffff;
            background-image: url(' . get_stylesheet_directory_uri() . '/assets/imgs/admin-logo.png) !important;
            background-size: auto;
            margin: 0;
            width: 100%;
        }
    </style>';
});

Action::add('wp_enqueue_scripts', function () {
    wp_enqueue_style('dashicons');
});
