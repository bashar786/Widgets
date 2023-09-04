<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Proyectos extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('proyectos', get_template_directory_uri() . '/widgets/proyectos/proyectos.js', ['elementor-frontend', 'jquery'], '1.0.2', true);

    wp_register_style('proyectos-css', get_template_directory_uri() . '/widgets/proyectos/proyectos.css', [], '1.1');
  }

  public function get_style_depends()
  {
    return ['proyectos-css'];
  }

  public function get_script_depends()
  {
    return ['proyectos'];
  }

  public function get_name()
  {
    return 'Proyectos';
  }

  public function get_title()
  {
    return __('Proyectos', 'cabei');
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

    $repeater = new \Elementor\Repeater();


    $repeater->add_control(
      'proyectos_title',
      [
        'label' => esc_html__('Enter Proyectos Item Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ],
    );

    $repeater->add_control(
      'proyectos_text',
      [
        'label' => esc_html__('Type Proyectos Item Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Default Description', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'proyectos_link_text',
      [
        'label' => esc_html__('Type Proyectos link Item Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'proyectos_link',
      [
        'label' => esc_html__('Enter Proyectos Item Url', 'cabei'),
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
      'proyectos_image',
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

    <div class="widget-proyectos-v1">
      <div class="ptb120 bg-blue">
        <div class="container-2">
          <div class="maw1110 box-center">
            <div class="cont-def tac">
              <h3><?php echo $settings['title']; ?></h3>
            </div>
            <div class="b80"></div>
            <div class="row b-30">
              <?php foreach ($settings['items'] as $item) : ?>
                <div class="col-lg-4 col-md-6 b30 fadeIn"><a class="proyectos-el" href="<?php echo $item['proyectos_link']['url']; ?>">
                    <div class="proyectos-el__icon"><img src="<?php echo $item['proyectos_image']['url']; ?>" alt=""></div>
                    <div class="eq-h">
                      <h5 class="proyectos-el__title text-24"><?php echo $item['proyectos_title']; ?></h5>
                      <div class="proyectos-el__desc"><?php echo $item['proyectos_text']; ?></div>
                    </div>
                    <div class="proyectos-el__footer">
                      <div class="btn-rounded">
                        <div class="row row-4 align-items-center">
                          <div class="col">
                            <div class="text-15 text-w-600"><?php echo $item['proyectos_link_text']; ?></div>
                          </div>
                          <div class="col-auto">
                            <svg class="icon" width="20" height="8" viewBox="0 0 20 8">
                              <use xlink:href="<?php echo get_template_directory_uri() . '/images/sprites/main.stack.svg#image-arrow-wide-custom'; ?>"></use>
                            </svg>
                          </div>
                        </div>
                      </div>
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