<?php

/**
 * Restaurant REST Setup Endpoint
 * 
 * This class creates the endpoint to load all of our style and location terms.
 * 
 * @since 1.0.0 
 * 
 */

class Restaurant_Setup_REST_Endpoint {

    public function __construct() {
        add_action( 'rest_api_init', [ $this, 'ijab_register_setup_route' ], 0 );
    }

    // Register our custom endpoint for our app's options
    function ijab_register_setup_route() {

        register_rest_route( 'ijab/v1', '/options', [
            'methods' => WP_REST_Server::READABLE,
            'callback' => [ $this, 'get_the_app_options' ],
        ] );

    }

    // Returns the existing locations and styles for our app
    function get_the_app_options( $request ) {

        $terms = [];

        $terms['styles'] = get_terms( [
            'taxonomy' => 'style',
            'hide_empty' => false,
        ] );

        $terms['locations'] = get_terms( [
            'taxonomy' => 'location',
            'hide_empty' => false,
        ] );

        return rest_ensure_response( $terms );

    }

}

$restaurant_setup_rest_endpoint = new Restaurant_Setup_REST_Endpoint();