<?php get_header(); ?>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?= get_the_content(); ?>
        </div>
      </div>
    </div>
</section>

<hr>

<?php
get_footer();