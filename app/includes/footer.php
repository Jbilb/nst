    <footer class="p-footer blanc-bg">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </footer>
    <div class="u-banner-cookies">
        <div class="u-banner-cookies_content">
            <p class="bleuFonce">En poursuivant votre navigation sur ce site,<br> vous
                acceptez que nous utilisions<br> des cookies pour mesurer l'audience de notre site.</p>
            <div class="bot">
                <button onclick="tarteaucitron.userInterface.respondAll(false);"
                    class="u-banner-cookies_parametre bouton" data-accept-cookies>
                    Tout refuser
                </button>
                <button onclick="tarteaucitron.userInterface.openPanel();" class="u-banner-cookies_parametre bouton"
                    data-accept-cookies>
                    paramètres
                </button>
                <button onclick="tarteaucitron.userInterface.respondAll(true);" class="u-banner-cookies_close bouton"
                    data-accept-cookies>
                    Tout accepter
                </button>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="tarteaucitron/tarteaucitron.js"></script>
    <!-- build:js(app) js/script.min.js -->
    <script type="text/javascript" src="js/components/form-mail-contact.js"></script>
    <script type="text/javascript" src="js/components/cookies.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="../node_modules/slick-carousel/slick/slick.min.js"></script>
    <!-- endbuild -->

    <!-- GOOGLE MAPS API (MULTIPOINTS) -->
    <?php if($PAGE_name == "page5" || $PAGE_name == "contact") {
//        include_once 'js/components/multimap.class.php';
//        $map = new Multimap('map-page5',12,[43.642085, 1.387442, 43.561394, 1.483496]);
//        foreach($DATA_page5 as $studio => $value) {
//            $html = '<div class="center"><p class="bulle-map center"><span class="korolev-b">'.mb_strtoupper($value['nom']).'</span><br/><br/>Téléphone : '.$value['telephone'].'<br/>Adresse : '.$value['adresse'].'<br/>'.$value['cp'].' '.$value['ville'].'<br/><br/><a href="studio-one-coaching-'.$studio.'.php" class="bouton noir" title="Découvrez le studio NomDuClient de '.$value['ville'].'">VOIR LE STUDIO</a></p></div>';
//            $lat = $value['latitude'];
//            $long = $value['longitude'];
//            $map->setMarker($html,$lat,$long);
//        }
//        echo $map->createMap();
    }
    ?>
    <!-- END WRAPPER -->
    </div>
    </body>

    </html>