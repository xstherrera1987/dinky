<?php get_header(); ?>
	<div class="mainSearch">
		<?php get_search_form(); ?>
	</div>
	<?php if ( have_posts() ) : ?>

		<?php $mainLoop = new WP_Query( array( 'orderby' => 'date') );
		while($mainLoop->have_posts()) : $mainLoop->the_post(); ?>
			
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<?php the_content(); ?>
			</div>
		
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		
	<?php else : ?>
		
		<article>
			<header class="entry-header">
				<h1 class="entry-title">Nothing Found</h1>
			</header>

			<section>
				<!-- TODO better message -->
				<p>No results were found...</p>
			</section>
		</article>

	<?php endif; ?>
</div><!-- #main -->

<?php get_footer(); ?>
