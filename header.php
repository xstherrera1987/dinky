<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php is_home() ? bloginfo( 'name' ) : wp_title(''); ?></title>
		<?php /* TODO research SEO for how to populate this */ ?>
		<meta name="description" content="CompSci & SoftwareEng Blog - Joe Herrera">
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php /* TODO are these two necessary */ ?>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_enqueue_style("main"); ?>

		<!--[if lte IE 9]>
			<?php
				wp_enqueue_script( "html5shiv-printshiv");
				wp_enqueue_script( "css3-mediaqueries");
			?>
		<![endif]-->
		<!-- TODO these resources will have to be loaded by later after post tags are determined -->
		<?php if ( is_code_post() ) {
			wp_enqueue_script( "google-code-prettify-js");
			wp_enqueue_style("google-code-prettify-css");
		}?>
		
		<?php if (TRUE == DEBUG) { debug_styles_render(); } ?>
		<?php wp_head(); ?>
	</head>
	<body>
		<div class="wrapper">
			<?php /* TODO set navButton class from site-admin */ ?>
			<header class="masterHeader fiveNavButtons">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<h2><?php bloginfo( 'description' ); ?></h2>
				<nav>
				<?php wp_nav_menu( 
					array( 
							'theme_location' => 'headerNav',
							'container' => ''
					)); 
				?>
				</nav>
			</header>
			<div id="main">