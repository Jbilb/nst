<?php 
//VARIABLES
$PAGE_name = 'erreur404';
$HEADER_title = 'OUPS... Une érreur est survenue.';
$HEADER_subtitle = 'La page que vous recherchez n\'existe plus ou à vraisemblablement été déplacée.';
//INCLUDE HELPER & HEADER

include 'includes/header.php'; 
?>

<section id="section-top">
    <section class="erreur-header vert-bg" id="erreur-header">
        <span class="illustration anim-illustration">
            <img src="img/svg/poivron-vert.svg" alt="Pizza Don Camillo">
        </span>
        <span class="illustration anim-illustration">
            <img src="img/svg/huile-olive-vert.svg" alt="Huile Don Camillo">
        </span>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
                    <div class="erreur-header_content">
                        <?php $lisere_border = true; include "includes/lisere.php"; ?>
                        <h1 class="center font bold rose erreur-header_content_title">404</h1>
                        <p class="center blanc erreur-header_content_subtitle">Il semble que la page que vous<br>
                            cherchez est introuvable.</p>
                        <div class="center">
                            <a href="<?php echo $NAV_accueil; ?>" title="<?php echo $NAV_TITLE_accueil; ?>"
                                class="bouton bg0-white-brRose"><span>Retour à l'accueil</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<?php include 'includes/footer.php'; ?>