<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="michalkowalik.pl">

    <title><?php
    /*
    * Print the <title> tag based on what is being viewed.
    */
    global $page, $paged;
    
    wp_title( '|', true, 'right' );
    
    // Add the blog name.
    bloginfo( 'name' );
    
    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";
    
    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );
    
    ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= get_template_directory_uri(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?= get_template_directory_uri(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Leaflet -->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/vendor/leaflet/leaflet.css" />

    <!-- jquery-autocomplete -->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/vendor/jquery-autocomplete/jquery.autocomplete.css" />

    <!-- Custom styles for this template -->
    <!-- <link href="<?= get_template_directory_uri(); ?>/css/clean-blog.min.css" rel="stylesheet"> -->

    <?php wp_head(); ?>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand p-0" href="<?= home_url(); ?>"><img style="width: 300px;" src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" /></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <?= __('Menu'); ?>
        <i class="fas fa-bars"></i>
      </button>
      <?php
      if(has_nav_menu('menu-1')):
          wp_nav_menu( array(
              'theme_location'    => 'menu-1',
              'depth'             => 2,
              'container'         => 'div',
              'container_class'   => 'collapse navbar-collapse',
              'container_id'      => 'navbarResponsive',
              'menu_class'        => 'nav navbar-nav ml-auto',
              'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
              'walker'            => new WP_Bootstrap_Navwalker(),
          ) );
      else:
      ?>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= home_url(); ?>"><?= __('Home'); ?></a>
          </li>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead">
    <div class="overlay bg1"></div>
    <div class="overlay bg2"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Internetowy Słownik Regionalizmów Polskich</h1>
            <!-- <h2 class="subheading">Internetowy Słownik Regionalizmów Polskich</h2> -->
          </div>
        </div>
      </div>
    </div>
  </header>