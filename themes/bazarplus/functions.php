<?php
/**
 * bazarplus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bazarplus
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bazarplus_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on bazarplus, use a find and replace
		* to change 'bazarplus' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bazarplus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'bazarplus' ),
			'footer-menu' => esc_html__( 'Footer menu', 'bazarplus' ),
		)
	);
	
	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bazarplus_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'bazarplus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bazarplus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bazarplus_content_width', 640 );
}
add_action( 'after_setup_theme', 'bazarplus_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bazarplus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bazarplus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bazarplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer about', 'bazarplus' ),
			'id'            => 'footer-about',
			'description'   => esc_html__( 'Footer about', 'bazarplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer right', 'bazarplus' ),
			'id'            => 'footer-right',
			'description'   => esc_html__( 'Footer right', 'bazarplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer copyright', 'bazarplus' ),
			'id'            => 'footer-copyright',
			'description'   => esc_html__( 'Footer copyright', 'bazarplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bazarplus_widgets_init' );

// Register Custom Taxonomy
function ess_custom_taxonomy_Item()  {

$labels = array(
	'name'                       => __('Stores'),
	'singular_name'              => __('Store'),
	'menu_name'                  => __('Stores'),
	'all_items'                  => __('All Stores'),
	'parent_item'                => __('Parent Store'),
	'parent_item_colon'          => __('Parent Store:'),
	'new_item_name'              => __('New Store Name'),
	'add_new_item'               => __('Add New Store'),
	'edit_item'                  => __('Edit Store'),
	'update_item'                => __('Update Store'),
	'separate_items_with_commas' => __('Separate Store with commas'),
	'search_items'               => __('Search Stores'),
	'add_or_remove_items'        => __('Add or remove Stores'),
	'choose_from_most_used'      => __('Choose from the most used Stores'),
);
$args = array(
	'labels'                     => $labels,
	'hierarchical'               => true,
	'public'                     => true,
	'show_ui'                    => true,
	'show_admin_column'          => true,
	'show_in_nav_menus'          => true,
	'show_tagcloud'              => true,
);
register_taxonomy( 'store', 'product', $args );

}

add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

$labels = array(
	'name'                       => __('Store types'),
	'singular_name'              => __('Store type'),
	'menu_name'                  => __('Store types'),
	'all_items'                  => __('All Store types'),
	'parent_item'                => __('Parent Store type'),
	'parent_item_colon'          => __('Parent Store:'),
	'new_item_name'              => __('New Store type Name'),
	'add_new_item'               => __('Add New Store type'),
	'edit_item'                  => __('Edit Store type'),
	'update_item'                => __('Update Store type'),
	'separate_items_with_commas' => __('Separate Store type with commas'),
	'search_items'               => __('Search Store types'),
	'add_or_remove_items'        => __('Add or remove Store types'),
	'choose_from_most_used'      => __('Choose from the most used Store types'),
);
$args = array(
	'labels'                     => $labels,
	'hierarchical'               => true,
	'public'                     => true,
	'show_ui'                    => true,
	'show_admin_column'          => true,
	'show_in_nav_menus'          => true,
	'show_tagcloud'              => true,
);
register_taxonomy( 'store-type', 'product', $args );
}


add_action( 'init', 'ess_custom_taxonomy_item');

// remove text from the_title_archive

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
 
function add_my_currency_symbol( $currency_symbol, $currency ) {

    switch( $currency ) {
 
         case 'UZS': $currency_symbol = 'сум'; break;
 
     }
 
     return $currency_symbol;
 
}

// The defined taxonomy here in the function $taxonomy argument is for WooCommerce Store
function get_product_categories_from_a_product_brand( $brand_term_slug, $taxonomy = 'store' ) {
    global $wpdb;

    return $wpdb->get_results( "
        SELECT t1.*
        FROM    {$wpdb->prefix}terms t1
        INNER JOIN {$wpdb->prefix}term_taxonomy tt1
            ON  t1.term_id = tt1.term_id 
        INNER JOIN {$wpdb->prefix}term_relationships tr1
            ON  tt1.term_taxonomy_id = tr1.term_taxonomy_id
        INNER JOIN {$wpdb->prefix}term_relationships tr2
            ON  tr1.object_id = tr2.object_id
        INNER JOIN {$wpdb->prefix}term_taxonomy tt2
            ON  tr2.term_taxonomy_id = tt2.term_taxonomy_id         
        INNER JOIN {$wpdb->prefix}terms t2
            ON  tt2.term_id = t2.term_id
        WHERE tt1.taxonomy = 'product_cat'
        AND tt2.taxonomy = '$taxonomy'
        AND  t2.slug = '$brand_term_slug'
    " );
}

// Add styles and Scripts
require get_template_directory() . '/inc/styles-scripts.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_postcode']);	
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_email']);
	return $fields;
}

// Polylang

add_action('init', function() {
   pll_register_string('bazarplus', 'Search');
   pll_register_string('bazarplus', 'add to cart');
   pll_register_string('bazarplus', 'Вам может понравиться');
   pll_register_string('bazarplus', 'Категории');
   pll_register_string('bazarplus', 'Continue');
   pll_register_string('bazarplus', 'Главная');
   pll_register_string('bazarplus', 'Мой аккаунт');
   pll_register_string('bazarplus', 'Корзина');
});


add_filter( 'woocommerce_billing_fields' , 'custom_override_woocommerce_billing_fields' );
// Our hooked in function - $address_fields is passed via the filter!
function custom_override_woocommerce_billing_fields( $address_fields ) {
	$address_fields['billing_email']['required'] = false;

	
	return $address_fields;
};

add_filter('woocommerce_checkout_fields', function($fields) {
	

	$fields['billing']['billing_first_name']['priority'] = 10;
	$fields['billing']['billing_phone']['priority'] = 12;

	return $fields;
});

add_filter('woocommerce_checkout_fields', function($address_fields) {
	$address_fields['billing']['billing_phone']['class'] = ["form-row-first"];
	return $address_fields;
});

add_filter( 'woocommerce_checkout_fields', 'misha_no_phone_validation' );
 
function misha_no_phone_validation( $woo_checkout_fields_array ) {
	unset( $woo_checkout_fields_array['billing']['billing_phone']['validate'] );
	unset( $woo_checkout_fields_array['billing']['billing_address_1']['validate'] );
	return $woo_checkout_fields_array;
}

add_filter( 'woocommerce_account_menu_items', 'custom_remove_downloads_my_account', 999 );