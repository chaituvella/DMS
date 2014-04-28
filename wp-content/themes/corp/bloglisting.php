<?php
$pf = get_post_format();
if (empty($pf)) $pf = "text";
$pfIcon = get_pf_icon($pf);
$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
$pagebuilder = get_theme_pagebuilder(get_the_ID());
?>

<div <?php post_class("blog_post_preview"); ?>>
    <div class="bg_title"><h4><a class="blogpost_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4></div>
    <div class="blogpost_info_wrapper">
        <div class="blog_info_block">
            <span class="post_type post_type_<?php echo $pf; ?>"></span>
            <div class="blog_author"><?php the_author_posts_link(); ?></div>
            <div class="blog_date"><?php the_time("d M Y"); ?></div>
            <div class="blog_categ"><?php the_category(', '); ?></div>
            <div class="blog_comments"><a href="<?php echo get_comments_link(); ?>"><?php echo ((get_theme_option("translator_status") == "enable") ? get_text("comments_number") : __('Comments','theme_localization')).": "
                    . get_comments_number( get_the_ID() ); ?></a></div>
            <?php the_tags("<div class='blog_tags'>", ', ', '</div>'); ?>
        </div>
    </div>
    <?php include ("ext/pf_type1.php"); ?>
    <article class="contentarea">
        <?php
        global $more; $more = 0;
        the_content(((get_theme_option("translator_status") == "enable") ? get_text("read_more_link") : __('Read more!','theme_localization')));
        ?>
    </article>
</div><!--.blog_post_preview -->