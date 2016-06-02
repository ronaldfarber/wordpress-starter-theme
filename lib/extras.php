<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;
use Roots\Sage\Assets;


// ADD <BODY> CLASSES

    function body_class($classes) {
        // Add page slug if it doesn't exist
        if (is_single() || is_page() && !is_front_page()) {
            if (!in_array(basename(get_permalink()), $classes)) {
                $classes[] = basename(get_permalink());
            }
        }

        // Add class if sidebar is active
        if (Setup\display_sidebar()) {
            $classes[] = 'sidebar-primary';
        }

        return $classes;
    }
    add_filter('body_class', __NAMESPACE__ . '\\body_class');



// CLEAN UP THE_EXCERPT()

    function excerpt_more() {
        return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', '_textdomain_') . '</a>';
    }
    add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');



// TURN OFF ADMIN BAR ON FRONT-END

    show_admin_bar( false );



// ADVANCED CUSTOM FIELDS SETTINGS 

    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'page_title'    => 'Global Site Settings',
            'menu_title'    => 'Global Settings',
            'menu_slug'     => 'global-settings',
            'icon_url'      => 'dashicons-admin-settings',
            'position'      => '0.12',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));

        // acf_add_options_sub_page(array(
        //     'page_title'    => 'Page Defaults',
        //     'menu_title'    => 'Page Defaults',
        //     'parent_slug'   => 'global-settings',
        // ));

        // acf_add_options_sub_page(array(
        //     'page_title'    => '404 Page',
        //     'menu_title'    => '404 Page',
        //     'parent_slug'   => 'global-settings',
        // ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Footer Settings',
            'menu_title'    => 'Footer',
            'parent_slug'   => 'global-settings',
        ));
        
    }



// ADD CUSTOM WYSIWIG TOOL BAR TO ACF

    add_filter( 'acf/fields/wysiwyg/toolbars' , __NAMESPACE__ . '\\my_toolbars'  );
    function my_toolbars( $toolbars ) {

        // Add a new toolbar called "Minimal"
        $toolbars['Minimal' ] = array();
        $toolbars['Minimal' ][1] = array('bold' , 'italic' , 'underline', 'bullist', 'numlist', 'link', 'unlink' );

        // return $toolbars - IMPORTANT!
        return $toolbars;
    }



// GET CURRENT TEMPLATE NAME 

    add_filter( 'template_include', __NAMESPACE__ . '\\var_template_include', 1000 );
    function var_template_include( $t ){
        $GLOBALS['current_theme_template'] = basename($t);
        return $t;
    }

    function get_current_template( $echo = false ) {
        if( !isset( $GLOBALS['current_theme_template'] ) )
            return false;
        if( $echo )
            echo $GLOBALS['current_theme_template'];
        else
            return $GLOBALS['current_theme_template'];
    }



// ALLOW SVG UPLOADS

    add_filter('upload_mimes', __NAMESPACE__ . '\\custom_upload_mimes');

    function custom_upload_mimes ( $existing_mimes=array() ) {

        // add the file extension to the array
        $existing_mimes['svg'] = 'mime/type';

        return $existing_mimes;

    }



// LOAD CUSTOM ADMIN CSS
    function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', Assets\asset_path('styles/admin.css'), false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
    }
    add_action( 'admin_head', __NAMESPACE__ . '\\load_custom_wp_admin_style' );
