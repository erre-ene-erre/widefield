
<?php snippet('header') ?>

    <?php foreach($page -> children() -> listed() as $project): ?>
        <?php if($project -> hasImages()): ?>
        <?php $slide = $project -> files() -> template('media-file') -> sortBy('sort') -> first() ?>
        <a href='<?= $project -> url() ?>' class='item <?= $slide -> orientation() ?>'>    
          <figure class="edition-item <?= $slide -> orientation() ?>">
          
            <img loading="lazy" 
              class="image <?= $slide -> orientation() ?>" 
              data-src="<?= $slide -> url() ?>"
              data-srcset="<?= $slide -> srcset() ?>"
              data-sizes="auto"  
              alt="<?= $slide -> alt() ?>">
          
            <figcaption class="edition-title"><h2><?= $project -> header() -> kt() -> or($project -> title()) ?></h2></figcaption>
          </figure>
        </a>
        <?php endif ?>
    <?php endforeach ?>


<?php snippet('footer') ?>