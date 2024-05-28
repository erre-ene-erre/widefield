<?php snippet('header') ?>

<div class="cover">
    <?php $link = $site -> children() -> template('projects') -> listed() -> first() -> children() -> listed() -> first() -> url() ?>
    <a href='<?= $link ?>'>
        <img src=<?= $site -> cover() -> toFile() -> quality(72) -> url() ?> loading='lazy' 
                srcset="<?=$site -> cover() -> toFile() -> quality(72) -> srcset([320, 640, 960, 1280, 1600, 1920])->url() ?>"
                alt='<?= $site -> cover() -> toFile() -> alt() ?>'>
    </a>
</div>


<?php snippet('footer') ?>