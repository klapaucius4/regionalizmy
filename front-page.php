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
          <h4 class="m-0"><?= __('Skąd jesteś?'); ?></h4>
          <p class="mt-0 mb-3"><small><?= __('Zaznacz na poniższej mapie powiat z którego pochodzisz lub w którym mieszkasz.'); ?></small></p>
          <div class="row justify-content-md-center">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12">
              <form autocomplete="off" class="ui-widget">
                <div class="form-group mb-0">
                  <input type="text" class="form-control findCountyInput has-warning" placeholder="<?= __('Powiat / miasto powiatowe'); ?>">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div id="rgm-map"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-space">
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-5 text-center">
          <h4><?= __('Czy wiesz, co to znaczy?'); ?></h4>
          <p class="m-0 small"><?= __('Czy spotkałeś się z następującymi słowami i frazami w miejscu Twojego zamieszkania i znasz ich znaczenie?'); ?></p>
        </div>
      <?php
      $args = array(
        'post_type' => 'rgm_phrase',
        'posts_per_page' => 10,
        // 'posts_per_page' => get_option( 'posts_per_page' ),
        // 'paged' => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
        'orderby' => 'rand',
      );
      $myQuery = new WP_Query($args);
      if($myQuery->have_posts()):
      ?>
        <!-- <div class="col-lg-8 col-md-10 mx-auto"> -->
        <div class="col-md-12">
          <?php while($myQuery->have_posts()): $myQuery->the_post(); ?>
            <?php get_template_part('template-parts/loop-phrase', ''); ?>
            <hr>
          <?php endwhile; wp_reset_postdata(); ?>
          <div class="clearfix"></div>
            <!-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
            <?php //bootstrap_pagination($myQuery) ?>
        </div>
      <?php
      endif;
      ?>
      </div>
    </div>
  </section>

  <section class="page-section bg-primary section-space">
      <div class="container">
          <!-- About Section Heading-->
          <p class="small text-center mb-0"><?= __('Nie możesz znaleźć jakiegoś regionalizmu?'); ?></p>
          <h2 class="page-section-heading text-center text-uppercase mb-5"><?= __('Dodaj nowy regionalizm!') ?></h2>
          <div class="row">
              <div class="col-md-7">
                <p class="lead">
                  <?= __('Dodaj swój regionalizm, którego używasz lub z którym się spotkałeś/aś.'); ?>
                </p>
                <p><a href="#" class="btn btn-info">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm.5 4a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/> </svg>
                  Dodaj regionalizm
                </a></p>
                <p>Możesz to zrobić bez rejestracji, jednak zachęcamy Cię do założenia konta. Będąc zalogowanym, każdy dodany przez Ciebie wpis będzie oznaczony jako wpis dodany przez Ciebie. W przyszłości przewidujemy rozbudowany system rankingu użytkowników, statystyk itd.</p>
                <p>
                  <a href="<?= get_permalink( get_page_by_path( 'zaloguj' ) ); ?>" class="btn btn-primary">Zaloguj się</a>
                  <a href="<?= get_permalink( get_page_by_path( 'zarejestruj' ) ); ?>" class="btn btn-secondary">Zarejestruj się</a>
                </p>
              </div>
              <div class="col-md-5">
                <img src="<?= get_template_directory_uri(); ?>/img/sign-up.svg" class="w-100" alt="" />
              </div>
          </div>
      </div>
  </section>

<?php
get_footer();