<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>

		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>
		<script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
		<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
		<script>
      window.sr = ScrollReveal({ duration: 600, reset: true, easing: 'ease-in', scale: .98, distance:'50px'});
    </script>
		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">
			<?php if ( has_post_thumbnail() ) {
					$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
					<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader" style="background-image: url('<?php echo $backgroundImg[0] ?>');">
				<?php }
				elseif ( get_field('header_image', 'option') ) { ?>
					<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader" style="background-image: url('<?php the_field('header_image', 'option') ?>');">
				<?php } else { ?>
					<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
				<?php } ?>
				<div id="inner-header" class="wrap row">

					<div class="hero_section">
						<p id="logo" class="h1" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow">Kind<span>Leadership</span></a></p>
						<div class="hero_copy"><?php if( get_field('site_sub-title', 'option') ) : ?><?php the_field('site_sub-title', 'option'); else : bloginfo('description');?><?php endif; ?></div>
					</div>

				</div>
				<?php if (get_field('include_overlay', 'option') ) : ?>
					<div class="overlay"></div>
				<?php endif; ?>
			</header>
			<nav role="navigation" id="navbar" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php wp_nav_menu(array(
									 'container' => false,                           // remove nav container
									 'container_class' => 'menu ',                 // class of container (should you choose to use it)
									 'menu' => __( 'The Main Menu', 'startertheme' ),  // nav name
									 'menu_class' => 'nav top-nav ',               // adding custom nav class
									 'theme_location' => 'main-nav',                 // where it's located in the theme
									 'before' => '',                                 // before the menu
												 'after' => '',                                  // after the menu
												 'link_before' => '',                            // before each link
												 'link_after' => '',                             // after each link
												 'depth' => 0,                                   // limit the depth of the nav
									 'fallback_cb' => ''                             // fallback function (if there is one)
				)); ?>

			</nav>
			<div id="mobile-nav">
				Menu <i class="fas fa-chevron-down"></i>
			</div>
