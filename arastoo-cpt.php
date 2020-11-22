<?php
/**
 * @package Arastoo CPT
 * @version 1.0.2
 */
/*
Plugin Name: Arastoo CPT
Plugin URI: https://github.com/lucenadigital/arastoo-cpt/
Description: Smart Plugin that can create upto two Custom Post Type. Settings > Arastoo CPT
Author: Arteo
Version: 1.0.2
Author URI: https://www.michaelcastrillo.com/
*/

/** Include parts & assets files **/
include plugin_dir_path( __FILE__ ) . 'parts/arastoo_cf_functions.php';
include plugin_dir_path( __FILE__ ) . 'assets/cpt-script.js';

/** Initiate functions **/
add_action( 'init', 'arastoo_cpt_create_main' );
add_action('admin_init', 'arastoo_cpt_group_settings');
add_action( 'admin_menu', 'arastoo_cpt_options' );


	
?>
