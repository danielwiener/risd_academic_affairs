<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>

<div id="main" role="main">
  <?php // the anouncements and updates pages lists all posts and submissions and all categories ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="post" id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></h2>
    </header>
  </article>
  <?php endwhile; endif; ?>

  <?php query_posts('posts_per_page=20'); ?>
  <?php include 'anouncements_loop.php'; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
