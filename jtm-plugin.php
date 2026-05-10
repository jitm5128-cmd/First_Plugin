<?php
/*
Plugin Name: JTM-plugin
Description: Handle the basics with this plugin.
Version: 1.0.0
Author: Jit Mandal
*/

if (!defined('ABSPATH')) {
    exit;
}

define('JITM_PLUGIN_DB_VERSION', '1.0');

require_once plugin_dir_path(__FILE__) . 'inc/db.php';

register_activation_hook(__FILE__, 'jtm_reaction_table');
