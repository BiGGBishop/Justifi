<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'developing-eCommerce-plugin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ', &EE$&osX5+d-_[jHb^6z+cPR;[NKf1^]=b!5~Y:g{1b7#0OQxJp&o ?r_`~zd~' );
define( 'SECURE_AUTH_KEY',  'W4o,AmR!en%26VJhIolQNXxPW2b<na=_LhA9db0*O8004a[~l%%}jOoa]t_7)w0)' );
define( 'LOGGED_IN_KEY',    'QlRmwjH$*z-&Y PxY7[>e(xccHh<At*La^il-?.wNYvSVGkX9Py,cc/QFnM&@g5P' );
define( 'NONCE_KEY',        '&ZG{kA}M|/>sbGEke9Lkt_;arUco;nn0)NqiF;qGmZdj2B^<%BoFIOjk1xLQp6S@' );
define( 'AUTH_SALT',        '/oT0LMcuniw2$K2NY^mewyXi#q>HVpqt:]]~-_Akn Zujb? !vk>q`{Uzz(DZ{*]' );
define( 'SECURE_AUTH_SALT', 'um^!LH{:rZu`}EM~>2hYj3a$Yi)GU01tQ@m~ZX4|.tHV<*`g#r1^@hX0*AI70J4W' );
define( 'LOGGED_IN_SALT',   '$u=3sFDV+zw^=r2/K2 id)[HMKrWaE6VwFNNhL3s2*m=Ge/~$m1;J<BKfaADb6^h' );
define( 'NONCE_SALT',       ':lxrj3A?KlS#o.7GxxI%Cm1iFE?[eek`l6`bd.whrEV7~@3)_)Y$,Gv,F>,Sv=9k' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
