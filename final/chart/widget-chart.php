<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class chart extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('chart-js', get_template_directory_uri() . '/widgets/chart/chart.js', ['elementor-frontend', 'jquery'], '1.0.0', true);
    wp_register_script('chart-elementor-js', get_template_directory_uri() . '/widgets/chart/chart-elementor.js', ['elementor-frontend', 'jquery'], '1.0.0', true);

    wp_register_style('chart-css', get_template_directory_uri() . '/widgets/chart/chart.css', [], '1.1');
  }

  public function get_script_depends()
  {
    return ['chart-js', 'chart-elementor-js'];
  }

  public function get_style_depends()
  {
    return ['chart-css'];
  }


  public function get_name()
  {
    return 'chart';
  }

  public function get_title()
  {
    return __('Chart', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-image';
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
      'chart_title_first',
      [
        'label' => esc_html__('Chart First Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'chart_title_second',
      [
        'label' => esc_html__('Chart Second Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );


    $this->end_controls_section();
  }


  protected function render()
  {
    $settings = $this->get_settings_for_display();

?>

    <div class="widget-chart-v1">
      <div class="ptb120">
        <div class="container-2">
          <div class="chart-wrapper">
            <div class="chart-title-1"><?php echo $settings['chart_title_first'] ?></div>
            <div class="chart-title-2"><?php echo $settings['chart_title_second'] ?></div>
            <canvas class="chart-finan"></canvas>
          </div>
        </div>
      </div>
    </div>

<?php
  }
}

?>