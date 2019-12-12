<?php

define('FS_METHOD', 'direct');

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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db797529088' );

/** MySQL database username */
define( 'DB_USER', 'dbo797529088' );

/** MySQL database password */
define( 'DB_PASSWORD', 'TxzAvjMjszizEWIeMyzp' );

/** MySQL hostname */
define( 'DB_HOST', 'db797529088.hosting-data.io' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'F{x;f`Lc=6!rY22o}qYNF<0R}Z^E_:1|WE#5[sspoT5X4)-f2jjYKoD9W[YaaieY' );
define( 'SECURE_AUTH_KEY',   'Z3tcx6V|4MEBrP<RLy5&Ke;(y1kv;5E.yD~uN4S.6Rur3)inZQ?3UU#VZ_P_A{1=' );
define( 'LOGGED_IN_KEY',     '0`ObTiZbgl%D[HpU] pNPxC)~::jG,a!XJxm%2Z:y2SL8(D`tOaE h@mY7]m=la.' );
define( 'NONCE_KEY',         'l^BHw]HR,{v[/ cpQ~,(n1|e7b)&IFjBa0|8MkOT.,fZ4@ee76xi[1ay#Ot:(n.:' );
define( 'AUTH_SALT',         'k))8!MRmkP9;Ow@=(U?XxdyTmSzHjV/imC$Wn`$(H9Hb?TdmSiMP-4-zhrIsj<P9' );
define( 'SECURE_AUTH_SALT',  'O-jHK[e0*M!4V:Y0QT/DNe+_[T0;lfV}k8(+o;D]Wgfyb79]{URF_E.e0c_4d6BY' );
define( 'LOGGED_IN_SALT',    '1C=dnWRar*;XJr>|G28M&8;_,Av[3RFvhX:71jrvMEDMp)H#X0#~&pH;,}]A+Kaw' );
define( 'NONCE_SALT',        'a22OqS}TQ~83i%t6<lQ{ej2+e,]UX4 hXEXH^K{?)w1TL4bdn2;aw`47DLO~/yp^' );
define( 'WP_CACHE_KEY_SALT', '.Ie!}@Xy,K8(+!yIY:j?H]P0`st(/3RycsKszB&>]xn/E8[{KrLa).!~TF-i<1?8' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'TILwv';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
