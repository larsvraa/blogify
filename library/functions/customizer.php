<?php
/**
 * Add block to WordPress theme customizer
 * @package blogify
 */

 

function blogify_options_register_theme_customizer($wp_customize)
{
    

    global $blogify_theme_options_settings, $blogify_theme_options_defaults;
    $options = get_option('blogify_theme_options'); 

    /******************** Panels ******************************************/
    /*  */
    $wp_customize->add_panel('blogify_main_options', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Main Options', 'blogify'),
        'description' => __('Panel to update blogify theme options', 'blogify'), // Include html tags such as <p>.
        'priority' => 10 // Mixed with top-level-section hierarchy.
    ));


    $wp_customize->add_panel('blogify_slider_options', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Featured Slider', 'blogify'),
        'description' => __('Panel to update blogify theme options', 'blogify'), // Include html tags such as <p>.
        'priority' => 15 // Mixed with top-level-section hierarchy.
    ));

    $wp_customize->add_panel('blogify_front_page_options', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Front page options', 'blogify'),
        'description' => __('Panel to update theme options related to the front page', 'blogify'), // Include html tags such as <p>.
        'priority' => 15 // Mixed with top-level-section hierarchy.
    ));
    /******************** Header Area ******************************************/
    /*   */
    $wp_customize->add_section('blogify_menu_options', array(
        'title' => __('Header Area', 'blogify'),
        'description' => sprintf(__('Use the following settings change color for menu and website title', 'blogify')),
        'priority' => 31,
        'panel' => 'blogify_main_options'
    ));
        $wp_customize->add_setting('blogify_logo_color', array(
            'default' => '#3c8dc5',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_logo_color', array(
            'label' => __('Website Title Color', 'blogify'),
            'section' => 'blogify_menu_options',
            'settings' => 'blogify_logo_color',
            'priority' => 1
        )));

        $wp_customize->add_setting('blogify_logo_hover_color', array(
            'default' => '#6fb7e9',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_logo_hover_color', array(
            'label' => __('Website Title Hover Color', 'blogify'),
            'section' => 'blogify_menu_options',
            'settings' => 'blogify_logo_hover_color',
            'priority' => 2
        )));

        $wp_customize->add_setting('blogify_menu_color', array(
            'default' => '#3c8dc5',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_menu_color', array(
            'label' => __('Menu Bar Color', 'blogify'),
            'section' => 'blogify_menu_options',
            'settings' => 'blogify_menu_color'
        )));

        $wp_customize->add_setting('blogify_menu_hover_color', array(
            'default' => '#6fb7e9',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_menu_hover_color', array(
            'label' => __('Menu Bar Hover Color', 'blogify'),
            'section' => 'blogify_menu_options',
            'settings' => 'blogify_menu_hover_color'
        )));

        $wp_customize->add_setting('blogify_menu_item_color', array(
            'default' => '#FFF',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_menu_item_color', array(
            'label' => __('Menu Item Text Color', 'blogify'),
            'section' => 'blogify_menu_options',
            'settings' => 'blogify_menu_item_color',
            'priority' => 3
        )));

        $wp_customize->add_setting('blogify_social_color', array(
            'default' => '#D0D0D0',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_social_color', array(
            'label' => __('Social Icon Color', 'blogify'),
            'section' => 'blogify_menu_options',
            'settings' => 'blogify_social_color',
            'priority' => 13
        )));
    /******************** Element Color ******************************************/
    /*   */
    $wp_customize->add_section('blogify_element_options', array(
        'title' => __('Element Color', 'blogify'),
        'description' => sprintf(__('Use the following settings change color for website elements', 'blogify')),
        'priority' => 32,
        'panel' => 'blogify_main_options'
    ));
        $wp_customize->add_setting('blogify_element_color', array(
            'default' => '#3c8dc5',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_element_color', array(
            'label' => __('Element Color', 'blogify'),
            'section' => 'blogify_element_options',
            'settings' => 'blogify_element_color',
            'priority' => 4
        )));

        $wp_customize->add_setting('blogify_element_hover_color', array(
            'default' => '#6fb7e9',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_element_hover_color', array(
            'label' => __('Element Hover Color', 'blogify'),
            'section' => 'blogify_element_options',
            'settings' => 'blogify_element_hover_color',
            'priority' => 5
        )));

        $wp_customize->add_setting('blogify_wrapper_color', array(
            'default' => '#F8F8F8',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_wrapper_color', array(
            'label' => __('Wrapper Color', 'blogify'),
            'section' => 'blogify_element_options',
            'settings' => 'blogify_wrapper_color',
            'priority' => 6
        )));

        $wp_customize->add_setting('blogify_content_bg_color', array(
            'default' => '#FFF',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_content_bg_color', array(
            'label' => __('Content Background Color', 'blogify'),
            'section' => 'blogify_element_options',
            'settings' => 'blogify_content_bg_color',
            'priority' => 7
        )));
    /******************** Typography Color ******************************************/
    /*  */
    $wp_customize->add_section('blogify_typography_options', array(
        'title' => __('Typography Color', 'blogify'),
        'description' => sprintf(__('Use the following settings change color for typography such as links, headings and content', 'blogify')),
        'priority' => 33,
        'panel' => 'blogify_main_options'
    ));
        $wp_customize->add_setting('blogify_entry_color', array(
            'default' => '#444',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_entry_color', array(
            'label' => __('Entry Content Color', 'blogify'),
            'section' => 'blogify_typography_options',
            'settings' => 'blogify_entry_color'
        )));

        $wp_customize->add_setting('blogify_header_color', array(
            'default' => '#444',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_header_color', array(
            'label' => __('Header/Title Color', 'blogify'),
            'section' => 'blogify_typography_options',
            'settings' => 'blogify_header_color',
            'priority' => 8
        )));

        $wp_customize->add_setting('blogify_link_color', array(
            'default' => '#3c8dc5',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_link_color', array(
            'label' => __('Link Color', 'blogify'),
            'section' => 'blogify_typography_options',
            'settings' => 'blogify_link_color',
            'priority' => 11
        )));

        $wp_customize->add_setting('blogify_link_hover_color', array(
            'default' => '#6fb7e9',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify_link_hover_color', array(
            'label' => __('Link Hover Color', 'blogify'),
            'section' => 'blogify_typography_options',
            'settings' => 'blogify_link_hover_color',
            'priority' => 12
        )));
    /******************** Footer Section ******************************************/
    /*   */
    $wp_customize->add_section('blogify_footer_options', array(
        'title' => __('Footer', 'blogify'),
        'description' => sprintf(__('Use the following settings customize Footer', 'blogify')),
        'priority' => 34,
        'panel' => 'blogify_main_options'
    ));
        $wp_customize->add_setting('blogify_footer_textbox', array(
            'default' => 'Default footer text',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control('blogify_footer_textbox', array(
            'label' => __('Copyright text', 'blogify'),
            'section' => 'blogify_footer_options',
            'type' => 'text'
        ));
    /********************  Header Options ******************************************/
    /*  */
    $wp_customize->add_section('blogify_header_options', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Header Options', 'blogify'),
        'description' => __('Section to update theme options for header', 'blogify'),
        'panel' => 'blogify_main_options'
    ));
        $wp_customize->add_setting('blogify_theme_options[header_logo]', array(
            'default' => $blogify_theme_options_defaults['header_logo'],
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'blogify_theme_options[header_logo]', array(
            'label' => __('Header Logo', 'blogify'),
            'section' => 'blogify_header_options',
            'mime_type' => 'image',
            'settings' => 'blogify_theme_options[header_logo]'
        )));

        $wp_customize->add_setting('blogify_theme_options[header_show]', array(
            'default' => $blogify_theme_options_defaults['header_show'],
            'type' => 'option',
            'sanitize_callback' => 'blogify_sanitize_radio_header'
        ));
        $wp_customize->add_control('blogify_theme_options[header_show]', array(
            'type' => 'radio',
            'label' => __('Show', 'blogify'),
            'section' => 'blogify_header_options',
            'choices' => array(
                'header-logo' => __('Header Logo Only', 'blogify'),
                'header-text' => __('Header Text Only', 'blogify'),
                'disable-both' => __('Disable', 'blogify')
            )
        ));
    /********************  Layout Options ******************************************/
    /*  */
    $wp_customize->add_section('blogify_layout_options', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Layout Options', 'blogify'),
        'panel' => 'blogify_main_options'
    ));
        $wp_customize->add_setting('blogify_theme_options[default_layout]', array(
            'default' => $blogify_theme_options_defaults['default_layout'],
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'blogify_sanitize_radio_layout'
        ));
        $wp_customize->add_control(new blogify_Layout_Picker_Custom_Control($wp_customize, 'blogify_theme_options[default_layout]', array(
            'description' => __('This will set the default layout style. However, you can choose different layout for each page via editor', 'blogify'),
            'section' => 'blogify_layout_options',
            'type' => 'radio-image',
            'settings' => 'blogify_theme_options[default_layout]',
            'choices' => array(
                'no-sidebar' => __('No Sidebar', 'blogify'),
                'no-sidebar-full-width' => __('No Sidebar, Full Width', 'blogify'),
                'no-sidebar-one-column' => __('No Sidebar, One Column', 'blogify'),
                'left-sidebar' => __('Left Sidebar', 'blogify'),
                'right-sidebar' => __('Right Sidebar', 'blogify')
            )
        )));

        $wp_customize->add_setting('blogify_theme_options[reset_layout]', array(
            'default' => $blogify_theme_options_defaults['reset_layout'],
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'sanitize_callback' => 'blogify_sanitize_checkbox'
        ));
        $wp_customize->add_control('blogify_theme_options[reset_layout]', array(
            'label' => __('Check to reset Layout', 'blogify'),
            'section' => 'blogify_layout_options',
            'type' => 'checkbox',
            'settings' => 'blogify_theme_options[reset_layout]'
        ));
    /********************  RSS URL ******************************************/
    /* */
    $wp_customize->add_section('blogify_rss_options', array(
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('RSS URL', 'blogify'),
        'description' => __('Enter your preferred RSS URL. (Feedburner or other)', 'blogify'),
        'panel' => 'blogify_main_options'
    ));
        $wp_customize->add_setting('blogify_theme_options[feed_url]', array(
            'default' => $blogify_theme_options_defaults['feed_url'],
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('blogify_theme_options[feed_url]', array(
            'label' => __('Feed Redirect URL', 'blogify'),
            'section' => 'blogify_rss_options'
        ));

    /* Homepage Post Options */
    $wp_customize->add_section('blogify_homepage_post_options', array(
        'priority' => 60,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Homepage Post Options', 'blogify'),
        'panel' => 'blogify_main_options'
    ));
        $wp_customize->add_setting('blogify_theme_options[front_page_category]', array(
            'default' => $blogify_theme_options_defaults['front_page_category'],
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'transport' => 'postMessage',
            'sanitize_callback' => 'blogify_sanitize_multiselect'
        ));
        $wp_customize->add_control(new tavelify_Customize_Control_Multi_Select_Category($wp_customize, 'blogify_theme_options[front_page_category]', array(
            'description' => __('You may select multiple categories by holding down the CTRL (Windows) or cmd (Mac).', 'blogify'),
            'section' => 'blogify_homepage_post_options',
            'priority' => 10,
            'type' => 'multi-select-cat'
        )));
    /******************** Home Slogan Options ******************************************/

        $wp_customize->add_section('blogify_action_options', array(
            'title' => __('Action Button', 'blogify'),
            'priority' => 31,
            'panel' => 'blogify_front_page_options'
        ));
        $wp_customize->add_setting('blogify[w2f_cfa_text]', array(
            'default' => '',
            'type' => 'option',
            'sanitize_callback' => 'blogify_sanitize_strip_slashes'
        ));
        $wp_customize->add_control('blogify[w2f_cfa_text]', array(
            'label' => __('Call For Action Text', 'blogify'),
            'description' => sprintf(__('Enter the text for call for action section', 'blogify')),
            'section' => 'blogify_action_options',
            'type' => 'textarea'
        ));

        $wp_customize->add_setting('blogify[w2f_cfa_button]', array(
            'default' => '',
            'type' => 'option',
            'sanitize_callback' => 'blogify_sanitize_nohtml'
        ));
        $wp_customize->add_control('blogify[w2f_cfa_button]', array(
            'label' => __('Call For Action Button Title', 'blogify'),
            'section' => 'blogify_action_options',
            'description' => __('Enter the title for Call For Action button', 'blogify'),
            'type' => 'text'
        ));

        $wp_customize->add_setting('blogify[w2f_cfa_link]', array(
            'default' => '',
            'type' => 'option',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('blogify[w2f_cfa_link]', array(
            'label' => __('CFA button link', 'blogify'),
            'section' => 'blogify_action_options',
            'description' => __('Enter the link for Call For Action button', 'blogify'),
            'type' => 'text'
        ));

        $wp_customize->add_setting('blogify[cfa_color]', array(
            'default' => '',
            'type'  => 'option',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify[cfa_color]', array(
            'label' => __('Call For Action Text Color', 'blogify'),
            'description'   => __('Default used if no color is selected','blogify'),
            'section' => 'blogify_action_options',
        )));
        $wp_customize->add_setting('blogify[cfa_bg_color]', array(
            'default' => '',
            'type'  => 'option',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify[cfa_bg_color]', array(
            'label' => __('Call For Action Background Color', 'blogify'),
            'description'   => __('Default used if no color is selected','blogify'),
            'section' => 'blogify_action_options',
        )));
        $wp_customize->add_setting('blogify[cfa_btn_color]', array(
            'default' => '',
            'type'  => 'option',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify[cfa_btn_color]', array(
            'label' => __('Call For Action Button Border Color', 'blogify'),
            'description'   => __('Default used if no color is selected','blogify'),
            'section' => 'blogify_action_options',
        )));
        $wp_customize->add_setting('blogify[cfa_btn_txt_color]', array(
            'default' => '',
            'type'  => 'option',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify[cfa_btn_txt_color]', array(
            'label' => __('Call For Action Button Text Color', 'blogify'),
            'description'   => __('Default used if no color is selected','blogify'),
            'section' => 'blogify_action_options',
        )));            
        $wp_customize->add_setting('blogify[cfa_btn_back_color]', array(
            'default' => '',
            'type'  => 'option',
            'sanitize_callback' => 'blogify_sanitize_hexcolor'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogify[cfa_btn_back_color]', array(
            'label' => __('Call For Action Button Background Color', 'blogify'),
            'description'   => __('Default used if no color is selected','blogify'),
            'section' => 'blogify_action_options',
        )));
    /******************** Featured Slider Settings Panel Options ******************************************/
    /*  */

    $wp_customize->add_section('blogify_post_slider_options', array(
        'priority' => 60,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Featured Post/Page Slider Options', 'blogify'),
        'panel' => 'blogify_slider_options'
    ));
        $wp_customize->add_setting('blogify_theme_options[exclude_slider_post]', array(
            'default' => 0,
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'blogify_sanitize_checkbox'
        ));
        $wp_customize->add_control('blogify_theme_options[exclude_slider_post]', array(
            'label' => __('Check to exclude slider post from Homepage posts', 'blogify'),
            'section' => 'blogify_post_slider_options',
            'type' => 'checkbox',
            'settings' => 'blogify_theme_options[exclude_slider_post]'
        ));

        $wp_customize->add_setting( 'blogify_theme_options[featured_post_slider]', array(
            'default' => $blogify_theme_options_defaults['featured_post_slider'],
            'type'    => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'blogify_sanitize_slider',
            'transport' => 'postMessage'
        ) );
        $wp_customize->add_control(
        new blogify_Featured_Slider_Custom_Control(
        $wp_customize,
            'blogify_theme_options[featured_post_slider]', array(
            'label' => __( 'Number of slides', 'blogify' ),
            'section' => 'blogify_post_slider_options',
            'settings'    => 'blogify_theme_options[featured_post_slider]',
            'type'  => 'featured-slider'
        )
        ));

    $wp_customize->add_section('blogify_slide_effect_options', array(
        'priority' => 60,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Slider Options', 'blogify'),
        'panel' => 'blogify_slider_options'
    ));
        $wp_customize->add_setting('blogify_theme_options[disable_slider]', array(
            'default' => 0,
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'blogify_sanitize_checkbox'
        ));
        $wp_customize->add_control('blogify_theme_options[disable_slider]', array(
            'label' => __('Check to disable Slider', 'blogify'),
            'section' => 'blogify_slide_effect_options',
            'type' => 'checkbox',
            'settings' => 'blogify_theme_options[disable_slider]'
        ));

        $wp_customize->add_setting('blogify_theme_options[transition_effect]', array(
            'default' => '',
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'blogify_sanitize_nohtml'
        ));
        $wp_customize->add_control('blogify_theme_options[transition_effect]', array(
            'label' => __('Transition Effect', 'blogify'),
            'section' => 'blogify_slide_effect_options',
            'type'    => 'select',
            'choices'    => array(
                'fade'          =>  'fade',
                'wipe'          =>  'wipe',
                'scrollUp'      =>  'scrollUp',
                'scrollDown'    =>  'scrollDown',
                'scrollLeft'    =>  'scrollLeft',
                'scrollRight'   =>  'scrollRight',
                'blindX'        =>  'blindX',
                'blindY'        =>  'blindY',
                'blindZ'        =>  'blindZ',
                'cover'         =>  'cover',
                'shuffle'       =>  'shuffle'
            ),
        ));

        $wp_customize->add_setting('blogify_theme_options[transition_delay]', array(
            'default' => '',
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'blogify_sanitize_number'
        ));
        $wp_customize->add_control('blogify_theme_options[transition_delay]', array(
            'label' => __('Transition delay( in second(s) )', 'blogify'),
            'section' => 'blogify_slide_effect_options',
        ));

        $wp_customize->add_setting('blogify_theme_options[transition_duration]', array(
            'default' => '',
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'blogify_sanitize_number'
        ));
        $wp_customize->add_control('blogify_theme_options[transition_duration]', array(
            'label' => __('Transition length (in second(s))', 'blogify'),
            'section' => 'blogify_slide_effect_options',
        ));
    /******************** Social Links Settings Panel ******************************************/
    /*  */
    $wp_customize->add_section('blogify_social_url_options', array(
        'priority' => 17,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Social Links', 'blogify'),
        'description' => __('Enter URLs for your social networks e.g.', 'blogify') . 'https://twitter.com/Invendio'
    ));

        $social_links = array( 'Facebook' => 'social_facebook', 'Twitter' => 'social_twitter', 'Google-Plus' => 'social_googleplus', 'Pinterest' => 'social_pinterest', 'YouTube' => 'social_youtube', 'Vimeo' => 'social_vimeo', 'LinkedIn' => 'social_linkedin', 'Flickr' => 'social_flickr', 'Tumblr' => 'social_tumblr', 'Instagram' => 'social_instagram', 'RSS' => 'social_rss', 'GitHub' => 'social_github' );
        foreach ($social_links as $key => $val) {

            $wp_customize->add_setting('blogify_theme_options[' . $val . ']', array(
                'default' => '',
                'type' => 'option',
                'capability' => 'edit_theme_options',
                'transport' => 'postMessage',
                'sanitize_callback' => 'esc_url_raw'
            ));
            $wp_customize->add_control('blogify_theme_options[' . $val . ']', array(
                'label' => sprintf(__('%s', 'blogify'), $key),
                'section' => 'blogify_social_url_options',
                'settings' => 'blogify_theme_options[' . $val . ']',
                'type' => 'text'
            ));
        }
    /******************** Other options Section ******************************************/
    /*  */
    $wp_customize->add_section('blogify_others_options', array(
        'priority' => 19,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Other Options', 'blogify'),
        'description' => __('Enter your custom CSS styles.', 'blogify')
    ));
        $wp_customize->add_setting('blogify_theme_options[custom_css]', array(
            'default' => '',
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'blogify_sanitize_strip_slashes'
        ));
        $wp_customize->add_control('blogify_theme_options[custom_css]', array(
            'label' => __('This CSS will overwrite the CSS of style.css file.', 'blogify'),
            'section' => 'blogify_others_options',
            'settings' => 'blogify_theme_options[custom_css]',
            'type' => 'textarea'
        ));

    $wp_customize->add_section('blogify_important_links', array(
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Important Links', 'blogify'),
    ));
        $wp_customize->add_setting('blogify_theme_options[imp_links]', array(
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'esc_url_raw'
       ));
        $wp_customize->add_control(
        new blogify_Important_Links(
        $wp_customize,
            'blogify_theme_options[imp_links]', array(
            'section' => 'blogify_important_links',
            'type' => 'blogify-important-links'
        )));

    $wp_customize->get_setting('blogify_menu_color')->transport       = 'postMessage';
    $wp_customize->get_setting('blogify_menu_hover_color')->transport = 'postMessage';
    $wp_customize->get_setting('blogify_entry_color')->transport      = 'postMessage';
    $wp_customize->get_setting('blogify_element_color')->transport    = 'postMessage';
    $wp_customize->get_setting('blogify_logo_color')->transport       = 'postMessage';
    $wp_customize->get_setting('blogify_header_color')->transport     = 'postMessage';
    $wp_customize->get_setting('blogify_wrapper_color')->transport    = 'postMessage';
    $wp_customize->get_setting('blogify_content_bg_color')->transport = 'postMessage';
    $wp_customize->get_setting('blogify_menu_item_color')->transport  = 'postMessage';
    $wp_customize->get_setting('blogify_theme_options[header_logo]')->transport  = 'postMessage';
    $wp_customize->get_setting('blogify_theme_options[header_show]')->transport  = 'postMessage';
    $wp_customize->get_setting('blogify_theme_options[default_layout]')->transport  = 'postMessage';
}

