<?php

class iconbox_shortcode {

	public function register_shortcode($shortcodeName) {
		function shortcode_iconbox($atts, $content = null) {

            global $pbconfig;
            if (!isset($compile)) {$compile='';}

			extract( shortcode_atts( array(
                'heading_size' => $pbconfig['default_heading_in_module'],
                'heading_color' => '',
                'heading_text' => '',
                'iconbox_heading' => '',
                'button_link' => '',
                'button_text' => '',
                'icon_type' => '',
                'target' => '_blank',
                'link' => '',
			), $atts ) );

            #heading
            if (strlen($heading_color)>0) {$custom_color = "color:#{$heading_color};";}
            if (strlen($heading_text)>0) {
                $compile .= "<div class='bg_title'><".$heading_size." style='".(isset($custom_color) ? $custom_color : '')."' class='headInModule'>{$heading_text}</".$heading_size."></div>";
            }

            $compile .= "
			<div class='module_content shortcode_iconbox'>
			    ".((strlen($link)>0) ? "<a target='".$target."' href='".$link."'>" : "")."
                    <div class='ico'>".$icon_type."</div>
                    <h5 class='iconbox_title'>".$iconbox_heading."</h5>
                    <p>".$content."</p>
                ".((strlen($link)>0) ? "</a>" : "")."
			</div>
			";

			return $compile;

		}
		add_shortcode($shortcodeName, 'shortcode_iconbox');
	}
}






#Shortcode name
$shortcodeName="iconbox";


#Compile UI for admin panel
#Don't change this line
global $compileShortcodeUI;
$compileShortcodeUI .= "<div class='whatInsert whatInsert_".$shortcodeName."'>".$defaultUI."</div>";

#Your code
$compileShortcodeUI .= "
Icon: <input style='width:60px;text-align:center;' value='1' type='text' class='".$shortcodeName."_icon' name='".$shortcodeName."_icon'> <a target='_blank' href='http://www.fontsquirrel.com/fonts/modern-pictograms'>Character Map</a><br>
iconbox_heading: <input style='width:232px;text-align:center;' value='Some iconbox_heading here' type='text' class='".$shortcodeName."_iconbox_heading' name='".$shortcodeName."_iconbox_heading'> <input type='checkbox' name='".$shortcodeName."_last' class='".$shortcodeName."_last'> Last

<script>
	function ".$shortcodeName."_handler() {

		/* YOUR CODE HERE */

		var iconbox_heading = jQuery('.".$shortcodeName."_iconbox_heading').val();
		var icon = jQuery('.".$shortcodeName."_icon').val();
		var last = jQuery('.".$shortcodeName."_last').attr('checked');

		if (last!=='checked') {
			last='no';
		}
		if (last=='checked') {
			last='yes';
		}

		/* END YOUR CODE */

		/* COMPILE SHORTCODE LINE */
		var compileline = '[".$shortcodeName." iconbox_heading=\"'+iconbox_heading+'\" icon=\"'+icon+'\" last=\"'+last+'\"]Some text here[/".$shortcodeName."]';

		/* DO NOT CHANGE THIS LINE */
		jQuery('.whatInsert_".$shortcodeName."').html(compileline);
	}
</script>

";






#Register shortcode & set parameters
$iconbox = new iconbox_shortcode();
$iconbox->register_shortcode($shortcodeName);

#add shortcode to wysiwyg
#$shortcodesUI['iconbox'] = array("name" => $shortcodeName, "handler" => $compileShortcodeUI);

unset($compileShortcodeUI);

?>