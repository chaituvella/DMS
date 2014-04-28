<?php get_header(); ?>
<section class="main post-list">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('post'); ?>
		<?php endwhile; ?>

		<?php get_template_part('pager'); ?>
		
	<?php else : ?>
		<h2 class="center"><?php _e( 'Not found', 'carrotlite' ); ?></h2>
		<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'carrotlite' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
