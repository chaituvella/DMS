<?php

#Enable console output into PB area
$pbconfig['dev_console'] = false;
#update_theme_option("dev_console", "true");
#delete_theme_option("dev_console");

#main pb block settings
$pbconfig['slider_and_bg_area'] = true;
$pbconfig['slider_and_bg_area_enable_for'] = array('gallery', 'post', 'port', 'page');

#background / slider settings
$pbconfig['enable_fullscreen_slider'] = true;
$pbconfig['enable_fullwidth_slider'] = false;
$pbconfig['enable_background_image'] = true;
$pbconfig['enable_background_color'] = true;

#For this post types we enable page builder
$pbconfig['page_builder_enable_for_posts'] = array('post', 'port', 'page', 'gallery');

#detail settings for page customization
$pbconfig['pb_modules_enabled_for'] = array('page', 'port');
$pbconfig['page_settings_enabled_for'] = array('page', 'post', 'team', 'port');
$pbconfig['fullcreen_slider_enabled_for'] = array('gallery');
$pbconfig['fullwidth_slider_enabled_for'] = array();
$pbconfig['bg_image_enabled_for'] = array('post', 'port', 'page');
$pbconfig['bg_color_enabled_for'] = array('post', 'port', 'page');

#List bg types for pages
#$pbconfig['page_bg_available_types'] = array('stretched', 'center', 'repeat');
$pbconfig['page_bg_available_types'] = array('stretched', 'repeat');

#BG position for pages
/*$pbconfig['page_default_bg_position'] = "stretched";*/

#all_available_headers_for_module
$pbconfig['all_available_headers_for_module'] = array("h1", "h2", "h3", "h4", "h5", "h6");

#default heading in module
$pbconfig['default_heading_in_module'] = "h4";

#available quote types
$pbconfig['all_available_quote_types'] = array("" => "Dark", "type1" => "Light", "type2" => "Colored");

#gallery
$pbconfig['gallery_module_default_width'] = "100px";
$pbconfig['gallery_module_default_height'] = "150px";

#blog default posts per page
$pbconfig['blog_default_posts_per_page'] = 7;

#portfolio default posts per page
$pbconfig['portfolio_default_items_on_start'] = 4;
$pbconfig['portfolio_default_items_load_per_click'] = 4;
$pbconfig['all_available_portfolio_types'] = array("1 column", "2 columns", "3 columns", "4 columns");

#featured posts number of posts (not main blog module!)
$pbconfig['featured_posts_default_number_of_posts'] = 12;
$pbconfig['featured_posts_default_posts_per_line'] = 4;
$pbconfig['featured_posts_letters_in_excerpt'] = 130;
$pbconfig['featured_posts_available_post_types'] = array(
    "post" => "Post",
    "port" => "Portfolio",
);
$pbconfig['featured_posts_available_sorting_type'] = array("new", "random");

#default video height
$pbconfig['default_video_height'] = "450px";

#default number of workers for team module
$pbconfig['team_default_numbers'] = 20;

#testimonials
$pbconfig['default_number_of_testimonials'] = 3;
$pbconfig['all_available_testimonial_display_type'] = array("type1", "type2");

#all available testimonial sorting type
$pbconfig['all_available_testimonial_sorting_type'] = array("new", "random");

#all available iconboxes
$pbconfig['all_available_iconboxes'] = array("a", "b", "c");

#iconboxes img preview
$pbconfig['iconboxes_img_preview_url'] = THEMEROOTURL . "/core/admin/img/available_iconboxes.jpg";

#all available custom list types
$pbconfig['all_available_custom_list_types'] = array(
    "ordered" => "Ordered",
    "list_type1" => "Arrow",
    "list_type2" => "Plus",
    "" => "Normal",
    "list_type3" => "Download",
    "list_type4" => "Print",
    "list_type5" => "Edit",
    "list_type6" => "Attach"
);

