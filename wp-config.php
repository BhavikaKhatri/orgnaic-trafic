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
define( 'DB_NAME', 'organic_trafic' );

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
define( 'AUTH_KEY',         'XPGm=Xnj4s3gRxNk@5!0|/!UR# e*<*u*z|>yX!cnnadqB@`s1RKYfsr!l`hq6ZZ' );
define( 'SECURE_AUTH_KEY',  '+aj8o}.q-c#<)[.+Os<;3>) u8,4%$M=IQ!0VP)rLVA7kTXdn/v>maYt?iUsSu7`' );
define( 'LOGGED_IN_KEY',    'ij:PLinx#x)RQ{ua3$/+(-)o9-,B~5TsRq!@JmyaE7G(`aC-4eAA2LPIUKpUsqRR' );
define( 'NONCE_KEY',        '*Ynmm1Qm7q@D$vpUW}]ux|_96(C[m/&G:[r8 $poN)O!?{Jwi|DHy8y%7Y%[?pU4' );
define( 'AUTH_SALT',        '!`B5BFKnHO)k/+xu}%Ptzod-M{VI@#+lc=#D{a+C3Y$@hbt|92!2hR=;N##$t-Es' );
define( 'SECURE_AUTH_SALT', 'T*@&gZBWx@.S.6wx93TkqcJ7:lm_{n3>4#.c-s(d/3rw|[8uM(nAL*OVRw}*=%_P' );
define( 'LOGGED_IN_SALT',   '=49=9=2/>z,B#^(3c%*=8T>s<EV(p3z,ka$<YrQMf+I>;]i](>s^9EW_9UyXBPX$' );
define( 'NONCE_SALT',       ' 87NQ{kOg,%emz(8Yuo[i;{Y6>A+`b!k!/fx[K>*lTCoU6{{!}/AbGOw!W*`u#n^' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
