<?php
/*
 * Plugin Name:       JTM-plugin
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Jit Mandal
 * Text Domain:       jtm-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Plugin Constants
|--------------------------------------------------------------------------
*/

if ( ! defined( 'JTM_PLUGIN_VERSION' ) ) {
	define( 'JTM_PLUGIN_VERSION', '1.0.0' );
}

if ( ! defined( 'JTM_PLUGIN_DIR_PATH' ) ) {
	define( 'JTM_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'JTM_PLUGIN_DIR_URL' ) ) {
	define( 'JTM_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'JTM_PLUGIN_DB_VERSION' ) ) {
	define( 'JITM_PLUGIN_DB_VERSION', '1.0.0' );
}


/*
|--------------------------------------------------------------------------
| Includes
|--------------------------------------------------------------------------
*/

require_once JTM_PLUGIN_DIR_PATH . 'inc/plugin.php';
require_once JTM_PLUGIN_DIR_PATH . 'inc/hooks.php';
require_once JTM_PLUGIN_DIR_PATH . 'inc/txt.php';
require_once JTM_PLUGIN_DIR_PATH . 'inc/metabox.php';
require_once JTM_PLUGIN_DIR_PATH . 'inc/shortcodes.php';
require_once JTM_PLUGIN_DIR_PATH . 'inc/voting.php';
require_once JTM_PLUGIN_DIR_PATH . 'inc/admin-page.php';
require_once JTM_PLUGIN_DIR_PATH . 'inc/admin-setting.php';
require_once JTM_PLUGIN_DIR_PATH . 'inc/db.php';


/*
|--------------------------------------------------------------------------
| Activation Hook
|--------------------------------------------------------------------------
*/

register_activation_hook( __FILE__, 'jtm_database_table' );