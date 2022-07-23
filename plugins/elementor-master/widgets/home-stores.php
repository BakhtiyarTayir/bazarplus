<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class HomeStores extends Widget_Base {

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
		return 'homeStores';
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
		return esc_html__( 'Home Stores', 'elementor' );
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
		return 'eicon-single-product';
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
		<section class="det-section-list">
			<div class="partners-items-section">
				<h2 class="section-title"><?php echo wp_kses( $settings['title'], array() ); ?></h2>
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
								'number'       => 6,
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