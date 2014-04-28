<?php 
get_header(); 
$sidebar = get_post_meta(get_the_id(), 'custom_sidebar', true) ? get_post_meta(get_the_id(), 'custom_sidebar', true) : "default";
?>
<section class="main single <?php if($sidebar == 'no') echo 'wide'; ?>">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="page">
			<h1><?php the_title(); ?></h1>
			<?php if(has_post_thumbnail()) : ?><div class="post-thumbnail"><?php the_post_thumbnail(); ?></div><?php endif; ?>
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'carrotlite').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</article>

		<?php comments_template(); ?>
	<?php endwhile; endif; ?>
</section>
<?php 
$sidebar = get_post_meta(get_the_id(), 'custom_sidebar', true) ? get_post_meta(get_the_id(), 'custom_sidebar', true) : "default";
if($sidebar != 'no') {
	if($sidebar && $sidebar != "default") get_sidebar("custom");  
	else get_sidebar();	
}
?>
<?php get_template_part('cta'); ?>
<?php get_footer(); ?>