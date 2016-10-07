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
      <h2><?php the_title(); ?></a></h2>
    </header>
    <div><?php the_post_thumbnail('medium'); ?>
<?php the_content(); ?></div>
    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
   
    <footer>
      <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
       <div><?php echo get_the_term_list( $post->ID, 'dw_materials', 'Materials: ', ', ' );  ?></div>
    </footer>
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
