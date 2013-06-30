	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="noPassword">'This post is password protected. Enter the password to view any comments.'</p>
	</div>
	<?php
			return;
		endif;
	?>

	<?php if ( have_comments() ) : ?>
		<h3 id="commentsTitle">Comments</h3>

		<!-- TODO comments pagination -->
		<ol class="commentlist">
			<?php
				wp_list_comments( array( 'callback' => 'dinky_comment' ) );
			?>
		</ol>
		
	<?php endif; ?>

	<?php comment_form(); ?>

	</div>