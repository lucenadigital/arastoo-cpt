<?php
/**
 * @package Arastoo CPT
 * @version 1.0.1
 */
/*
Plugin Name: Arastoo CPT
Plugin URI: https://github.com/lucenadigital/arastoo-cpt/
Description: Smart Plugin that can create upto two Custom Post Type. Settings > Arastoo CPT
Author: Arteo
Version: 1.0.1
Author URI: https://github.com/lucenadigital/
*/


$plugin_dir = ABSPATH . 'wp-content/plugins/arastoo-cpt/';

include $plugin_dir . 'assets/cpt-script.js';
include $plugin_dir . 'parts/cpt-register.php';

add_action( 'init', 'arastoo_create_post_type' );
add_action('admin_init', 'arastoo_cpt_group_settings');
add_action( 'admin_menu', 'arastoo_cpt_options' );


	
?>
