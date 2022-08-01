<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bazarplus
 */

?>

	<!-- Custom footer -->






	 <footer class="page-footer">
        <div class="container">
            <div class="footer-bottom text-white">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 social-links">
                        <?php wp_nav_menu( [
							'theme_location' => 'footer-menu',
							'items_wrap'     => '<ul class="main-menu social-nav">%3$s</ul>',
                           
						] ); ?>
                    </div>

                    <div class="col-md-9 col-sm-9">
                        <?php dynamic_sidebar( 'footer-about' ); ?>
                    </div>
                    <div class="col-md-3 col-sm-3 text-center">
                        <?php dynamic_sidebar( 'footer-right' ); ?>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 copyright">
                        <?php dynamic_sidebar( 'footer-copyright' ); ?>
                    </div>
                </div>
            </div>

        </div>
    </footer>

    <div id="footer-bar" class="footer-bar footer-bar-detached">
        <a href="<?php echo get_home_url(); ?>">
            <span class="fa fa-home" aria-hidden="true"></span>
            <span class="text"><?php pll_e('Search'); ?></span>
        </a>
        <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
            <span class="fa fa-user icon" aria-hidden="true"></span>
            <span class="text"><?php pll_e('Мой аккаунт'); ?></span>
        </a>
        <a class="link-dropdown position-relative" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
            <span class="fa fa-shopping-cart icon"></span>
            <span class="count"><?php echo WC()->cart->get_cart_contents_count() ?></span>
            <span class="text"><?php pll_e('Корзина'); ?></span>
        </a>
    </div>

    <div id="menu-main" data-menu-active="nav-homes" class="offcanvas offcanvas-start offcanvas-detached rounded-m">
        <div class="menu-list">
            <div class="card card-style rounded-m p-3 py-2 mb-0 mt-3">
                <?php wp_nav_menu( [
					'theme_location' => 'menu-1',
					'items_wrap'     => '<ul class="main-menu social-nav">%3$s</ul>',
                   
				] ); ?>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="search-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php pll_e('Search'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" class="ec-btn-group-form" >
					    	<input autocomplete="off" type="text" class="form-control" name="s" id="s"  value="<?php echo get_search_query() ?>" placeholder="<?php pll_e('Search'); ?> ">
					    	<button id="searchsubmit" type="submit" class="btn-submit"><i class="fa fa-search"></i></button>
					    </form>
                    
                </div>

            </div>
        </div>
    </div>

	<!-- Custom footer end -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
