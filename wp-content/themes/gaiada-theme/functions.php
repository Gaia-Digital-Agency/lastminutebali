<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

register_nav_menus( [
	'primary' => 'Primary Menu',
] );

// Enqueue jQuery
function enqueue_jquery_script() {
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_jquery_script' );

function enqueue_assets() {
	if ( is_admin() ) {
		return;
	}

	// Global CSS
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style(
		'global',
		get_template_directory_uri() . '/assets/css/global.css',
		array(),
		null
	);

	// Main JS
	wp_enqueue_script(
		'main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		null
	);

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), null, true );

	// FontAwesome
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' );

	// Google Fonts
	wp_enqueue_style(
		'google-fonts',
		'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);
}

add_action( 'wp_enqueue_scripts', 'enqueue_assets' );

require_once get_template_directory() . '/inc/theme-settings.php';

// Accomodation to Room
add_filter( 'register_post_type_args', function ( $args, $post_type ) {
    if ( 'accomodation' === $post_type ) {
        $args['rewrite'] = array( 'slug' => 'room' );
        
        $args['labels']['name'] = 'Rooms';
        $args['labels']['menu_name'] = 'Rooms';
    }
    return $args;
}, 10, 2 );