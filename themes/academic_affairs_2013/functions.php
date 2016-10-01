<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

// ------------ DANIEL STUFF --------------------------
include_once('includes/dw_custom_posts.php');
include_once('includes/dw_custom_taxonomies.php');

// ------------ DANIEL STUFF --------------------------

add_theme_support( 'post-thumbnails' );
add_image_size( 'home-wide', 940, 395, true );
// add_image_size( 'med-thumb', 200, 200, true );
update_option('medium_size_w', 550);
update_option('medium_size_h', 2000);
register_nav_menus( array(
	'primary' => __( 'Primary Menu' ),
) );

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

/**
 * Register widgetized areas
 *
 * function tied to the init hook.
 */
function dw_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => 'Academic Affairs Calendar',
		'id' => 'academic_affairs_calendar',
		'description' => 'This is for the calendar widget on the front page.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'dw_widgets_init' );

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


