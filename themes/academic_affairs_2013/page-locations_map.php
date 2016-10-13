<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>
<?php if(is_user_logged_in()):?>
<div id="main" role="main">

  <?php if (have_posts()) : ?>
  <section>
   
    <?php /* If this is a paged archive */ (isset($_GET['paged']) && !empty($_GET['paged']))  ?>
    <h2 class="pagetitle">Makers' Resources Location Map</h2>

    <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?>>
      <header>
      </header>
      <map name="maploc" id="maploc">
			<area shape="poly" coords="416,535, 429,522, 436,536, 442,535, 447,547, 432,556" href="/locations/161-s-main-st/" alt="161 South Main"  >
			<area shape="poly" coords="342,87, 364,83, 373,103, 362,105, 359,96, 346,100" href="/locations/187-garage/" alt="187 Garage"  >
			<area shape="poly" coords="178, 86, 202, 82, 208, 98, 183, 105" href="/locations/189-canal-street/" alt="189 Canal St."  >
			<area shape="poly" coords="324, 266, 352, 255, 360, 268, 330, 279" href="/locations/bank-building/" alt="Bank Building"  >
			<area shape="poly" coords="451, 583, 480, 566, 491, 580, 462, 602" href="/locations/beb-bayard-ewing-building/" alt="BEB"  >
			<area shape="poly" coords="396, 240, 413, 235, 417, 247, 397, 252" href="/locations/benson-hall/" alt="Benson Hall"  >
			<area shape="poly" coords="87, 595, 82, 604, 53, 584, 61, 575" href="/locations/cit-mason-building/" alt="CIT/Mason"  >
			<area shape="poly" coords="334, 283, 390, 262, 395, 277, 343, 298" href="/locations/college-building/" alt="College Building"  >
			<area shape="poly" coords="292, 236, 301, 255, 268, 271, 256, 251" href="/locations/design-center/" alt="Design Center"  >
			<area shape="poly" coords="49, 582, 83, 606, 71, 615, 43, 592" href="/locations/fletcher-building/" alt="Fletcher Building"  >
			<area shape="poly" coords="360, 254, 382, 245, 387, 261, 364, 267" href="/locations/memorial-hall/" alt="Memorial Hall"  >
			<area shape="poly" coords="301, 212, 315, 205, 334, 255, 318, 261" href="/locations/metcalf-building/" alt="Metcalf Building"  >
			<area shape="poly" coords="217, 180, 260, 163, 272, 191, 230, 211" href="/locations/prov-wash/" alt="Prov Wash"  >
           <area shape="poly" coords="393, 175, 400, 167, 420, 172, 432, 182, 435, 197, 415, 185" href="/locations/south-hall/" alt="South Hall"  >
			<area shape="poly" coords="318, 195, 336, 188, 340, 207, 324, 212" href="/locations/waterman-building/" alt="Waterman Building"  >
           <area shape="poly" coords="193, 318, 223, 293, 252, 322, 228, 351" href="/locations/15-west" alt="15 West"  >
           <area shape="poly" coords="268, 277, 299, 259, 307, 276, 278, 291" href="/locations/auditorium/" alt="Auditorium"  >
           <area shape="poly" coords="351, 185, 361, 182, 365, 197, 355, 198" href="/locations/carr-house/" alt="Carr House"  >
           <area shape="poly" coords="297, 307, 311, 294, 320, 301, 305, 314" href="/locations/market-house/" alt="Market House"  >
           <area shape="poly" coords="245, 232, 267, 223, 275, 236, 253, 246" href="/locations/illustration-studies-building/" alt="Illustration Studies Building"  >
           <area shape="poly" coords="328, 56, 367, 50, 368, 76, 336, 80" href="/locations/41-meeting-street-studios/" alt="41 Meeting St."  >
           <area shape="poly" coords="279, 17, 305, 13, 312, 45, 282, 47" href="/locations/what-cheer-studios/" alt="What Cheer Studios"  >
		</map>
	<img src="<?php echo get_template_directory_uri(); ?>/images/map5.png" width="613" height="757" usemap="#maploc">
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
<?php else: ?>
	Sorry, you must first <a href=”/wp-login.php”>log in</a> to view this page.
	<?php wp_login_form(); ?>
<?php endif; ?>

<?php get_footer(); ?>
