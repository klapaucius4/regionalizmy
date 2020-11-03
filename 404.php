<?php get_header(); ?>

<section class="section-space">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <img src="<?= get_template_directory_uri(); ?>/img/404.svg" class="w-100" />
      </div>
      <div class="col-md-5 text-center">
        <h1>Strona nie istnieje</h1>
        <!-- <p>Strona, której szukasz nie istneije.</p> -->
        <p><a href="<?= get_home_url(); ?>" class="btn btn-primary"><?= __('Powrót do strony głównej'); ?></a></p>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();