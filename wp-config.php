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
define('DB_NAME', 'chris');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'rutusha@123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'Uv;)&FRW.UloD@S3~4oOk-<^d$</oB{!k|XJ7HHAMwB2p9#C&E0OJr5ZH M.>pHi');
define('SECURE_AUTH_KEY', ']Y_Wlf<Y/Y>+xik2t)ABP6DddaY)sjSG_jcaqmunnG7|}6E}8PQA96O+IO,1#/51');
define('LOGGED_IN_KEY', 'EoD[NAb!8nT~Ju_bC#,c_>5w/r5 QMoZP+Yyc7{-G9-31&NyAa7SD3yg.H)O$#Z8');
define('NONCE_KEY', ',lN*4$=qWvXi89F7-6557R:5^E3leBEZdtg1ijZRnadD5cJ&*peSdj}-V}cRp9;m');
define('AUTH_SALT', 'K,nN8Q8AYD&Y9MN,e*2BOX(0(pK>K@;qsx2F:1.R1rO?gyEcF{WO&QOx$NfRp}t[');
define('SECURE_AUTH_SALT', '`B<c-G@9)2eNBL.JyoP8%O)o$+L|;ufm]h3W]qqsvdvgCQ?ur#X&MS=,<|X16`Mz');
define('LOGGED_IN_SALT', ',xmkx$W(ptNbDP.eU--,y{8bdXRjR!DKMj[n/mZN}k%bH7a_<yd:VLA^B+!O<UI3');
define('NONCE_SALT', 'Sj4lT}`bE-_- {x]f8&@B$Z*Wk#uUAPD<C<TkX.aW/&GMVcqv]$w(![[Ni2np>$*');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
