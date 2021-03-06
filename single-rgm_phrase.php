<?php get_header(); ?>
  <!-- Post Content -->

  <?php while(have_posts()): the_post(); ?>
  <article class="single-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-8">

              <div class="row single-section__data">
                <div class="col-md-12">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <th scope="row"><i class="fas fa-book mr-2"></i><?= __('Regionalizm'); ?></th>
                        <td><p class="m-0"><?= get_the_title(); ?></p></td>
                      </tr>
                      <tr>
                        <th scope="row"><i class="fas fa-lightbulb mr-2"></i><?= __('Znaczenie'); ?></th>
                        <td>
                        <?php
                        $meaning = get_field('znaczenie');
                        if($meaning && isset($meaning[0])){
                          echo '<p class="m-0">' . $meaning[0]->post_title . '</p>';
                          if($meaningDefinition = get_field('definicja', $meaning[0]->ID)){
                            echo '<p class="small m-0">' . $meaningDefinition . '</p>';
                          }
                        }else{
                          echo '-';
                        }
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <?php
                        $synonymsList = array();
                        if($meaning && isset($meaning[0])){
                          $args = array(
                              'post_type' => 'rgm_phrase',
                              'posts_per_page' => -1,
                              'post_status' => 'publish',
                              'meta_query' => array(
                                  array(
                                      'key' => 'znaczenie',
                                      'value' => '"' . $meaning[0]->ID . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                                      'compare' => 'LIKE'
                                  )
                              )
                          );
                          $myQuery = new WP_Query($args);
                          if($myQuery->have_posts()){
                              $firstLoop = true;
                              while($myQuery->have_posts()){
                                  $myQuery->the_post();
                                  $synonymsList[] = array(
                                    get_the_ID(),
                                    get_the_title(),
                                    get_the_permalink()
                                  );
                              }
                              wp_reset_postdata();
                          }
                        }
                        ?>
                        <th scope="row"><i class="fas fa-book-medical mr-2"></i><?= __('Synonimy'); ?></th>
                        <td>
                          <?php if($synonymsList): ?>
                            <ul class="list-style list-style--pushpin">
                              <?php foreach($synonymsList as $synonym): ?>
                                <li><a href="<?= $synonym[2]; ?>"><?= $synonym[1]; ?></a></li>
                              <?php endforeach; ?>
                            </ul>
                          <?php else: ?>
                            <p><?= "Brak"; ?></p>
                          <?php endif; ?>
                        </td>
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