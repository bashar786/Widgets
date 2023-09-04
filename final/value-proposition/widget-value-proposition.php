<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class valueProposition extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('value-proposition-js', get_template_directory_uri() . '/widgets/value-proposition/value-proposition.js', ['elementor-frontend', 'jquery'], '1.0.0', true);
    wp_register_script('value-proposition-elementor-js', get_template_directory_uri() . '/widgets/value-proposition/value-proposition-elementor.js', ['elementor-frontend', 'jquery'], '1.0.0', true);

    wp_register_style('value-proposition-css', get_template_directory_uri() . '/widgets/value-proposition/value-proposition.css', [], '1.1');
  }

  public function get_script_depends()
  {
    return ['value-proposition-js', 'value-proposition-elementor-js'];
  }

  public function get_style_depends()
  {
    return ['value-proposition-css'];
  }


  public function get_name()
  {
    return 'valueProposition';
  }

  public function get_title()
  {
    return __('Value Proposition', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-countdown';
  }

  public function get_categories()
  {
    return ['cabei'];
  }


  protected function register_controls()
  {

    $this->start_controls_section(
      'options',
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
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'description',
      [
        'label' => esc_html__('Description', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Description', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $this->add_control(
      'left_button_text',
      [
        'label' => esc_html__('Type Left Button Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Button', 'cabei'),
        'placeholder' => esc_html__('Type your button text here', 'cabei'),
      ]
    );

    $this->add_control(
      'left_button_link',
      [
        'label' => esc_html__('Left Button Url', 'cabei'),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'cabei'),
        'options' => ['url', 'is_external', 'nofollow'],
        'default' => [
          'url' => '',
          'is_external' => true,
          'nofollow' => true,
        ],
        'label_block' => true,
      ]
    );

    $this->add_control(
      'right_button_text',
      [
        'label' => esc_html__('Type Right Button Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Button', 'cabei'),
        'placeholder' => esc_html__('Type your button text here', 'cabei'),
      ]
    );

    $this->add_control(
      'right_button_link',
      [
        'label' => esc_html__('Right Button Url', 'cabei'),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'cabei'),
        'options' => ['url', 'is_external', 'nofollow'],
        'default' => [
          'url' => '',
          'is_external' => true,
          'nofollow' => true,
        ],
        'label_block' => true,
      ]
    );


    $this->add_control(
      'first_counter_number',
      [
        'label' => esc_html__('First Counter Number', 'elementor'),
        'type' => Controls_Manager::NUMBER,
        'default' => 10,
        'dynamic' => [
          'active' => true,
        ],
      ]
    );

    $this->add_control(
      'first_counter_text',
      [
        'label' => esc_html__('First Counter Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default Text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $this->add_control(
      'second_counter_number',
      [
        'label' => esc_html__('Second Counter Number', 'elementor'),
        'type' => Controls_Manager::NUMBER,
        'default' => 10,
        'dynamic' => [
          'active' => true,
        ],
      ]
    );

    $this->add_control(
      'second_counter_text',
      [
        'label' => esc_html__('Second Counter Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default Text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $this->add_control(
      'third_counter_number',
      [
        'label' => esc_html__('Third Counter Number', 'elementor'),
        'type' => Controls_Manager::NUMBER,
        'default' => 10,
        'dynamic' => [
          'active' => true,
        ],
      ]
    );

    $this->add_control(
      'third_counter_text',
      [
        'label' => esc_html__('Third Counter Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default Text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $this->add_control(
      'fourth_counter_number',
      [
        'label' => esc_html__('Fourth Counter Number', 'elementor'),
        'type' => Controls_Manager::NUMBER,
        'default' => 10,
        'dynamic' => [
          'active' => true,
        ],
      ]
    );

    $this->add_control(
      'fourth_counter_text',
      [
        'label' => esc_html__('Fourth Counter Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default Text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );


    $this->end_controls_section();
  }


  protected function render()
  {
    $settings = $this->get_settings_for_display();

   ?>

    <div class="widget-value-proposition-v1">
      <div class="bg-blue ptb120">
        <div class="container-2">
          <div class="cont-def maw990 box-center tac">
            <h3><?php echo $settings['title']; ?></h3>
            <p><?php echo $settings['description']; ?></p>
          </div>
          <div class="b50"></div>
          <div class="row b-30 row-24 tac justify-content-center">
            <div class="col-md-auto b30">
              <a class="b24 btn-rounded hover-animate-arrow-right fadeIn" href="<?php echo $settings['left_button_link']['url']; ?>">
                <div class="row row-4 align-items-center">
                  <div class="col">
                    <div class="text-15 text-w-500"><?php echo $settings['left_button_text']; ?></div>
                  </div>
                  <div class="col-auto">
                    <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                      <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom' ?>"></use>
                    </svg>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-auto b30">
              <a class="b24 btn-rounded hover-animate-arrow-right fadeIn" href="<?php echo $settings['right_button_link']['url']; ?>">
                <div class="row row-4 align-items-center">
                  <div class="col">
                    <div class="text-15 text-w-500"><?php echo $settings['right_button_text']; ?></div>
                  </div>
                  <div class="col-auto">
                    <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                      <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom' ?>"></use>
                    </svg>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="b75"></div>
          <div class="row row-40 b-30 val-pr-el-col-row">
            <div class="col-lg-3 col-md-6 b30 fadeIn val-pr-el-col">
              <div class="val-pr-el">
                <div class="val-pr-el__title"> <span class="counter" data-counter="<?php echo $settings['first_counter_number']; ?>"></span><span>+</span></div>
                <div class="val-pr-el__text"><?php echo $settings['first_counter_text']; ?></div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 b30 fadeIn val-pr-el-col">
              <div class="val-pr-el">
                <div class="val-pr-el__title"> <span class="counter" data-counter="<?php echo $settings['second_counter_number']; ?>"></span><span>+</span></div>
                <div class="val-pr-el__text"><?php echo $settings['second_counter_text']; ?></div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 b30 fadeIn val-pr-el-col">
              <div class="val-pr-el">
                <div class="val-pr-el__title"> <span class="counter" data-counter="<?php echo $settings['third_counter_number']; ?>"></span></div>
                <div class="val-pr-el__text"><?php echo $settings['third_counter_text']; ?></div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 b30 fadeIn val-pr-el-col">
              <div class="val-pr-el">
                <div class="val-pr-el__title"> <span class="counter" data-counter="<?php echo $settings['fourth_counter_number']; ?>"></span><span>+</span></div>
                <div class="val-pr-el__text"><?php echo $settings['fourth_counter_text']; ?></div>
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