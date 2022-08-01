<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package zoodmall
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header container" style="font-size:13px;">
				<h1 class="page-title" style="text-align: center;">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'bazarplus' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<div class="container" style="display: flex;flex-wrap: wrap;align-content: center;justify-content: center;align-items: center;">
				<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content-search', 'search' );

			endwhile;
			?>

		</div>
			<?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
			

	</main><!-- #main -->

<?php
get_footer();
