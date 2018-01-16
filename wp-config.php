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
define('DB_NAME', 'allegiant');

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
define('AUTH_KEY',         '/R:T]kSn994mcHX3+!*z3}7H&y(?d+X2NmAR@:a;*5o<x},cdf(0COrS%d3LW?Bv');
define('SECURE_AUTH_KEY',  'ZdnYQUq7k^nTE#!M9xVlJxAT(X^9.{dnBFl9)E)<pUO^b[a6kY-3@uATl=k**$~o');
define('LOGGED_IN_KEY',    'q-NhD<|v&<#-5v1~_I1Mew;zU2hSQCfTQx=_`L# V8`upIBf:8%:{2/^dBHnp25l');
define('NONCE_KEY',        ':5s2?2,=HCTHq!x_]<o*vb4a/+NVj[$,Q&=RDtOKauDGTUaT.xqyqS-GBBs4%h`}');
define('AUTH_SALT',        'b6>*Vf<LxBT}(PY`dA0%5;QPJD)aKXt&fhuNib#^!iA_3cNT%Wr[B!i~% aSdB=7');
define('SECURE_AUTH_SALT', '2-Gy],o5:GV(ZVssh2 YVOw`o,UoB9wJt#nl}x<59O>L_7L=CXi3ebLYmc15u@!B');
define('LOGGED_IN_SALT',   'd8^t~nXzKzVXA^lYku+.HzI;c~2Vu[cKJu_jX kCg3$oX,!mL&Ev9@KEDMDbW1:R');
define('NONCE_SALT',       'Z$ tlGeH@mu&K[BrCCqjpE~0li9Bu[5kP71Ds!sjV_h{n>sBinnEc/&4Gan2QqQv');

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
