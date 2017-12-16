<section class="section fullpage-section" style="background-color:<?php echo get_sub_field('background_color');?>; background-image:url('<?php echo get_sub_field('bg_image'); ?>');" data-anchor="<?php echo str_replace(array(' ',','), '', get_sub_field('headline')); ?>">

<? //background-image:url('<?php echo get_sub_field('bg_image') ?>
<? $image = get_sub_field('hero_image'); ?>
<img class="fullpage-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>"/>
<p class="fullpage-headline"><?php echo get_sub_field('headline'); ?></p>
<div class="fullpage-introbox">
	<h1 class="fullpage-introbox-headline"><?php echo get_sub_field('intro_box_headline'); ?></h1>
	<p class="fullpage-introbox-copy"><?php echo get_sub_field('intro_box_copy'); ?></p>
</div>
</section>


