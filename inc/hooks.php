<?php
/**
 * Actions
 */
function jtm_footer_text(){
    echo 'copyright Jit';
}
add_action( 'wp_footer','jtm_footer_text',20);

function jtm_meta_info(){
    if(is_singular( 'post' )){
        $title = get_the_title();
        $desc = get_the_excerpt();
        echo '<meta property="og:title" content="'.$title.'" />';
        echo '<meta property="og:description" content="'.$desc.'" />';
    }
}
add_action( 'wp_head', 'jtm_meta_info',999);
//filters

// function jtm_post_title($title){
//     $emoji = '';
//     return $emoji.$title;
// }
// add_filter('the_title','jtm_post_title');

function jtm_post_title($title){
    $emoji = '';
    if(is_singular( 'post' )){
        return $emoji.$title;
    }
    return $title;
}
add_filter('the_title','jtm_post_title');

function jtm_excerpt_length($excerpt){
    return 10;
}
add_filter('excerpt_length','jtm_excerpt_length',999);


function jtm_post_content($title){
    $text = '<h1>Overview</h1>';
    if(is_singular( 'post' )){
        return $text.$title;
    }
    return $title;
}
add_filter('the_content','jtm_post_title');