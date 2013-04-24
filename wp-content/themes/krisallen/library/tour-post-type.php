<?php
// let's create the function for the Tour Date
function tour_post() { 
	// creating (registering) the Tour Date 
	register_post_type( 'tour', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Tour Dates', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Tour Date', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Tour Dates', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Tour Date', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Tour Dates', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Tour Date', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Tour Date', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Tour Dates', 'bonestheme'), /* Search Tour Date Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Tour Dates with Date, venue, ticket price, and FB page for RSVP', 'bonestheme' ), /* Tour Date Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom Tour Date menu */
			'rewrite'	=> array( 'slug' => 'tour', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'tour', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'thumbnail', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type('category', 'tour');
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type('post_tag', 'tour');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'tour_post');
	
    
/**
 * @category KrisAllen
 * @package  Metaboxes
 */


add_filter( 'cmb_meta_boxes', 'ka_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function ka_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ka_';

	$meta_boxes[] = array(
		'id'         => 'ka_metabox',
		'title'      => 'Tour Date Info',
		'pages'      => array( 'tour', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Venue',
				'desc' => 'field description (optional)',
				'id'   => $prefix . 'tour_text',
				'type' => 'text',
			),
			array(
				'name' => 'City',
				'desc' => 'field description (optional)',
				'id'   => $prefix . 'tour_city',
				'type' => 'text_medium',
			),
			array(
				'name' => 'State',
				'desc' => 'field description (optional)',
				'id'   => $prefix . 'tour_state',
				'type' => 'text_small',
			),
			array(
				'name' => 'Date',
				'desc' => 'field description (optional)',
				'id'   => $prefix . 'tour_date',
				'type' => 'text_date_timestamp',
			),
			array(
	            'name' => 'Time',
	            'desc' => 'field description (optional)',
	            'id'   => $prefix . 'tour_time',
	            'type' => 'text_time',
	        ),
			array(
				'name' => 'Ticket Cost',
				'desc' => 'What is the ticket price? (optional)',
				'id'   => $prefix . 'tour_cost',
				'type' => 'text_money',
			),
			array(
				'name'    => 'Tour Date Description',
				'desc'    => 'Describe any specifics about this tour date (optional)',
				'id'      => $prefix . 'tour_desc',
				'type'    => 'wysiwyg',
				'options' => array(	'textarea_rows' => 5, ),
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'metaboxes/init.php';

}	

?>
