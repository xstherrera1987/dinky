<?php get_header(); ?>
		<article>
		
		<?php if ( have_posts() ) : the_post(); ?>
	
			<!-- TODO make this a button -->
			<span class="nav-previous"><?php previous_post_link( '%link', 'Previous'); ?></span>
			
			<h1><?php the_title() ?></h1>
			<?php the_content(); ?>
				
			<!-- TODO make this a button -->
			<span class="nav-next"><?php next_post_link( '%link', 'Next'); ?></span>
	
		<?php endif; ?>
			
		</article>
		
		<?php comments_template( '', true ); ?>
	
	</div><!-- #main -->
<?php get_footer(); ?>
