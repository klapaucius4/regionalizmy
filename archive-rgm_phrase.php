<?php get_header(); ?>

<div class="sidebar-container">
  <div class="sidebar-logo">
    Project Name
  </div>
  <ul class="sidebar-navigation">
    <li class="header">Navigation</li>
    <li>
      <a href="#">
        <i class="fa fa-home" aria-hidden="true"></i> Homepage
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
      </a>
    </li>
    <li class="header">Another Menu</li>
    <li>
      <a href="#">
        <i class="fa fa-users" aria-hidden="true"></i> Friends
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-cog" aria-hidden="true"></i> Settings
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-info-circle" aria-hidden="true"></i> Information
      </a>
    </li>
  </ul>
</div>

<div class="content-container">

  <div class="container-fluid">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1>Navbar example</h1>
      <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
      <p>To see the difference between static and fixed top navbars, just scroll.</p>
      <p>
        <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
      </p>
    </div>

  </div>
</div>

<?php /*
<section class="section-space">
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5 text-center">
            <h4><?= get_the_archive_title(); ?></h4>
            <p class="m-0 small">dolor.....</p>
            </div>
        </div>
        <div class="row">
        <?php if(have_posts()): ?>
            <div class="col-md-12">
                <?php while(have_posts()): the_post(); ?>
                    <?php get_template_part('template-parts/loop-phrase', ''); ?>
                    <hr>
                <?php endwhile; wp_reset_postdata(); ?>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        </div>
    </div>
</section>
*/ ?>
<?php get_footer();