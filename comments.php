	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="noPassword">'This post is password protected. Enter the password to view any comments.'</p>
	</div><!-- end #comments -->
	<?php
			return;
		endif;
	?>

	<?php if ( have_comments() ) : ?>
		<h3 id="commentsTitle">Comments</h3>

		<!-- TODO comments pagination -->
		<ul class="commentlist">
			<?php
				wp_list_comments( array( 
					'callback' => 'dinky_comment', 
					'format' => 'html5'
				));
			?>
		</ul>
		
	<?php endif; ?>

	<?php 
		comment_form(array(  
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'title_reply' => 'Reply to Post',
			'title_reply_to' => 'Reply to %s.',
			'cancel_reply_link' => 'cancel reply'
		));
	?>

	</div><!-- end #comments -->
