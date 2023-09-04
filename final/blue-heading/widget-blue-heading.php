<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class blueHeading extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style('widget-blue-heading-css', get_template_directory_uri() . '/widgets/blue-heading/blue-heading.css', [], '1.1');
  }

  public function get_style_depends()
  {
    return ['widget-blue-heading-css'];
  }

  public function get_name()
  {
    return 'BlueHeading';
  }

  public function get_title()
  {
    return esc_html__('Blue Heading', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-t-letter';
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
      'button_text',
      [
        'label' => esc_html__('Button Text', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Default text', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $this->add_control(
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

    $this->end_controls_section();
  }


  protected function render()
  {
    $settings = $this->get_settings_for_display();


?>


    <div class="widget-blue-heading-v1">
      <div class="ptb120">
        <div class="container-2">
          <div class="maw1170 box-center">
            <div class="blue-heading tac">
              <div class="cont-def fadeIn">
                <h4><?php echo $settings['title'] ?> </h4>
              </div><a class="b24 btn-rounded hover-animate-arrow-right btn-rounded-white fadeIn" href="<?php echo $settings['button_link']['url'] ?>">
                <div class="row row-4 align-items-center">
                  <div class="col">
                    <div class="text-15 text-w-500"><?php echo $settings['button_text'] ?></div>
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
        </div>
      </div>
    </div>


<?php

  }
}

?>