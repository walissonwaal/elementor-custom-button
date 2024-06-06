<?php
/**
 * Plugin Name: Button Elementor Widget
 * Description: A custom Button Elementor widget that includes a fixed button with smooth scrolling to Embratur.
 * Version: 1.0.0
 * Author: in.Pacto
 */

if (!defined('ABSPATH')) {
  exit;
}

function register_button_elementor_widget($widgets_manager)
{
  require_once (__DIR__ . '/widgets/custom-button-widget.php');
  $widgets_manager->register(new \Elementor_Custom_Button_Widget());
}
add_action('elementor/widgets/register', 'register_button_elementor_widget');

function custom_elementor_widget_scripts()
{
  wp_enqueue_style('custom-elementor-widget-style', plugins_url('/assets/css/style.css', __FILE__));
  wp_enqueue_script('custom-elementor-widget-script', plugins_url('/assets/js/button-script.js', __FILE__), array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'custom_elementor_widget_scripts');
