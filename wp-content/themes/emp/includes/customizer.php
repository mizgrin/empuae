<?php

/******************************************************
================ Customizer ===================
*******************************************************/

function emp_customize_register( $wp_customize ){

// Sections
    $emp['sect'][] = array( 'emp_logo_options', esc_html__( 'Logo', 'emp' ), 9 );
    $emp['sect'][] = array('emp_contact_number', esc_html__('Contact', 'emp'), 10);
    $emp['sect'][] = array('emp_social_media_icons', esc_html__('Social Media Icons', 'emp'), 11);
    $emp['sect'][] = array( 'emp_site_general_options', esc_html__( 'Site general options', 'emp' ), 12 );
    

//setting
    //logo
    $emp['set'][] = array( 'emp_logo', '', 'emp_sanitize_image' );
    $emp['ctrl'][] = array( 'emp_logo', 'image', esc_html__( 'Site Logo', 'emp' ), 'emp_logo_options' );

    $emp['set'][] = array( 'emp_footer_logo', '', 'emp_sanitize_image' );
    $emp['ctrl'][] = array( 'emp_footer_logo', 'image', esc_html__( 'Footer site Logo', 'emp' ), 'emp_logo_options' );

    $emp['set'][] = array( 'emp_footer_text', '', 'emp_sanitize_image' );
    $emp['ctrl'][] = array( 'emp_footer_text', 'text', esc_html__( 'Footer site text', 'emp' ), 'emp_logo_options' );
    
    //exp logo
 

    // Social media icon
    $emp['set'][] = array('emp_social_media_icon1', 'facebook', 'emp_sanitize_url');
    $emp['ctrl'][] = array('emp_social_media_icon1', 'text', esc_html__('Facebook', 'emp'), 'emp_social_media_icons');

    $emp['set'][] = array('emp_social_media_icon2', 'linkedin', 'emp_sanitize_url');
    $emp['ctrl'][] = array('emp_social_media_icon2', 'text', esc_html__('Linkedin', 'emp'), 'emp_social_media_icons');

    $emp['set'][] = array('emp_social_media_icon3', 'twitter', 'emp_sanitize_url');
    $emp['ctrl'][] = array('emp_social_media_icon3', 'text', esc_html__('Twitter', 'emp'), 'emp_social_media_icons');
    
    $emp['set'][] = array('emp_social_media_icon4', 'instagram', 'emp_sanitize_url');
    $emp['ctrl'][] = array('emp_social_media_icon4', 'text', esc_html__('Instagram', 'emp'), 'emp_social_media_icons');
    

    // End of Social Media Icons

    // Contact

    $emp['set'][] = array('emp_map', '', 'emp_sanitize_number');
    $emp['ctrl'][] = array('emp_map', 'text', esc_html__('Map', 'emp'), 'emp_contact_number');


    $emp['set'][] = array('emp_number', 'number', 'emp_sanitize_number');
    $emp['ctrl'][] = array('emp_number', 'text', esc_html__('Contact Number', 'emp'), 'emp_contact_number');

    $emp['set'][] = array('emp_number2', 'number', 'emp_sanitize_number');
    $emp['ctrl'][] = array('emp_number2', 'text', esc_html__('Second Contact Number', 'emp'), 'emp_contact_number');

    $emp['set'][] = array('emp_address', '', 'emp_sanitize_number');
    $emp['ctrl'][] = array('emp_address', 'text', esc_html__('Contact Address', 'emp'), 'emp_contact_number');

    $emp['set'][] = array('emp_mail', '', 'emp_sanitize_number');
    $emp['ctrl'][] = array('emp_mail', 'text', esc_html__('Mail', 'emp'), 'emp_contact_number');

    //Site general options
    $emp['set'][] = array( 'emp_error_page_image', '', 'emp_sanitize_image' );
    $emp['ctrl'][] = array( 'emp_error_page_image', 'image', esc_html__( '404 image', 'emp' ), 'emp_site_general_options' );

    $emp['set'][] = array( 'emp_error_page_text', '', 'emp_sanitize_text' );
    $emp['ctrl'][] = array( 'emp_error_page_text', 'text', esc_html__( '404 Text', 'emp' ), 'emp_site_general_options' );

    //print section

    foreach ( $emp['sect'] as $section ) {

        $wp_customize->add_section( $section[0] , array(
            'title'       => $section[1],
            'priority'    => $section[2],
        ) );
    }

// Print Settings
    foreach ( $emp['set'] as $setting ) {
//        print_r($control[0]);

        $wp_customize->add_setting( $setting[0], array(

            'default'   => '',
        ));
    }


// Print Controls
    foreach ( $emp['ctrl'] as $control ) {

        static $i = 1;

        switch ($control[1]) {

            case 'text':

                $wp_customize->add_control(  new WP_Customize_Control($wp_customize, $control[0], array(
                        'label' => $control[2],
                        'section' => $control[3],

                    ))
                );

                break;

            case 'image':

                $wp_customize->add_control(
                    new WP_Customize_Image_Control( $wp_customize, $control[0], array(
                        'label' => $control[2],
                        'section'  => $control[3],
                        'description' => 'Upload a image to change',

                    ) ) );
                break;

            case 'buttontab':
        }

        $i++;

        } //end foreach
    }

add_action( 'customize_register', 'emp_customize_register' );

