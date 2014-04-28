<?php

$tabs = new Tabs();

$tabs->add(new Tab(array(
    'name' => 'General',
    'desc' => '',
    'icon' => 'general.png',
    'icon_active' => 'general_active.png',
    'icon_hover' => 'general_hover.png'
), array(
    new UploadOption(array(
        'name' => 'Header logo',
        'id' => 'logo',
        'desc' => 'Default: 119px x 39px',
        'default' => THEMEROOTURL . '/img/logo.png'
    )),
    new UploadOption(array(
        'name' => 'Logo (Retina)',
        'id' => 'logo_retina',
        'desc' => 'Default: 238px x 78px',
        'default' => THEMEROOTURL . '/img/retina/logo.png'
    )),
    new textOption(array(
        'name' => 'Header logo width',
        'id' => 'header_logo_standart_width',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '119'
    )),
    new textOption(array(
        'name' => 'Header logo height',
        'id' => 'header_logo_standart_height',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '39'
    )),
    /*new UploadOption(array(
        'name' => 'Footer logo',
        'id' => 'logo_footer',
        'desc' => 'Default: 185px x 55px',
        'default' => THEMEROOTURL . '/img/logo_footer.png'
    )),
    new UploadOption(array(
        'name' => 'Footer logo (Retina)',
        'id' => 'footer_logo_retina',
        'desc' => 'Default: 370px x 110px',
        'default' => THEMEROOTURL . '/img/retina/logo_footer.png'
    )),
    new textOption(array(
        'name' => 'Footer logo width',
        'id' => 'footer_logo_standart_width',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '185'
    )),
    new textOption(array(
        'name' => 'Footer logo height',
        'id' => 'footer_logo_standart_height',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '55'
    )),*/
    new UploadOption(array(
        'type' => 'upload',
        'name' => 'Favicon',
        'id' => 'favicon',
        'desc' => 'Icon must be 16x16px or 32x32px',
        'default' => THEMEROOTURL . '/img/favicon.ico'
    )),
    new UploadOption(array(
        'type' => 'upload',
        'name' => 'Apple touch icon (57px)',
        'id' => 'apple_touch_57',
        'desc' => 'Icon must be 57x57px',
        'default' => THEMEROOTURL . '/img/apple_icons_57x57.png'
    )),
    new UploadOption(array(
        'type' => 'upload',
        'name' => 'Apple touch icon (72px)',
        'id' => 'apple_touch_72',
        'desc' => 'Icon must be 72x72px',
        'default' => THEMEROOTURL . '/img/apple_icons_72x72.png'
    )),
    new UploadOption(array(
        'type' => 'upload',
        'name' => 'Apple touch icon (114px)',
        'id' => 'apple_touch_114',
        'desc' => 'Icon must be 114x114px',
        'default' => THEMEROOTURL . '/img/apple_icons_114x114.png'
    )),
    new SelectOption(array(
        'name' => 'Header type',
        'id' => 'header_type',
        'desc' => '',
        'default' => 'type0',
        'options' => array(
            'type0' => 'Default',
            'type1' => 'Type 1',
            'type2' => 'Type 2',
            'type3' => 'Type 3',
            'type4' => 'Type 4'
        )
    )),
    new TextareaOption(array(
        'name' => 'Custom CSS',
        'id' => 'custom_css',
        'default' => ''
    )),
    new TextareaOption(array(
        'name' => 'Google analytics or any other code<br>(before &lt;/head&gt;)',
        'id' => 'code_before_head',
        'default' => ''
    )),
    new TextareaOption(array(
        'name' => 'Any code <br>(before &lt;/body&gt;)',
        'id' => 'code_before_body',
        'default' => ''
    )),
    new textOption(array(
        'name' => 'Latest tweet line',
        'id' => 'footer_tweet_line',
        'not_empty' => false,
        'width' => '150px',
        'textalign' => 'center',
        'default' => 'themedev'
    )),
    new SelectOption(array(
        'name' => 'Related Posts',
        'id' => 'related_posts',
        'desc' => '',
        'default' => 'on',
        'options' => array(
            'on' => 'On',
            'off' => 'Off'
        )
    )),
    new SelectOption(array(
        'name' => 'Footer Widget Area',
        'id' => 'footer_widgets_area',
        'desc' => '',
        'default' => 'on',
        'options' => array(
            'on' => 'On',
            'off' => 'Off'
        )
    )),
    new SelectOption(array(
        'name' => 'Responsive',
        'id' => 'responsive',
        'desc' => '',
        'default' => 'on',
        'options' => array(
            'on' => 'On',
            'off' => 'Off'
        )
    )),
    new SelectOption(array(
        'name' => 'Scrollable menu',
        'id' => 'scrollable_menu',
        'desc' => '',
        'default' => 'on',
        'options' => array(
            'on' => 'On',
            'off' => 'Off'
        )
    )),
    new SelectOption(array(
        'name' => 'Site width',
        'id' => 'site_width',
        'desc' => '',
        'default' => '1170px',
        'options' => array(
            '1170px' => '1170px',
            '960px' => '960px'
        )
    )),
    new AjaxButtonOption(array(
        'title' => 'Import Sample Data',
        'id' => 'action_import',
        'name' => 'Import demo content',
        'confirm' => TRUE,
        'data' => array(
            'action' => 'ajax_import_dump'
        )
    ))
)));


