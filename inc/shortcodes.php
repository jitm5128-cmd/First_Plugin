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
function jtm_meta_shortcode($atts){
    $atts = shortcode_atts( array(
        'id' => get_the_ID,
    ),$atts,'PROJECT_META'
);

$project_url = get_post_meta( $atts['id'],'project_url',true);
$project_completion = get_post_meta( $atts['id'],'project_completion_duration',true);
$project_cost = get_post_meta( $atts['id'],'project_estimated_cost',true);

$html = '<div class="project-meta';
    $html .= '<span><a href="'.$project_url.'"target="_blank">Visit Project</a></span>';
    $html .= '<span>'.$project_completion.'</span>';
    $html .= '<span'.$project_cost.'</span>';

 $html .= '</div';
 return $html;
}
add_shortcode( 'get_post_meta', 'jtm_parameter_shortcode');