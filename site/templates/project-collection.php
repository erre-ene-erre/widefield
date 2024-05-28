
<?php snippet('header') ?>

    <?php foreach($page -> children() -> listed() as $project): ?>
        <?php $slide = $project -> files() -> template('media-file') -> sortBy('sort') -> first() ?>
        <a href='<?= $project -> url() ?>' class='<?= $slide -> orientation() ?>'>    
          <figure class="edition-item <?= $slide -> orientation() ?>">
          
            <img loading="lazy" 
              class="image <?= $slide -> orientation() ?>" 
              src="<?= $slide -> quality(72) -> url() ?>"
              srcset="<?= $slide -> srcset([320, 640, 960, 1280, 1600, 1920]) ?>"  
              alt="<?= $slide -> alt() ?>">
          
            <figcaption class="edition-title"><h2><?= $project -> title() ?></h2></figcaption>
          </figure>
        </a>
    <?php endforeach ?>


<?php snippet('footer') ?>