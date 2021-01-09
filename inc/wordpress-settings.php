<?php


if ( ! function_exists( 'rgm_setup_options' ) ) :
    function rgm_setup_options () {
        global $wpdb;
        $create_table_query = "
        CREATE TABLE IF NOT EXISTS `wp_votes` (
            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `phrase_id` bigint(20) unsigned NOT NULL DEFAULT '0',
            `county_id` bigint(20) unsigned NOT NULL DEFAULT '0',
            `mass_media_id` bigint(20) unsigned NOT NULL DEFAULT '0',
            `user_id` bigint(20) unsigned DEFAULT NULL,
            `value` tinyint(3) unsigned NOT NULL DEFAULT '0',
            `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `ip_address` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `post_id` (`phrase_id`),
            KEY `user_id` (`user_id`),
            KEY `county_id` (`county_id`),
            KEY `mass_media_id` (`mass_media_id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin2;
        ";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $create_table_query );
    }
endif;
add_action('after_switch_theme', 'rgm_setup_options');



if ( ! function_exists( 'rgm_setup' ) ) :

    function rgm_setup() {

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
add_action( 'after_setup_theme', 'rgm_setup' );



function wp_admin_remove_menu_pages() {

    remove_menu_page( 'edit-comments.php' );          //Comments
    //remove_menu_page( 'edit.php' );                   //Posts

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
    require get_template_directory() . '/inc/rgm-rest-api.php';
    $rgmRestRoutes = new Rgm_Rest_Api();
    $rgmRestRoutes->register_routes();
});















function generateCountiesDataJs(){
    $javaScriptString = "";
    $javaScriptString .= "var countiesData = {'type':'FeatureCollection','features':[]};";
    $args = array(
    'post_type' => 'rgm_county',
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
        'properties': {'name': '" . $title . "', 'subtitle': '" . $subTitle . "'},
        'geometry': {
            'type': '" . ((substr($coordinates, 0, 3) == '[[[')?'MultiPolygon':'Polygon') ."',
            'coordinates': [".$coordinates."]
            }
        });
    ";

    endwhile; wp_reset_postdata();

    $javaScriptString = minify_js($javaScriptString);
    file_put_contents( (get_template_directory().'/js/countiesData.min.js'), $javaScriptString );
}




function myprefix_custom_cron_schedule( $schedules ) {
    $schedules['every_six_hours'] = array(
        'interval' => 900, // Every 15 minutes
        'display'  => __( 'Every 15 minutes' ),
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'myprefix_custom_cron_schedule' );

//Schedule an action if it's not already scheduled
if ( ! wp_next_scheduled( 'myprefix_cron_hook' ) ) {
    wp_schedule_event( time(), 'every_six_hours', 'myprefix_cron_hook' );
}

///Hook into that action that'll fire every six hours
 add_action( 'myprefix_cron_hook', 'myprefix_cron_function' );

//create your function, that runs on cron
function myprefix_cron_function() {
    //your function...
    generateCountiesDataJs();
}








// add custom column to wp-admin rgm_phrase posts list

add_filter( 'manage_rgm_phrase_posts_columns', 'set_custom_edit_rgm_phrase_columns' );
add_action( 'manage_rgm_phrase_posts_custom_column' , 'custom_rgm_phrase_column', 10, 2 );
 
function set_custom_edit_rgm_phrase_columns($columns) {
    // unset( $columns['author'] );
    // unset( $columns['date'] );

    // $columns['rgm_phrase_meaning'] = __('Znaczenie');
    var_dump($columns); exit;

    $newColumnsOrder = array(
        'title' => $columns['taxonomy-rgm_phrase_kind'],
        'rgm_phrase_meaning' => __('Znaczenie'),
        'taxonomy-rgm_phrase_kind' => $columns['taxonomy-rgm_phrase_kind'],
        'taxonomy-rgm_phrase_tag' => $columns['taxonomy-rgm_phrase_tag'],
    );

    $columns = $newColumnsOrder;
 
    return $columns;
}
 
function custom_rgm_phrase_column( $column, $post_id ) {
    switch ( $column ) {
 
        case 'rgm_phrase_meaning' :
            echo 'siema!';
            break;
    }
}