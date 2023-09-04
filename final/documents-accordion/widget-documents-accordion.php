<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class documentsAccordion extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('documents-accordion', get_template_directory_uri() . '/widgets/documents-accordion/documents-accordion.js', ['elementor-frontend', 'jquery'], '1.0.2', true);
    wp_register_script('documents-accordion-elementor', get_template_directory_uri() . '/widgets/documents-accordion/documents-accordion-elementor.js', ['elementor-frontend', 'jquery'], '1.0.3', true);

    wp_register_style('documents-accordion', get_template_directory_uri() . '/widgets/documents-accordion/documents-accordion.css', [], '1.3');
  }

  public function get_style_depends()
  {
    return ['documents-accordion'];
  }

  public function get_script_depends()
  {
    return ['documents-accordion', 'documents-accordion-elementor'];
  }


  public function get_name()
  {
    return 'documentsAccordion';
  }

  public function get_title()
  {
    return __('Documents Accordion', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-accordion';
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
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );


    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'doc_acc_title',
      [
        'label' => esc_html__('Document Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'first_doc_file_link',
      [
        'label' => esc_html__('First File Link', 'cabei'),
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
      'first_doc_file_title',
      [
        'label' => esc_html__('First File Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $repeater->add_control(
      'second_doc_file_link',
      [
        'label' => esc_html__('Second File Link', 'cabei'),
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
      'second_doc_file_title',
      [
        'label' => esc_html__('Second File Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'doc_accordion',
      [
        'label' => esc_html__('Document Accoordion', 'cabei'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
      ]
    );

    $this->end_controls_section();
  }


  protected function render()
  {
    $settings = $this->get_settings_for_display();


?>

    <div class="widget-documents-accordion-v1">
      <div class="ptb120">
        <div class="container-2">
          <div class="maw895 box-center">
            <div class="cont-def tac">
              <h3><?php echo $settings['title']; ?></h3>
            </div>
            <div class="row b22">
              <?php foreach ($settings['doc_accordion'] as $key => $item) : ?>
                <div class="col-12 b22 fadeIn">
                  <div class="doc-relac-title">
                    <div class="row align-items-center">
                      <div class="col text-w-500 text-24"><?php echo $item['doc_acc_title']; ?></div>
                      <div class="col-auto">
                        <div class="doc-relac-title__icon"></div>
                      </div>
                    </div>
                  </div>
                  <div class="doc-relac-body">
                    <div class="row">
                      <div class="col-12 b22"><a class="p30 bd-grey d-block" href="<?php echo $item['first_doc_file_link']['url']; ?>">
                          <div class="row row-22 align-items-center b-20">
                            <div class="col-md-auto b20"><img src="<?php echo get_template_directory_uri() . '/images/igc04.svg'; ?>" width="45" alt=""></div>
                            <div class="col-md b20">
                              <div class="text-def">
                                <p><?php echo $item['first_doc_file_title']; ?></p>
                              </div>
                            </div>
                          </div>
                        </a></div>
                      <div class="col-12 b22"><a class="p30 bd-grey d-block" href="<?php echo $item['second_doc_file_link']['url']; ?>">
                          <div class="row row-22 align-items-center b-20">
                            <div class="col-md-auto b20"><img src="<?php echo get_template_directory_uri() . '/images/igc04.svg'; ?>" width="45" alt=""></div>
                            <div class="col-md b20">
                              <div class="text-def">
                                <p><?php echo $item['second_doc_file_title']; ?></p>
                              </div>
                            </div>
                          </div>
                        </a></div>
                    </div>
                  </div>
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