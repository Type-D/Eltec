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
define('DB_NAME', 'eltec');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Pgz429jrobCMEeO3lSJJqbtAVEZqsGjXZzXN8MmcM2viGrRMk1AknZLVDLTsyhAw');
define('SECURE_AUTH_KEY',  'RjZxAPNll166uAkEW4OMjCKXkWo8VjW7KFSIjwK03PkmzJnZDni4hlLJXWUoZKML');
define('LOGGED_IN_KEY',    'cFWN62CSCg3IaIpr9s5B83oHrhaS8bmHKGIlwmmt3OwUid3WquJ2PkAvo5C06YV0');
define('NONCE_KEY',        '5AnaCvvPAcaRG40tDL9dLtYY6CJkfqpmAYnaimvcGLn6KTVthTOjTtyQw0OJ3ELX');
define('AUTH_SALT',        'udY7xWC37KL3FwUvPTz4IzY76qLGqnc3zX0OFlkXmhRHIpDlR6Rcpv09xjtXeKUR');
define('SECURE_AUTH_SALT', 'tu7VxYk6MNICWMYd7dsNXPKrWu50ZoO4Ly2YKaF4l1EgU3TvOIl8a818VcYUhzxn');
define('LOGGED_IN_SALT',   'f95W87kYGwv2RyR5Ugbbg2LfN27p6DfN8KApLbgwHvHnIEGtulz1rDkT5lPKqaJB');
define('NONCE_SALT',       '2dg6z3zQYQQe9ruHWpR3qPKVarVWiDM94usbIZkgmOcha3SHfumSTINugkghkyAC');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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

define( 'WP_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
