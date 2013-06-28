<?php
get_header(); ?>
			<p class="log">index.php rendering</p>
			<?php if ( have_posts() ) : ?>

				<!-- TODO get previous posts by ajax -->
				<!-- TODO design a fallback incase there is no JS -->
				<?php dinky_content_nav( 'nav-above' ); ?>
				
				<?php $mainLoop = new WP_Query( array( 'orderby' => 'date') );
				while($mainLoop->have_posts()) : $mainLoop->the_post(); ?>
					
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<p class="log">custom post</p>
						<?php the_content(); ?>
					</div>
				
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				
				<?php dinky_content_nav( 'nav-below' ); ?>
				<!-- TODO get next posts by ajax -->
				<!-- TODO design a fallback incase there is no JS -->
				
			<?php else : ?>
				
				<!-- TODO customize this -->
				<article class="post noResultsFound">
					<header class="entry-header">
						<h1 class="entry-title">Nothing Found</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p>No results were found for the requested archive. Perhaps searching will help find a related post.</p>
						
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
		</div><!-- #main -->

<?php get_footer(); ?>
