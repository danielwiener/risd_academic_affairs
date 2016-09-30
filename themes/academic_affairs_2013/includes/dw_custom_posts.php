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
  

  /* BEGIN Other Documents Post Type*/ 
  $labels = array(
    'name' => _x('Other Documents', 'post type general name'),
    'singular_name' => _x('Other Documents', 'post type singular name'),
    'add_new' => _x('Add New', 'dw_other_documents'),
    'add_new_item' => __('Add New Other Documents'),
    'edit_item' => __('Edit Other Documents'),
    'edit' => _x('Edit', 'dw_other_documents'),
    'new_item' => __('New Other Documents'),
    'view_item' => __('View Other Documents'),
    'search_items' => __('Search Other Documents'),
    'not_found' =>  __('No Other Documents found'),
    'not_found_in_trash' => __('No Other Documents found in Trash'), 
    'view' =>  __('View Other Documents'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true, 
    'capability_type' => 'post',
    'taxonomies' => array( 'post_tag', 'folios'),
    'hierarchical' => false,
    'can_export' => true,
    'menu_position' => 5,
    'show_in_nav_menus' => true,
	'has_archive' => true,
    'rewrite' => array( 'slug' => 'other-documents' ),
    'supports' => array('title','editor','thumbnail','excerpt','revisions','custom-fields')
  ); 
  register_post_type('dw_other_documents',$args);
}


/*--- Custom Messages - title_updated_messages ---*/
 add_filter('post_updated_messages', 'title_updated_messages');
 
 function title_updated_messages( $messages ) {
   global $post, $post_ID;

$messages['dw_other_documents'] = array(
0 => '', // Unused. Messages start at index 1.
1 => sprintf( __('Other Document updated. <a href="%s">View Other Document</a>'), esc_url( get_permalink($post_ID) ) ),
2 => __('Custom field updated.'),
3 => __('Custom field deleted.'),
4 => __('Other Document updated.'),
/* translators: %s: date and time of the revision */
5 => isset($_GET['revision']) ? sprintf( __('Other Document restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
6 => sprintf( __('Other Document published. <a href="%s">View Other Document</a>'), esc_url( get_permalink($post_ID) ) ),
7 => __('Other Document saved.'),
8 => sprintf( __('Other Document submitted. <a target="_blank" href="%s">Preview Other Document</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
9 => sprintf( __('Other Document scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Other Document</a>'),
  // translators: Publish box date format, see http://php.net/date
  date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
10 => sprintf( __('Other Document draft updated. <a target="_blank" href="%s">Preview Other Document</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
);

   return $messages;
 }
?>