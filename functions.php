<?php
// Silence is Golden

/**
 * WP Bootstrap Navwalker
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Custom post additions
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * RGM Database
 */
require get_template_directory() . '/inc/class-rgm-database.php';

/**
 * Helpers additions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * RGM Rest Api
 */
require get_template_directory() . '/inc/rest-api/rest-api-init.php';

/**
 * Wordpress settings
 */
require get_template_directory() . '/inc/settings.php';