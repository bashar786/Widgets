<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class photoGallery extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('photo-gallery-js', get_template_directory_uri() . '/widgets/photo-gallery/photo-gallery.js', ['elementor-frontend', 'jquery'], '1.0.0', true);
    wp_register_style('photo-gallery-css', get_template_directory_uri() . '/widgets/photo-gallery/photo-gallery.css', [], '1.1');
  }

  public function get_script_depends()
  {
    return ['photo-gallery-js'];
  }

  public function get_style_depends()
  {
    return ['photo-gallery-css'];
  }


  public function get_name()
  {
    return 'photoGallery';
  }

  public function get_title()
  {
    return __('Photo Gallery', 'cabei');
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
      'photo_gallery_title',
      [
        'label' => esc_html__('Enter Gallery Item Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ],
    );

    $repeater->add_control(
      'photo_gallery_text',
      [
        'label' => esc_html__('Type Gallery Item Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Default Description', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'photo_gallery_link',
      [
        'label' => esc_html__('Enter Gallery Item Url', 'cabei'),
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
      'photo_gallery_image',
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

    <div class="widget-photo-gallery-v1">
      <div class="ptb120 bg-grey">
        <div class="container-2">
          <div class="cont-def tac maw800 box-center fadeIn">
            <h3><?php echo $settings['title']; ?></h3>
            <p><?php echo $settings['description']; ?></p>
          </div>
          <div class="b80">
            <div class="row b-64 row-32">
              <?php foreach ($settings['items'] as $item) : ?>
                <div class="col-lg-4 b64 col-md-6 fadeIn"><a class="g-image" href="<?php echo $item['photo_gallery_link']['url']; ?>">
                    <div class="g-image__photo">
                      <picture>
                        <img class="responsive-img" src="<?php echo $item['photo_gallery_image']['url']; ?>" alt="">
                      </picture>
                    </div>
                    <div class="g-image__desc cont-def">
                      <h4><?php echo $item['photo_gallery_title']; ?></h4>
                      <p><?php echo $item['photo_gallery_text']; ?></p>
                    </div>
                  </a>
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