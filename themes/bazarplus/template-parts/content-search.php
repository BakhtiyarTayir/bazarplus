<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zoodmall
 */

?>

							<li class="category_item" style="width: 100%;background-color: #fff;border-radius: 15px;margin: 25px;">
								<a href="<?php the_permalink(); ?>" style="display: flex;margin: 0 0 10px 10px;align-items: center;">
									<img src="<?php the_post_thumbnail_url(); ?>" style="width: 150px !important;height: 150px;object-fit: cover;margin-right: 15px;">
									<h3><b><?php the_title(); ?></b></h3>
									<hr>
								</a>
							</li>
