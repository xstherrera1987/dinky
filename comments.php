	<div id="comments">
	<p class="log">comments.php rendering</p>
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword">'This post is password protected. Enter the password to view any comments.'</p>
	</div>
	<?php
			return;
		endif;
	?>

	<?php if ( have_comments() ) : ?>
		<h3 id="comments-title">Comments</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' )): ?>
		<nav id="comment-nav-above">
			<div class="nav-previous">Older Comments</div>
			<div class="nav-next">Newer Comments &rarr;</div>
		</nav>
		<?php endif; ?>

		<ol class="commentlist">
			<?php
				wp_list_comments( array( 'callback' => 'dinky_comment' ) );
			?>
		</ol>
		
	<?php endif; ?>

	<?php comment_form(); ?>

</div>