<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php is_home() ? bloginfo( 'name' ) : wp_title(''); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php $options = get_option( 'dinky_theme_options' ); ?>
<meta name="description" content="<?php echo $options['meta_description']; ?>">
<meta name="keywords" content="<?php echo $options['meta_keywords']; ?>">
<meta name="language" content="<?php echo get_bloginfo('language'); ?>">

<?php wp_enqueue_style("main"); ?>

<!--[if lte IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->


<?php if (TRUE == DEBUG) { render_log_styles(); } ?>
<?php wp_head(); ?>
</head>
<body>
	<div class="wrapper">
		<?php /* TODO set navButton class from site-admin */ ?>
		<header class="masterHeader fiveNavButtons">
			<h1>
				<?php bloginfo( 'name' ); ?>
			</h1>
			<h2>
				<?php bloginfo( 'description' ); ?>
			</h2>
			<nav>
			<?php wp_nav_menu( 
				array(
				'theme_location' => 'headerNav',
				'container' => ''
			)); ?>
			</nav>
		</header>
		<div id="main">