<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly



class greyGeading extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style('grey-geading-css', get_template_directory_uri() . '/widgets/grey-geading/grey-geading.css', [], '1.1');
  }


  public function get_style_depends()
  {
    return ['grey-geading-css'];
  }


  public function get_name()
  {
    return 'greyGeading';
  }

  public function get_title()
  {
    return esc_html__('Grey Geading', 'cabei');
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


    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();

?>

    <div class="widget-grey-geading-v1">
      <div class="top-right-decor-white"></div>
      <div class="ptb120 bg-grey">
        <div class="container-2">
          <div class="cont-def tac maw920 box-center">
            <h4 class="text-30"><?php echo $settings['title'] ?></h4>
            <p><?php echo $settings['description'] ?></p>
          </div>
        </div>
      </div>
    </div>

<?php
  }
}

?>