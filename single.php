<?php get_header(); ?>

		<p class="log">single.php rendering</p>
		<div id="primary">
			<div id="content" role="main">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<span class="nav-previous"><?php previous_post_link( '%link', 'Previous'); ?></span>
						
					<?php the_content(); ?>
						
					<span class="nav-next"><?php next_post_link( '%link', 'Next'); ?></span>

				<?php endwhile; endif; ?>
				
				<?php comments_template( '', true ); ?>

			</div><!-- #content -->
			
		</div><!-- #primary -->

<?php get_footer(); ?>
