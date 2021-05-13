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

<?php include( locate_template('template-parts/modal-popup/select-discrict.php') ); ?>

<?php include( locate_template('template-parts/modal-popup/vote.php') ); ?>

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