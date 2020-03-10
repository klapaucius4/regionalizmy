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
    )
);