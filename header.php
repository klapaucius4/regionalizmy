<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="michalkowalik.pl">

    <title><?php wp_title(); ?> - <?php bloginfo( 'name' ); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= get_template_directory_uri(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?= get_template_directory_uri(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Leaflet -->
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/vendor/leaflet/leaflet.css" />

    <!-- Custom styles for this template -->
    <link href="<?= get_template_directory_uri(); ?>/css/clean-blog.min.css" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand p-0" href="<?= home_url(); ?>"><img style="width: 300px;" src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" /></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= home_url(); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Frazy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Mapa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kontakt</a>
          </li>
        </ul>
      </div>
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