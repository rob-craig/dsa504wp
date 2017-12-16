<section class="three-buckets-vert" style="background-image:url('<?php echo get_sub_field('background_image');?>');background-color:<?php echo get_sub_field('background_color'); ?>">
	<div class="wrap">
	
	<?php
	while(the_flexible_field("vert_buckets")): 
		if(get_row_layout() == "vert_bucket"):
				$image = get_sub_field('vert_bucket_image'); ?>
				<div class="three-bucket-vert-bucket">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>"/>
					<h2 class="three-buckets-vert-headline"><?php echo get_sub_field('vert_bucket_headline'); ?></h2>
					<p class="three-buckets-vert-copy"><?php echo get_sub_field('vert_bucket_copy'); ?></p>
				</div>
	<?php 
		endif;
	endwhile;
	?>
	<br class="clearit"/>
</section>

