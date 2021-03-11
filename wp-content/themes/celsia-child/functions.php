<?php 

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
    wp_enqueue_style('stylecss', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), '1'); 
}