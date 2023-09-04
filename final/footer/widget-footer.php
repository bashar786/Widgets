<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class footer extends Widget_Base
{

  // INNER SCRIPTS

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('footer', get_template_directory_uri() . '/widgets/footer/footer.js', ['elementor-frontend', 'jquery'], true, '1.0.1');
    wp_register_script('footer-elementor', get_template_directory_uri() . '/widgets/footer/footer-elementor.js', ['elementor-frontend', 'jquery'], true, '1.0.1');
    wp_register_style('footer', get_template_directory_uri() . '/widgets/footer/footer.css', [], '1.1');
  }

  public function get_script_depends()
  {
    return ['footer', 'footer-elementor'];
  }

  public function get_style_depends()
  {
    return ['footer'];
  }



  public function get_name()
  {
    return 'footer';
  }

  public function get_title()
  {
    return __('Footer', 'cabei');
  }

  public function get_icon()
  {
    return 'eicon-slider-album';
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
        'label' => __('1st Section', 'cabei'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'logo_image',
      [
        'label' => esc_html__('Choose Logo', 'cabei'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
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

    $this->add_control(
      'social_options',
      [
        'label' => esc_html__('Social Area', 'cabei'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    $this->add_control(
      'social_title',
      [
        'label' => esc_html__('Social Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $this->add_control(
      'hr',
      [
        'type' => \Elementor\Controls_Manager::DIVIDER,
      ]
    );

    $this->add_control(
      'facebook_link',
      [
        'label' => esc_html__('Facebook Url', 'cabei'),
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
      'instagram_link',
      [
        'label' => esc_html__('Instagram Url', 'cabei'),
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
      'twitter_link',
      [
        'label' => esc_html__('Twitter Url', 'cabei'),
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
      'linkedin_link',
      [
        'label' => esc_html__('Linkedin Url', 'cabei'),
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
      'youtube_link',
      [
        'label' => esc_html__('Youtube Url', 'cabei'),
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


    // 2nd Section
    $this->start_controls_section(
      'section_two_options',
      [
        'label' => __('2st Section', 'cabei'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );


    $this->add_control(
      'title_2',
      [
        'label' => esc_html__('Section Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'link_title_2',
      [
        'label' => esc_html__('Link Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Link Title', 'cabei'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'button_link_2',
      [
        'label' => esc_html__('Link', 'cabei'),
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
      'list',
      [
        'label' => esc_html__('Repeater List', 'cabei'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ link_title_2 }}}',
      ]
    );

    $this->end_controls_section();


    // 3rd Section
    $this->start_controls_section(
      'section_three_options',
      [
        'label' => __('3rd Section', 'cabei'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );


    $this->add_control(
      'title_3',
      [
        'label' => esc_html__('Section Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'link_title_3',
      [
        'label' => esc_html__('Link Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Link Title', 'cabei'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'button_link_3',
      [
        'label' => esc_html__('Link', 'cabei'),
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
      'list_3',
      [
        'label' => esc_html__('Repeater List', 'cabei'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ link_title_3 }}}',
      ]
    );

    $this->end_controls_section();


    // 4rd Section
    $this->start_controls_section(
      'section_four_options',
      [
        'label' => __('4rd Section', 'cabei'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );


    $this->add_control(
      'title_4',
      [
        'label' => esc_html__('Section Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'cabei'),
        'placeholder' => esc_html__('Type your title here', 'cabei'),
      ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'link_title_4',
      [
        'label' => esc_html__('Link Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Link Title', 'cabei'),
        'label_block' => true,
      ]
    );

    $this->add_control(
      'list_4',
      [
        'label' => esc_html__('Repeater List', 'cabei'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ link_title_4 }}}',
      ]
    );

    $this->end_controls_section();



    // Copyright Section
    $this->start_controls_section(
      'section_copyright_options',
      [
        'label' => __('Bottom Copyright Section', 'cabei'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );


    $this->add_control(
      'title_5',
      [
        'label' => esc_html__('Copyright', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Copyright', 'cabei'),
        'placeholder' => esc_html__('Type your text here', 'cabei'),
      ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'link_title_5',
      [
        'label' => esc_html__('Link Title', 'cabei'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Link Title', 'cabei'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'button_link_5',
      [
        'label' => esc_html__('Link', 'cabei'),
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
      'list_5',
      [
        'label' => esc_html__('Repeater List', 'cabei'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ link_title_5 }}}',
      ]
    );

    $this->end_controls_section();
  }


  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $nonce = wp_create_nonce("mailchimp_nonce");

?>




    <div class="widget-footer-v2">
      <footer class="footer">
        <div class="footer__top">
          <div class="svg-image-footer-decor"></div>
          <div class="container">
            <div class="row row-80 b-80">
              <div class="col-lg-auto b80">
                <div class="w320">
                  <div class="footer-logo"><img src="<?php echo $settings['logo_image']['url'] ?>" alt="<?php echo get_post_meta($settings['logo_image']['id'], '_wp_attachment_image_alt', TRUE); ?>" /></div>
                  <div class="text-def text-14 text-w-500 b24 maw600">
                    <p><?php echo $settings['description'] ?></p>
                  </div>
                  <div class="footer-socials-area b24 xsb60">
                    <h4 class="text-20 text-w-800"><?php echo $settings['social_title'] ?></h4>
                    <div class="b24"></div>
                    <div class="row row-13 row-social">
                      <?php if (!empty($settings['facebook_link']['url'])) : ?>
                        <div class="col-auto"><a class="social-elem" href="<?php echo $settings['facebook_link']['url'] ?>" target="_blank"> <img src="<?php echo get_template_directory_uri() . '/images/s1.svg' ?>" alt="facebook" /></a></div>
                      <?php endif; ?>
                      <?php if (!empty($settings['instagram_link']['url'])) : ?>
                        <div class="col-auto"><a class="social-elem" href="<?php echo $settings['instagram_link']['url'] ?>" target="_blank"> <img src="<?php echo get_template_directory_uri() . '/images/s2.svg' ?>" alt="instagram" /></a></div>
                      <?php endif; ?>
                      <?php if (!empty($settings['twitter_link']['url'])) : ?>
                        <div class="col-auto"><a class="social-elem" href="<?php echo $settings['twitter_link']['url'] ?>" target="_blank"> <img src="<?php echo get_template_directory_uri() . '/images/s3.svg' ?>" alt="twitter" /></a></div>
                      <?php endif; ?>
                      <?php if (!empty($settings['linkedin_link']['url'])) : ?>
                        <div class="col-auto"><a class="social-elem" href="<?php echo $settings['linkedin_link']['url'] ?>" target="_blank"> <img src="<?php echo get_template_directory_uri() . '/images/s4.svg' ?>" alt="linkedin" /></a></div>
                      <?php endif; ?>
                      <?php if (!empty($settings['youtube_link']['url'])) : ?>
                        <div class="col-auto"><a class="social-elem" href="<?php echo $settings['youtube_link']['url'] ?>" target="_blank"> <img src="<?php echo get_template_directory_uri() . '/images/s5.svg' ?>" alt="youtube" /></a></div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="b24 xsb60">
                    <h4 class="text-20 text-w-800">Boletín</h4>
                    <form class="b24 feedback-form" method="post">
                      <input type="email" name="email" placeholder="Correo eléctronico" />
                      <input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
                      <input type="hidden" name="feedback-form-access" value="<?php echo admin_url('admin-ajax.php'); ?>" />
                      <input type="submit" value="Submit" id="feedback_form_btn" />
                    </form>
                    <div class="dl-spinner-div">
                      <img  id="cabei-spinner" style="display: none;" src="<?php echo get_template_directory_uri() . '/widgets/footer/spinner.svg' ?>" alt="">
                    </div>
                    <div class="display_message pt-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg b80 md-b80">
                <div class="row b-80">
                  <div class="col-md-4 col-sm-6 b80 ">
                    <div class="footer-menu-sector">
                      <h4 class="text-20 text-w-800"><?php echo $settings['title_2'] ?> </h4>
                      <ul class="footer-menu-sector__list b32">
                        <?php foreach ($settings['list'] as $item) : ?>
                          <li> <a href="<?php echo $item['button_link_2']['url'] ?>"><?php echo $item['link_title_2'] ?></a></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 b80 ">
                    <div class="footer-menu-sector">
                      <h4 class="text-20 text-w-800"><?php echo $settings['title_3'] ?></h4>
                      <ul class="footer-menu-sector__list b32">
                        <?php foreach ($settings['list_3'] as $item) : ?>
                          <li> <a href="<?php echo $item['button_link_3']['url'] ?>"><?php echo $item['link_title_3'] ?></a></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 b80 ">
                    <div class="footer-menu-sector">
                      <h4 class="text-20 text-w-800"><?php echo $settings['title_4'] ?></h4>
                      <ul class="footer-menu-sector__list b32">

                        <?php foreach ($settings['list_4'] as $item) : ?>
                          <li><?php echo $item['link_title_4'] ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer__botom">
          <div class="container">
            <nav class="footer__botom-nav">
              <ul class="footer-bottom-nav-list">
                <li class="sm-hide"><?php echo $settings['title_5'] ?></li>

                <?php foreach ($settings['list_5'] as $item) : ?>
                  <li><a href="<?php echo $item['button_link_5']['url'] ?>"><?php echo $item['link_title_5'] ?></a></li>
                <?php endforeach; ?>
              </ul>
            </nav>
          </div>
        </div>
      </footer>
    </div>


<?php
  }
}
?>