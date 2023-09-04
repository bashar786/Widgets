<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly



class headingWithText extends Widget_Base
{

		// INNER SCRIPTS

		public function __construct($data = [], $args = null) {
    parent::__construct($data, $args);

    wp_register_style('widget-heading-with-text-css', get_template_directory_uri() . '/widgets/widget-heading-with-text/widget-heading-with-text.css', [], '1.1' );
 }

 public function get_script_depends() {
     return [ ''];
 }

 public function get_style_depends() {
  return [ 'widget-heading-with-text-css' ];
}


public function get_name() {
	return 'headingWithText';
}

	public function get_title()
	{
		return esc_html__('Heading with text', 'cabei');
	}

	public function get_icon()
	{
		return 'eicon-t-letter';
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

    $this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'cabei' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Default description', 'cabei' ),
				'placeholder' => esc_html__( 'Type your description here', 'cabei' ),
			]
		);


		$this->end_controls_section();
	}




	protected function render()
	{
		$settings = $this->get_settings_for_display();

?>

<div class="widget-heading-with-text-v1"> 
  <div class="bg-grey ptb120"> 
    <div class="container-2 tac cont-def"> 
      <div class="maw940 box-center">
        <h3><?php echo $settings['title'] ?></h3>
        <p><?php echo $settings['description'] ?></p>
      </div>
    </div>
  </div>
</div>

<?php
	}

}

?>