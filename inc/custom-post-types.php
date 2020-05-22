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
        'taxonomies' => array('regionalizmy_province'),
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
  ));