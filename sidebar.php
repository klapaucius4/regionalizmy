<nav class="sidebar">
    <!-- Search Widget -->
    <div class="sidebar__card">
        <h5 class="card-header sidebar__card__header"><?= __('Znajdź regionalizm'); ?></h5>
        <div class="card-body">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="<?= __('Znajdź regionalizm'); ?>">
            <span class="input-group-append">
            <button class="btn--smaller btn-secondary" type="button"><?= __('Szukaj'); ?></button>
            </span>
        </div>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="sidebar__card sidebar__card--letters">
        <h5 class="card-header sidebar__card__header"><?= __('Litery', 'regionalizmy'); ?></h5>
        <div class="card-body">
        <?php
        $letters = get_terms(array(
            'taxonomy' => 'rgm_phrase_letter',
            'hide_empty' => false,
            'orderby' => 'name', 
            'order' => 'ASC',
        ));
        if($letters):
        ?>
            <div class="row">
                <?php foreach($letters as $letter): ?>
                <div class="col col-2">
                    <a href="<?= get_term_link($letter->term_id, $letter->taxonomy); ?>"><?= $letter->name; ?></a>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="sidebar__card">
        <h5 class="card-header sidebar__card__header"><?= __('Tagi', 'regionalizmy'); ?></h5>
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