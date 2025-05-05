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
define( 'DB_NAME', 'local_introduction' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '1;D&Q6xfZ[}2VC@YWv:3Dcs~K+uyz9n(r8d0(<dOyb7A@-/R&Mn/hjoOO.=wo|WA' );
define( 'SECURE_AUTH_KEY',  'v?8w(Hk)KM}{GkfQ0.l4?^QT:)J~zoD9W!g8J!J3z:_4,|9&<Avqx+kavSQ46pae' );
define( 'LOGGED_IN_KEY',    '%NrR!/swWl/.Ltp$]k{vBy_w0A#@!h_0/T|q^~FpY|&sMkrtT.hd{eV+>msJ$&c<' );
define( 'NONCE_KEY',        'dq]`?w8k*}Iu0h8QI+h.b|BoBGzAe{2yo+u}|sbhT/v~r>~+wZR{e9yS(y=]B{ms' );
define( 'AUTH_SALT',        'R$<l{x]~tG%L[Wf_.DRlZ`;hl5BwA6QuEG>1n$TH](1BQ!i8g0Yi}3AruQk@p.Xc' );
define( 'SECURE_AUTH_SALT', 'EIqoBZ+?cJVXMPQ^!2;MChvb u/u/2Z$FewAO`]!)L$/Gifk?]>#ykt8=)PBlJ/x' );
define( 'LOGGED_IN_SALT',   'x9jR.-_x*Ob*^rOg]s4PdP t~M[|t3XTXL[z`JiB0bJ~[-q8@ AgeQ`Gy7tlq.u]' );
define( 'NONCE_SALT',       'B;{iAWf5BH:xE)j1^+e_IX~6LNmW,#]Hh`D-.6xz&oh+:Vmbz#~;z^AnaDS|o~@Y' );

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
