<div class="row mb-3">
    <div class="col-md-8 post-preview">
        <a href="<?= get_the_permalink(); ?>">
            <h2 class="post-title m-0"><?= get_the_title(); ?></h2>
            <!-- <h3 class="post-subtitle"><?= get_field('krotki_opis'); ?></h3> -->
        </a>
        <?php
        $meaning = get_field('znaczenie');
        $synonyms = null;
        if(isset($meaning[0])): 
            $args = array(
                'post_type' => 'rgm_phrase',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'meta_query' => array(
                    array(
                        'key' => 'znaczenie', // name of custom field
                        'value' => '"' . $meaning[0]->ID . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                        'compare' => 'LIKE'
                    )
                )
            );
            $rgmQuery = new WP_Query($args);
            if($rgmQuery->have_posts()){
                $synonyms = '';
                while($rgmQuery->have_posts()){
                    $rgmQuery->the_post();
                    if(!empty($synonyms)){
                        $synonyms .= ', ';
                    }
                    $synonyms .= '<a href="#">' . get_the_title() . '</a>';
                }
            }
            
        ?>
            <p class="post-meta"><i class="fas fa-book-open mr-2"></i><?= $meaning[0]->post_title; ?></p>
        <?php endif; ?>
        <?php if($synonyms): ?>
            <p class="post-meta"><i class="fas fa-project-diagram mr-2"></i><?= $synonyms; ?></p>
        <?php endif; ?>
        <!-- <p class="post-meta"><?= __('Dodane przez', 'rgm'); ?> <a href="#"><?= get_the_author(); ?></a> <?= get_the_date(); ?></p> -->
    </div>
    <div class="vote-buttons col-md-4 d-flex justify-content-end align-items-center">
        <button class="btn btn--vote btn-success mr-1" data-phrase-name="<?= get_the_title(); ?>" data-phrase-id="<?= get_the_ID(); ?>" data-vote-value="1"><?= __('Znam', 'rgm'); ?></button>
        <button class="btn btn--vote btn-danger" data-phrase-name="<?= get_the_title(); ?>" data-phrase-id="<?= get_the_ID(); ?>" data-vote-value="-1"><?= __('Nie znam', 'rgm'); ?></button>
    </div>
</div>