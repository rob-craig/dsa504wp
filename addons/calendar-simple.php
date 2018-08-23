

  <div class="intro-section-header">Upcoming Events</div>
	<div id="dsa-cal-app" v-cloak>
        <?php 
		//$limitNumEvents = true;
		//include("calendar-og.php"); 
		?>
    </div>
    <!-- new react calendar -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/library/js/main.a60ae860.js"></script>
    <!-- new react calendar css fixes -->
    <style>
    #dsa-cal-app a {
      text-decoration:none;
    }
    #dsa-cal-app a:hover {
      text-decoration:underline;
    }
    @media only screen and (max-width: 800px) {
      #dsa-cal-app {
        text-align: left; 
        padding: 10px 20px 10px 10px;
      }
    }
    </style>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Calendar-specific stuff -->
    <?php //include("calendar-og-scripts.php"); ?>
