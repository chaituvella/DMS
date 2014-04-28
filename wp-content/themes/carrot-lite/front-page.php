<?php get_header(); ?>
	<?php 
	if(is_page()) : 
	 	if (have_posts()) : 
 			while (have_posts()) : the_post(); ?>
			<article class="intro">
				<?php the_content(); ?>
			</article>
			<?php endwhile; 
		endif; 
	endif; ?>

	<section class="post-grid cols">
		<?php 
		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }
		$args = array(
			'posts_per_page' => 9,
			'post_status' => 'publish',
			'caller_get_posts' => 1,
			'paged' => $paged
			);
		query_posts($args);
		if($wp_query->have_posts()) : 
			while($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<!-- Start: Post -->
				<article <?php post_class('col col3'); ?>>
					<h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<p class="post-meta"><i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')) ?> <?php if(has_category()): ?><span class="delimiter">|</span> <i class="fa fa-folder"></i> <?php the_category(", "); ?> <?php endif; ?> <?php if ( comments_open() ) : ?><span class="delimiter">|</span> <i class="fa fa-comment"></i> <?php comments_popup_link('0', '1', '%', 'comment-link'); ?><?php endif; ?></p>
					<?php if(has_post_thumbnail()) : ?><div class="post-thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('grid'); ?></a></div><?php endif; ?>
					<?php the_excerpt(); ?>
					<p class="more"><a href="<?php the_permalink() ?>"><?php _e( 'Read more', 'carrotlite' );?> <span class="fa fa-chevron-circle-right"></span></a></p>
					<?php if(has_tag()): ?><p class="tags"><span class="fa fa-tags"></span> <?php _e('Tags', 'carrotlite'); ?>: <?php the_tags(""); ?></p><?php endif; ?>
				</article>
				<!-- End: Post -->
			<?php endwhile; ?>

			<?php get_template_part('pager'); ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</section>

<?php get_footer(); ?>