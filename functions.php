<?php
// TODO i18n
define("DEBUG", TRUE);
define("THEME", get_template_directory_uri() );
define("STYLESHEET", get_stylesheet_directory_uri() );

// TODO order these chronologically (order in which WP will execute them)
add_action( 'after_setup_theme', 'dinky_setup' );
add_action( 'init', 'dinky_register_resources' );
add_action( 'widgets_init', 'dinky_widget_init' );

// Theme Options setup
if ( is_admin() )
	require_once ( get_template_directory() . '/theme-options.php' );

/**
 * register the nav menu and perform other setup
 */
function dinky_setup() {
	// register the main nav
	register_nav_menu( 'headerNav', "Header Navigation" );
	
	// TODO add theme support
	add_theme_support("menus");
}

/**
 * register scripts and styles, perform other setup
 */
function dinky_register_resources() {
	// TOOD deregister, remove other useless things
	remove_action('wp_head', 'wp_generator');
	
	define("CSS_DIR", STYLESHEET."/css" );
	wp_register_style( "main", CSS_DIR."/main.css", FALSE, NULL, "all");
}

// TODO (low-priority) get the class name from Options/DB instead of hardcoding
add_filter('wp_nav_menu','add_header_nav_class');
/**
 * adds .navButton CSS class to each <a> in the nav menu.
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
 */
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
 * register sidebars
 */
function dinky_widget_init() {
	register_sidebar( array(
		'name' => 'Footer Widget (no title)',
		'id' => 'footer_widget',
		'description' => 'Shown starting from the bottom on the left-hand side.'.
						' The title cannot be removed from markup, and it is hidden with CSS.',
		'before_widget' => '',
		'after_widget' => '',
	));
	register_sidebar( array(
		'name' => '404 Text Widget',
		'id' => '404_text_widget',
		'description' => 'Shown on 404 page underneath the header and search form.',
		'before_widget' => '',
		'after_widget' => '',
	));
}

/**
 * render CSS debug rules.
 */
function render_log_styles() { ?>
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