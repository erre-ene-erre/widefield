<?php snippet('header') ?>


    <?php $link = $site -> children() -> template('projects') -> listed() -> first() -> children() -> listed() -> first() -> url(); ?>
    <a href='<?= $link ?>'>
    <img loading='lazy' 
        data-src="<?= $site -> cover() -> toFile() -> url() ?>" 
        data-srcset="<?=$site -> cover() -> toFile() -> srcset() ?>"
        data-sizes= "auto"
        alt='<?= $site -> cover() -> toFile() -> alt() ?>'>
    </a>


<?php snippet('footer') ?>