<?php get_header(); ?>

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
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque voluptates illo laudantium corporis sed quae perferendis architecto nulla similique. Quidem dolore quasi incidunt molestiae inventore. Eaque necessitatibus sapiente laudantium vel.
        </sidebar>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();