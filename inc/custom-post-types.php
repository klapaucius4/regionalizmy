<?php

register_post_type('rgm_phrase', array(
        'labels' => array(
            'name'          => __('Frazy', 'regionalizmy'),
            'singular_name' => __('Fraza', 'regionalizmy'),
        ),
        'public' => true,
        // 'has_archive' => __('oferta', 'regionalizmy'),
        'rewrite' => array('slug' => __('oferta', 'slownik'), 'with_front' => true),
        'supports' => array( 'title' ),
        'menu_icon' => 'dashicons-editor-ol',
    )
);

register_post_type('rgm_mass_media', array(
        'labels' => array(
            'name'          => __('Środki przekazu', 'regionalizmy'),
            'singular_name' => __('Środek przekazu', 'regionalizmy'),
        ),
        'public' => true,
        'supports' => array( 'title' ),
        'menu_icon' => 'dashicons-playlist-video',
    )
);

register_post_type('rgm_county', array(
        'labels' => array(
            'name'          => __('Powiaty', 'regionalizmy'),
            'singular_name' => __('Powiat', 'regionalizmy'),
        ),
        'public' => true,
        'supports' => array( 'title' ),
        'menu_icon' => 'dashicons-admin-site',
        'taxonomies' => array('rgm_province', 'rgm_city'),
    )
);
register_taxonomy('rgm_province', array('rgm_county'), array(
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
register_taxonomy('rgm_city', array('rgm_county'), array(
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



// Add the custom columns to the rgm_county post type:
add_filter( 'manage_rgm_county_posts_columns', 'set_custom_edit_rgm_county_columns' );
function set_custom_edit_rgm_county_columns($columns) {
    // unset( $columns['author'] );

    $columns['county_town'] = __( 'Miasto powiatowe', 'your_text_domain' );

    return $columns;
}

// Add the data to the custom columns for the rgm_county post type:
add_action( 'manage_rgm_county_posts_custom_column' , 'custom_rgm_county_column', 10, 2 );
function custom_rgm_county_column( $column, $post_id ) {
    switch ( $column ) {

        case 'county_town' :
            if(get_field( 'miasto_na_prawach_powiatu', $post_id )){
                echo "&#x2714;";
            }else{
                echo "-";
            }
            break;

    }
}

