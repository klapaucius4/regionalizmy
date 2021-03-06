<?php


if ( ! function_exists( 'rgm_setup_options' ) ) :
    function rgm_setup_options () {
        global $wpdb;
        $create_table_query = "
        CREATE TABLE IF NOT EXISTS `wp_rgm_votes` (
            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `phrase_id` bigint(20) unsigned NOT NULL DEFAULT '0',
            `county_id` bigint(20) unsigned NOT NULL DEFAULT '0',
            `mass_media_id` bigint(20) unsigned NOT NULL DEFAULT '0',
            `user_id` bigint(20) unsigned DEFAULT NULL,
            `value` tinyint(3) unsigned NOT NULL DEFAULT '0',
            `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `ip_address` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `phrase_id` (`phrase_id`),
            KEY `user_id` (`user_id`),
            KEY `county_id` (`county_id`),
            KEY `mass_media_id` (`mass_media_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $create_table_query );
    }
endif;
add_action('after_switch_theme', 'rgm_setup_options');



if ( ! function_exists( 'rgm_setup' ) ) :

    function rgm_setup() {

        register_nav_menus( array(
            'menu-1' => __( 'Menu główne', 'rgm' ),
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




function rgm_custom_cron_schedule( $schedules ) {
    $schedules['every_six_hours'] = array(
        'interval' => 900, // Every 15 minutes
        'display'  => __( 'Every 15 minutes', 'rgm' ),
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'rgm_custom_cron_schedule' );

//Schedule an action if it's not already scheduled
if ( ! wp_next_scheduled( 'rgm_cron_hook' ) ) {
    wp_schedule_event( time(), 'every_six_hours', 'rgm_cron_hook' );
}

///Hook into that action that'll fire every six hours
 add_action( 'rgm_cron_hook', 'rgm_cron_function' );

//create your function, that runs on cron
function rgm_cron_function() {
    //your function...
    generateCountiesDataJs();
}








// add custom column to wp-admin rgm_phrase posts list start
add_filter( 'manage_rgm_phrase_posts_columns', 'set_custom_edit_rgm_phrase_columns' );
function set_custom_edit_rgm_phrase_columns($columns) {

    $newColumnsOrder = array(
        'cb' => $columns['cb'],
        'title' => $columns['title'],
        'rgm_phrase_meaning' => __('Znaczenie', 'rgm'),
        'rgm_phrase_nationwide' => __('Forma ogólnopolska', 'rgm'),
        'taxonomy-rgm_phrase_kind' => $columns['taxonomy-rgm_phrase_kind'],
        'taxonomy-rgm_phrase_tag' => $columns['taxonomy-rgm_phrase_tag'],
    );

    $columns = $newColumnsOrder;
 
    return $columns;
}

add_action( 'manage_rgm_phrase_posts_custom_column' , 'custom_rgm_phrase_column', 10, 2 );
function custom_rgm_phrase_column( $column, $post_id ) {
    switch ( $column ) {
        case 'rgm_phrase_meaning' :
            if($phraseDefinition = get_field('definicja', $post_id)){
                echo $phraseDefinition;
            }elseif($meaning = get_field('znaczenie', $post_id)){
                if(isset($meaning[0])){
                    echo '<a href="'.get_edit_post_link($meaning[0]->ID).'">'.$meaning[0]->post_title.'</a>';
                    if($definition = get_field('definicja', $meaning[0]->ID)){
                        echo ' - ' . $definition;
                    }
                }
            }else{
                echo __('Brak', 'rgm'); echo ' | <a href="'.admin_url('post-new.php?post_type=rgm_meaning').'" target="_blank">Utwórz nowe znaczenie</a>';
            }
            
            break;
        case 'rgm_phrase_nationwide':
            echo '<p class="text-center">' . (get_field('forma_ogolnopolska', $post_id) ? '&#10004;' : '&#10006;') . '</p>';
            break;
    }
}
// add custom column to wp-admin rgm_phrase posts list end


// add custom column to wp-admin rgm_meaning posts list start
add_filter( 'manage_rgm_meaning_posts_columns', 'set_custom_edit_rgm_meaning_columns' );
function set_custom_edit_rgm_meaning_columns($columns) {

    $newColumnsOrder = array(
        'cb' => $columns['cb'],
        'title' => $columns['title'],
        'rgm_meaning_phrases' => __('Frazy', 'rgm'),
        // 'taxonomy-rgm_meaning_kind' => $columns['taxonomy-rgm_meaning_kind'],
        'taxonomy-rgm_meaning_tag' => $columns['taxonomy-rgm_meaning_tag'],
    );

    $columns = $newColumnsOrder;

    // $columns['rgm_meaning_phrases'] = __('Frazy', 'rgm');
 
    return $columns;
}

add_action( 'manage_rgm_meaning_posts_custom_column' , 'custom_rgm_meaning_column', 10, 2 );
function custom_rgm_meaning_column( $column, $post_id ) {
    switch ( $column ) {
        case 'rgm_meaning_phrases' :
            $args = array(
                'post_type' => 'rgm_phrase',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'meta_query' => array(
                    array(
                        'key' => 'znaczenie',
                        'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                        'compare' => 'LIKE'
                    )
                )
            );
            $myQuery = new WP_Query($args);
            if($myQuery->have_posts()){
                $firstLoop = true;
                while($myQuery->have_posts()){
                    $myQuery->the_post();
                    if(!$firstLoop){
                        echo ", ";
                    }
                    $firstLoop = false;
                    echo '<a href="'.get_edit_post_link(get_the_ID()).'">' . get_the_title() . '</a>';
                }
                wp_reset_postdata();
            }else{
                echo __('Brak', 'rgm');
            }
            break;
    }
}
// add custom column to wp-admin rgm_meaning posts list end