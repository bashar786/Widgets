<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly



class qualifications extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style('qualifications-css', get_template_directory_uri() . '/widgets/qualifications/qualifications.css', [], '1.1');

    wp_register_script('qualifications-js', get_template_directory_uri() . '/widgets/qualifications/qualifications.js', ['elementor-frontend', 'jquery'], '1.0.0', true);
  }

  public function get_script_depends()
  {
    return ['qualifications-js'];
  }

  public function get_style_depends()
  {
    return ['qualifications-css'];
  }


  public function get_name()
  {
    return 'Qualifications';
  }

  public function get_title()
  {
    return esc_html__('Qualifications', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-table-of-contents';
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
        'default' => esc_html__('Default Description', 'cabei'),
        'placeholder' => esc_html__('Type your Description here', 'cabei'),
      ]
    );


    $this->add_control(
      'first_image',
      [
        'label' => esc_html__('First Item Image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'first_title',
      [
        'label' => esc_html__('First Item Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'first_date',
      [
        'label' => esc_html__('First Item Date', 'cabei'),
        'type' => \Elementor\Controls_Manager::DATE_TIME,

        // 'default' => esc_html__('Default title', 'cabei'),
        // 'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );


    $this->add_control(
      'second_image',
      [
        'label' => esc_html__('Second Item Image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'second_title',
      [
        'label' => esc_html__('Second Item Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'second_date',
      [
        'label' => esc_html__('Second Item Date', 'cabei'),
        'type' => \Elementor\Controls_Manager::DATE_TIME,

        // 'default' => esc_html__('Default title', 'cabei'),
        // 'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );


    $this->add_control(
      'third_image',
      [
        'label' => esc_html__('Third Item Image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'third_title',
      [
        'label' => esc_html__('Third Item Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'third_date',
      [
        'label' => esc_html__('Third Item Date', 'cabei'),
        'type' => \Elementor\Controls_Manager::DATE_TIME,

        // 'default' => esc_html__('Default title', 'cabei'),
        // 'placeholder' => esc_html__('Type your title here', 'cabei'),
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


    $this->end_controls_section();
  }




  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $yrdatafirst = strtotime($settings['first_date']);
    $yrdatasecond = strtotime($settings['second_date']);
    $yrdatathird = strtotime($settings['third_date']);

?>




    <div class="widget-qualifications-v1">
      <div class="bg-blue ptb120">
        <div class="container-2">
          <div class="cont-def maw800 box-center tac">
            <h3><?php echo $settings['title'] ?></h3>
            <p><?php echo $settings['description'] ?></p>
          </div>
          <div class="calification-images-area b80 maw1050 box-center">
            <div class="row no-gutters">
              <div class="col-lg-4 calification-el">
                <div class="calification-image eq-h"><img src="<?php echo $settings['first_image']['url'] ?>" alt=""></div>
                <div class="calification-image__title"><?php echo $settings['first_title'] ?></div>
                <div class="calification-image__date"><?php echo date('F Y', $yrdatafirst); ?></div>
              </div>
              <div class="col-lg-4 calification-el">
                <div class="calification-image eq-h"><img src="<?php echo $settings['second_image']['url'] ?>" alt=""></div>
                <div class="calification-image__title"><?php echo $settings['second_title'] ?></div>
                <div class="calification-image__date"><?php echo date('F Y', $yrdatasecond); ?></div>
              </div>
              <div class="col-lg-4 calification-el">
                <div class="calification-image eq-h">
                    <img src="<?php echo $settings['third_image']['url'] ?>" alt="">
                </div>
                <div class="calification-image__title"><?php echo $settings['third_title'] ?></div>
                <div class="calification-image__date"><?php echo date('F Y', $yrdatathird); ?></div>
              </div>
            </div>
          </div>
          <div class="calification-bottom-desc b48 maw1050 box-center"><?php echo $settings['content'] ?></div>
        </div>
      </div>
    </div>


<?php
  }
}

?>