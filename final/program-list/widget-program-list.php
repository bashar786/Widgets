<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class programList extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style('program-list-css', get_template_directory_uri() . '/widgets/program-list/program-list.css', [], '1.1');
  }

  public function get_style_depends()
  {
    return ['program-list-css'];
  }


  public function get_name()
  {
    return 'programList';
  }

  public function get_title()
  {
    return __('Program List', 'cabei');
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
      'sub_title',
      [
        'label' => esc_html__('Sub Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Default Sub Title', 'cabei'),
        'placeholder' => esc_html__('Type your sub title here', 'cabei'),
      ]
    );

    $repeater = new \Elementor\Repeater();


    $repeater->add_control(
      'program_list_title',
      [
        'label' => esc_html__('Enter Program Item Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ],
    );


    $repeater->add_control(
      'program_list_link',
      [
        'label' => esc_html__('Enter Program Item Url', 'cabei'),
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
      'program_list_image',
      [
        'label' => esc_html__('Choose Image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
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
    <div class="widget-program-list-v1">
      <div class="ptb120">
        <div class="container-2">
          <div class="cont-def fadeIn">
            <h3><?php echo $settings['title']; ?></h3>
          </div>
          <div class="b30 program-list-sub-title text-30 text-w-700 fadeIn"><?php echo $settings['sub_title']; ?></div>
          <div class="b80"></div>
          <div class="row b-50 row-22">
            <?php foreach ($settings['items'] as $index => $item) : ?>
              <div class="col-lg-3 col-md-6 b50 fadeIn"> <a class="program-list__el" href="<?php echo $item['program_list_link']['url']; ?>">
                  <div class="program-list__el-image">
                    <picture>
                      <img class="responsive-img" src="<?php echo $item['program_list_image']['url']; ?>" srcset="<?php echo $item['program_list_image']['url']; ?>, <?php echo $item['program_list_image']['url']; ?> 2x" alt="">
                    </picture>
                  </div>
                  <div class="program-list__el-name"><?php echo $item['program_list_title']; ?></div>
                </a>
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