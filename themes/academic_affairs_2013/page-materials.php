<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main">

  <?php if (have_posts()) : ?>
  <section>
   
    <?php /* If this is a paged archive */ (isset($_GET['paged']) && !empty($_GET['paged']))  ?>
    <h2 class="pagetitle">Materials</h2>

    <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?>>
      <header>
      </header>
	<?php $material2_terms = get_terms('dw_materials', array('hide_empty' => false));
	 // print_r($material_terms);
	foreach($material2_terms as $material2_term) : ?>
	<div class="materials_list">
	
		<a href="/materials/<?php echo $material2_term->slug; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/<?php echo $material2_term->slug; ?>.png" width="65px" height="65px" class="alignleft" ><?php echo $material2_term->name; ?></a>
		<?php 
			$locations = get_posts( array(
			   'numberposts' => -1, // we want to retrieve all of the posts
			   'post_type' => 'dw_locations',
			   'suppress_filters' => false, // this argument is required for CPT-onomies
			   'tax_query' => array(
			      array(
			         'taxonomy' => 'dw_materials',
				 'field' => 'slug', 
				 'terms' => $material2_term->slug
			      )
			   )
			) );
			if ($locations) : ?>

	<br /><div class="locations_list">Locations:<br />
		<?php	foreach ($locations as $location) : 
				// print_r($location);?>
			
				<a href="/locations/<?php echo $location->post_name; ?>"><?php echo $location->post_title; ?></a> |   
		<?php	endforeach; ?>
</div>
<?php	endif;
			 ?>
		
		</div>	

	<?php 	endforeach; ?>
	<footer>
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

<?php get_footer(); ?>
