<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'emp_db' );

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
define( 'AUTH_KEY',         'Akie*3h8Ck<{tkiuSm~1ZBuy{Qh!,*Y]5}JT3J30gh?r;)*bsZ8zjtwn[~2o8h2H' );
define( 'SECURE_AUTH_KEY',  'lc;5~ztr9bVfIwS#WYW.bA1cb6M$<Q_1U8^m~}yN2-jt[X-t-&#d_<)k!0enwpNI' );
define( 'LOGGED_IN_KEY',    '>/xXo5|b*zDj)|otlD[[o(aErpLe[RA[PbNqf67`.Uq/7=n yG_nx#s<m;3;b!R_' );
define( 'NONCE_KEY',        'Jw_R2|2#42)@G9:;.|(D]Z8nzY^&[v}v~>&3Wm<,vRNE?n1ViJ$`rs-XaO/sFOjL' );
define( 'AUTH_SALT',        '%M>JY!K_d~UeZgF,%tAE*{PASeY<2S@Gu2IC{[+tj#_{wwop[V&<b1l652k:+wdo' );
define( 'SECURE_AUTH_SALT', 'T~N(vf8$|YP7k$1L1q7mJ&+Jsxro9S7pi)D|Qgw6AoufrnYf^I0>ks|_LR@57Ihj' );
define( 'LOGGED_IN_SALT',   'rz)jcKw}r)[3Uy.~8iR?K~Gt~HYWHp`BE5[1Iz0){Ww!OpJ?l>LeBIDO)|)Um=S:' );
define( 'NONCE_SALT',       ':I#`Yu{}]n_eh_PG}+>ZAFHd 7-cQ;:g_ixpkt3[$KQ_<ZK!L&G%kRY{?MQfhVj^' );

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
