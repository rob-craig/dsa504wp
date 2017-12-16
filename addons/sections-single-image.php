<section class="single-image-section" style="background-color:<?php echo get_sub_field('single_image_section_background'); ?>">
	<div class="wrap">
	<?php $image = get_sub_field('image'); ?>
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		<p class="single-image-section-headline"><?php echo get_sub_field('single_image_section_headline'); ?></p>
		<p class="single-image-section-copy"><?php echo get_sub_field('single_image_section_copy'); ?></p>
	</div>
</section>

