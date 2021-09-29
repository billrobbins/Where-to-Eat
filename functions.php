<?php

/**
 * Theme Functions
 * 
 * This file loads the required WordPress functionality for our app
 * 
 * @since 1.0.0 
 * 
 */

// Load our restaurant post type and taxonomies
    include( get_template_directory().'/includes/restaurant-post-type.php' );

// Load our custom endpoints
    include( get_template_directory().'/includes/restaurant-endpoint.php' );
    include( get_template_directory().'/includes/setup-endpoint.php' );

// Enqueue hashed js files from build
    function ijab_enqueue_hashed_scripts() {

        $dirJS = new DirectoryIterator(get_stylesheet_directory() . '/build/static/js');

        foreach ( $dirJS as $file ) {

            if (pathinfo( $file, PATHINFO_EXTENSION ) === 'js') {

                $fullName = basename( $file );
                $name = substr(basename( $fullName ), 0, strpos( basename( $fullName ), '.' ) );
            
                switch( $name ) {
            
                    case 'main':
                        $deps = [ 'runtime-main' ];
                        break;
                    default:
                        $deps = null;               
                        break;
            
                }
            
                wp_enqueue_script( $name, get_template_directory_uri() . '/build/static/js/' . $fullName, $deps, null, true );
            
            }
        
        }

    }

    add_action( 'wp_enqueue_scripts', 'ijab_enqueue_hashed_scripts', 0 );

// add hashed css files from build
    function ijab_enqueue_hashed_css() {

        $dirCSS = new DirectoryIterator(get_stylesheet_directory() . '/build/static/css');

        foreach ( $dirCSS as $file ) {

            if (pathinfo( $file, PATHINFO_EXTENSION ) === 'css') {

                $fullName = basename( $file );
                $name = substr(basename( $fullName ), 0, strpos(basename( $fullName ), '.'));
            
                switch( $name ) {
            
                    default:
                        $deps = null;               
                        break;
            
                }
            
                wp_enqueue_style( $name, get_template_directory_uri() . '/build/static/css/' . $fullName, $deps, null );
            
            }
        
        }

    }

    add_action( 'wp_enqueue_scripts', 'ijab_enqueue_hashed_css', 0 );