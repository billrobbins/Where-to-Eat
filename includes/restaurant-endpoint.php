<?php

/**
 * Restaurant REST Endpoints
 * 
 * This class creates the endpoint necessary for the React app to search by style and location
 * 
 * @since 1.0.0 
 */


class Restaurant_REST_Endpoint {

    public function __construct() {
        add_action( 'rest_api_init', [ $this, 'ijab_register_restaurant_route' ], 0 );
    }

    // Register our custom endpoint for restaurants
    function ijab_register_restaurant_route() {

        register_rest_route( 'ijab/v1', '/restaurants', [
            'methods' => WP_REST_Server::READABLE,
            'callback' => [ $this, 'get_the_restaurant' ],
         ] );

    }

    // Returns restaurants for our location and style searches
    function get_the_restaurant( $request ) {

        $args = [
            'post_type' => 'restaurant',
            'post_status' => 'publish',
            'tax_query' => [
            'relation' => 'AND',
                [
                    'taxonomy' => 'location',
                    'field'    => 'slug',
                    'terms'    => $request['location']
                ],
                [
                    'taxonomy' => 'style',
                    'field'    => 'slug',
                    'terms'    => $request['style']
                ]
            ]
        ];

        $the_query = new WP_Query( $args );
        $results = [];

        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) : $the_query->the_post(); 
                $results[] = [
                  'name' =>  get_the_title(),
                  'id' => get_the_ID()
                ];
            endwhile;
        } else {
                $results = [];
        }

        return rest_ensure_response( $results );

    }

}

$restaurant_rest_endpoint = new Restaurant_REST_Endpoint();