<?php


if ( ! function_exists( 'regionalizmy_setup_options' ) ) :
    function regionalizmy_setup_options () {
        global $wpdb;
        $create_table_query = "
        CREATE TABLE IF NOT EXISTS `wp_votes` (
            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `phrase_id` bigint(20) unsigned NOT NULL DEFAULT '0',
            `county_id` bigint(20) unsigned NOT NULL DEFAULT '0',
            `user_id` bigint(20) unsigned DEFAULT NULL,
            `value` tinyint(3) unsigned NOT NULL DEFAULT '0',
            `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `ip_address` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `post_id` (`phrase_id`),
            KEY `user_id` (`user_id`),
            KEY `county_id` (`county_id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin2;
        ";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $create_table_query );
    }
endif;
add_action('after_switch_theme', 'regionalizmy_setup_options');



if ( ! function_exists( 'regionalizmy_setup' ) ) :

    function regionalizmy_setup() {

        register_nav_menus( array(
            'menu-1' => __( 'Menu główne', 'regionalizmy' ),
        ) );
    
        /*
        load_theme_textdomain( 'regionalizmy', get_template_directory() . '/languages' );
        
        add_theme_support( 'automatic-feed-links' );
    
        add_theme_support( 'title-tag' );
    
        add_theme_support( 'post-thumbnails' );
    
        
    
    
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        add_theme_support( 'customize-selective-refresh-widgets' );

        */



        //hide admin bar
        show_admin_bar(false);

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
        background-image: url('<?= get_template_directory_uri(); ?>/img/logo.svg');
        width: 320px;
        height: 36px;
        background-size: contain;
    } 
    </style>
    <?php 
}
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );


/**
 * save ACF structure to .json file
 */

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_template_directory() . '/acf-data';
    
    
    // return
    return $path;
    
}



add_action( 'rest_api_init', function () {
    /**
     * RGM_REST_Routes
     */
    require get_template_directory() . '/inc/rgm-rest-routes.php';
    $rgmRestRoutes = new RGM_REST_Routes();
    $rgmRestRoutes->register_routes();
});








function generateCountiesDataJs(){
    $javaScriptString = "";
    $javaScriptString .= "var countiesData = {'type':'FeatureCollection','features':[]};";
    $args = array(
    'post_type' => 'regionalizmy_county',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => 'koordynaty',
            'compare' => 'EXISTS'
        )
        )
    );
    $myQuery = new WP_Query($args);
    $counter = 1;
    while($myQuery->have_posts()): $myQuery->the_post();
    $coordinates = get_field('koordynaty');
    if(!$coordinates){
        continue;
    }
    $title = 'powiat '.get_the_title();
    $subTitle = '';
    if(get_field('miasto_na_prawach_powiatu')){
        $title = get_the_title();
        $subTitle = '(miasto na prawach powiatu)';
    }
    $coordinates = rgmCoordinatesConverter($coordinates);

    $javaScriptString .= "
        countiesData.features.push(
        {
        'type': 'Feature',
        'id': '" . get_the_ID() . "',
        'properties': {'name': '" . $title . "', 'density': " . intval(rand(1, 100)) . ", 'subtitle': '" . $subTitle . "'},
        'geometry': {
            'type': '" . ((substr($coordinates, 0, 3) == '[[[')?'MultiPolygon':'Polygon') ."',
            'coordinates': [".$coordinates."]
            }
        });";

    endwhile; wp_reset_postdata();

    $javaScriptString = minify_js($javaScriptString);
    file_put_contents( (get_template_directory().'/js/countiesData.min.js'), $javaScriptString );
}


