		<!-- TODO generate nav-class, not hard-code -->
		<footer class="threeNavButtons">

			<?php get_sidebar( 'footer' ); ?>
				
		</footer>
	</div><!-- .wrapper -->
	<?php wp_footer(); ?>
	
	<?php $options = get_option( 'dinky_theme_options' ); ?>
	<?php echo $options['ga_code']; ?>
</body>
</html>