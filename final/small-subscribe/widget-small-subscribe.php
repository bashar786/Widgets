<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class smallSubscribe extends Widget_Base
{

    // INNER SCRIPTS
    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_register_script('small-subscribe', get_template_directory_uri() . '/widgets/small-subscribe/small-subscribe.js', ['elementor-frontend', 'jquery'], true, '1.0.1');
        wp_register_script('small-subscribe-elementor', get_template_directory_uri() . '/widgets/small-subscribe/small-subscribe-elementor.js', ['elementor-frontend', 'jquery'], true, '1.0.1');
        wp_register_style('small-subscribe-css', get_template_directory_uri() . '/widgets/small-subscribe/small-subscribe.css', [], '1.0');
    }

    public function get_script_depends()
    {
        return ['small-subscribe', 'small-subscribe-elementor'];
    }

    public function get_style_depends()
    {
        return ['small-subscribe-css'];
    }

    public function get_name()
    {
        return 'smallSubscribe';
    }

    public function get_title()
    {
        return esc_html__('Small subscribe', 'cabei');
    }

    public function get_icon()
    {
        return 'eicon-email-field';
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
                'label' => __('Small subscribe Options', 'cabei'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subscribe_text',
            [
                'label' => esc_html__('Subscribe text', 'cabei'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Subscribe to our', 'cabei'),
                'placeholder' => esc_html__('Type your title here', 'cabei'),
            ]
        );

        $this->add_control(
            'newsletter_text',
            [
                'label' => esc_html__('Newsletter text', 'cabei'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Newsletter', 'cabei'),
                'placeholder' => esc_html__('Type your title here', 'cabei'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $nonce = wp_create_nonce("mailchimp_nonce");

?>

        <div class="widget-small-subscribe-v1">
            <h4 class="text-w-700 text-24"><?php echo $settings['subscribe_text'] ?>
                <br> <?php echo $settings['newsletter_text'] ?>
            </h4>
            <div class="b35">
                <form class="b24 feedback-form-subscribe" action="/">
                    <div class="row no-gutters">
                        <div class="col-sm">
                            <input class="subscribe-field" type="email" name="email" required placeholder="Correo eléctronico" />
                            <input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
                            <input type="hidden" name="feedback-form-access" value="<?php echo admin_url('admin-ajax.php'); ?>" />
                        </div>
                        <div class="col-sm-auto">
                            <input id="feedback_form_btn" class="subscribe-btn" type="submit" value="Suscribirse">
                        </div>
                    </div>
                    <div>
                        <pre class="response"></pre>
                    </div>
                </form>
                <div class="dl-spinner-div">
                    <img id="cabei-spinner-subscribe" style="display: none;" src="<?php echo get_template_directory_uri() . '/widgets/footer/spinner.svg' ?>" alt="">
                </div>
                <div class="display_message-subscribe pt-2" style="color:green;"></div>
            </div>
        </div>

<?php
    }
}

?>