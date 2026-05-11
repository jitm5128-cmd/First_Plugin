<?php 

class JTM_plugin{
    public function __construct()
    {
        add_action('admin_menu',[$this, 'jtm_plugin_menus']);
        add_action('init', [$this,'register_projects_post_type'], 0);
        add_action('wp_enqueue_scripts', [$this,'jtm_plugin_public_scripts']);
        add_action('admin_enqueue_scripts', [$this,'jtm_plugin_admin_scripts']);
    }

    //scripts
    public function jtm_plugin_admin_scripts(){
        wp_enqueue_style( 'jtm-plugin-admin-css', JTM_PLUGIN_DIR_URL .'admin/css/admin.css', '',JTM_PLUGIN_VERSION);
        wp_enqueue_script( 'jtm-plugin-admin-js', JTM_PLUGIN_DIR_URL .'admin/js/admin.js', '',JTM_PLUGIN_VERSION , true);
        wp_enqueue_script( 'jtm-plugin-ajax-js', JTM_PLUGIN_DIR_URL .'admin/js/ajax.js', ['jquery'],JTM_PLUGIN_VERSION , true);
        wp_localize_script( 'jtm-plugin-ajax-js', 'jtm_ajax', ['ajax_url' => admin_url('admin-ajax.php')]);
    }
    
    
    function jtm_plugin_public_scripts(){
        wp_enqueue_style( 'jtm-plugin-public-css', JTM_PLUGIN_DIR_URL .'public/css/public.css', '',JTM_PLUGIN_VERSION);
        wp_enqueue_script( 'jtm-plugin-public-js', JTM_PLUGIN_DIR_URL .'public/js/public.js', '',JTM_PLUGIN_VERSION , true);
    }


    // register admin menu

    public function jtm_plugin_menus(){
        add_menu_page(
            "JTM Plugin",
            "JTM",
            'manage_options',
            'jtmplugin',
            'jtm_plugin_page',
            'dashicons-admin-appearance',
            10
        );
    
        add_action('admin_menu','jtm_plugin_menus');
    
        add_submenu_page(
            'tools.php',
            'JTM Plugin Sub-page',
            'Sub-Menu',
            'manage_options',
            'sub-menu',
            'jtm_plugin_page'
        );
    }

//register cpt 
    public function register_projects_post_type() {
        $labels = array(
            'name'                  => _x('projects', 'Post Type General Name', 'jtm-plugin'),
            'singular_name'         => _x('project', 'Post Type Singular Name', 'jtm-plugin'),
            'menu_name'            => __('projects', 'jtm-plugin'),
            'all_items'            => __('All projects', 'jtm-plugin'),
            'add_new_item'         => __('Add New project', 'jtm-plugin'),
            'add_new'              => __('Add New', 'jtm-plugin'),
            'edit_item'            => __('Edit project', 'jtm-plugin'),
            'update_item'          => __('Update project', 'jtm-plugin'),
            'search_items'         => __('Search project', 'jtm-plugin'),
        );
    
        $args = array(
            'label'                 => __('project', 'jtm-plugin'),
            'labels'                => $labels,
            'supports'              => ["title","editor","thumbnail","excerpt","author","comments"],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_icon'             => 'dashicons-id-alt',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
    
        register_post_type('projects', $args);
    }
    
}
new JTM_plugin();