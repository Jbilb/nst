<?php
//VARIABLES
$PAGE_name = 'actualitePage';
//INCLUDE HELPER & HEADER
include 'includes/helper.php';
  // recupere le fichier json
  $json = file_get_contents('admin/database/actualites.json');
  // decode pour que php puisse le traiter
  $listeActualites = json_decode($json);
  $actus = [];
  if(!empty($listeActualites)){
      foreach($listeActualites as $item){
        $actus[$item->id] = $item;
      }
  }
  krsort($actus);
  if(!empty($actus)){
      $id = $_GET['id'];
      $actualite = $actus[$id];
      $img = html_entity_decode($actualite->img);
      $actu_date = html_entity_decode($actualite->actu_date);
      $titre = html_entity_decode($actualite->titre);
      $desc = html_entity_decode($actualite->desc);
  }
$HEADER_title = $titre;
$META_title_actu = "Actualité La Belle Liégeoise - ".$titre;
$META_description_actu = "Découvrez l'actualité la Belle Liégeoise - ".$titre;
include 'includes/header.php';
?>

<section id="section-top">
    <article class="actualitePage-informations" id="ancre1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <figure class="actualitePage-informations_img">
                        <span class="parallax" data-css="transform" data-start="scale(1.05)" data-end="scale(1)"
                            data-anchor="#ancre1"><img src="<?php echo 'admin/'.$img; ?>"
                                alt="<?php echo $titre;?>"></span>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <div class="actualitePage-informations_intro">
                        <div class="date"><?php echo $actu_date;?></div>
                        <h1 class="h2 marron"><?php echo html_entity_decode($titre);?></h1>
                        <div class="p marron anim-bottom woow" data-woow-offset="80">
                            <?php echo html_entity_decode($desc);?></div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <article class="actualitePage-cta">
        <div class="container">
            <div class="row anim-bottom woow" data-woow-offset="80">
                <div class="col-xs-12 center">
                    <a href="<?php echo $NAV_actualites; ?>" title="<?php echo $NAV_TITLE_actualites; ?>"
                        class="bouton bouton-carre bouton-carre-marron">
                        <span class="text">retour aux actualités</span>
                    </a>
                </div>
            </div>
        </div>
    </article>
</section>

<?php include 'includes/footer.php'; ?>