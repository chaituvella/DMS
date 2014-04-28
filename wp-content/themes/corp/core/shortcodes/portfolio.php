<?php

class portfolio_shortcode
{
    public function register_shortcode($shortcodeName)
    {
        function shortcode_portfolio($atts, $content = null)
        {
            global $pbconfig;
            extract(shortcode_atts(array(
                'heading_size' => $pbconfig['default_heading_in_module'],
                'heading_color' => '',
                'heading_text' => '',
                'items_on_start' => '4',
                'items_per_click' => '4',
                'view_type' => '1 column',
                'category' => 'all',
            ), $atts));

            if ($items_on_start<1) {
                $items_on_start = 4;
            }
            if ($items_per_click<1) {
                $items_per_click = 4;
            }

            #heading
            if (strlen($heading_color) > 0) {
                $custom_color = "color:#{$heading_color};";
            }
            if (strlen($heading_text) > 0) {
                echo "<div class='bg_title'><" . $heading_size . " style='" . $custom_color . "' class='headInModule'>{$heading_text}</" . $heading_size . "></div>";
            }

            wp_enqueue_script('js_isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), false, false);
            wp_enqueue_script('js_sorting', get_template_directory_uri() . '/js/sorting.js');

            #Filter
            if (($category == "all" || $category=="") && $view_type!=="Grid columns") {
                echo '
                <div class="filter_block">
                    <div class="filter_navigation" >
                        <ul class="splitter" id="options">
                            <li>';
                showPortCategory();
                echo '      </li>
                        </ul>
                    </div>
                </div>
                ';
            }

            switch ($view_type) {
                case "1 column":
                    $view_type_class="columns1";
                    BREAK;
                case "2 columns":
                    $view_type_class="columns2";
                    BREAK;
                case "3 columns":
                    $view_type_class="columns3";
                    BREAK;
                case "4 columns":
                    $view_type_class="columns4";
                    BREAK;
                case "Grid columns":
                    $view_type_class="columns-grid";
                    BREAK;
            }


            #START PORTFOLIO
            echo '<div class="portfolio_block image-grid '.$view_type_class.'" id="list">';

            echo '
                </div><!-- .portfolio_block -->
                <div class="clear"><!-- ClearFix --></div>
				<div class="load_more_cont">';
                    echo '<a class="btn_load_more get_portfolio_works_btn shortcode_button btn_small btn_type1" href="#">' . ((get_theme_option("translator_status") == "enable") ? get_text("translator_load_more") : __('Load more works','theme_localization')) . '<span></span></a>';
            echo '
			    </div>
            ';
            ?>
            <script>

                /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!CONFIG!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
                var html_template = "<?php echo $view_type; ?>";
                var now_open_works = 0;
                var first_load = true;
                /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!CONFIG!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/

                function get_portfolio_works (this_obj) {
                    if(typeof(this_obj)=="undefined") {data_option_value="*";}
                    else {var data_option_value = this_obj.attr("data-option-value");}

                    if (first_load == true) {
                        works_per_load = <?php echo $items_on_start; ?>;
                        first_load = false;
                    } else {
                        works_per_load = <?php echo $items_per_click; ?>;
                    }

                    $.ajax({
                        type: "POST",
                        url: mixajaxurl,
                        data: "html_template="+html_template+"&now_open_works="+now_open_works+"&action=get_portfolio_works"+"&works_per_load="+works_per_load+"&category=<?php echo $category; ?>",
                        success: function(result){

                            if(result.length<1){
                                jQuery(".load_more_cont").hide("fast");
                            }

                            now_open_works = now_open_works + works_per_load;
                            var $newItems = jQuery(result);
                            jQuery(".portfolio_block").isotope( 'insert', $newItems, function() {

                                jQuery(".portfolio_block").ready(function(){
                                    jQuery(".portfolio_block").isotope('reLayout');
                                    //Portfolio
                                    if ($('.image-grid').hasClass('columns1')) {

                                    } else {
                                        jQuery('.image-grid').find('.portfolio_item').each(function(){
                                            jQuery(this).find('.portfolio_descr').css('top', ((jQuery(this).height()-jQuery(this).find('.portfolio_descr').height())/2)+'px');
                                        });
                                    }
                                });
                                setTimeout('jQuery(".portfolio_block").isotope("reLayout");', 1500);

                            });
                            jQuery('a.prettyPhoto').prettyPhoto();
                        }
                    });
                }

                jQuery(".get_portfolio_works_btn").click(function(){
                    get_portfolio_works();
                    return false;
                });

                /* load at start */
                jQuery(window).load(function(){
                    get_portfolio_works();
                });

            </script>
            <?php

            #get_pagination("10", "show_in_shortcodes");

            wp_reset_query();

            return "";
        }

        add_shortcode($shortcodeName, 'shortcode_portfolio');
    }
}


#Shortcode name
$shortcodeName = "portfolio";


#Compile UI for admin panel
#Don't change this line
global $compileShortcodeUI;
$compileShortcodeUI .= "<div class='whatInsert whatInsert_" . $shortcodeName . "'>" . $defaultUI . "</div>";

#Your code
$compileShortcodeUI .= "
Type: 
<select name='" . $shortcodeName . "_portfolio_type' class='" . $shortcodeName . "_portfolio_type'>
	<option value='type1'>Low</option>
	<option value='type2'>Bold light</option>
	<option value='type3'>Bold colored</option>
	<option value='type4'>Bold dark</option>
</select>

<script>
	function " . $shortcodeName . "_handler() {
	
		/* YOUR CODE HERE */
		
		var portfolio_type = jQuery('." . $shortcodeName . "_portfolio_type').val();
		
		/* END YOUR CODE */
	
		/* COMPILE SHORTCODE LINE */
		var compileline = '[" . $shortcodeName . " type=\"'+portfolio_type+'\"][/" . $shortcodeName . "]';
				
		/* DO NOT CHANGE THIS LINE */
		jQuery('.whatInsert_" . $shortcodeName . "').html(compileline);
	}
</script>

";


#Register shortcode & set parameters
$portfolio = new portfolio_shortcode();
$portfolio->register_shortcode($shortcodeName);

#add shortcode to wysiwyg 
#$shortcodesUI['portfolio'] = array("name" => $shortcodeName, "handler" => $compileShortcodeUI);

unset($compileShortcodeUI);

?>