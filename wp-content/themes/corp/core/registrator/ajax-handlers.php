<?php


add_action('wp_ajax_for_title_and_caption', 'for_title_and_caption_callback');
function for_title_and_caption_callback()
{
    global $wpdb;

    $attach_id = $_POST['attach_id'];
    $post_id = $_POST['post_id'];

    $photoTitle = get_post_meta($post_id, "att_attr_title_" . $attach_id, true);
    $photoCaption = get_post_meta($post_id, "att_attr_caption_" . $attach_id, true);

    ?>

<div class="adminpfix">
    <h3 class="media-title">Set image properties</h3>

    <form action="" method="post">
        <table>
            <tr>
                <td><label for="galleryItemTitle">Title</label></td>
                <td><input style="width:280px;" type="text" value="<?php echo $photoTitle; ?>" name="galleryItemTitle"
                           id="galleryItemTitle" class="defAdminBorder"></td>
            </tr>
            <tr>
                <td><label for="galleryItemCaption">Caption</label></td>
                <td><textarea style="width:280px;height:110px;" name="galleryItemCaption" id="galleryItemCaption"
                              class="defAdminBorder"><?php echo $photoCaption; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="attach_id" value="<?php echo $attach_id; ?>">
                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                    <input type="submit" value="Save" class="button savebutton" id="save-all" name="save_new_title">
                </td>
            </tr>
        </table>
    </form>
</div>

<?php

    die();
}


#Upload images
add_action('wp_ajax_mix_ajax_post_action', 'mix_ajax_callback');
function mix_ajax_callback()
{
    global $wpdb;
    $save_type = $_POST['type'];

    if ($save_type == 'upload') {

        $clickedID = $_POST['data'];
        $filename = $_FILES[$clickedID];
        $filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']);

        $override['test_form'] = false;
        $override['action'] = 'wp_handle_upload';
        $uploaded_file = wp_handle_upload($filename, $override);
        $upload_tracking[] = $clickedID;
        update_theme_option($clickedID, $uploaded_file['url']);
        if (!empty($uploaded_file['error'])) {
            echo 'Upload Error: ' . $uploaded_file['error'];
        } else {
            echo $uploaded_file['url'];
        }
    } elseif ($save_type == 'image_reset') {
        $id = $_POST['data'];
        global $wpdb;
        $query = "DELETE FROM $wpdb->options WHERE option_name LIKE '$id'";
        $wpdb->query($query);
    }

    die();
}


#Ajax import xml
add_action('wp_ajax_ajax_import_dump', 'ajax_import_dump');
if (!function_exists('ajax_import_dump')) {
    function ajax_import_dump()
    {
        if (!defined('WP_LOAD_IMPORTERS')) {
            define('WP_LOAD_IMPORTERS', true);
        }

        require_once(TEMPLATEPATH . '/core/xml-importer/importer.php');

        try {
            ob_start();
            $importer = new WP_Import();
            $importer->import(TEMPLATEPATH . '/core/xml-importer/import.xml');
            ob_clean();
        } catch (Exception $e) {
            die(json_encode(array(
                'message' => $e->getMessage()
            )));
        }
        die(json_encode(array(
            'message' => 'Data was imported successfully'
        )));
    }
}


#Compile ShortcodesUI and push it
add_action('wp_ajax_getshortcodesUI', 'prefix_ajax_getshortcodesUI');
function prefix_ajax_getshortcodesUI()
{

    global $shortcodesUI;

    echo "<div class='select_shortcode_cont'>Select shortcode: <select name='select_shortcode' class='select_shortcode'>";
    if (is_array($shortcodesUI)) {
        foreach ($shortcodesUI as $array) {
            echo "

                <option value='" . $array['name'] . "'>" . $array['name'] . "</option>

            ";
        }
    }
    echo "</select></div>";

    if (is_array($shortcodesUI)) {
        foreach ($shortcodesUI as $array) {
            echo "
            <div shortcodename='" . $array['name'] . "' class='shortcodeitem " . $array['name'] . "'>
                <div class='handler_body'>" . $array['handler'] . "</div>
                <button class='insertshortcode button button-primary button-small'>Insert</button>
            </div>
            ";
        }
    }
    ?>

<script>
    jQuery('.shortcodeitem:first').show();
</script>

<?php

    die();
}


#Get last slide ID
add_action('wp_ajax_get_unused_id_ajax', 'get_unused_id_ajax');
if (!function_exists('get_unused_id_ajax')) {
    function get_unused_id_ajax()
    {
        $lastid = get_theme_option("last_slide_id");
        if ($lastid < 3) {
            $lastid = 2;
        }
        $lastid++;

        echo $lastid;

        update_theme_option("last_slide_id", $lastid);

        die();
    }
}



#Send feedback

#CAPTCHA
function get_theme_captcha()
{
    if (!isset($_SESSION['theme_captcha'])) {
        $_SESSION['theme_captcha'] = mt_rand(0, 9);
    }
    $compile['first'] = mt_rand(0,$_SESSION['theme_captcha']);
    $compile['second'] = $_SESSION['theme_captcha'] - $compile['first'];
    $compile['summ'] = $_SESSION['theme_captcha'];
    return $compile;
}

