
<?php 
/*
 * Plugin Name:       JTM-plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Jit Mandal
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       jtm-plugin

 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if( ! defined( 'JTM_PLUGIN_VERSION')){
    define( 'JTM_PLUGIN_VERSION', '1.0.0');
}
if( ! defined( 'JTM_PLUGIN_DIR_PATH')){
    define( 'JTM_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ));
}

if( ! defined( 'JITM_PLUGIN_DIR_URL')){
    define( 'JTM_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ));
}
if( ! defined( 'JITM_PLUGIN_DB_VERSION')){
    define( 'JITM_PLUGIN_DB_VERSION', '1.0.0');
}
//main plugin class
require_once JTM_PLUGIN_DIR_PATH. 'inc/plugin.php';

// //include scripts and styles
// require_once JTM_PLUGIN_DIR_PATH . 'inc/scripts.php';

//action and filters
require_once JTM_PLUGIN_DIR_PATH. 'inc/hooks.php';

//metabox,text,cpt
// require_once JTM_PLUGIN_DIR_PATH. 'inc/cpt.php';
require_once JTM_PLUGIN_DIR_PATH. 'inc/txt.php';
require_once JTM_PLUGIN_DIR_PATH. 'inc/metabox.php';

//shortcodes
require_once JTM_PLUGIN_DIR_PATH. 'inc/shortcodes.php';

//Menu and submenu creation

require_once JTM_PLUGIN_DIR_PATH. 'inc/admin-page.php';
require_once JTM_PLUGIN_DIR_PATH. 'inc/admin-setting.php';


require_once plugin_dir_path(__FILE__) . 'inc/db.php';

register_activation_hook(__FILE__, 'jtm_reaction_table');