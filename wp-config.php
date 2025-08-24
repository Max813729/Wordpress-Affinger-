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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '&a>3%%8kt,X7B#|*mSE;3KzU{5wLI51F~&]aeZl?CNy:L$t6ZMg3[0=!6goB+G6y' );
define( 'SECURE_AUTH_KEY',  'qaAC6B/^@7P8QbcCBOknWIAedi`rgn+@p%4m}nW?F dj@z|702t?2yx-Fc%je>Hm' );
define( 'LOGGED_IN_KEY',    'P-C!c_|W,:l3k$OwRYvJkw%yYZ>t4S{yGK6)mEDMc,HGGClX,}Q6TW:SDkjViH&(' );
define( 'NONCE_KEY',        'N <}C&;frI[4nD#t9<njyD0nTj L,*Zl,w))U!TtJC`~Ryx;:vTsHSjW}<gB1@2.' );
define( 'AUTH_SALT',        't-r}RNqOi|}){wI4Qg#?W?wm,KsR`0nmS8R:t=R&L2u]GxGxag.O@AB/s*V$+i_z' );
define( 'SECURE_AUTH_SALT', '7F6F!sM{D9MV[B~;PhQLo=n,xdqy=6ef]X<JSg 1LKN9d&2d$CAS(%1oxpMUm+B{' );
define( 'LOGGED_IN_SALT',   'aL3-{}|tX,SP>;a]MKclq<hcA)>uOI#zr|~!k(E}}nWMdTjgUp)%jP_Au145d;r?' );
define( 'NONCE_SALT',       '?nWhj)}A?%q:=hfqTbf4@?`n?Q])0cucC862%~hx([=`fa-PaNJ<d~hJ.0cE-TDk' );

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