#all available custom buttons
$pbconfig['all_available_custom_buttons'] = array(
    "btn_small btn_type1" => "Small Light",
    "btn_small btn_type2" => "Small Grey",
    "btn_small btn_type3" => "Small Dark",
    "btn_small btn_type4" => "Small Colored",
    "btn_small btn_type5" => "Small Light Blue",
    "btn_small btn_type6" => "Small Blue",
    "btn_small btn_type7" => "Small Violet",
    "btn_small btn_type8" => "Small Purple",
    "btn_small btn_type9" => "Small Pink",
    "btn_small btn_type10" => "Small Red",
    "btn_small btn_type11" => "Small Orange",
    "btn_small btn_type12" => "Small Yellow",
    "btn_small btn_type13" => "Small Lime",
    "btn_normal btn_type1" => "Medium Light",
    "btn_normal btn_type2" => "Medium Grey",
    "btn_normal btn_type3" => "Medium Dark",
    "btn_normal btn_type4" => "Medium Colored",
    "btn_normal btn_type5" => "Medium Light Blue",
    "btn_normal btn_type6" => "Medium Blue",
    "btn_normal btn_type7" => "Medium Violet",
    "btn_normal btn_type8" => "Medium Purple",
    "btn_normal btn_type9" => "Medium Pink",
    "btn_normal btn_type10" => "Medium Red",
    "btn_normal btn_type11" => "Medium Orange",
    "btn_normal btn_type12" => "Medium Yellow",
    "btn_normal btn_type13" => "Medium Lime",
    "btn_large btn_type1" => "Large Light",
    "btn_large btn_type2" => "Large Grey",
    "btn_large btn_type3" => "Large Dark",
    "btn_large btn_type4" => "Large Colored",
    "btn_large btn_type5" => "Large Light Blue",
    "btn_large btn_type6" => "Large Blue",
    "btn_large btn_type7" => "Large Violet",
    "btn_large btn_type8" => "Large Purple",
    "btn_large btn_type9" => "Large Pink",
    "btn_large btn_type10" => "Large Red",
    "btn_large btn_type11" => "Large Orange",
    "btn_large btn_type12" => "Large Yellow",
    "btn_large btn_type13" => "Large Lime"
);


#all available custom buttons
$pbconfig['all_available_target_for_custom_buttons'] = array(
    "_blank" => "Blank",
    "_self" => "Self"
);

#all available dropcaps
$pbconfig['all_available_dropcaps'] = array(
    "" => "Dark",
    "light" => "Light",
    "colored" => "Colored"
);

#all available messageboxes
$pbconfig['messagebox_available_types'] = array(
    "box_type1" => "Type 1",
    "box_type2" => "Type 2",
    "box_type3" => "Type 3",
    "box_type4" => "Type 4",
    "box_type5" => "Type 5",
    "box_type6" => "Type 6"
);

#all available highlighters
$pbconfig['all_available_highlighters'] = array(
    "colored" => "Colored",
    "dark" => "Dark",
    "light" => "Light"
);

#all available dividers
$pbconfig['all_available_dividers'] = array(
    "" => "Default",
    "dark" => "Dark",
    "colored" => "Colored"
);

#all available tabs types
$pbconfig['available_tabs_types'] = array(
    "type1" => "Horizontal",
    "type2" => "Vertical"
);

