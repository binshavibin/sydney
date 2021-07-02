<?php
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
define( 'DB_NAME', 'sydney' );

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
define( 'AUTH_KEY',         'odU(fd}h`=xJAX_+s7VDr/6v8~dMk#,F3-.QR}4_:vlt?>3 mziyx8UoUhVzzEu*' );
define( 'SECURE_AUTH_KEY',  '^yv_:B=z/d8K6{aY$MUiKjOL{gc]&aQ!p`}T9ycz9QF)KV&zp`r%n/]%rcBNP%{&' );
define( 'LOGGED_IN_KEY',    '&ogObSWp9Pl$epL]9OJYrb+>T=Rq}_W bsZ$=^f,Z?1Y~Y;j3#(K|cT!g1PEjwN#' );
define( 'NONCE_KEY',        'd!Kat%{!c<}.2iUc#Uk~5 #Zy1@VgOI+/`mJ_OK#GaKzyKp6+M GA`>ppq*>JM/Q' );
define( 'AUTH_SALT',        'jt-)L$#T`|]3?Ie(L !xx~F%6;|d.t qaa(tHPeo)4THU$;ZOyi|_[KTl0^ywxu)' );
define( 'SECURE_AUTH_SALT', '{W] r.?C$0vh+VA7,jN`y:af#N:M:Jk,6!bXUW3s>o@*hCqgvKH[,3W:F]oxc=>P' );
define( 'LOGGED_IN_SALT',   'O!Wh&g}o{.-`Lw>tE[-nv|t ?!6oC`g4j[Fu{7-SYPDbB1 M6-5@iAvUbF44*J-Y' );
define( 'NONCE_SALT',       '-mQ0h-8c%?xM}8y*k>0/Hk4dS>cP[`N/|9%bv(h;x2E-V2h/y$Wr!nnj<[oa,~6:' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sd_';

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
