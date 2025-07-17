<?php if ($page -> hasPrevListed() or $page -> hasNextListed()): ?>  
    <div class="controllers">  
    <?php if ($page -> hasPrevListed()): ?>
        <div class="square-bordered button">
            <a class='button-link' href="<?= $page->prevListed()->url() ?>">
            <h2>PREVIOUS</h2></a>
        </div>
    <?php endif ?> 
    <?php if ($page -> hasNextListed()): ?>
        <div class="square-bordered button">
            <a class='button-link' href="<?= $page->nextListed()->url() ?>">
            <h2>NEXT</h2></a>
        </div>
    <?php endif ?> 
    </div>
<?php endif ?>