#GET NEW CAPTCHA
if (get_theme_option("captcha_status") == "enabled") {
    add_action('wp_ajax_get_new_captcha', 'get_new_captcha');
    add_action('wp_ajax_nopriv_get_new_captcha', 'get_new_captcha');
    if (!function_exists('get_new_captcha')) {
        function get_new_captcha()
        {
            $_SESSION['theme_captcha'] = mt_rand(0, 9);
            $compile['first'] = mt_rand(0,$_SESSION['theme_captcha']);
            $compile['second'] = $_SESSION['theme_captcha'] - $compile['first'];
            $compile['summ'] = $_SESSION['theme_captcha'];
            echo $compile['first']."+".$compile['second']."=";
            die();
        }
    }
}
#END CAPTCHA

add_action('wp_ajax_send_feedback', 'send_feedback');
add_action('wp_ajax_nopriv_send_feedback', 'send_feedback');
if (!function_exists('send_feedback')) {
    function send_feedback()
    {

        $sendername = esc_html($_POST['name']);
        $senderemail = esc_html($_POST['email']);
        $subjectmessage = esc_html($_POST['subject']);
        $sendermessage = esc_html($_POST['message']);
        $subject = esc_html($_POST['subject']);

        if (get_theme_option("captcha_status") == "enabled") {
            $captcha = $_POST['captcha'];
            if ((int)$captcha !== (int)$_SESSION['theme_captcha']) {
                echo "<span class='ajax_activity red'>" . get_text("wrong_captcha") . "</span>";
                die();
            }
        }

        if ($sendername == "" || $senderemail == "" || $sendermessage == "" || $sendername == ((get_theme_option("translator_status") == "enable") ? get_text("translator_feedback_form_name") : __('Name *','theme_localization')) || $senderemail == ((get_theme_option("translator_status") == "enable") ? get_text("translator_feedback_form_email") : __('Email *','theme_localization')) || $sendermessage == ((get_theme_option("translator_status") == "enable") ? get_text("translator_feedback_form_message") : __('Message *','theme_localization'))) {
            echo "<span class='ajax_activity red'>" . ((get_theme_option("translator_status") == "enable") ? get_text("fill_the_required_field") : __('Please fill the required field.','theme_localization')) . "</span>";
            die();
        }

        if (!filter_var($senderemail, FILTER_VALIDATE_EMAIL)) {
            echo "<span class='ajax_activity red'>" . ((get_theme_option("translator_status") == "enable") ? get_text("fill_the_required_field") : __('Please fill the required field.','theme_localization')) . "</span>";
            die();
        }

        sendFeedback($senderemail, $sendermessage, $sendername, $subjectmessage);
        echo "<span class='ajax_activity green'>" . ((get_theme_option("translator_status") == "enable") ? get_text("contacts_thanx") : __('Thank you! Your message has been sent.','theme_localization')) . "</span>";
        die();
    }
}


