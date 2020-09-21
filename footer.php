<hr>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <ul class="list-inline text-center">
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
        </ul>
        <p class="copyright text-muted">Copyright &copy; <a href="<?= home_url(); ?>">Regionalizmy.pl</a> 2019 - <?= date('Y'); ?></p>
      </div>
    </div>
  </div>
</footer>

<div id="voteModalPopup" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form autocomplete="off" class="ui-widget">
          <fieldset class="form-group fieldset1">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" checked>
              <?php
              // $rgmUserCountyCookie = isset($_COOKIE['rgmUserCounty'])?json_decode(stripslashes($_COOKIE['rgmUserCounty']), true):null;
              ?>
              <label class="form-check-label" for="gridRadios1"></label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2">
              <label class="form-check-label" for="gridRadios2"><?= __('Znam z innego regionu Polski'); ?></label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="3">
              <label class="form-check-label" for="gridRadios3"><?= __('Znam z ogólnopolskich środków masowego przekazu'); ?><small class="text-small d-block"><?= __('(prasa, radio, telewizja, Internet, książka, film)') ?></small></label>
            </div>
          </fieldset>
          <fieldset class="form-group fieldset2">
            <input type="text" class="form-control findCountyInput2 has-warning" placeholder="<?= __('Powiat / miasto powiatowe'); ?>">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
              <label class="form-check-label" for="inlineCheckbox1"><?= __('ustaw jako domyślny region'); ?></label>
            </div>
          </fieldset>
          <fieldset class="form-group fieldset3">
          <?php
          $args = array(
            'post_type' => 'rgm_mass_media',
            'posts_per_page' => -1,
            'post_status' => 'publish'
          );
          $myQuery = new WP_Query($args);
          if($myQuery->have_posts()):
          ?>
            <?php while($myQuery->have_posts()): $myQuery->the_post(); ?>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio<?= get_the_ID(); ?>" value="option<?= get_the_ID(); ?>">
                <label class="form-check-label" for="inlineRadio<?= get_the_ID(); ?>"><?= get_the_title(); ?></label>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php endif; ?>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><?= __('Potwierdź'); ?></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= __('Zamknij'); ?></button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?= get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/vendor/jquery.cookie/jquery.cookie.js"></script>


<?php if(is_front_page()): ?>
  <?php if(file_exists(get_template_directory().'/js/countiesData.min.js')): ?>
  <!-- Counties Data -->
  <script src="<?= get_template_directory_uri(); ?>/js/countiesData.min.js"></script>
  <?php endif; ?>
  <!-- Leaflet -->
  <script src="<?= get_template_directory_uri(); ?>/vendor/leaflet/leaflet.js"></script>
  <!-- leaflet-gesture-handling -->
  <script src="<?= get_template_directory_uri(); ?>/vendor/leaflet-gesture-handling/leaflet-gesture-handling.min.js"></script>
  <!-- RGM Map -->
  <script src="<?= get_template_directory_uri(); ?>/js/rgmMap.min.js"></script>
<?php endif; ?>

<!-- Custom scripts for this template -->
<script src="<?= get_template_directory_uri(); ?>/js/scripts.min.js"></script>

<?php wp_footer(); ?>

</body>

</html>