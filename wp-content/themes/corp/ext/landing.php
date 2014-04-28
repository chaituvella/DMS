<?php

global $wpdb;
$table_name = $wpdb->prefix . "layerslider";
$wpdb->hide_errors();
$slider_data = $wpdb->get_results("SELECT * FROM $table_name WHERE id = ".get_theme_option("landing_slider"));

if (is_array($slider_data)) {
    $slider = json_decode($slider_data[0]->data, true);
    $sliderHeight = $slider['properties']['height']/2+80;
    echo '<div class="landing_slider">';
    echo do_shortcode("[layerslider id='".get_theme_option("landing_slider")."']");
    echo '<a href="'.get_permalink().'" class="skip_intro">SKIP INTRO</a></div>';
}

wp_footer();
?>
</body>
</html>
<?php die(); ?>