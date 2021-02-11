<?php get_header(); ?>
  <!-- Post Content -->

  <?php while(have_posts()): the_post(); ?>
  <article class="single-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center — an equal earth which all men occupy as equals. The airman's earth, if free men make it, will be truly round: a globe in practice, not in theory.</p>
        </div>
      </div>

      <div class="row single-section__usage-examples">
        <div class="col-md-8">

          <?php if($examples = get_field('przyklady_uzycia')): ?>
          <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0"><?= __('Przykłady użycia'); ?>:</h6>
            <?php foreach($examples as $example): if(!$example['przyklad']) continue; ?>
              <div class="media text-muted pt-3 d-flex">
                <i class="fas fa-angle-double-right mr-4 mt-4"></i>
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark"><?= nl2br($example['przyklad']); ?></strong>
                  </div>
                  <span class="d-block">@username</span>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
        <div class="col-md-4 single-section__usage-examples__bg-container">
            
        </div>
      </div>

    </div>
  </article>
  <?php endwhile; ?>
<?php
get_footer();