<?php
/**
 * Creating custom taxonomy for products.
 *
 * @package LionHeart\CustomProducts\Custom
 *
 * @since 1.0.0
 *
 * @author LionHeart Development
 *
 * @link https://lionheartdevs.com/
 *
 * @license GPL-2.0+
 */


namespace LionHeart\CustomProducts\Custom;


add_action( 'init', __NAMESPACE__ . '\register_custom_taxonomy', 6 );
/**
 * Register the taxonomy for Products.
 *
 * @return void
 * @since 1.0.0
 *
 */
function register_custom_taxonomy() {

	$labels = array(
		'name'              => _x( 'Groups', 'taxonomy general name', 'customproducts' ),
		'singular_name'     => _x( 'Group', 'taxonomy singular name', 'customproducts' ),
		'search_items'      => __( 'Search Groups', 'customproducts' ),
		'all_items'         => __( 'All Groups', 'customproducts' ),
		'view_item'         => __( 'View Group', 'customproducts' ),
		'parent_item'       => __( 'Parent Group', 'customproducts' ),
		'parent_item_colon' => __( 'Parent Group:', 'customproducts' ),
		'edit_item'         => __( 'Edit Group', 'customproducts' ),
		'update_item'       => __( 'Update Group', 'customproducts' ),
		'add_new_item'      => __( 'Add New Group', 'customproducts' ),
		'new_item_name'     => __( 'New Group Name', 'customproducts' ),
		'not_found'         => __( 'No Groups Found', 'customproducts' ),
		'back_to_items'     => __( 'Back to Groups', 'customproducts' ),
		'menu_name'         => __( 'Group', 'customproducts' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'group' ),
		'show_in_rest'      => true,
	);


	register_taxonomy( 'group', 'products', $args );

}
