<?php get_header(); ?>

<section class="section-space">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php while(have_posts()): the_post(); ?>
          <img src="<?= get_template_directory_uri(); ?>/img/front-desc.svg" class="w-50 rounded float-right" alt="<?= bloginfo('name'); ?>" />
          <?php the_content(); ?>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
  </section>

  <hr>

  <section class="section-space">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-4 text-center">
          <?php if($sectionMap = get_field('sekcja_mapa')): ?>
            <h4 class="m-0"><?= $sectionMap['tytul']; ?></h4>
            <p class="mt-0 mb-3"><small><?= $sectionMap['podtytul']; ?></small></p>
            <div class="row justify-content-md-center">
              <div class="col-lg-6 col-md-8 col-sm-10 col-12">
                <form autocomplete="off" class="ui-widget">
                  <div class="form-group mb-0">
                    <input type="text" class="form-control findCountyInput has-warning" placeholder="<?= __('Powiat / miasto powiatowe'); ?>">
                  </div>
                </form>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-md-12">
          <div id="rgm-map"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-space">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12">
          <form autocomplete="off" class="ui-widget">
            <div class="form-group mb-0">
              <input type="text" class="form-control" placeholder="Znajdź frazę...." autocomplete="off">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="section-space">
    <!-- Main Content -->
    <div class="container">
      <?php if($sectionSamplePhrases = get_field('sekcja_przykladowe_frazy')): ?>
        <div class="row">
          <div class="col-md-12 mb-5 text-center">
            <h4><?= $sectionSamplePhrases['tytul']; ?></h4>
            <p class="m-0 small"><?= $sectionSamplePhrases['podtytul']; ?></p>
          </div>
        </div>
        <div class="row">
        <?php
        $args = array(
          'post_type' => 'rgm_phrase',
          'posts_per_page' => 10,
          // 'posts_per_page' => get_option( 'posts_per_page' ),
          // 'paged' => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
          'orderby' => 'rand',
        );
        $myQuery = new WP_Query($args);
        if($myQuery->have_posts()): ?>
          <div class="col-md-4 d-flex align-items-center">
            <img class="w-100" src="<?= get_template_directory_uri(); ?>/img/did-you-know.svg" alt="" />
          </div>
          <div class="col-md-8">
            <?php while($myQuery->have_posts()): $myQuery->the_post(); ?>
              <?php get_template_part('template-parts/loop-phrase', ''); ?>
              <hr>
            <?php endwhile; wp_reset_postdata(); ?>
            <div class="clearfix"></div>
          </div>
        <?php endif; ?>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <a href="<?= get_post_type_archive_link('rgm_phrase'); ?>" class="btn btn-secondary mt-5"><?= __('Przejdź do słownika'); ?></a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <section class="page-section bg-primary section-space">
      <div class="container">
        <?php if($sectionAdd = get_field('sekcja_dodaj')): ?>
          <p class="small text-center mb-0"><?= $sectionAdd['nadtytul']; ?></p>
          <h2 class="page-section-heading text-center text-uppercase mb-5"><?= $sectionAdd['tytul']; ?></h2>
          <div class="row">
              <div class="col-md-7">
                <?= $sectionAdd['tresc']; ?>
                <p>
                  <a href="#" class="btn btn-info"><?= __('Dodaj regionalizm'); ?></a>
                  <?php if(is_user_logged_in()): ?>
                    <a href="<?= get_permalink(get_page_by_path('konto'))?:'#'; ?>" class="btn btn-primary"><?= __('Moje konto'); ?></a>
                  <?php else: ?>
                    <a href="<?= get_permalink(get_page_by_path('zaloguj'))?:'#'; ?>" class="btn btn-primary"><?= __('Zaloguj się'); ?></a>
                    <a href="<?= get_permalink(get_page_by_path('zarejestruj'))?:'#'; ?>" class="btn btn-secondary"><?= __('Zarejestruj się'); ?></a>
                  <?php endif; ?>
                </p>
              </div>
              <div class="col-md-5">
                <img src="<?= get_template_directory_uri(); ?>/img/sign-up.svg" class="w-100" alt="" />
              </div>
          </div>
        <?php endif; ?>
      </div>
  </section>

<?php
get_footer();