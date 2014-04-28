<?php

class show_gallery {

	public function register_shortcode($shortcodeName) {
		function shortcode_show_gallery($atts, $content = null) {

            global $pbconfig;

            $compile = "";

			extract( shortcode_atts( array(
                'heading_size' => $pbconfig['default_heading_in_module'],
                'heading_color' => '',
                'heading_text' => '',
                'images_in_a_row' => '4',
                'width' => $pbconfig['gallery_module_default_width'],
                'height' => $pbconfig['gallery_module_default_height'],
                'galleryid' => '',
			), $atts ) );

            global $pagebuilder;
            $current_page_sidebar = $pagebuilder['settings']['layout-sidebars'];

            switch($images_in_a_row) {
                case '2':
                    $width = (($current_page_sidebar == "no-sidebar") ? "570px" : "420px");
                    $height = $width;
                    $rowClass = "images_in_a_row_2";
                    break;

                case '3':
                    $width = (($current_page_sidebar == "no-sidebar") ? "370px" : "270px");
                    $height = $width;
                    $rowClass = "images_in_a_row_3";
                    break;

                case '4':
                    $width = (($current_page_sidebar == "no-sidebar") ? "270px" : "195px");
                    $height = $width;
                    $rowClass = "images_in_a_row_4";
                    break;
            }

            #heading
            if (strlen($heading_color)>0) {$custom_color = "color:#{$heading_color};";}
            if (strlen($heading_text)>0) {
                $compile .= "<div class='bg_title'><".$heading_size." style='".(isset($custom_color) ? $custom_color : '')."' class='headInModule'>{$heading_text}</".$heading_size."></div>";
            }

			$compile .= "<div class='list-of-images ".$rowClass."'>";

            $galleryPageBuilder = get_theme_pagebuilder($galleryid);

            if (isset($galleryPageBuilder['sliders']['fullscreen']['slides']) && is_array($galleryPageBuilder['sliders']['fullscreen']['slides'])) {
                foreach ($galleryPageBuilder['sliders']['fullscreen']['slides'] as $image) {

                    if (strlen($image['title']['value'])>0) {$photoTitleOutput = "<h2 class='post_type_".$image['slide_type']."'>".$image['title']['value']."</h2>";} else {$photoTitleOutput = "";}
                    if (strlen($image['caption']['value'])>0) {$photoCaption  = "<p>".$image['caption']['value']."</p>";} else {$photoCaption = "";}

                        $compile .= '
                        <div class="gallery_item '.(($image['slide_type'] == "video") ? 'video_item' : '').' '.((strlen($image['title']['value'])>0 || strlen($image['caption']['value'])>0) ? 'view view-tenth' : '').'">
                            <a href="'.$image['src'].'" class="prettyPhoto" rel="prettyPhoto[gallery1]">
                                <img class="gallery-stand-img" src="'.aq_resize((($image['slide_type'] == "image") ? $image['src'] : $image['thumbnail']['value']), $width, $height, true).'" alt="" width="'.substr($width, 0, -2).'" height="'.substr($height, 0, -2).'">
                                <div class="mask">
                                    <div class="gallery_descr">
                                        '.$photoTitleOutput.$photoCaption.'
                                    </div>
                                </div>
                            </a>
                        </div>
                        ';

                    unset($photoTitleOutput, $photoCaption);
                }
            }

			$compile .= "


            <div class='clear'></div>
            </div>
            ";
			
			return $compile;
			
		}
		add_shortcode($shortcodeName, 'shortcode_show_gallery');
	}
}



$compilegal="";
/* GET ALL GALLERYS FOR SELECT */
$wp_query_temp = new WP_Query();
$args = array(
'post_type' => 'gallery',
);

$wp_query_temp->query($args);
while ( $wp_query_temp->have_posts() ) : $wp_query_temp->the_post();

$compilegal .= '<option value="'.get_the_ID().'">'.get_the_title().'</option>';

endwhile;

wp_reset_query();




#Shortcode name
$shortcodeName="show_gallery";


#Compile UI for admin panel
#Don't change this line
global $compileShortcodeUI;
$compileShortcodeUI .= "<div class='whatInsert whatInsert_".$shortcodeName."'>".$defaultUI."</div>";

#Your code
$compileShortcodeUI .= "
<table>
	<tr>
		<td>Images in a row:</td>
		<td>
		    <select name='".$shortcodeName."_images_in_a_row' class='".$shortcodeName."_images_in_a_row'>";
                foreach ($pbconfig['gallery_images_in_a_row'] as $key => $value) {
                    $compileShortcodeUI .= '<option value="'.$key.'">'.$value.'</option>';
                }
$compileShortcodeUI .= "
            </select>
		</td>
	</tr>
	<tr>
		<td>Gallery:</td>
		<td>
		    <select name='".$shortcodeName."_galleryid' class='".$shortcodeName."_galleryid'>
                ".$compilegal."
            </select>
		</td>
	</tr>
</table>

<script>
	function ".$shortcodeName."_handler() {
	
		/* YOUR CODE HERE */
		var images_in_a_row = jQuery('.".$shortcodeName."_images_in_a_row').val();
		var galleryid = jQuery('.".$shortcodeName."_galleryid').val();
		
		/* END YOUR CODE */
	
		/* COMPILE SHORTCODE LINE */
		var compileline = '[".$shortcodeName." images_in_a_row=\"'+images_in_a_row+'\" galleryid=\"'+galleryid+'\"][/".$shortcodeName."]';
				
		/* DO NOT CHANGE THIS LINE */
		jQuery('.whatInsert_".$shortcodeName."').html(compileline);
	}
</script>

";






#Register shortcode & set parameters
$shortcode_show_gallery = new show_gallery();
$shortcode_show_gallery->register_shortcode($shortcodeName);

#add shortcode to wysiwyg 
$shortcodesUI['show_gallery'] = array("name" => $shortcodeName, "handler" => $compileShortcodeUI);

unset($compileShortcodeUI);

?>