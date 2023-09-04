<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class wideMultimediaSlider extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('wide-multimedia-slider-js', get_template_directory_uri() . '/widgets/wide-multimedia-slider/wide-multimedia-slider.js', ['elementor-frontend', 'jquery'], '1.0.0', true);
    wp_register_script('wide-multimedia-slider-elementor-js', get_template_directory_uri() . '/widgets/wide-multimedia-slider/wide-multimedia-slider-elementor.js', ['elementor-frontend', 'jquery'], '1.0.0', true);

    wp_register_style('wide-multimedia-slider-css', get_template_directory_uri() . '/widgets/wide-multimedia-slider/wide-multimedia-slider.css', [], '1.1');
  }

  public function get_script_depends()
  {
    return ['wide-multimedia-slider-js', 'wide-multimedia-slider-elementor-js'];
  }

  public function get_style_depends()
  {
    return ['wide-multimedia-slider-css'];
  }


  public function get_name()
  {
    return 'wideMultimediaSlider';
  }

  public function get_title()
  {
    return __('Wide Multimedia Slider', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-video-playlist';
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

    $repeater = new \Elementor\Repeater();


    $repeater->add_control(
      'image',
      [
        'label' => esc_html__('Choose Video Overlay Image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $repeater->add_control(
      'video_title',
      [
        'label' => esc_html__('Video Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );
    $repeater->add_control(
      'video_description',
      [
        'label' => esc_html__('Video Description', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Video Description', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'button_text',
      [
        'label' => esc_html__('Button Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'button_link',
      [
        'label' => esc_html__('Button link', 'cabei'),
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
      'videos',
      [
        'label' => esc_html__('videos', 'cabei'),
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


    <div class="widget-wide-multimedia-slider-v1">
      <div class="ptb120">
        <div class="container-2">
          <div class="cont-def tac">
            <h3><?php echo $settings['title']; ?></h3>
          </div>
          <div class="swiper-multimedia-wrapper b80">
            <div class="swiper swiper-multimedia">
              <div class="swiper-wrapper">
                <?php foreach ($settings['videos'] as $item) : ?>
                  <div class="swiper-slide fadeIn">
                    <div class="h444">
                      <picture>
                      <img class="responsive-img" src="<?php echo $item['image']['url']; ?>" srcset="<?php echo $item['image']['url']; ?>, <?php echo $item['image']['url']; ?> 2x" alt="">
                      </picture>
                      <div class="swiper-multimedia__info">
                        <div class="swiper-multimedia__info-title"><?php echo $item['video_title']; ?></div>
                        <div class="swiper-multimedia__info-text"><?php echo $item['video_description']; ?> </div>
                        <div class="swiper-multimedia__info-footer"><a class="b24 btn-rounded btn-rounded-white hover-animate-arrow-right" href="<?php echo $item['button_link']['url']; ?>">
                            <div class="row row-4 align-items-center">
                              <div class="col">
                                <div class="text-15 text-w-500"><?php echo $item['button_text']; ?></div>
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
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="swiper-multimedia-nav">
                <div class="b48"></div>
                <div class="row align-items-end justify-content-center b-40">
                  <div class="col-lg-auto b40">
                    <div class="arrow-nav-wrap-custom b0">
                      <div class="row justify-content-between">
                        <div class="col-auto">
                          <div class="sl-nav-arrow-prev arrow-btn">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                              <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-custom'; ?>"></use>
                            </svg>
                          </div>
                        </div>
                        <div class="col-auto">
                          <div class="sl-nav-arrow-next arrow-btn">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                              <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-custom'; ?>"></use>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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