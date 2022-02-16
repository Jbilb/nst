<?php

$folder_admin = "admin-mag/";
require(realpath(__DIR__ . '/..').'/'.$folder_admin.'includes/inc_config.php');

$client_name = "Melting K";

$NAV_mag = "mag/";
$NAV_mag_article = "article/";

//*******************************
// SHARING ELEMENTS
//*******************************

$ogURL = SITE_FRONT_BASE.$_SERVER['REQUEST_URI'];
$ogIMG = SITE_FRONT_BASE."/img/img-share.jpg";

?>