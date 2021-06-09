<?php

namespace Theme\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Themosis\Core\ThemeManager;
use Themosis\Support\Facades\Asset;
use WP_Query;

class AssetServiceProvider extends ServiceProvider
{
    /**
     * Theme Assets
     *
     * Here we define the loaded assets from our previously defined
     * "dist" directory. Assets sources are located under the root "assets"
     * directory and are then compiled, thanks to Laravel Mix, to the "dist"
     * folder.
     *
     * @see https://laravel-mix.com/
     */
    public function register()
    {
        /** @var ThemeManager $theme */
        $theme = $this->app->make('wp.theme');
        $locale = $GLOBALS['locale'];

        Asset::add('theme_styles', 'css/theme.css', [], $theme->getHeader('version'))->to('front');
        Asset::add('theme_woo', 'css/woocommerce.css', ['theme_styles'], $theme->getHeader('version'))->to('front');
        Asset::add('theme_js', 'js/theme.min.js', [], $theme->getHeader('version'))->to('front');

        Asset::add('app-style', 'css/app.css', [], $theme->getHeader('version'))->to('front');
        Asset::add('app-script', 'js/app.js', [], $theme->getHeader('version'))->to('front');

        View::composer(['*'], function ($view) use ($locale) {
            switch ($locale) {
                case "en_NZ":
                    $home_url = home_url();
                    break;
                case "zh_CN":
                    $home_url = home_url('/zh');
                    break;
            }

            $view->with(compact('locale', 'home_url'));
        });

        View::composer(['layouts.header', 'layouts.footer'], function ($view) {
            $menus = wp_get_nav_menu_items(get_nav_menu_locations()['menu-1']);
            $menus_2 = wp_get_nav_menu_items(get_nav_menu_locations()['menu-2']);

            global $wp;
            $current_url = home_url(add_query_arg(array(), $wp->request)) . '/';

            $service = new WP_Query([
                'post_type' => 'service',
                'orderby'   => 'ID',
                'order'     => 'ASC',
            ]);

            $view->with(compact('menus', 'menus_2', 'current_url', 'service'));
        });
    }
}
