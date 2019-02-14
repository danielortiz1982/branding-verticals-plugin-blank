<?php

/*
Plugin Name: Branding Verticals Blank Plugin
Plugin URI:  http://www.brandingverticals.com/
Description: A bare-bones scaffolding for WordPress plugin development ~ Add shortcode - [bv-blank]
Version:     1.0
Author:      dortiz ~ BV Engineering
Author URI:  http://www.brandingverticals.com/
*/

class Branding_Verticals_Plugin{

    function __construct(){
        add_action('init', array($this, 'custom_post_types'));
        add_action('init', array($this, 'custom_taxonomy'));
        add_action('init', array($this, 'custom_meta_box'));
        add_action('init', array($this, 'custom_filter'));
        add_filter('single_template', 'template_single_post');
        add_action('add_meta_boxes', 'add_sample_meta');
        add_action( 'save_post', 'sample_meta_box_save' );
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_shortcode('bv-blank', array($this, 'short_code_template'));
        register_activation_hook(__FILE__, array($this, 'activate'));
    }
    // end of __construct

    public function custom_post_types(){
        include(plugin_dir_path(__FILE__) . 'includes/custom_post_type.php');
    }
    // end of custom_post_types

    public function custom_taxonomy(){
        include(plugin_dir_path(__FILE__) . 'includes/custom_taxonomies.php');
    }
    // end of custom_taxonomy

    public function custom_meta_box(){
        include(plugin_dir_path(__FILE__) . 'includes/custom_meta_boxes.php');
    }
    // end of custom_meta_box

    public function custom_filter($single){
        include(plugin_dir_path(__FILE__) . 'includes/custom_filters.php');
    }
    // end of custom_filter

    public function enqueue_scripts(){
        include(plugin_dir_path(__FILE__) . 'includes/enqueue_scripts.php');
    }
    // end of enqueue_scripts

    public function short_code_template($atts=array(), $content=''){
        $atts = shortcode_atts(array(
            'file' => 'templates/bv-template.php'
        ), $atts);
        if(!$atts['file']) return ''; // needs a file name!
        $file_path = dirname(__FILE__).'/'.$atts['file']; // adjust your path here
        if(!file_exists($file_path)) return '';
        ob_start();
        include($file_path);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
    // end of short_code_template

    public function activate(){
        flush_rewrite_rules();
    }
    // end of activate
}

global $branding_verticals_plugin;
$branding_verticals_plugin = new Branding_Verticals_Plugin;