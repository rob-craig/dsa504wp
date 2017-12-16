<aside id="sidebar">
  <?php $parentID = get_queried_object()->ID; // have to do this because the wp loop context gets wonky ?>

  <?php include("addons/cta-box.php"); ?>

  <?php
  $postType = get_post_type($parentID);
  if($postType != "committee" && $postType != "page"){ // don't show on pages or committees 
    include("addons/calendar-simple.php"); 
  };
  ?>

  

</aside>
