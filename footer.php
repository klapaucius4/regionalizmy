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

<div id="selectDistrictModalPopup" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= __('Skąd jesteś / pochodzisz?', 'rgm'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?= __('Zamknij', 'rgm'); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form autocomplete="off" class="ui-widget">
          <fieldset class="form-group fieldset2">
            <input type="text" class="form-control findCountyInput3 has-warning" placeholder="<?= __('Powiat / miasto powiatowe', 'rgm'); ?>">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="saveAsDefault1" value="option1">
              <label class="form-check-label small" for="saveAsDefault1"><?= __('ustaw jako domyślny region', 'rgm'); ?></label>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="voteModalPopup" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form class="modal-content ui-widget" autocomplete="off">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?= __('Zamknij', 'rgm'); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <fieldset class="form-group fieldset1">
          <div class="form-check">
            <?php //$rgmUserCountyCookie = isset($_COOKIE['rgmUserCounty'])?json_decode(stripslashes($_COOKIE['rgmUserCounty']), true):null; ?>
            <input class="form-check-input" type="radio" name="voteModalPopupRadio" id="voteModalPopupRadio1" value="1" checked>
            <label class="form-check-label" for="voteModalPopupRadio1"></label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="voteModalPopupRadio" id="voteModalPopupRadio2" value="2">
            <label class="form-check-label" for="voteModalPopupRadio2"><?= __('Znam z innego regionu Polski'); ?></label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="voteModalPopupRadio" id="voteModalPopupRadio3" value="3">
            <label class="form-check-label" for="voteModalPopupRadio3"><?= __('Znam z ogólnopolskich środków masowego przekazu', 'rgm'); ?><small class="text-small d-block"><?= __('(prasa, radio, telewizja, Internet, książka, film)', 'rgm'); ?></small></label>
          </div>
        </fieldset>
        <fieldset class="form-group fieldset2">
          <input type="text" class="form-control findCountyInput2 has-warning" placeholder="<?= __('Powiat / miasto powiatowe', 'rgm'); ?>">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="saveAsDefault2" value="option1">
            <label class="form-check-label small" for="saveAsDefault2"><?= __('ustaw jako domyślny region', 'rgm'); ?></label>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><?= __('Potwierdź', 'rgm'); ?></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= __('Zamknij', 'rgm'); ?></button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?= get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/vendor/jquery.cookie/jquery.cookie.js"></script>

<script>
  function rgmCookie(){
    var cookie = $.cookie('rgmUserCounty') ? JSON.parse($.cookie('rgmUserCounty')) : null;
    if( cookie !== null ){
      return cookie;
    }
    return false;
  }
</script>

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