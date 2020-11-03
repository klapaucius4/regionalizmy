<?php get_header(); ?>

<section class="section-space">
  <div class="container">
    <div class="row">
      <?php if(have_posts()): ?>
      <div class="col-md-8">
        <?php while(have_posts()): the_post(); ?>
        <div class="post-preview">
          <a href="<?= get_the_permalink(); ?>">
            <h2 class="post-title"><?= get_the_title(); ?></h2>
            <h3 class="post-subtitle mb-0">
              Problems look mighty small from 150 miles up
            </h3>
          </a>
          <!-- <p class="post-meta"><?= __('Dodane przez'); ?> <a href="#"><?= get_the_author(); ?></a> <?= __('dnia'); ?> <?= get_the_date(); ?></p> -->
        </div>
        <hr>
        <?php endwhile; ?>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
      <?php else: ?>
        <div class="col-md-8">
          <div class="alert alert-warning" role="alert">
            This is a warning alert—check it out!!!
          </div>
        </div>
      <?php endif; ?>
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