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
		
		<!-- TODO customize this -->
		<article class="post noResultsFound">
			<header class="entry-header">
				<h1 class="entry-title">Nothing Found</h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<!-- TODO better message -->
				<p>No results were found. Try using 'search'.</p>
				
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	<?php endif; ?>
</div><!-- #main -->

<?php get_footer(); ?>
