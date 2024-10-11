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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sanbongmc' );

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
define( 'AUTH_KEY',         '*ewt+5[G6YVF^<<YJ/A#4&?}Vx/G0xEu@#ZEgL7#}MoXV*!th0y%o9~|AbH4C4Ci' );
define( 'SECURE_AUTH_KEY',  'x+FVF1rq;,iTN6x+/~xA_@Kr>I[|UOqHCDxl=dF]IZ3;3uu~)g*7+ML&L(GNj_#d' );
define( 'LOGGED_IN_KEY',    'aOt3aXi568|A3~M9aafAva0lE(hqA7)ix,FzC|-@%^{<v4AE%NP+)W?Q:6Cn1>>u' );
define( 'NONCE_KEY',        'lL{+F?Q<VlJjR+Vfy&@An04Ug#piP/[/(npglkp#o|T3{nxFvu2 #)Ml!vjOmL5(' );
define( 'AUTH_SALT',        'C.TM;qGkMbb7PN@4?*U?$Xb>APvdHZ>hJ/g2Rxek>bmGxOyoX$`VWbx;NQ6(URmW' );
define( 'SECURE_AUTH_SALT', '+h)DP01aTQT`S@/oF!-[6,hMFoKwhgqK=$M8`8@tVI NaEhTMc:8ev)[^/< 83LU' );
define( 'LOGGED_IN_SALT',   'qNAUM_POZ^jY}EhE/IFdq7IWp^[7?d~HoaLf<Xj-}uNgFudl%SHHN@18BiBvoH|3' );
define( 'NONCE_SALT',       'm>0ak-(*8L0G$|l0:Pn{Z8Oi#>t*KD;B^B[y9DS~If_3]f^Y|xj*b,c|;?bV`Z/s' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
