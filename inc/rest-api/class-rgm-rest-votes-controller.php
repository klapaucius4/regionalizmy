<?php

class RGM_REST_Votes_Controller extends RGM_REST_Controller {

    function __construct(){
        parent::__construct();
        $this->base = 'votes';
    }

    public function register_routes() {

        register_rest_route( $this->namespace, '/' . $this->base, array(
            array(
              'methods'             => WP_REST_Server::CREATABLE,
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
        $item = $this->prepare_item_for_database( $request );
        if ( !empty($item) ) {
          $voteRgmDatabase = new RGM_Database('wp_votes');
          
          $voteId = $voteRgmDatabase->insert($item);

          if($voteId){
            return new WP_REST_Response( array('vote_id' => $voteId), 200 );
          }
          // $data = slug_some_function_to_create_item( $item );
          // if ( is_array( $data ) ) {
          //   return new WP_REST_Response( $data, 200 );
          // }
        }
        return new WP_Error( 'cant-create', __( 'message', 'text-domain' ), array( 'status' => 500 ) );
    }

    ///

    protected function prepare_item_for_database( $request ) {
      $returnData = array();
      
      $params = $request->get_params();
      if(
        isset($params['phrase_id']) && 
        isset($params['county_id']) && 
        isset($params['mass_media_id']) && 
        isset($params['user_id']) && 
        isset($params['value'])
      ){
        $returnData = array(
          'phrase_id' => intval(strip_tags($params['phrase_id'])),
          'county_id' => intval(strip_tags($params['county_id'])),
          'mass_media_id' => intval(strip_tags($params['mass_media_id'])),
          'user_id' => intval(strip_tags($params['user_id'])),
          'value' => intval(strip_tags($params['value'])),
          'ip_address' => getUserIpAddr()
        );
      }

      return $returnData;
    }


    public function create_item_permissions_check( $request ){
      return true;
    }
  
  }