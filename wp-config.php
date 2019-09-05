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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'theme_cus' );

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
define( 'AUTH_KEY',         ';V%[ X6DCseKTLRnyeE<mn4jH*lwx_0P[V_j6Xni}dpscTSeEV|m?U{uBd+dc.a&' );
define( 'SECURE_AUTH_KEY',  '|^id~5VnTf3hAqz_BysiqX^Q6u~Vkt.6&pz+zK]qa]iI!{jl#5z#.GqK@&5yH|~.' );
define( 'LOGGED_IN_KEY',    'M7Er#t>TT_J_l+S|zVTcGp9J_4wI]AEq?SEAuL#=,;X*Mb1kNT {)Y}MdWH13O&!' );
define( 'NONCE_KEY',        'WRj,F#c;<Lh|9jF+fpYZGrB;69%p2Rl(G$nQ9bSA,?-Yo97p`1zKG9/vzM3Y&Emc' );
define( 'AUTH_SALT',        'nscmGmIjTxezcn}uX[fh?p_~C6f7q,`#DiGJ]}+9YJ|t/(6z;=An470hmu7xS(gt' );
define( 'SECURE_AUTH_SALT', 'OLw7eNfLga0<S?1v!)RMB&iHRm[A/4UT_j%Z.1<0{K2}eJVZ;A33.M;q=Q]xWDE-' );
define( 'LOGGED_IN_SALT',   '<ny%NAn-gxm4*]JyM19u~Az^}2Uz0=Q r*lB4fbF+r]90Htw]}fKhQWn|ifa?<QG' );
define( 'NONCE_SALT',       'Y]-EPHH<rI.T[+a~kJYC%l,BB(z``zpy${?@czB)cNVQskQ80i=3Eg]f@rVad$b5' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_theme_cus_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
