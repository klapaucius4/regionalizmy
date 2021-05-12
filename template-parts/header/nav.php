<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand p-0" href="<?= home_url(); ?>"><img style="width: 300px;" src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" /></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <?= __('Menu', 'rgm'); ?>
        <i class="fas fa-bars"></i>
      </button>
      <?php
      if(has_nav_menu('menu-1')):
          wp_nav_menu( array(
              'theme_location'    => 'menu-1',
              'depth'             => 2,
              'container'         => 'div',
              'container_class'   => 'collapse navbar-collapse',
              'container_id'      => 'navbarResponsive',
              'menu_class'        => 'nav navbar-nav ml-auto',
              'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
              'walker'            => new WP_Bootstrap_Navwalker(),
          ) );
      else:
      ?>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= home_url(); ?>"><?= __('Home', 'rgm'); ?></a>
          </li>
        </ul>
      </div>
      <?php endif; ?>
    </div>
</nav>