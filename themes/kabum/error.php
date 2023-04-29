<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?= $head; ?>

    <link rel="base" href="<?= url(); ?>">
    <?= $this->section("styles"); ?>
    <link href="<?= theme('/assets/style.css') ?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?= theme('/assets/images/favicon.png'); ?>">

</head>

<body>
    <main class="main_content notfound">
        <div class="container">
            <span class="<?= ($error->icon ?? "icon-chain-broken") ?> icon-notext notfound_icon"></span>
            <h1 class="notfound_title"><?= $error->title ?></h1>
            <p><?= $error->message ?></p>
            <br>
            <a href="<?= $error->link ?>" title=" <?= CONF_SITE_NAME ?> | Home" class="btn btn-small radius transition"><?= $error->linkTitle ?> </a>
        </div>
    </main>
</body>

</html>