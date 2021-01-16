<?php
require get_template_directory() . '/inc/rest-api/class-rgm-rest-controller.php';

require get_template_directory() . '/inc/rest-api/search.php';


add_action( 'rest_api_init', function () {
    /**
     * RGM_REST_Routes
     */
    $rgmRestRoutes = new Rgm_Rest_Api();
    $rgmRestRoutes->rgm_phrase_register_routes();
  });