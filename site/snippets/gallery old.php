<?php $portraitCount = 0 ?>
<?php foreach ($page-> files() -> template('media-file') -> sortBy('sort') as $slide): ?> 
    <?php
        if($slide ->isPortrait()){
            $portraitCount++;
            if($portraitCount > 2){$portraitCount = 1;}
        }else{
            $portraitCount = 0;
        }
    ?>   
    <figure class="gallery-image <?php e($slide->sort() == '1', 'shown')?> <?=$slide -> orientation()?>" 
        data-index='<?=$portraitCount?>' data-previous='<?= $slide ->isNth(0) ?>' data-order=
            <?php if($slide -> isPortrait() && $slide ->isNth(0) != 1): ?>
                <?php if($portraitCount == 1): ?>
                    'first'
                <?php else: ?>
                    'second'
                <?php endif ?>
            <?php else: ?>
                'first'
            <?php endif ?>>

        <div class="square-bordered button">
            <h2>CLOSE</h2>
        </div>
        <img loading="lazy" 
            class="image" 
            data-src="<?= $slide -> url() ?>"
            data-srcset="<?= $slide -> srcset() ?>"
            data-sizes="auto" 
            alt="<?= $slide -> alt() ?>">
            <figcaption class="caption"><?= $slide -> caption() ?></figcaption>
    </figure>
<?php endforeach ?>
<?php if($page -> hasImages()): ?>
<div class="gallery-controllers">
    <span class='prev'><</span>
    <span class='next'>></span>
</div>
<?php endif ?>