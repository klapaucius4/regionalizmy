<?php get_header(); ?>
  <!-- Post Content -->

  <?php while(have_posts()): the_post(); ?>
  <article class="single-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-8">

              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <th scope="row">Regionalizm</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">Znaczenie</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">Synonimy</th>
                        <td>Larry the Bird</td>
                        <td>Thornton</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <?php if($examples = get_field('przyklady_uzycia')): ?>
              <div class="row single-section__usage-examples">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-8">
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
                    </div>
                    <div class="col-md-4 single-section__usage-examples__bg-container"></div>
                  </div>
                </div>
                
              </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>

    </div>
  </article>
  <?php endwhile; ?>
<?php
get_footer();