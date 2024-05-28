
<div class="title <?= str_replace(' ', '-', $page -> template()) ?>">
    <a href='<?= page('home') -> url() ?>'><h1><?= $site -> title() ?></h1></a>
</div>

<?php if(!$page -> isHomePage()): ?>
    <section class="main menu-container">
    <ul class="main-menu menu">
    <?php $active ?>
    <?php foreach($site->children()->template('projects') -> listed() as $menuitem): ?>
        <?php 
        if($page -> parent() == $menuitem){
            $active = "active";
        } else if ($is_grandchild and $page -> parent() -> parent() == $menuitem){
            $active = "active";
        }else{$active = "dorm";}
        ?>
        <a  class=<?= $active ?> href ='<?= $menuitem -> children() -> listed() -> first() -> url() ?>'><li><h1><?= $menuitem -> title() ?></h1></li></a>
    <?php endforeach ?>
        <a class="<?php e($is_artists or $is_artist, 'active')?>" href ='<?= $site -> children() ->template('artists') -> listed() -> first() -> url() ?>'><li><h1><?= $site -> children() ->template('artists') -> listed() -> first() -> title() ?></h1></li></a>
        <a class="<?php e($is_about, 'active')?>" href ='<?= $site -> children() ->template('gral-info') -> listed() -> first() -> url() ?>'><li><h1><?= $site -> children() ->template('gral-info') -> listed() -> first() -> title() ?></h1></li></a>
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
        <li class='active no-link'><h2><?= $page -> header() ->or($page -> title()) ?></h2></li>
    <?php endif ?>
    </ul>  
    </section>
<?php endif ?>
<?php endif ?>