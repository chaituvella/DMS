<?php

class sitemap_shortcode {

	public function register_shortcode($shortcodeName) {
		function shortcode_sitemap($atts, $content = null) {
            global $pbconfig;
            if (!isset($compile)) {$compile='';}
			extract( shortcode_atts( array(
                'heading_size' => $pbconfig['default_heading_in_module'],
                'heading_color' => '',
                'heading_text' => '',
                'show_posts' => 'yes',
                'show_site_feeds' => 'yes',
			), $atts ) );

            #heading
            if (strlen($heading_color)>0) {$custom_color = "color:#{$heading_color};";}
            if (strlen($heading_text)>0) {
                $compile .= "<".$heading_size." style='".(isset($custom_color) ? $custom_color : '')."' class='headInModule'>{$heading_text}</".$heading_size.">";
            }


$compile .= '
    <div class="span4">';

        if ($show_site_feeds == "yes") {
            $compile .= '
            <div class="bg_title"><h4 class="sitemap_block_title">'.((get_theme_option("translator_status") == "enable") ? get_text("translator_site_feeds") : __('Site Feeds','theme_localization')).'</h4></div>
            <ul class="sitemap_list">
                <li><a href="'.get_bloginfo('rss_url').'">'.((get_theme_option("translator_status") == "enable") ? get_text("translator_main_rss_feed") : __('Main RSS Feed','theme_localization')).'</a></li>
                <li><a href="'.get_bloginfo('comments_rss2_url').'">'.((get_theme_option("translator_status") == "enable") ? get_text("translator_comment_rss_feed") : __('Comments RSS Feed','theme_localization')).'</a></li>
            </ul>
            <div class="sitemap_margin"></div>
            ';
        }


        /* PAGES */
        $compile .= '<div class="bg_title"><h4 class="sitemap_block_title">'.((get_theme_option("translator_status") == "enable") ? get_text("translator_pages") : __('Pages','theme_localization')).'</h4></div>';
        $args = array(
            'depth'        => 2,
            'sort_column'  => 'menu_order, post_title',
            'post_type'    => 'page',
            'post_status'  => 'publish'
        );

        $pages = get_pages( $args );

        if (count($pages)>0) {
            $compile .= '<ul class="sitemap_list">';
                foreach ($pages as $postObject) {
                    $compile .= '<li '.(($postObject->post_parent > 0) ? 'class="sitemap_with_parent"' : '').'><a href="'.get_permalink($postObject->ID).'">'.$postObject->post_title.'</a></li>';
                }
            $compile .= '</ul>';
        }

$compile .= '
    </div>';


    $compile .= '
    <div class="span4">';
        /* PORTFOLIO */
        $compile .= '<div class="bg_title"><h4 class="sitemap_block_title">'.((get_theme_option("translator_status") == "enable") ? get_text("translator_portfolio") : __('Portfolio','theme_localization')).'</h4></div>';
        $args = array(
            'depth'        => 2,
            'sort_column'  => 'menu_order, post_title',
            'post_type'    => 'port',
            'post_status'  => 'publish'
        );

        $pages = get_pages( $args );

        if (count($pages)>0) {
            $compile .= '<ul class="sitemap_list">';
                foreach ($pages as $postObject) {
                    $compile .= '<li '.(($postObject->post_parent > 0) ? 'class="sitemap_with_parent"' : '').'><a href="'.get_permalink($postObject->ID).'">'.$postObject->post_title.'</a></li>';
                }
            $compile .= '</ul>';
        }
    $compile .= '</div>';


    /* POSTS */
    if ($show_posts == "yes") {
    $compile .= '
    <div class="span4">
        <div class="bg_title"><h4 class="sitemap_block_title">'.((get_theme_option("translator_status") == "enable") ? get_text("translator_posts") : __('Posts','theme_localization')).'</h4></div>
        <ol class="sitemap_list">';

        $wp_query_in_shortcodes = new WP_Query();
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        );

        $wp_query_in_shortcodes->query($args);

            while ($wp_query_in_shortcodes->have_posts()) : $wp_query_in_shortcodes->the_post();
                $compile .= '
                <li>
                    <a href="'.get_permalink().'">'.get_the_title().'</a><br>
                    <span class="sitemap_date">'.get_the_time("d M Y").'</span>
                    <span class="sitemap_author"><a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.get_the_author().'</a></span>
                    <span class="sitemap_comments"><a href="'.get_comments_link().'">'.((get_theme_option("translator_status") == "enable") ? get_text("comments_number") : __('Comments','theme_localization')).": "
                    . get_comments_number( get_the_ID() ).'</a></span>
                </li>
                ';
            endwhile;

        wp_reset_query();

        $compile .= '
        </ol>
    </div>
    ';
    }




				
			return $compile;
		}
		add_shortcode($shortcodeName, 'shortcode_sitemap');  
	}
}




#Shortcode name
$shortcodeName="sitemap";

#Compile UI for admin panel
#Don't change this line
global $compileShortcodeUI;
$compileShortcodeUI .= "<div class='whatInsert whatInsert_".$shortcodeName."'>".$defaultUI."</div>";

#This function is executed each time when you click "Insert" shortcode button.
$compileShortcodeUI .= "
This shortocode comes with no parameters.

<script>
	function ".$shortcodeName."_handler() {
	
		/* YOUR CODE HERE */
		
		/* END YOUR CODE */
	
		/* COMPILE SHORTCODE LINE */
		var compileline = '[".$shortcodeName."][/".$shortcodeName."]';
				
		/* DO NOT CHANGE THIS LINE */
		jQuery('.whatInsert_".$shortcodeName."').html(compileline);
	}
</script>

";




#Register shortcode & set parameters
$sitemap = new sitemap_shortcode();
$sitemap->register_shortcode($shortcodeName);

#add shortcode to wysiwyg 
#$shortcodesUI['sitemap'] = array("name" => $shortcodeName, "handler" => $compileShortcodeUI);

unset($compileShortcodeUI);


?>