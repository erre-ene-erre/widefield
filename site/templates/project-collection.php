
<?php snippet('header') ?>

    <?php foreach($page -> children() -> listed() as $project): ?>
        <?php if($project -> hasImages()): ?>
        <?php $slide = $project -> files() -> template('media-file') -> sortBy('sort') -> first() ?>
        <a href='<?= $project -> url() ?>' class='item <?= $slide -> orientation() ?>'>    
          <figure class="edition-item <?= $slide -> orientation() ?> <?php e($project->flip()->toBool() === true, 'flip') ?>">
          
            <img loading="lazy" 
              class="image <?= $slide -> orientation() ?>" 
              data-src="<?= $slide -> url() ?>"
              data-srcset="<?= $slide -> srcset() ?>"
              data-sizes="auto"  
              alt="<?= $slide -> alt() ?>">

              <?php if($project->flip()->toBool() === true): ?>
              <img loading="lazy" 
                class="back image <?= $slide -> next() -> orientation() ?>" 
                data-src="<?= $slide -> next() -> url() ?>"
                data-srcset="<?= $slide -> next() -> srcset() ?>"
                data-sizes="auto"  
                alt="<?= $slide -> next() -> alt() ?>">
            <?php endif ?>
          
            <figcaption class="edition-title"><?= $project -> header() -> kt() -> or($project -> title()) ?></figcaption>
          </figure>
        </a>
        <?php endif ?>
    <?php endforeach ?>


<?php snippet('footer') ?>