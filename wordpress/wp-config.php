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
define('DB_NAME', 'connectbx_blog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '[c7!eV!|`/n:79:zCjX[ko<#pY}w>l8; [@{ z<|:jVDC>=q{0zPe&:;zoPr@(6B');
define('SECURE_AUTH_KEY',  '>)Ci%tLa#kR!H>h]~UH=^x4c6P;dE[[:%F+A+iEUu!IdEm|^o_K}tf+Meu?DrTNG');
define('LOGGED_IN_KEY',    '`d4%+6SxWo!r v1zLnN#N#V+EF6|6=P]/^@UPL5iCN5~jf[IN`hBfPvym0I+JZq~');
define('NONCE_KEY',        '}-~7~wv8Uhl4Nf.j0J-|7$w|*^w0DldS`5&@7U.-u*e6a=PK.wC ~Dtvl<e((bLJ');
define('AUTH_SALT',        'f+<<y|b16<aeyF^J7sd5uiQbk;g~+qS^Xuu*{BuZI Fqs#NGO(}S8zRk3w:i]w>t');
define('SECURE_AUTH_SALT', 'i{=AdIZpY{9QrFKLP:Zua^xb-6U};Ocr+RwD#WJ*j9Bd8y^r1}~l18|NLgmSk6s.');
define('LOGGED_IN_SALT',   'FuUU*IRWRfLjE[Fag[}o^ua<Sf_?yVYcd:D>arIJI.X?<FNUyK(){TVM92&lxo? ');
define('NONCE_SALT',       ':l=#Vq/)_X#t}Y$2^FG;P>JM)o>B&`b}Ev3}F W]`Kf]kJw-J/vq/ M0D]x4|#*<');

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

