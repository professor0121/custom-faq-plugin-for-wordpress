<?php
/**
 * Plugin Name: Custom FAQ Widget
 * Description: A custom Elementor widget to add FAQs to your site.
 * Version: 1.0
 * Author: Abhishek kushwaha
 */

if (! defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

// Include the Elementor Widget class
function custom_faq_widget_register()
{
    require_once __DIR__ . '/includes/widget.php';
}
add_action('elementor/widgets/register', 'custom_faq_widget_register');

// Enqueue scripts and styles
function custom_faq_widget_assets()
{
    wp_enqueue_style('custom-faq-widget-css', plugin_dir_url(__FILE__) . 'css/faq-widget.css');
    wp_enqueue_script('custom-faq-widget-js', plugin_dir_url(__FILE__) . 'js/faq-widget.js', ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', 'custom_faq_widget_assets');
