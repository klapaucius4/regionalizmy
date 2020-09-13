<div class="row post-preview">
    <div class="col-md-8">
    <a href="<?= get_the_permalink(); ?>">
        <h2 class="post-title"><?= get_the_title(); ?></h2>
        <h3 class="post-subtitle"><?= get_field('krotki_opis'); ?></h3>
    </a>
    <p class="post-meta"><?= __('Dodane przez'); ?> <a href="#"><?= get_the_author(); ?></a> <?= get_the_date(); ?></p>
    </div>
    <div class="vote-buttons col-md-4 align-items-center">
        <!-- <div class="row"> -->
            <div class="d-flex justify-content-end">
                <button class="btn btn-success mr-1" data-phrase-id="<?= get_the_ID(); ?>" data-vote-value="1" data-toggle="modal" data-target="#voteModalCenter" title="<?= get_the_title(); ?>" data-content="Lorem ipsum"><?= __('Znam'); ?></button>
                <button class="btn btn-danger" data-phrase-id="<?= get_the_ID(); ?>" data-vote-value="0" data-toggle="modal" data-target="#voteModalCenter" title="<?= get_the_title(); ?>" data-content="Lorem ipsum"><?= __('Nie znam'); ?></button>
            </div>
            <?php /*
            <div class="col-12 text-right">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" checked>
                    <label class="form-check-label" for="inlineCheckbox1"><?= __('Słyszałem to w ') ?></label>
                </div>
            </div>
            */ ?>
        <!-- </div> -->
    </div>
</div>