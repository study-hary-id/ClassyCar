<?php
/**
 * @package AlecaddPlugin
 */
/*
Plugin Name:    Alecadd Plugin
Plugin URI:     https://study-hary-id.github.io
Description:    This is my first attempt on writing a custom plugin for this amazing tutorial series.
Version:        1.0.0
Author:         Muhammad Haryansyah
Author URI:     https://study-hary-id.github.io
License:        GPLv2 or later
Text Domain:    alecadd-plugin
*/

if (!defined('ABSPATH')) {
    die('-1');
}

class AlecaddPlugin {
    function __construct() {
        $this->create_post_type();
    }

    function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function custom_post_type() {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }

    function create_post_type() {
        add_action('init', array($this, 'custom_post_type'));
    }

    function enqueue() {
        wp_enqueue_style('pluginstyle', plugins_url('/assets/css/style.css', __FILE__));
        wp_enqueue_script('pluginstyle', plugins_url('/assets/js/script.js', __FILE__));
    }
}

if (class_exists('AlecaddPlugin')) {
    $alecaddPlugin = new AlecaddPlugin;
    $alecaddPlugin->register();
}

register_activation_hook(__FILE__, array($alecaddPlugin, 'activate'));
register_deactivation_hook(__FILE__, array($alecaddPlugin, 'deactivate'));
