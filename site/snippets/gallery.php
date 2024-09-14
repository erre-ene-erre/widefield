<?php 
    $portraitCount = 0;
    if($page -> hasChildren()){
        foreach ($page -> children() as $child) {
            if($image = $child->image()){
                $images = $page -> children();
                $lightbox = true;
            }
        }       
    } else{
        $images = $page-> files() -> template('media-file') -> sortBy('sort');
        $lightbox = false;
    }
?>

<?php foreach($images as $image): ?>
    <?php
        if($lightbox){$url = $image -> url(); $image = $image -> image();}
        if($image ->isPortrait()){
            $portraitCount++;
            if($portraitCount > 2){$portraitCount = 1;}
        }else{
            $portraitCount = 0;
        }
    ?>   
    <figure class="gallery-image <?php e($image->sort() == '1', 'shown')?> <?=$image -> orientation()?>" 
        data-index='<?=$portraitCount?>' data-previous='<?= $image ->isNth(0) ?>' data-order=
            <?php if($image -> isPortrait() && $image ->isNth(0) != 1): ?>
                <?php if($portraitCount == 1): ?>
                    'first'
                <?php else: ?>
                    'second'
                <?php endif ?>
            <?php else: ?>
                'first'
            <?php endif ?>>
        <?php if($lightbox): ?>
        <a href="<?= $url ?>">
        <?php endif ?>
        <!-- <div class="square-bordered button">
            <h2>CLOSE</h2>
        </div> -->
        <img loading="lazy" 
            class="image" 
            data-src="<?= $image -> url() ?>"
            data-srcset="<?= $image -> srcset() ?>"
            data-sizes="auto" 
            alt="<?= $image -> alt() ?>">
        <figcaption class="caption"><?= $image -> caption() -> kt() ?></figcaption>
        <?php if($lightbox): ?>    
        </a>
        <?php endif ?>
    </figure>

<?php endforeach ?>
<?php if($page -> hasImages()): ?>
<div class="gallery-controllers">
    <span class='prev'><</span>
    <span class='next'>></span>
</div>
<?php endif ?>