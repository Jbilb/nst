<?php 
//VARIABLES
$PAGE_name = 'mag';

//INCLUDE HELPER & HEADER

include 'includes/header.php'; 
?>

<section id="section-top">
<?php
// ROUTEUR POUR CHARGER LES VUES (SUITE DE HEADER.PHP)
switch($pageName)
{      
    case 'article':
        include 'view/ArticleView.php';
    break;    
    default:
        include 'view/HomeView.php';
    break;
}
?>
</section>

<?php include 'includes/footer.php'; ?>
