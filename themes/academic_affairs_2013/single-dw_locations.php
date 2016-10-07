<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <header>
	<h3>Makers' Assets</h3>
      <h2><?php the_title(); ?></a>
</h2>
    </header><br /><br /><br />
    <div><?php the_post_thumbnail('medium'); ?>
<?php the_content(); ?></div>
    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
   
    <footer>
      <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
       <!-- <div> --> <?php // echo get_the_term_list( $post->ID, 'dw_materials', 'Makers\' Assets: ', ', ' ); //solution 1, just words ?>  <!--</div> -->

	<?php $material3_terms = get_the_terms( $post->ID, 'dw_materials' );  
		foreach ($material3_terms as $material3_term) : ?>
		<div class="materials-for-single-locations">
			<a href="/materials/<?php echo $material3_term->slug; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/<?php echo $material3_term->slug; ?>.png" width="55px" height="55px" class="alignnone" ><br /><?php echo $material3_term->name; ?></a></div>
		<?php endforeach; ?>
		
    </footer><br clear="all" />
    <nav>
		<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
		<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
	</nav><!-- .nav-single -->

    <?php comments_template(); ?>

  </article>

<?php endwhile; else: ?>

  <p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

</div>
<?php get_sidebar('locations'); ?>
<?php get_footer(); ?>
