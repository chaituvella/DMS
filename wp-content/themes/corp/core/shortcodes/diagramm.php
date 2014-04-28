<?php

#diagramm_item
function diagramm_item($atts, $content = null)
{
    global $pbconfig;
    if (!isset($compile)) {$compile='';}

    extract(shortcode_atts(array(
        'heading_size' => $pbconfig['default_heading_in_module'],
        'heading_color' => '',
        'heading_text' => '',
        'percent' => '10',
    ), $atts));

    $compile .= "<li class='skill_li'><div class='diagram_bar'><div class='skill_div-wrapper'><h6>".$content."&nbsp;&nbsp;-&nbsp;&nbsp;".$percent."%</h6><div data-percent='".$percent."' class='skill_div'></div></div></div></li>";
    return $compile;
}

add_shortcode('diagramm_item', 'diagramm_item');


class diagramm_shortcode
{

    public function register_shortcode($shortcodeName)
    {
        function shortcode_diagramm_shortcode($atts, $content = null)
        {
            global $pbconfig;
            if (!isset($compile)) {$compile='';}

            extract(shortcode_atts(array(
                'heading_size' => $pbconfig['default_heading_in_module'],
                'heading_color' => '',
                'heading_text' => '',
                'title' => '',
                'expanded_state' => '',
            ), $atts));

            #heading
            if (strlen($heading_color) > 0) {
                $custom_color = "color:#{$heading_color};";
            }
            if (strlen($heading_text) > 0) {
                $compile .= "<div class='bg_title'><" . $heading_size . " style='" . (isset($custom_color) ? $custom_color : '') . "' class='headInModule'>{$heading_text}</" . $heading_size . "></a></div>";
            }

            $compile .= "
                <div class='shortcode_diagramm_shortcode diagramm'><ul class='skills_list'>" . do_shortcode($content) . "</ul></div>
			";

            return $compile;
        }

        add_shortcode($shortcodeName, 'shortcode_diagramm_shortcode');
    }
}


#Shortcode name
$shortcodeName = "diagramm";


#Compile UI for admin panel
#Don't change this line
global $compileShortcodeUI;
$compileShortcodeUI .= "<div class='whatInsert whatInsert_" . $shortcodeName . "'>" . $defaultUI . "</div>";

#Your code
$compileShortcodeUI .= "
No parameters.

<script>
	function " . $shortcodeName . "_handler() {
	
		/* YOUR CODE HERE */
		var type = jQuery('." . $shortcodeName . "_type').val();
		
		/* END YOUR CODE */
	
		/* COMPILE SHORTCODE LINE */
		var compileline = '[" . $shortcodeName . "][diagramm_item title=\"some title here\"]some text here[/diagramm_item][/" . $shortcodeName . "]';
				
		/* DO NOT CHANGE THIS LINE */
		jQuery('.whatInsert_" . $shortcodeName . "').html(compileline);
	}
</script>

";


#Register shortcode & set parameters
$diagramm_shortcode = new diagramm_shortcode();
$diagramm_shortcode->register_shortcode($shortcodeName);

#add shortcode to wysiwyg 
#$shortcodesUI['diagramm_shortcode'] = array("name" => $shortcodeName, "handler" => $compileShortcodeUI);

unset($compileShortcodeUI);

?>