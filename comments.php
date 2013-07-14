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

		<ul class="commentlist">
			<?php
				wp_list_comments( array( 
					'callback' => 'dinky_comment', 
					'format' => 'html5'
				));
			?>
		</ul>
		
	<?php endif; ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>
		<div>
			<span class="commentNav"><?php previous_comments_link( '&larr; Older Comments' ); ?></span>
			<span class="divider"> | </span>
			<span class="commentNav"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></span>
		</div>
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
