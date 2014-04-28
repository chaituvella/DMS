<?php
#delete_theme_option("theme_version");

$theme_temp_version = get_theme_option("theme_version");

if ((int)$theme_temp_version < 1) {
#    update_theme_option("translator_status", "enable");


 #   update_theme_option("theme_version", 1);
}

?>