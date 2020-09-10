<div class="row post-preview">
    <div class="col-md-8">
    <a href="<?= get_the_permalink(); ?>">
        <h2 class="post-title"><?= get_the_title(); ?></h2>
        <h3 class="post-subtitle"><?= get_field('krotki_opis'); ?></h3>
    </a>
    <p class="post-meta"><?= __('Dodane przez'); ?> <a href="#"><?= get_the_author(); ?></a> <?= get_the_date(); ?></p>
    </div>
    <div class="vote-buttons col-md-4 d-flex justify-content-end align-items-center">
        <button class="btn btn-success mr-1" data-phrase-id="<?= get_the_ID(); ?>" data-vote-value="1" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"><?= __('Znam'); ?></button>
        <button class="btn btn-danger" data-phrase-id="<?= get_the_ID(); ?>" data-vote-value="0"><?= __('Nie znam'); ?></button>
    </div>
</div>