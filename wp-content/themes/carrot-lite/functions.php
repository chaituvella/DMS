<?php


if ( ! isset( $content_width ) )
$content_width = 780;


add_action('after_setup_theme', 'carrotlite_setup');

function carrotlite_setup() {
    add_editor_style();
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5');
    add_theme_support('custom-background');

    set_post_thumbnail_size(780, 520, true); // Default size
    add_image_size('grid', 400, 300, true);

    load_theme_textdomain('carrotlite', get_template_directory() . '/languages'); 

    register_nav_menus(
        array(
          'primary' => __('Main menu', 'carrotlite'),
          'secondary' => __('Footer menu', 'carrotlite')
        )
    );
}

function carrotlite_widgets() {
    register_sidebar(array(
        'name' => __( 'Sidebar', 'carrotlite'),
        'id' => 'sidebar-widget-area',
        'description' => __( 'Sidebar widget area', 'carrotlite'),
        'before_widget' => '<article class="widget">',
        'after_widget' => '</article>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>'
    ));
    register_sidebar(array(
        'name' => __( 'Footer', 'carrotlite'),
        'id' => 'footer-widget-area',
        'description' => __( 'Footer widget area', 'carrotlite'),
        'before_widget' => '<article class="widget col col3">',
        'after_widget' => '</article>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>'
    ));
}

add_action ('widgets_init', 'carrotlite_widgets' );


add_filter('the_title', 'carrotlite_title');
function carrotlite_title($title) {
    if ($title == '') {
        return 'Untitled';
    } else {
        return $title;
    }
} 

function carrotlite_scripts() {
    wp_register_style( 'fontUbuntu', 'http://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700,700italic&subset=latin,latin-ext');
    wp_register_style( 'fontOpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic&subset=latin,latin-ext');
    wp_enqueue_style('fontUbuntu');
    wp_enqueue_style('fontOpenSans');

    wp_register_script('basic', get_template_directory_uri().'/js/script.js', array('jquery'), 1, true);
    wp_enqueue_script('basic');
    global $is_IE;
    if ( $is_IE ) {
        wp_enqueue_script('html5', get_template_directory_uri() . '/js/html5.js');
    }
}
add_action( 'wp_enqueue_scripts', 'carrotlite_scripts');

function carrotlite_filter_wp_title( $title ) {
    global $page, $paged;

    $site_name = get_bloginfo( 'name' );
    $filtered_title = $title .' | '. $site_name;

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ){
        $filtered_title = $site_name .' | '.$site_description;
    }

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 ) $filtered_title .= ' | ' . sprintf( __( 'Page %s', 'blog'), max( $paged, $page ) );
    // Return the modified title
    return $filtered_title;
}
add_filter( 'wp_title', 'carrotlite_filter_wp_title' ); 

add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));

remove_action("wp_head", "wp_generator");
remove_action("wp_head", "rsd_link");
remove_action("wp_head", "wlwmanifest_link");

function xmlrpc_methods_filter( $methods ) {
    unset( $methods['pingback.ping'] );
    return $methods;
}
add_filter( 'xmlrpc_methods',  'xmlrpc_methods_filter');

add_shortcode('gallery', 'carrotlite_gallery_shortcode');    
function carrotlite_gallery_shortcode($attr) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) )
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $icontag = tag_escape($icontag);
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) )
        $itemtag = 'dl';
    if ( ! isset( $valid_tags[ $captiontag ] ) )
        $captiontag = 'dd';
    if ( ! isset( $valid_tags[ $icontag ] ) )
        $icontag = 'dt';

    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';

    $size_class = sanitize_html_class( $size );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        if('file' == $attr['link']) $file_link = 'file-link';
        else $file_link = '';
        
        $output .= "<{$itemtag} class='gallery-item {$file_link}'>";
        $output .= "
            <{$icontag} class='gallery-icon'>
                $link
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';
    }

    $output .= "
            <br style='clear: both;' />
        </div>\n";

    return $output;
}

function carrotlite_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);
?>
        <li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <div id="div-comment-<?php comment_ID() ?>">
        <div class="comment-author vcard">
            <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>  
            <cite class="fn"><?php echo get_comment_author_link() ?></cite>
            <p class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php echo get_comment_date(); __('at', 'carrotlite') ?> <?php echo get_comment_time() ?></a> | <i class="fa fa-comments"></i> <?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
            
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'carrotlite') ?></p>
        <?php endif; ?>
        <div class="comment-body"><?php comment_text() ?></div>
        </div>
<?php
}

function carrotlite_comment_form_args() {
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
        'author' => '<p><label for="author">'.__( 'Name', 'carrotlite' ).( $req ? ' <span class="required">*</span>' : '' ).'</label><input id="author" name="author"'. $aria_req . ' type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"></p>',
        'email' => '<p><label for="email">' . __( 'Email', 'carrotlite' ) .( $req ? ' <span class="required">*</span>' : '' ). '</label><input id="email" name="email"' . $aria_req . ' type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'"></p>',
        'url' => '<p><label for="url">' . __( 'Website', 'carrotlite' ) . '</label><input id="url" name="url"' . $aria_req . ' type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'"></p>'
    );

    $comment_field = '<p><label for="comment">' . __( 'Comment', 'carrotlite' ) . '</label><textarea name="comment" id="comment" rows="8" cols="50"></textarea></p>';
    return array('fields' => $fields, 'comment_field' => $comment_field, 'label_submit' => __('Post this!', 'carrotlite'));
}
?>