/********************Sanitize the values ******************************************/
function prefix_sanitize_integer( $input ) {
    return $input;
}
 

/**
 * Adds sanitization callback function: colors
 * @package blogify
 */
function blogify_sanitize_hexcolor($color) {
    if ($unhashed = sanitize_hex_color_no_hash($color))
        return '#' . $unhashed;
    return $color;
}

/**
 * Adds sanitization callback function: text
 * @package blogify
 */
function blogify_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}

/**
 * Adds sanitization callback function: Number
 * @package blogify
 */
function blogify_sanitize_number($input) {
    if ( isset( $input ) && is_numeric( $input ) ) {
        return $input;
    }
}

/**
 * Adds sanitization callback function: Strip Slashes
 * @package blogify
 */
function blogify_sanitize_strip_slashes($input) {
    return wp_kses_stripslashes($input);
}

/**
 * Adds sanitization callback function: Nohtml
 * @package blogify
 */
function blogify_sanitize_nohtml($input) {
    return wp_filter_nohtml_kses($input);
}

/**
 * Adds sanitization callback function: Checkbox
 * @package blogify
 */
function blogify_sanitize_checkbox( $input ) {
    $output = ( $input ) ? '1' : false;
    return $output;
}

/**
 * Adds sanitization callback function: Radio Header
 * @package blogify
 */
