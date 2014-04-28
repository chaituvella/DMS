<?php

#Change this
$themename = "Corp";
$themeshort = "corp_";

#ADD SUPPORT FOR CUSTOM FONTS (NOT GOOGLE)
$themeconfig['custom_fonts'] = false;
#JUST FILENAME WITHOUT EXT
$themeconfig['custom_fonts_array'] = array(
    array(
        "font_family" => "Arial",
        "font_file_name" => "default_font",
        "font_weight" => "normal",
        "font_style" => "normal",
        "svg_id" => "default_font",
    ),
);

/*echo "<pre>";
print_r($themeconfig['custom_fonts_array']);
echo "</pre>";*/

?>