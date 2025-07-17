
<?php if($is_media): ?>
<?php else: ?>
<div class="title <?= str_replace(' ', '-', $page -> template()) ?>">
    <a href='<?= page('home') -> url() ?>'>
        <div class='title-cont'><h1><?= $site -> title() ?></h1></div>
    </a>
</div>

<div class="mobile-menu-button">
    <h1>MENU</h1>
</div>
<?php if(!$page -> isHomePage()): ?>
    <section class="main menu-container">
    <ul class="main-menu menu">
    <?php $active ?>
    <?php foreach($site->children() -> listed() as $menuitem): ?>
        <?php 
        if($page -> parent() == $menuitem){
            $active = "active";
        } else if ($is_grandchild and $page -> parent() -> parent() == $menuitem){
            $active = "active";
        }else{$active = "dorm";}
        if($menuitem -> template() == 'artists'){
            $link = $menuitem -> url();
        }else{$link = $menuitem -> children() -> listed() -> first() -> url();}
        ?>
        <a  class=<?= $active ?> href ='<?= $link ?>'><li><h1><?= $menuitem -> title() ?></h1></li></a>
    <?php endforeach ?>
        <a class="<?php e($is_about, 'active')?>" href ='<?= $site -> children() ->template('gral-info') -> first() -> url() ?>'><li><h1><?= $site -> children() ->template('gral-info') -> first() -> title() ?></h1></li></a>
        <?= snippet('cart/checkoutsummary') ?>
    </ul>
    </section>

<?php if($page -> template() != 'artists'): ?>
    <section class="sub menu-container">
    <ul class="sub-menu menu">
    <?php if($page -> template() == 'project-collection'): ?>
    <?php foreach($page -> parent() -> children()->listed() as $menuitem): ?>
        <a class="<?php e($page == $menuitem, 'active')?>" href ='<?= $menuitem -> url() ?>'><li><h2><?= $menuitem -> title() ?></h2></li></a>
    <?php endforeach ?>
    <?php elseif($page -> template() == 'project'): ?>
    <?php foreach($page -> parent() -> parent() -> children()->listed() as $menuitem): ?>
        <a class="<?php e($page -> parent() == $menuitem, 'active')?>" href ='<?= $menuitem -> url() ?>'><li><h2><?= $menuitem -> title() ?></h2></li></a>
    <?php endforeach ?>
    <?php elseif($page -> template() == 'gral-info'): ?>
        <?php if($page ->parents()->count() > 0 && $page -> parent() -> template() == 'artists'):?>
        <a class='active' href='<?= $page -> parent() -> url()?>'><li><h2><?= $page -> header() ->or($page -> title()) ?></h2></li></a>
        <?php else:?>
        <li class='active no-link'><h2><?= $page -> header() ->or($page -> title()) ?></h2></li>
        <?php endif ?>
    <?php endif ?>
    </ul>  
    </section>
<?php endif ?>
<?php endif ?>
<?php endif ?>