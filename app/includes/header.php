<?php 
    session_start();
    //unset($_SESSION['animation']);

    // ==================================================
    // ***** ANIMATION PART
    // ==================================================

    $classAnimation = 'first';
    $classHTML = '';

    if(isset($_SESSION['animation']) && $_SESSION['animation'] == "done") {
        $classAnimation = 'under';
        $classHTML = '';
    }
    if(isset($_SESSION['animation']) && $_SESSION['animation'] == "none") {
        $classAnimation = 'under';
        $classHTML = '';
    }
    include 'includes/helper.php';
    include 'includes/helper-mag.php';
    include 'controller/MainController.php';
    
    // *** Mag part
    if(!empty($_GET['page'])) {
        $pageName = $_GET['page'];
    } else {
        $pageName = '';
    }
    switch($pageName) 
    {      
        case 'article':
            include 'controller/ArticleController.php';
        break;     
        case 'mag':
            include 'controller/MagController.php';
        break;
    }
?>
<!DOCTYPE html>
<html lang="fr" class="<?php echo $classHTML; ?>">
<?php include 'includes/head.php'; ?>

<body id="top-page" class="<?php echo $PAGE_name; ?>">
    <div class="c-transition <?php echo $classAnimation; ?>">
        <div class="c-transition_wrapper">
            <div class="c-transition_wrapper_sigle">
                <img src="" alt="">
            </div>
        </div>
    </div>
    <?php
        include 'includes/nav.php';
        include 'includes/menu.php';
        include 'includes/modal-restaurants.php';
        include 'includes/modal-reservez.php';
    ?>
    <!-- START WRAPPER OVERSCROLLBAR-->
    <div id="wrapper-scroll">
        <div id="wrapper" class="blanc-bg  <?php echo $classAnimation; ?>">
            <header class="p-header heightJs" id="header">
                <div class="p-header_bg parallax" data-css="transform" data-start="translateY(-3%)"
                    data-end="translateY(0%)" data-stop="992" data-anchor="#header"></div>
                <div class="p-header_titre">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <?php if ($PAGE_name === "accueil") { ?>
                                <div class="p-header_titre_logo">
                                    <a class="content" href="<?php echo $NAV_accueil; ?>"
                                        title="<?php echo $NAV_TITLE_accueil; ?>">
                                        <img src="img/logos/logo-doncamillo.svg" alt="Logo doncamillo">
                                    </a>
                                </div>
                                <div class="p-header_titre_trait v-index">
                                    <div class="s-trait" style="--traitColor: #fff;">
                                        <span><?php include "img/svg/tiret.svg";?></span></div>
                                </div>
                                <h1 class="blanc uppercase center p-header_titre_h1">
                                    <span class="h1"><?php echo $HEADER_title; ?></span><span
                                        class="h5"><?php echo $HEADER_subtitle; ?></span>
                                </h1>
                                <?php } else { ?>
                                <h1 class="blanc uppercase center p-header_titre_h1">
                                    <span class="h1"><?php echo $HEADER_title; ?></span><span
                                        class="h5"><?php echo $HEADER_subtitle; ?></span>
                                </h1>
                                <div class="p-header_titre_trait">
                                    <div class="s-trait" style="--traitColor: #fff;">
                                        <span><?php include "img/svg/tiret.svg";?></span>
                                    </div>
                                </div>
                                </h1>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </header>