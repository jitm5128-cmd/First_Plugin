<?php

// Register Custom Taxonomy
function register_project_industry_taxonomy() {
    $labels = array(
        'name'                       => _x('Industries', 'Taxonomy General Name', 'jtm-plugin'),
        'singular_name'              => _x('Industry', 'Taxonomy Singular Name', 'jtm-plugin'),
        'menu_name'                  => __('Industries', 'jtm-plugin'),
        'all_items'                  => __('All Industries', 'jtm-plugin'),
        'parent_item'                => __('Parent Industry', 'jtm-plugin'),
        'parent_item_colon'          => __('Parent Industry:', 'jtm-plugin'),
        'new_item_name'              => __('New Industry Name', 'jtm-plugin'),
        'add_new_item'               => __('Add New Industry', 'jtm-plugin'),
        'edit_item'                  => __('Edit Industry', 'jtm-plugin'),
        'update_item'                => __('Update Industry', 'jtm-plugin'),
        'view_item'                  => __('View Industry', 'jtm-plugin'),
        'search_items'               => __('Search Industries', 'jtm-plugin'),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'publicly_queryable'         => true,
        'show_ui'                    => true,
        'show_in_menu'               => true,
        'show_in_nav_menus'          => true,
        'show_in_rest'               => true,
        'rest_base'                  => 'project_industry',
        'show_tagcloud'              => true,
        'show_in_quick_edit'         => true,
        'show_admin_column'          => true,
    );

    register_taxonomy('project_industry', ["projects"], $args);
}
add_action('init', 'register_project_industry_taxonomy', 0);


// Register Custom Taxonomy
function register_project_Technology_taxonomy() {
    $labels = array(
        'name'                       => _x('Technologies', 'Taxonomy General Name', 'jtm-plugin'),
        'singular_name'              => _x('Technology', 'Taxonomy Singular Name', 'jtm-plugin'),
        'menu_name'                  => __('Technologies', 'jtm-plugin'),
        'all_items'                  => __('All Technologies', 'jtm-plugin'),
        'parent_item'                => __('Parent Technology', 'jtm-plugin'),
        'parent_item_colon'          => __('Parent Technology:', 'jtm-plugin'),
        'new_item_name'              => __('New Technology Name', 'jtm-plugin'),
        'add_new_item'               => __('Add New Technology', 'jtm-plugin'),
        'edit_item'                  => __('Edit Technology', 'jtm-plugin'),
        'update_item'                => __('Update Technology', 'jtm-plugin'),
        'view_item'                  => __('View Technology', 'jtm-plugin'),
        'search_items'               => __('Search Technologies', 'jtm-plugin'),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'publicly_queryable'         => true,
        'show_ui'                    => true,
        'show_in_menu'               => true,
        'show_in_nav_menus'          => true,
        'show_in_rest'               => true,
        'rest_base'                  => 'project_Technology',
        'show_tagcloud'              => true,
        'show_in_quick_edit'         => true,
        'show_admin_column'          => true,
    );

    register_taxonomy('project_Technology', ["projects"], $args);
}
add_action('init', 'register_project_Technology_taxonomy', 0);