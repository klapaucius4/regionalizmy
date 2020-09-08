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
            <div class="col-lg-4 col-md-8 col-sm-10 col-12">
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
        'post_type' => 'regionalizmy_phrase',
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

<?php
get_footer();