#Load portfolio works
add_action('wp_ajax_get_portfolio_works', 'get_portfolio_works');
add_action('wp_ajax_nopriv_get_portfolio_works', 'get_portfolio_works');
if (!function_exists('get_portfolio_works')) {
    function get_portfolio_works()
    {

        $html_template = $_POST['html_template'];
        $now_open_works = $_POST['now_open_works'];
        $works_per_load = $_POST['works_per_load'];
        $category = ($_POST['category']!=="all" ? $_POST['category'] : '');

        $temp = (isset($wp_query) ? $wp_query : '');
        $wp_query = null;
        $wp_query = new WP_Query();
        $args = array(
            'post_type' => 'port',
            'order' => 'DESC',
            'offset' => $now_open_works,
            'posts_per_page' => $works_per_load,
        );

        if (strlen($category)>0) {
            $args['tax_query']=array(
                array(
                    'taxonomy' => 'portcat',
                    'field' => 'slug',
                    'terms' => $category
                )
            );
        }


        $wp_query->query($args);

        $i = 1;

        while ($wp_query->have_posts()) : $wp_query->the_post();

            $pf = get_post_format();
            if (empty($pf)) $pf = "text";
            $pfIcon = get_pf_icon($pf);
            $pagebuilder = get_theme_pagebuilder(get_the_ID());

            /*$portslides = get_post_meta(get_the_id(), "portslides", true);
            $format_service_type = get_post_meta(get_the_id(), "format_service_type", true);
            $featuredvideo = get_post_meta(get_the_id(), "featuredvideo", true);*/

            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'single-post-thumbnail');
            if (strlen($featured_image[0]) < 1) {
                $featured_image[0] = IMGURL . "/core/your_image_goes_here.jpg";
            }

            if (isset($pagebuilder['settings']['external_link']) && strlen($pagebuilder['settings']['external_link'])>0) {
                $linkToTheWork = $pagebuilder['settings']['external_link'];
                $target = "target='_blank'";
            } else {
                $linkToTheWork = get_permalink();
                $target = "";
            }

            if (isset($pagebuilder['settings']['time_spent']) && strlen($pagebuilder['settings']['time_spent'])>0) {
                $time_spent_value = $pagebuilder['settings']['time_spent'];
                $time_spent_html = '<div class="portfolio_descr_time">'.((get_theme_option("translator_status") == "enable") ? get_text("translator_time_spent") : __('Time spent','theme_localization')).': <span>'.$time_spent_value.'</span></div>';
            } else {
                $time_spent_value = '';
                $time_spent_html = '';
            }

            if (!isset($echoallterm)) {$echoallterm = '';}
            $new_term_list = get_the_terms(get_the_id(), "portcat");
            if (is_array($new_term_list)) {
                foreach ($new_term_list as $term) {
                    $tempname = strtr($term->name, array(
                        ' ' => '-',
                    ));
                    $echoallterm .= strtolower($tempname) . " ";
                    $echoterm = $term->name;
                }
            }


            #Portfolio 1
            if ($html_template == "1 column") {

                echo '
                <div data-category="' . $echoallterm . '" class="' . $echoallterm . ' element row-fluid">
                    <div class="filter_img span6">
                        <a '.$target.' href="' . $linkToTheWork . '">
                            <img src="' . aq_resize($featured_image[0], "570", "340", true) . '" alt="">
                        </a>
                    </div>
                    <div class="portfolio_dscr span6">
                        <div class="bg_title">
                            <h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>
                        </div>
                        ' . do_shortcode(get_the_content(((get_theme_option("translator_status") == "enable") ? get_text("read_more_link") : __('Read more!','theme_localization')))) . '
                    </div>
                </div>
                ';
            }
            #END Portfolio 1


            #Portfolio 2
            if ($html_template == "2 columns") {


                /*
                <img src="' . aq_resize($featured_image[0], "570", "284", true) . '" alt="' . get_the_title() . '" width="570" height="284">
                <div class="portfolio_info_wrapper">
                    <span class="post_type post_type_'.$pf.'"></span>
                    <h5><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>
                    <div class="portfolio_descr_info">
                        <div class="portfolio_descr_url">'.((get_theme_option("translator_status") == "enable") ? get_text("project_url") : __('Project URL','theme_localization')).': <a '.$target.' href="' . $linkToTheWork . '">'.((get_theme_option("translator_status") == "enable") ? get_text("view_project") : __('View Project','theme_localization')).'</a></div>
                        '.$time_spent_html.'
                    </div>
                    <div class="portfolio_descr_in">In ';

                    $terms = get_the_terms( get_the_ID(), 'portcat' );
                    if ( $terms && ! is_wp_error( $terms ) ) {
                        $draught_links = array();
                        foreach ( $terms as $term ) {
                            $draught_links[] = '<a href="'.get_term_link($term->slug, "portcat").'">'.$term->name.'</a>';
                        }
                        $on_draught = join( ", ", $draught_links );
                        $show_cat = true;
                    }

                    echo $on_draught;

echo '                      </div>
                </div>
                <div class="portfolio_dscr">
                    '. smarty_modifier_truncate(get_the_excerpt(), 160) .'
                </div>
                */

                echo '
                <div data-category="' . $echoallterm . '" class="' . $echoallterm . ' element">
                    <div class="filter_img">
                        <a href="' . get_permalink() . '">
                            <div class="view view-tenth portfolio_item">
                                <img src="' . aq_resize($featured_image[0], "570", "440", true) . '" alt="">
                                <div class="mask">
                                    <div class="portfolio_descr">
                                        <h2>' . get_the_title() . '</h2>
                                        <p>'. smarty_modifier_truncate(get_the_excerpt(), 460) .'</p>                                                        </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                ';

            }
            #END Portfolio 2


            #Portfolio 3
            if ($html_template == "3 columns") {

                echo '
                <div data-category="' . $echoallterm . '" class="' . $echoallterm . ' element">
                    <div class="filter_img">
                        <a href="' . get_permalink() . '">
                            <div class="view view-tenth portfolio_item">
                                <img src="' . aq_resize($featured_image[0], "570", "440", true) . '" alt="">
                                <div class="mask">
                                    <div class="portfolio_descr">
                                        <h2>' . get_the_title() . '</h2>
                                        <p>'. smarty_modifier_truncate(get_the_excerpt(), 360) .'</p>                                                        </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                ';

            }
            #END Portfolio 3


            #Portfolio 4
            if ($html_template == "4 columns") {

                echo '
                    <div data-category="' . $echoallterm . '" class="' . $echoallterm . ' element">
                    <div class="filter_img">
                        <a href="' . get_permalink() . '">
                            <div class="view view-tenth portfolio_item">
                                <img src="' . aq_resize($featured_image[0], "570", "440", true) . '" alt="">
                                <div class="mask">
                                    <div class="portfolio_descr">
                                        <h2>' . get_the_title() . '</h2>
                                        <p>'. smarty_modifier_truncate(get_the_excerpt(), 150) .'</p>                                                        </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                ';

            }
            #END Portfolio 4

            $i++;
            unset($echoallterm, $pf);
            endwhile;

            die();
        }
    }

?>