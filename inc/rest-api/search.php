<?php

class RGM_REST_Search_Route extends RGM_REST_Controller {

  /**
   * Register the search for the objects of the controller.
   */
  public function register_routes() {
    $namespace = $this->prefix . '/v' . $this->version;
    $base = 'search';
    register_rest_route( $namespace, '/' . $base, array(
      array(
        'methods'             => WP_REST_Server::READABLE,
        'callback'            => array( $this, 'get_items' ),
        // 'permission_callback' => array( $this, 'get_items_permissions_check' ),
        'args'                => array(
            's' => array(),
          ),
        )
    ) );
    register_rest_route( $namespace, '/' . $base . '/schema', array(
      'methods'  => WP_REST_Server::READABLE,
      'callback' => array( $this, 'get_public_item_schema' ),
    ) );
  }

  /**
   * Get a collection of items
   *
   * @param WP_REST_Request $request Full data about the request.
   * @return WP_Error|WP_REST_Response
   */
  public function get_items( $request ) {
    $items = array(); //do a query, call another class, etc
    $params = $request->get_params();
    var_dump($params); exit;
    $data = array('status' => 'elegancko');
    // foreach( $items as $item ) {
    //   $itemdata = $this->prepare_item_for_response( $item, $request );
    //   $data[] = $this->prepare_response_for_collection( $itemdata );
    // }

    return new WP_REST_Response( $data, 200 );
  }

  /**
   * Prepare the item for the REST response
   *
   * @param mixed $item WordPress representation of the item.
   * @param WP_REST_Request $request Request object.
   * @return mixed
   */
  public function prepare_item_for_response( $item, $request ) {
    return array();
  }

}