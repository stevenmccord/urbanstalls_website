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
include 'confs/db.php';

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uFz7c6_:db{co-y%+g,R?|An]yE~cvKi5wtBVHH P#F$O.HP-3B&|Q?KqDyy=8Ko');
define('SECURE_AUTH_KEY',  'ZuhX`D#tvqA$[}i.fU6+|B2s#1nLEn0(%SjMdJ<| ZSG}:K|+rToi};Og:pgo|/D');
define('LOGGED_IN_KEY',    '3EAUQ R@m|2lkf.+e^u8ysKABk[U0vz9GJLR._}FEvH2j=#U?Hlz=S4v+ul5j_l#');
define('NONCE_KEY',        'Y>kh({9OqYB{{UL2(|Grxjes;}R5#cU{q|t~rqS9skSnOf_FaouS*c{d!4u `K/o');
define('AUTH_SALT',        'bK}(L+na3h]s!G|Q8]k4-}#C+(|&!aBFb_O}m|CfqZ!M!H^{12taOaYu*~yh}pGq');
define('SECURE_AUTH_SALT', ':Hr5|I*q6.Enx5SUd.~:`}{z^Wx-Pl 67N)WS4+:`~B>bd21$`<vh|dwd|=wad5J');
define('LOGGED_IN_SALT',   'c<v[Cn3cHGvuS@v93^|!VA1iV(^M57;.ykprgg(l*~|2|AtKrJ:kV4qh+eXBv+_S');
define('NONCE_SALT',       'tHMy3~Aa+(zhH8OoHzd(;MF!k&5-@uc{5KRNVQlU|q0`S6X+Ix<wHp|6,Fz9].gD');

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
