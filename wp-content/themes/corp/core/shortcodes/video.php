<?php

class video_shortcode {

	public function register_shortcode($shortcodeName) {
		function shortcode_video($atts, $content = null) {
            global $pbconfig;
            if (!isset($compile)) {$compile='';}
			extract( shortcode_atts( array(
                'heading_size' => $pbconfig['default_heading_in_module'],
                'heading_color' => '',
                'heading_text' => '',
                'video_url' => '',
                'w' => '',
                'h' => $pbconfig['default_video_height'],
                'float' => 'none',
			), $atts ) );

            #heading
            if (strlen($heading_color)>0) {$custom_color = "color:#{$heading_color};";}
            if (strlen($heading_text)>0) {
                $compile .= "<div class='bg_title'><".$heading_size." style='".(isset($custom_color) ? $custom_color : '')."' class='headInModule'>{$heading_text}</".$heading_size."></div>";
            }

			if ($float == "right") {$alignclass = "alignright";}
			if ($float == "left") {$alignclass = "alignleft";}
			if ($float == "none") {$alignclass = "alignnone";}


            $compile .= '<div class="wrapped_video">';

            #YOUTUBE
            $is_youtube = substr_count($video_url, "youtu");
            if ($is_youtube > 0) {
                $videoid = substr(strstr($video_url, "="), 1);
                $compile .= "
            <iframe class=\"$alignclass\" width=\"{$w}\" height=\"{$h}\" src=\"http://www.youtube.com/embed/" . $videoid . "\" frameborder=\"0\" allowfullscreen></iframe>
        ";
            }

            #VIMEO
            $is_vimeo = substr_count($video_url, "vimeo");
            if ($is_vimeo > 0) {
                $videoid = substr(strstr($video_url, "m/"), 2);
                $compile .= "
            <iframe class=\"$alignclass\" src=\"http://player.vimeo.com/video/" . $videoid . "\" width=\"{$w}\" height=\"{$h}\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        ";
            }

            $compile .= '</div>';

			return $compile;
		}
		add_shortcode($shortcodeName, 'shortcode_video');
	}
}




#Shortcode name
$shortcodeName="video";


#Compile UI for admin panel
#Don't change this line
global $compileShortcodeUI;
$compileShortcodeUI .= "<div class='whatInsert whatInsert_".$shortcodeName."'>".$defaultUI."</div>";

#Your code
$compileShortcodeUI .= "

<table>
	<tr>
		<td>Width:</td>
		<td><input value='250px' type='text' class='".$shortcodeName."_w' name='".$shortcodeName."_w'></td>
	</tr>
	<tr>
		<td>Height:</td>
		<td><input value='150px' type='text' class='".$shortcodeName."_h' name='".$shortcodeName."_h'></td>
	</tr>
	<tr>
		<td>Video:</td>
		<td><input value='' type='text' class='".$shortcodeName."_video_url' name='".$shortcodeName."_video_url'></td>
	</tr>
	<tr>
		<td>Float:</td>
		<td>
		    <select style='float:left;' name='".$shortcodeName."_float' class='".$shortcodeName."_float'>
                <option value='left'>Left</option>
                <option value='right'>Right</option>
                <option value='none'>None</option>
            </select>
        </td>
	</tr>
</table>

<script>
	function ".$shortcodeName."_handler() {
	
		/* YOUR CODE HERE */
		
		var w = jQuery('.".$shortcodeName."_w').val();
		var h = jQuery('.".$shortcodeName."_h').val();
		var video_url = jQuery('.".$shortcodeName."_video_url').val();
		var float = jQuery('.".$shortcodeName."_float').val();
		
		/* END YOUR CODE */
	
		/* COMPILE SHORTCODE LINE */
		var compileline = '[".$shortcodeName." float=\"'+float+'\" w=\"'+w+'\" h=\"'+h+'\" video_url=\"'+video_url+'\"][/".$shortcodeName."]';
				
		/* DO NOT CHANGE THIS LINE */
		jQuery('.whatInsert_".$shortcodeName."').html(compileline);
	}
</script>

";






#Register shortcode & set parameters
$video = new video_shortcode();
$video->register_shortcode($shortcodeName);

#add shortcode to wysiwyg 
$shortcodesUI['video'] = array("name" => $shortcodeName, "handler" => $compileShortcodeUI);

unset($compileShortcodeUI);

?>