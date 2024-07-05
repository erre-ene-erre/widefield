<?php snippet('header') ?>

<div class='column col-1 gallery'>
    <?php snippet('gallery')?>
</div>

<div class="column col-2 info">
    <?= $page -> info() -> text() ?>
    <?php if($page -> moreinfo() -> isNotEmpty()): ?>
        <div class="more-info">
            <?= $page -> moreinfo() -> text() ?>
        </div>
        <div class="read-more">(Read More)</div>
    <?php endif ?>
    <?= $page -> textbottom() ->kt()?>

    <?php if($is_about): ?>
    <div class="extra-content">
        <?php if(collection('active-news') -> isNotEmpty()) :?>
        <h2 class='subheader'>news</h2>
        <?php foreach (collection('active-news') as $newsitem): ?>
        <div class="extra-item">
            <?php if($newsitem -> image() -> isNotEmpty()): ?>
                <?php snippet('column-image', ['slide' => $newsitem -> image() -> toFile()]) ?>
            <?php endif ?>
            <h2><?= $newsitem -> title() -> text() ?></h2>
            <p><?= $newsitem -> info() -> text() ?></p>
        </div>
        <?php endforeach ?>
        <?php endif ?>
        <?php if(collection('past-news') -> isNotEmpty()) :?>
        <h2 class='subheader'>past</h2>
        <?php foreach (collection('past-news') as $newsitem): ?>
        <div class="extra-item">
            <?php if($newsitem -> image() -> isNotEmpty()): ?>
                <?php snippet('column-image', ['slide' => $newsitem -> image() -> toFile()]) ?>
            <?php endif ?>
            <h2><?= $newsitem -> title() -> text() ?></h2>
            <p><?= $newsitem -> info() -> text() ?></p>
        </div>
        <?php endforeach ?>
        <?php endif ?>
    </div>
    <?php endif ?>
    <?php if($is_artist): ?>
    <div class="extra-content">
        <h2 class='subheader'>related</h2>
        <?php foreach(collection('all-projects') as $project): ?>
            <?php foreach ($project->artists()->split() as $artist): ?>
                <?php if($page -> title() == $artist): ?>
                    <div class="extra-item">
                    <a href ='<?=$project -> url() ?>'>
                    <?php snippet('column-image', ['slide' => $project -> files() -> template('media-file') -> sortBy('sort') -> first()]) ?>
                    <?= $project -> header() -> text() ?>
                    </a>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
            
        <?php endforeach ?>
    </div>
    <?php endif ?>
</div>

<?php snippet('footer') ?>