<div class="p-menu">
    <div class="p-menu_content heightJs">
        <div class="p-menu_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5 col-md-push-6">
                        <div class="content">
                            <div class="p-menu_title">
                                RÉSERVEZ VOTRE TABLE
                            </div>
                            <ul class="p-menu_nav">
                                <li class="<?php if($PAGE_name === "page_carte") {echo 'active';} ?>">
                                    <div class="wrap-item">
                                        <a class="item" href="<?php echo $NAV_page_carte; ?>"
                                            title="<?php echo $NAV_TITLE_page_carte; ?>">La carte</a>
                                    </div>
                                </li>
                                <li class="<?php if($PAGE_name === "page5") {echo 'active';} ?>">
                                    <div class="wrap-item">
                                        <button class="item">
                                            Nos restaurants
                                        </button>
                                    </div>
                                </li>
                            </ul>
                            <div class="p-menu_bouton">
                                <button class="bouton bg0-white-brRose">
                                    <span>Réservation</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5 col-md-pull-5">
                        <div class="content">
                            <div class="p-menu_title">
                                Découvrez Don Camillo
                            </div>
                            <ul class="p-menu_nav">
                                <li class="<?php if($PAGE_name === "page_histoire") {echo 'active';} ?>">
                                    <div class="wrap-item">
                                        <a class="item" href="<?php echo $NAV_page_histoire; ?>"
                                            title="<?php echo $NAV_TITLE_page_histoire; ?>">Une
                                            histoire de famille</a>
                                    </div>
                                </li>
                                <li class="<?php if($PAGE_name === "page_rejoindre") {echo 'active';} ?>">
                                    <div class="wrap-item">
                                        <a class="item" href="<?php echo $NAV_page_rejoindre; ?>"
                                            title="<?php echo $NAV_TITLE_page_rejoindre; ?>">
                                            Rejoindre la famille</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="p-menu_bouton">
                                <a href="" class="bouton bg0-white-brRose">
                                    <span>le magazine</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-menu_bot">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <a class="item item-contact semi-bold" href="<?php echo $NAV_contact; ?>"
                            title="<?php echo $NAV_TITLE_contact; ?>">Nous
                            contacter</a>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="p-menu_rs">
                            <?php include "includes/rs.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="forme-olivier">
            <img src="img/svg/romarin-3-vert.svg" alt="Romarin Doncamillo">
        </span>
        <span class="forme-pates">
            <img src="img/svg/assiette-2-vert.svg" alt="Pâtes Doncamillo">
        </span>
    </div>
</div>