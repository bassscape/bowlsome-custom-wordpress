<?php
/*
Plugin Name: Jumbo, by Bonfire
Description: A 3-in-1 menu plugin for WordPress. Customize under Appearance > Customize > Jumbo Plugin.
Version: 3.0
Author: Bonfire Themes
Author URI: http://bonfirethemes.com/
License: GPL2
*/

	//
	// WORDPRESS LIVE CUSTOMIZER
	//
	function jumbo_theme_customizer( $wp_customize ) {
        
        //
        // ADD "Jumbo Plugin" PANEL TO LIVE CUSTOMIZER
        //
        $wp_customize->add_panel('jumbo_panel', array('title' => __('Jumbo Plugin', 'jumbo'),'priority' => 10,));
        
        //
        // ADD "Positioning" SECTION TO "Jumbo Plugin" PANEL 
        //
        $wp_customize->add_section('jumbo_positioning_section',array('title' => __( 'Positioning', 'jumbo' ),'panel'  => 'jumbo_panel','description' => 'This section holds positioning options for the main/primary menu buttons and profile image.','priority' => 1));
        
        /* absolute position */
        $wp_customize->add_setting('jumbo_absolute_position',array('sanitize_callback' => 'sanitize_jumbo_absolute_position',));
        function sanitize_jumbo_absolute_position( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_absolute_position',array('type' => 'checkbox','label' => 'Absolute position','description' => 'If unchecked, menu buttons will stick to the top when site is scrolled.', 'section' => 'jumbo_positioning_section',));
        
        /* right position */
        $wp_customize->add_setting('jumbo_position_right',array('sanitize_callback' => 'sanitize_jumbo_position_right',));
        function sanitize_jumbo_position_right( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_position_right',array('type' => 'checkbox','label' => 'Align right','description' => 'Position right. If unchecked, menu buttons will be positioned on left side of screen.', 'section' => 'jumbo_positioning_section',));
        
        /* top distance */
        $wp_customize->add_setting('jumbo_top_distance',array('sanitize_callback' => 'sanitize_jumbo_top_distance',));
        function sanitize_jumbo_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_top_distance',array(
            'type' => 'text',
            'label' => 'Top distance',
            'description' => 'Example: 25. If empty, defaults to 0.',
            'section' => 'jumbo_positioning_section',
        ));
        
        /* side distance */
        $wp_customize->add_setting('jumbo_side_distance',array('sanitize_callback' => 'sanitize_jumbo_side_distance',));
        function sanitize_jumbo_side_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_side_distance',array(
            'type' => 'text',
            'label' => 'Side distance',
            'description' => 'Example: 25. If empty, defaults to 0.',
            'section' => 'jumbo_positioning_section',
        ));
        
        //
        // ADD "Main Menu Button" SECTION TO "Jumbo Plugin" PANEL 
        //
        $wp_customize->add_section('jumbo_main_menu_button_section',array('title' => __( 'Main Menu Button', 'jumbo' ),'panel'  => 'jumbo_panel','priority' => 1));
        
        /* hide main menu button */
        $wp_customize->add_setting('jumbo_hide_main_menu_button',array('sanitize_callback' => 'sanitize_jumbo_hide_main_menu_button',));
        function sanitize_jumbo_hide_main_menu_button( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_hide_main_menu_button',array('type' => 'checkbox','label' => 'Hide menu button','description' => 'Useful if you would like to use your own element to toggle the full-screen menu, in which case give your custom element the "jumbo-custom-activator" class.', 'section' => 'jumbo_main_menu_button_section',));
        
        /* alternate animation */
        $wp_customize->add_setting('jumbo_main_menu_button_alt',array('sanitize_callback' => 'sanitize_jumbo_main_menu_button_alt',));
        function sanitize_jumbo_main_menu_button_alt( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_main_menu_button_alt',array('type' => 'checkbox','label' => 'Alternate menu button animation','description' => 'When menu is opened, animate menu button into minus symbol (if left unchecked, menu button will animate into X symbol).', 'section' => 'jumbo_main_menu_button_section',));
        
        /* rounded corners */
        $wp_customize->add_setting('jumbo_main_menu_button_rounded',array('sanitize_callback' => 'sanitize_jumbo_main_menu_button_rounded',));
        function sanitize_jumbo_main_menu_button_rounded( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_main_menu_button_rounded',array('type' => 'checkbox','label' => 'Menu button rounded corners','description' => 'Give the menu button icon rounded corners.', 'section' => 'jumbo_main_menu_button_section',));
        
        /* menu button color */
        $wp_customize->add_setting( 'jumbo_menu_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_menu_button_color',array(
            'label' => 'Menu button', 'settings' => 'jumbo_menu_button_color', 'section' => 'jumbo_main_menu_button_section' )
        ));
        
        /* menu button hover color */
        $wp_customize->add_setting( 'jumbo_menu_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_menu_button_hover_color',array(
            'label' => 'Menu button (hover)', 'settings' => 'jumbo_menu_button_hover_color', 'section' => 'jumbo_main_menu_button_section' )
        ));
        
        /* menu button background color */
        $wp_customize->add_setting( 'jumbo_menu_button_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_menu_button_background_color',array(
            'label' => 'Menu button background', 'settings' => 'jumbo_menu_button_background_color', 'section' => 'jumbo_main_menu_button_section' )
        ));
        
        /* menu button background hover color */
        $wp_customize->add_setting( 'jumbo_menu_button_background_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_menu_button_background_hover_color',array(
            'label' => 'Menu button background (hover)', 'settings' => 'jumbo_menu_button_background_hover_color', 'section' => 'jumbo_main_menu_button_section' )
        ));
        
        /* menu button background transparent */
        $wp_customize->add_setting('jumbo_menu_button_transparent',array('sanitize_callback' => 'sanitize_jumbo_menu_button_transparent',));
        function sanitize_jumbo_menu_button_transparent( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_menu_button_transparent',array('type' => 'checkbox','label' => 'Hide button background color','description' => 'Tick to make the main menu button background transparent.', 'section' => 'jumbo_main_menu_button_section',));
        
        //
        // ADD "Main Menu" SECTION TO "Jumbo Plugin" PANEL 
        //
        $wp_customize->add_section('jumbo_main_menu_section',array('title' => __( 'Main Menu Contents', 'jumbo' ),'panel'  => 'jumbo_panel','priority' => 1));
        
        /* main menu description uppercase */
        $wp_customize->add_setting('jumbo_main_menu_desc_uppercase',array('sanitize_callback' => 'sanitize_jumbo_main_menu_desc_uppercase',));
        function sanitize_jumbo_main_menu_desc_uppercase( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_main_menu_desc_uppercase',array('type' => 'checkbox','label' => 'Description uppercase','description' => 'Make all menu item descriptions uppercase.', 'section' => 'jumbo_main_menu_section',));
        
        /* main menu items uppercase */
        $wp_customize->add_setting('jumbo_main_menu_uppercase',array('sanitize_callback' => 'sanitize_jumbo_main_menu_uppercase',));
        function sanitize_jumbo_main_menu_uppercase( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_main_menu_uppercase',array('type' => 'checkbox','label' => 'Menu items uppercase','description' => 'Make all main menu items uppercase.', 'section' => 'jumbo_main_menu_section',));
        
        /* heading image */
        $wp_customize->add_setting('jumbo_heading_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jumbo_heading_image',
            array(
                'label' => 'Heading image',
                'settings' => 'jumbo_heading_image',
                'section' => 'jumbo_main_menu_section',
        )
        ));
        
        /* heading image max-width */
        $wp_customize->add_setting('jumbo_heading_image_max_width',array('sanitize_callback' => 'sanitize_jumbo_heading_image_max_width',));
        function sanitize_jumbo_heading_image_max_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_heading_image_max_width',array(
            'type' => 'text',
            'label' => 'Heading image maximum width (in pixels)',
            'description' => 'Example: 200. If empty, defaults to full size.',
            'section' => 'jumbo_main_menu_section',
        ));
        
        /* main menu item opacity */
        $wp_customize->add_setting('jumbo_main_menu_opacity',array('sanitize_callback' => 'sanitize_jumbo_main_menu_opacity',));
        function sanitize_jumbo_main_menu_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_main_menu_opacity',array(
            'type' => 'text',
            'label' => 'Main menu item opacity',
            'description' => 'From 0-1. Example: 0.25 or 0.5. If left empty, defaults to 0.5.',
            'section' => 'jumbo_main_menu_section',
        ));
        
        /* main menu item description opacity */
        $wp_customize->add_setting('jumbo_main_menu_description_opacity',array('sanitize_callback' => 'sanitize_jumbo_main_menu_description_opacity',));
        function sanitize_jumbo_main_menu_description_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_main_menu_description_opacity',array(
            'type' => 'text',
            'label' => 'Main menu item description opacity',
            'description' => 'From 0-1. Example: 0.25 or 0.5. If left empty, defaults to 0.25.',
            'section' => 'jumbo_main_menu_section',
        ));
        
        /* main menu item theme font */
        $wp_customize->add_setting('jumbo_main_menu_theme_font',array('sanitize_callback' => 'sanitize_jumbo_main_menu_theme_font',));
        function sanitize_jumbo_main_menu_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_main_menu_theme_font',array(
            'type' => 'text',
            'label' => 'Advanced feature: Use theme font for menu items',
            'description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet.',
            'section' => 'jumbo_main_menu_section',
        ));
        
        /* main menu item description theme font */
        $wp_customize->add_setting('jumbo_main_menu_description_theme_font',array('sanitize_callback' => 'sanitize_jumbo_main_menu_description_theme_font',));
        function sanitize_jumbo_main_menu_description_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_main_menu_description_theme_font',array(
            'type' => 'text',
            'label' => 'Advanced feature: Use theme font for menu item descriptions',
            'description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet.',
            'section' => 'jumbo_main_menu_section',
        ));
        
        /* main menu item color */
        $wp_customize->add_setting( 'jumbo_main_menu_item_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_main_menu_item_color',array(
            'label' => 'Menu item', 'settings' => 'jumbo_main_menu_item_color', 'section' => 'jumbo_main_menu_section' )
        ));
        
        /* main menu item hover color */
        $wp_customize->add_setting( 'jumbo_main_menu_item_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_main_menu_item_hover_color',array(
            'label' => 'Menu item (hover)', 'settings' => 'jumbo_main_menu_item_hover_color', 'section' => 'jumbo_main_menu_section' )
        ));
        
        /* main menu description item color */
        $wp_customize->add_setting( 'jumbo_main_menu_item_description_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_main_menu_item_description_color',array(
            'label' => 'Menu item description', 'settings' => 'jumbo_main_menu_item_description_color', 'section' => 'jumbo_main_menu_section' )
        ));
        
        /* main menu item description hover color */
        $wp_customize->add_setting( 'jumbo_main_menu_item_description_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_main_menu_item_description_hover_color',array(
            'label' => 'Menu item description (hover)', 'settings' => 'jumbo_main_menu_item_description_hover_color', 'section' => 'jumbo_main_menu_section' )
        ));
        
        //
        // ADD "Main Menu Container" SECTION TO "Jumbo Plugin" PANEL 
        //
        $wp_customize->add_section('jumbo_main_menu_container_section',array('title' => __( 'Main Menu Container', 'jumbo' ),'panel'  => 'jumbo_panel','priority' => 1));
        
        /* open on front page */
        $wp_customize->add_setting('jumbo_menu_open_on_front_page',array('sanitize_callback' => 'sanitize_jumbo_menu_open_on_front_page',));
        function sanitize_jumbo_menu_open_on_front_page( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_menu_open_on_front_page',array('type' => 'checkbox','label' => 'Open on front page','description' => 'If ticked, the full-screen menu will be open by default on the front page.', 'section' => 'jumbo_main_menu_container_section',));
        
        /* close on click */
        $wp_customize->add_setting('jumbo_menu_close_on_click',array('sanitize_callback' => 'sanitize_jumbo_menu_close_on_click',));
        function sanitize_jumbo_menu_close_on_click( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_menu_close_on_click',array('type' => 'checkbox','label' => 'Close after click','description' => 'Close main menu when menu item is clicked/tapped (useful on one-page websites where menu links lead to anchors, not new pages).', 'section' => 'jumbo_main_menu_container_section',));
        
        /* main menu appearance */
        $wp_customize->add_setting('jumbo_main_menu_appearance',array(
            'default' => 'fade',
        ));
        $wp_customize->add_control('jumbo_main_menu_appearance',array(
            'type' => 'select',
            'label' => 'Menu appearance',
            'section' => 'jumbo_main_menu_container_section',
            'choices' => array(
                'top' => 'Top',
                'bottom' => 'Bottom',
                'left' => 'Left',
                'right' => 'Right',
                'fade' => 'Fade',
        ),
        ));
        
        /* main menu horizontal align */
        $wp_customize->add_setting('jumbo_main_menu_horizontal_align',array(
            'default' => 'center',
        ));
        $wp_customize->add_control('jumbo_main_menu_horizontal_align',array(
            'type' => 'select',
            'label' => 'Horizontal alignment',
            'description' => 'Horizontal alignment for the content inside the full-screen menu',
            'section' => 'jumbo_main_menu_container_section',
            'choices' => array(
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
        ),
        ));
        
        /* main menu vertical align */
        $wp_customize->add_setting('jumbo_main_menu_vertical_align',array(
            'default' => 'middle',
        ));
        $wp_customize->add_control('jumbo_main_menu_vertical_align',array(
            'type' => 'select',
            'label' => 'Vertical alignment',
            'description' => 'Vertical alignment for the content inside the full-screen menu',
            'section' => 'jumbo_main_menu_container_section',
            'choices' => array(
                'top' => 'Top',
                'middle' => 'Middle',
                'bottom' => 'Bottom',
        ),
        ));
        
        /* main menu appearance speed */
        $wp_customize->add_setting('jumbo_main_menu_appearance_speed',array('sanitize_callback' => 'sanitize_jumbo_main_menu_appearance_speed',));
        function sanitize_jumbo_main_menu_appearance_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_main_menu_appearance_speed',array(
            'type' => 'text',
            'label' => 'Apperance speed (in seconds)',
            'description' => 'Example: 1.25. If empty, defaults to 0.5',
            'section' => 'jumbo_main_menu_container_section',
        ));
        
        /* main menu contents top margin */
        $wp_customize->add_setting('jumbo_main_menu_contents_top_margin',array('sanitize_callback' => 'sanitize_jumbo_main_menu_contents_top_margin',));
        function sanitize_jumbo_main_menu_contents_top_margin($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_main_menu_contents_top_margin',array(
            'type' => 'text',
            'label' => 'Main menu contents top margin (in pixels)',
            'description' => 'If your main menu has a lot of menu items for example, you may want to give it some top margin so it wouldn not stick too close to the top (potentially hiding partially behind the menu buttons). If unsure of what to enter, try out 100 to begin with and then adjust according to your needs.',
            'section' => 'jumbo_main_menu_container_section',
        ));
        
        /* main menu dot overlay opacity */
        $wp_customize->add_setting('jumbo_main_menu_dot_overlay_opacity',array('sanitize_callback' => 'sanitize_jumbo_main_menu_dot_overlay_opacity',));
        function sanitize_jumbo_main_menu_dot_overlay_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_main_menu_dot_overlay_opacity',array(
            'type' => 'text',
            'label' => 'Dot overlay opacity',
            'description' => 'From 0-1. Example: 0.25 or 0.5. If left empty, defaults to 0.25.',
            'section' => 'jumbo_main_menu_container_section',
        ));
        
        /* main menu background image */
        $wp_customize->add_setting('jumbo_main_menu_background_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jumbo_main_menu_background_image',
            array(
                'label' => 'Background image',
                'settings' => 'jumbo_main_menu_background_image',
                'section' => 'jumbo_main_menu_container_section',
        )
        ));
        
        /* main menu background image opacity */
        $wp_customize->add_setting('jumbo_main_menu_background_image_opacity',array('sanitize_callback' => 'sanitize_jumbo_main_menu_background_image_opacity',));
        function sanitize_jumbo_main_menu_background_image_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_main_menu_background_image_opacity',array(
            'type' => 'text',
            'label' => 'Background image opacity',
            'description' => 'From 0-1. Example: 0.25 or 0.5. If left empty, defaults to 0.3.',
            'section' => 'jumbo_main_menu_container_section',
        ));
        
        /* main menu background color */
        $wp_customize->add_setting( 'jumbo_main_menu_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_main_menu_background_color',array(
            'label' => 'Menu background', 'settings' => 'jumbo_main_menu_background_color', 'section' => 'jumbo_main_menu_container_section' )
        ));
        
        /* main menu background color opacity */
        $wp_customize->add_setting('jumbo_main_menu_background_color_opacity',array('sanitize_callback' => 'sanitize_jumbo_main_menu_background_color_opacity',));
        function sanitize_jumbo_main_menu_background_color_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_main_menu_background_color_opacity',array(
            'type' => 'text',
            'label' => 'Background color opacity',
            'description' => 'From 0-1. Example: 0.25 or 0.5. If left empty, defaults to 1.',
            'section' => 'jumbo_main_menu_container_section',
        ));
        
        //
        // ADD "Secondary Menu" SECTION TO "Jumbo Plugin" PANEL 
        //
        $wp_customize->add_section('jumbo_secondary_menu_section',array('title' => __( 'Secondary Menu', 'jumbo' ),'panel'  => 'jumbo_panel','priority' => 1));

        /* secondary menu button color */
        $wp_customize->add_setting( 'jumbo_secondary_menu_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_menu_button_color',array(
            'label' => 'Menu button', 'settings' => 'jumbo_secondary_menu_button_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu button hover color */
        $wp_customize->add_setting( 'jumbo_secondary_menu_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_menu_button_hover_color',array(
            'label' => 'Menu button (hover)', 'settings' => 'jumbo_secondary_menu_button_hover_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu button background color */
        $wp_customize->add_setting( 'jumbo_secondary_menu_button_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_menu_button_background_color',array(
            'label' => 'Menu button background', 'settings' => 'jumbo_secondary_menu_button_background_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu button background hover color */
        $wp_customize->add_setting( 'jumbo_secondary_menu_button_background_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_menu_button_background_hover_color',array(
            'label' => 'Menu button background (hover)', 'settings' => 'jumbo_secondary_menu_button_background_hover_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu button color transparent */
        $wp_customize->add_setting('jumbo_secondary_menu_button_transparent',array('sanitize_callback' => 'sanitize_jumbo_secondary_menu_button_transparent',));
        function sanitize_jumbo_secondary_menu_button_transparent( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_secondary_menu_button_transparent',array('type' => 'checkbox','label' => 'Hide button background color','description' => 'Tick to make the secondary menu button background transparent.', 'section' => 'jumbo_secondary_menu_section',));
        
        /* menu buttons divider color */
        $wp_customize->add_setting( 'jumbo_menu_button_divider_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_menu_button_divider_color',array(
            'label' => 'Menu buttons divider', 'settings' => 'jumbo_menu_button_divider_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu uppercase */
        $wp_customize->add_setting('jumbo_secondary_menu_uppercase',array('sanitize_callback' => 'sanitize_jumbo_secondary_menu_uppercase',));
        function sanitize_jumbo_secondary_menu_uppercase( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_secondary_menu_uppercase',array('type' => 'checkbox','label' => 'Uppercase','description' => 'Make all secondary menu items uppercase.', 'section' => 'jumbo_secondary_menu_section',));
        
        /* secondary menu background color */
        $wp_customize->add_setting( 'jumbo_secondary_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_background_color',array(
            'label' => 'Menu background', 'settings' => 'jumbo_secondary_background_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary submenu background color */
        $wp_customize->add_setting( 'jumbo_secondary_submenu_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_submenu_background_color',array(
            'label' => 'Submenu background', 'settings' => 'jumbo_secondary_submenu_background_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu background hover color */
        $wp_customize->add_setting( 'jumbo_secondary_background_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_background_hover_color',array(
            'label' => 'Menu background (hover)', 'settings' => 'jumbo_secondary_background_hover_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu item divider color */
        $wp_customize->add_setting( 'jumbo_secondary_menu_item_divider_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_menu_item_divider_color',array(
            'label' => 'Menu item dividers', 'settings' => 'jumbo_secondary_menu_item_divider_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary submenu item divider color */
        $wp_customize->add_setting( 'jumbo_secondary_submenu_item_divider_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_submenu_item_divider_color',array(
            'label' => 'Submenu item dividers', 'settings' => 'jumbo_secondary_submenu_item_divider_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu item color */
        $wp_customize->add_setting( 'jumbo_secondary_menu_item_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_menu_item_color',array(
            'label' => 'Menu items', 'settings' => 'jumbo_secondary_menu_item_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu item hover color */
        $wp_customize->add_setting( 'jumbo_secondary_menu_item_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_menu_item_hover_color',array(
            'label' => 'Menu items (hover)', 'settings' => 'jumbo_secondary_menu_item_hover_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu item description color */
        $wp_customize->add_setting( 'jumbo_secondary_menu_item_description_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_menu_item_description_color',array(
            'label' => 'Menu item description', 'settings' => 'jumbo_secondary_menu_item_description_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu item description hover color */
        $wp_customize->add_setting( 'jumbo_secondary_menu_item_description_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_menu_item_description_hover_color',array(
            'label' => 'Menu item description (hover)', 'settings' => 'jumbo_secondary_menu_item_description_hover_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary submenu item color */
        $wp_customize->add_setting( 'jumbo_secondary_submenu_item_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_submenu_item_color',array(
            'label' => 'Submenu items', 'settings' => 'jumbo_secondary_submenu_item_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary submenu item hover color */
        $wp_customize->add_setting( 'jumbo_secondary_submenu_item_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_submenu_item_hover_color',array(
            'label' => 'Submenu items (hover)', 'settings' => 'jumbo_secondary_submenu_item_hover_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu item description color (multi-level) */
        $wp_customize->add_setting( 'jumbo_secondary_menu_item_description_color_multi', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_menu_item_description_color_multi',array(
            'label' => 'Menu item description (multi-level)', 'settings' => 'jumbo_secondary_menu_item_description_color_multi', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary submenu arrow divider color */
        $wp_customize->add_setting( 'jumbo_secondary_submenu_arrow_divider', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_submenu_arrow_divider',array(
            'label' => 'Submenu arrow divider', 'settings' => 'jumbo_secondary_submenu_arrow_divider', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary submenu item color (multi-level) */
        $wp_customize->add_setting( 'jumbo_secondary_submenu_arrow_divider_color_multi', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_submenu_arrow_divider_color_multi',array(
            'label' => 'Submenu arrow divider (multi-level)', 'settings' => 'jumbo_secondary_submenu_arrow_divider_color_multi', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary submenu arrow color */
        $wp_customize->add_setting( 'jumbo_secondary_submenu_arrow_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_submenu_arrow_color',array(
            'label' => 'Submenu arrow', 'settings' => 'jumbo_secondary_submenu_arrow_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary submenu arrow hover color */
        $wp_customize->add_setting( 'jumbo_secondary_submenu_arrow_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_submenu_arrow_hover_color',array(
            'label' => 'Submenu arrow (hover)', 'settings' => 'jumbo_secondary_submenu_arrow_hover_color', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary submenu arrow color (multi-level) */
        $wp_customize->add_setting( 'jumbo_secondary_submenu_arrow_color_multi', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_submenu_arrow_color_multi',array(
            'label' => 'Submenu arrow (multi-level)', 'settings' => 'jumbo_secondary_submenu_arrow_color_multi', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary submenu arrow hover color (multi-level) */
        $wp_customize->add_setting( 'jumbo_secondary_submenu_arrow_hover_color_multi', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_secondary_submenu_arrow_hover_color_multi',array(
            'label' => 'Submenu arrow (hover, multi-level)', 'settings' => 'jumbo_secondary_submenu_arrow_hover_color_multi', 'section' => 'jumbo_secondary_menu_section' )
        ));
        
        /* secondary menu width */
        $wp_customize->add_setting('jumbo_secondary_menu_width',array('sanitize_callback' => 'sanitize_jumbo_secondary_menu_width',));
        function sanitize_jumbo_secondary_menu_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_secondary_menu_width',array(
            'type' => 'text',
            'label' => 'Menu width (in pixels)',
            'description' => 'Example: 225. If you want or need to make the secondary menu wider, enter the value into the field above. If empty, will default to 190 pixels',
            'section' => 'jumbo_secondary_menu_section',
        ));
        
        /* use theme font */
        $wp_customize->add_setting('jumbo_secondary_menu_theme_font',array('sanitize_callback' => 'sanitize_jumbo_secondary_menu_theme_font',));
        function sanitize_jumbo_secondary_menu_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_secondary_menu_theme_font',array(
            'type' => 'text',
            'label' => 'Advanced feature: Use theme font',
            'description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet.',
            'section' => 'jumbo_secondary_menu_section',
        ));
        
        //
        // ADD "Gravatar/Profile Image" SECTION TO "Jumbo Plugin" PANEL 
        //
        $wp_customize->add_section('jumbo_gravatar_section',array('title' => __( 'Gravatar/Profile Image', 'jumbo' ),'panel'  => 'jumbo_panel','priority' => 1));
        
        /* gravatar email */
        $wp_customize->add_setting('jumbo_gravatar_email',array('sanitize_callback' => 'sanitize_jumbo_gravatar_email',));
        function sanitize_jumbo_gravatar_email($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_gravatar_email',array(
            'type' => 'text',
            'label' => 'Gravatar email address',
            'description' => 'To show your Gravatar next to the menu button, enter your Gravatar email. If no email is entered, no icon will be shown.',
            'section' => 'jumbo_gravatar_section',
        ));
        
        /* custom profile image */
        $wp_customize->add_setting('jumbo_custom_profile_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jumbo_custom_profile_image',
            array(
                'label' => 'Custom profile image',
                'description' => 'For best result, use image with square proportions.',
                'settings' => 'jumbo_custom_profile_image',
                'section' => 'jumbo_gravatar_section',
        )
        ));
        
        /* profile page link */
        $wp_customize->add_setting('jumbo_profile_link',array('sanitize_callback' => 'sanitize_jumbo_profile_link',));
        function sanitize_jumbo_profile_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_profile_link',array(
            'type' => 'text',
            'label' => 'Profile page URL',
            'description' => 'Enter the URL the user will be directed to when the Gravatar is clicked/tapped.',
            'section' => 'jumbo_gravatar_section',
        ));
        
        /* tooltip label */
        $wp_customize->add_setting('jumbo_tooltip_label',array('sanitize_callback' => 'sanitize_jumbo_tooltip_label',));
        function sanitize_jumbo_tooltip_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_tooltip_label',array(
            'type' => 'text',
            'label' => 'Tooltip label',
            'description' => 'If left empty, tooltip is not displayed.',
            'section' => 'jumbo_gravatar_section',
        ));
        
        /* gravatar tooltip text color */
        $wp_customize->add_setting( 'jumbo_gravatar_tooltip_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_gravatar_tooltip_text_color',array(
            'label' => 'Gravatar tooltip text', 'settings' => 'jumbo_gravatar_tooltip_text_color', 'section' => 'jumbo_gravatar_section' )
        ));
        
        /* gravatar tooltip background color */
        $wp_customize->add_setting( 'jumbo_gravatar_tooltip_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbo_gravatar_tooltip_background_color',array(
            'label' => 'Gravatar tooltip background', 'settings' => 'jumbo_gravatar_tooltip_background_color', 'section' => 'jumbo_gravatar_section' )
        ));
        
        /* hide gravatar hover effect */
        $wp_customize->add_setting('jumbo_disable_gravatar_hover',array('sanitize_callback' => 'sanitize_jumbo_disable_gravatar_hover',));
        function sanitize_jumbo_disable_gravatar_hover( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_disable_gravatar_hover',array('type' => 'checkbox','label' => 'Disable Gravatar hover effect', 'section' => 'jumbo_gravatar_section',));
        
        /* use theme font */
        $wp_customize->add_setting('jumbo_gravatar_tooltip_theme_font',array('sanitize_callback' => 'sanitize_jumbo_gravatar_tooltip_theme_font',));
        function sanitize_jumbo_gravatar_tooltip_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_gravatar_tooltip_theme_font',array(
            'type' => 'text',
            'label' => 'Advanced feature: Use theme font',
            'description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet.',
            'section' => 'jumbo_gravatar_section',
        ));

        //
        // ADD "Misc" SECTION TO "Jumbo Plugin" PANEL 
        //
        $wp_customize->add_section('jumbo_misc_section',array('title' => __( 'Misc', 'jumbo' ),'panel'  => 'jumbo_panel','priority' => 1));
        
        /* don't load FontAwesome */
        $wp_customize->add_setting('jumbo_disable_fontawesome',array('sanitize_callback' => 'sanitize_jumbo_disable_fontawesome',));
        function sanitize_jumbo_disable_fontawesome( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_disable_fontawesome',array('type' => 'checkbox','label' => 'Do not load FontAwesome icon set','description' => 'Useful if you do not use icons in your menus or if your theme or another plugin already loads it, to prevent it from being loaded twice unnecessarily.', 'section' => 'jumbo_misc_section',));
        
        /* logged in only */
        $wp_customize->add_setting('jumbo_logged_in',array('sanitize_callback' => 'sanitize_jumbo_logged_in',));
        function sanitize_jumbo_logged_in( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('jumbo_logged_in',array('type' => 'checkbox','label' => 'Show when logged in only', 'description' => 'Show Jumbo only if user is logged in (if unchecked, Jumbo will be visible to all visitors).', 'section' => 'jumbo_misc_section',));
        
        /* smaller than */
        $wp_customize->add_setting('jumbo_smaller_than',array('sanitize_callback' => 'sanitize_jumbo_smaller_than',));
        function sanitize_jumbo_smaller_than($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_smaller_than',array(
            'type' => 'text',
            'label' => 'Hide at certain width/resolution',
            'description' => '<strong>Example #1:</strong> If you want to show Jumbo on desktop only, enter the values as 0 and 500. <br><br> <strong>Example #2:</strong> If you want to show Jumbo on mobile only, enter the values as 500 and 5000. <br><br> Feel free to experiment with your own values to get the result that is right for you. If fields are empty, Jumbo will be visible at all browser widths and resolutions. <br><br> Hide Jumbo if browser width or screen resolution (in pixels) is between...',
            'section' => 'jumbo_misc_section',
        ));
        
        /* larger than */
        $wp_customize->add_setting('jumbo_larger_than',array('sanitize_callback' => 'sanitize_jumbo_larger_than',));
        function sanitize_jumbo_larger_than($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_larger_than',array(
            'type' => 'text',
            'description' => '..and:',
            'section' => 'jumbo_misc_section',
        ));
        
        /* hide theme menu */
        $wp_customize->add_setting('jumbo_hide_theme_menu',array('sanitize_callback' => 'sanitize_jumbo_hide_theme_menu',));
        function sanitize_jumbo_hide_theme_menu($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('jumbo_hide_theme_menu',array(
            'type' => 'text',
            'label' => 'Advanced: Hide theme menu',
            'description' => 'If you have set Jumbo to show only at a certain resolution, know the class/ID of your theme menu and would like to hide it when Jumbo is visible, enter the class/ID into this field (example: "#my-theme-menu"). Multiple classes/IDs can be entered (separate with comma as you would in a stylesheet).',
            'section' => 'jumbo_misc_section',
        ));
        
    }
	add_action('customize_register', 'jumbo_theme_customizer');

	//
	// Add Jumbo to theme
	//
	function bonfire_jumbo_footer() {
	?>

	<?php if( get_theme_mod('jumbo_logged_in') != '') { ?>
	
		<?php if ( is_user_logged_in()) { ?>
			<?php include( plugin_dir_path( __FILE__ ) . 'include.php'); ?>
		<?php } ?>
		
	<?php } else { ?>
	
			<?php include( plugin_dir_path( __FILE__ ) . 'include.php'); ?>
	
	<?php } ?>

	<?php
	}
	add_action('wp_footer','bonfire_jumbo_footer');

	//
	// ADD the walker class (main menu descriptions)
	//
	class Jumbo_Menu_Description extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
	
			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
	
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= '<span class="bonfire-jumbo-main-desc">' . $item->description . '<br></span><span class="bonfire-jumbo-main-item">';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</span></a>';
			$item_output .= $args->after;
	
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
		}
	}
    
    //
	// ADD the walker class (secondary menu item descriptions)
	//
	class Jumbo_Secondary_Menu_Description extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
	
			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
	
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '<div class="jumbo-menu-item-description">' . $item->description . '</div>';
			$item_output .= '</a>';
			$item_output .= $args->after;
	
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
		}
	}

	//
	// ENQUEUE jumbo.css
	//
	function bonfire_jumbo_css() {
	// enqueue jumbo.css
		wp_register_style( 'bonfire-jumbo-css', plugins_url( '/jumbo.css', __FILE__ ) . '', array(), '1', 'all' );
		wp_enqueue_style( 'bonfire-jumbo-css' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_jumbo_css' );

	//
	// ENQUEUE jumbo.js
	//
	function bonfire_jumbo_js() {
	// enqueue jumbo.js
		wp_register_script( 'bonfire-jumbo-js', plugins_url( '/jumbo.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
		wp_enqueue_script( 'bonfire-jumbo-js' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_jumbo_js' );

	//
	// ENQUEUE jumbo-close-on-click.js
	//
	if( get_theme_mod('jumbo_menu_close_on_click') != '') {
		function bonfire_jumbo_close_on_click_js() {
			wp_register_script( 'bonfire-jumbo-close-on-click-js', plugins_url( '/jumbo-close-on-click.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
			wp_enqueue_script( 'bonfire-jumbo-close-on-click-js' );
		}
		add_action( 'wp_enqueue_scripts', 'bonfire_jumbo_close_on_click_js' );
	}

	//
	// ENQUEUE font-awesome.min.css (unless disabled)
	//
    if( get_theme_mod('jumbo_disable_fontawesome') == '') {
        function bonfire_jumbo_fontawesome() {
        // enqueue font-awesome.min.css
            wp_register_style( 'jumbo-fontawesome', plugins_url( '/fonts/font-awesome/css/font-awesome.min.css', __FILE__ ) . '', array(), '1', 'all' );  
            wp_enqueue_style( 'jumbo-fontawesome' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_jumbo_fontawesome' );
    }

    //
	// ENQUEUE Google WebFonts
	//
    function jumbo_fonts_url() {
		$font_url = '';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'jumbo' ) ) {
			$font_url = add_query_arg( 'family', urlencode( 'Open+Sans:400|Montserrat:400,700' ), "//fonts.googleapis.com/css" );
		}
		return $font_url;
	}
	function jumbo_scripts() {
		wp_enqueue_style( 'jumbo-fonts', jumbo_fonts_url(), array(), '1.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'jumbo_scripts' );

	//
	// Register Custom Menu Function
	//
	if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
			'jumbo-by-bonfire' => ( 'Jumbo, by Bonfire (primary)' ),
			'jumbo-by-bonfire-secondary' => ( 'Jumbo, by Bonfire (secondary)' )
		) );
	}
    
    //
	// Insert plugin customizer options into the footer
	//
	function bonfire_jumbo_header_customize() {
	?>

		<!-- BEGIN WP LIVE CUSTOMIZER SETTINGS -->

		<style>
        /* absolute position */
        <?php if( get_theme_mod('jumbo_absolute_position') != '') { ?>
        .jumbo-buttons-wrapper,
        .jumbo-by-bonfire-secondary-wrapper { position:absolute; }
        .jumbo-buttons-wrapper.jumbo-menu-button-active { position:fixed; }
        <?php } ?>
        /* right position */
        <?php if( get_theme_mod('jumbo_position_right') != '') { ?>
		.jumbo-buttons-wrapper { left:auto; right:0; }
        .jumbo-secondary-menu-active { left:auto; right:57px; }
        .jumbo-gravatar-tooltip-wrapper {
            left:auto;
            right:5px;
            
            -webkit-transform:translateX(0) translateY(-5px);
            -moz-transform:translateX(0) translateY(-5px);
            transform:translateX(0) translateY(-5px);
        }
        .jumbo-gravatar-tooltip-wrapper-active {
            -webkit-transform:translateX(0) translateY(0);
            -moz-transform:translateX(0) translateY(0);
            transform:translateX(0) translateY(0);
        }
        .jumbo-gravatar-tooltip-wrapper::before {
            left:auto;
            right:27px;
        }
		<?php } ?>
		
        /* if main menu button hidden */
        <?php if( get_theme_mod('jumbo_hide_main_menu_button') != '') { ?>
        .jumbo-secondary-menu-button { border-left:none; }
        .jumbo-secondary-menu-active { left:0; }
		<?php } ?>
		
		/* if menu positioned right */
		<?php if( get_theme_mod('jumbo_position_right') != '') { ?>
			.jumbo-secondary-menu-active {
				left:auto;
				right:0;
			}
		<?php } ?>
        
        /* secondary menu position if gravatar present */
        <?php if( get_theme_mod('jumbo_position_right') && get_theme_mod('jumbo_gravatar_email') != '') { ?>
        .jumbo-secondary-menu-active { left:auto; right:57px; }
        <?php } ?>
        
		/* left/right distance */
        <?php if( get_theme_mod('jumbo_position_right') && get_theme_mod('jumbo_side_distance') != '') { ?>
			.jumbo-buttons-wrapper {
				left:auto;
				right:<?php echo get_theme_mod('jumbo_side_distance'); ?>px;
			}
            <?php if( get_theme_mod('jumbo_gravatar_email') != '') { ?>
            .jumbo-secondary-menu-active { left:auto; right:calc(57px + <?php echo get_theme_mod('jumbo_side_distance'); ?>px); }
            <?php } else { ?>
            .jumbo-secondary-menu-active { left:auto; right:calc(-5px + <?php echo get_theme_mod('jumbo_side_distance'); ?>px); }
            <?php } ?>
        <?php } else if( get_theme_mod('jumbo_side_distance') != '') { ?>
			.jumbo-buttons-wrapper {
				left:<?php echo get_theme_mod('jumbo_side_distance'); ?>px;
			}
            <?php if( get_theme_mod('jumbo_hide_main_menu_button') != '') { ?>
            .jumbo-secondary-menu-active { left:calc(-5px + <?php echo get_theme_mod('jumbo_side_distance'); ?>px); }
            <?php } else { ?>
            .jumbo-secondary-menu-active { left:calc(67px + <?php echo get_theme_mod('jumbo_side_distance'); ?>px); }
            <?php } ?>
		<?php } ?>

		/* top distance */
		.jumbo-buttons-wrapper { top:<?php echo get_theme_mod('jumbo_top_distance'); ?>px; }
        .jumbo-by-bonfire-secondary-wrapper { top:calc(58px + <?php echo get_theme_mod('jumbo_top_distance'); ?>px); }

        /* main menu button animations */
        <?php if( get_theme_mod('jumbo_main_menu_button_alt') != '') { ?>
			.jumbo-menu-button-active::before {
				-webkit-transform:translateY(8px);
				-moz-transform:translateY(8px);
				transform:translateY(8px);
			}
			.jumbo-menu-button-active::after {
				-webkit-transform:translateY(-8px);
				-moz-transform:translateY(-8px);
				transform:translateY(-8px);
			}
		<?php } else { ?>
			.jumbo-menu-button-active::before {
				-webkit-transform:translateY(8px) rotate(45deg);
				-moz-transform:translateY(8px) rotate(45deg);
				transform:translateY(8px) rotate(45deg);
			}
			.jumbo-menu-button-active::after {
				-webkit-transform:translateY(-8px) rotate(-45deg);
				-moz-transform:translateY(-8px) rotate(-45deg);
				transform:translateY(-8px) rotate(-45deg);
			}
			.jumbo-menu-button-active div.jumbo-menu-button-middle { opacity:0; }
		<?php } ?>
        
        /* main menu button rounded corners */
        <?php if( get_theme_mod('jumbo_main_menu_button_rounded') != '') { ?>
        .jumbo-menu-button::before,
        .jumbo-menu-button::after,
        .jumbo-menu-button div.jumbo-menu-button-middle { border-radius:25px; }
        <?php } ?>
        
        /* menu button colors */
		.jumbo-menu-button::after,
		.jumbo-menu-button::before,
		.jumbo-menu-button div.jumbo-menu-button-middle { background-color:<?php echo get_theme_mod('jumbo_menu_button_color'); ?>; }
		.jumbo-menu-button:hover::after,
		.jumbo-menu-button:hover::before,
		.jumbo-menu-button:hover div.jumbo-menu-button-middle,
        .jumbo-menu-button-active::after,
		.jumbo-menu-button-active::before,
		.jumbo-menu-button-active div.jumbo-menu-button-middle { background-color:<?php echo get_theme_mod('jumbo_menu_button_hover_color'); ?>; }
		.jumbo-menu-button { background-color:<?php echo get_theme_mod('jumbo_menu_button_background_color'); ?>;<?php if( get_theme_mod('jumbo_menu_button_transparent') != '') { ?> background-color:transparent;<?php } ?> }
		.jumbo-menu-button:hover,
        .jumbo-menu-button-active { background-color:<?php echo get_theme_mod('jumbo_menu_button_background_hover_color'); ?>;<?php if( get_theme_mod('jumbo_menu_button_transparent') != '') { ?> background-color:transparent;<?php } ?> }
        
        /* heading image */
        .jumbo-heading-image-wrapper img { width:<?php echo get_theme_mod('jumbo_heading_image_max_width'); ?>px; }

		/* main menu */
        .bonfire-jumbo-main-item { color:<?php echo get_theme_mod('jumbo_main_menu_item_color'); ?>; }
		.jumbo-main-menu-wrapper a:hover .bonfire-jumbo-main-item { color:<?php echo get_theme_mod('jumbo_main_menu_item_hover_color'); ?>; }
		.bonfire-jumbo-main-desc { color:<?php echo get_theme_mod('jumbo_main_menu_item_description_color'); ?>; <?php if( get_theme_mod('jumbo_main_menu_desc_uppercase') != '') { ?> text-transform:uppercase<?php } ?>; }
		.jumbo-main-menu-wrapper a:hover .bonfire-jumbo-main-desc { color:<?php echo get_theme_mod('jumbo_main_menu_item_description_hover_color'); ?>; }
		.jumbo-main-menu-wrapper a .bonfire-jumbo-main-item { <?php if( get_theme_mod('jumbo_main_menu_uppercase') != '') { ?>text-transform:uppercase<?php } ?>; }
		
        /* main menu item opacities */
        .bonfire-jumbo-main-item { opacity:<?php echo get_theme_mod('jumbo_main_menu_opacity'); ?>; }
		.bonfire-jumbo-main-desc { opacity:<?php echo get_theme_mod('jumbo_main_menu_description_opacity'); ?>; }
        
        /* main menu font */
		<?php if( get_theme_mod('jumbo_main_menu_theme_font') != '') { ?>
		.bonfire-jumbo-main-item {
			font-family:<?php echo get_theme_mod('jumbo_main_menu_theme_font'); ?>;
		}
		<?php } ?>

		/* main menu description font */
		<?php if( get_theme_mod('jumbo_main_menu_description_theme_font') != '') { ?>
		.bonfire-jumbo-main-desc {
			font-family:<?php echo get_theme_mod('jumbo_main_menu_description_theme_font'); ?>;
		}
		<?php } ?>

        /* main menu content alignments */
        .jumbo-main-menu-wrapper {
        <?php $jumbo_main_menu_horizontal_align = get_theme_mod( 'jumbo_main_menu_horizontal_align' ); if( $jumbo_main_menu_horizontal_align != '' ) { switch ( $jumbo_main_menu_horizontal_align ) { 
            case 'left': echo 'text-align:left;'; break; 
            case 'right': echo 'text-align:right;'; break;
        } } ?>
        }
        .jumbo-main-menu-wrapper-inner-inner .jumbo-by-bonfire {
        <?php $jumbo_main_menu_vertical_align = get_theme_mod( 'jumbo_main_menu_vertical_align' ); if( $jumbo_main_menu_vertical_align != '' ) { switch ( $jumbo_main_menu_vertical_align ) { 
            case 'top': echo 'vertical-align:top;'; break; 
            case 'bottom': echo 'vertical-align:bottom;'; break;
        } } ?>
        }
        
        /* custom main menu appearance speeds */
        <?php if( get_theme_mod('jumbo_main_menu_appearance_speed') != '') { ?>
        .jumbo-by-bonfire-wrapper {
            -webkit-transition:opacity <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s, -webkit-transform 0s ease <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s;
            -moz-transition:opacity <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s, -moz-transform 0s ease <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s;
            transition:opacity <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s, transform 0s ease <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s;
        }
        .jumbo-menu-active {
            -webkit-transition:opacity <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s, -webkit-transform 0s ease 0s;
            -moz-transition:opacity <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s, -moz-transform 0s ease 0s;
            transition:opacity <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s, transform 0s ease 0s;
        }
        .jumbo-appearance-top,
        .jumbo-appearance-bottom,
        .jumbo-appearance-left,
        .jumbo-appearance-right {
            -webkit-transition:opacity 0s ease <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s, -webkit-transform <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s;
            -moz-transition:opacity 0s ease <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s, -moz-transform <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s;
            transition:opacity 0s ease <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s, transform <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s;
        }
        .jumbo-menu-active.jumbo-appearance-top,
        .jumbo-menu-active.jumbo-appearance-bottom,
        .jumbo-menu-active.jumbo-appearance-left,
        .jumbo-menu-active.jumbo-appearance-right {
            -webkit-transition:opacity 0s ease 0s, -webkit-transform <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s;
            -moz-transition:opacity 0s ease 0s, -moz-transform <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s;
            transition:opacity 0s ease 0s, transform <?php echo get_theme_mod('jumbo_main_menu_appearance_speed'); ?>s ease 0s;
        }
        <?php } ?>
        
		/* top margin */
        .jumbo-by-bonfire { padding-top:<?php echo get_theme_mod('jumbo_main_menu_contents_top_margin'); ?>px; }
        
        /* main menu background options */
        .jumbo-dot-overlay { opacity:<?php echo get_theme_mod('jumbo_main_menu_dot_overlay_opacity'); ?>; }
        .jumbo-background-image {
            background-image:url(<?php echo get_theme_mod('jumbo_main_menu_background_image'); ?>);
            opacity:<?php echo get_theme_mod('jumbo_main_menu_background_image_opacity'); ?>;
        }
        .jumbo-background-color {
            background-color:<?php echo get_theme_mod('jumbo_main_menu_background_color'); ?>;
            opacity:<?php echo get_theme_mod('jumbo_main_menu_background_color_opacity'); ?>;
        }
        
        /* secondary menu button */
		.jumbo-secondary-menu-button::before { border-top-color:<?php echo get_theme_mod('jumbo_secondary_menu_button_color'); ?>; }
		.jumbo-secondary-menu-button:hover::before,
        .jumbo-secondary-menu-button-active::before { border-top-color:<?php echo get_theme_mod('jumbo_secondary_menu_button_hover_color'); ?>; }
		.jumbo-secondary-menu-button { background-color:<?php echo get_theme_mod('jumbo_secondary_menu_button_background_color'); ?>;<?php if( get_theme_mod('jumbo_secondary_menu_button_transparent') != '') { ?> background-color:transparent;<?php } ?> }
		.jumbo-secondary-menu-button:hover,
        .jumbo-secondary-menu-button-active { background-color:<?php echo get_theme_mod('jumbo_secondary_menu_button_background_hover_color'); ?>;<?php if( get_theme_mod('jumbo_secondary_menu_button_transparent') != '') { ?> background-color:transparent;<?php } ?> }
		
		/* menu buttons separator */
		.jumbo-secondary-menu-button { border-color:<?php echo get_theme_mod('jumbo_menu_button_divider_color'); ?>; }
        
		/* secondary menu */
		.jumbo-menu-tooltip::before { border-bottom-color:<?php echo get_theme_mod('jumbo_secondary_background_color'); ?>; }
		.jumbo-by-bonfire-secondary { background-color:<?php echo get_theme_mod('jumbo_secondary_background_color'); ?>; }
		.jumbo-by-bonfire-secondary .menu > li > a:hover { background-color:<?php echo get_theme_mod('jumbo_secondary_background_hover_color'); ?>; }
		.jumbo-by-bonfire-secondary .menu li,
        .jumbo-by-bonfire-secondary ul.sub-menu > li:first-child { border-color:<?php echo get_theme_mod('jumbo_secondary_menu_item_divider_color'); ?>; }
        .jumbo-by-bonfire-secondary ul li ul li:after { background-color:<?php echo get_theme_mod('jumbo_secondary_submenu_item_divider_color'); ?>; }
		.jumbo-by-bonfire-secondary .menu > li > a,
        .jumbo-by-bonfire-secondary .menu > li > a i { color:<?php echo get_theme_mod('jumbo_secondary_menu_item_color'); ?>; }
        .jumbo-by-bonfire-secondary .menu > li > a:hover,
        .jumbo-by-bonfire-secondary .menu > li > a:hover i { color:<?php echo get_theme_mod('jumbo_secondary_menu_item_hover_color'); ?>; }
		.jumbo-by-bonfire-secondary .sub-menu a,
        .jumbo-by-bonfire-secondary .sub-menu a i { color:<?php echo get_theme_mod('jumbo_secondary_submenu_item_color'); ?>; }
		.jumbo-by-bonfire-secondary .sub-menu a:hover,
        .jumbo-by-bonfire-secondary .sub-menu a:hover i { color:<?php echo get_theme_mod('jumbo_secondary_submenu_item_hover_color'); ?>; }
		.jumbo-by-bonfire-secondary ul.sub-menu { background:<?php echo get_theme_mod('jumbo_secondary_submenu_background_color'); ?>; }
		.jumbo-by-bonfire-secondary .menu li span span { border-color:<?php echo get_theme_mod('jumbo_secondary_submenu_arrow_divider'); ?>; }
		.jumbo-sub-arrow-inner::before,
        .jumbo-sub-arrow-inner::after { background-color:<?php echo get_theme_mod('jumbo_secondary_submenu_arrow_color'); ?>; }
		.jumbo-sub-arrow:hover .jumbo-sub-arrow-inner::before,
        .jumbo-sub-arrow:hover .jumbo-sub-arrow-inner::after { background-color:<?php echo get_theme_mod('jumbo_secondary_submenu_arrow_hover_color'); ?>; }
		/* expand arrow divider color (multi-level) */
		.jumbo-by-bonfire-secondary ul.menu > li li span span { border-color:<?php echo get_theme_mod('jumbo_secondary_submenu_arrow_divider_color_multi'); ?>; }
		/* expand arrow colors in sub-menus (multi-level) */
		.jumbo-by-bonfire-secondary .sub-menu .jumbo-sub-arrow-inner::before,
        .jumbo-by-bonfire-secondary .sub-menu .jumbo-sub-arrow-inner::after { background-color:<?php echo get_theme_mod('jumbo_secondary_submenu_arrow_color_multi'); ?>; }
		.jumbo-by-bonfire-secondary .sub-menu .jumbo-sub-arrow:hover .jumbo-sub-arrow-inner::before,
        .jumbo-by-bonfire-secondary .sub-menu .jumbo-sub-arrow:hover .jumbo-sub-arrow-inner::after { background-color:<?php echo get_theme_mod('jumbo_secondary_submenu_arrow_hover_color_multi'); ?>; }
        /* menu item descriptions */
        .jumbo-by-bonfire-secondary .menu > li > a .jumbo-menu-item-description { color:<?php echo get_theme_mod('jumbo_secondary_menu_item_description_color'); ?>; }
        .jumbo-by-bonfire-secondary .menu > li > a:hover > .jumbo-menu-item-description { color:<?php echo get_theme_mod('jumbo_secondary_menu_item_description_hover_color'); ?>; }
        .jumbo-by-bonfire-secondary .sub-menu > li > a .jumbo-menu-item-description { color:<?php echo get_theme_mod('jumbo_secondary_menu_item_description_color_multi'); ?>; }
        
        /* secondary menu uppercase */
        <?php if( get_theme_mod('jumbo_secondary_menu_uppercase') != '') { ?>
		.jumbo-by-bonfire-secondary .menu,
        .jumbo-by-bonfire-secondary .sub-menu { text-transform:uppercase; }
        <?php } ?>
        
        /* secondary menu width */
        .jumbo-by-bonfire-secondary { width:<?php echo get_theme_mod('jumbo_secondary_menu_width'); ?>px; }
        
        /* secondary menu theme font */
		<?php if( get_theme_mod('jumbo_secondary_menu_theme_font') != '') { ?>
		.jumbo-by-bonfire-secondary .menu a {
			font-family:<?php echo get_theme_mod('jumbo_secondary_menu_theme_font'); ?>;
		}
		<?php } ?>
        
        /* gravatar */
		.jumbo-gravatar-tooltip-wrapper { color:<?php echo get_theme_mod('jumbo_gravatar_tooltip_text_color'); ?>; background-color:<?php echo get_theme_mod('jumbo_gravatar_tooltip_background_color'); ?>; }
		.jumbo-gravatar-tooltip-wrapper::before { border-bottom-color:<?php echo get_theme_mod('jumbo_gravatar_tooltip_background_color'); ?>; }
        <?php if( get_theme_mod('jumbo_disable_gravatar_hover') == '') { ?>
		.jumbo-gravatar-wrapper:hover img { opacity:.6; }
		<?php } ?>
		
		/* gravatar tooltip font */
		<?php if( get_theme_mod('') != 'jumbo_gravatar_tooltip_theme_font') { ?>
		.jumbo-gravatar-tooltip-wrapper {
			font-family:<?php echo get_theme_mod('jumbo_gravatar_tooltip_theme_font'); ?>;
		}
		<?php } ?>
        
		/* Hide Jumbo between resolutions */
		@media (min-width:<?php echo get_theme_mod('jumbo_smaller_than'); ?>px) and (max-width:<?php echo get_theme_mod('jumbo_larger_than'); ?>px) {
			.jumbo-buttons-wrapper,
            .jumbo-by-bonfire-wrapper,
            .jumbo-main-menu-wrapper { display:none; }
		}
        /* hide theme menu */
		<?php if( get_theme_mod('jumbo_hide_theme_menu') != '') { ?>
		@media screen and (max-width:<?php echo get_theme_mod('jumbo_smaller_than'); ?>px) {
			<?php echo get_theme_mod('jumbo_hide_theme_menu'); ?> { display:none !important; }
		}
		@media screen and (min-width:<?php echo get_theme_mod('jumbo_larger_than'); ?>px) {
			<?php echo get_theme_mod('jumbo_hide_theme_menu'); ?> { display:none !important; }
		}
		<?php } ?>
		</style>
		<!-- END WP LIVE CUSTOMIZER SETTINGS -->
	
	<?php
	}
	add_action('wp_footer','bonfire_jumbo_header_customize');

?>