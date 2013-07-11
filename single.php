<?php get_header(); ?>
	<div class="mainSearch">
		<?php get_search_form(); ?>
	</div>
	
	<article>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<span class="previousPost"><?php previous_post_link( '%link', 'Previous Post'); ?></span>
		<h1><?php the_title() ?></h1>
		<?php the_content(); ?>
		<span class="nextPost"><?php next_post_link( '%link', 'Next Post'); ?></span>

	<?php endwhile; endif; ?>	
	</article>
		
	<?php comments_template( '', true ); ?>
	
</div><!-- #main -->
<?php get_footer(); ?>
