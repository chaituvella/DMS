<?php

class blockquote_shortcode {

	public function register_shortcode($shortcodeName) {
		function shortcode_blockquote($atts, $content = null) {

            global $pbconfig;
            if (!isset($compile)) {$compile='';}

			extract( shortcode_atts( array(
                'heading_size' => $pbconfig['default_heading_in_module'],
                'heading_color' => '',
                'heading_text' => '',
                'quote_type' => 'type1',
                'author_name' => 'author_name',
                'float' => 'none',
                'width' => '100%',
			), $atts ) );

            #heading
            if (strlen($heading_color)>0) {$custom_color = "color:#{$heading_color};";}
            if (strlen($heading_text)>0) {
                $compile .= "<div class='bg_title'><".$heading_size." style='".(isset($custom_color) ? $custom_color : '')."' class='headInModule'>{$heading_text}</".$heading_size."></div>";
            }

			if (strlen($author_name)>0) {$auth = "<span class='author'>".$author_name."</span>";}
			
			$compile .= "<blockquote class='shortcode_blockquote ".$float." ".$quote_type."' style='width:".$width.";'><p>".do_shortcode($content)."</p><div>".$auth."</div></blockquote>";

			return $compile;
			
		}
		add_shortcode($shortcodeName, 'shortcode_blockquote');
	}
}






#Shortcode name
$shortcodeName="blockquote";


#Compile UI for admin panel
#Don't change this line
global $compileShortcodeUI;
$compileShortcodeUI .= "<div class='whatInsert whatInsert_".$shortcodeName."'>".$defaultUI."</div>";

#Your code
$compileShortcodeUI .= "
<table>
	<tr>
		<td>Container width:</td>
		<td><input value='50%' type='text' class='".$shortcodeName."_width' name='".$shortcodeName."_width'></td>
	</tr>
	<tr>
		<td>Float:</td>
		<td>
		    <select style='' name='".$shortcodeName."_float' class='".$shortcodeName."_float'>
                <option value='left'>Left</option>
                <option value='right'>Right</option>
            </select>
		</td>
	</tr>
	<tr>
		<td>Author:</td>
		<td>
		    <input value='' type='text' class='".$shortcodeName."_author' name='".$shortcodeName."_author'>
		</td>
	</tr>
</table>

<script>
	function ".$shortcodeName."_handler() {
	
		/* YOUR CODE HERE */
		
		var author_name = jQuery('.".$shortcodeName."_author').val();
		var width = jQuery('.".$shortcodeName."_width').val();
		var float = jQuery('.".$shortcodeName."_float').val();
		
		/* END YOUR CODE */
	
		/* COMPILE SHORTCODE LINE */
		var compileline = '[".$shortcodeName." author_name=\"'+author_name+'\" width=\"'+width+'\" float=\"'+float+'\"][/".$shortcodeName."]';
				
		/* DO NOT CHANGE THIS LINE */
		jQuery('.whatInsert_".$shortcodeName."').html(compileline);
	}
</script>

";






#Register shortcode & set parameters
$blockquote = new blockquote_shortcode();
$blockquote->register_shortcode($shortcodeName);

#add shortcode to wysiwyg 
$shortcodesUI['blockquote'] = array("name" => $shortcodeName, "handler" => $compileShortcodeUI);

unset($compileShortcodeUI);

?>