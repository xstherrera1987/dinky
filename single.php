<?php get_header(); ?>

		<p class="log">single.php rendering</p>
		<article id="blogPost0000">
		
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
				<span class="nav-previous"><?php previous_post_link( '%link', 'Previous'); ?></span>
					
				<?php the_content(); ?>
					
				<span class="nav-next"><?php next_post_link( '%link', 'Next'); ?></span>
	
			<?php endwhile; endif; ?>
			
		</article>
			<?php comments_template( '', true ); ?>

<?php get_footer(); ?>
