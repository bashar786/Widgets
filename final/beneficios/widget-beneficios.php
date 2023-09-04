<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly



class Beneficios extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('beneficios', get_template_directory_uri() . '/widgets/beneficios/beneficios.js', ['elementor-frontend', 'jquery'], '1.0.0', true);
    wp_register_script('beneficios-elementor', get_template_directory_uri() . '/widgets/beneficios/beneficios-elementor.js', ['elementor-frontend', 'jquery'], '1.0.0', true);

    wp_register_style('beneficios-css', get_template_directory_uri() . '/widgets/beneficios/beneficios.css', [], '1.1');
  }

  public function get_script_depends()
  {
    return ['beneficios', 'beneficios-elementor'];
  }

  public function get_style_depends()
  {
    return ['beneficios-css'];
  }


  public function get_name()
  {
    return 'Beneficios';
  }

  public function get_title()
  {
    return esc_html__('Beneficios', 'cabei');
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


    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'item_text',
      [
        'label' => esc_html__('Item text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $this->add_control(
      'slider_repeater',
      [
        'label' => esc_html__('Carousel items', 'cabei'),
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




    <div class="widget-beneficios-v1">
      <div class="ptb120">
        <div class="container-2">
          <div class="row align-items-end b-24">
            <div class="col-md b24">
              <div class="contain-header maw800 fadeIn tac">
                <h3 class="text-40"><?php echo $settings['title'] ?></h3>
                <p><?php echo $settings['description'] ?></p>
              </div>
            </div>
          </div>
          <div class="swiper swiper-beneficios b48">
            <div class="swiper-wrapper">
              <?php foreach ($settings['slider_repeater'] as $index => $item) : ?>
                <div class="swiper-slide fadeIn">
                  <div class="beneficios-el">
                    <div class="beneficios-el__icon">
                      <div class="svg-image-ben-icon"></div>
                    </div>
                    <div class="beneficios-el__name"><?php echo $item['item_text'] ?></div>
                  </div>
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