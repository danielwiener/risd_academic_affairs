<?php
/**
 * @package WordPress
 * @subpackage Academic_Affairs
 * Template Name: Home
 */

get_header(); ?>

<div id="content-homepage">
	<div id="content-homepage-top">
		<div id="scrollable-home"> 		     
			<div class="items"> 
				<?php $featuredCounter = 0; ?>
				<?php //query_posts('post_type=any&meta_key=isFeatured&meta_value=1&showposts=10&orderby=date');?>
				<?php query_posts(array(
					'post_type' => array( 'post', 'submission' ),
					'meta_key' => 'isFeatured',
					'meta_value' => '1',
					'posts_per_page' => 10,
					'orderby' => 'date'
					));?>
					<?php while (have_posts()) : the_post(); ?>
						<?php $featuredCounter++; ?>
						<div class="round">
							<div class="scrollable-home-image">
								<a href="<?php the_permalink(); ?>">
									<?php if(has_post_thumbnail()):
									the_post_thumbnail('home-wide' );
									print_r($thumb);
									endif; ?>
								</a>
							</div>
							
							<div class="scrollable-home-post">
								<div class="scroll-meta"><?php $c = get_the_category(); print $c[0]->cat_name ;?> | <?php the_modified_time('m.j.Y'); ?></div>
								<div class="scroll-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
								<div class="scroll-more"><a href="<?php the_permalink(); ?>">More Info</a></div>
							</div>
						</div>
					<?php endwhile; ?>
			</div>  
			<div id="mainprev"><a class="prev browse left"></a></div> 
			<div id="mainnext"><a class="next browse right"></a></div>
		</div> 
	</div>
	
	
	
	<div id="content-homepage-bottom">
		
		<div id="row-1">

			<div id="column-1">
				<h1>EVENTS</h1>
				<?php sm_cal_list_cal(3);
//				echo '<div id="sm_cal_list">';
//				echo 'temporarily disabled for maintenance...';
//				echo '</div>';
				?>
			</div>


			<div id="column-2">
					<h1>Announcements</h1>
					

					 <ul><?php
						$args = array(
							'category_name' 	=> 'announcements',
							'post_type'			=> 'post',
							'post_status'		=> 'publish',
							'posts_per_page'	=> 5,
							'orderby'			=> 'date',
							'order'				=> 'DESC'							
						);
					 	$announcments = new WP_Query($args);
							while($announcments->have_posts()) : $announcments->the_post();?>
									<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
					 <?php endwhile; ?></ul>
					<hr />
					Please email the <a href="mailto:jconnell@risd.edu">Web Administrator</a> to submit an Announcement
			</div>

			<div id="column-3">
				<h1>RISD Public Websites</h1>
				<ul>
					<li><a href="http://library.risd.edu/">fleet library website</a></li>
					<li><a href="http://risd.edu/">risd.edu</a></li>
					<li><a href="http://our.risd.edu/">our.risd.edu</a></li>
					<li><a href="http://hrrisd.wordpress.com/">risd human resources</a></li>
					<li><a href="http://www.risdmuseum.org/">risd museum of art</a></li>
					<li><a href="http://www.risdworks.com/">risd | works</a></li>
				</ul>
			</div>
			<div id="homepage-clear"></div>


		</div>
		
		
		<!-- <div id="row-2">
		
			<div id="column-4">
				<h1>UPDATES FROM THE PRESIDENT</h1>
				<br />
				<?php query_posts('cat=35&showposts=3&orderby=date&order=DESC'); ?>
				<?php while (have_posts()) : the_post(); ?>
					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<h4><?php the_modified_time('m.j.Y'); ?></h4>
					</div>
				<?php endwhile; ?>
				<div class="seeall"><a href="<?php echo get_bloginfo('url')."/?cat=35&showposts=3&orderby=date&order=DESC"; ?>">See all updates from the President</a></div>
			</div>
			
			<div id="column-5">
				<h1>UPDATES FROM THE PROVOST</h1>
				<br />
				<?php query_posts('cat=36&showposts=3&orderby=date&order=DESC'); ?>
				<?php while (have_posts()) : the_post(); ?>
					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<h4><?php the_modified_time('m.j.Y'); ?></h4>
					</div>
				<?php endwhile; ?>
				<div class="seeall"><a href="<?php echo get_bloginfo('url')."/?cat=36&showposts=3&orderby=date&order=DESC"; ?>">See all updates from the Provost</a></div>

			</div>
			<div id="homepage-clear"></div>

		</div> -->
		
	</div>
	<div id="homepage-clear"></div>




</div> 



<?php get_footer(); ?>






