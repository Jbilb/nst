    <footer class="p-footer vert-bg">
        <?php $lisere_border = false; include "includes/lisere.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="p-footer_top">
                        <a class="logo" href="<?php echo $NAV_accueil; ?>" title="<?php echo $NAV_TITLE_accueil; ?>">
                            <img src="img/logos/logo-doncamillo-footer.svg" alt="logo-doncamillo-footer">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-xl-10 col-xl-offset-1">
                    <div class="p-footer_mid">
                        <div class="bloc">
                            <h2 class="h4 center rose bloc_title">
                                Découvrez <br>Don Camillo
                            </h2>
                            <div class="bloc_trait center">
                                <div class="s-trait" style="--traitColor: #E39077;">
                                    <span><?php include "img/svg/tiret.svg";?></span></div>
                            </div>
                            <ul class="bloc_nav">
                                <li>
                                    <a class="paragr item" href="<?php echo $NAV_page_histoire; ?>"
                                        title="<?php echo $NAV_TITLE_page_histoire; ?>">Une
                                        histoire de famille</a>
                                </li>
                                <li>
                                    <a class="paragr item" href="<?php echo $NAV_page_rejoindre; ?>"
                                        title="<?php echo $NAV_TITLE_page_rejoindre; ?>">
                                        Rejoindre la famille</a>
                                </li>
                            </ul>
                            <div class="bloc_bouton">
                                <a href="<?php echo $NAV_mag; ?>" title="<?php echo $NAV_TITLE_mag; ?>"
                                    class="bouton bg0-white-brRose">
                                    <span>le magazine</span>
                                </a>
                            </div>
                            <div class="bloc_last">
                                <a class="paragr item semi-bold" href="<?php echo $NAV_contact; ?>"
                                    title="<?php echo $NAV_TITLE_contact; ?>">Nous
                                    contacter</a>
                            </div>
                        </div>
                        <div class="bloc">
                            <h2 class="h4 center rose bloc_title">
                                Réservez <br>votre table !
                            </h2>
                            <div class="bloc_trait center">
                                <div class="s-trait" style="--traitColor: #E39077;">
                                    <span><?php include "img/svg/tiret.svg";?></span></div>
                            </div>
                            <ul class="bloc_nav">
                                <li>
                                    <a class="paragr item" href="<?php echo $NAV_page_carte; ?>"
                                        title="<?php echo $NAV_TITLE_page_carte; ?>">La carte</a>
                                </li>
                                <li>
                                    <button class="paragr item js-modal" data-modal="js-restaurants">
                                        Nos restaurants
                                    </button>
                                </li>
                            </ul>
                            <div class="bloc_bouton">
                                <button class="bouton bg0-white-brRose js-modal" data-modal="js-reservez">
                                    <span>Réservation</span>
                                </button>
                            </div>
                            <div class="bloc_last">
                                <?php include "includes/rs.php"; ?>
                            </div>
                        </div>
                        <div class="bloc">
                            <h2 class="h4 center rose bloc_title">
                                <?php $city = "pamiers"; ?>
                                Don Camillo<br class="keep"> <?=$restaurants[$city]['name'];?>
                            </h2>
                            <div class="bloc_trait center">
                                <div class="s-trait" style="--traitColor: #E39077;">
                                    <span><?php include "img/svg/tiret.svg";?></span></div>
                            </div>
                            <div class="bloc_horaires">
                                <p class="blanc center">À votre service
                                    <br class="keep"><?=$restaurants[$city]['schedule'];?>
                                </p>
                            </div>
                            <div class="bloc_adresses">
                                <p class="blanc center">
                                    <?=$restaurants[$city]['adress'];?><br class="keep">
                                    <?=$restaurants[$city]['cp'];?> <?=$restaurants[$city]['city'];?>
                                </p>
                            </div>
                            <div class="bloc_telephone">
                                <p class="blanc center">
                                    <a href="tel:<?=$restaurants[$city]['phone'];?>"
                                        class="no-link-desktop paragr center blanc bold"><?=$restaurants[$city]['phone'];?></a>
                                </p>
                            </div>
                        </div>
                        <div class="bloc">
                            <h2 class="h4 center rose bloc_title">
                                <?php $city = "foix"; ?>
                                Don Camillo<br class="keep"> <?=$restaurants[$city]['name'];?>
                            </h2>
                            <div class="bloc_trait center">
                                <div class="s-trait" style="--traitColor: #E39077;">
                                    <span><?php include "img/svg/tiret.svg";?></span></div>
                            </div>
                            <div class="bloc_horaires">
                                <p class="blanc center">À votre service <br
                                        class="keep"><?=$restaurants[$city]['schedule'];?>
                                </p>
                            </div>
                            <div class="bloc_adresses">
                                <p class="blanc center">
                                    <?=$restaurants[$city]['adress'];?><br class="keep">
                                    <?=$restaurants[$city]['cp'];?> <?=$restaurants[$city]['city'];?>
                                </p>
                            </div>
                            <div class="bloc_telephone">
                                <p class="blanc center">
                                    <a href="tel:<?=$restaurants[$city]['phone'];?>"
                                        class="no-link-desktop paragr center blanc bold"><?=$restaurants[$city]['phone'];?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="p-footer_bot">
                        <p class="center paragr-small">Copyright 2022 Don Camillo - Tous droits réservés - <a
                                target="_blank" href="https://www.melting-k.fr/"
                                title="Agence de communication globale"> Site
                                par
                                melting.k</a> -
                            <a href="<?php echo $NAV_legals; ?>" title="<?php echo $NAV_TITLE_legals; ?>">Mentions
                                légales</a> - <a href="<?php echo $LINK_allergenes; ?>"
                                title="<?php echo $LINK_TITLE_allergenes; ?>">Allergènes</a></p>
                        <p class="center paragr-small">Pour votre santé, mangez au moins cinq fruits et légumes
                            par jour.
                            www.mangerbouger.fr - L’abus d’alcool est dangereux pour la santé, à consommer avec
                            modération.</p>
                    </div>
                </div>
            </div>
        </div>
        <span class="p-footer_forme">
            <img src="img/svg/olives-vert.svg" alt="olives-vert">
        </span>
    </footer>
    <div class="u-banner-cookies">
        <div class="u-banner-cookies_content">
            <p class="vert">En poursuivant votre navigation sur ce site, vous
                acceptez que nous utilisions des cookies pour mesurer l'audience de notre site.</p>

            <button onclick="tarteaucitron.userInterface.openPanel();" class="u-banner-cookies_parametre"
                data-accept-cookies>
                paramètres
            </button>
            <div class="bot">
                <button onclick="tarteaucitron.userInterface.respondAll(false);"
                    class="u-banner-cookies_refuse bouton bg0-white-brvert" data-accept-cookies>
                    <span>Refuser</span>
                </button>
                <button onclick="tarteaucitron.userInterface.respondAll(true);"
                    class="u-banner-cookies_close bouton bg0-white-brvert" data-accept-cookies>
                    <span>Accepter</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="tarteaucitron/tarteaucitron.js"></script>
    <!-- build:js(app) js/script.min.js -->
    <script type="text/javascript" src="js/app-mag.js"></script>
    <script type="text/javascript" src="../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/components/form-mail-contact.js"></script>
    <script type="text/javascript" src="js/components/cookies.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="../node_modules/slick-carousel/slick/slick.min.js"></script>
    <script type="text/javascript" src="../node_modules/overlayscrollbars/js/jquery.overlayScrollbars.js"></script>
    <!-- endbuild -->
    <!-- END WRAPPER -->
    </div>
    </div>
    <!-- END WRAPPER OVERSCROLLBAR-->
    <!-- GOOGLE MAPS API (MULTIPOINTS) -->
    <?php if($PAGE_name == "contact") {
           include_once 'js/components/multimap.class.php';
           $map = new Multimap('map-restaurant',10,[43.188138277105374, 1.501272900870296, 42.93756425138058, 1.8523339533189136]);
           foreach($DATA_restaurants as $restaurant => $value) {
               $html = '<div class="center"><p class="bulle-map center"><p class="center bold rose">Restaurant '.$value['name'].'</p><a href="'.$value['url'].'" class="bouton" title="Découvrez le restaurant Don Camillo de '.$value['name'].'"><span>Découvrir</span></a></p></div>';
               $lat = $value['lat'];
               $long = $value['long'];
               $map->setMarker($html,$lat,$long);
           }
           echo $map->createMap();
    }
    ?>
    </body>

    </html>