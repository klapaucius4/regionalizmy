<?php

register_post_type('regionalizmy_phrase', array(
        'labels' => array(
            'name'          => __('Frazy', 'regionalizmy'),
            'singular_name' => __('Fraza', 'regionalizmy'),
        ),
        'public' => true,
        // 'has_archive' => __('oferta', 'regionalizmy'),
        // 'rewrite' => array('slug' => __('oferta', 'regionalizmy'), 'with_front' => true),
        'supports' => array( 'title', 'editor' ),
        'menu_icon' => 'dashicons-editor-ol',
    )
);



register_post_type('regionalizmy_county', array(
        'labels' => array(
            'name'          => __('Powiaty', 'regionalizmy'),
            'singular_name' => __('Powiat', 'regionalizmy'),
        ),
        'public' => true,
        'supports' => array( 'title' ),
        'menu_icon' => 'dashicons-admin-site',
        'taxonomies' => array('regionalizmy_province', 'regionalizmy_city'),
    )
);
register_taxonomy('regionalizmy_province', array('regionalizmy_county'), array(
    'labels' => array(
        'name' => __('Województwa', 'regionalizmy'),
        'singular_name' => __('Województwo', 'regionalizmy'),
        'search_items' =>  __( 'Szukaj województwa' ),
        'all_items' => __( 'Wszystkie województwa' ),
    //     'parent_item' => __( 'Parent Type' ),
    //     'parent_item_colon' => __( 'Parent Type:' ),
    //     'edit_item' => __( 'Edit Type' ), 
    //     'update_item' => __( 'Update Type' ),
    //     'add_new_item' => __( 'Add New Type' ),
    //     'new_item_name' => __( 'New Type Name' ),
    //     'menu_name' => __( 'Types' ),
    ),
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
    )
);
register_taxonomy('regionalizmy_city', array('regionalizmy_county'), array(
    'labels' => array(
        'name' => __('Miasta', 'regionalizmy'),
        'singular_name' => __('Miasto', 'regionalizmy'),
        'search_items' =>  __( 'Szukaj miasta' ),
        'all_items' => __( 'Wszystkie miasta' ),
    ),
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
    )
);



// Add the custom columns to the regionalizmy_county post type:
add_filter( 'manage_regionalizmy_county_posts_columns', 'set_custom_edit_regionalizmy_county_columns' );
function set_custom_edit_regionalizmy_county_columns($columns) {
    // unset( $columns['author'] );

    $columns['county_town'] = __( 'Miasto powiatowe', 'your_text_domain' );

    return $columns;
}

// Add the data to the custom columns for the regionalizmy_county post type:
add_action( 'manage_regionalizmy_county_posts_custom_column' , 'custom_regionalizmy_county_column', 10, 2 );
function custom_regionalizmy_county_column( $column, $post_id ) {
    switch ( $column ) {

        case 'county_town' :
            echo get_field( 'miasto_na_prawach_powiatu', $post_id )?("<b>".get_the_title($post_id)."</b>"):get_field('miasto_powiatowe', $post_id); 
            break;

    }
}

