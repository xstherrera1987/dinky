<?php

add_action('admin_init', 'dinky_init_theme_options');
add_action('admin_menu', 'dinky_add_theme_options_page');
add_action('admin_notices', 'widgets_notice');

/**
 * initialize theme options
 */
function dinky_init_theme_options() {
	register_setting( 'dinky_options', 'dinky_theme_options');
}

/**
 * add theme options page to dashboard
 */
function dinky_add_theme_options_page(){
	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'dinky_options', 'dinky_render_theme_options_page');
}

/**
 * render markup for theme options page
 */
function dinky_render_theme_options_page() {
	?>
	<?php screen_icon(); ?>
	<h2>Dinky Theme Options</h2>
	<?php settings_errors(); ?>
	<form method="post" action="options.php" name="themeOptions" onsubmit="return validateThemeOptionsForm();" >
		<?php settings_fields( 'dinky_options' ); ?>
		<?php $options = get_option( 'dinky_theme_options' ); ?>
			
		<br />
		<label class="description" for="dinky_theme_options[meta_description]">Meta Description:</label>
		<textarea id="dinky_theme_options[meta_description]" class="large-text" name="dinky_theme_options[meta_description]"><?php echo $options['meta_description']; ?></textarea>
		<small>Provides a concise explanation of a Web page's content.  Wide browser support (as of 2013). This is rendered verbatim in &lt;meta name='description' content='...'&gt;. 
		Beginning and trailing whitespace, and all newlines are trimmed</small>
		<br /><br />
		
		<label class="description" for="dinky_theme_options[meta_keywords]">Meta Keywords:</label>
		<textarea id="dinky_theme_options[meta_keywords]" class="large-text" name="dinky_theme_options[meta_keywords]"><?php echo $options['meta_keywords']; ?></textarea>
		<small>Provides a list of keywords related to the Web page's content.  Note that as of 2013, this meta tag is rarely considered by search engines.  This is rendered 
		verbatim in &lt;meta name='keywords' content='...'&gt;  Beginning and trailing whitespace, and all newlines are trimmed</small></small>
		
		<p class="submit">
			<input type="submit" class="button-primary" value="Save Options" />
		</p>
	</form>
	<script>
		// trim beginning/trailing whitespace, and all newlines
		function trim(str) {
			return str.replace( /\n/g, ' ').replace( /^\s+|\s+$/g, '');
		}
		function validateThemeOptionsForm() {
			var themeOptionsForm = document.forms['themeOptions'];
			var descTextArea = themeOptionsForm[ 'dinky_theme_options[meta_description]' ];
			var keywTextArea = themeOptionsForm[ 'dinky_theme_options[meta_keywords]' ];

			descTextArea.value = trim( descTextArea.value );
			keywTextArea.value = trim( keywTextArea.value );
			
			return true;
		}
	</script>
	<?php
}

/**
 * notify users of ineffective widget titles on widgets.php
 */
function widgets_notice() {
	if ('widgets.php' == $GLOBALS['pagenow']) { ?>
		<div class="updated">
			<p>Note: All Dinky Theme widget titles are hidden by CSS but still appear in generated markup.</p>
		</div>
	<?php }
}
