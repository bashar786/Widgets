<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class showcaseGrid extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('showcase-grid-js', get_template_directory_uri() . '/widgets/showcase-grid/showcase-grid.js', ['elementor-frontend', 'jquery'], '1.0.0', true);
    wp_register_script('showcase-grid-elementor-js', get_template_directory_uri() . '/widgets/showcase-grid/showcase-grid-elementor.js', ['elementor-frontend', 'jquery'], '1.0.0', true);

    wp_register_style('showcase-grid-css', get_template_directory_uri() . '/widgets/showcase-grid/showcase-grid.css', [], '1.1');
  }

  public function get_script_depends()
  {
    return ['showcase-grid-js', 'showcase-grid-elementor-js'];
  }

  public function get_style_depends()
  {
    return ['showcase-grid-css'];
  }


  public function get_name()
  {
    return 'showcaseGrid';
  }

  public function get_title()
  {
    return __('Showcase Grid', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-gallery-grid';
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
      'first_showcase_grid_number',
      [
        'label' => esc_html__('First Showcase Grid Number', 'elementor'),
        'type' => Controls_Manager::NUMBER,
        'default' => 10,
        'dynamic' => [
          'active' => true,
        ],
      ]
    );

    $this->add_control(
      'first_showcase_grid_text',
      [
        'label' => esc_html__('First Showcase Grid Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'label_block' => true,
        'default' => esc_html__('Default Text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $this->add_control(
      'second_showcase_grid_number',
      [
        'label' => esc_html__('Second Showcase Grid Number', 'elementor'),
        'type' => Controls_Manager::NUMBER,
        'default' => 10,
        'dynamic' => [
          'active' => true,
        ],
      ]
    );

    $this->add_control(
      'second_showcase_grid_suffix',
      [
        'label' => esc_html__('Second Showcase Grid Suffix', 'elementor'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('m2', 'cabei'),
      ]
    );

    $this->add_control(
      'second_showcase_grid_text',
      [
        'label' => esc_html__('Second Showcase Grid Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'label_block' => true,
        'default' => esc_html__('Default Text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $this->add_control(
      'third_showcase_grid_image',
      [
        'label' => esc_html__('Choose Third Showcase Grid Image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );


    $this->add_control(
      'third_showcase_grid_number',
      [
        'label' => esc_html__('Third Showcase Grid Number', 'elementor'),
        'type' => Controls_Manager::NUMBER,
        'default' => 10,
        'dynamic' => [
          'active' => true,
        ],
      ]
    );

    $this->add_control(
      'third_showcase_grid_text',
      [
        'label' => esc_html__('Third Showcase Grid Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Default Text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $this->add_control(
      'fourth_showcase_grid_image',
      [
        'label' => esc_html__('Choose Fourth Showcase Grid Image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'fourth_showcase_grid_prefix',
      [
        'label' => esc_html__('Fourth Showcase Grid Prefix', 'elementor'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('US$', 'cabei'),
      ]
    );


    $this->add_control(
      'fourth_showcase_grid_number',
      [
        'label' => esc_html__('Fourth Showcase Grid Number', 'elementor'),
        'type' => Controls_Manager::NUMBER,
        'default' => 10,
        'dynamic' => [
          'active' => true,
        ],
      ]
    );

    $this->add_control(
      'fourth_showcase_grid_suffix',
      [
        'label' => esc_html__('Fourth Showcase Grid Suffix', 'elementor'),
        'type' => Controls_Manager::TEXT,
        'default' => esc_html__('M', 'cabei'),
      ]
    );

    $this->add_control(
      'fourth_showcase_grid_text',
      [
        'label' => esc_html__('Fourth Showcase Grid Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
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

    <div class="widget-showcase-grid-v1">
      <div class="container-2">
        <div class="showcase-grid__inner">
          <div class="row b-30">
            <div class="col-lg-5 b30 cont-def fadeIn">
              <h3><?php echo $settings['title']; ?></h3>
            </div>
            <div class="col-lg-7 b30 cont-def fadeIn text-w-500">
              <p><?php echo $settings['description']; ?></p>
            </div>
          </div>
          <div class="b85">
            <div class="showcase-grid-b">
              <div class="sh-g-el shg1">
                <div class="sh-g-el__title"> <span class="counter" data-counter="<?php echo $settings['first_showcase_grid_number']; ?>"></span><span>+</span></div>
                <div class="sh-g-el__desc"><?php echo $settings['first_showcase_grid_text']; ?> </div>
              </div>
              <div class="sh-g-el shg2">
                <div class="sh-g-el__title"><span class="counter" data-counter="<?php echo $settings['second_showcase_grid_number']; ?>"> </span>
                  <span> <?php echo $settings['second_showcase_grid_suffix']; ?></span>
                </div>
                <div class="sh-g-el__desc"><?php echo $settings['second_showcase_grid_text']; ?> </div>
              </div>
              <div class="sh-g-el shg3">
                <div class="circle-icon circle-icon__white circle-icon__inner-shadow">
                  <div class="circle-icon-inner"> <img src="<?php echo $settings['third_showcase_grid_image']['url']; ?>" alt=""></div>
                </div>
                <div class="sh-g-el__title"> <span class="counter" data-counter="<?php echo $settings['third_showcase_grid_number']; ?>"></span><span>+</span></div>
                <div class="sh-g-el__desc"><?php echo $settings['third_showcase_grid_text']; ?> </div>
              </div>
              <div class="sh-g-el shg4">
                <div class="circle-icon circle-icon__white circle-icon__inner-shadow">
                  <div class="circle-icon-inner"> <img src="<?php echo $settings['fourth_showcase_grid_image']['url']; ?>" alt=""></div>
                </div>
                <div class="sh-g-el__title"> <span><?php echo $settings['fourth_showcase_grid_prefix']; ?></span>
                <span class="counter" data-counter="<?php echo $settings['fourth_showcase_grid_number']; ?>"></span>
                <span><?php echo $settings['fourth_showcase_grid_suffix']; ?></span></div>
                <div class="sh-g-el__desc"><?php echo $settings['fourth_showcase_grid_text']; ?> </div>
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