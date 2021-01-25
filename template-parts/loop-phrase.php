<div class="row post-preview mb-3">
    <div class="col-md-8">
        <a href="<?= get_the_permalink(); ?>">
            <h2 class="post-title m-0"><?= get_the_title(); ?></h2>
            <!-- <h3 class="post-subtitle"><?= get_field('krotki_opis'); ?></h3> -->
            <?php if($meaning = get_field('znaczenie')): var_dump($meaning); exit; ?>
            <p class="post-meta">ttttt</p>
            <?php endif; ?>
        </a>
        <!-- <p class="post-meta"><?= __('Dodane przez', 'rgm'); ?> <a href="#"><?= get_the_author(); ?></a> <?= get_the_date(); ?></p> -->
    </div>
    <div class="vote-buttons col-md-4 d-flex justify-content-end align-items-center">
        <button class="btn btn--vote btn-success mr-1" data-phrase-name="<?= get_the_title(); ?>" data-phrase-id="<?= get_the_ID(); ?>" data-vote-value="1"><?= __('Znam', 'rgm'); ?></button>
        <button class="btn btn--vote btn-danger" data-phrase-name="<?= get_the_title(); ?>" data-phrase-id="<?= get_the_ID(); ?>" data-vote-value="-1"><?= __('Nie znam', 'rgm'); ?></button>
    </div>
</div>