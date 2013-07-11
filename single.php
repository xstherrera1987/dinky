<?php get_header(); ?>
	<div class="mainSearch">
		<?php get_search_form(); ?>
	</div>
	
	<article>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<nav>
			<span class="postNav"><?php previous_post_link( '%link', '&larr; Older Posts'); ?></span>
			<span class="divider"> | </span>
			<span class="postNav"><?php next_post_link( '%link', 'Newer Posts &rarr;'); ?></span>
		</nav>
		
		<h1><?php the_title() ?></h1>
		<?php the_content(); ?>
		
		<nav>
			<span class="postNav"><?php previous_post_link( '%link', '&larr; Older Posts'); ?></span>
			<span class="divider"> | </span>
			<span class="postNav"><?php next_post_link( '%link', 'Newer Posts &rarr;'); ?></span>
		</nav>

	<?php endwhile; endif; ?>	
	</article>
		
	<?php comments_template( '', true ); ?>
	
</div><!-- #main -->
<?php get_footer(); ?>
