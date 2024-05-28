<?php snippet('header') ?>

<ul class='artists-list'>
<?php foreach($page -> children() -> listed() as $artist): ?>
    <a href='<?= $artist -> url() ?>'><li><h2><?= $artist -> title() ?></h2></li></a>
<?php endforeach ?>
</ul>

<?php snippet('footer') ?>
