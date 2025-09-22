<?php

// write a function, any css you want to load will be in this function
// Always use this when loading css or js

wp_enqueue_style(
    'normalize',
    get_theme_file_uri('assets/css/normalize.css'),
    array(),
    '12.1.1'
);

function mindset_enqueues() {
	// Load style.css on the front-end
	// Parameters: Unique handle, Source, Dependencies, Version number, Media
	wp_enqueue_style( 
		'mindset-style',
        // get_stylesheet_uri is shortcut, as wp knows where to find it
		get_stylesheet_uri(), 
		array(),
        // Some people may use date (09-01-25) or the version number; here I am telling wp to get version number of theme and output it here
		wp_get_theme()->get( 'Version' ),
		'all'
	);

    // Load scroll-to-top.js
    wp_enqueue_script(
        'scroll-to-top',
        get_theme_file_uri('assets/javascript/scroll-to-top.js'),
        array(),
        wp_get_theme()->get('Version'),
        array('strategy' => 'defer')
    );

    if ( is_page( 'contact' ) ) {
	wp_enqueue_script( 
		'contact', 
		get_theme_file_uri( 'assets/js/contact.js'), 
		array( 'scroll-to-top' ), // dependency declared here
		wp_get_theme()->get( 'Version' ), 
		array( 'strategy' => 'defer' ) 
	);
}

add_action( 'wp_enqueue_scripts', 'mindset_enqueues' );

    // Load scroll-change-color.js and make it depend on scroll-to-top
    wp_enqueue_script(
        'scroll-change-color',
        get_theme_file_uri('assets/javascript/scroll-change-color.js'),
        array('scroll-to-top'),
        wp_get_theme()->get('Version'),
        array('strategy' => 'defer')
    );
}
add_action( 'wp_enqueue_scripts', 'mindset_enqueues' );

function mindset_setup() {
    // Load style.css on the backend
	add_editor_style( get_stylesheet_uri() );

    // Crop images to 400px by 500px
    add_image_size( '400x500', 400, 500, true );

    // Crop images to 200px by 250px
    add_image_size( '200x250', 200, 250, true );

    // Crop images to 400px by 200px
    add_image_size( '400x200', 400, 200, true );

    // Crop images to 800px by 400px
    add_image_size( '800x400', 800, 400, true );
}
add_action( 'after_setup_theme', 'mindset_setup' );

// Make custom sizes selectable from WordPress admin
function mindset_add_custom_image_sizes( $size_names ) {
	$new_sizes = array(
		'400x500' => __( '400x500', 'mindset-theme' ),
		'200x250' => __( '200x250', 'mindset-theme' ),
        '400x200' => __( '400x200', 'mindset-theme' ),
		'800x400' => __( '800x400', 'mindset-theme' ),
	);
	return array_merge( $size_names, $new_sizes );
}
add_filter( 'image_size_names_choose', 'mindset_add_custom_image_sizes' );

// Register custom post types
require get_theme_file_path() . '/mindset-blocks/mindset-blocks.php';
require get_theme_file_path() . '/inc/post-types-taxonomies.php';

?>