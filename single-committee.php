<?php get_header(); ?>


			<div class="committee-header"><div class="committee-header-inner"><?php echo get_the_title(); ?></div></div>
			
			<div class="wrap">
				<div class="intro-section">
					<div class="intro-section-header">About</div>
					<div class="intro-section-body"><?php echo get_field('introductory_text');?></div>
					
					<?php
					if(get_field('resources_text')!=""){
					?>
						<div class="intro-section-header">Resources</div>
						<div class="intro-section-body"><?php echo get_field('resources_text');?></div>
					<?php
					};
					?>
				</div>

			</div>
			<?php
			

            // get the posts connected to this committee by their committee acf field
            $posts = get_posts(array(
							'post_type' => 'post',
							'meta_query' => array(
								array(
									'key' => 'committee', 
									'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
			));
            ?>

			<div id="content" class="wrap">

				<div id="inner-content" class="cf">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

						<?php if (count($posts)>0) { ?>
						<div class="intro-section-header">Updates</div>
							<?php foreach ($posts as $post){ 
								setup_postdata( $post ); ?> 
	
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" style="padding-bottom:0px;">

									<header class="article-header">

										<h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
										<p class="byline vcard">
											<?php printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
										</p>

									</header>

									<section class="entry-content cf">
										<?php the_content(); ?>
									</section>

									<footer class="article-footer cf">
									<?php //printf( __( '<p class="footer-category">Filed under: %1$s</p>', 'bonestheme' ), get_the_category_list(', ') ); ?>
								   <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
							   </footer>

								</article>

							<?php } ?>

									<?php if( is_single() == false) { ?>
									<div class="prev-next-box">
										<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
										<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
									</div>
									<?php }; ?>

							<?php }else{  ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php }; ?>


						</div>

					<?php
					rewind_posts();
					wp_reset_postdata();
					wp_reset_query();
					get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
