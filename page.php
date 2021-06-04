<?php get_header(); ?>
  <?php while(have_posts()): the_post(); ?>
  <section class="">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
  <?php endwhile; ?>
<?php
get_footer();