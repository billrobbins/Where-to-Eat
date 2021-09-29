<?php

/**
 * Register Restaurant Post Type and Taxonomies
 * 
 * This class registers our restaurant custom post type plus the style and location taxonomies.
 * 
 * @since 1.0.0 
 * 
 */

class Restaurant_Type_Taxo {

    public function __construct() {
        add_action( 'init', [ $this, 'register_restaurant_type' ], 0 );
        add_action( 'init', [ $this, 'create_style_tax' ], 0 );
        add_action( 'init', [ $this, 'create_location_tax' ], 0 );
    }

    // Register restaurant post type
    function register_restaurant_type() {
            
        if ( post_type_exists( 'restaurant' ) ) {
            return;
        }
        
        $restaurant_args = [
            'label'                 => __( 'Restaurant' ),
            'description'           => __( 'List restaurants where you like to eat.' ),
            'supports'              => [ 'title', ],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-carrot',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,		
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'rest_base'             => 'restaurant',
            'rewrite' 				=> [ 'slug' => 'restaurant', 'with_front' => false ],
            'labels' 				=> [
                'name'                  => _x( 'Restaurants', 'Post Type General Name' ),
                'singular_name'         => _x( 'Restaurant', 'Post Type Singular Name' ),
                'menu_name'             => __( 'Restaurants' ),
                'name_admin_bar'        => __( 'Restaurant' ),
                'archives'              => __( 'Restaurant Archives' ),
                'parent_item_colon'     => __( 'Restaurant Parent' ),
                'all_items'             => __( 'Restaurants' ),
                'add_new_item'          => __( 'Add New Restaurant' ),
                'add_new'               => __( 'Add Restaurant' ),
                'new_item'              => __( 'New Restaurant' ),
                'edit_item'             => __( 'Edit Restaurant' ),
                'update_item'           => __( 'Update Restaurant' ),
                'view_item'             => __( 'View Restaurant' ),
                'search_items'          => __( 'Search Restaurant' ),
                'not_found'             => __( 'No restaurants' ),
                'not_found_in_trash'    => __( 'No restaurants in the trash' ),
            ],
        ];
        
        register_post_type( 'restaurant', apply_filters( 'where_to_eat_register', $restaurant_args ) );

    }
    
    // Register style taxonomy
    function create_style_tax() {

        $style_args = [
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => [ 'slug' => 'style' ],
            'labels' => [
                'name' => _x( 'Style', 'taxonomy general name' ),
                'singular_name' => _x( 'Style', 'taxonomy singular name' ),
                'search_items' =>  __( 'Search Styles' ),
                'popular_items' => __( 'Popular Styles' ),
                'all_items' => __( 'All Styles' ),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __( 'Edit Style' ), 
                'update_item' => __( 'Update Style' ),
                'add_new_item' => __( 'Add New Style' ),
                'new_item_name' => __( 'New Style Name' ),
                'separate_items_with_commas' => __( 'Separate styles with commas' ),
                'add_or_remove_items' => __( 'Add or remove styles' ),
                'choose_from_most_used' => __( 'Choose from the most used styles' ),
                'menu_name' => __( 'Styles' ),
            ],
        ];

        register_taxonomy('style','restaurant', $style_args);

    }

    // Register location taxonomy
    function create_location_tax() {

        $location_args = [
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => [ 'slug' => 'location' ],
            'labels' => [
                'name' => _x( 'Location', 'taxonomy general name' ),
                'singular_name' => _x( 'Location', 'taxonomy singular name' ),
                'search_items' =>  __( 'Search Locations' ),
                'popular_items' => __( 'Popular Locations' ),
                'all_items' => __( 'All Locations' ),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __( 'Edit Location' ), 
                'update_item' => __( 'Update Location' ),
                'add_new_item' => __( 'Add New Location' ),
                'new_item_name' => __( 'New Location Name' ),
                'separate_items_with_commas' => __( 'Separate locations with commas' ),
                'add_or_remove_items' => __( 'Add or remove locations' ),
                'choose_from_most_used' => __( 'Choose from the most used locations' ),
                'menu_name' => __( 'Locations' ),
            ],
        ];

        register_taxonomy('location','restaurant', $location_args);

    }

}

$restaurant_type_taxo = new Restaurant_Type_Taxo();