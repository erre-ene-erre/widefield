<?php snippet('header') ?>

<div class='column col-1 gallery'>
    <?php snippet('gallery')?>
</div>

<div class="column col-2 info">
    <?php if($page -> edition() -> isNotEmpty()): ?>
    <div class="square-bordered">
        <h2><?= sprintf('%02s', $page -> edition())?></h2>
    </div>
    <br>
    <?php endif ?>
    
    <?= $page -> eventinfo() ->kt()?>
    <?php if($page -> moreinfo() -> isNotEmpty()): ?>
        <div class="more-info">
            <?= $page -> moreinfo() -> text() ?>
        </div>
        <div class="read-more"><i>(Read More)</i></div>
    <?php endif ?>
    <?= $page -> textbottom() ->kt()?>

    <?php snippet('project-nav') ?>
</div>

<?php snippet('footer') ?>