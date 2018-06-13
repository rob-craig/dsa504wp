<?php
/*

 Template Name: FAQs

*/
?>

<?php get_header(); ?>

	<div id="content" class="wrap faq-wrap">
		<div id="inner-content" class="cf">
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
			<?php //get_sidebar(); ?>
			<div class="faq-left m-all t-2of3 d-5of7 cf" itemscope itemtype="http://schema.org/QAPage" id="main" role="main">
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
				
			
					  
			</div>
			<div class="clearit"></div>
		</div>
	</div>

<?php get_footer(); ?>
