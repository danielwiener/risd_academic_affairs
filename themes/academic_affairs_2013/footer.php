<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

  <footer>
      <div id="loginfo">
        <?php wp_loginout(); ?>
      </div>
      <div id="contact">
        <a href="mailto:jconnell@risd.edu">Contact Web Administrator</a>
      </div>
      <div id="copyright">
        <a href=""><span class="cplogo">&#169;</span> <?php echo date("Y") ?> Rhode Island School of Design</a>
      </div>
      <div id="facebook">
        <a href="https://www.facebook.com/RISDAcademicAffairs">
          <img src="<?php bloginfo("stylesheet_directory")?>/images/facebook.png">Find us on Facebook
        </a>
      </div>
  </footer>
</div> <!--! end of #container -->

  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>js/vendor/jquery-1.8.0.min.js"><\/script>')</script>

  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/plugins.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/main.js") ?>

  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/vendor/jquery.tools.min.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/main.js") ?> 

  <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet
       change the UA-XXXXX-X to be your site's ID -->
  <!-- WordPress.com does not allow Google Analytics code to be built into themes they host. 
       Add this section from HTML Boilerplate manually (html5-boilerplate/index.html), or use a Google Analytics WordPress Plugin-->
	   
  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script>
    var _gaq=[['_setAccount','UA-44241244-1'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
			   
  <?php wp_footer(); ?>

</body>
</html>
