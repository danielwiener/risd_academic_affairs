<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

<div id="menu">
	<li class="categories">
		Locations
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
	           <li class="cat-item"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
	</ul>
	</li>
</div>