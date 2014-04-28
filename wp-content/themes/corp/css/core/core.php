<?php header("Content-type: text/css");
$wp_include = "../../../../wp-load.php";
$i = 0;
while (!file_exists($wp_include) && $i++ < 10) {
    $wp_include = "../$wp_include";
}

require($wp_include);

global $themeconfig;
if ($themeconfig['custom_fonts'] == true) {
    if (is_array($themeconfig['custom_fonts_array'])) {
        foreach ($themeconfig['custom_fonts_array'] as $id => $font) {
            if ($font['font_file_name']!=="default_font") {
                echo "
                @font-face {
                    font-family: '".$font['font_family']."';
                    src: url('".THEMEROOTURL."/css/fonts/".$font['font_file_name'].".eot');
                    src: url('".THEMEROOTURL."/css/fonts/".$font['font_file_name'].".eot?#iefix') format('embedded-opentype'),
                         url('".THEMEROOTURL."/css/fonts/".$font['font_file_name'].".woff') format('woff'),
                         url('".THEMEROOTURL."/css/fonts/".$font['font_file_name'].".ttf') format('truetype'),
                         url('".THEMEROOTURL."/css/fonts/".$font['font_file_name'].".svg#".$font['svg_id']."') format('svg');
                    font-weight: ".$font['font_weight'].";
                    font-style: ".$font['font_style'].";

                }
                ";
            }
        }
    }
}

if (isset($_COOKIE['theme_color1'])) {
    $themecolor1 = $_COOKIE['theme_color1'];
} else {
    $themecolor1 = get_theme_option("theme_color1");
}
/*if (isset($_COOKIE['theme_color2'])) {
    $themecolor2 = $_COOKIE['theme_color2'];
} else {
    $themecolor2 = get_theme_option("theme_color2");
}*/
$additional_font = get_theme_option("additional_font");

#Fonts & colors
$footer_background_color = get_theme_option("footer_background_color");
$footer_text_color = get_theme_option("footer_text_color");
$content_text_color = get_theme_option("content_text_color");
$text_headers_font = get_theme_option("text_headers_font");
$main_content_font = get_theme_option("main_content_font");

$h1_font_size = get_theme_option("h1_font_size");
$h1_line_height = substr(get_theme_option("h1_font_size"), 0, -2);
$h1_line_height = (int)$h1_line_height+2;$h1_line_height = $h1_line_height."px";

$h2_font_size = get_theme_option("h2_font_size");
$h2_line_height = substr(get_theme_option("h2_font_size"), 0, -2);
$h2_line_height = (int)$h2_line_height+2;$h2_line_height = $h2_line_height."px";

$h3_font_size = get_theme_option("h3_font_size");
$h3_line_height = substr(get_theme_option("h3_font_size"), 0, -2);
$h3_line_height = (int)$h3_line_height+2;$h3_line_height = $h3_line_height."px";

$h4_font_size = get_theme_option("h4_font_size");
$h4_line_height = substr(get_theme_option("h4_font_size"), 0, -2);
$h4_line_height = (int)$h4_line_height+2;$h4_line_height = $h4_line_height."px";

$h5_font_size = get_theme_option("h5_font_size");
$h5_line_height = substr(get_theme_option("h5_font_size"), 0, -2);
$h5_line_height = (int)$h5_line_height+2;$h5_line_height = $h5_line_height."px";

$h6_font_size = get_theme_option("h6_font_size");
$h6_line_height = substr(get_theme_option("h6_font_size"), 0, -2);
$h6_line_height = (int)$h6_line_height+2;$h6_line_height = $h6_line_height."px";

$main_content_font_size = get_theme_option("main_content_font_size");
$main_content_line_height = get_theme_option("main_content_line_height");
?>
/* *** F O N T   F A M I L I E S  *** */

@font-face {
font-family: 'CoreIconsRegular';
src: url('../fonts/coreicons-webfont.eot');
src: url('../fonts/coreicons-webfont.eot?#iefix') format('embedded-opentype'),
url('../fonts/coreicons-webfont.woff') format('woff'),
url('../fonts/coreicons-webfont.ttf') format('truetype'),
url('../fonts/coreicons-webfont.svg#coreiconsregular') format('svg');
font-weight: normal;
font-style: normal;

}
* {
font-family:Arial, Helvetica, sans-serif;
font-weight:400;
}

.call_us .ico,
.ico {
font-family: 'CoreIconsRegular';
}



/* ***  F O N T   S E T T I N G S  *** */

p, td, div,
blockquote p {
font-size:<?php echo $main_content_font_size;?>;
line-height:<?php echo $main_content_line_height;?>;
}

header .top_line .call_us,
header .top_line .slogan {
    line-height:14px;
    font-size:11px;
}

h1, h2, h3, h4, h5, h6,
h1 span, h2 span, h3 span, h4 span, h5 span, h6 span,
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
    text-decoration:none!important;
    padding:0;
    color:#<?php the_theme_option("header_text_color"); ?>;
}

