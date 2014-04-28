<?php get_header();
the_post();

/* LOAD PAGE BUILDER ARRAY */
$pagebuilder = get_theme_pagebuilder(get_the_ID());
$pf = get_post_format();
if (empty($pf)) $pf = "text";
$pfIcon = get_pf_icon($pf);
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
the_pb_custom_bg_and_color($pagebuilder);
$current_page_sidebar = $pagebuilder['settings']['layout-sidebars'];
?>

<div class="content_wrapper <?php echo ((isset($pagebuilder['settings']['show_breadcrumb']) && $pagebuilder['settings']['show_breadcrumb'] == "yes" && get_theme_option("show_breadcrumb") !== "off") ? 'withbreadcrumb' : 'withoutbreadcrumb') ?>">
    <div class="page_title_block">
        <div class="container">
            <h1 class="title"><?php if ($pagebuilder['settings']['show_page_title'] !== "no") { the_title(); } ?></h1>
            <?php if (function_exists('the_breadcrumb') && $pagebuilder['settings']['show_breadcrumb'] !== "no" && get_theme_option("show_breadcrumb") !== "off") {the_breadcrumb();} ?>
        </div>
    </div>
    <div class="container">
        <div class="content_block <?php echo $pagebuilder['settings']['layout-sidebars'] ?> row">
            <div class="fl-container <?php echo (($pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                <div class="row">
                    <div class="posts-block <?php echo (($pagebuilder['settings']['layout-sidebars'] == "left-sidebar" || $pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                        <div class="contentarea">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="blog_post_page">
                                        <div class="blog_post_head">
                                            <div class="blogpost_info_wrapper">
                                                <div class="blog_info_block">
                                                    <span class="post_type post_type_<?php echo $pf; ?>"></span>
                                                    <div class="blog_author"><?php the_author_posts_link(); ?></div>
                                                    <div class="blog_date"><?php the_time("d M Y"); ?></div>
                                                    <div class="blog_categ"><?php the_category(', '); ?></div>
                                                    <div class="blog_comments"><a href="<?php echo get_comments_link(); ?>"><?php echo ((get_theme_option("translator_status") == "enable") ? get_text("comments_number") : __('Comments','theme_localization')).": " . get_comments_number( get_the_ID() ); ?></a></div>
                                                    <?php the_tags("<div class='blog_tags'>", ', ', '</div>'); ?>
                                                </div>
                                            </div>
                                            <?php include ("ext/pf_type1.php"); ?>
                                        </div>
                                        <article class="contentarea">
                                            <?php
                                            if (!post_password_required()) { the_pb_parser((isset($pagebuilder['modules']) ? $pagebuilder['modules'] : array())); }

                                            global $contentAlreadyPrinted;
                                            if ($contentAlreadyPrinted !== true) {
                                                the_content(((get_theme_option("translator_status") == "enable") ? get_text("read_more_link") : __('Read more!','theme_localization')));
                                            }
                                            wp_link_pages( array( 'before' => '<div class="page-link"><span>' . ((get_theme_option("translator_status") == "enable") ? get_text("translate_pages") : __('Pages','theme_localization')) . ': </span>', 'after' => '</div>' ) );
                                            ?>
                                        </article>
                                        <div class="blogpost_share">
                                            <a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>" class="ico_socialize_facebook2 ico_socialize type1"></a>
                                            <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo get_permalink(); ?>" class="ico_socialize_twitter2 ico_socialize type1"></a>
                                            <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>" class="ico_socialize_pinterest ico_socialize type1"></a>
                                            <a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="ico_socialize_google2 ico_socialize type1"></a>
                                            <div class="clear"><!-- ClearFix --></div>
                                        </div>
                                    </div><!--.blog_post_page -->
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <?php comments_template(); ?>
                                </div>
                            </div>

                            <?php

                            if (get_theme_option("related_posts") == "on") {

                                if ($pagebuilder['settings']['layout-sidebars'] == "no-sidebar") {
                                    $posts_per_line = 4;
                                } else {
                                    $posts_per_line = 3;
                                }

                                echo '<div class="row-fluid"><div class="span12 module_cont module_feature_posts">';
                                echo do_shortcode("[feature_posts
                                heading_color=''
                                heading_size='h4'
                                heading_text='".((get_theme_option("translator_status") == "enable") ? get_text("translate_related_posts") : __('Related Posts','theme_localization'))."'
                                number_of_posts='20'
                                posts_per_line=".$posts_per_line."
                                sorting_type='random'
                                related='no'
                                post_type='post'][/feature_posts]");
                                echo '</div></div>';
                            }

                            ?>

                            <div class="row-fluid">
                                <div class="span12 module_cont">
                                    <a class="shortcode_button btn_small btn_type1 btn_back" href="javascript:history.back()"><?php (get_theme_option("translator_status") == "enable") ? the_text("back_button") : _e('Back','theme_localization'); ?></a><div class="clear"></div>
                                </div>
                            </div>

                        </div><!-- .contentarea -->
                    </div>
                    <?php get_sidebar('left'); ?>
                </div>
                <div class="clear"><!-- ClearFix --></div>
            </div><!-- .fl-container -->
            <?php get_sidebar('right'); ?>
            <div class="clear"><!-- ClearFix --></div>
        </div>
    </div><!-- .container -->
</div><!-- .content_wrapper -->

<?php get_footer() ?>