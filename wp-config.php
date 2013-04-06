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
define('DB_NAME', 'wpapp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '12345');

/** MySQL hostname */
define('DB_HOST', 'workspace');

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
define('AUTH_KEY',         'XLnZ_V10H{^f3NUbnfB6k[>jWxt8Up![:6tDs{!cWz5>|f?PG@K{n^o+.lL_bcYa');
define('SECURE_AUTH_KEY',  '6Wub!y7Hl.-Y<AIFh=IVy)`#Lads4/voutCiD3#&zGxx9JT%!h?49-@;7/]?6_f<');
define('LOGGED_IN_KEY',    'Ix]IQ:80` |]^,R 6oe|>.m|T5yxrO^3 c6wHR?C*8w<^fj>Y]3TvKMd+9T]}_@y');
define('NONCE_KEY',        'OC;iprXf=iM=Vyp?7m&2<5Y6r57 mZm=-03?oE4OikJTTy(w[qMPfE.Z2!=>m<93');
define('AUTH_SALT',        'M/-(H]#rvTu8WOy{`/aU-s0T6_.!*1kX/qw{7EATzhhjq;ru,+`g)sULZOUl;cS[');
define('SECURE_AUTH_SALT', 'KA}O0&X5@u&dK#Ve)</2Mi9(m0L|O>!,K~ZP&WJ9bUNE1|6tXs^!ksMqUN~T-!R;');
define('LOGGED_IN_SALT',   '46IaF)i0,/mvmLS3kk`k+1c0LnBOI-r8|~@Ekp)N0W~LqECqTsC4xJ<*Q+?[wZd,');
define('NONCE_SALT',       't<rGYb^#fe 58R-M[1~SOkE42.e1Zu?AbR_&}IK~NF=7!.=;>m5]|5OE%6Ek;FYN');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
