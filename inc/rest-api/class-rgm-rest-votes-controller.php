<?php

class RGM_REST_Votes_Controller extends RGM_REST_Controller {

    function __construct(){
        parent::__construct();
        $this->base = 'votes';
    }

    public function register_routes() {

        register_rest_route( $this->namespace, '/' . $this->base, array(
          array(
            'methods'             => WP_REST_Server::READABLE,
            'callback'            => array( $this, 'get_items' ),
				  	'permission_callback' => array( $this, 'get_items_permissions_check' ),
            'args'                => $this->get_collection_params(),
          ),
        ));

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


    public function get_items( $request ) {

      // Ensure a search string is set in case the orderby is set to 'relevance'.
      if ( !empty( $request['user_id']) ) {
        return new WP_Error(
          'error',
          __( 'You need to set parameter \'user_id\'.' ),
          array( 'status' => 400 )
        );
      }
  
  
      // Retrieve the list of registered collection query parameters.
      $registered = $this->get_collection_params();
      $args       = array();




    }


    public function create_item( $request ) {
        $item = $this->prepare_item_for_database( $request );
        if ( $item ) {

          /// dokonczyc

          $voteRgmDatabase = new RGM_Database('wp_rgm_votes');
          if($voteId = $voteRgmDatabase->insert($item)){
            return new WP_REST_Response( array('vote_id' => $voteId), 200 );
          }
        }
        else{
          return new WP_Error( 'error', __( 'Not valid parameters' ), array( 'status' => 400 ) );
        }
        return new WP_Error( 'error', __( 'Can\'t create item' ), array( 'status' => 500 ) );
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

      return !empty($returnData) ? $returnData : false;
    }


    public function create_item_permissions_check( $request ){
      return true;
    }
  
  }