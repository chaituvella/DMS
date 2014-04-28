<?php

class frame {

	public function register_shortcode($shortcodeName) {
		function shortcode_frame($atts, $content = null) {
			extract( shortcode_atts( array(
			  'style' => 'alignleft',
              'width' => '250',
			  'height' => '176',
			  'lightbox' => 'yes',
			  'url' => '',
			  'title' => "Title",
			), $atts ) );
            
            $compile = '
                <img data-href="'.$url.'" width="'.$width.'" height="'.$height.'" alt="" src="'.$url.'" class="grey_img '.$style.' wrapped_zoomer" title="'.$title.'">
            ';


			return $compile;
		}
		add_shortcode($shortcodeName, 'shortcode_frame');
	}
}




#Shortcode name
$shortcodeName="frame";


#Compile UI for admin panel
#Don't change this line
global $compileShortcodeUI;
$compileShortcodeUI .= "<div class='whatInsert whatInsert_".$shortcodeName."'>".$defaultUI."</div>";

#Your code
$compileShortcodeUI .= "
<table>
	<tr>
		<td>Float:</td>
		<td>
		    <select name='".$shortcodeName."_style' class='".$shortcodeName."_style'>
                <option value='alignleft'>Left</option>
                <option value='alignright'>Right</option>
                <option value='alignnone'>None</option>
            </select>
        </td>
    </tr>
	<tr>
		<td>Preview width:</td>
		<td>
		    <input value='124' type='text' class='".$shortcodeName."_width' name='".$shortcodeName."_width'>
        </td>
    </tr>
	<tr>
		<td>Preview height:</td>
		<td>
		    <input value='124' type='text' class='".$shortcodeName."_height' name='".$shortcodeName."_height'>
        </td>
    </tr>
	<tr>
		<td>Title:</td>
		<td>
		    <input value='' type='text' class='".$shortcodeName."_title' name='".$shortcodeName."_title'>
        </td>
    </tr>
	<tr>
		<td>Image:</td>
		<td>
		    <input value='' type='text' class='".$shortcodeName."_url' name='".$shortcodeName."_url'>
        </td>
    </tr>
</table>




<script>
	function ".$shortcodeName."_handler() {
	
		/* YOUR CODE HERE */
		var style = jQuery('.".$shortcodeName."_style').val();
		/*var lightbox = jQuery('.".$shortcodeName."_lightbox').val();*/
		var url = jQuery('.".$shortcodeName."_url').val();
		var title = jQuery('.".$shortcodeName."_title').val();
		var width = jQuery('.".$shortcodeName."_width').val();
		var height = jQuery('.".$shortcodeName."_height').val();
		
		/* END YOUR CODE */
	
		/* COMPILE SHORTCODE LINE */
		var compileline = '[".$shortcodeName." style=\"'+style+'\" title=\"'+title+'\" width=\"'+width+'\" height=\"'+height+'\" url=\"'+url+'\"][/".$shortcodeName."]';
				
		/* DO NOT CHANGE THIS LINE */
		jQuery('.whatInsert_".$shortcodeName."').html(compileline);
	}
</script>

";






#Register shortcode & set parameters
$frame = new frame();
$frame->register_shortcode($shortcodeName);

#add shortcode to wysiwyg 
$shortcodesUI['frame'] = array("name" => $shortcodeName, "handler" => $compileShortcodeUI);

unset($compileShortcodeUI);

?>