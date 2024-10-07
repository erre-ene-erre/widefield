<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow" />

    <?php if($page->isHomePage()): ?>
    <meta property="title" content="<?= $site->title() ?>">
    <meta property="og:title" content="<?= $site->title() ?>">
    <?php else: ?>
    <meta property="title" content="<?= $page->title() -> upper() ?> &#183; <?= $site->title() ?>">
    <meta property="og:title" content="<?= $page->title() -> upper() ?> &#183; <?= $site->title() ?>">
    <?php endif ?>

    <meta name="description" content="<?= $site->metadescription() ?>">
    <meta property="og:description" content="<?= $site->metadescription() ?>">
    <meta property="og:url" content="<?= $site->url() ?>">

    
    <?php if($page->isHomePage()): ?>
    <title> <?= $site->title() ?></title>
    <?php else: ?>
    <title><?= $page->title() -> upper() ?> &#183; <?= $site->title() ?></title>
    <?php endif ?>
    <link rel="icon" type='image/png' href="<?= $site -> files() -> template('icon-image') ->first() ->url() ?>">

    <?= css('/assets/css/index.css?v=1.2.2') ?>
    <?= css('@auto') ?>
</head>
<body>
    <?php snippet('news-post-it')?>
    <main class="main-container <?= str_replace(' ', '-', $page -> template()) ?>">

    <?php snippet('main-nav') ?>
    <section class='content <?= str_replace(' ', '-', $page -> template()) ?>'>