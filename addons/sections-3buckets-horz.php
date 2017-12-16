<section class="three-buckets-horiz" style="background-image:url('<?php echo get_sub_field('background_image');?>');background-color:<?php echo get_sub_field('background_color'); ?>">
	<div class="wrap">
	
	<?php
	while(the_flexible_field("buckets")): 
		if(get_row_layout() == "bucket"):
				$image = get_sub_field('bucket_image'); ?>
				<div class="three-bucket-horiz-bucket">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
					<h2 class="three-buckets-horiz-headline"><?php echo get_sub_field('bucket_headline'); ?></h2>
					<p class="three-buckets-horiz-copy"><?php echo get_sub_field('bucket_copy'); ?></p>
				</div>
	<?php 
		endif;
	endwhile;
	?>
	<br class="clearit"/>
</section>

