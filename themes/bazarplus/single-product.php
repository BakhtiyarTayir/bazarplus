<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<div class="container">

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<div class="row">
					<div class="max-75 woocommerce">
						<div class="product type-product post-4187 status-publish first instock product_cat-ovoshhi product_cat-ovoshhi-i-frukty has-post-thumbnail purchasable product-type-simple">
							<div class="product_top">
								<div class="row">
									<div class="col-md-5">
										<div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images">
											<figure class="woocommerce-product-gallery__wrapper">
												<div class="woocommerce-product-gallery__image">
													<img class="wp-post-image" src="<?php the_post_thumbnail_url(); ?>">
												</div>
											</figure>
										</div>
									</div>
									<div class="col-md-7">
										<div class="summary entry-summary p-4">
											<div class="left_summary_content">
												<h1 class="product_title entry-title"><?php the_title(); ?></h1>
												<div class="md-item-desc-text grey-text prod_desc"><?php the_content(); ?></div>
												<p class="price"><span class="woocommerce-Price-amount amount"><?php echo $product->get_price(); echo ' <span class="woocommerce-Price-currencySymbol">'; echo get_woocommerce_currency_symbol(); echo '</span></span></p>'; ?>
											</div>
											<div class="right_summary_content">
												<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
													<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
													
													<?php
													do_action( 'woocommerce_before_add_to_cart_quantity' );

													woocommerce_quantity_input(
														array(
															'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
															'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
															'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
														)
													);
										
													do_action( 'woocommerce_after_add_to_cart_quantity' );
													?>

													<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php pll_e('add to cart'); ?></button>

													<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="related-products">
								<h2 class="product-grid-title mb-5 mt-5">
									<span><?php pll_e('Вам может понравиться'); ?></span>
								</h2>
								<div class="row">
									<?php  
										$args = array(
											'posts_per_page' => 4,
											'post_type' => 'product',
											'post_status' => 'publish',
											'ignore_sticky_posts' => 1,
											'meta_key' => 'total_sales',
											'orderby' => 'meta_value_num',
											'order' => 'DESC',
										);

										$loop = new \WP_Query( $args );

										while ( $loop->have_posts() ) : $loop->the_post();
											global $product; 
											$store_name = wp_get_post_terms(get_the_ID(), 'store',  array("fields" => "all"));
										?>
											
											<a href="<?php the_permalink(); ?>" class="col-md-3 mb-4 col-6 styles_container__3wHdd">
												<div class="styles_image__6d1qy"><img src="<?php the_post_thumbnail_url(); ?>"></div>
												<div class="styles_product__172_i">
													<div class="styles_product__name__71XoP"><?php the_title(); ?></div>
													<div class="styles_price__1Opbu">
														<div class="styles_price__current__2CWVb"><?php echo $product->get_price(); echo ' '; echo get_woocommerce_currency_symbol(); ?></div>
													</div>
													<div class="styles_store__1ORji"><?php echo $store_name[0]->name; ?></div>
													<div class="styles_logo__tV4bE"><img src="<?php echo z_taxonomy_image_url($store_name[0]->term_id); ?>"></div>
												</div>
											</a> 
									<?php	
										endwhile;

										wp_reset_query();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>
		
	</div>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
