<?php
/*

 Template Name: FAQs

*/
?>

<?php get_header(); ?>
	<div id="content-wrapper">	
	
			<div class="full-bleed-hero-short" style="background-color:#ffffff;background-image:url('<?php echo get_bloginfo('template_directory');?>/library/images/map.png');">
				<div class="full-bleed-hero-short-wrapper">
					
					<!--
					<img class="full-bleed-hero-short-logo" alt="Equal Access Legal" src="<?php echo get_bloginfo('template_directory');?>/library/images/equal-access-legal-logo-hero.png"/>
					-->
					
					<div class="full-bleed-hero-short-details">
						
						<div style="text-align:center">
							<a href="tel:5045175529" class="full-bleed-hero-call-button button"><span>For a Free Consultation Call</span>504-517-5529</a>
						</div>
					</div>
					<div class="full-bleed-hero-short-headline">Because <b>everyone</b> deserves a good lawyer.</div>	
				</div>
				<div class="clearit"></div>
			</div>
			<div class="clearit"></div>

	
	<div class="wrap faq-wrap">
		<div class="faq-toc">
			<h3>Contents</h3>
			<ul>
			<?php
			if( have_rows('faqs') ):
				while(have_rows('faqs')):  the_row();
			?>
				<li><a href="#<?php echo urlencode(get_sub_field('question'));?>"><?php echo get_sub_field('question');?></a></li>
			<?php 
				endwhile;
			endif;	?>
			</ul>
		</div>
		<div class="faq-left" itemscope itemtype="http://schema.org/QAPage">
			<h1><?php echo get_field('page_title'); ?></h1>
			<?php if(get_field('page_intro')!==""){ ?>
				<div itemprop="description"><?php echo get_field('page_intro'); ?></div>
			<?php }; ?>
			
			<?php 
				if( have_rows('faqs') ):
				while(have_rows('faqs')):  the_row();?>

						<section class="faq-item" itemscope itemtype="http://schema.org/Question">
							<a name="<?php echo urlencode(get_sub_field('question'));?>"></a>
							<h2 itemprop="name text" class="question"><?php echo get_sub_field('question');?></h2>
							<div itemprop="suggestedAnswer" itemscope itemtype="http://schema.org/Answer" class="answer">
								<div itemprop="text"><?php echo get_sub_field('answer');?></div>
							</div>

						</section>
						<div class="clearit"></div>
			<?php endwhile;
				  endif;	?>
			
			<div style="text-align:center">
				<div class="call-cta">
					Equal Access Legal, LLC provides a broad range of affordable legal services to clients in Louisiana. <br/><b>If you have a question or are seeking legal representation, call today:<b/>
					<a href="tel:5045175529" class="full-bleed-hero-call-button button"><span>For a Free Consultation Call</span>504-517-5529</a>
				</div>
			</div>
				  
		</div>
	<div class="clearit"></div>
	</div>
	
</div>
<?php get_footer(); ?>
