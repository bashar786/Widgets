<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly



class bigImageWithTextBlue extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style('big-image-with-text-blue-css', get_template_directory_uri() . '/widgets/big-image-with-text-blue/big-image-with-text-blue.css', [], '1.1');
  }


  public function get_style_depends()
  {
    return ['big-image-with-text-blue-css'];
  }


  public function get_name()
  {
    return 'bigImageWithTextBlue';
  }

  public function get_title()
  {
    return esc_html__('Big Image With Text Blue', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-single-page';
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


    $this->add_control(
      'image',
      [
        'label' => esc_html__('Choose Image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );


    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();

?>

    <div class="widget-big-image-with-text-blue-v1">
      <div class="ptb120">
        <div class="container-2">
          <div class="support-area">
            <div class="row no-gutters align-items-center">
              <div class="col-lg-6 order-lg-1 order-2">
                <div class="support-cont-info-wrap">
                  <div class="support-cont-info fadeIn">
                    <h3 style="color: #ffff;"><?php echo $settings['title']; ?></h3>
                    <p style="color: #ffff;"><?php echo $settings['description']; ?></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 order-lg-2 order-1">
                <div class="support-content-image">
                  <picture>
                    <img class="responsive-img" src="<?php echo $settings['image']['url'] ?>" alt="<?php echo get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', TRUE); ?>" style="height:100%;" />
                  </picture>
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