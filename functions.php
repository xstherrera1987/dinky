<?php
// TODO i18n
define("DEBUG", TRUE);
define("THEME", get_template_directory_uri() );
define("STYLESHEET", get_stylesheet_directory_uri() );

// run dinky_setup() when 'after_setup_theme' hook is fired
add_action( 'after_setup_theme', 'dinky_setup' );
add_action( 'init', 'register_resources' );

/**
 * register the nav menu and perform other setup
 *
 * @return void
 */
function dinky_setup() {
	// register the main nav
	register_nav_menu( 'headerNav', "Header Navigation" );
	
	// TODO add theme support
	add_theme_support("");
}

/**
 * register scripts and styles, perform other setup
 *
 * @param string $description A text with a maximum of 80 characters.
 * @return void
 */
function register_resources() {
	// TOOD deregister, remove other useless things
	remove_action('wp_head', 'wp_generator');
	
	define("JS_DIR", THEME."/js" );
	wp_register_script( "html5-printshiv", JS_DIR."/html5shiv-printshiv.js", FALSE, NULL, FALSE);
	wp_register_script( "css3-mediaqueries", JS_DIR."/css3-mediaqueries.js", FALSE, NULL, FALSE);
	wp_register_script( "google-code-prettify-js", JS_DIR."/google-code-prettify/run_prettify.js", FALSE, NULL, TRUE);
	
	define("CSS_DIR", STYLESHEET."/css" );
	wp_register_style( "main", CSS_DIR."/main.css", FALSE, NULL, "all");
	wp_register_style( "google-code-prettify-css", CSS_DIR."/prettify.css", FALSE, NULL, "all");
}

// TODO (low-priority) get the class name from Options/DB instead of hardcoding
add_filter('wp_nav_menu','add_header_nav_class');
/**
 * adds .navButton to <a> in the nav menu.
 *
 * @param string $menuHtml The filter hook text: the entire navigation menu.
 * @return string the modified menu
 */
function add_header_nav_class($menuHtml) {
	$class = "navButton";
	return preg_replace('/<a /', '<a class="'.$class.'" ', $menuHtml);
}


/**
 * render true if the current post includes source code which needs to be prettified.
 *
 * @return void
 */
function is_code_post() {
	// return true if this is a blog post with code
	// subsequently, we load the code prettifier JS / CSS
	return TRUE;
}

// TODO implement
// params will be: nav-above, nav-below
function dinky_content_nav() {
	
}

/**
 * render CSS debug rules.
 *
 * @return void
 */
function debug_styles() {
	?>
		<style>
		.log {
			display: block;
			border: #000000 1px solid;
			background: #FFFFFF;
			color: #FF0000;
		}
		</style>	
	<?php 
}
?>