<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <base href="/epicerieriton.fr/app/">
    <!-- SEO  -->
    <title><?php echo $META_title; ?></title>
    <meta name="description" content="<?php echo $META_description; ?>" />
    <meta name="author" content="<?php echo $META_author; ?>" />
<?php if($PAGE_name == "legals" || $PAGE_name == "erreur404") { ?>
    <meta name="robots" content="noindex, nofollow" />
<?php } else { ?>
    <meta name="robots" content="index,follow" />
<?php } ?>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="img/icons/icone.png" type="image/png">
    <link rel="icon" href="img/icons/icone.png" type="image/png">
    <!-- CSS  -->
    <!-- build:css(app) css/style.min.css -->
    <link href="css/app.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <!-- endbuild -->
</head>
