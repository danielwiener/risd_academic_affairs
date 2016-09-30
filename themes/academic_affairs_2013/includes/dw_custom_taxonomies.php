<?php
/**
 * Custom Taxonomy Code
 *
 *
 * @package Daniel Wiener
 * @since Daniel Wiener 1.0
 */ 
add_action( 'init', 'build_taxonomies', 0 );  
if ( ! function_exists( 'build_taxonomies' ) ):


	function build_taxonomies() {  							

		 $labels = array(
	    'name' => _x( 'Folios', 'taxonomy general name' ),
	    'singular_name' => _x( 'Folio', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Search Folios' ),
	    'popular_items' => __( 'Popular Folios' ),
	    'all_items' => __( 'All Folios' ),
	    'parent_item' => null,
	    'parent_item_colon' => null,
	    'edit_item' => __( 'Edit Folio' ), 
	    'update_item' => __( 'Update Folio' ),
	    'add_new_item' => __( 'Add Folio' ),
	    'new_item_name' => __( 'New Name of a Folio' ),
	  ); 

		register_taxonomy(
		'dw_folio',
		'dw_other_documents',
			array( 'hierarchical' => true,
			'labels' => $labels,
			'query_var' => true,
			'show_ui' => true,
			'public' => true,
			'show_in_nav_menus' => true,
			'rewrite' => array( 'slug' => 'folio',
								'with_front' => false,
								'hierarchical' => 'true',
								) ) );
	}											
						
		endif;