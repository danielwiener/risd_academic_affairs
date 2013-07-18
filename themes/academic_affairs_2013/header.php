<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
    Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    
    <meta name="description" content="">
    <meta name="author" content="">
    
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/css/normalize.css") ?>
    <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/css/main.css") ?>
    
    <!-- Wordpress Templates require a style.css in theme root directory -->
    <?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."style.css") ?>
    
    <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
    <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/vendor/modernizr-2.6.1.min.js") ?>

    <!-- Wordpress Head Items -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>

  </head>
  <body <?php body_class(); ?>>
  <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

    <div id="container">
      <header role="banner">
        <div id="navigation">
          <ul> 
            <?php 
              //241 : Directory + Resources
              //420 : Announcements + Updates
              //422 : Calendar
              //424 : Research @ RISD
              //17396 : events
              $header_pages = array(241,422,17396,420,424);
              $count = count($header_pages); 
              
              for($i = 0; $i < $count; $i++) { 
                $classt = "";
              
                //check if current page is child of this page if it is add active
                if (is_Page()){
                  if ( in_array($header_pages[$i], (array)get_post_ancestors($post->ID)) || $post->ID == $header_pages[$i])
                    $classt .= "current_page_item ";
                } 
                else if (is_category()){
                  //check if current page is a subcategory of this page if it is add active
                  $nam = get_the_title($header_pages[$i]);
                  $id = get_cat_id($nam); 
                
                  //get top level category
                  $cat_ID = get_query_var('cat');
                      
                      
                  //get top level page:
                  $cats = get_category_parents($cat_ID, false,',');
                  $cats = split ( ',' , $cats );
                  $cat_ID = get_cat_id($cats[0]);
                  
                  
                  if ($cat_ID == $id){
                    $classt .= "current_page_item ";
                  }  
                } 
                else if (is_single()){
                  //check if current page is a subcategory of this page if it is add active
                  $nam = get_the_title($header_pages[$i]);
                  $id = get_cat_id($nam); 
                  
                  //get top level category
                  $all_cats = get_the_category();
                  $cat_ID = $all_cats[0]->cat_ID;
                  
                  //get top level page:
                  $cats = get_category_parents($cat_ID, false,',');
                  $cats = split ( ',' , $cats );
                  $cat_ID = get_cat_id($cats[0]);
                  
                  
                  if ($cat_ID == $id){
                    $classt .= "current_page_item ";
                  }
                }
              
                //check if this is the last one
                if($i == $count-1) {
                  $classt .= "last ";
                }
              
                echo '<li class="'.$classt.'">';
                /* if (get_the_title($header_pages[$i]) == 'Calendar'){ //should this link to the calendar category?
                  echo '<a href="'.get_bloginfo('url').'/category/calendar/">';
                } else 
                */
                if (get_the_title($header_pages[$i]) == 'Announcements and Updates'){ // or the anouncemenent category?
                  echo '<a href="'.get_bloginfo('url').'//category/announcements/">';
                }else {
                  echo '<a href="'.get_permalink( $header_pages[$i] ).'">';
                }
                echo get_the_title($header_pages[$i]);
                echo '</a></li>';
              }
            ?>

            <li id="search">
              <form method="get" action="<?php bloginfo('url'); ?>" class="searchFormTop">
                <input type="text" size="20" name="s" value="<?php //print $_GET['s']; ?>Search"/>
                <button class="searchbutton" type="submit" class="active">Go</button>
              </form>
            </li>
          </ul>
      <div style="clear:both;"></div>
    </div>
    <div id="header-home">
      <a href="<?php bloginfo('url'); ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/Academic-Affairs-Title.png" /></a>
    </div>
  </header>
