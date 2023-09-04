<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class textBlock extends Widget_Base
{
  // INNER STYLE

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style('text-block-css', get_template_directory_uri() . '/widgets/text-block/text-block.css', [], '1.1');
  }

  public function get_style_depends()
  {
    return ['text-block-css'];
  }


  public function get_name()
  {
    return 'textBlock';
  }

  public function get_title()
  {
    return __('Text Block', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-text';
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
      'content',
      [
        'label' => esc_html__('Content', 'cabei'),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => esc_html__('Content', 'cabei'),
        'placeholder' => esc_html__('Type your content here', 'cabei'),
      ]
    );

    $this->end_controls_section();
  }


  protected function render()
  {
    $settings = $this->get_settings_for_display();

?>

    <div class="widget-text-block-v1">
      <div class="ptb120 bg-grey">
        <div class="top-right-decor-white"></div>
        <div class="container-2">
          <div class="cont-def tac">
            <p><?php echo $settings['content']; ?></p>
          </div>
        </div>
      </div>
    </div>

<?php
  }
}
?>