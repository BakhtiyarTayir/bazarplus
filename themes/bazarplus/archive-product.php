<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>

<div class="container">

        <?php
        
            $parent_id = get_queried_object()->parent;
           
            $taxonomyName = "product_cat";
            $termchildren = get_term_children( $parent_id, $taxonomyName );

            echo '<ul>';
            

            echo '</ul>';
        ?>

            <div class="merchant-cat_wrap w-100">
                <div class="merchant-cat" style="background-image: url(<?php echo z_taxonomy_image_url($parent_id); ?>)">
                    <div class="merchant-cat-title"><?php echo get_the_category_by_ID($parent_id); ?></div>
                </div>
            </div>
            <section class="mb-5">
                <h2 class="section-title">Категории</h2>
                <div class="cat-slider owl-carousel">
                    <?php
                        foreach ($termchildren as $child) {
                            $term = get_term_by( 'id', $child, $taxonomyName ); 
                            $active_class = '';
                            if($term->term_id == get_queried_object()->term_id){
                                $active_class = 'active';
                            }
                            ?>
                            <div class="sc-crXcEl cCNGhG <?php echo $active_class; ?>"><a href="<?php echo get_term_link( $term->term_id, $term->taxonomy ); ?>"><span style="font-size: 16px;"><?php echo $term->name; ?></span></a></div>
                       <?php }
                    ?>
                </div>
            </section>


            <section>               
                <div class="row">
                    <?php
                     // параметры по умолчанию
                    if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) {
                            the_post();
                            global $product; 
						    $store_name = wp_get_post_terms(get_the_ID(), 'store',  array("fields" => "all"));
                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action( 'woocommerce_shop_loop' ); ?>

                    <a href="<?php the_permalink(); ?>"  class="col-md-3 mb-4 col-6 styles_container__3wHdd">
                        <div class="styles_image__6d1qy"><img src="<?php echo woocommerce_get_product_thumbnail(); ?>"></div>
                        <div class="styles_product__172_i">
                            <div class="styles_product__name__71XoP"><?php the_title(); ?></div>
                            <div class="styles_price__1Opbu">
                                <div class="styles_price__current__2CWVb"><?php echo $product->get_price(); echo ' '; echo get_woocommerce_currency_symbol(); ?></div>
                            </div>
                            <div class="styles_store__1ORji"><?php echo $store_name[0]->name; ?></div>
                            <div class="styles_logo__tV4bE"><img src="<?php echo z_taxonomy_image_url($store_name[0]->term_id); ?>">
                            </div>
                        </div>
                    </a>

                       <?php }
                    }

                    wp_reset_postdata(); // сброс
                            
                    ?>
                </div>
            </section>

        </div>

		<script>
			jQuery('.cat-slider').owlCarousel({
				margin: 10,
				autoWidth: !0,
				dragEndSpeed: 600,
				nav: !0,
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
		</script>
<?php
get_footer( 'shop' );
