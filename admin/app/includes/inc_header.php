<?php

// ========================================================
// Définition des variables utiles à l'échelle globale 
// Les rends accessibles depuis n'importe quelle fonction
// ========================================================

global $addScriptDeclaration, $site, $new_com; 

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html, charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!-- SEO  -->
    <title>Administration | <?php echo $site->name(); ?></title>
    <meta name="description" content="Administration Blog" />
    <meta name="author" content="Melting K" />
    <meta name="robots" content="noindex,nofollow"/>
    <base href="<?=SITE_ADMIN_BASE?>">
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    
    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700" rel="stylesheet"> 
    
    <!-- CSS  -->
    <!-- build:css(app) css/style.min.css -->
    <!-- Bootstrap -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- nprogress -->
    <link href="bower_components/nprogress/nprogress.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="bower_components/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="bower_components/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <!-- Dropzone -->
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <!-- Animate -->
    <link href="bower_components/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom -->
    <link href="css/app.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <!-- endbuild -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .login .login_content {border: 2px solid <?php echo $site->colorimg(); ?>;}
        .login .wrapper-logo {background-color: <?php echo $site->colorimg(); ?>}
        .left_col .wrapper-img {background-color: <?php echo $site->colorimg(); ?>}
    </style>
</head>