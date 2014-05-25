<?php

// Custom functions for Fourteen Extended plugin

add_filter( 'cmb_meta_boxes', 'fourteenxt_custom_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function fourteenxt_custom_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_fourteenxt_';

	$meta_boxes[] = array(
		'id'         => 'enable_true_fullwidth',
		'title'      => 'Fourteen Extended Page Control',
		'pages'      => array( 'page'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Set Page To True Full-width?',
				'desc'    => 'Check this box to make this page a true full width - this will remove the left sidebar from the page. You must have the full-width template selected for this to work!',
				'id'      => $prefix . 'true_fullwidth',
				'type'    => 'checkbox'
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_fourteenxt_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_fourteenxt_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'cmb/init.php';

}
