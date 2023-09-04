<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly



class featuresCarouselLight extends Widget_Base
{

		// INNER SCRIPTS

		public function __construct($data = [], $args = null) {
    parent::__construct($data, $args);

    wp_register_script( 'features-carousel-light', get_template_directory_uri() . '/widgets/features-carousel-light/features-carousel-light.js', ['elementor-frontend', 'jquery'], '1.0.0', true );
    wp_register_script( 'features-carousel-light-elementor', get_template_directory_uri() . '/widgets/features-carousel-light/features-carousel-light-elementor.js', ['elementor-frontend', 'jquery'], '1.0.0', true );

		wp_register_style('features-carousel-light-css', get_template_directory_uri() . '/widgets/features-carousel-light/features-carousel-light.css', [], '1.1' );
 }

 public function get_script_depends() {
     return [ 'features-carousel-light', 'features-carousel-light-elementor'];
 }

 public function get_style_depends() {
  return [ 'features-carousel-light-css' ];
}


public function get_name() {
	return 'featuresCarouselLight';
}

	public function get_title()
	{
		return esc_html__('Features Carousel Light', 'cabei');
	}

	public function get_icon()
	{
		return 'eicon-slider-push';
	}
	public function get_categories()
	{
		return ['cabei'];
	}


	protected function register_controls()
	{

		$this->start_controls_section(
			'section_options',
			[
				'label' => __('Options', 'cabei'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'cabei' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'cabei' ),
				'placeholder' => esc_html__( 'Type your title here', 'cabei' ),
			]
		);

    $repeater = new \Elementor\Repeater();
    
    $repeater->add_control(
			'item_text',
			[
				'label' => esc_html__( 'Item text', 'cabei' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default text', 'cabei' ),
				'placeholder' => esc_html__( 'Type your text here', 'cabei' ),
			]
		);

		$repeater->add_control(
        'item_link',
        [
          'label' => esc_html__( 'Item link', 'cabei' ),
          'type' => \Elementor\Controls_Manager::URL,
          'placeholder' => esc_html__( 'https://your-link.com', 'cabei' ),
          'options' => [ 'url', 'is_external', 'nofollow' ],
          'default' => [
            'url' => '',
            'is_external' => true,
            'nofollow' => true,
          ],
          'label_block' => true,
        ]
      );

    $repeater->add_control(
        'item_image',
        [
          'label' => esc_html__( 'Item image', 'cabei' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

    $this->add_control(
			'slider_repeater',
			[
				'label' => esc_html__( 'Carousel items', 'cabei' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

	}




	protected function render()
	{
		$settings = $this->get_settings_for_display();

?>




<div class="widget-features-carousel-light-v1"> 
  <div class="ptb120 bg-grey">
    <div class="container-2">
      <div class="row align-items-end b-24">
        <div class="col-md b24">
          <div class="contain-header maw800 fadeIn tac fade__unit--shown">
            <h3 class="text-40"><?php echo $settings['title'] ?></h3>
          </div>
        </div>
      </div>
      <div class="swiper swiper-features-carousel b60">
        <div class="swiper-wrapper"> 
        	<?php foreach( $settings['slider_repeater'] as $index => $item ) : ?>
          <div class="swiper-slide eq-hf fadeIn"> 
          	<a class="strategy-box slide-arrow-hover-animate d-block" href="<?php echo $item['item_link']['url']; ?>"> 
              <div class="circle-icon circle-icon__white circle-icon__inner-shadow">
                <div class="circle-icon-inner"> <img src="<?php echo $item['item_image']['url'] ?>" alt=""></div>
              </div>
              <h4 class="text-24"><?php echo $item['item_text'] ?></h4>
            </a>
          </div>
          <?php endforeach; ?>
        </div>  
          
        <div class="b40"></div>
        <div class="row justify-content-between align-items-end b-30">
          <div class="col-lg-auto b30">
            <div class="swiper-scrollbar w720"></div>
          </div>
          <div class="col-lg-auto b30">
            <div class="arrow-nav-wrap-custom w130 b0">
              <div class="sl-nav-arrow-next">
                <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-custom'; ?>"></use>
                </svg>
              </div>
              <div class="sl-nav-arrow-prev">
                <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-custom'; ?>"></use>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
	}

}

?>