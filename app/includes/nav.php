<nav class="p-nav masked">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="p-nav_content">
                    <a class="p-nav_content_logo" href="<?php echo $NAV_accueil; ?>"
                        title="<?php echo $NAV_TITLE_accueil; ?>">
                        <?php include "img/logos/logo-doncamillo-bicolore.svg"; ?>
                    </a>
                    <div class="p-nav_content_right">
                        <a href="<?php echo $NAV_page_carte; ?>" title="<?php echo $NAV_TITLE_page_carte; ?>"
                            class="p-nav_content_link">
                            <span>notre carte</span>
                        </a>
                        <button class="p-nav_content_link js-modal" data-modal="js-restaurants">
                            <span>nos restaurants</span>
                        </button>
                        <div class="p-nav_content_reservation js-modal" data-modal="js-reservez">
                            <button class="p-nav_content_picto">
                                <img src="img/icons/commande.svg" alt="commande">
                            </button>
                            <button class="p-nav_content_bouton bouton">
                                <span>réservation</span>
                            </button>
                        </div>
                        <div class="p-nav_content_burger js-modal" data-modal="js-menu">
                            <button class="content">
                                <span class="barre"></span>
                                <span class="barre"></span>
                                <span class="barre"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>