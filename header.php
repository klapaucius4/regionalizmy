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
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/vendor/jquery-ui/jquery-ui.min.css" />

    <!-- leaflet-gesture-handling -->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/vendor/leaflet-gesture-handling/leaflet-gesture-handling.min.css" />

    <!-- Custom styles for this template -->
    <link href="<?= get_template_directory_uri(); ?>/css/styles.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?= get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">

    <?php wp_head(); ?>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand p-0" href="<?= home_url(); ?>"><img style="width: 300px;" src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" /></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <?= __('Menu', 'rgm'); ?>
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
            <a class="nav-link" href="<?= home_url(); ?>"><?= __('Home', 'rgm'); ?></a>
          </li>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="header__masthead<?= is_front_page()?' header__masthead--frontpage':''; ?>">
    <div class="overlay bg1"></div>
    <div class="overlay bg2"></div>

    <?php if(is_front_page()): ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1><?= get_bloginfo('name'); ?></h1>
            <h2 class="subheading"><?= get_bloginfo('description'); ?></h2>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

  </header>

  <?php if(is_archive() || is_page()): ?>
  <section class="section-space pb-0">
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="mb-5"><?= get_the_archive_title(); ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- Breadcrumbs -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <?php
                $frontpageID = get_option( 'page_on_front' );
              ?>
              <li class="breadcrumb__item breadcrumb-item ml-4"><a href="<?= get_the_permalink($frontpageID); ?>"><?= get_the_title($frontpageID); ?></a></li>
              <li class="breadcrumb__item breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb__item breadcrumb__item--active breadcrumb-item active" aria-current="page">Data</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>