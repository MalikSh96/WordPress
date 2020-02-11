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
define( 'DB_NAME', 'learningWordPress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Ir*08xjx,dTI3m)>~*6ol99uJ>&{Lz*|Y:%dGS;nI[m@=,R-Nd.=wgv2MP3,2o9a' );
define( 'SECURE_AUTH_KEY',  'Om8C]zeIwGP:!f2I<jwnMu6qrW_S^8~!h2&n_wL+IeDeNgsJU2&e.maDPu>@#nZP' );
define( 'LOGGED_IN_KEY',    '1KO!Lh~RbZC-#oE=sJJdGFo0S/F%-b@n`h$@`jzkj4w|cx$zKX~lgU<`J8bxAH@=' );
define( 'NONCE_KEY',        '_MD/79+WgYZ:AU#-,TWzp-r6ev;WjUvN%bsnfR0NFcNUP7Rgz}-&nn-m2IKs3MGR' );
define( 'AUTH_SALT',        ')fW>|s9~&dNLJEW){xbsdKkeZ3H.XWI[wk|zv~Ej8T4R+;MsDM]@HM$ugL`A_G}^' );
define( 'SECURE_AUTH_SALT', '_LpZLhJ+8L3mXzg#Ib*@d{88(wgd1;RE5feHKjRxXtsCd2-C%Cd<Oqg)gcA2cFxH' );
define( 'LOGGED_IN_SALT',   'GH7Xy{n:YWTfnDq+~(IU~(erS}l~6*kiLi{;TM.nd.p)WGgd9A8FvL&3kbQN}Mx6' );
define( 'NONCE_SALT',       'rHR>*V:v{=+Ed7^2&U=uQA&OmfUj%zhEa8o:q^QZ.qk!sj{,Wo1AqZB!tN5n=$RU' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
