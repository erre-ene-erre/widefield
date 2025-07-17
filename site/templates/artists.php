<?php snippet('header') ?>

<ul class='artists-list'>
<?php foreach($page -> children() -> listed() as $artist): ?>
    <a href='<?= $artist -> url() ?>'><li><h1><?= $artist -> title() ?></h1></li></a>
<?php endforeach ?>
</ul>

<?php snippet('footer') ?>
