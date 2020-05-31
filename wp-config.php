<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'medical' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Gpe?Prshy0B[1*c6GUHneTlHY~1D^aZ[kg NRCyEe IlqR(gBM(v_m B}}@q0.F7' );
define( 'SECURE_AUTH_KEY',  'acd(H_ZI;q=*c~6G*LvnH ?2$;&qy]d nK~L!8Q+mo!$|g2 JfNB%G XiuE3h=O7' );
define( 'LOGGED_IN_KEY',    'T(Pm<[mkEjFt&_up>^.g*K7]kB@@`E{zbl;.K#<x[#2q&8ZL>BX)wigwopM29_H1' );
define( 'NONCE_KEY',        'b2`,E(X/$-Dg9E.bM4wd=U0k][hdv?15<V dhtx2ZJwrm6w%@<e)U+T!f;FAM/CT' );
define( 'AUTH_SALT',        'cx` ^;a#30qJJX0WFJ}rjt]84;w/H`9[<QTZ}`k/fjFfU)]S|9Ux4y2?tiks a*>' );
define( 'SECURE_AUTH_SALT', '&o0.`9UHU?,p4Ejp|wFY]V{9LL0`r-AEq0:#K6Q1erbyi#.5KW8]/G+v-~Ij][Vk' );
define( 'LOGGED_IN_SALT',   'xlVq%&<%g2^@2N8%U*o^+G=2Ad,BtxWu_YF[XrQBH|H|Hw(^R0%txmPbQoVQo`EQ' );
define( 'NONCE_SALT',       'p6eee|l$sTAHZ0/vOO3Ac.]USE66M&.Iz +cJTXl]A`EcQ3Dk1B>73 xOQNYQc+w' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
