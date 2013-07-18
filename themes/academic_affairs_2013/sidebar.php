<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

<!-- begin sidebar -->
<div id="menu">
<?php   


if (is_Page()){
  //get top level page:
  if ($post->post_parent) {
    $ancestors=get_post_ancestors($post->ID);
    $root=count($ancestors)-1;
    $parent = $ancestors[$root];
  } else {
    $parent = $post->ID;
  }
  
  //if top level is one of these pages
  //241 : Directory 
  //424 : Research @ RISD
  //17396 : special events
  //17399 : support services
  //create accordian list based on top page
  if ($parent == 241 || $parent == 424 || $parent == 17396 || $parent == 17399 ) {
  
    //get top level
    //$children = wp_list_pages("title_li=&child_of=". $parent ."&depth=1&echo=0");
    $children = get_pages("sort_column=menu_order&child_of=$parent&parent=$parent");
    
    //recursively loop through
    //echo '<div class="accordion">';
    echo '<div>';
    $sidebarGlobalCounter = 0;
    $localCount = -1;
    foreach($children as $child){
      $localCount++;
      //get subpages and loop through children to see if one of them is the current page
      $subc = get_pages("child_of=". $child->ID);
      $match = false;
      foreach($subc as $s){
        if ($s->ID == $post->ID) {
          $match = true;
          $sidebarGlobalCounter = $localCount;
          break;
        }
      }
      
      //is this page or one of its children the current page? if so expand that part
      echo '<div class="pane">';
      if ($child->ID === $parent){
        if ($match == true){
          echo '<h2 class="current">'.get_the_title($child->ID).'</h2>';
          //echo '<div class="pane" style="display:block;">';
        } else {
          echo '<h2>'.get_the_title($child->ID).'</h2>';
          //
        }
      }
      
      
      //switch for different type of sidebar
      $switch = 1;
      
      //for 1 level accrodian:
      if (1 == $switch){
        $subchildren = wp_list_pages("title_li=&child_of=". $child->ID ."&echo=0");
        echo '<ul id="subnav">';
        echo $subchildren; 
        echo '</ul>';
      }
      
      //for 2 level accordian
      if (2 == $switch){
        $subchildren = get_pages("child_of=". $child->ID ."&parent=". $child->ID);
        echo '<div class="accordion">';
        foreach($subchildren as $child2){
          echo '<h2>'.get_the_title($child2->ID).'</h2>';
          $subchildren2 = wp_list_pages("title_li=&child_of=". $child2->ID ."&echo=0");
          echo '<div class="pane">';
          echo '<ul id="subnav">';
          echo $subchildren2; 
          echo '</ul>';
          echo '</div>';
        }
        echo '</div>';
      }
      
      echo '</div>';
    }
  
    
    echo '</div>';
  }
// end if top level begin category sidebar 
} else if (is_category() || is_single()){
  wp_list_categories('child_of=4&hide_empty=1&show_count=0&orderby=id&title_li=Narrow By');
}
?>

<script type="text/javascript"> 
  //pass the info about which section should be expanded to the external function.js
  var sidebarCount = "<?php echo $sidebarGlobalCounter; ?>";
</script>


</div>

<!-- end sidebar -->
