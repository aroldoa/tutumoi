<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tutumoi');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'g:cPwRX+|#19!ZCK>.QYEGY<KLNL-/7?nLrAL,88Q4[fj.ash3d7@/s)-!x&#OR3');
define('SECURE_AUTH_KEY',  'sA)+/kYK%-E]|XW-PO-E[ $aYNrkXW>VY2b{v_:E hd9if}Y|e%~]HK`j?w-s<dk');
define('LOGGED_IN_KEY',    'OvSaG]V;evI9DI^=]+3Fi2281<c9q6yHrV5x89TPyAb9RyO(+;;[faXUjX#W.VP)');
define('NONCE_KEY',        'd1G(>|4BKE%U_v-C`WW |n-+I$t{b}7w1*_(p?o`}w,8|>3iM3nfu7D!7<WS?Io|');
define('AUTH_SALT',        '(%,hN+8V-K-DSD-]F|VV+99JIR}1q|e,y-Vkc8Sl:B8/5/g2mc[(Q[rP%=l8Z+F%');
define('SECURE_AUTH_SALT', 'VL]ITf<EV6[YwUgI[/wNUo1.UIpyJ%)r-(d+$GZnYc^Gv2Hjb2?7{I%*]2#Aa-c3');
define('LOGGED_IN_SALT',   'iq3<IFR-|m9`AEZbIpTz)4Fr>Dd1hAQ{0>#YG@l[}KCj_n2MHi.0;rsT|l ;j(0P');
define('NONCE_SALT',       ' qD|dfXUQw@}oU%{ldCQ1GJ&V>+fm-./+Rj3yDxRk^pcxB5r}fG5+%|&F]LeVgD6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
