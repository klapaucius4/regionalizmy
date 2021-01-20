<?php

register_post_type('rgm_phrase', array(
        'labels' => array(
            'name'          => __('Frazy', 'rgm'),
            'singular_name' => __('Fraza', 'rgm'),
        ),
        'public' => true,
        'has_archive' => __('slownik', 'rgm'),
        'rewrite' => array('slug' => __('slownik', 'rgm'), 'with_front' => true),
        'supports' => array( 'title' ),
        'menu_icon' => 'dashicons-editor-ol',
    )
);

register_post_type('rgm_meaning', array(
        'labels' => array(
            'name'          => __('Znaczenia', 'rgm'),
            'singular_name' => __('Znaczenie', 'rgm'),
        ),
        'public' => true,
        'has_archive' => __('znaczenia', 'rgm'),
        'rewrite' => array('slug' => __('znaczenia', 'rgm'), 'with_front' => true),
        'supports' => array( 'title' ),
        'menu_icon' => 'dashicons-welcome-learn-more',
    )
);

register_taxonomy( 'rgm_phrase_kind', array('rgm_phrase'),
    array(
        'hierarchical'      => false,
        'labels'            => array(
            'name'              => __( 'Rodzaje', 'rgm' ),
            'singular_name'     => __( 'Rodzaj', 'rgm' )
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => __('tag', 'rgm') ],
    )
);

register_taxonomy( 'rgm_phrase_tag', array('rgm_phrase', 'rgm_meaning'),
    array(
        'hierarchical'      => false,
        'labels'            => array(
            'name'              => __( 'Tagi', 'rgm' ),
            'singular_name'     => __( 'Tag', 'rgm' )
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => __('tag', 'rgm') ],
    )
);

register_post_type('rgm_mass_media', array(
        'labels' => array(
            'name'          => __('Środki przekazu', 'rgm'),
            'singular_name' => __('Środek przekazu', 'rgm'),
        ),
        'public' => true,
        'supports' => array( 'title' ),
        'menu_icon' => 'dashicons-playlist-video',
    )
);

register_post_type('rgm_county', array(
        'labels' => array(
            'name'          => __('Powiaty', 'rgm'),
            'singular_name' => __('Powiat', 'rgm'),
        ),
        'public' => true,
        'supports' => array( 'title' ),
        'menu_icon' => 'dashicons-admin-site',
        'taxonomies' => array('rgm_province', 'rgm_city'),
    )
);
register_taxonomy('rgm_province', array('rgm_county'), array(
    'labels' => array(
        'name' => __('Województwa', 'rgm'),
        'singular_name' => __('Województwo', 'rgm'),
        'search_items' =>  __( 'Szukaj województwa', 'rgm' ),
        'all_items' => __( 'Wszystkie województwa', 'rgm' ),
    //     'parent_item' => __( 'Parent Type', 'rgm' ),
    //     'parent_item_colon' => __( 'Parent Type:', 'rgm' ),
    //     'edit_item' => __( 'Edit Type', 'rgm' ), 
    //     'update_item' => __( 'Update Type', 'rgm' ),
    //     'add_new_item' => __( 'Add New Type', 'rgm' ),
    //     'new_item_name' => __( 'New Type Name', 'rgm' ),
    //     'menu_name' => __( 'Types', 'rgm' ),
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
        'name' => __(' Miasta', 'rgm' ),
        'singular_name' => __( 'Miasto', 'rgm' ),
        'search_items' =>  __( 'Szukaj miasta', 'rgm' ),
        'all_items' => __( 'Wszystkie miasta', 'rgm' ),
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

    $columns['county_town'] = __( 'Miasto powiatowe', 'rgm' );

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

