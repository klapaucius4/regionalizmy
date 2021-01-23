<?php

class RGM_REST_Vote_Controller extends RGM_REST_Controller {

    function __construct(){
        parent::__construct();
        $this->base = 'vote';
    }

    public function register_routes() {

        register_rest_route( $this->namespace, '/' . $this->base, array(
            array(
              'methods'             => WP_REST_Server::READABLE,
              'callback'            => array( $this, 'create_item' ),
              'permission_callback' => array( $this, 'create_item_permissions_check' ),
              'args'                => $this->get_endpoint_args_for_item_schema( true ),
            ),
        ));
        register_rest_route( $namespace, '/' . $this->base . '/schema', array(
            'methods'  => WP_REST_Server::READABLE,
            'callback' => array( $this, 'get_public_item_schema' ),
        ));
    }


    public function create_item( $request ) {
        var_dump('tttt'); exit;
        $item = $this->prepare_item_for_database( $request );
     
        if ( function_exists( 'slug_some_function_to_create_item' ) ) {
          $data = slug_some_function_to_create_item( $item );
          if ( is_array( $data ) ) {
            return new WP_REST_Response( $data, 200 );
          }
        }
     
        return new WP_Error( 'cant-create', __( 'message', 'text-domain' ), array( 'status' => 500 ) );
    }
  
  }