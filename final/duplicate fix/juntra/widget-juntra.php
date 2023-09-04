<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Juntra extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('juntra-js', get_template_directory_uri() . '/widgets/juntra/juntra.js', ['elementor-frontend', 'jquery'], '1.0.0', true);
    wp_register_script('juntra-elementor', get_template_directory_uri() . '/widgets/juntra/juntra-elementor.js', ['elementor-frontend', 'jquery'], '1.0.0', true);

    wp_register_style('juntra-css', get_template_directory_uri() . '/widgets/juntra/juntra.css', [], '1.1');
  }

  public function get_script_depends()
  {
    return ['juntra-js', 'juntra-elementor'];
  }

  public function get_style_depends()
  {
    return ['juntra-css'];
  }


  public function get_name()
  {
    return 'Juntra';
  }

  public function get_title()
  {
    return __('Juntra', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-post-excerpt';
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
      'sub_title',
      [
        'label' => esc_html__('Subtitle', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default subtitle', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $this->add_control(
      'first_list_title',
      [
        'label' => esc_html__('Fist List Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'second_list_title',
      [
        'label' => esc_html__('Second List Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'third_list_title',
      [
        'label' => esc_html__('Third List Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'load_more_button_text',
      [
        'label' => esc_html__('Load More Button Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Load More', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );


    $repeater = new \Elementor\Repeater();


    $repeater->add_control(
      'first_item_text',
      [
        'label' => esc_html__('First Item text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'label_block' => true,
        'default' => esc_html__('Default text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ],
    );

    $repeater->add_control(
      'second_item_text',
      [
        'label' => esc_html__('Second Item  text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'label_block' => true,
        'default' => esc_html__('Default text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ],
    );

    $repeater->add_control(
      'third_item_text',
      [
        'label' => esc_html__('Third Item text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'label_block' => true,
        'default' => esc_html__('Default text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ],
    );

    $this->add_control(
      'items',
      [
        'label' => esc_html__('Items', 'cabei'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls()
      ]
    );

    $this->end_controls_section();
  }


  protected function render()
  {
    $settings = $this->get_settings_for_display();

?>

    <div class="widget-juntra-v1">
      <div class="ptb120">
        <div class="presidents__inner">
          <div class="container-2">
            <div class="presidents__info maw800 tac">
              <h3 class="text-40 fadeIn"><?php echo $settings['title']; ?></h3>
            </div>
            <h4 class="text-30 b80"><?php echo $settings['sub_title']; ?></h4>
            <div class="presidents__list">
              <div class="presidents__list-thead row align-items-center fadeIn xs-hide">
                <div class="presidents__list-th col-md-4 col"><?php echo $settings['first_list_title']; ?></div>
                <div class="presidents__list-th col-md-3 col"><?php echo $settings['second_list_title']; ?></div>
                <div class="presidents__list-th col-md-5 col"><?php echo $settings['third_list_title']; ?></div>
              </div>
              <div class="presidents__list-tbody">
                <?php foreach ($settings['items'] as $item) : ?>
                  <div class="presidents__list-row row align-items-center fadeIn">
                    <div class="presidents__list-td col-md-4 col"><span><?php echo $item['first_item_text']; ?> </span></div>
                    <div class="presidents__list-td col-md-3 col"><span><?php echo $item['second_item_text']; ?></span></div>
                    <div class="presidents__list-td col-md-5 col"><span><?php echo $item['third_item_text']; ?></span></div>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="presidents__list-more fadeIn"><span><?php echo $settings['load_more_button_text']; ?></span>
                <svg class="icon" width="39" height="20" viewBox="0 0 39 20">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-more-icon' ?>"></use>
                </svg>
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