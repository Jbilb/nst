<?php

//*******************************
// Balises Méta
//*******************************

$META_author = 'NomDuClient';

switch ($PAGE_name) {
    case 'accueil':
        $META_title = "";
        $META_description = "";
        $META_robots = "index,follow";
        break;
    case 'page2':
        $META_title = "";
        $META_description = "";
        $META_robots = "index,follow";
        break;
    case 'page3':
        $META_title = "";
        $META_description = "";
        $META_robots = "index,follow";
        break;
    case 'page4':
        $META_title = "";
        $META_description = "";
        $META_robots = "index,follow";
        break;
    case 'page5':
        $META_title = "";
        $META_description = "";
        $META_robots = "index,follow";
        break;
    case 'page6':
        $META_title = "";
        $META_description = "";
        $META_robots = "index,follow";
        break;
    case 'page7':
        $META_title = "";
        $META_description = "";
        $META_robots = "index,follow";
        break;
    case 'page8':
        $META_title = "";
        $META_description = "";
        $META_robots = "index,follow";
        break;
    case 'contact':
        $META_title = "";
        $META_description = "";
        $META_robots = "index,follow";
        break;
    case 'erreur404':
        $META_title = "OUPS... Une erreur est survenue.";
        $META_description = "La page ou le contenu que vous recherchez n'existe plus ou a été déplacé. Utilisez notre plan de site pour retrouver les informations que vous recherchez";
        $META_robots = "noindex,nofollow";
        break;
    case 'legals':
        $META_title = "Mentions légales et politique de confidentialité | NomDuClient";
        $META_description = "Les mentions légales relatives à l'utilisation du site www.domaine.ext, ainsi que notre politique de confidentialité à l'égard de vos données personnelles";
        $META_robots = "noindex,nofollow";
        break;
    default:
        $META_description = '';
        $META_title = '';
}

//*******************************
// Navigation du site
//*******************************

$NAV_accueil = 'index.php';
$NAV_TITLE_accueil = '';

$NAV_page2 = 'page2';
$NAV_TITLE_page2 = '';

$NAV_page3 = 'page3';
$NAV_TITLE_page3 = '';

$NAV_page4 = 'page4';
$NAV_TITLE_page4 = '';

$NAV_page5 = 'page5';
$NAV_TITLE_page5 = '';

$NAV_page6 = 'page6';
$NAV_TITLE_page6 = '';

$NAV_page7 = 'page7';
$NAV_TITLE_page7 = '';

$NAV_page8 = 'page8';
$NAV_TITLE_page8 = '';

$NAV_contact = 'contact';
$NAV_TITLE_contact = '';

$NAV_legals = 'mentions-legales';
$NAV_TITLE_legals = 'Mentions légales de www.domaine.ext';

//*******************************
// url externes
//*******************************

$LINK_facebook = 'https://www.facebook.com/';
$LINK_TITLE_facebook = 'Découvrez toute l\'actualité de NomDuClient sur Facebook';

$LINK_linkedin = 'https://www.linkedin.com/';
$LINK_TITLE_linkedin = 'Découvrez toute l\'actualité de NomDuClient sur Linkedin ';

$LINK_instagram = 'https://www.instagram.com/';
$LINK_TITLE_instagram = 'Découvrez toute l\'actualité de NomDuClient sur Instagram';

//*******************************
// inclusion datastore
//*******************************

$DATA_simpleArray = include_once 'datastore/simple_array.data.php';
$DATA_objectArray = include_once 'datastore/object_array.data.php';

//*******************************
// SHARING ELEMENTS
//*******************************

$ogURL = "https://www.domaine.ext".$_SERVER['REQUEST_URI'];
$ogIMG = "https://www.domaine.ext/img/img-share.jpg";

//*******************************
// EMAILS ENCODES
//*******************************

$EMAIL_contact = "cont<!-- nospam@email -->act@coo<!-- @nospam.com -->rdia.fr";