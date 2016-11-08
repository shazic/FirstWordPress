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
define('DB_NAME', 'firstwordpressdb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uaKeV84XAy1rs T^q20k|v9ob&biU{:n]!7eR;ZUq&gNl^Y;9ymn|q*>?AF:H(tm');
define('SECURE_AUTH_KEY',  'Tx8e01|LuP.M=bqHMk>I$s7qQU%W/%9~dV,q6zr&ux3@X_a%NV[eHz&l9[jCwy%S');
define('LOGGED_IN_KEY',    '*2cY0gXJmat?8,i6AWp<`?[N)m,uT%r%}SDmwz1Sd$pFf<7BS].M6]^vE:]1N26}');
define('NONCE_KEY',        '-Z:|[5#c7xY_[H>~X:bWrb@GE!&yK[sYl:d|:n>?`tNQac5wD<^$jUd&&6#kVB-T');
define('AUTH_SALT',        'EsC392UXM,uJZ&2WE0rL2S71,>58i(3;`9n|:;D]rm!LEnF[UR?,0mK//;/oL=i2');
define('SECURE_AUTH_SALT', 'W8.S5r uN4m7vx*8^3&Q-hMUTecv`0QNo>SM`Jp4{y#Qkdv,l_4-8Y$@n)BSq>*=');
define('LOGGED_IN_SALT',   'U/drleVzF{FVPDu)B0uZ>N3WdUQylT@HK/Z4TdW:=HSNF~]~Kh3AgSnD~CG1k;O,');
define('NONCE_SALT',       'wAZYUnFUm,9B%IeS9/(;H^&MQ;+9cF5uWr?,Ou~)x6h[ZfLiRZty(47ftes8}A0O');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
