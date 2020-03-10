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