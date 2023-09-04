<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Tabs3 extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('tabs-3-elementor', get_template_directory_uri() . '/widgets/tabs-3/tabs-3-elementor.js', ['elementor-frontend', 'jquery'], '1.0.2', true);
    wp_register_script('tabs-3-js', get_template_directory_uri() . '/widgets/tabs-3/tabs-3.js', ['elementor-frontend', 'jquery'], '1.0.3', true);

    wp_register_style('tabs-3-css', get_template_directory_uri() . '/widgets/tabs-3/tabs-3.css', [], '1.0.2');
  }

  public function get_style_depends()
  {
    return ['tabs-3-css'];
  }

  public function get_script_depends()
  {
    return ['tabs-3-js', 'tabs-3-elementor'];
  }

  public function get_name()
  {
    return 'Tabs3';
  }

  public function get_title()
  {
    return __('Tabs 3', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-tabs';
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


    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'tab_name',
      [
        'label' => esc_html__('Name', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Name', 'cabei'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'tab_title',
      [
        'label' => esc_html__('Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default Title', 'cabei'),
        'placeholder' => esc_html__('Type your Title here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'tab_content',
      [
        'label' => esc_html__('Content', 'cabei'),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => esc_html__('Content', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'first_button_text',
      [
        'label' => esc_html__('First Button Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Button', 'cabei'),
        'placeholder' => esc_html__('Type your Text here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'first_button_link',
      [
        'label' => esc_html__('First Button Link', 'cabei'),
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

    $repeater->add_control(
      'second_button_text',
      [
        'label' => esc_html__('Second Button Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Button', 'cabei'),
        'placeholder' => esc_html__('Type your Text here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'second_button_link',
      [
        'label' => esc_html__('Second Button Link', 'cabei'),
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

    $repeater->add_control(
      'tab_image',
      [
        'label' => esc_html__('Choose Image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'tabs',
      [
        'label' => esc_html__('Tabs', 'cabei'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{tab_name}}}',
        'default' => [
					[
						'tab_name' => esc_html__( 'Tab #1' ),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'tab_name' => esc_html__( 'Tab #2' ),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
      ]
    );
    $this->end_controls_section();
  }


  protected function render()
  {
    $settings = $this->get_settings_for_display();

  ?>

    <div class="widget-tabs-3-v1">
      <div class="ptb120 container-2">
        <div class="maw1170">
          <div class="row no-gutters">
            <?php foreach ($settings['tabs'] as $key => $item) : ?>
              <div class="col">
                <div class="simple-tab-name eq-hf" data-tab="t3cont-<?php echo $key; ?>"><?php echo $item['tab_name']; ?></div>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="b65 simple-tab-content-wrapper">
            <?php foreach ($settings['tabs'] as $key => $item) : ?>
              <div class="simple-tab-content" id="t3cont-<?php echo $key; ?>">
                <div class="row b-40">
                  <div class="col-lg-7 b40">
                    <div class="cont-def maw560">
                      <h3><?php echo $item['tab_title']; ?></h3>
                      <p><?php echo $item['tab_content']; ?></p>
                    </div>
                    <div class="b48"></div>
                    <div class="row b-30">
                      <div class="col-md-auto b30"> <a class="btn-rounded hover-animate-arrow-right" href="<?php echo $item['first_button_link']['url']; ?>">
                          <div class="row row-4 align-items-center">
                            <div class="col">
                              <div class="text-15 text-w-500"><?php echo $item['first_button_text']; ?></div>
                            </div>
                            <div class="col-auto">
                              <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                                <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                              </svg>
                            </div>
                          </div>
                        </a></div>
                      <div class="col-md-auto b30"><a class="btn-rounded hover-animate-arrow-right" href="<?php echo $item['second_button_link']['url']; ?>">
                          <div class="row row-4 align-items-center">
                            <div class="col">
                              <div class="text-15 text-w-500"><?php echo $item['second_button_text']; ?></div>
                            </div>
                            <div class="col-auto">
                              <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                                <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                              </svg>
                            </div>
                          </div>
                        </a></div>
                    </div>
                  </div>
                  <div class="col-lg-5 b40">
                    <div class="simple-tab-content__image">
                      <picture>
                        <img class="responsive-img" src="<?php echo $item['tab_image']['url'] ?>" alt="<?php echo get_post_meta($item['tab_image']['id'], '_wp_attachment_image_alt', TRUE); ?>" />
                      </picture>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

 <?php
  }
}
?>