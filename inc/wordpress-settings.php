<?php

if ( ! function_exists( 'regionalizmy_setup' ) ) :

    function regionalizmy_setup() {
    
        /*
        load_theme_textdomain( 'regionalizmy', get_template_directory() . '/languages' );
        
        add_theme_support( 'automatic-feed-links' );
    
        add_theme_support( 'title-tag' );
    
        add_theme_support( 'post-thumbnails' );
    
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Menu główne', 'regionalizmy' ),
        ) );
    
    
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        add_theme_support( 'customize-selective-refresh-widgets' );

        */

    }
endif;
add_action( 'after_setup_theme', 'regionalizmy_setup' );



function wp_admin_remove_menu_pages() {

    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'edit.php' );                   //Posts

}
add_action( 'admin_init', 'wp_admin_remove_menu_pages' );


function my_login_logo_one() { 
    ?>
    <style type="text/css"> 
    body.login div#login h1 a {
        background-image: url('<?= get_template_directory_uri(); ?>/img/logo.png');
        width: 320px;
        height: 36px;
        margin-bottom: 30px;
        background-size: contain;
    } 
    </style>
    <?php 
}
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );