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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Cocojoy' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'IbyLhgnViqRsDSOr0I5Dauzt8Ts8YkhiUoP4JncWWx61klpDxtHd3X1doC1RQ5WN' );
define( 'SECURE_AUTH_KEY',  'OeFU0cTd5Lcanl6rpFO2XVrja8RvWDtnsDncKJZ7zIsoQFsxrC2MgwEDIbQJWADT' );
define( 'LOGGED_IN_KEY',    'uvl9QIsMazq96XijOjmCQ2F34z8m2iZ3DziDDRhGbf5lW48U0JUaEmmrP8Dk8IiO' );
define( 'NONCE_KEY',        'j6nE9PnatZeuTssG1B8GkBfaByuxUMbBss196LlKMeMBHuiKCeosGDPFWMT63Jvg' );
define( 'AUTH_SALT',        'hP9wpbxC4H1Oy4NbtVEBxxLAZeMC4hHNlLKdwmnqpY5HyLQbMY89gKJEhBfNomFQ' );
define( 'SECURE_AUTH_SALT', 'I11rFekeqgF5KVC3Glt5WB8QSXLn1OfRrly3S3iU56bmEvxp1szVxhXYiUUm3PBR' );
define( 'LOGGED_IN_SALT',   '3wiPBOGcIcs0PWWimbcxP3CR8fzoF1bDwB6lC9YvX6dA6BPFt7GpGbySS1yCQP7F' );
define( 'NONCE_SALT',       'LafosG5IzFEMYNSLDg1kyYgPvcAmHmIejyIOyhD5Dp2oVepZ9eYt0ZYn7dNiFNwk' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
