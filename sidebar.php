<nav class="sidebar">
    <!-- Search Widget -->
    <div class="sidebar__card">
        <h5 class="card-header sidebar__card__header"><?= __('Znajdź regionalizm', 'rgm'); ?></h5>
        <div class="card-body">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="<?= __('Znajdź regionalizm', 'rgm'); ?>">
            <span class="input-group-append">
            <button class="btn--smaller btn-secondary" type="button"><?= __('Szukaj', 'rgm'); ?></button>
            </span>
        </div>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="sidebar__card sidebar__card--letters">
        <h5 class="card-header sidebar__card__header"><?= __('Litery', 'rgm'); ?></h5>
        <div class="card-body">
        <?php
        $letters = alphabeticalListOfLetters();
        if($letters): ?>
            <div class="row">
                <?php foreach($letters as $letter): ?>
                <div class="col col-2">
                    <a href="<?= get_post_type_archive_link('rgm_phrase'); ?>?<?= http_build_query(array('litera' => $letter), null, "&", PHP_QUERY_RFC3986); ?>"><?= mb_strtoupper($letter, "UTF-8"); ?></a>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="sidebar__card">
        <h5 class="card-header sidebar__card__header"><?= __('Tagi', 'rgm'); ?></h5>
        <div class="card-body">
            <?php
            $args = array(
                'taxonomy' => array( 'rgm_phrase_tag' ), 
            );
            wp_tag_cloud( $args );
            ?>
        </div>
    </div>
</nav>