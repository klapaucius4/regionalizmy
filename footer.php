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
        <p class="copyright text-muted">Copyright &copy; Regionalizmy.pl 2020</p>
      </div>
    </div>
  </div>
</footer>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- Bootstrap core JavaScript -->
<script src="<?= get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= get_template_directory_uri(); ?>/vendor/jquery-autocomplete/jquery.autocomplete.js"></script>

<?php get_template_part('template-parts/map', 'logic'); ?>

<!-- Custom scripts for this template -->
<script src="<?= get_template_directory_uri(); ?>/js/clean-blog.min.js"></script>

<?php wp_footer(); ?>

</body>

</html>