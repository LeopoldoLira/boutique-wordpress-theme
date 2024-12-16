<?php



function theme_styles(){

    wp_register_style('main_stylesheet', get_stylesheet_directory_uri() . '/assets/styles/css/main.min.css', '', '1.0', 'all');
    wp_enqueue_style('main_stylesheet');

    wp_register_style('swiper-bundle', get_stylesheet_directory_uri() . '/assets/styles/css/swiper-bundle.min.css', '', '1.0', 'all');
    wp_enqueue_style('swiper-bundle');
}

add_action('wp_enqueue_scripts','theme_styles');


function theme_scripts(){
    wp_register_script('swiper-bundlejs', get_stylesheet_directory_uri() . '/assets/js/swiper-bundle.min.js', '', '1.0', true);
    wp_enqueue_script('swiper-bundlejs');
}

add_action('wp_enqueue_scripts','theme_scripts');



?>