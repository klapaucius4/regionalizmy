<?php
require get_template_directory() . '/inc/rest-api/class-rgm-rest-controller.php';

require get_template_directory() . '/inc/rest-api/class-rgm-rest-counties-controller.php';
require get_template_directory() . '/inc/rest-api/class-rgm-rest-votes-controller.php';
require get_template_directory() . '/inc/rest-api/class-rgm-rest-phrases-controller.php';

add_action( 'rest_api_init', function () {
    /**
     * Create objects of RGM REST Controllers classes
     */
    $rgmRestCountiesController = new RGM_REST_Counties_Controller();
    $rgmRestCountiesController->register_routes();

    $rgmRestVotesController = new RGM_REST_Votes_Controller();
    $rgmRestVotesController->register_routes();

    $rgmRestPhrasesController = new RGM_REST_Phrases_Controller();
    $rgmRestPhrasesController->register_routes();

  }
);