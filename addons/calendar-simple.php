

	<div id="dsa-cal-app" v-cloak>
        <?php 
		$limitNumEvents = true;
		include("calendar-og.php"); 
		?>
    </div>

    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Calendar-specific stuff -->
    <?php include("calendar-og-scripts.php"); ?>
