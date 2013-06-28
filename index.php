<?php
get_header(); ?>

			<?php if ( have_posts() ) : ?>

				<?php dinky_content_nav( 'nav-above' ); ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>

				<?php dinky_content_nav( 'nav-below' ); ?>
			<?php else : ?>
				
				<article class="post noResultsFound">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'dinky' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'No results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
		</div><!-- #main -->

<?php get_footer(); ?>
