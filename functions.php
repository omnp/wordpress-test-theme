<?php

add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_styles() {
    wp_enqueue_style('test-theme-style', get_template_directory_uri().'/style.css');
}

function register_menus() {
  register_nav_menu('primary',__( 'Primary Menu' ));
}

add_action( 'init', 'register_menus' );
