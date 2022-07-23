<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class PopularProducts extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve image box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'popularProducts';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve image box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Popular products', 'elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve image box widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-products';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'basic' );
	}
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 'master' );
	}

	/**
	 * Register image box widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'elementor-master' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'money_symbol',
			array(
				'label'   => __( 'Money symbol', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render image box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'description', 'basic' );
		?>
		<div class="container">
			<section>
                <h2 class="section-title"><?php echo wp_kses( $settings['title'], array() ); ?></h2>
                <div class="collections owl-carousel">

				<?php  
					$args = array(
						'posts_per_page' => 12,
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
						
						<a href="<?php the_permalink(); ?>" class="styles_container__3wHdd">
							<div class="styles_image__6d1qy"><img src="<?php echo woocommerce_get_product_thumbnail(); ?>"></div>
							<div class="styles_product__172_i">
								<div class="styles_product__name__71XoP"><?php the_title(); ?></div>
								<div class="styles_price__1Opbu">
									<div class="styles_price__current__2CWVb"><?php echo $product->get_price(); echo wp_kses( $settings['money_symbol'], array() ); ?></div>
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
            </section>
		</div>
		<script>
			jQuery('.collections').owlCarousel({
				nav: !0,
				dots: !1,
				margin: 30,
				loop: !0,
				touchDrag: !0,
				navText: ['<span aria-label="Previous">‹</span>', '<span aria-label="Next">›</span>'],
				responsive: {
					0: {
						items: 2,
						mouseDrag: !0,
						stagePadding: 25
					},
					500: {
						items: 2
					},
					700: {
						items: 4
					}
				}
			})
		</script>
<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	
}