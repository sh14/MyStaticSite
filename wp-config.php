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
define('AUTH_KEY',         '2Z/Vi5lDYdQpTn7yf4jo+ySofnJhEtxffq82GCsCHVvTy9wthXtYbHWpSFMZJ/9Y7H4Qlmx6PdARJnulWxL2fw==');
define('SECURE_AUTH_KEY',  'ZphZzdES0kE2Bv9wTXTdt/KgSXGm+9ZOMo9zPEsXlTEIZETLJuL9BWjly9OjQRznrGb0fTJ/RdLWn3Fl+v+ruQ==');
define('LOGGED_IN_KEY',    'qsE3GfC5DrbTbPhXuMohMJJ+OnKnJSRmv/BgZ/E64wWm3kZiu3RNXcGBql8k8RwEMyUuKPaIRDfsJtcmskJ9Bg==');
define('NONCE_KEY',        '8/JA8nINdSAf2zpcIhh5oV+ZDXBrjpuUrVB20eLnW54k1Lut9/cjnj2H6hx627WCV2RDJEfB6Nhad748SnIrvw==');
define('AUTH_SALT',        'cM3Cc+CnsadmPq9xeYmRktgjjIFtVV2csDGqCd23uli5r0QaNPfQq+RSJk+6xWDzXFxBRDELYSkAWH4NMXF8QQ==');
define('SECURE_AUTH_SALT', 'KY/2eG5Z44hL8ki+j1NcvnTqkaqT/fxqvSo8Uyxul+kD8JXVZHlJZrxLGRNJ9mLa/MdC77tkNsUj6CRWznXUoA==');
define('LOGGED_IN_SALT',   'f5HIgrwLeYz4jtvMGmeQQ4h6w9dF6Xkdjoy2Q1DpdrYkYypYcX0QjOo7Qce5afpRJ9I7exXJC7J5QbSHRZapsw==');
define('NONCE_SALT',       'f+X9ZhGjpzYKtjZ1eCnYQwJZ+u/HMlNyKvVAbla0J5BHRpu6UKdVSyTnXK9kTRwZ3Q4SW5uxLcRBL/D2yzHGCw==');

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
