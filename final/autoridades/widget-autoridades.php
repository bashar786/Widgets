<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Autoridades extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style('widget-autoridades-css', get_template_directory_uri() . '/widgets/autoridades/autoridades.css', [], '1.1');
  }


  public function get_style_depends()
  {
    return ['widget-autoridades-css'];
  }

  public function get_name()
  {
    return 'Autoridades';
  }

  public function get_title()
  {
    return esc_html__('Autoridades', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-person';
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
      'first_autoridades_image',
      [
        'label' => esc_html__('First Autoridades image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'first_autoridades_name',
      [
        'label' => esc_html__('First Autoridades Name', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default name', 'cabei'),
        'placeholder' => esc_html__('Type your name here', 'cabei'),
      ]
    );

    $this->add_control(
      'first_autoridades_sub_name',
      [
        'label' => esc_html__('First Autoridades Sub Name', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default sub name', 'cabei'),
        'placeholder' => esc_html__('Type your name here', 'cabei'),
      ]
    );

    $this->add_control(
      'second_autoridades_image',
      [
        'label' => esc_html__('Second Autoridades image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'second_autoridades_name',
      [
        'label' => esc_html__('Second Autoridades Name', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default name', 'cabei'),
        'placeholder' => esc_html__('Type your name here', 'cabei'),
      ]
    );

    $this->add_control(
      'second_autoridades_sub_name',
      [
        'label' => esc_html__('Second Autoridades Sub Name', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default sub name', 'cabei'),
        'placeholder' => esc_html__('Type your name here', 'cabei'),
      ]
    );

    $this->add_control(
      'third_autoridades_image',
      [
        'label' => esc_html__('Third Autoridades image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'third_autoridades_name',
      [
        'label' => esc_html__('Third Autoridades Name', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default name', 'cabei'),
        'placeholder' => esc_html__('Type your name here', 'cabei'),
      ]
    );

    $this->add_control(
      'third_autoridades_sub_name',
      [
        'label' => esc_html__('First Autoridades Sub Name', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default sub name', 'cabei'),
        'placeholder' => esc_html__('Type your name here', 'cabei'),
      ]
    );


    $this->end_controls_section();
  }


  protected function render()
  {
    $settings = $this->get_settings_for_display();


 ?>

    <div class="widget-autoridades-v1">
      <div class="ptb120">
        <div class="container-2">
          <div class="cont-def">
            <h3><?php echo $settings['title'] ?></h3>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 b30">
              <div class="autoridades-el">
                <div class="autoridades-el__photo" style="background-image: url('<?php echo $settings['first_autoridades_image']['url'] ?>');"></div>
                <div class="autoridades-el__name"><?php echo $settings['first_autoridades_name'] ?></div>
                <div class="autoridades-el__sub-name"><?php echo $settings['first_autoridades_sub_name'] ?></div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 b30">
              <div class="autoridades-el">
                <div class="autoridades-el__photo" style="background-image: url('<?php echo $settings['second_autoridades_image']['url'] ?>');"></div>
                <div class="autoridades-el__name"><?php echo $settings['second_autoridades_name'] ?></div>
                <div class="autoridades-el__sub-name"><?php echo $settings['second_autoridades_sub_name'] ?></div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 b30">
              <div class="autoridades-el">
                <div class="autoridades-el__photo" style="background-image: url('<?php echo $settings['third_autoridades_image']['url'] ?>');"></div>
                <div class="autoridades-el__name"><?php echo $settings['third_autoridades_name'] ?></div>
                <div class="autoridades-el__sub-name"><?php echo $settings['third_autoridades_sub_name'] ?></div>
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