#all available social icons
$pbconfig['all_available_social_icons'] = array(
    "ico_socialize_facebook1" => "Facebook 1",
    "ico_socialize_facebook2" => "Facebook 2",
    "ico_socialize_twitter1" => "Twitter 1",
    "ico_socialize_twitter2" => "Twitter 2",
    "ico_socialize_twitter3" => "Twitter 3",
    "ico_socialize_digg1" => "Digg 1",
    "ico_socialize_digg2" => "Digg 2",
    "ico_socialize_google1" => "Google 1",
    "ico_socialize_google2" => "Google 2",
    "ico_socialize_tumbler" => "Tumblr",
    "ico_socialize_delicious" => "Delicious",
    "ico_socialize_plixi" => "Plixi",
    "ico_socialize_dribbble1" => "Dribbble 1",
    "ico_socialize_dribbble2" => "Dribbble 2",
    "ico_socialize_stubleUpon" => "StubleUpon",
    "ico_socialize_lastfm" => "LastFm",
    "ico_socialize_moby" => "Moby",
    "ico_socialize_vimeo" => "Vimeo",
    "ico_socialize_youtube1" => "YouTube 1",
    "ico_socialize_youtube2" => "YouTube 2",
    "ico_socialize_myspace" => "Myspace",
    "ico_socialize_linkedIn" => "LinkedIn",
    "ico_socialize_pinterest" => "Pinterest",
    "ico_socialize_flickr" => "Flickr",
    "ico_socialize_vk1" => "VK1",
    "ico_socialize_vk2" => "VK2",
    "ico_socialize_odnoklassniki" => "Odnoklassniki",
    "ico_socialize_gowalla" => "Gowalla",
    "ico_socialize_dropbox" => "Dropbox",
    "ico_socialize_skype" => "Skype",
    "ico_socialize_iChat" => "iChat",
    "ico_socialize_instagram" => "Instagram",
    "ico_socialize_evernote" => "Evernote",
    "ico_socialize_deviantart" => "Deviantart",
    "ico_socialize_blogspot" => "Blogspot",
    "ico_socialize_reddit" => "Reddit",
    "ico_socialize_technorati" => "Technorati",
    "ico_socialize_yahoo" => "Yahoo",
    "ico_socialize_diigo" => "Diigo",
    "ico_socialize_blinklist" => "Blinklist",
    "ico_socialize_bing" => "Bing",
    "ico_socialize_behnce" => "Behnce",
    "ico_socialize_picasa" => "Picasa",
    "ico_socialize_forrst" => "Forrst",
    "ico_socialize_ffffound" => "Ffffound",
    "ico_socialize_viddler" => "Viddler",
    "ico_socialize_friendfeed" => "Friendfeed",
    "ico_socialize_mobileMe" => "MobileMe",
    "ico_socialize_wordpress" => "Wordpress",
    "ico_socialize_drupal" => "Drupal",
    "ico_socialize_paypal" => "Paypal",
    "ico_socialize_share" => "Share",
    "ico_socialize_mail" => "Mail",
    "ico_socialize_rss" => "Rss",
    "ico_socialize_phone" => "Phone",
    "ico_socialize_home" => "Home",
);

#all available social icon type
$pbconfig['all_available_social_icons_type'] = array(
    "type1" => "Normal",
);

#partners number
$pbconfig['partners_default_number']= 6;

#Padding top for bg start
$pbconfig['available_padding_top_for_bg_start'] = array(
    "top_padding_normal" => "Default (45px)",
    "top_padding_medium" => "20px",
    "top_padding_small" => "15px",
    "top_padding_none" => "0px",
);

#Padding after modules
$pbconfig['available_padding_after_module'] = array(
    "module_normal_padding" => "Default (35px)",
    "module_medium_padding" => "20px",
    "module_small_padding" => "10px",
    "module_none_padding" => "0px",
);

#View type for Meta module
$pbconfig['available_postinfo_module_view_types'] = array(
    "portfolio_type1" => "Vertical",
    "portfolio_type2" => "Horizontal"
);

#how many images from media library show on one page
$pbconfig['images_from_media_library'] = 30;

#How many items in OUR TEAM per line
$pbconfig['available_workers_per_line'] = array(
    "1" => "1",
    "2" => "2",
    "3" => "3",
    "4" => "4",
);

#How many items in FEATURED POSTS per line
$pbconfig['available_posts_per_line'] = array(
    "1" => "1",
    "2" => "2",
    "3" => "3",
    "4" => "4",
);

#How many images in a row (in gallery)
$pbconfig['gallery_images_in_a_row'] = array(
    "2" => "2",
    "3" => "3",
    "4" => "4"
);


#Some const
define("PBROOTURL", THEMEROOTURL . "/core/page-builder");
define("PBIMGURL", THEMEROOTURL . "/core/page-builder/img");
?>