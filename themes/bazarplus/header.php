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
                <?php
				 $logo_img = '';
				if( $custom_logo_id = get_theme_mod('custom_logo') ){
					$logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
						'class'    => 'custom-logo',
						'itemprop' => 'logo',
					) );
				}
				?>
				<a href="<?php echo home_url(); ?>" class="logo_image"><?php echo $logo_img; ?></a>
                <a href="#" class="search_button" data-bs-toggle="modal" data-bs-target="#search-modal"><i
                        class="fa fa-search"></i></a>
            </div>
        </div>
    </header>



<div id="page" class="site page-content header-clear-medium">
