    <figure class="column-item <?= $slide -> orientation() ?>">
    <img loading="lazy" 
      class="image <?= $slide -> orientation() ?>" 
      data-src="<?= $slide -> url() ?>"
      data-srcset="<?= $slide -> srcset() ?>"
      data-sizes="auto"  
      alt="<?= $slide -> alt() ?>">
    </figure>