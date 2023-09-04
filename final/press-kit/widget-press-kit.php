<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class presskit extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style('press-kit-css', get_template_directory_uri() . '/widgets/press-kit/press-kit.css', [], '1.1');
  }

  public function get_style_depends()
  {
    return ['press-kit-css'];
  }


  public function get_name()
  {
    return 'PressKit';
  }

  public function get_title()
  {
    return __('Press Kit', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-posts-grid';
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

    $repeater = new \Elementor\Repeater();


    $repeater->add_control(
      'press_kit_title',
      [
        'label' => esc_html__('Enter title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ],
    );

    $repeater->add_control(
      'button_text',
      [
        'label' => esc_html__('Type Button Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Button', 'cabei'),
        'placeholder' => esc_html__('Type your button text here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'button_link',
      [
        'label' => esc_html__('button Url', 'cabei'),
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


    <div class="widget-press-kit-v1">
      <div class="ptb120">
        <div class="container-2">
          <div class="cont-def tac maw895 box-center">
            <h3><?php echo $settings['title']; ?></h3>
            <p><?php echo $settings['description']; ?></p>
          </div>
          <div class="b80"></div>
          <div class="presskit-items__row row gx-15 b-30">
            <?php foreach ($settings['items'] as $item) : ?>
              <div class="col-lg-4 col-md-6 b30 fadeIn">
                <div class="presskit-items__item tac fadeIn">
                  <div class="presskit-items__item-title text-24 text-w-700 eq-hf"><?php echo $item['press_kit_title']; ?></div>
                  <a class="btn-rounded btn-rounded-blue hover-animate-arrow-right b32 b20--xs btn-rounded-blue" href="<?php echo $item['button_link']['url']; ?>">
                    <div class="row row-4 align-items-center">
                      <div class="col">
                        <div class="text-15 text-w-600"><?php echo $item['button_text']; ?></div>
                      </div>
                      <div class="col-auto">
                        <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                          <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                        </svg>
                      </div>
                    </div>
                  </a>
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