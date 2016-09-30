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
	    'name' => _x( 'Materials', 'taxonomy general name' ),
	    'singular_name' => _x( 'Material', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Search Materials' ),
	    'popular_items' => __( 'Popular Materials' ),
	    'all_items' => __( 'All Materials' ),
	    'parent_item' => null,
	    'parent_item_colon' => null,
	    'edit_item' => __( 'Edit Material' ), 
	    'update_item' => __( 'Update Material' ),
	    'add_new_item' => __( 'Add Material' ),
	    'new_item_name' => __( 'New Name of a Material' ),
	  ); 

		register_taxonomy(
		'dw_materials',
		'dw_locations',
			array( 'hierarchical' => true,
			'labels' => $labels,
			'query_var' => true,
			'show_ui' => true,
			'public' => true,
			'show_in_nav_menus' => true,
			'rewrite' => array( 'slug' => 'materials',
								'with_front' => false,
								'hierarchical' => 'true',
								) ) );
	}											
						
		endif;