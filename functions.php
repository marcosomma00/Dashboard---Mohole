<?php 

/**
 * Proper way to enqueue scripts and styles
 */
function rey_enqueue_style_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	wp_enqueue_style( 'slider', get_stylesheet_directory_uri()."/assets/css/style.css", array("main"));
	wp_enqueue_script( 'cookie', get_template_directory_uri(). '/assets/js/cookie.js', array(), '1.0.0', false /* Header */ );
	wp_enqueue_script( 'slider', get_template_directory_uri(). '/assets/js/micro-slider.min.js', array("cookie"), '1.0.0', true );
	wp_enqueue_script( 'index', get_template_directory_uri(). '/assets/js/index.js', array("slider"), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'rey_enqueue_style_scripts' );

add_action( 'after_setup_theme', 'r1_add_theme_supports' );
function r1_add_theme_supports() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}




/* funzione deve dire che 1 vertica -1 orizzontale 0 quadrata */
function img_orientation($img){
    $w = $img['sizes']['medium-width'];
    $h = $img['sizes']['medium-height'];
    if ($w == $h) {
        $result = 0;
    } else {
        if ($w > $h) {
            $result = -1;
        } else{
            $result = 1;
        }
            
    }
    return $result;
}

?>