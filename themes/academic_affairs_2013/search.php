<?php
/*
Template Name: Search Page
*/

get_header();
include(TEMPLATEPATH . '/wrapperHead.php');

query_posts($query_string . '&posts_per_page=-1'); if (have_posts()) : 

	// set up loop variables
	$currentCategory = ""; 
    
    $dirStrCount = 0;
    $opStrCount = 0;
    $tpStrCount = 0;
    $assStrCount = 0;
	$anStrCount = 0;
	$currStrCount = 0;
	$eventStrCount = 0;
	$otherStrCount = 0;
	
		
	while (have_posts()) : the_post();
	
		// next collect all the posts by category
		//if(get_post_meta($post->ID, "showInSearch", "single") == false){
		
		if (! $post->post_parent){
			array($postCats);
			$postCats = get_the_category($post->ID);
			
			if(in_category('current-issues',$post->ID)){
				$currStr .= addPost($post->ID);
				$currStrCount++;
			}
			else if(in_category('Calendar',$post->ID)){
				$eventStr .= addPost($post->ID);
				$eventStrCount++;
			}
			else if(in_category(4,$post->ID)){
				$anStr .= addPost($post->ID);
				$anStrCount++;
			} 
			else {
				$otherStr .= addPost($post->ID);
				$otherStrCount++;
			}
			
		} else {
			$search_ancestors = get_post_ancestors($post->post_parent);
			
			$postp = get_page($post->post_parent);
			$switch = true;
			
			while ($switch){
				if ($postp->post_parent != 0){
					$postp = get_page($postp->post_parent);
				} else {
					$switch = false;
				}
			}
			
			if (in_array(241,$search_ancestors) || $postp->ID == 241){
				$dirStr .= addPost($post->ID);
				$dirStrCount++;
			} else if (in_array(579,$search_ancestors) || $postp->ID == 579){
				$opStr .= addPost($post->ID);
				$opStrCount++;
			} else if (in_array(440,$search_ancestors) || $postp->ID == 440){
				$tpStr .= addPost($post->ID);
				$tpStrCount++;
			} else if (in_array(424,$search_ancestors) || $postp->ID == 424){
				$assStr .= addPost($post->ID);
				$assStrCount++;
			} else {
				$otherStr .= addPost($post->ID);
				$otherStrCount++;
			}
		}
		//}
		
	endwhile;
		    	
	$totalcount = $currStrCount + $eventStrCount + $anStrCount + $dirStrCount + $opStrCount+$assStrCount+$otherStrCount; 
?>

<h2 class="pagetitle"><?php print $wp_query->post_count; ?> results for "<?php the_search_query(); ?>"</h2>
	
	<?php printSection($dirStr,$dirStrCount, get_the_title(241)); ?>
	<?php printSection($opStr,$opStrCount, get_the_title(579)); ?>
	<?php printSection($tpStr,$tpStrCount, get_the_title(440)); ?>
	<?php printSection($assStr,$assStrCount, get_the_title(424)); ?>
	<?php printSection($anStr,$anStrCount, "Announcements & Updates"); ?>
	<?php printSection($eventStr,$eventStrCount, "Calendar"); ?>
	<?php printSection($currStr,$currStrCount, "Current Initiatives"); ?>
	<?php printSection($otherStr,$otherStrCount, "Other"); ?>
	
	

<?php else: ?>

	<br />
	<h2 class="center">Please try a different search</h2>

<?php endif; ?>






<?php function printSection($sectionStr, $sectionCount, $sectionTitle){
	if($sectionStr): ?>
	<div class="resultsTitle"> <?php echo $sectionTitle ?><span class="resultsCount"><?php print $sectionCount . " results"; ?></span></div>
	<div class="resultsSection">
		<?php print $sectionStr; ?>
	</div>
	<?php endif;
}?>





<?php function addPost($theId){
	$str = "";

	$str .= "<div class=\"post\">";
	$str .= "<h1><a href=\"" . get_permalink() . "\" rel=\"bookmark\" title=\"Permanent Link to " . get_the_title() . "\">" . get_the_title() . "</a></h1>";

	$str .= "<h4 class=\"meta\">";
	
	$cat = get_the_category(); 
	if ('5' != $cat[0]->cat_ID){
		$str .= "updated on: ";
		$str .= get_the_modified_time('m/d/Y');
	}
	$str .= "</h4>";
			
			
	 if ('5' == $cat[0]->cat_ID){
		$str .= "<h4 class=\"meta\">";
			
			if (get_post_meta($theId, 'date_value', true)){
				$str .=  date('D, m/d/Y', get_post_meta($theId, 'date_value', true)); 
			}
			if (get_post_meta($theId, 'dateend_value', true)){
				$str .=  " to ".date('g:i a', get_post_meta($theId, 'dateend_value', true)); 
			}
			
			if (get_post_meta($post->ID, 'location_value', true)){
				$str .= "<br />";
				$str .= "Location: " . get_post_meta($post->ID, 'location_value', true);
			}
			$str .= "</h4>";

	}
	
	
	$str .= "<div class=\"storycontent\">";
	$str .= get_the_excerpt();
	$str .= "</div>";
	
	
	$str .= "</div>";
	
	return $str;
}


include(TEMPLATEPATH . '/wrapperFoot.php');
get_footer(); ?>