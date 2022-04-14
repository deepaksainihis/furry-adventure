<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'the_travel_booking_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'the-travel-booking' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'the-travel-booking' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'the-travel-booking' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );

	// PANEL

	Kirki::add_panel( 'the_travel_booking_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'the-travel-booking' ),
	) );

	// Scroll Top

	Kirki::add_section( 'the_travel_booking_section_scroll', array(
	    'title'          => esc_html__( 'Additional Settings', 'the-travel-booking' ),
	    'description'    => esc_html__( 'Scroll To Top', 'the-travel-booking' ),
	    'panel'          => 'the_travel_booking_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'the_travel_booking_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_section_scroll',
		'default'     => '1',
		'priority'    => 10,
	] );

	// COLOR SECTION

	Kirki::add_section( 'the_travel_booking_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'the-travel-booking' ),
	    'description'    => esc_html__( 'Theme Color Settings', 'the-travel-booking' ),
	    'panel'          => 'the_travel_booking_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_global_colors',
		'section'     => 'the_travel_booking_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'the_travel_booking_global_color',
		'label'       => __( 'choose your Appropriate Color', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_section_color',
		'default'     => '#3fcfd3',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'the_travel_booking_global_color_2',
		'label'       => __( 'Choose Your Second Color', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_section_color',
		'default'     => '#5a5959',
	] );

	// POST SECTION

	Kirki::add_section( 'the_travel_booking_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'the-travel-booking' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'the-travel-booking' ),
	    'panel'          => 'the_travel_booking_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_enable_post_heading',
		'section'     => 'the_travel_booking_section_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Post Settings.', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_blog_admin_enable',
		'label'       => esc_html__( 'Post Author Enable / Disable Button', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_blog_comment_enable',
		'label'       => esc_html__( 'Post Comment Enable / Disable Button', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_excerpt_post_heading',
		'section'     => 'the_travel_booking_section_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text.', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'the_travel_booking_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// HEADER SECTION

	Kirki::add_section( 'the_travel_booking_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'the-travel-booking' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'the-travel-booking' ),
	    'panel'          => 'the_travel_booking_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_dashicons_setting_1',
		'section'     => 'the_travel_booking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'the_travel_booking_dashicons_setting_1',
		'label'    => esc_html__( 'Select Appropriate Icon', 'the-travel-booking' ),
		'section'  => 'the_travel_booking_section_header',
		'default'  => 'dashicons dashicons-email',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_email_address_heading',
		'section'     => 'the_travel_booking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Email Address', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'the_travel_booking_header_email_address',
		'section'  => 'the_travel_booking_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_dashicons_setting_2',
		'section'     => 'the_travel_booking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'the_travel_booking_dashicons_setting_2',
		'label'    => esc_html__( 'Select Appropriate Icon', 'the-travel-booking' ),
		'section'  => 'the_travel_booking_section_header',
		'default'  => 'dashicons dashicons-phone',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_phone_number_heading',
		'section'     => 'the_travel_booking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'the_travel_booking_header_phone_number',
		'section'  => 'the_travel_booking_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_dashicons_setting_3',
		'section'     => 'the_travel_booking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'the_travel_booking_dashicons_setting_3',
		'label'    => esc_html__( 'Select Appropriate Icon', 'the-travel-booking' ),
		'section'  => 'the_travel_booking_section_header',
		'default'  => 'dashicons dashicons-location',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_header_location_address_heading',
		'section'     => 'the_travel_booking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Location', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'the_travel_booking_header_location_address',
		'section'  => 'the_travel_booking_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_enable_google_translation',
		'section'     => 'the_travel_booking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Google Translation Box', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_header_google_translation',
		'section'     => 'the_travel_booking_section_header',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_enable_search',
		'section'     => 'the_travel_booking_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_search_box_enable',
		'section'     => 'the_travel_booking_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'the_travel_booking_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'the-travel-booking' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'the-travel-booking' ),
        'panel'          => 'the_travel_booking_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_enable_heading',
		'section'     => 'the_travel_booking_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_blog_slide_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_slide_title_enable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_slide_text_enable_disable',
		'label'       => esc_html__( 'Slide Text Enable / Disable', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_slider_heading',
		'section'     => 'the_travel_booking_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'the_travel_booking_blog_slide_number',
		'label'       => esc_html__( 'Slide Content Range', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'the_travel_booking_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'the-travel-booking' ),
		'priority'    => 10,
		'choices'     => the_travel_booking_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_slider_text_heading_4',
		'section'     => 'the_travel_booking_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Slider Text', 'the-travel-booking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'the_travel_booking_excerpt_number',
		'label'       => esc_html__( 'Number of text to show', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_blog_slide_section',
		'default'     => 20,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// POPULAR TOURS SECTION

	Kirki::add_section( 'the_travel_booking_popular_section', array(
        'title'          => esc_html__( 'Popular Tours Settings', 'the-travel-booking' ),
        'description'    => esc_html__( 'You have to select category to show tours.', 'the-travel-booking' ),
        'panel'          => 'the_travel_booking_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_about_enable_heading',
		'section'     => 'the_travel_booking_popular_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Popular Tours', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_popular_tours_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_popular_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_tours_heading',
		'section'     => 'the_travel_booking_popular_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Popular Tours', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'the_travel_booking_popular_tours_number',
		'label'       => esc_html__( 'Number of tours to show', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_popular_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'the_travel_booking_popular_tours_category',
		'label'       => esc_html__( 'Select the category to show popular tours', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_popular_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'the-travel-booking' ),
		'priority'    => 10,
		'choices'     => the_travel_booking_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_tour_text_heading_4',
		'section'     => 'the_travel_booking_popular_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text', 'the-travel-booking' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'the_travel_booking_excerpt_number_count',
		'label'       => esc_html__( 'Tour Content Range', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_popular_section',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );


	// FOOTER SECTION

	Kirki::add_section( 'the_travel_booking_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'the-travel-booking' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'the-travel-booking' ),
        'panel'          => 'the_travel_booking_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_footer_text_heading',
		'section'     => 'the_travel_booking_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'the_travel_booking_footer_text',
		'section'  => 'the_travel_booking_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'the_travel_booking_footer_enable_heading',
		'section'     => 'the_travel_booking_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'the-travel-booking' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'the_travel_booking_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'the-travel-booking' ),
		'section'     => 'the_travel_booking_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'the-travel-booking' ),
			'off' => esc_html__( 'Disable', 'the-travel-booking' ),
		],
	] );	
}