<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

<div id="menu">
	<h2><a href="/locations/">Locations</a></h2>
	<li class="categories">
		
	<ul>
		<?php 
			$args = array(
			'post_type' 		=> 'dw_locations',
			'post_status' 		=> 'publish',
			'posts_per_page'	=> -1,
			'orderby'			=> 'menu_order',
			"order"				=> 'ASC' 
		);
		$locations_query = New WP_Query($args);
	    while ( $locations_query->have_posts() ) : $locations_query->the_post(); ?>
	           <li class="cat-item">
		<?php if (get_page_template( $post->ID ) == get_template_directory() . '/page-locations_map.php'): ?>
			<?php echo $post->menu_order ?> - 
		<?php endif ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
	</ul>
	</li>
	<h2><a href="/locations_map/">Locations Map</a></h2>
	<h2><a href="/materials">Search by Materials</a></h2>
</div>