<?php

function jtm_post_voting_callback() {

    global $wpdb;

    $table_vote = $wpdb->prefix . 'votes';

    // Check if values exist
    if ( ! isset($_POST['pid']) || ! isset($_POST['uid']) ) {

        wp_send_json_error([
            'message' => 'Missing required data'
        ]);
    }

    // Sanitize data
    $post_id = intval($_POST['pid']);
    $user_id = intval($_POST['uid']);

    // Validate
    if ( empty($post_id) || empty($user_id) ) {

        wp_send_json_error([
            'message' => 'Invalid post or user ID'
        ]);
    }

    // Insert vote
    $query = $wpdb->insert(
        $table_vote,
        array(
            'post_id'   => $post_id,
            'user_id'   => $user_id,
            'vote_type' => 'like'
        ),
        array(
            '%d',
            '%d',
            '%s'
        )
    );

    // Success
    if ( $query ) {

        wp_send_json_success([
            'message' => 'Your vote has been recorded'
        ]);

    } else {

        wp_send_json_error([
            'message' => 'Database error: ' . $wpdb->last_error
        ]);
    }

    wp_die();
}


// Logged-in users
add_action('wp_ajax_jtm_post_voting', 'jtm_post_voting_callback');

// Non-logged-in users
add_action('wp_ajax_nopriv_jtm_post_voting', 'jtm_post_voting_callback');