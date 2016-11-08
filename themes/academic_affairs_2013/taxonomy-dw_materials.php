<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); 

$thisterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<div id="main" role="main">

  <?php if (have_posts()) : ?>
  <section>
   
    <?php /* If this is a paged archive */ (isset($_GET['paged']) && !empty($_GET['paged']))  ?>
    <h2 class="pagetitle">Locations with <?php echo $thisterm->name; ?></h2>

    <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class('listing_page') ?>>
      <header>
        <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

      </header><div>
      <?php if (has_post_thumbnail()){
        the_post_thumbnail('thumbnail', array( 'class' => 'alignleft' ));
      }?>
      <?php the_excerpt() ?></div>
      <footer>
        <div><?php the_tags('Tags: ', ', ', '<br />'); ?></div>
        <div class="resource_list"><?php echo get_the_term_list( $post->ID, 'dw_materials', 'Resources: ', ', ' );  ?></div>
      </footer>
    </article>
    <?php endwhile; ?>

    <nav>
    </nav>
  </section>

  <?php else :

  if ( is_category() ) { // If this is a category archive
    printf("<h2>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
  } else if ( is_date() ) { // If this is a date archive
    echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
  } else if ( is_author() ) { // If this is a category archive
    $userdata = get_userdatabylogin(get_query_var('author_name'));
    printf("<h2>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
  } else {
    echo("<h2>No posts found.</h2>");
  }
  get_search_form();

  endif;
  ?>

</div>

<?php get_sidebar('materials'); ?>

<?php get_footer(); ?>
