<?php get_header(); ?>

<section class="section-space">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <img src="<?= get_template_directory_uri(); ?>/img/404.svg" class="w-100" />
      </div>
      <div class="col-md-5 text-center">
        <h1 class="color-primary"><?= __('404', 'rgm'); ?></h1>
        <h3><?= __('Nie odnaleziono strony', 'rgm'); ?></h3>
        <p><?= __('Strona, której szukasz nie istnieje. Upewnij się, że link do strony jest poprawny.', 'rgm'); ?></p>
        <p><a href="<?= get_home_url(); ?>" class="btn btn-primary"><?= __('Powrót do strony głównej', 'rgm'); ?></a></p>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();