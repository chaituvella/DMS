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
define('DB_NAME', 'kautilya');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         's3cz;F:*9Km{_?=nN^8/]]qJpm>wtQ*r]}@~?:II<z0d]NzmOI8]vbe@ea7Yi5+9');
define('SECURE_AUTH_KEY',  'd|WGcA(tj-7o#!UUd5#KH2+[D.IT{,Mw}0G1x1p6([ OJR%er>$vep`|G{-<=MNz');
define('LOGGED_IN_KEY',    'f])YPU]^IvGMyg}/5|vjPUBU$UE4@+BzTxj} e=|4Rs|jONa?!BXq7PHT0~k5]f;');
define('NONCE_KEY',        'wvN1Mugews-VF91el%H|6 /5Qp7J.[2plH]jIfFa@lg*NW#4]?:<RwIu5/,qhgT7');
define('AUTH_SALT',        '_D5/u?Zg>_8Uj&k>VcMC*|u?#&IFb>).$nXW n_LdT; i.*zI654@!$2w363s^@w');
define('SECURE_AUTH_SALT', '`,jIfWYm%xnI[Rc~}ARO|q#JG|Z, Umy;:G|JHxOM`}f vlonEfJ;V6lc)_8#@+U');
define('LOGGED_IN_SALT',   '^<x(<fSvS9){8Aq@f=~]mgwvtdB@?tHK,}NkoF@E+-0{/|n)ekA}^vjOn0ZU{kQm');
define('NONCE_SALT',       '<XnP,!r/>$Lwm)B@__?5ph+Px2HJAaXUB-IsK8:|gD@T,V^x*~J)S|(#i].anMrF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'kautilya_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
