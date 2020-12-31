<?php get_header(); ?>

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
            <div class="col-lg-8">
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
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php bootstrap_pagination(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer();