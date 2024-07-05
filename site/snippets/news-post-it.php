<?php if(collection('active-news') -> isNotEmpty()) :?>
    <div class="news-container">
    <?php foreach (collection('active-news') as $newsitem): ?>
        <div class="news-content"> 
            <h2><?= $newsitem -> title() -> text() ?></h2>
            <p><?= $newsitem -> info() -> text() ?></p>
        </div>
    <?php endforeach ?>
    <div class="square-bordered button"> <h2>CLOSE</h2></div>
    </div>
<?php endif ?>