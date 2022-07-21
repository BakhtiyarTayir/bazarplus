<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bazarplus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<header class="main-header header-bar header-fixed header-app header-bar-detached">
        <div class="ec-header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="ec-flex">
                        <!-- Ec Header Logo Start -->
                        <div class="align-self-center">
                            <div class="header-logo">
                                <?php the_custom_logo(); ?>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->

                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="header-search">
                              <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" class="ec-btn-group-form" >
									<input autocomplete="off" type="text" class="form-control" name="s" id="s"  value="<?php echo get_search_query() ?>" placeholder="Поиск">
									<button id="searchsubmit" type="submit" class="btn-submit"><i class="fa fa-search"></i></button>
								</form>
                            </div>
                        </div>
                        <!-- Ec Header Search End -->

                        <!-- Ec Header Button Start -->
                        <div class="align-self-center">
                            <div class="ec-header-bottons">
                                <div class="top-lang  hidden sm:block">
                                    <div class="top-lang-item">
                                        <div class="lang-icon"><i class="fa fa-globe"></i></div>
                                        <div class="locales hidden-xs language-menu">
                                            <?php pll_the_languages(array('dropdown'=>1, 'hide_if_empty'=>0)); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Header User Start -->
                                <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>" class="ec-header-btn ec-side-toggle">
                                    <div class="header-icon"><i class="fa fa-user"></i></div>
                                </a>
                                <!-- Header User End -->

                                <!-- Header Cart Start -->
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="ec-header-btn ec-side-toggle">
                                    <div class="header-icon"><i class="fa fa-shopping-cart"></i></div>
                                    <span class="ec-header-count ec-cart-count cart-count-lable"><?php echo WC()->cart->get_cart_contents_count() ?></span>
                                </a>
                                <!-- Header Cart End -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="d-lg-none d-block">
            <div class="mobile_el">
                <a data-bs-toggle="offcanvas" data-bs-target="#menu-main" href="#"><i class="fa fa-bars"></i></a>
                <a href="#" class="logo_image"><img src="images/color.svg"></a>
                <a href="#" class="search_button" data-bs-toggle="modal" data-bs-target="#search-modal"><i
                        class="fa fa-search"></i></a>
            </div>
        </div>
    </header>




<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bazarplus' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$bazarplus_description = get_bloginfo( 'description', 'display' );
			if ( $bazarplus_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $bazarplus_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bazarplus' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
