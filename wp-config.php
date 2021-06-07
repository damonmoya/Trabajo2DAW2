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

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'bitnami_wordpress' );


/** MySQL database username */

define( 'DB_USER', 'bn_wordpress' );


/** MySQL database password */

define( 'DB_PASSWORD', '078f9dbc7457c8a438b4ed0ceb2aee86ab261d020969d2a497afde3026e84376' );


/** MySQL hostname */

define( 'DB_HOST', 'localhost:3306' );


/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


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

define( 'AUTH_KEY',         'HM&[a*er>f(KCkQIqjZoG$A,)5]~GZ!lBC9LoJ]9KpnpSFC](r6]&gvp`OM=tm0e' );

define( 'SECURE_AUTH_KEY',  'l&8oYF}El _p/|fL1R i,C,XWXM?)9{EyxD;;ym=vZ,8I=@43i?1~xzKHTU1D,j2' );

define( 'LOGGED_IN_KEY',    'YW)HV`0EzTo$ydqx4WM7y?%mgm67fm74QOx_;kyc;ESIfX[#Kg>!rhYnTQP1q**H' );

define( 'NONCE_KEY',        'b+7W(cY>qAD1<wJ*_*llm)N^yjrP]AU/n(w]);m,L(q_/Ozc?Dn`hpyX_pS]+yp:' );

define( 'AUTH_SALT',        'QDaE>&#W]0<3u`W@#8&14:~Kx_WR#O[!-vYD,NVj!B:&FLr(YIqj3rs_y_c78cyn' );

define( 'SECURE_AUTH_SALT', '.,V{rn3%dwq6LJEay0H.Q4X*=jEopKTx~-`iDVpNZ[<Iwp?9i8=eyL?:vIj#nwr(' );

define( 'LOGGED_IN_SALT',   'D*`X&n7J%:z+>_P{/BtA%9yS&3Ia@!&4h3phc>~,)C*$(vQ!`>@-=,2rP;N6_C^|' );

define( 'NONCE_SALT',       '1nke(,68x@RsaJ^voD!5^ej,i?S=091FOls><}U?%Ai2?K]%ot(&8vWBx,#=n!Es' );


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

 * visit the documentation.

 *

 * @link https://wordpress.org/support/article/debugging-in-wordpress/

 */

define( 'WP_DEBUG', false );


define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
