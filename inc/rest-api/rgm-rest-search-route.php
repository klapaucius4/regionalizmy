<?php

class RGM_REST_Search_Route extends RGM_REST_Controller {

  public $base = 'search';

  public function register_routes() {
    
    $namespace = $this->prefix . '/v' . $this->version;

    register_rest_route( $namespace, '/' . $this->base, array(
      array(
        'methods'             => WP_REST_Server::READABLE,
        'callback'            => array( $this, 'get_items' ),
        // 'permission_callback' => array( $this, 'get_items_permissions_check' ),
        'args'                => array(
            's' => array(),
            'type' => array(
              'default' => 'dictionary', // or 'blog' or 'all'
            )
          ),
        )
    ) );
    register_rest_route( $namespace, '/' . $base . '/schema', array(
      'methods'  => WP_REST_Server::READABLE,
      'callback' => array( $this, 'get_public_item_schema' ),
    ) );
  }
  
  public function get_items( $request ) {
    $data = array();
    $params = $request->get_params();
    if(isset($params['s'])){
      $args = array(
        'post_type' => array('rgm_phrase', 'rgm_meaning'),
        'posts_per_page' => 8,
        's' => strip_tags($params['s'])
      );
      $myQuery = new WP_Query($args);
      while($myQuery->have_posts()){
        $myQuery->the_post();
        $data[] = get_the_title();
        
      }
      wp_reset_postdata();
    }
    return new WP_REST_Response( $data, 200 );
  }

}