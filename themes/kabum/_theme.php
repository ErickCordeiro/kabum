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

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>

<body>

    <div class="ajax_load">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <p class="ajax_load_box_title">Aguarde, Carregando...</p>
        </div>
    </div>

    <header class="main_header">
        
    </header>

    <!--CONTENT-->
    <main class="main_content">
        <?= $this->section("content"); ?>
    </main>
    
    <script src="<?= theme("/assets/scripts.js"); ?>"></script>
    <?= $this->section("scripts"); ?>
</body>

</html>