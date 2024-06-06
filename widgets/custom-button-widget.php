<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_Custom_Button_Widget extends \Elementor\Widget_Base
{

  public function get_name()
  {
    return 'custom_button';
  }

  public function get_title()
  {
    return __('Custom Button', 'custom-elementor-widget');
  }

  public function get_icon()
  {
    return 'eicon-button';
  }

  public function get_categories()
  {
    return ['basic'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'content_section',
      [
        'label' => __('Content', 'custom-elementor-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'button_text',
      [
        'label' => __('Button Text', 'custom-elementor-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Descubra', 'custom-elementor-widget'),
        'placeholder' => __('Enter button text', 'custom-elementor-widget'),
      ]
    );

    $this->add_control(
      'button_link',
      [
        'label' => __('Button Link', 'custom-elementor-widget'),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => __('#section-id', 'custom-elementor-widget'),
        'show_external' => true,
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
        ],
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    ?>
    <a href="<?php echo esc_url($settings['button_link']['url']); ?>"
      class="elementor-button-fixed"><?php echo esc_html($settings['button_text']); ?></a>
    <?php
  }

  protected function _content_template()
  {
    ?>
    <a href="{{ settings.button_link.url }}" class="elementor-button-fixed">{{{ settings.button_text }}}</a>
    <?php
  }
}
