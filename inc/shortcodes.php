<?php

//basic shortcode
function jtm_test_shortcode(){
    return "this is my first shortcode";
}

add_shortcode( 'JTM_TEST', 'jtm_test_shortcode' );

//ENCLOSING SHORTCODE
function jtm_enclosing_shortcode($atts= array(), $content){
    $html = '<a href="">';
    $html .= $content;
    $html .= '</a>';
    return $html;
}
add_shortcode( 'JTM_ENCLOSING', 'jtm_enclosing_shortcode');

//shortcode with parameters
function jtm_parameter_shortcode($atts= array()){
    $atts = shortcode_atts(
        array(
            'lable' => 'Button lable',
            "link" =>''
        ),$atts
    );

    $html = '<a href="'.$atts['link'].'">';
    $html .= $atts['lable'];
    $html .= '</a>';
    return $html;
}
add_shortcode( 'JTM_TST_PARA', 'jtm_parameter_shortcode');

//project meta information
// Project Meta Information Shortcode
function jtm_meta_shortcode($atts){

    $atts = shortcode_atts(
        array(
            'id' => get_the_ID(),
        ),
        $atts,
        'PROJECT_META'
    );

    $project_url        = get_post_meta($atts['id'], 'project_url', true);
    $project_completion = get_post_meta($atts['id'], 'project_completion_duration', true);
    $project_cost       = get_post_meta($atts['id'], 'project_estimated_cost', true);

    $html = '<div class="project-meta">';

    $html .= '<span><a href="' . esc_url($project_url) . '" target="_blank">Visit Project</a></span>';

    $html .= '<span>' . esc_html($project_completion) . '</span>';

    $html .= '<span>' . esc_html($project_cost) . '</span>';

    $html .= '</div>';

    return $html;
}

add_shortcode('PROJECT_META', 'jtm_meta_shortcode');


// Voting Buttons Shortcode
function jit_post_voting_buttons($atts){

    $attrs = shortcode_atts(
        array(
            'like'    => 'Like',
            'dislike' => 'Dislike',
        ),
        $atts,
        'POST_VOTING'
    );

    $post_id = get_the_ID();
    $user_id = get_current_user_id();

    $html = '<div class="jtm-voting-buttons">';

    $html .= sprintf(
        '<button class="jtm-like" data-post-id="%s" data-user-id="%s">%s</button>',
        esc_attr($post_id),
        esc_attr($user_id),
        esc_html($attrs['like'])
    );

    $html .= sprintf(
        '<button class="jtm-dislike" data-post-id="%s" data-user-id="%s">%s</button>',
        esc_attr($post_id),
        esc_attr($user_id),
        esc_html($attrs['dislike'])
    );

    $html .= '</div>';

    return $html;
}

add_shortcode('POST_VOTING', 'jit_post_voting_buttons');
?>