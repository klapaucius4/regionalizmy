<?php if($breadcrumbStructure = get_breadcrumb_structure()): ?>
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php foreach($breadcrumbStructure as $crumb): ?>
            <li class="breadcrumb__item breadcrumb-item<?= !$crumb[1] ? ' breadcrumb__item--active active' : ''; ?>">
                <?php if($crumb[1]): ?><a href="<?= $crumb[1]; ?>"><?php endif; ?>
                <?= $crumb[0]; ?>
                <?php if($crumb[1]): ?></a><?php endif; ?>
            </li>
            <?php endforeach; ?>
            <?php /*
            <li class="breadcrumb__item breadcrumb-item"><a href="<?= get_the_permalink($frontpageID); ?>"><?= get_the_title($frontpageID); ?></a></li>
            <li class="breadcrumb__item breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb__item breadcrumb-item breadcrumb__item--active active" aria-current="page">Data</li>
            */ ?>
        </ol>
    </nav>
<?php endif; ?>