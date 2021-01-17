<?php

class RGM_REST_County_Route extends RGM_REST_Controller {

    public $base = 'county';

    public function register_routes() {

        $namespace = $this->prefix . '/v' . $this->version;

        register_rest_route( $namespace, '/' . $this->base, array(
            array(
              'methods'             => WP_REST_Server::READABLE,
              'callback'            => array( $this, 'get_items' ),
              'args'                => array(
                  's' => array(),
                  'type' => array(
                    'default' => 'dictionary', // or 'blog' or 'all'
                  )
                ),
              )
        ));
        register_rest_route( $namespace, '/' . $base . '/schema', array(
            'methods'  => WP_REST_Server::READABLE,
            'callback' => array( $this, 'get_public_item_schema' ),
        ));
    }
    
    public function get_items( $request ) {
        $data = array();

        $args = array(
        'post_type' => 'rgm_county',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'name',
        'order' => 'ASC'
        );

        if(isset($request['search'])){
        $args['s'] = $request['search'];
        $args['orderby'] = 'relevance';
        }

        $myQuery = new WP_Query($args);

        if($myQuery->have_posts()){
        while($myQuery->have_posts()){
            $myQuery->the_post();
            $data[] = array(
            'id' => get_the_ID(),
            'name' => get_the_title(),
            'city' => get_field('miasto_na_prawach_powiatu')?true:false
            );
        }
        wp_reset_postdata();
        }

        return new WP_REST_Response( $data, 200 );
    }
  
  }