function blogify_sanitize_radio_header( $input ) {
    $valid = array( 'header-logo' => 'Header Logo Only','header-text' => 'Header Text Only','disable-both' => 'Disable' );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Adds sanitization callback function: Radio Layout
 * @package blogify
 */
function blogify_sanitize_radio_layout( $input ) {
    $valid = array( 'no-sidebar' => 'No Sidebar','no-sidebar-full-width' => 'No Sidebar, Full Width', 'no-sidebar-one-column' => 'No Sidebar, One Column', 'left-sidebar' => 'Left Sidebar', 'right-sidebar' => 'Right Sidebar' ); 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Adds sanitization callback function: Multiselect
 * @package blogify
 */
function blogify_sanitize_multiselect( $values ) {
    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;
    return !empty( $multi_values ) ? array_map( 'blogify_sanitize_text', $multi_values ) : array();
}

/**
 * Adds sanitization callback function: Custom Slider
 * @package blogify
 */
function blogify_sanitize_slider( $values ) {
    $output = array();
    $slider_values = !is_array( $values ) ? json_decode( $values ) : $values;
    if( !empty( $slider_values ) ){
        $i = 1;
        foreach( $slider_values as $val ){
            if( is_numeric( $val ) && !empty( $val ) ) {
                   $output[$i] = $val;
                   $i++;
            }
        }
    }
    return $output;
}

/**
 * Output custom CSS in theme header
 * @package blogify
 */
function blogify_customizer_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo get_theme_mod('blogify_link_color', '#3c8dc5'); ?>; }
        #site-title a { color: <?php echo get_theme_mod('blogify_logo_color'); ?>; }
        #site-title a:hover { color: <?php echo get_theme_mod('blogify_logo_hover_color'); ?>; }
        .wrapper { background: <?php echo get_theme_mod('blogify_wrapper_color', '#F8F8F8'); ?>; }
        .social-icons ul li a { color: <?php echo get_theme_mod('blogify_social_color', '#d0d0d0'); ?>; }
        #main-nav a, #main-nav a:hover,  #main-nav a:focus, #main-nav ul li.current-menu-item a,#main-nav ul li.current_page_ancestor a,#main-nav ul li.current-menu-ancestor a,#main-nav ul li.current_page_item a,#main-nav ul li:hover > a { color: <?php echo get_theme_mod('blogify_menu_item_color', '#fff'); ?>; }
        .widget, article { background: <?php echo get_theme_mod('blogify_content_bg_color', '#fff'); ?>; }
        .entry-title, .entry-title a, .entry-title a:focus, h1, h2, h3, h4, h5, h6, .widget-title  { color: <?php echo get_theme_mod('blogify_header_color', '#1b1e1f'); ?>; }
        a:focus, a:active, a:hover, .tags a:hover, .custom-gallery-title a, .widget-title a, #content ul a:hover,#content ol a:hover, .widget ul li a:hover, .entry-title a:hover, .entry-meta a:hover, #site-generator .copyright a:hover { color: <?php echo get_theme_mod('blogify_link_hover_color', '#444'); ?>; }
        #main-nav { background: <?php echo get_theme_mod('blogify_menu_color', '#3c8dc5'); ?>; border-color: <?php echo get_theme_mod('blogify_menu_color', '#3c8dc5'); ?>; }
        #main-nav ul li ul, body { border-color: <?php echo get_theme_mod('blogify_menu_color', '#444'); ?>; }
        #main-nav a:hover,#main-nav ul li.current-menu-item a,#main-nav ul li.current_page_ancestor a,#main-nav ul li.current-menu-ancestor a,#main-nav ul li.current_page_item a,#main-nav ul li:hover > a, #main-nav li:hover > a,#main-nav ul ul :hover > a,#main-nav a:focus { background: <?php echo get_theme_mod('blogify_menu_hover_color', '#444'); ?>; }
        #main-nav ul li ul li a:hover,#main-nav ul li ul li:hover > a,#main-nav ul li.current-menu-item ul li a:hover { color: <?php echo get_theme_mod('blogify_menu_hover_color', '#444'); ?>; }
        .entry-content { color: <?php echo get_theme_mod('blogify_entry_color', '#1D1D1D'); ?>; }
        input[type="reset"], input[type="button"], input[type="submit"], .entry-meta-bar .readmore, #controllers a:hover, #controllers a.active, .pagination span, .pagination a:hover span, .wp-pagenavi .current, .wp-pagenavi a:hover { background: <?php echo get_theme_mod('blogify_element_color', '#3c8dc5'); ?>; border-color: <?php echo get_theme_mod('blogify_element_color', '#3c8dc5'); ?> !important; }
        ::selection { background: <?php echo get_theme_mod('blogify_element_color', '#3c8dc5'); ?>; }
        blockquote { border-color: <?php echo get_theme_mod('blogify_element_color', '#444'); ?>; }
        #controllers a:hover, #controllers a.active { color: <?php echo get_theme_mod('blogify_element_color', ' #444'); ?>; }
        input[type="reset"]:hover,input[type="button"]:hover,input[type="submit"]:hover,input[type="reset"]:active,input[type="button"]:active,input[type="submit"]:active, .entry-meta-bar .readmore:hover, .entry-meta-bar .readmore:active, ul.default-wp-page li a:hover, ul.default-wp-page li a:active { background: <?php echo get_theme_mod('blogify_element_hover_color', '#444'); ?>; border-color: <?php echo get_theme_mod('blogify_element_hover_color', '#444'); ?>; }
    <?php
  if ( of_get_option('cfa_bg_color')) {
  echo '.cfa { background-color: '.of_get_option('cfa_bg_color').'; } .cfa-button:hover a {color: '.of_get_option('cfa_bg_color').';}';
  }
  if ( of_get_option('cfa_bg_color')) {
  echo '.cfa-button { background-color: '.of_get_option('cfa_btn_back_color').'; }';
  }      
  if ( of_get_option('cfa_color')) {
  echo '.cfa-text { color: '.of_get_option('cfa_color').';}';
  }
  if ( of_get_option('cfa_btn_color') || of_get_option('cfa_btn_txt_color') ) {
    echo '.cfa-button {border-color: '.of_get_option('cfa_btn_color').'; color: '.of_get_option('cfa_btn_txt_color').';}'; 
  }
?>
    </style>
    <?php
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 * @package blogify
 */
function blogify_customize_preview_js() {
    wp_enqueue_script('blogify_customizer', get_template_directory_uri() . '/library/js/customizer.js', array('customize-preview'), '20151005', true);
}


/**
 * Validate all theme options values
 *
 * @uses esc_url_raw, absint, esc_textarea, sanitize_text_field, blogify_invalidate_caches
 */
function blogify_theme_options_validate( $options ) {
	global $blogify_theme_options_settings, $blogify_theme_options_defaults;
	$input_validated = $blogify_theme_options_settings;
	$input = array();
	$input = $options;
        $input_validated = $input;

   	if ( isset( $input[ 'featured_post_slider' ] ) ) {

            $slide_count = count( $input[ 'featured_post_slider' ] );

            // Slider settings updation
            $input_validated[ 'slider_quantity' ] = $slide_count > 0 ? $slide_count : 3;
        }

	// Layout settings verification
	if (isset($input['reset_layout'])) {
            $input_validated['reset_layout'] = 0;
        }
        if (0 == $input['reset_layout']) {
            if (isset($input['default_layout'])) {
                $input_validated['default_layout'] = $input['default_layout'];
            }
        } else {
            $input_validated['default_layout'] = $blogify_theme_options_defaults['default_layout'];
        }

        //Clearing the theme option cache
	    if( function_exists( 'blogify_themeoption_invalidate_caches' ) ) blogify_themeoption_invalidate_caches();

   return $input_validated;
}

/**
 * Clearing the cache if any changes in Customizer
 */
function blogify_themeoption_invalidate_caches(){
	delete_transient( 'blogify_featured_post_slider' );
	delete_transient( 'blogify_socialnetworks' );
	delete_transient( 'blogify_footercode' );
	delete_transient( 'blogify_internal_css' );
	delete_transient( 'blogify_headercode' );
}

/**
 * Clearing the cache if any changes in post or page
 */
function blogify_post_invalidate_caches(){
   delete_transient( 'blogify_featured_post_slider' );
}

/**
 * Register options and validation callbacks
 *
 * @uses register_setting
 */
function blogify_register_settings() {
   register_setting( 'blogify_theme_options', 'blogify_theme_options', 'blogify_theme_options_validate' );
}

add_action('customize_register', 'blogify_options_register_theme_customizer');
add_action('wp_head', 'blogify_customizer_css');
add_action('customize_preview_init', 'blogify_customize_preview_js');
add_action( 'admin_init', 'blogify_register_settings' );
add_action( 'save_post', 'blogify_post_invalidate_caches' );
?>