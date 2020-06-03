<!doctype html>
	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php bloginfo('name'); echo ' - '; is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">

		<!-- <meta name="viewport" content="width=600">-->
		<meta id="vp" name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="<?php echo get_bloginfo('template_directory') ?>/library/images/logo.png" />
		
		<script>
		if (screen.width < 480)
		{
			var mvp = document.getElementById('vp');
			mvp.setAttribute('content','width=480');
			console.log("fitting to 480px...");
		}
		</script>
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>
		
	
	<script>
		dataLayer = [];
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108468898-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-108468898-1');
	</script>

	<script type="application/ld+json">
        { 
        "@context" : "http://schema.org",
        "@type" : "Organization",
        "url" : "http://dsaneworleans.org/",
        "logo": "http://dsaneworleans.org/img/logo.png",
        "name": "New Orleans Democratic Socialists of America",
        "contactPoint" : [
            { 
                "@type" : "ContactPoint",
                "contactType" : "General Inquiries",
                "email" : "hello@dsaneworleans.org",
                "url" : "http://dsaneworleans.org/"
            } 
            ],
        "sameAs": [ 
                "https://twitter.com/neworleansdsa",
                "https://facebook.com/neworleansdsa"
            ] 
        }
	</script>
	
	<script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
		<style>
			.has-vivid-red-background-color,
			.has-vivid-red-background-color:hover,
			.has-vivid-red-background-color:focus,
			.has-vivid-red-background-color:visited,
			.has-vivid-red-background-color:active {
				color: #fff;
			}
		</style>
	</head>

	<body <?php body_class(); ?>>

	<!-- Google -->
	<!-- End Google -->


	
		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap cf">
					
					<?php
					include("addons/client-header.php");
					?>
					
					<section class="material-design-hamburger">
						<button class="material-design-hamburger__icon">
						  <span class="material-design-hamburger__layer"></span>
						</button>
					</section>
					
					<!-- Drawer -->
					<menu class="drawer menu--off">
					<img itemprop="logo" alt="New Orleans Democratic Socialists of America" src="<?php echo get_bloginfo('template_directory');?>/library/images/dsa-new-orleans-logo-menu.png"/>
						
					<ul>

						<li class="first"><a href="<?php echo get_home_url(); ?>">Home</a></li>
						<li><?php get_search_form(); ?></li>
						<!-- dynamic sidebar menu -->
						<?php
						wp_nav_menu(array('theme_location' => 'sidebar-menu'));
						?>
						<!-- dynamic committee menu -->
						<li class="menu-parent">
							<span class="menu-sub-header">Committees</span>
							<ul class="menu-sub-menu">
							<?php
								$pages = get_posts(array(
									'posts_per_page'   => -1,
									'post_type' => 'committee'
								));
														
								foreach($pages as $page){
									echo '<li><a href="' . get_permalink( $page->ID ) . '">' . $page->post_title  . '</a></li>';
								}
							?>
							</ul>
						</li>

					</ul>
					
				
					<div class="menu-extra">
					<!--
					<a href="" class="full-bleed-hero-call-button button"><span>Sign Up</span> Today</a>
					-->
					<span class="menu-extra-intro">Follow Us</span>
					<div class="social-icons">
						<a href="https://twitter.com/neworleansdsa"><i class="fab fa-twitter fa-3x"></i></a>
						<a href="https://facebook.com/neworleansdsa"><i class="fab fa-facebook-square fa-3x"></i></a>
						<a href="https://instagram.com/neworleansdsa/"><i class="fab fa-instagram fa-3x"></i></a>
					</div>
					
					<span class="menu-extra-footer"></span>
					</div>
					

					</menu>
					<!-- End Drawer -->
					
				</div>

			</header>
