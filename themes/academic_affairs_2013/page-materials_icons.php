<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>
<?php if(is_user_logged_in()):?>
<div id="main" role="main">

  <?php if (have_posts()) : ?>
  <section>
   
    <?php /* If this is a paged archive */ (isset($_GET['paged']) && !empty($_GET['paged']))  ?>
    <h2 class="pagetitle">Materials</h2>

    <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?>>
      <header>


      </header>


	<?php $material_terms = get_terms('dw_materials', array('hide_empty' => false));
	 // print_r($material_terms);
	foreach($material_terms as $material_term) : ?>
	<div class="materials">
	
		<a href="/materials/<?php echo $material_term->slug; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/<?php echo $material_term->slug; ?>.png" width="50px" height="50px" ><br /><?php echo $material_term->name; ?></a></div>	

	<?php 	endforeach; ?>


      <footer>
        <div><?php the_tags('Tags: ', ', ', '<br />'); ?></div>
        <div><?php echo get_the_term_list( $post->ID, 'dw_materials', 'Materials: ', ', ' );  ?></div>
      </footer>
    </article>


    <?php endwhile; ?>

    <nav>
      <div class="old"><?php next_posts_link('&laquo; Older Entries') ?></div>
      <div class="new"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
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

<?php get_sidebar('locations'); ?>
<?php else: ?>
	Sorry, you must first <a href=”/wp-login.php”>log in</a> to view this page.
	<?php wp_login_form(); ?>
<?php endif; ?>

<?php get_footer(); ?>
