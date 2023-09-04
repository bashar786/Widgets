<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly



class Nota extends Widget_Base
{

	// INNER SCRIPTS

	public function __construct($data = [], $args = null)
	{
		parent::__construct($data, $args);

		wp_register_style('nota-css', get_template_directory_uri() . '/widgets/nota/nota.css', [], '1.1');
	}



	public function get_style_depends()
	{
		return ['nota-css'];
	}


	public function get_name()
	{
		return 'nota';
	}

	public function get_title()
	{
		return esc_html__('Nota', 'cabei');
	}

	public function get_icon()
	{
		return 'eicon-single-page';
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
				'label' => esc_html__('Title', 'cabei'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Default title', 'cabei'),
				'placeholder' => esc_html__('Type your title here', 'cabei'),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__('Description', 'cabei'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Default description', 'cabei'),
				'placeholder' => esc_html__('Type your description here', 'cabei'),
			]
		);



		$this->add_control(
			'button_text',
			[
				'label' => esc_html__('Button Text', 'cabei'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Button', 'cabei'),
				'placeholder' => esc_html__('Type your text here', 'cabei'),
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' => esc_html__('Button Url', 'cabei'),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => esc_html__('www.test.com', 'cabei'),
				'placeholder' => esc_html__('Enter your url here', 'cabei'),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__('Choose Image', 'cabei'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->end_controls_section();
	}




	protected function render()
	{
		$settings = $this->get_settings_for_display();

?>



		<div class="widget-nota-v1">
			<div class="ptb120">
				<div class="container-2">
					<div class="row b-41 row-21">
						<div class="col-md-6 b41">
							<div class="maw680 text-def-alt fadeIn">
								<h3 class="text-32"><?php echo $settings['title']; ?></h3>
								<p><i><?php echo $settings['description']; ?></i></p>
							</div><a class="btn-rounded btn-rounded-blue hover-animate-arrow-right fadeIn b32" href="<?php echo $settings['button_url']['url']; ?>">
								<div class="row row-4 align-items-center">
									<div class="col">
										<div class="text-15 text-w-600"><?php echo $settings['button_text']; ?></div>
									</div>
									<div class="col-auto">
										<svg class="icon" width="20" height="8" viewBox="0 0 20 8">
											<use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom' ?>"></use>
										</svg>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-6 b41">
							<div class="ml-auto crop-image">
								<img class="responsive-img" src="<?php echo $settings['image']['url'] ?>" alt="">
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