$tabs->add(new Tab(array(
    'name' => 'Sidebars',
    'desc' => '',
    'icon' => 'layout.png',
    'icon_active' => 'layout_active.png',
    'icon_hover' => 'layout_hover.png'
), array(
    new SelectOption(array(
        'name' => 'Default sidebar layout',
        'id' => 'default_sidebar_layout',
        'desc' => '',
        'default' => 'no-sidebar',
        'options' => array(
            'left-sidebar' => 'Left sidebar',
            'right-sidebar' => 'Right sidebar',
            'no-sidebar' => 'Without sidebar'
        )
    )),
    new SidebarManager(array(
        'name' => 'Sidebar manager',
        'id' => 'sidebar_manager',
        'desc' => ''
    ))
)));


$tabs->add(new Tab(array(
    'name' => 'Fonts',
    'desc' => '',
    'icon' => 'fonts.png',
    'icon_active' => 'fonts_active.png',
    'icon_hover' => 'fonts_hover.png'
), array(
    new FontSelector(array(
        'name' => 'Main font',
        'id' => 'additional_font',
        'desc' => '',
        'default' => 'Open Sans',
        'options' => get_fonts_array_only_key_name()
    )),
    new textOption(array(
        'name' => 'Main font parameters',
        'id' => 'google_font_parameters_main_font',
        'not_empty' => true,
        'default' => ':400,600,700,800,400italic,600italic,700italic',
        'width' => '100%',
        'textalign' => 'left',
        'desc' => 'Google font. Click <a href="https://developers.google.com/webfonts/docs/getting_started" target="_blank">here</a> for help.'
    )),
    new FontSelector(array(
        'name' => 'Headers',
        'id' => 'text_headers_font',
        'desc' => '',
        'default' => 'Open Sans',
        'options' => get_fonts_array_only_key_name()
    )),
    new textOption(array(
        'name' => 'Headers font parameters',
        'id' => 'google_font_parameters_headers_font',
        'not_empty' => true,
        'default' => ':400,600,700,800,400italic,600italic,700italic',
        'width' => '100%',
        'textalign' => 'left',
        'desc' => 'Google font. Click <a href="https://developers.google.com/webfonts/docs/getting_started" target="_blank">here</a> for help.'
    )),
    new FontSelector(array(
        'name' => 'Content',
        'id' => 'main_content_font',
        'desc' => '',
        'default' => 'Arial',
        'options' => get_fonts_array_only_key_name()
    )),
    new textOption(array(
        'name' => 'Content font parameters',
        'id' => 'google_font_parameters_main_content_font',
        'not_empty' => true,
        'default' => ':400,600,700,800,400italic,600italic,700italic',
        'width' => '100%',
        'textalign' => 'left',
        'desc' => 'Google font. Click <a href="https://developers.google.com/webfonts/docs/getting_started" target="_blank">here</a> for help.'
    )),
    new textOption(array(
        'name' => 'H1 font size',
        'id' => 'h1_font_size',
        'not_empty' => true,
        'default' => '24px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption(array(
        'name' => 'H2 font size',
        'id' => 'h2_font_size',
        'not_empty' => true,
        'default' => '21px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption(array(
        'name' => 'H3 font size',
        'id' => 'h3_font_size',
        'not_empty' => true,
        'default' => '19px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption(array(
        'name' => 'H4 font size',
        'id' => 'h4_font_size',
        'not_empty' => true,
        'default' => '16px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption(array(
        'name' => 'H5 font size',
        'id' => 'h5_font_size',
        'not_empty' => true,
        'default' => '16px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption(array(
        'name' => 'H6 font size',
        'id' => 'h6_font_size',
        'not_empty' => true,
        'default' => '14px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption(array(
        'name' => 'Content font size',
        'id' => 'main_content_font_size',
        'not_empty' => true,
        'default' => '13px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption(array(
        'name' => 'Content line height',
        'id' => 'main_content_line_height',
        'not_empty' => true,
        'default' => '18px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
)));


$tabs->add(new Tab(array(
    'name' => 'Socials',
    'icon' => 'social.png',
    'icon_active' => 'social_active.png',
    'icon_hover' => 'social_hover.png'
), array(
    new TextOption(array(
        'name' => 'Facebook',
        'id' => 'social_facebook',
        'default' => 'http://facebook.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'Flickr',
        'id' => 'social_flickr',
        'default' => 'http://flickr.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'Vimeo',
        'id' => 'social_vimeo',
        'default' => 'http://vimeo.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'Pinterest',
        'id' => 'social_pinterest',
        'default' => 'http://pinterest.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'Dribbble',
        'id' => 'social_dribbble',
        'default' => 'http://dribbble.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'LinkedIn',
        'id' => 'social_linked_in',
        'default' => 'http://linkedin.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'Tumblr',
        'id' => 'social_tumblr',
        'default' => 'http://tumblr.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'YouTube',
        'id' => 'social_youtube',
        'default' => 'http://youtube.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'Delicious',
        'id' => 'social_delicious',
        'default' => 'http://delicious.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'Google Plus',
        'id' => 'social_gplus',
        'default' => 'http://google.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'Instagram',
        'id' => 'social_instagram',
        'default' => 'http://instagram.com',
        'desc' => 'Please specify http:// to the URL'
    )),
	new TextOption(array(
        'name' => 'Twitter',
        'id' => 'social_twitter',
        'default' => 'http://twitter.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption(array(
        'name' => 'Twitter Consumer key',
        'id' => 'consumer_key',
        'default' => '',
        'desc' => 'For Twitter widget. Get it <a target="_blank" href="https://dev.twitter.com/apps">here</a>.'
    )),
    new TextOption(array(
        'name' => 'Twitter Consumer secret',
        'id' => 'consumer_secret',
        'default' => '',
        'desc' => 'For Twitter widget. Get it <a target="_blank" href="https://dev.twitter.com/apps">here</a>.'
    )),
    new TextOption(array(
        'name' => 'Twitter User token',
        'id' => 'user_token',
        'default' => '',
        'desc' => 'For Twitter widget. Get it <a target="_blank" href="https://dev.twitter.com/apps">here</a>.'
    )),
    new TextOption(array(
        'name' => 'Twitter User secret',
        'id' => 'user_secret',
        'default' => '',
        'desc' => 'For Twitter widget. Get it <a target="_blank" href="https://dev.twitter.com/apps">here</a>.'
    )),
)));


$tabs->add(new Tab(array(
    'name' => 'Contacts',
    'icon' => 'contacts.png',
    'icon_active' => 'contacts_active.png',
    'icon_hover' => 'contacts_hover.png'
), array(
    new TextOption(array(
        'name' => 'Send mails to',
        'id' => 'contacts_to',
        'default' => get_option("admin_email")
    )),
    /*new SelectOption(array(
        'name'    => 'Captcha',
        'id'      => 'captcha_status',
        'desc'    => '',
        'default' => 'enabled',
        'options' => array(
            'disabled'  => 'Disabled',
            'enabled' => 'Enabled'
        )
    )),
    new TextOption(array(
        'name' => 'Phone number',
        'id' => 'phone',
        'default' => '+1 800 789 50 12'
    )),*/
)));


$tabs->add(new Tab(array(
    'name' => 'View Options',
    'icon' => 'colors.png',
    'icon_active' => 'colors_active.png',
    'icon_hover' => 'colors_hover.png'
), array(
    new ColorOption(array(
        'name' => 'Theme color',
        'id' => 'theme_color1',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '3c64e3'
    )),
    /*new ColorOption(array(
        'name' => 'Theme color 2',
        'id' => 'theme_color2',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'ea497e'
    )),*/
    new SelectOption(array(
        'name' => 'Default theme layout',
        'id' => 'default_theme_layout',
        'desc' => '',
        'default' => 'clean',
        'options' => array(
            'clean' => 'Clean',
            'boxed' => 'Boxed',
            'fullscreen_bg_image' => 'Fullscreen bg image'
        )
    )),
    new ColorOption(array(
        'name' => 'Default background color',
        'id' => 'default_bg_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'A8A8A8'
    )),
    /*new ColorOption(array(
        'name' => 'Header background color',
        'id' => 'header_bg_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '292929'
    )),*/
    new ColorOption(array(
        'name' => 'Header text color',
        'id' => 'header_text_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '666666'
    )),
    /*new ColorOption(array(
        'name' => 'Footer text color',
        'id' => 'footer_text_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '555555'
    )),
    new ColorOption(array(
        'name' => 'Footer line',
        'id' => 'footer_line_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '5E5E5E'
    )),
    new ColorOption(array(
        'name' => 'Footer links color (hover)',
        'id' => 'footer_links_hover_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '838383'
    )),*/
    new UploadOption(array(
        'type' => 'upload',
        'name' => 'Background image',
        'id' => 'bg_img',
        'desc' => '',
        'default' => THEMEROOTURL . '/img/bg_user.jpg'
    )),
    new UploadOption(array(
        'type' => 'upload',
        'name' => 'Background pattern',
        'id' => 'bg_pattern',
        'desc' => '',
        'default' => THEMEROOTURL . '/img/bg_pattern1.png'
    )),
    new SelectOption(array(
        'name' => 'Breadcrumb',
        'id' => 'show_breadcrumb',
        'desc' => '',
        'default' => 'on',
        'options' => array(
            'on' => 'Yes',
            'off' => 'No'
        )
    )),
    /*new ColorOption(array(
        'name' => 'Footer background',
        'id' => 'footer_background_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '3D3D3D'
    )),
    new ColorOption(array(
        'name' => 'Footer text color',
        'id' => 'footer_text_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'FFFFFF'
    )),
    new ColorOption(array(
        'name' => 'Content text color',
        'id' => 'content_text_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '3D3D3D'
    )),*/
)));


/*$tabs->add(new Tab(array(
    'name' => 'Landing Page',
    'icon' => 'landing.png',
    'icon_active' => 'landing_active.png',
    'icon_hover' => 'landing_hover.png'
), array(
    new SelectOption(array(
        'name' => 'Show Landing',
        'id' => 'landing_page',
        'desc' => '',
        'default' => 'off',
        'options' => array(
            'on' => 'Yes',
            'off' => 'No'
        )
    )),
    new SliderSelector(array(
        'name' => 'Landing Slider',
        'id' => 'landing_slider',
        'desc' => 'Please install the LayerSlider that comes with this theme. Then select the created slider to use on the landing page.',
        'default' => ''
    )),
    new TextOption(array(
        'name' => 'Interval',
        'id' => 'landing_interval',
        'default' => '86400',
        'desc' => 'In seconds. 86400 = 1 day.'
    )),
)));*/


/* TRANSLATOR */
$tabs->add(new Tab(array(
    'name' => 'Translator',
    'icon' => 'translator.png',
    'icon_active' => 'translator_active.png',
    'icon_hover' => 'translator_hover.png'
), array(
    new SelectOption(array(
        'name' => 'Custom translator status',
        'id' => 'translator_status',
        'desc' => 'If you want to use .po .mo files, please disable custom translator, otherwise you can use the custom translator below.',
        'default' => 'enable',
        'options' => array(
            'enable' => 'Enable',
            'disable' => 'Disable'
        )
    )),
    new textOption(array(
        'name' => 'Copyright',
        'id' => 'copyright',
        'not_empty' => false,
        'default' => '&copy; 2020 Business Theme. All Rights Reserved.',
        'desc' => 'In footer'
    )),
    new textOption(array(
        'name' => 'Call us',
        'id' => 'call_us',
        'not_empty' => false,
        'default' => 'Call us toll free: ',
        'desc' => ''
    )),
    new textOption(array(
        'name' => 'Slogan',
        'id' => 'translator_top_slogan',
        'not_empty' => false,
        'default' => 'Discover elegant solution for your online business!'
    )),
    new textOption(array(
        'name' => 'Search',
        'id' => 'translator_search_value',
        'not_empty' => false,
        'default' => 'Search the site...'
    )),
    new textOption(array(
        'name' => 'Reply button',
        'id' => 'translator_reply_value',
        'not_empty' => false,
        'desc' => 'Comments',
        'default' => 'Reply'
    )),
    new textOption(array(
        'name' => 'Post Comment',
        'id' => 'post_comment',
        'not_empty' => false,
        'desc' => 'Comments',
        'default' => 'Post Comment'
    )),
    new textOption(array(
        'name' => 'Awaiting moderation',
        'id' => 'translator_awaiting_moder_value',
        'not_empty' => false,
        'desc' => 'Comments',
        'default' => 'Your comment is awaiting moderation.'
    )),
    new textOption(array(
        'name' => 'Clear',
        'id' => 'tranlator_clear',
        'not_empty' => false,
        'desc' => 'In all forms',
        'default' => 'Clear form'
    )),
    new textOption(array(
        'name' => 'Send comment',
        'id' => 'tranlator_send_message',
        'not_empty' => false,
        'desc' => 'In all forms',
        'default' => 'Send comment'
    )),
    new textOption(array(
        'name' => '404 header',
        'id' => 'translator_header_404',
        'not_empty' => false,
        'desc' => 'Error 404 page header',
        'default' => 'Not Found :('
    )),
    new TextareaOption(array(
        'name' => 'Oops',
        'id' => 'translator_oops',
        'not_empty' => false,
        'desc' => 'Error 404 page',
        'default' => 'Oops!'
    )),
    new TextareaOption(array(
        'name' => '404 text',
        'id' => 'translator_text_404',
        'not_empty' => false,
        'desc' => 'Error 404 page text',
        'default' => 'Apologies, but we were unable to find what you were looking for.'
    )),
    new textOption(array(
        'name' => 'Project URL',
        'id' => 'project_url',
        'not_empty' => true,
        'desc' => '',
        'default' => 'Project URL'
    )),
    new textOption(array(
        'name' => 'View Project',
        'id' => 'view_project',
        'not_empty' => true,
        'desc' => '',
        'default' => 'View Project'
    )),
    new textOption(array(
        'name' => 'All items',
        'id' => 'translator_portfolio_all',
        'not_empty' => false,
        'desc' => 'Portfolio page (filter)',
        'default' => 'All'
    )),
    new textOption(array(
        'name' => 'Portfolio',
        'id' => 'translator_portfolio',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Portfolio'
    )),
    new textOption(array(
        'name' => 'Load more button',
        'id' => 'translator_load_more',
        'not_empty' => false,
        'desc' => 'Portfolio page',
        'default' => 'Load more works'
    )),
    new textOption(array(
        'name' => 'Feedback form name',
        'id' => 'translator_feedback_form_name',
        'not_empty' => false,
        'desc' => 'Contact form',
        'default' => 'Name *'
    )),
    new textOption(array(
        'name' => 'Feedback form email',
        'id' => 'translator_feedback_form_email',
        'not_empty' => false,
        'desc' => 'Contact form',
        'default' => 'Email *'
    )),
    new textOption(array(
        'name' => 'Feedback form subject',
        'id' => 'translator_feedback_form_subject',
        'not_empty' => false,
        'desc' => 'Contact form',
        'default' => 'Subject'
    )),
    new textOption(array(
        'name' => 'Feedback form message',
        'id' => 'translator_feedback_form_message',
        'not_empty' => false,
        'desc' => 'Contact form',
        'default' => 'Message *'
    )),
    new TextOption(array(
        'name' => 'Message subject',
        'id' => 'contacts_subject',
        'default' => '[Website] Contact Form'
    )),
    new TextareaOption(array(
        'name' => 'Thank you message',
        'id' => 'contacts_thanx',
        'default' => 'Thank you! Your message has been sent.'
    )),
    new textOption(array(
        'name' => 'Please fill the required field',
        'id' => 'fill_the_required_field',
        'not_empty' => false,
        'desc' => 'Contact page',
        'default' => 'Please fill the required field.'
    )),
    new textOption(array(
        'name' => 'Password protected',
        'id' => 'password_protected',
        'not_empty' => false,
        'desc' => '',
        'default' => 'This post is password protected. Enter the password to view comments.'
    )),
    new textOption(array(
        'name' => 'Leave a Comment!',
        'id' => 'leave_a_comment',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Leave a Comment!'
    )),
    new textOption(array(
        'name' => 'Logged in',
        'id' => 'you_must_logged_in',
        'not_empty' => false,
        'desc' => 'Comments',
        'default' => 'You must be logged in to post a comment.'
    )),
    new textOption(array(
        'name' => 'Logged in as',
        'id' => 'logged_in_as',
        'not_empty' => false,
        'desc' => 'Comments',
        'default' => 'Logged in as'
    )),
    new textOption(array(
        'name' => 'Log out',
        'id' => 'log_out',
        'not_empty' => false,
        'desc' => 'Comments',
        'default' => 'Log out?'
    )),
    new textOption(array(
        'name' => 'Comment form is closed',
        'id' => 'comment_form_is_closed',
        'not_empty' => false,
        'desc' => 'Comments',
        'default' => 'Sorry, the comment form is closed at this time.'
    )),
    new textOption(array(
        'name' => 'Comments',
        'id' => 'comments_number',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Comments'
    )),
    new textOption(array(
        'name' => 'Posted by',
        'id' => 'posted_by',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Posted by'
    )),
    new textOption(array(
        'name' => 'Read more',
        'id' => 'read_more_link',
        'not_empty' => false,
        'desc' => 'All pages',
        'default' => 'Read more!'
    )),
    new textOption(array(
        'name' => 'Tags',
        'id' => 'tags_caption',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Tags: '
    )),
    new textOption(array(
        'name' => 'Name',
        'id' => 'comment_form_name',
        'not_empty' => false,
        'desc' => 'Comment form',
        'default' => 'Name *'
    )),
    new textOption(array(
        'name' => 'Email',
        'id' => 'comment_form_email',
        'not_empty' => false,
        'desc' => 'Comment form',
        'default' => 'Email *'
    )),
    new textOption(array(
        'name' => 'URL',
        'id' => 'comment_form_url',
        'not_empty' => false,
        'desc' => 'Comment form',
        'default' => 'URL'
    )),
    new textOption(array(
        'name' => 'Message',
        'id' => 'comment_form_message',
        'not_empty' => false,
        'desc' => 'Comment form',
        'default' => 'Message...'
    )),
    new textOption(array(
        'name' => 'Back button',
        'id' => 'back_button',
        'not_empty' => false,
        'desc' => 'Portfolio page',
        'default' => 'Back'
    )),
    new textOption(array(
        'name' => 'Pages',
        'id' => 'translate_pages',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Pages'
    )),
    new textOption(array(
        'name' => 'Site Feeds',
        'id' => 'translator_site_feeds',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Site Feeds'
    )),
    new textOption(array(
        'name' => 'Main RSS Feed',
        'id' => 'translator_main_rss_feed',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Main RSS Feed'
    )),
    new textOption(array(
        'name' => 'Comments RSS Feed',
        'id' => 'translator_comment_rss_feed',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Comments RSS Feed'
    )),
    new textOption(array(
        'name' => 'Pages',
        'id' => 'translator_pages',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Pages'
    )),
    new textOption(array(
        'name' => 'Posts',
        'id' => 'translator_posts',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Posts'
    )),
    new textOption(array(
        'name' => 'Time spent',
        'id' => 'translator_time_spent',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Time spent'
    )),
    new textOption(array(
        'name' => 'Skills Needed',
        'id' => 'translator_skills_needed',
        'not_empty' => false,
        'desc' => '',
        'default' => 'Skills Needed'
    )),
    new textOption(array(
        'name' => 'Related Projects',
        'id' => 'translate_related_projects',
        'not_empty' => true,
        'desc' => '',
        'default' => 'Related Projects'
    )),
    new textOption(array(
        'name' => 'Related Posts',
        'id' => 'translate_related_posts',
        'not_empty' => true,
        'desc' => '',
        'default' => 'Related Posts'
    )),
    new textOption(array(
        'name' => 'Home',
        'id' => 'translate_home',
        'not_empty' => true,
        'desc' => '',
        'default' => 'Home'
    )),
)));

?>