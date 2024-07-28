<?php snippet('header') ?>

<div class='column col-1 gallery'>
    <?php snippet('gallery')?>
</div>

<div class="column col-2 info">    
    <?= $page -> eventinfo() ->kt()?>
    <?php if($page -> moreinfo() -> isNotEmpty()): ?>
        <div class="more-info">
            <?= $page -> moreinfo() -> text() ?>
        </div>
        <div class="read-more">(...) read more</div>
    <?php endif ?>
    <?= $page -> textbottom() ->kt()?>
    <?php if($page->issale()->toBool() === true): ?>
        <p>Price: <?= $page -> productPrice() ?> CHF</p>
        <?= snippet('product/add') ?>
    <?php endif ?>

    <?php snippet('project-nav') ?>
</div>

<?php snippet('footer') ?>