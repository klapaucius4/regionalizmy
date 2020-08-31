<?php get_header(); ?>

<section class="section-space">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <?php while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <div class="col-md-5">
        <img src="<?= get_template_directory_uri(); ?>/img/front-desc.svg" class="w-100" alt="<?= bloginfo('name'); ?>" />
      </div>
    </div>
  </div>
  </section>

  <hr>

  <section class="section-space">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4>Skąd jesteś?</h4>
        </div>
        <div class="col-md-12">
          <div id="rgm-map" style="width: 100%; height: 66vh;"></div>
        </div>
      </div>
    </div>
  </section>


  <section class="section-space">
    <!-- Main Content -->
    <div class="container">
      <div class="row">
      <?php
      $args = array(
        'post_type' => 'regionalizmy_phrase',
        'posts_per_page' => -1
      );
      $myQuery = new WP_Query($args);
      if($myQuery->have_posts()):
      ?>
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php while($myQuery->have_posts()): $myQuery->the_post(); ?>
            <div class="post-preview">
              <a href="<?= get_the_permalink(); ?>">
                <h2 class="post-title">
                  <?= get_the_title(); ?>
                </h2>
                <h3 class="post-subtitle">
                  Problems look mighty small from 150 miles up
                </h3>
              </a>
              <p class="post-meta"><?= __('Dodane przez'); ?> <a href="#"><?= get_the_author(); ?></a> <?= get_the_date(); ?></p>
              <p>
                <button class="btn btn-success" onclick="toggleOn()">Znam</button>
                <button class="btn btn-danger" onclick="toggleOff()">Nie znam</button>
              </p>
            </div>
            <hr>
          <?php endwhile; ?>
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      <?php
      endif;
      ?>
      </div>
    </div>
  </section>

<?php
get_footer();