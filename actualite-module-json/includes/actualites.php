<aside class="c-articles">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="c-articles_content">
                    <?php
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
                        $sizeActus = count($actus);
                        $count = 0;
                        foreach($actus as $id => $actu) {
                            $count++;
                            if($last3Post === true){
                                if($count === 4){
                                    break;
                                }
                            }                        	
                        
                        $descriptionBrut = html_entity_decode($actu->desc);
                        $description = preg_replace("`(<a[^>]*>)(.*)(</a>)`Ui", "",$descriptionBrut);
                    ?>
                    <a href="actualite-<?php echo $actu->id; ?>-la-belle-liegeoise.php" class="c-articles_cards">
                        <div>
                            <figure class="c-articles_cards_img">
                                <img src="<?php echo 'admin/'.$actu->img; ?>" alt="<?php echo $actu->titre; ?>">
                            </figure>
                            <div class="c-articles_cards_date jaune"><?php echo $actu->actu_date; ?></div>
                            <h2 class="c-articles_cards_titre h5 marron">
                                <?php echo html_entity_decode($actu->titre); ?>
                            </h2>
                            <div class="p p-actualites marron limitText 150"><?php echo $description; ?></div>
                        </div>
                        <div class="c-articles_cards_btn">
                            <div class="linkOnly marron uppercase">lire l'article</div>
                        </div>
                    </a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</aside>