<?php
/**
 * Enqueue scripts and styles.
 */
function bazarplus_scripts() {
    // CSS
	wp_enqueue_style( 'bazarplus-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'bazarplus-style', 'rtl', 'replace' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'fonts-css', get_template_directory_uri() . '/css/fonts.css');
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/css/fontawesome.min.css');
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_style( 'media-css', get_template_directory_uri() . '/css/media.css');
	wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css');


    // Scripts

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), true );
	wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '3.2.1', true );
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bazarplus_scripts' );
?>