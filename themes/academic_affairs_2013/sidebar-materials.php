<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

<div id="menu">
	<h2><a href="/materials/">Search by Materials</a></h2>
	<li class="categories">
	<ul>
<?php $material_terms = get_terms('dw_materials', array('hide_empty' => false));
 // print_r($material_terms);
foreach($material_terms as $material_term) : ?>
<li class="cat-item"><a href="/materials/<?php echo $material_term->slug; ?>"><?php echo $material_term->name; ?></a></li>	
	
<?php 	endforeach; ?>
	</ul>
	</li>
	<h2><a href="/locations_map/">Locations Map</a></h2>
	<h2><a href="/locations/">All Locations</a></h2>
</div>