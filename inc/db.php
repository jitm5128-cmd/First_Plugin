<?php

function jtm_database_table() {

    global $wpdb;

    $table_name = $wpdb->prefix . 'reactions';
    $table_vote = $wpdb->prefix . 'votes';

    $charset_collate = $wpdb->get_charset_collate();

    // Reactions Table
    $sql = "CREATE TABLE $table_name (

        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
        post_id BIGINT UNSIGNED NOT NULL,
        user_id BIGINT UNSIGNED NOT NULL,
        reaction_type VARCHAR(20) NOT NULL,
        reaction_count INT UNSIGNED DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

        PRIMARY KEY (id),
        UNIQUE KEY unique_reaction (post_id, user_id, reaction_type)

    ) $charset_collate;";


    // Votes Table
    $sql_votes = "CREATE TABLE $table_vote (

    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    post_id BIGINT UNSIGNED NOT NULL,
    user_id BIGINT UNSIGNED NOT NULL,
    vote_type VARCHAR(20) NOT NULL,
    vote_count INT UNSIGNED DEFAULT 1,
    voted_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (id),
    KEY post_id (post_id),
    KEY user_id (user_id),
    KEY voted_at (voted_at)

) $charset_collate;";


    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    dbDelta($sql);
    dbDelta($sql_votes);

    add_option('jtm_db_version', '1.0');
}


// Run on plugin activation
register_activation_hook(__FILE__, 'jtm_database_table');

?>