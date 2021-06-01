<?php

/*
|--------------------------------------------------------------------------
| Notes - README
|--------------------------------------------------------------------------
|
| You can add as many WordPress constants as you want here. Just make sure
| to add them at the end of the file or at least after the "WordPress
| authentication keys and salts" section.
|
*/

/*
|--------------------------------------------------------------------------
| WordPress authentication keys and salts
|--------------------------------------------------------------------------
|
| @link https://api.wordpress.org/secret-key/1.1/salt/
|
*/
define('AUTH_KEY',         '8P)/Z|sfYDpc$W<| =O,7k]6T-(K5qOM+CBo1Yf8sN[Kg[^B(INKk-p2+M~h&`)j');
define('SECURE_AUTH_KEY',  '(1%7AYNy7:6X OJ{A|Z[*Lcj^.J(?|G==b4[prf##!)I0/4-txKpqK+OA^HK/|(?');
define('LOGGED_IN_KEY',    'g/C+N1S%@EkxuEiSKz_hNv1Nn V,@4I,XvjUqQr-^uAX]%J/FKi97SIOyct8T?-o');
define('NONCE_KEY',        'vfMze&fvycy]~}!lb<iu}!cfPiIY|U>g;=#.BvbI@lmlY(CsuObq$ar.K[u9mg+P');
define('AUTH_SALT',        '$PQc`r[JWvzf_*-:sw7|n?je0Z!=uG(f$VKx{+!=a1`M3Se(F[q$-}DfLM=@j+|k');
define('SECURE_AUTH_SALT', 'exYRTw&;/Q-1#*-9-<-bFrY{0s/8{|-ag`n+Zs-hpK>@X0@~R-!tVBQsE25U@w(W');
define('LOGGED_IN_SALT',   ']-Nhkc[]+v@6|2)x3M-ka3(|pgx6jDX<O$6eu2kQ?zni6-p2NJs_*:ZC6NlK:fV-');
define('NONCE_SALT',       'V9d|nUJC*[dX__ln,KvTz*tpc|%]Mv11dAl>R+EV4)%Odoc1q|+~7|^ ?~buk||`');

/*
|--------------------------------------------------------------------------
| WordPress database
|--------------------------------------------------------------------------
*/
define('DB_NAME', config('database.connections.mysql.database'));
define('DB_USER', config('database.connections.mysql.username'));
define('DB_PASSWORD', config('database.connections.mysql.password'));
define('DB_HOST', config('database.connections.mysql.host'));
define('DB_CHARSET', config('database.connections.mysql.charset'));
define('DB_COLLATE', config('database.connections.mysql.collation'));

/*
|--------------------------------------------------------------------------
| WordPress URLs
|--------------------------------------------------------------------------
*/
define('WP_HOME', config('app.url'));
define('WP_SITEURL', config('app.wp.url'));
define('WP_CONTENT_URL', WP_HOME.'/'.CONTENT_DIR);

/*
|--------------------------------------------------------------------------
| WordPress debug
|--------------------------------------------------------------------------
*/
define('SAVEQUERIES', config('app.debug'));
define('WP_DEBUG', config('app.debug'));
define('WP_DEBUG_DISPLAY', config('app.debug'));
define('SCRIPT_DEBUG', config('app.debug'));

/*
|--------------------------------------------------------------------------
| WordPress auto-update
|--------------------------------------------------------------------------
*/
define('WP_AUTO_UPDATE_CORE', false);

/*
|--------------------------------------------------------------------------
| WordPress file editor
|--------------------------------------------------------------------------
*/
define('DISALLOW_FILE_EDIT', true);

/*
|--------------------------------------------------------------------------
| WordPress default theme
|--------------------------------------------------------------------------
*/
define('WP_DEFAULT_THEME', 'goldsmith-mortgages');

/*
|--------------------------------------------------------------------------
| Application Text Domain
|--------------------------------------------------------------------------
*/
define('APP_TD', env('APP_TD', 'themosis'));

/*
|--------------------------------------------------------------------------
| JetPack
|--------------------------------------------------------------------------
*/
define('JETPACK_DEV_DEBUG', config('app.debug'));
