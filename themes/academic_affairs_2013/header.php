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
    <?php // versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."style.css") ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?ver=' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
    
    <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
    <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/vendor/modernizr-2.6.1.min.js") ?>

    <!-- Wordpress Head Items -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
<style type="text/css" media="screen">
	.gce-list-event, .gce-tooltip-event {
	    background-color: #fff !important;
		font-weight: bold;
		padding: 0;
	}
</style>

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
			 wp_nav_menu( array( 'theme_location' => 'primary' ) ); 
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
