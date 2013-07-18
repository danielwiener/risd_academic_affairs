<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */


add_theme_support( 'post-thumbnails' );
add_image_size( 'home-wide', 940, 395, true );
update_option('medium_size_w', 550);
update_option('medium_size_h', 2000);

// Custom HTML5 Comment Markup
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li>
     <article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
       <header class="comment-author vcard">
          <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
          <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
          <time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a></time>
          <?php edit_comment_link(__('(Edit)'),'  ','') ?>
       </header>
       <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
       <?php endif; ?>

       <?php comment_text() ?>

       <nav>
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       </nav>
     </article>
    <!-- </li> is added by wordpress automatically -->
<?php
}

automatic_feed_links();

// Widgetized Sidebar HTML5 Markup
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<section>',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

// Custom Functions for CSS/Javascript Versioning
$GLOBALS["TEMPLATE_URL"] = get_bloginfo('template_url')."/";
$GLOBALS["TEMPLATE_RELATIVE_URL"] = wp_make_link_relative($GLOBALS["TEMPLATE_URL"]);

// Add ?v=[last modified time] to style sheets
function versioned_stylesheet($relative_url, $add_attributes=""){
  echo '<link rel="stylesheet" href="'.versioned_resource($relative_url).'" '.$add_attributes.'>'."\n";
}

// Add ?v=[last modified time] to javascripts
function versioned_javascript($relative_url, $add_attributes=""){
  echo '<script src="'.versioned_resource($relative_url).'" '.$add_attributes.'></script>'."\n";
}

// Add ?v=[last modified time] to a file url
function versioned_resource($relative_url){
  $file = $_SERVER["DOCUMENT_ROOT"].$relative_url;
  $file_version = "";

  if(file_exists($file)) {
    $file_version = "?v=".filemtime($file);
  }

  return $relative_url.$file_version;
}


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
