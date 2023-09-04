<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class multimediaCarousel extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('multimedia-carousel-js', get_template_directory_uri() . '/widgets/multimedia-carousel/multimedia-carousel.js', ['elementor-frontend', 'jquery'], '1.0.0', true);
    wp_register_script('multimedia-carousel-elementor-js', get_template_directory_uri() . '/widgets/multimedia-carousel/multimedia-carousel-elementor.js', ['elementor-frontend', 'jquery'], '1.0.0', true);

    wp_register_style('multimedia-carousel-css', get_template_directory_uri() . '/widgets/multimedia-carousel/multimedia-carousel.css', [], '1.1');
  }

  public function get_script_depends()
  {
    return ['multimedia-carousel-js', 'multimedia-carousel-elementor-js'];
  }

  public function get_style_depends()
  {
    return ['multimedia-carousel-css'];
  }


  public function get_name()
  {
    return 'multimediaCarousel';
  }

  public function get_title()
  {
    return __('Multimedia Carousel', 'cabei');
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
      'image',
      [
        'label' => esc_html__('Choose Image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $repeater->add_control(
      'video_link',
      [
        'label' => esc_html__('Video Url', 'cabei'),
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
      'video_description',
      [
        'label' => esc_html__('Video Description', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Video Description', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
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


    <div class="widget-multimedia-carousel-v1">
      <div class="ptb120 bg-blue">
        <div class="container-2">
          <div class="row align-items-end b-24">
            <div class="col-md b24">
              <div class="contain-header maw800 ml0 fadeIn">
                <h3 class="text-40"><?php echo $settings['title']; ?></h3>
                <p><?php echo $settings['description']; ?> </p>
              </div>
            </div>
          </div>
          <div class="swiper swiper-multimedia-carousel b80">
            <div class="swiper-wrapper">
              <?php foreach ($settings['videos'] as $item) : ?>
                <div class="swiper-slide fadeIn"> <a class="video-box" data-fancybox="video-gallery" href="<?php echo $item['video_link']['url']; ?>">
                    <img class="responsive-img" src="<?php echo $item['image']['url']; ?>" srcset="<?php echo $item['image']['url']; ?>, <?php echo $item['image']['url']; ?> 2x" alt="">
                    <div class="play"></div>
                  </a>
                  <div class="video-box__desc text-24"><?php echo $item['video_description']; ?></div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="b40"></div>
            <div class="row justify-content-between align-items-end b-30">
              <div class="col-lg-auto b30">
                <div class="swiper-scrollbar w720"></div>
              </div>
              <div class="col-lg-auto b30">
                <div class="arrow-nav-wrap-custom w130 b0">
                  <div class="sl-nav-arrow-next">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-custom'; ?>"></use>
                    </svg>
                  </div>
                  <div class="sl-nav-arrow-prev">
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

<?php
  }
}

?>