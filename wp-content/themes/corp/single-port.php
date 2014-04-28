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
                                    <div class="blog_post_page portfolio_post">
                                        <div class="blog_post_head">
                                            <div class="blogpost_info_wrapper">
                                                <div class="blog_info_block portfolio_info">
                                                    <span class="post_type post_type_<?php echo $pf; ?>"></span>
                                                    <?php
                                                    $terms = get_the_terms( get_the_ID(), 'portcat' );
                                                    if ( $terms && ! is_wp_error( $terms ) ) {
                                                        $draught_links = array();
                                                        foreach ( $terms as $term ) {
                                                            $draught_links[] = '<a href="'.get_term_link($term->slug, "portcat").'">'.$term->name.'</a>';
                                                        }
                                                        $on_draught = join( ", ", $draught_links );
                                                        $show_cat = true;
                                                    }

                                                    if ($terms !== false) {
                                                        echo '<div class="blog_categ">'.$on_draught.'</div>';
                                                    }

                                                    if (isset($pagebuilder['settings']['time_spent']) && strlen($pagebuilder['settings']['time_spent'])>0) { ?>
                                                    <div class="blog_time"><?php /*echo ((get_theme_option("translator_status") == "enable") ? get_text("translator_time_spent") : __('Time Spent','theme_localization')) */?> <?php echo $pagebuilder['settings']['time_spent']; ?></div>
                                                    <?php }

                                                    if (isset($pagebuilder['settings']['external_link']) && strlen($pagebuilder['settings']['external_link'])>0) { ?>
                                                    <div class="blog_url"><a target="_blank" href="<?php echo $pagebuilder['settings']['external_link']; ?>"><?php echo ((get_theme_option("translator_status") == "enable") ? get_text("project_url") : __('Project URL','theme_localization')) ?></a></div>
                                                    <?php }

                                                    if (isset($pagebuilder['settings']['skills_needed']) && strlen($pagebuilder['settings']['skills_needed'])>0) { ?>
                                                        <div class="blog_tags2"><?php echo $pagebuilder['settings']['skills_needed']; ?></div>
                                                    <?php } ?>

                                                </div>
                                                <div class="portfolio_share">
                                                    <a href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>" class="ico_socialize_facebook2 ico_socialize type1"></a>
                                                    <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo get_permalink(); ?>" class="ico_socialize_twitter2 ico_socialize type1"></a>
                                                    <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>" class="ico_socialize_pinterest ico_socialize type1"></a>
                                                    <a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="ico_socialize_google2 ico_socialize type1"></a>
                                                    <div class="clear"><!-- ClearFix --></div>
                                                </div><!-- .portfolio_share -->
                                                <div class="clear"><!-- ClearFix --></div>
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
                                    </div><!--.blog_post_page -->
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

                                $new_term_list = get_the_terms(get_the_id(), "portcat");
                                $echoallterm = '';
                                if (is_array($new_term_list)) {
                                    foreach ($new_term_list as $term) {
                                        $echoterm[] = $term->term_id;
                                    }
                                }
                                if (is_array($echoterm) && count($echoterm)>0) {
                                    $post_type_terms = implode(",", $echoterm);
                                } else {
                                    $post_type_terms = "";
                                }

                                echo do_shortcode("[feature_posts
                                heading_color=''
                                heading_size='h4'
                                heading_text='".((get_theme_option("translator_status") == "enable") ? get_text("translate_related_projects") : __('Related Projects','theme_localization'))."'
                                number_of_posts='20'
                                posts_per_line=".$posts_per_line."
                                sorting_type='random'
                                related='yes'
                                now_open_pageid='".get_the_id()."'
                                post_type_terms='".$post_type_terms."'
                                post_type='port'][/feature_posts]");
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