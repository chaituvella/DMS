<?php get_header();
#Emulate default settings for page without personal ID
$pagebuilder = get_default_pb_settings();
the_pb_custom_bg_and_color($pagebuilder);
$current_page_sidebar = $pagebuilder['settings']['layout-sidebars'];

?>

<div class="content_wrapper <?php echo ((isset($pagebuilder['settings']['show_breadcrumb']) && $pagebuilder['settings']['show_breadcrumb'] == "yes" && get_theme_option("show_breadcrumb") !== "off") ? 'withbreadcrumb' : 'withoutbreadcrumb') ?>">
    <div class="page_title_block">
        <div class="container">
            <?php if (function_exists('the_breadcrumb') && get_theme_option("show_breadcrumb") !== "off") {the_breadcrumb();} ?>
        </div>
    </div>
    <div class="container">
        <div class="content_block <?php echo $pagebuilder['settings']['layout-sidebars'] ?> row">
            <div class="fl-container <?php echo (($pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                <div class="row">
                    <div class="posts-block <?php echo (($pagebuilder['settings']['layout-sidebars'] == "left-sidebar" || $pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                        <div class="contentarea">
                            <?php
                            echo '<div class="row-fluid"><div class="span12">';

                            global $paged;
                            $args = array(
                                'paged' => $paged,
                                'post_type' => 'any',
                                'meta_query' => array(
                                    array(
                                        'key' => 'pagebuilder',
                                        'value' => get_search_query(),
                                        'compare' => 'LIKE',
                                        'type' => 'CHAR'
                                    )
                                )
                            );
                            $query = new WP_Query( $args );
                            while ($query->have_posts()) : $query->the_post();
                                get_template_part("bloglisting");
                            endwhile; get_pagination();
                            wp_reset_query();

                            echo '</div><div class="clear"></div></div>';
                            ?>
                        </div>
                    </div>
                    <?php get_sidebar('left'); ?>
                </div>
            </div>
            <?php get_sidebar('right'); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>