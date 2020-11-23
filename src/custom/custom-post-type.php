<?php
/**
 * Custom Post Type Functionality For Adding Products.
 *
 * @package     LionHeart\CustomProducts\Custom
 * @since       1.0.0
 * @author      Chris Norman
 * @link        https://lionheartdevs.com
 * @license     GNU General Public License 2.0+
 */
namespace LionHeart\CustomProducts\Custom;

add_action( 'init', __NAMESPACE__ . '\register_custom_post_type' );
/**
 * Register the custom post type for Products.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_custom_post_type() {
	$labels = array(
		'name'                  => _x( 'Products', 'Post type general name', 'customproducts' ),
		'singular_name'         => _x( 'Product', 'Post type singular name', 'customproducts' ),
		'menu_name'             => _x( 'Products', 'Admin Menu text', 'customproducts' ),
		'name_admin_bar'        => _x( 'Products', 'Add New on Toolbar', 'customproducts' ),
		'add_new'               => __( 'Add New', 'customproducts' ),
		'add_new_item'          => __( 'Add New Product', 'customproducts' ),
		'new_item'              => __( 'New Product', 'customproducts' ),
		'edit_item'             => __( 'Edit Product', 'customproducts' ),
		'view_item'             => __( 'View Product', 'customproducts' ),
		'all_items'             => __( 'All Products', 'customproducts' ),
		'search_items'          => __( 'Search Products', 'customproducts' ),
		'parent_item_colon'     => __( 'Parent Products:', 'customproducts' ),
		'not_found'             => __( 'No Products Found.', 'customproducts' ),
		'not_found_in_trash'    => __( 'No Products Found In Trash.', 'customproducts' ),
		'featured_image'        => _x( 'Product Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'customproducts' ),
		'set_featured_image'    => _x( 'Set Cover Image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'customproducts' ),
		'remove_featured_image' => _x( 'Remove Cover Image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'customproducts' ),
		'use_featured_image'    => _x( 'Use As Cover Image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'customproducts' ),
		'archives'              => _x( 'Products Archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'customproducts' ),
		'insert_into_item'      => _x( 'Insert Into Products', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'customproducts' ),
		'uploaded_to_this_item' => _x( 'Uploaded To This Product', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'customproducts' ),
		'filter_items_list'     => _x( 'Filter Products List', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'customproducts' ),
		'items_list_navigation' => _x( 'Products List Navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'customproducts' ),
		'items_list'            => _x( 'Products List', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'customproducts' ),
	);

	$features = get_all_post_type_features('post', array(

		'comments',
		'excerpt',

	));
	$args = array(
		'labels'             => $labels,
		'description'        => 'Product Custom Post Type.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'product' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-cart',
		'menu_position'      => 20,
		'supports'           => $features,
		'taxonomies'         => array( 'category', 'post_tag' ),
		'show_in_rest'       => true
	);


	register_post_type( 'Products', $args );
}



/**
 * Get all the post type supports.
 *
 * @param string $post_type The given post type
 *
 * @param array $excluded_features Array of features to exclude
 *
 * @return array
 */
function get_all_post_type_features($post_type = 'post', $excluded_features = array()) {
	$supports = get_all_post_type_supports($post_type);

	if(!$excluded_features){
		return array($supports);
	}

	$features = array();

	foreach ($supports as $feature => $value){
		if (in_array( $feature, $excluded_features)){
			continue;
		}

		$features[] = $feature;
	}

	return $features;
}

