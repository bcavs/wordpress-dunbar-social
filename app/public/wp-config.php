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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'lMr5iv8THSPZRG8WWjW+4q6dLGan1kI+wYPIPy4E+C+MvMYtQyzQSFAhTEy9LvXqANvF5jT2Gj8LjI83LRnd3Q==');
define('SECURE_AUTH_KEY',  '7iIuD6tMw9DURW+4I4Uotlo5pr1dxIEJyfXh5Q6jG0d+rL+2uENSwAo8zH2GqEYcruC0tVUlvph1/reA3OBRAw==');
define('LOGGED_IN_KEY',    '+xXvHlCe/a5uFGsAHtY2Bqu3L+T6gVRDbmX21EHb7JWdXTadin2sPWwWqI5KB2xL8E66awgFnVVZyvG2fj5Mdg==');
define('NONCE_KEY',        'AJhuqymglOYV+BGFNstuqxAVEEKtd3u0sxfk4VjQoR4wrRCy0ihij6TC4bOs1ragXKsW1UuFR2noYXlOw1vVGQ==');
define('AUTH_SALT',        '3QvMw0YhsaEHAl6nVdkvvKR9sd2BDCqB2M1+tHA5vDOQhEiA8LijnX9vr8wPDT9I6uBKp0LbOk5/hNSCL93zzg==');
define('SECURE_AUTH_SALT', 'pGSkj0wdphCOmmvYgtLPQGxwr/nH6UmPRRC6afjATnaVHei++AJEz1V6mhrDOnqwjJ0kWMOsWINPkr5nZBAvTQ==');
define('LOGGED_IN_SALT',   'TpBG9re6W4colUyVf3vrueIIA2xnX/8i+yb7geKfQhrLEnffaK+POQJ33RblLgUtVYQPsX4r7rHnesC2wKO+0A==');
define('NONCE_SALT',       'VfWTOG6laQVXAOunL1vid6tXBPwbpcEU0O7AA7Degxuae4pjadJYGMD2Sjj3t/vzO8BO4DXLklhkmNs+5f350w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
