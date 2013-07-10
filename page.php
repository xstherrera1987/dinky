<?php get_header(); ?>
	<div class="mainSearch">
		<?php get_search_form(); ?>
	</div>

	<article>
		<?php if ( have_posts() ) : the_post(); ?>
			<h1><?php the_title() ?></h1>
			<?php the_content() ?>
			<?php comments_template( '', true ); ?>
		<?php endif; ?>
	</article>
		
	</div><!-- #main -->
<?php get_footer(); ?>