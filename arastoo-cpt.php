<?php
/**
 * @package Arastoo CPT
 * @version 1.0.0
 */
/*
Plugin Name: Arastoo CPT
Plugin URI: https://github.com/lucenadigital/arastoo-cpt/
Description: Smart, Lightweight Custom Post Type
Author: Arteo
Version: 1
Author URI: https://www.michaelcastrillo.com
*/

add_action('admin_init', 'arastoo_cpt_group_settings');
function arastoo_cpt_group_settings() {
 
	register_setting('arastoo_cpt_options_group', 'arastoo_cpt_title');
 	register_setting('arastoo_cpt_options_group', 'arastoo_cpt_slug');
	register_setting ('arastoo_cpt_options_group', 'arastoo_cpt_title_two');
	register_setting ('arastoo_cpt_options_group', 'arastoo_cpt_slug_two');
 
}



add_action( 'admin_menu', 'arastoo_cpt_options' );
function arastoo_cpt_options() {
 
	add_options_page(
		'Arastoo CPT', // The Page Title
		'Arastoo CPT', // Menu link text
		'manage_options', // capability to access the page
		'arastoo-cpt', // This is the page URL slug
		'arastoo_cpt_options_content', // callback function with content
		2 // priority
	);
 
}

 
function arastoo_cpt_options_content(){ ?>
 
<div class="wrap">
        <h2>Arastoo CPT</h2>
        <form method="post" action="options.php">
            <?php settings_fields('arastoo_cpt_options_group'); ?>
 
        <table class="form-table">
 
            <tr>
                <th><label for="arastoo_cpt_title_id">CPT Title:</label></th>
 
                <td>
<input type = "text" class="regular-text" id="arastoo_cpt_title_id" name="arastoo_cpt_title" value="<?php echo get_option('arastoo_cpt_title'); ?>">
                </td>
            </tr>
 
            <tr>
                <th><label for="arastoo_cpt_slug_id">CPT Slug:</label></th>
                <td>
<input type = "text" class="regular-text" id="arastoo_cpt_slug_id" name="arastoo_cpt_slug" value="<?php echo get_option('arastoo_cpt_slug'); ?>">
                </td>
            </tr>
 
            <tr>
                <th><label for="arastoo_cpt_title_two_id">CPT Title 2:</label></th>
   <td>
<input type = "text" class="regular-text" id="arastoo_cpt_title_two_id" name="arastoo_cpt_title_two" value="<?php echo get_option('arastoo_cpt_title_two'); ?>">
                </td>
            </tr>
            <tr>
                <th><label for="arastoo_cpt_slug_two_id">CPT Slug 2:</label></th>
                <td>
<input type = "text" class="regular-text" id="arastoo_cpt_slug_two_id" name="arastoo_cpt_slug_two" value="<?php echo get_option('arastoo_cpt_slug_two'); ?>">
                </td>
            </tr>
        </table>
 <div><em><strong style="color:#F00;">IMPORTANT:</strong> Update permalink structure after clicking on the Save Changes button.</em> Go to Settings > <a href="<?php echo admin_url( 'options-permalink.php' ); ?>">Permalinks</a></div>
        <?php submit_button(); ?>
 
    </div>
 
<?php }

// REGISTERING CUSTOM POST TYPES

if ( ! function_exists( 'create_post_type' ) ) :

function create_post_type() {
	$arastoo_cpt_title = get_option('arastoo_cpt_title');
	$arastoo_cpt_title_two = get_option('arastoo_cpt_title_two');
	$arastoo_cpt_slug = get_option ('arastoo_cpt_slug');
	$arastoo_cpt_slug_two = get_option ('arastoo_cpt_slug_two');
	
	register_post_type( $arastoo_cpt_title, // change the name
		array(
			'labels' => array(
				'name' => __( $arastoo_cpt_title ), // variable name
				'singular_name' => __( $arastoo_cpt_title ), // variable name
			),
			'public' => true,
			'supports' => array ( 'title', 'editor', 'custom-fields', 'page-attributes', 'thumbnail' ), // some extra options
			//'taxonomies' => array( 'category', 'post_tag' ), //  categories and tags
			'hierarchical' => false, // set false to act similar to page
			'menu_icon' => 'dashicons-admin-page', // menu icon
			'rewrite' => array ( 'slug' => __( $arastoo_cpt_slug ) ) // change url slag
		)
	);
	register_post_type( $arastoo_cpt_title_two, // change the name
		array(
			'labels' => array(
				'name' => __( $arastoo_cpt_title_two ), // change the name
				'singular_name' => __( $arastoo_cpt_title_two ), // change the name
			),
			'public' => true,
			'supports' => array ( 'title', 'editor', 'page-attributes', 'thumbnail' ), // extra options
			//'taxonomies' => array( 'category', 'post_tag' ), //  categories and tags
			'hierarchical' => false, // set false to act like page
			'menu_icon' => 'dashicons-admin-page', // menu icon
			'rewrite' => array ( 'slug' => __( $arastoo_cpt_slug_two ) ) // change url slug
		)
	);

}
add_action( 'init', 'create_post_type' );

endif; //


