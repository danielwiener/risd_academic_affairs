<?php
/**
 * Custom Post Type Code.
 *
 * @package Daniel Wiener
 * @since Daniel Wiener 1.0
 */ 
add_action('init', 'dw_custom_init');
function dw_custom_init() 
{  
  

  /* BEGIN Locations Post Type*/ 
  $labels = array(
    'name' => _x('Locations', 'post type general name'),
    'singular_name' => _x('Location', 'post type singular name'),
    'add_new' => _x('Add New', 'dw_locations'),
    'add_new_item' => __('Add New Location'),
    'edit_item' => __('Edit Locations'),
    'edit' => _x('Edit', 'dw_locations'),
    'new_item' => __('New Location'),
    'view_item' => __('View Location'),
    'search_items' => __('Search Locations'),
    'not_found' =>  __('No Locations found'),
    'not_found_in_trash' => __('No Locations found in Trash'), 
    'view' =>  __('View Locations'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true, 
    'capability_type' => 'page',
    'taxonomies' => array('materials'),
    'hierarchical' => false,
    'can_export' => true,
    'menu_position' => 5,
    'show_in_nav_menus' => true,
	'has_archive' => true,
    'rewrite' => array( 'slug' => 'locations' ),
    'supports' => array('title','editor','thumbnail','excerpt','revisions','custom-fields', 'page-attributes')
  ); 
  register_post_type('dw_locations',$args);
}


/*--- Custom Messages - title_updated_messages ---*/
 add_filter('post_updated_messages', 'title_updated_messages');
 
 function title_updated_messages( $messages ) {
   global $post, $post_ID;

$messages['dw_other_documents'] = array(
0 => '', // Unused. Messages start at index 1.
1 => sprintf( __('Location updated. <a href="%s">View Location</a>'), esc_url( get_permalink($post_ID) ) ),
2 => __('Custom field updated.'),
3 => __('Custom field deleted.'),
4 => __('Location updated.'),
/* translators: %s: date and time of the revision */
5 => isset($_GET['revision']) ? sprintf( __('Location restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
6 => sprintf( __('Location published. <a href="%s">View Location</a>'), esc_url( get_permalink($post_ID) ) ),
7 => __('Location saved.'),
8 => sprintf( __('Location submitted. <a target="_blank" href="%s">Preview Location</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
9 => sprintf( __('Location scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Location</a>'),
  // translators: Publish box date format, see http://php.net/date
  date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
10 => sprintf( __('Location draft updated. <a target="_blank" href="%s">Preview Location</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
);

   return $messages;
 }
?>