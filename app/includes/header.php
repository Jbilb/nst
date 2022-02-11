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
    ?>
    <div id="wrapper" class="blanc-bg  <?php echo $classAnimation; ?>">
        <header class="p-header heightJs" id="header">
            <div class="p-header_bg"></div>
            <div class="p-header_titre">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="h1">
                                <?php echo $HEADER_title; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>