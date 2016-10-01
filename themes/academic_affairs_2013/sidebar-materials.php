<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

<div id="menu">
	<li class="categories">
		Materials
	<ul>
<?php $material_terms = get_terms('dw_materials', array('hide_empty' => false));
 // print_r($material_terms);
foreach($material_terms as $material_term) : ?>
<li class="cat-item"><a href="/materials/<?php echo $material_term->slug; ?>"><?php echo $material_term->name; ?></a></li>	
	
<?php 	endforeach; ?>
	</ul>
	</li>
</div>