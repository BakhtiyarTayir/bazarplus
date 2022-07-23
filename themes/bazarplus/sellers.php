<?php
/**
	Template Name: Sellers
 *
 * @package bazarplus
 */

get_header();
?>
        <div class="container">

            <section class="det-section-list">
                <div class="partners-items-section">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <div class="partners-block">
                        <div class="row">
						<?php
						
							$categories = get_categories( [
								'taxonomy'     => 'store',
								'type'         => 'product',
								'child_of'     => 0,
								'parent'       => '',
								'orderby'      => 'name',
								'order'        => 'ASC',
								'hide_empty'   => 0,
								'hierarchical' => 1,
								'exclude'      => '',
								'include'      => '',
								'number'       => 0,
								'pad_counts'   => false,
								// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
							] );

							if( $categories ){
								foreach( $categories as $cat ){
									// Данные в объекте $cat

									// $cat->term_id
									// $cat->name (Рубрика 1)
									// $cat->slug (rubrika-1)
									// $cat->term_group (0)
									// $cat->term_taxonomy_id (4)
									// $cat->taxonomy (category)
									// $cat->description (Текст описания)
									// $cat->parent (0)
									// $cat->count (14)
									// $cat->object_id (2743)
									// $cat->cat_ID (4)
									// $cat->category_count (14)
									// $cat->category_description (Текст описания)
									// $cat->cat_name (Рубрика 1)
									// $cat->category_nicename (rubrika-1)
									// $cat->category_parent (0)

									?>



									<div class="col-md-4 col-12">
										<a href="<?php echo get_term_link($cat->term_id); ?>" class="vendor_card">
											<div class="styles_merchant__FogTQ">
												<div class="styles_cover__SOC3J">
													<img img src="<?php the_field('background_image', 'category_' . $cat->term_id);?>">
													<div class="styles_logo__2KZu7"><img img
															src="<?php echo z_taxonomy_image_url($cat->term_id); ?>">
													</div>
												</div>
												<div class="styles_details__1hDWh">
													<div class="styles_title__2ceiy"><?php echo $cat->name; ?></div>
													<div class="styles_badges__1I_-V">
														<div class="styles_badge__1rbDy">
															<div class="styles_badge__icon__2cwCk">
																<i class="far fa-star"></i>
															</div><?php the_field('rating', 'category_' . $cat->term_id);?>(<?php the_field('testimonials', 'category_' . $cat->term_id);?>)
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>

									<?php
								}
							}
						?>

					</div>


                    </div>
                </div>
            </section>
        </div>
    </div>

<?php
get_footer();
