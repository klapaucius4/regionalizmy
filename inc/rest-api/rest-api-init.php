<?php
require get_template_directory() . '/inc/rest-api/class-rgm-rest-controller.php';

require get_template_directory() . '/inc/rest-api/class-rgm-rest-search-controller.php';
require get_template_directory() . '/inc/rest-api/class-rgm-rest-county-controller.php';

add_action( 'rest_api_init', function () {
    /**
     * Create objects of RGM REST Controllers classes
     */
    $rgmRestSearchRoute = new RGM_REST_Search_Controller();
    $rgmRestSearchRoute->register_routes();

    $rgmRestCountyRoute = new RGM_REST_County_Controller();
    $rgmRestCountyRoute->register_routes();
  }
);