header nav div > ul > li > a,
.shortcode_accordion_item_title,
.shortcode_toggles_item_title,
.shortcode_tab_item_title,
.btn_small,
.btn_normal,
.btn_large,
.sitemap_list li a,
.sitemap_list li,
.filter_navigation ul li ul li a {
	font-family:'<?php echo $text_headers_font; ?>', sans-serif!important;
}

* {
	font-family:<?php echo $main_content_font; ?>, Helvetica, sans-serif;
}

*,
a:hover,
.contentarea ul li, 
.content_area ol li,
.contentarea ul li:before,
.contentarea ol li,
.contentarea ol li:before,
.continfo_item,
.continfo_item a,
.continfo_item a:hover,
.shortcode_iconbox .ico,
.filter_navigation ul li ul li a,
.more-link:hover {
	color:#666666;
}
.twitter_list li a:hover {
	color:#666666!important;
}
#footer_bar .twitter_list li a:hover {
	color:#ababab!important;
}
input, button, select, textarea {
	font-family:<?php echo $main_content_font; ?>, Helvetica, sans-serif!important;
}

h1, h2, h3, h4, h5, h6,
h1 span, h2 span, h3 span, h4 span, h5 span, h6 span,
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
	font-family:'<?php echo $text_headers_font; ?>', sans-serif!important;
}

h1, h1 span, h1 a {
    font-size:<?php echo $h1_font_size; ?>;
    line-height:<?php echo $h1_line_height; ?>;
}
h2, h2 span, h2 a {
    font-size:<?php echo $h2_font_size; ?>;
    line-height:<?php echo $h2_line_height; ?>;
}
h3, h3 span, h3 a {
    font-size:<?php echo $h3_font_size; ?>;
    line-height:<?php echo $h3_line_height; ?>;
}
h4, h4 span, h4 a {
    font-size:<?php echo $h4_font_size; ?>;
    line-height:<?php echo $h4_line_height; ?>;
}
h5, h5 span, h5 a {
    font-size:<?php echo $h5_font_size; ?>;
    line-height:<?php echo $h5_line_height; ?>;
}
h6, h6 span, h6 a {
    font-size:<?php echo $h6_font_size; ?>;
    line-height:<?php echo $h6_line_height; ?>;
}


/* ***  C O L O R   O P T I O N S  *** */


/* *** MAIN COLOR: #95ba00 *** */

::selection {background:#<?php echo $themecolor1; ?>;}
::-moz-selection {background:#<?php echo $themecolor1; ?>;}

blockquote.type1:before,
.highlighted_colored {
	background-color:#<?php echo $themecolor1; ?>;
}
.view-tenth .mask {
	background-color:#<?php echo $themecolor1; ?>!important;
}

a,
a em,
a strong,
blockquote .author,
.dropcap.colored,
.shortcode_iconbox:hover .iconbox_title,
.carousel_title a:hover,
.colored_italic,
.testimonials_list .author,
.most_popular .price_item_cost h1,
.footer_twitter ul li a,
.most_popular .price_item_cost h1 span,
.sitemap_list li a,
.twitter_list li a,
.left-sidebar .recent_posts_content .post_title,
.right-sidebar .recent_posts_content .post_title,
.filter_navigation ul li ul li a:hover,
.filter_navigation ul li ul li.selected a,
.continfo_item a,
.blog_info_block div a:hover,
.shop_list_title a:hover,
.shop_list_price,
.total_price span,
.product_title_price,
.review_body a,
ul.menu li.current-menu-parent > a,
ul.menu li.current-menu-item > a,
ul.menu li:hover > a {
	color:#<?php echo $themecolor1; ?>;
}

.shortcode_accordion_item_title:hover,
.shortcode_toggles_item_title:hover,
.shortcode_tab_item_title:hover,
.pagerblock li a.current,
.widget_nav_menu ul li a:hover,
.widget_archive ul li a:hover,
.widget_pages ul li a:hover,
.widget_categories ul li a:hover,
.widget_recent_entries ul li a:hover {
	color:#<?php echo $themecolor1; ?>!important;
}

ul.menu li .sub-menu li.current-menu-parent > a,
ul.menu li .sub-menu li.current-menu-item > a,
ul.menu li .sub-menu li > a:hover,
/*ul.menu li.current-menu-parent > a,
ul.menu li.current-menu-item > a,
ul.menu li > a:hover,
ul.menu li:hover > a,*/
ul.menu li .sub-menu li:hover > a,
header nav ul li .sub-menu li:hover > a,
header nav ul li .sub-menu li:hover .sub-menu li:hover > a,
ul.mobile_menu li.current-menu-parent > a,
ul.mobile_menu li.current-menu-item > a,
/*ul.mobile_menu li > a:hover,
ul.mobile_menu li:hover > a,*/
ul.mobile_menu li .sub-menu li:hover > a,
ul.mobile_menu li .sub-menu li:hover .sub-menu li:hover > a {
    color: #FFFFFF !important;
}

hr.colored {
	border-color:#<?php echo $themecolor1; ?>;
}
