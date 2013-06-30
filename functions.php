<?php
// TODO i18n
define("DEBUG", TRUE);
define("THEME", get_template_directory_uri() );
define("STYLESHEET", get_stylesheet_directory_uri() );

// run dinky_setup() when 'after_setup_theme' hook is fired
// TODO order these chronologically (order in which WP will execute them)
add_action( 'after_setup_theme', 'dinky_setup' );
add_action( 'init', 'dinky_register_resources' );
add_action( 'widgets_init', 'dinky_widget_init' );
add_action( 'admin_init', 'dinky_theme_options_init' );
add_action( 'admin_menu', 'dinky_add_theme_options_page' );

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
 * @return void
 */
function dinky_register_resources() {
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

function dinky_comment( $comment, $args, $depth ) {
	$comment_type = $comment->comment_type;
	if ('pingback' == $comment_type || 'trackback' == $comment_type): ?>

		<li class="post pingback">
			<p>Pingback: <?php comment_author_link(); ?><?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
	<?php
	else: ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
	
				<div class="comment-content"><?php comment_text(); ?></div>
	
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply&darr;', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
			</article>
	<?php
	endif;
}

/**
 * render CSS debug rules.
 *
 * @return void
 */
function debug_styles_render() { ?>
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

function dinky_widget_init() {
		register_sidebar( array(
		'name' => 'Footer Widget (no title)',
		'id' => 'footer_widget',
		'description' => 'Shown starting from the bottom on the left-hand side.'.
						' The title cannot be removed from markup, and it is hidden with CSS.',
		'before_widget' => '',
		'after_widget' => '',
	) );
}

/******************************* Theme Options ********************************/
function dinky_theme_options_init() {
	register_setting( 'dinky_options_group', 'test_setting' );
	add_settings_section( 'test_section', 'Test Section', 'test_section_render', 'dinky_options_group' );
	add_settings_field( 'test_field', 'Test Field', 'test_field_render', 'dinky_options_group', 'test_section' );
	
	if (TRUE == DEBUG) { debug_styles_render(); }
}
function dinky_add_theme_options_page(){
	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'dinky_options', 'dinky_options_page_render');
}
function dinky_options_page_render() {
	?>
		<p class="log">dinky_options_page_render() in functions.php</p>
		<div class="wrap">
		<?php screen_icon(); ?>
		<h2>Dinky Theme Options</h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				?><p class="log">settings_fields()<?php
				settings_fields( 'dinky_options_group' );
				
				?><p class="log">do_settings_sections()</p><?php
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php 
}
function test_section_render() {
	?><p class="log">section one render()</p><?php 
}
function test_field_render() {
	?><p class="log">field one render()</p><?php
}

?>
