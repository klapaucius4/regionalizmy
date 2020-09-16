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

<section class="section-space">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <?php while(have_posts()): the_post(); ?>
        <div class="post-preview">
          <a href="<?= get_the_permalink(); ?>">
            <h2 class="post-title"><?= get_the_title(); ?></h2>
            <h3 class="post-subtitle">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <p class="post-meta"><?= __('Dodane przez'); ?> <a href="#"><?= get_the_author(); ?></a> <?= __('dnia'); ?> <?= get_the_date(); ?></p>
        </div>
        <hr>
        <?php endwhile; ?>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
      <div class="col-md-4">
        <sidebar>
          lorem ipsum
        </sidebar>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();