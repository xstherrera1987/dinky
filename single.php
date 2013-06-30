<?php get_header(); ?>
		<article id="blogPost0000">
		
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
				<!-- TODO make this a CSS3 button. A back/up arrow or something -->
				<span class="nav-previous"><?php previous_post_link( '%link', 'Previous'); ?></span>
				
				<h1><?php the_title() ?></h1>
				<?php the_content(); ?>
					
				<span class="nav-next"><?php next_post_link( '%link', 'Next'); ?></span>
	
			<?php endwhile; endif; ?>
			
		</article>
		
		<?php comments_template( '', true ); ?>
	
	</div><!-- #main -->
<?php get_footer(); ?>
