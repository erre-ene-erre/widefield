<?php snippet('header') ?>

<?php if ($image = $page->image()) : ?>
<div class="square-bordered button">
    <a href="<?= $page->parent()->url() ?>">
    <h2>✕</h2></a>
</div>
<figure class='lightbox <?=$image -> orientation()?>'>
    <img loading="lazy" alt="<?= $image -> alt() ?>"
    <?php if($image ->mime() === 'image/gif'): ?>
        src= "<?= $image -> url() ?>"
    <?php else: ?>
        data-src="<?= $image -> quality(72) -> url() ?>"
        data-srcset="<?= $image -> srcset() ?>"
        data-sizes="auto"
    <?php endif ?>
    >
    <?php if($image -> caption() -> isNotEmpty()): ?>
    <figcaption><?= $image -> caption() ?></figcaption>
    <?php endif ?>
</figure>


<div class="lightbox-controllers">
    <span>
        <?php if($page -> hasPrevListed()): ?>
        <a href='<?= $page -> prevListed() -> url() ?>'><</a>
         <?php endif ?>
    </span>
    <span>
         <?php if($page -> hasNextListed()): ?>
        <a href='<?= $page -> nextListed() -> url() ?>'>></a>
         <?php endif ?>
    </span>
</div>
 <?php endif ?>
<?php snippet('footer') ?>
