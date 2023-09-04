<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class headingWithTextFeaturesCard extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style('widget-heading-text-with-features-card-css', get_template_directory_uri() . '/widgets/heading-text-with-features-cards/heading-text-with-features-cards.css', [], '1.1');
    wp_register_script('widget-heading-text-with-features-card-js', get_template_directory_uri() . '/widgets/heading-text-with-features-cards/heading-text-with-features-cards.js', ['elementor-frontend'], '1.0.0', true);
  }

  public function get_script_depends()
  {
    return ['widget-heading-text-with-features-card-js'];
  }

  public function get_style_depends()
  {
    return ['widget-heading-with-text-css'];
  }

  public function get_name()
  {
    return 'headingTextWithFeaturesCard';
  }

  public function get_title()
  {
    return esc_html__('Heading Text With Features Card', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-featured-image';
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
      'title_first',
      [
        'label' => esc_html__('Title First Item', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'first_item_link',
      [
        'label' => esc_html__('First Item link', 'cabei'),
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
      'first_item_image',
      [
        'label' => esc_html__('First Item image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'title_second',
      [
        'label' => esc_html__('Title Second Item', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'second_item_link',
      [
        'label' => esc_html__('Second Item link', 'cabei'),
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
      'second_item_image',
      [
        'label' => esc_html__('Second Item image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'title_third',
      [
        'label' => esc_html__('Title Third Item', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'third_item_link',
      [
        'label' => esc_html__('Third Item link', 'cabei'),
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
      'third_item_image',
      [
        'label' => esc_html__('Third Item image', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'title_fourth',
      [
        'label' => esc_html__('Title Fourth Item', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'fourth_item_link',
      [
        'label' => esc_html__('Fourth Item link', 'cabei'),
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
      'fourth_item_image',
      [
        'label' => esc_html__('Fourth Item image', 'cabei'),
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



    <div class="heading-text-with-features-cards-v1 ptb120">
      <div class="container-2">
        <div class="cont-def tac maw948">
          <h3><?php echo $settings['title'] ?></h3>
          <p><?php echo $settings['description'] ?> </p>
        </div>
        <div class="b80"></div>
        <div class="shortcuts__row row g-15 b48">
          <div class="shortcuts__item col-md-6 col-xl-3 fadeIn"><a class="white-slide-box btn-hover-box --sm-icon" href="<?php echo $settings['first_item_link']['url']; ?>">
              <div class="white-slide-box-icon">
                <div class="circle-icon circle-icon__white circle-icon__inner-shadow">
                  <div class="circle-icon-inner"><img src="<?php echo $settings['first_item_image']['url'] ?>" alt=""></div>
                </div>
              </div>
              <div class="eq-h">
                <div class="white-slide-box-title text-20 text-w-700 b30"><?php echo $settings['title_first'] ?></div>
              </div>
              <div class="b24 pub-box__btn">
                <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                </svg>
                <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?> "></use>
                </svg>
              </div>
            </a>
          </div>
          <div class="shortcuts__item col-md-6 col-xl-3 fadeIn"><a class="white-slide-box btn-hover-box --sm-icon" href="<?php echo $settings['second_item_link']['url'] ?>">
              <div class="white-slide-box-icon">
                <div class="circle-icon circle-icon__white circle-icon__inner-shadow">
                  <div class="circle-icon-inner"><img src="<?php echo $settings['second_item_image']['url'] ?>" alt=""></div>
                </div>
              </div>
              <div class="eq-h">
                <div class="white-slide-box-title text-20 text-w-700 b30"><?php echo $settings['title_second'] ?></div>
              </div>
              <div class="b24 pub-box__btn">
                <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                </svg>
                <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                </svg>
              </div>
            </a>
          </div>
          <div class="shortcuts__item col-md-6 col-xl-3 fadeIn"><a class="white-slide-box btn-hover-box --sm-icon" href="<?php echo $settings['third_item_link']['url'] ?>">
              <div class="white-slide-box-icon">
                <div class="circle-icon circle-icon__white circle-icon__inner-shadow">
                  <div class="circle-icon-inner"><img src="<?php echo $settings['third_item_image']['url'] ?>" alt=""></div>
                </div>
              </div>
              <div class="eq-h">
                <div class="white-slide-box-title text-20 text-w-700 b30"><?php echo $settings['title_third'] ?></div>
              </div>
              <div class="b24 pub-box__btn">
                <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                </svg>
                <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                </svg>
              </div>
            </a>
          </div>
          <div class="shortcuts__item col-md-6 col-xl-3 fadeIn"><a class="white-slide-box btn-hover-box --sm-icon" href="<?php echo $settings['fourth_item_link']['url'] ?>">
              <div class="white-slide-box-icon">
                <div class="circle-icon circle-icon__white circle-icon__inner-shadow">
                  <div class="circle-icon-inner"><img src="<?php echo $settings['fourth_item_image']['url'] ?>" alt=""></div>
                </div>
              </div>
              <div class="eq-h">
                <div class="white-slide-box-title text-20 text-w-700 b30"><?php echo $settings['title_fourth'] ?></div>
              </div>
              <div class="b24 pub-box__btn">
                <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                </svg>
                <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                  <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                </svg>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
 <?php

  }

}

?>