<?php get_header(); ?>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="rgm-map" style="width: 100%; height: 66vh;"></div>
        </div>
      </div>
    </div>
  </section>

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
            <a href="post.html">
              <h2 class="post-title">
                <?= get_the_title(); ?>
              </h2>
              <h3 class="post-subtitle">
                Problems look mighty small from 150 miles up
              </h3>
              <button class="btn btn-success" onclick="toggleOn()">On by API</button>
              <button class="btn btn-danger" onclick="toggleOff()">Off by API</button>
            </a>
            <p class="post-meta"><?= __('Dodane przez'); ?> <a href="#"><?= get_the_author(); ?></a> <?= get_the_date(); ?></p>
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

<?php
get_footer();