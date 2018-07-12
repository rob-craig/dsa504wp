<?php
/*

 Template Name: Events

*/
?>
<?php get_header(); ?>


			<div id="content" class="wrap">

				<div id="inner-content" class="cf">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

							<div id="dsa-cal-app" v-cloak>
							  <?php 
							  $limitNumEvents = false;
							  include("addons/calendar-og.php"); ?>
							</div>

							<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>   
							<!-- Calendar-specific stuff -->
							<?php include("addons/calendar-og-scripts.php"); ?>


						</div>

					<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
