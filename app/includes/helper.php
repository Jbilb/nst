<?php

//*******************************
// Balises Méta
//*******************************

$META_author = 'Don Camillo';

switch ($PAGE_name) {
    case 'accueil':
        $META_title = "Don Camillo - Trattoria familiale";
        $META_description = "Pizzas, pâtes ou encore gnocchi, dégustez des recettes savoureuses au sein de nos restaurants franco-italiens à foix et Pamiers.";
        $META_robots = "index,follow";
        break;
    case 'page_histoire':
        $META_title = "Don Camillo - L’Italie depuis 1988";
        $META_description = "Depuis notre enfance, nous sommes aux premières loges dans la cuisine familiale. L’engagement de nos parents et leur goût du travail bien fait sont des valeurs ancrées dans notre ADN.";
        $META_robots = "index,follow";
        break;
    case 'page_carte':
        $META_title = "Don Camillo Foix et Pamiers - Découvrez la carte";
        $META_description = "Nos pizzas gastronomiques sont façonnées à la main, tout comme l’ensemble de nos pâtes qui sont pétries et préparées dans nos cuisines.";
        $META_robots = "index,follow";
        break;
    case 'page_rejoindre':
        $META_title = "Don Camillo - Rejoignez la famille";
        $META_description = "Nous recrutons ! Chez Don Camillo, nos collaborateurs, c'est notre famille. C'est dans cette optique que nous prenons soin de chaque membre de notre équipe.";
        $META_robots = "index,follow";
        break;
    case 'contact':
        $META_title = "Don Camillo - Contactez-nous.";
        $META_description = "Besoin d’informations sur nos restaurants ou nos recettes italiennes ? Contactez-nos équipes : 09 74 19 08 09.";
        $META_robots = "index,follow";
        break;
    case 'erreur404':
        $META_title = "OUPS... Une erreur est survenue.";
        $META_description = "La page ou le contenu que vous recherchez n'existe plus ou a été déplacé. Utilisez notre plan de site pour retrouver les informations que vous recherchez";
        $META_robots = "noindex,nofollow";
        break;
    case 'legals':
        $META_title = "Mentions légales et politique de confidentialité | Don Camillo";
        $META_description = "Les mentions légales relatives à l'utilisation du site www.doncamillo-restaurants.fr, ainsi que notre politique de confidentialité à l'égard de vos données personnelles";
        $META_robots = "noindex,nofollow";
        break;
    default:
        $META_title = "Don Camillo - Trattoria familiale";
        $META_description = "Pizzas, pâtes ou encore gnocchi, dégustez des recettes savoureuses au sein de nos restaurants franco-italiens à foix et Pamiers.";
}

//*******************************
// Navigation du site
//*******************************

$NAV_accueil = 'index.php';
$NAV_TITLE_accueil = 'Le frais, le fin, l’italien';

$NAV_page_histoire = 'notre-histoire';
$NAV_TITLE_page_histoire = 'Une histoire familiale';

$NAV_page_carte = 'la-carte-don-camillo';
$NAV_TITLE_page_carte = 'Des bons produits et basta !';

$NAV_page_rejoindre = 'rejoindre-la-famille';
$NAV_TITLE_page_rejoindre = 'Bienvenue chez Don Camillo';

$NAV_contact = 'contactez-nous';
$NAV_TITLE_contact = 'Restaurants Don Camillo';

$NAV_legals = 'mentions-legales';
$NAV_TITLE_legals = 'Mentions légales de www.doncamillo-restaurants.fr';

//*******************************
// url externes
//*******************************

$LINK_facebook = 'https://www.facebook.com/';
$LINK_TITLE_facebook = 'Découvrez toute l\'actualité de Don Camillo sur Facebook';

$LINK_linkedin = 'https://www.linkedin.com/';
$LINK_TITLE_linkedin = 'Découvrez toute l\'actualité de Don Camillo sur Linkedin ';

$LINK_instagram = 'https://www.instagram.com/';
$LINK_TITLE_instagram = 'Découvrez toute l\'actualité de Don Camillo sur Instagram';

//*******************************
// inclusion datastore
//*******************************

$DATA_restaurants = include_once 'datastore/restaurants.data.php';

//*******************************
// SHARING ELEMENTS
//*******************************

$ogURL = "https://www.doncamillo-restaurants.fr".$_SERVER['REQUEST_URI'];
$ogIMG = "https://www.doncamillo-restaurants.fr/img/img-share.jpg";