<?php get_header();
#Emulate default settings for page without personal ID
$pagebuilder = get_default_pb_settings();
the_pb_custom_bg_and_color($pagebuilder);
?>

<div class="content_wrapper <?php echo ((isset($pagebuilder['settings']['show_breadcrumb']) && $pagebuilder['settings']['show_breadcrumb'] == "yes" && get_theme_option("show_breadcrumb") !== "off") ? 'withbreadcrumb' : 'withoutbreadcrumb') ?>">
    <div class="container">
        <div class="content_block <?php echo $pagebuilder['settings']['layout-sidebars'] ?> row">
            <div class="fl-container span12">
                <div class="row">
                    <div class="posts-block span12">
                        <div class="contentarea">
                            <div class="module_line_trigger" data-option="page404" data-background="#e1e1e1 url(../img/bg_pattern1.png) repeat 0 0" data-top-padding="top_padding_normal" data-bottom-padding="module_normal_padding">
                                <div class="row-fluid">
                                    <div class="span12 module_cont module_404">
                                        <div class="wrapper404">
                                            <div class="block404">
                                                <h1 class="title404"><?php echo ((get_theme_option("translator_status") == "enable") ? get_text("translator_oops") : __('Oops!','theme_localization')); ?> <?php echo ((get_theme_option("translator_status") == "enable") ? get_text("translator_header_404") : __('Not Found :(','theme_localization')); ?></h1>
                                                <div class="text404"><?php echo ((get_theme_option("translator_status") == "enable") ? get_text("translator_text_404") : __('Apologies, but we were unable to find what you were looking for.','theme_localization')); ?></div>
                                            </div>
                                            <form name="search_form" method="get" action="<?php echo home_url(); ?>" class="search_form">
                                                <label></label>
                                                <input type="text" name="s" value="<?php (get_theme_option("translator_status") == "enable") ? the_text("translator_search_value") : _e('Search the site...','theme_localization'); ?>" title="<?php (get_theme_option("translator_status") == "enable") ? the_text("translator_search_value") : _e('Search the site...','theme_localization'); ?>" class="field_search">
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- .row-fluid -->
                            </div><!-- .module_line_trigger -->
                        </div>
                    </div>
                    <?php /*get_sidebar('left');*/ ?>
                </div>
            </div>
            <?php /*get_sidebar('right');*/ ?>
            <div class="clear"></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>