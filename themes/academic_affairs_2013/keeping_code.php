<?php
//241 : Directory + Resources
  //420 : Announcements + Updates
  //422 : Calendar
  //424 : Research @ RISD
  //17396 : events
  $header_pages = array(241,422,420,424);
                            $count = count($header_pages); 
                            
                            for($i = 0; $i < $count; $i++) { 
                              $classt = "";
                            
                              //check if current page is child of this page if it is add active
                              if (is_Page()){
                                if ( in_array($header_pages[$i], (array)get_post_ancestors($post->ID)) || $post->ID == $header_pages[$i])
                                  $classt .= "current_page_item ";
                              } 
                              else if (is_category()){
                                //check if current page is a subcategory of this page if it is add active
                                $nam = get_the_title($header_pages[$i]);
                                $id = get_cat_id($nam); 
                              
                                //get top level category
                                $cat_ID = get_query_var('cat');
                                    
                                    
                                //get top level page:
                                $cats = get_category_parents($cat_ID, false,',');
                                $cats = split ( ',' , $cats );
                                $cat_ID = get_cat_id($cats[0]);
                                
                                
                                if ($cat_ID == $id){
                                  $classt .= "current_page_item ";
                                }  
                              } 
                              else if (is_single()){
                                //check if current page is a subcategory of this page if it is add active
                                $nam = get_the_title($header_pages[$i]);
                                $id = get_cat_id($nam); 
                                
                                //get top level category
                                $all_cats = get_the_category();
                                $cat_ID = $all_cats[0]->cat_ID;
                                
                                //get top level page:
                                $cats = get_category_parents($cat_ID, false,',');
                                $cats = split ( ',' , $cats );
                                $cat_ID = get_cat_id($cats[0]);
                                
                                
                                if ($cat_ID == $id){
                                  $classt .= "current_page_item ";
                                }
                              }
                            
                              //check if this is the last one
                              if($i == $count-1) {
                                $classt .= "last ";
                              }
                            
                              echo '<li class="'.$classt.'">';
                              /* if (get_the_title($header_pages[$i]) == 'Calendar'){ //should this link to the calendar category?
                                echo '<a href="'.get_bloginfo('url').'/category/calendar/">';
                              } else 
                              */
                              if (get_the_title($header_pages[$i]) == 'Announcements and Updates'){ // or the anouncemenent category?
                                echo '<a href="'.get_bloginfo('url').'/category/announcements/">';
               				}elseif(get_the_title($header_pages[$i]) == 'Calendar'){
               					echo '<a href="'.get_bloginfo('url').'/gce_feed/calendar/">';
                              }else {
                                echo '<a href="'.get_permalink( $header_pages[$i] ).'">';
                              }
                              echo get_the_title($header_pages[$i]);
                              echo '</a></li>';
                            }
?>


/*** custom post types ***/
add_action( 'init', 'create_parseparse_post_types' );

//function to create custom post types
function create_acadaf_post_types() {

    //Submission Post Type
    $labels = array(
        'name' => __( 'Submission' ),
        'singular_name' => __( 'Submission' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Submission' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Submission' ),
        'new_item' => __( 'New Submission' ),
        'view' => __( 'View Submissions' ),
        'view_item' => __( 'View Submission' ),
        'search_items' => __( 'Search Submissions' ),
        'not_found' => __( 'No Submissions found' ),
        'not_found_in_trash' => __( 'No Submissions found in Trash' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'show_in_nav_menus' => true,
        'menu_position' => 5,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields'
        ),
        'taxonomies' => array(
            'category',
            'post_tag'
        ),
        'has_archive' => 'submission',
    );
    register_post_type( 'submission', $args );

    //Newsletter Post Type
    $labels = array(
        'name' => __( 'Newsletter' ),
        'singular_name' => __( 'Newsletter' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Newsletter' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Newsletter' ),
        'new_item' => __( 'New Newsletter' ),
        'view' => __( 'View Newsletters' ),
        'view_item' => __( 'View Newsletter' ),
        'search_items' => __( 'Search Newsletters' ),
        'not_found' => __( 'No Newsletters found' ),
        'not_found_in_trash' => __( 'No Newsletters found in Trash' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'show_in_nav_menus' => true,
        'menu_position' => 5,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields'
        ),
        'taxonomies' => array(
            'category',
            'post_tag'
        ),
        'has_archive' => 'newsletter',
    );
    register_post_type( 'newsletter', $args );
}




add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query ) {
    if ( is_category() ) {
        //if (false == $query->query_vars['suppress_filters'] )
        $query -> set( 'post_type', array(
                'post',
                'submission'
            ) );
        return $query;
    }
}
