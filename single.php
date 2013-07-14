<?php get_header(); ?>
	<div class="mainSearch">
		<?php get_search_form(); ?>
	</div>

	<nav>
		<span class="postNav"><?php previous_post_link( '%link', '&larr; Older Posts'); ?></span>
		<span class="divider"> | </span>
		<span class="postNav"><?php next_post_link( '%link', 'Newer Posts &rarr;'); ?></span>
	</nav>	
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title() ?></h1>
		<?php the_content(); ?>
		
	<?php endwhile; endif; ?>	
	</article>
	
	<nav>
		<span class="postNav"><?php previous_post_link( '%link', '&larr; Older Posts'); ?></span>
		<span class="divider"> | </span>
		<span class="postNav"><?php next_post_link( '%link', 'Newer Posts &rarr;'); ?></span>
	</nav>

	<?php comments_template( '', true ); ?>
	
</div><!-- #main -->
<?php get_footer(); ?>
