<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly



class contentWithImage extends Widget_Base
{

  // INNER SCRIPTS

	public function __construct($data = [], $args = null)
	{
		parent::__construct($data, $args);

		wp_register_style('content-with-image-css', get_template_directory_uri() . '/widgets/content-with-image/content-with-image.css', [], '1.1');
	}

	public function get_script_depends()
	{
		return [];
	}

	public function get_style_depends()
	{
		return ['content-with-image-css'];
	}


	public function get_name()
	{
		return 'contentWithImage';
	}

	public function get_title()
	{
		return esc_html__('Content With Image', 'cabei');
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
			'subtitle',
			[
				'label' => esc_html__('Sub Title', 'cabei'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Default title', 'cabei'),
				'placeholder' => esc_html__('Type your title here', 'cabei'),
			]
		);



		$this->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'cabei'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Default content', 'cabei'),
				'placeholder' => esc_html__('Type your content here', 'cabei'),
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


		<div class="widget-content-with-image-v1">
			<div class="ptb120">
				<div class="container-2">
					<div class="row b-30 justify-content-between">
						<div class="col-lg-6 b30">
							<h4 class="text-32"><?php echo $settings['title'] ?></h4>
							<h5 class="text-24 text-green b5"><?php echo $settings['subtitle'] ?></h5>
							<div class="b20 cont-def">
								<p><?php echo $settings['content'] ?></p>
							</div>
						</div>
						<div class="col-lg-auto b30">
							<div class="content-with-image-box">
								<picture>
									<img class="responsive-img" src="<?php echo $settings['image']['url'] ?>"  alt="">
								</picture>
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