<?php
require get_template_directory() . '/inc/rest-api/class-rgm-rest-controller.php';

require get_template_directory() . '/inc/rest-api/rgm-rest-search-route.php';
require get_template_directory() . '/inc/rest-api/rgm-rest-county-route.php';

add_action( 'rest_api_init', function () {
    /**
     * RGM_REST_Routes
     */
    $rgmRestSearchRoute = new RGM_REST_Search_Route();
    $rgmRestSearchRoute->register_routes();

    $rgmRestCountyRoute = new RGM_REST_County_Route();
    $rgmRestCountyRoute->register_routes();
  });