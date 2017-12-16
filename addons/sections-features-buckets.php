<section class="features-buckets" style="background-image:url('<?php echo get_sub_field('background_image');?>');background-color:<?php echo get_sub_field('background_color'); ?>">

	

	<div class="wrap">
	
	<?php
	while(the_flexible_field("features_buckets")): 
		if(get_row_layout() == "features_bucket"):
				$image = get_sub_field('features_bucket_image'); ?>
				<a name="<?php echo str_replace(array(' ',','), '', get_sub_field('features_bucket_feature_title')); ?>"></a>
				<div class="features-bucket">
					<h3 class="features-bucket-feature-title"><?php echo get_sub_field('features_bucket_feature_title'); ?></h3>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>"/>
					<h2 class="features-bucket-headline"><?php echo get_sub_field('features_bucket_headline'); ?></h2>
					<p class="features-bucket-copy"><?php echo get_sub_field('features_bucket_copy'); ?></p>
				</div>
				<hr class="features-bucket-hr"/>
	<?php 
		endif;
	endwhile;
	?>
	<br class="clearit"/>
</section>

