<?php
if ( ! defined( 'ABSPATH' ) ) exit;


add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-child-style',
        get_stylesheet_uri(),
        [ 'astra-theme-css' ],
        wp_get_theme()->get( 'Version' )
    );
}, 11 );




function astra_child_load_template_parts() {
    if( is_front_page() ) {
    get_template_part('template-parts/hero');
    }
}
add_action('astra_primary_content_top', 'astra_child_load_template_parts');

function astra_child_load_footer() {
    get_template_part('template-parts/footer');
}

add_action( 'after_setup_theme', function () {
    remove_all_actions( 'astra_footer' );
    add_action( 'astra_footer', 'astra_child_load_footer');
}, 11 );
