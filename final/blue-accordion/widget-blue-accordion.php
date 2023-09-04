<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class blueAccordion extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('blue-accordion', get_template_directory_uri() . '/widgets/blue-accordion/blue-accordion.js', ['elementor-frontend', 'jquery'], '1.0.2', true);
    wp_register_script('blue-accordion-elementor', get_template_directory_uri() . '/widgets/blue-accordion/blue-accordion-elementor.js', ['elementor-frontend', 'jquery'], '1.0.3', true);

    wp_register_style('blue-accordion', get_template_directory_uri() . '/widgets/blue-accordion/blue-accordion.css', [], '1.3');
  }

  public function get_style_depends()
  {
    return ['blue-accordion'];
  }

  public function get_script_depends()
  {
    return ['blue-accordion', 'blue-accordion-elementor'];
  }


  public function get_name()
  {
    return 'blueAccordion';
  }

  public function get_title()
  {
    return __('Blue Accordion', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-accordion';
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
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'description',
      [
        'label' => esc_html__('Description', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Default Description', 'cabei'),
        'placeholder' => esc_html__('Type your description here', 'cabei'),
      ]
    );

    $this->add_control(
      'blue_acc_main_title',
      [
        'label' => esc_html__('Main Accordion Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );


    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'blue_acc_title',
      [
        'label' => esc_html__('Accordion Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );


    $repeater->add_control(
      'blue_acc_description',
      [
        'label' => esc_html__('Accordion Description', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Defaul Description', 'cabei'),
        'placeholder' => esc_html__('Type your description here', 'cabei'),
      ]
    );

    $this->add_control(
      'blue_accordion',
      [
        'label' => esc_html__('Document Accoordion', 'cabei'),
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

    <div class="widget-blue-accordion-v1">
      <div class="bg-blue ptb120">
        <div class="container-2">
          <div class="cont-def tac maw800 box-center">
            <h3> <?php echo $settings['title']; ?> </h3>
            <p><?php echo $settings['description']; ?></p>
          </div>
          <div class="maw1230">
            <h4 class="text-24 text-w-700 b48"><?php echo $settings['blue_acc_main_title']; ?></h4>
            <div class="b48"></div>
            <div class="row b-25">
              <?php foreach ($settings['blue_accordion'] as $key => $item) : ?>
                <div class="col-12 b25 fadeIn">
                  <div class="doc-relac-title">
                    <div class="row align-items-center">
                      <div class="col text-w-500"><?php echo $item['blue_acc_title']; ?></div>
                      <div class="col-auto">
                        <div class="doc-relac-title__icon"></div>
                      </div>
                    </div>
                  </div>
                  <div class="doc-relac-body">
                    <p><?php echo $item['blue_acc_description']; ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
  }
}
?>