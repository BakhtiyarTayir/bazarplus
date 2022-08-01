<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */


defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>
    <div class="container">
    <div class="styles_merchant__FogTQ seller_page">
        <div class="styles_cover__SOC3J">
            <img img src="<?php the_field("background_image", 'category_' . get_queried_object()->term_id); ?>">
            <div class="styles_logo__2KZu7"><img img src="<?php echo z_taxonomy_image_url(get_queried_object()->term_id); ?>">
            </div>
        </div>
        <div class="styles_details__1hDWh">
            <h1 class="styles_title__2ceiy"><?php the_archive_title(); ?></h1>
            <div class="styles_badges__1I_-V">
                <div class="styles_badge__1rbDy">
                    <div class="styles_badge__icon__2cwCk">
                        <i class="far fa-star"></i>
                    </div><?php the_field('rating', 'category_' . get_queried_object()->term_id);?>(<?php the_field('testimonials', 'category_' . get_queried_object()->term_id);?>)
                </div>
            </div>
        </div>
    </div>
    <div class="column_column__1Vkn8">
        <section class="sc-ftvSup bOkHCz">
            <div class="sc-iqcoie bJTaCL container">

                <div class="sc-jqUVSM bUeoIe">
                    <div class="product_cat_bar">
                        <a href="#"><i class="fa fa-bars"></i></a>
                    </div>

                    <nav id="categories" class="navbar catbar">
							<?php
								if ( woocommerce_product_loop() ) {

									$brand_term_slug = get_queried_object()->slug; // A term slug is required (not the term id or term name)

									$results = get_product_categories_from_a_product_brand( $brand_term_slug );
									
									if( ! empty($results) ) {
									
										$term_names = []; // Initializing an empty array variable

										// Loop through each product category terms:
										foreach ( $results as $result ) {
											
											$term_id   = $result->term_id; // Term id
											$term_name = $result->slug; // Term slug
											$term_slug = $result->name; // Term name
											$taxonomy  = 'product_cat'; 
									
											$term_link = get_term_link( get_term( $result->term_id, $taxonomy ), $taxonomy );
											
											// Example: Set the linked formatted term name in an array
											
											$term_names[] = '<li class="nav-item"><a class="nav-link" href="#'.$result->slug.'">'.$result->name.'</a></li>';
											$res = array_unique($term_names);
										}   
									
										// Display the linked formatted terms names
										echo '<ul class="product_categories owl-carousel">'.implode(' ', $res).'</ul>';
									} ?>
                            
                    </nav>
                </div>
            </div>
        </section>
    </div>

    <section class="col s6 l9 vnd-section_wrap menu-block" id="salaty">
		<?php
			$product_categories = get_product_categories_from_a_product_brand( $brand_term_slug );
			if( ! empty($results) ) {
				$ids = array();

				foreach ($product_categories as $key => $value) {
					if (!empty($ids[$value->slug])) { unset($product_categories[$key]); }
					else{ $ids[$value->slug] = 1; }
				}

				foreach ( $product_categories as $product_category ) {	 
					echo '<div class="menu-name"><h2 id="'. $product_category->slug . '" class="section-title active">' . $product_category->name . '</h2></div>';	 
					$args = array(	 
						'posts_per_page' => -1,	 
						'tax_query' => array(	 
						'relation' => 'AND',	 
							array(	 
								'taxonomy' => 'product_cat',	 
								'field' => 'slug',	 
								'terms' => $product_category->slug	 
							),
							array(	 
								'taxonomy' => 'store',	 
								'field' => 'slug',	 
								'terms' => $brand_term_slug	 
							)	 
						),	 
						'post_type' => 'product',	 
						'orderby' => 'title,'	 
					);
				
				
					$products = new WP_Query( $args ); ?>	 
					 <div class="products-row">
						<div class="row">
							<?php
								while ( $products->have_posts() ) {	 
									$products->the_post();	 ?>
									<a href="<?php the_permalink(); ?>" class="col-md-3 mb-4 col-6 styles_container__3wHdd">
										<div class="styles_image__6d1qy"><img src="<?php echo woocommerce_get_product_thumbnail(); ?>"></div>
										<div class="styles_product__172_i">
											<div class="styles_product__name__71XoP"><?php the_title(); ?></div>
											<div class="styles_price__1Opbu">
												<div class="styles_price__current__2CWVb"><?php echo $product->get_price(); echo ' '; echo get_woocommerce_currency_symbol(); ?></div>
											</div>
										</div>
									</a>
									
							<?php }
							?>
						</div>
					</div>
					<?php 
								
				}
				
			}
									
		?>
    </section>
</div>
<script>
	jQuery('.product_categories').owlCarousel({
    margin: 10,
    autoWidth: !0,
    dragEndSpeed: 600,
    nav: !1,
    dots: !1,
    slideBy: 2,
    navText: ['<span aria-label="Previous">‹</span>', '<span aria-label="Next">›</span>'],
    slideTransition: "ease",
    responsive: {
        1200: {
            margin: 20,
            items: 9
        },
        1024: {
            items: 8,
            margin: 20
        },
        992: {
            items: 7,
            margin: 20
        },
        600: {
            margin: 25,
            items: 6,
            nav: !1
        },
        480: {
            margin: 15,
            items: 3,
            autoWidth: !0,
            nav: !1
        },
        320: {
            margin: 10,
            items: 2,
            autoWidth: !0,
            nav: !1
        }
    }
})
function scrollNav() {
    jQuery('nav a').click(function () {
        jQuery(".active").removeClass("active");
        jQuery(this).closest('li').addClass("active");
        var indexs = jQuery(this).closest('.owl-item').index();
        jQuery('.product_categories').trigger('to.owl.carousel', [indexs, 500, true]);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQuery(this).attr('href')).offset().top - 250
        }, 300);
        return false;
    });
}
scrollNav();
</script>
<?php

/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );

} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
 
get_footer( 'shop' );


?>