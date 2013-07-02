<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	// TODO should they both be filtered by urldecode() ??
	$search_query[$query_split[0]] = urldecode($query_split[1]);
}

$search = new WP_Query($search_query);
?>

<?php get_header(); ?>
	<div class="mainSearch">
		<?php get_search_form(); ?>
	</div>
	<?php if ( have_posts() ) : ?>
		<h1>Search Results</h1>
		<?php 
		while($search->have_posts()) : $search->the_post(); ?>
			
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
	
	<?php
		global $wp_query;
		$total_results = $wp_query->found_posts;
	?>
</div><!-- #main -->

<?php get_footer(); ?>
