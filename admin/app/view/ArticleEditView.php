<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';

?>
<!-- start content  -->
<div class="row actualite">
    <form id="enregistrer-offre" action="articles/<?=$action?>" method="post" class="col-xs-12" enctype="multipart/form-data">
        <div class="page-title">
            <div class="title_left">
                <h3><?=$title?></h3> 
            </div>
            <div class="title_right">
                <div class="form-group pull-right text-right"> 
                    <a href="articles/" class="btn btn-danger">Annuler</a>
                    <button type="button" class="btn btn-success" data-form-checker>Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel row">
                    <input type="hidden" name="auteur" value="<?=$article->auteur()?>">
                    <input type="hidden" name="id_user" value="<?=$article->id_user()?>">
                    <!-- Titre, Categorie, Date & statut -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>TITRE, CATEGORIE, DATE, STATUT</strong></h3>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group form-checker">
                            <label><h4>Titre de l'article*</h4></label>
                            <input class="form-control" placeholder="Entrez le titre de l'article :" type="text" value="<?=html_entity_decode($article->title())?>" name="required[title]" data-required="Vous devez entrez un titre" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-sm-offset-1">
                        <div class="form-group form-checker">
                            <label><h4>Catégorie*</h4></label>
                            <select class="form-control" name="required[id_categorie]" data-required="Vous devez sélectionner une catégorie" required>
                                <option value="" <?=(empty($article->id_categorie())) ? "selected" : ""?>>Choisir une catégorie</option>
                        <?php
                            foreach($list_categories as $categorie)
                            {
                        ?>
                                <option value="<?=$categorie->id_categorie()?>" <?=($article->id_categorie() == $categorie->id_categorie()) ? "selected" : ""?>><?=html_entity_decode($categorie->name())?></option>
                        <?php
                            }
                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="form-group form-checker">
                            <label><h4>Date de publication :</h4></label>
                            <input type="date" class="form-control" value="<?=date('Y-m-d',strtotime($article->date_publication()))?>" name="required[date][date_publication]" data-required="Vous devez choisir une date de publication" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-offset-2 form-checker">
                        <h4>Statut :</h4>
                        <strong>Non publié</strong>&nbsp;&nbsp;
                        <label class="switch">
                            <input type="checkbox" name="is_active" value="1" <?=($article->is_active()) ? "checked" : ""?>/>
                            <span class="slider"></span>
                        </label>
                        &nbsp;&nbsp;<strong>Publié</strong>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-offset-1 form-checker">
                        <h4>A la une :</h4>
                        <strong>Non</strong>&nbsp;&nbsp;
                        <label class="switch">
                            <input type="checkbox" name="featured" value="1" <?=($article->featured()) ? "checked" : ""?>/>
                            <span class="slider"></span>
                        </label>
                        &nbsp;&nbsp;<strong>Oui</strong>
                    </div>
                    <!-- / Titre, Categorie, Date & statut + lectures -->
                    
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    
                    <!-- Tags -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>TAGS</strong></h3>
                    </div>
                    <div class="col-xs-12 addable" id="article-tags">
                        <div class="form-group addable_container" id="meta-tags">
                            <label><h4>Tags (mots clés)</h4></label><br/>
                            <small>Tapez les premières lettre de votre mot-clé, puis sélectionnez le dans la liste.<br/>Si votre mot-clé n'existe pas, il sera automatiquement créé.<br/><br/>
                            <button class="btn btn-info" type="button" data-toggle="modal" data-target=".modal-delete"><i class="fa fa-eye"></i> Voir tous les tags</button></small>
                            <br><br>
                            <?php
                                // SI LES TAGS SONT DEFINIS, ON LES AFFICHE
                                if(!empty($article->tags()) && is_array($article->tags())) {
                                    foreach($article->tags() as $key => $id) 
                                    {
                            ?>
                            <div class="article-tags ui-front addable_items form-checker">
                                <input type="text" name="required[alphanum][tags][]" data-required="Vous devez entrer un mot-clé" required class="form-control js-autocomplete" autocomplete="off" value="<?=$list_name_tags[$id]?>" placeholder="Tapez votre mot-clé">
                                <?php
                                        if($key != 0) {
                                ?>
                                <span class="fa fa-trash red delete-item"></span>
                                <?php
                                        }
                                ?>
                            </div>
                            <?php
                                    }
                                } 
                                else 
                                { 
                                // SINON, ON AFFICHE L'INPUT DE BASE
                            ?>
                            <div class="article-tags ui-front addable_items form-checker">
                                <input type="text" name="required[alphanum][tags][]" data-required="Vous devez entrer un mot-clé" required class="form-control js-autocomplete" autocomplete="off" value="" placeholder="Tapez votre mot-clé">
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <button class="btn btn-success add-item" type="button">Ajouter un mot-clé</button>
                    </div>
                    <!-- / Tags  -->
                    
                    
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    
                    
                    <!-- Couverture + chapeau  -->
                    <div class="form-group col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="category_title"><strong>IMAGE DE COUVERTURE & CHAPEAU</strong></h3>
                            </div>
                            <div class="col-xs-12 col-sm-3 form-checker">
                                <label><h4>Image de couverture* <br> <small>Format d'image : 1590x900</small></h4></label>
                                <div class="uploadfile">
                                    <label for="ImageToUpload" class="label-file btn btn-info">Choisir une image</label>
                                    <input id="ImageToUpload" class="input-file" type="file" name="<?=(!$article->cover_image()) ? "required[image_large]" : "image_large"?>[cover_image]" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" data-required="Veuillez sélectionner une image"><br/>
                                    <span class="nom-fichier">Aucun fichier sélectionné</span>
                                    <?php 
                                        if($article->cover_image())
                                        { 
                                    ?>         
                                        <input type="hidden" name="cover_image" value="<?=$article->cover_image()?>">
                                    <?php 
                                        } 
                                    ?>
                                </div>                      
                                
                            </div>
                            <div class="col-xs-12 col-sm-3 apercu-image <?php if($article->cover_image()){ echo "image-unmasked"; } ?>">
                                <label><h4>Aperçu de l'image de couverture</h4> </label>
                                <?php 
                                    if($article->cover_image())
                                    { 
                                ?>         
                                    <img src="../<?=$article->cover_image()?>" class="img-responsive" alt="">
                                <?php 
                                    } 
                                    else 
                                    { 
                                ?>
                                    <img src="" class="img-responsive" alt="">
                                <?php 
                                    } 
                                ?>
                            </div>
                            <div class="col-xs-12 col-sm-offset-1 col-sm-4 form-checker">
                                <label>
                                    <h4>Chapeau de l'article (texte introductif) :</h4>
                                </label>
                                <textarea name="intro_text" class="wysiwig" ><?=html_entity_decode($article->intro_text())?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /Couverture + chapeau  -->
                    
                    
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    
                    
                    
                    <!-- Page builder -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>CONSTRUCTION DU CORPS DE L'ARTICLE</strong></h3>
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    <div class="col-xs-12 sortable" id="articleBody">
                        <?php 
                            if(!empty($page_body)) 
                            {
                                foreach($page_body as $key => $element)
                                {
                                    foreach($element as $index => $value)
                                    if($index === 'body_titles') {
                                    // SI NOTRE ELEMENT EST UN INTERTITRE, ON AFFICHE LE CODE CORRESPONDANT
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-checker">
                                        <label>Sous-titre :</label>
                                        <input class="form-control content" placeholder="Entrez votre sous-titre :" type="text" name="required[alphanum][body_titles][<?=$key?>]" data-required="Veuillez entrer un sous-titre" value="<?=html_entity_decode($value)?>"required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                    if($index === 'body_texts') {
                                    // SI NOTRE ELEMENT EST UN TEXTE, ON AFFICHE LE CODE CORRESPONDANT
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-8">
                                    <div class="form-group form-checker">
                                        <label>Votre texte :</label>
                                        <textarea name="body_texts[<?=$key?>]" class="wysiwig content"><?=$value?></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                    if($index === 'body_links') {
                                    // SI NOTRE ELEMENT EST UN LIEN, ON AFFICHE LE CODE CORRESPONDANT
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <div class="form-checker">
                                            <label>Lien (URL) :</label>
                                            <input class="form-control content" placeholder="Entrez l'URL de votre lien :" type="text" value="<?=$value['link']?>" name="required[url][body_links][<?=$key?>][link]" data-required="Vous devez spécifier l'url de votre lien" required>
                                        </div>
                                        <br/>
                                        <div class="form-checker">
                                            <label>Libellé (texte du bouton) :</label>
                                            <input class="form-control content" placeholder="Entrez le libellé de votre lien :" type="text" value="<?=htmlentities($value['label'])?>" name="required[alphanum][body_links][<?=$key?>][label]"  data-required="Vous devez spécifier le libellé de votre lien" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    } 
                                    if($index === 'body_images') {
                                    // SI NOTRE ELEMENT EST UNE IMAGE, ON AFFICHE LE CODE CORRESPONDANT
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-4 form-checker">
                                    <label>Insérer une image <br> <small>Format d'image : 1200x800</small></label>
                                    <div class="uploadfile">
                                        <label for="ImageToUpload<?=$key-1?>" class="label-file btn btn-info">Choisir une autre image </label>
                                        <input id="ImageToUpload<?=$key-1?>" class="input-file content" type="file" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" required name="image_normal[body_images][<?=$key?>]"><br/>
                                        <span class="nom-fichier">Aucun fichier sélectionné</span>
                                        <input type="hidden" name="body_images[<?=$key?>]" value="<?=$value?>" class="content"/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 apercu-image image-unmasked">
                                    <label>Aperçu de votre image </label>
                                    <img src="../<?=$value?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                                    } 
                                    if($index === 'body_galeries') {
                                    // SI NOTRE ELEMENT EST UNE GALERIE, ON AFFICHE LE CODE CORRESPONDANT
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-6 apercu-image image-unmasked">
                                    <label>Aperçu de votre galerie </label>
                                    <br/>
                                    <?php
                                        foreach($value as $index => $valeur) {
                                    ?>
                                        <p class="img-galerie">
                                            <span class="img-wrapper">
                                                <img src="../<?=$valeur?>" alt="" class="img-galerie">
                                            </span>
                                            <label class="delete-img-galerie" for="delete-galerie-<?=$key.'-'.$index?>"><span class="fa fa-trash"></span></label>
                                            <input type="hidden" name="body_galeries[<?=$key?>][]" value="<?=$valeur?>" class="galeriePost content">
                                        </p>
                                        <input type="checkbox" name="galerieDelete[<?=$key?>][<?=$index?>]" id="delete-galerie-<?=$key.'-'.$index?>" class="galerie-delete">
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                                <br>
                                <div class="col-xs-12">                       
                                    <label>Galerie photo : </label><br>
                                    <div class="uploadfile">
                                        <label for="GalerieToUpload100<?=$key-1?>" class="label-file btn btn-info">Ajouter des images</label>
                                        <input id="GalerieToUpload100<?=$key-1?>" class="input-galerie content" type="file" multiple="" name="image_galerie[body_galeries][<?=$key?>][]"><br>                       
                                        <em>Sélectionnez plusieurs images à la fois dans la boîte de dialogue</em>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                                    }  
                                    if($index === 'body_cta') {
                                    // SI NOTRE ELEMENT EST UNE GALERIE, ON AFFICHE LE CODE CORRESPONDANT
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-checker">
                                        <label>Titre du CTA :</label>
                                        <input class="form-control content" placeholder="Entrez le titre de votre CTA :" type="text" name="required[alphanum][body_cta][<?=$key?>][titre]" data-required="Vous devez entrer un titre" value="<?=$value['titre']?>" required>
                                    </div><br/>
                                    <div class="form-checker">
                                        <label>Texte du CTA :</label>
                                        <textarea class="form-control content" placeholder="Entrez le texte de votre CTA :" type="text" name="required[body_cta][<?=$key?>][texte]" data-required="Vous devez entrer un texte descriptif" required><?=$value['texte']?></textarea>
                                    </div><br/>
                                    <div class="form-checker">
                                        <label>URL du lien du CTA :</label>
                                        <input class="form-control content" placeholder="Entrez l'URL du lien de votre CTA :" type="text" name="required[url][body_cta][<?=$key?>][lien]" data-required="Vous devez entrer une URL" value="<?=$value['lien']?>" required>
                                    </div><br/>
                                    <div class="form-checker">
                                        <label>Libellé du lien du CTA :</label>
                                        <input class="form-control content" placeholder="Entrez le libellé du lien de votre CTA :" type="text" name="required[alphanum][body_cta][<?=$key?>][label]" data-required="Vous devez entrer un label pour votre lien" value="<?=$value['label']?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 apercu-image image-unmasked">
                                    <label>Insérer une image <br/><small>Format : 400x270</small></label>
                                    <div class="uploadfile form-checker">
                                        <label for="ImageCTA" class="label-file btn btn-info">Changer d'image </label>
                                        <input id="ImageCTA" class="input-file content" type="file" accept=".jpg,.jpeg,.png" data-required="Vous devez choisir une image" name="image_small[body_cta][<?=$key?>][image]"><br/>
                                        <span class="nom-fichier">Aucun fichier sélectionné</span>
                                        <input type="hidden" name="body_cta[<?=$key?>][image]" value="<?=$value['image']?>" class="content"/>
                                        <br/>
                                    </div>
                                    <br/>
                                    <label>Aperçu de l'image du CTA </label>
                                    <img src="../<?=$value['image']?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    
                                    }  
                                    if($index === 'body_videos') {
                                    // SI NOTRE ELEMENT EST UNE GALERIE, ON AFFICHE LE CODE CORRESPONDANT
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group form-checker">
                                        <label>Vidéo :</label>
                                        <input class="form-control content" placeholder="Entrez l'URL de votre vidéo (Youtube / Viméo) :" type="text" value="<?=$value?>" name="required[url][body_videos][<?php echo $key; ?>]" data-required="Vous devez entrer l'URL de votre vidéo" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    } 
                                    if($index === 'body_pdf') {
                                    // SI NOTRE ELEMENT EST UNE GALERIE, ON AFFICHE LE CODE CORRESPONDANT
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-checker">
                                        <label>Intitulé du fichier :</label>
                                        <input class="form-control content" placeholder="Entrez l'intitulé de votre fichier :" type="text" name="required[body_pdf][<?=$key?>][titre]" data-required="Vous devez entrer un titre" value="<?=$value['titre']?>" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1">
                                    <div class="uploadfile form-checker">
                                        <a href="../<?=$value['file']?>" title="Voir votre fichier" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i> VOIR LE FICHIER</a>
                                        <br/><br/>
                                        <label>Sélectionner un fichier <br/><small>Format : PDF</small></label>
                                        <label for="PDFToUpload<?=$key-1?>" class="label-file btn btn-info"><i class="fa fa-upload"></i> Choisir un autre fichier</label>
                                        <input id="PDFToUpload<?=$key-1?>" class="input-file content" type="file" accept=".pdf" data-required="Vous devez choisir un fichier" name="pdf[body_pdf][<?=$key?>][file]"><br/>
                                        <input type="hidden" name="body_pdf[<?=$key?>][file]" value="<?=$value['file']?>" class="content">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }  
                                    if($index === 'body_html_element') {
                                    // SI NOTRE ELEMENT EST UNE GALERIE, ON AFFICHE LE CODE CORRESPONDANT
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-checker">
                                        <label>Insérer votre code HTML :</label>
                                        <textarea class="form-control content" placeholder="Copiez / Coller le code HTML à afficher sur le site" name="required[body_html_element][<?=$key?>]" data-required="Vous devez copier/coller le code HTML à insérer" required><?=$value?></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-sm-offset-1">
                                    <strong>Aperçu : </strong>
                                    <br/><br/>
                                    <?=$value?>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }  
                                }
                            }
                        ?>
                    </div>
                    
                    <!-- / Page builder -->
                    
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    <div class="col-xs-12 buttons-edition-article">
                        <h4>Ajouter un élément</h4>
                        <br/>
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_title" data-type="title">
                            <span class="fa fa-font"></span> | <b>SOUS-TITRE</b>
                        </button>&nbsp;&nbsp;
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_text" data-type="text">
                            <span class="fa fa-text-width"></span> | <b>ZONE DE TEXTE</b>
                        </button>&nbsp;&nbsp;
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_image" data-type="image">
                            <span class="fa fa-image"></span> | <b>IMAGE</b>
                        </button>&nbsp;&nbsp;
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_link" data-type="link">
                            <span class="fa fa-link"></span> | <b>LIEN (BOUTON)</b>
                        </button>&nbsp;&nbsp;
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_galerie" data-type="galerie">
                            <span class="fa fa-folder-open"></span> | <b>GALERIE PHOTO</b>
                        </button>&nbsp;&nbsp;
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_cta" data-type="cta">
                            <span class="fa fa-id-card-o"></span> | <b>CALL TO ACTION</b>
                        </button>
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_video" data-type="video">
                            <span class="fa fa-video-camera"></span> | <b>VIDEO</b>
                        </button>
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_pdf" data-type="pdf">
                            <span class="fa fa-file"></span> | <b>DOC. PDF</b>
                        </button>
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_html" data-type="html">
                            <span class="fa fa-code"></span> | <b>CODE HTML</b>
                        </button>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group pull-right text-right"> 
                            <a href="articles/" class="btn btn-danger">Annuler</a>
                            <button type="button" class="btn btn-success" data-form-checker>Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </form>
</div>

<!-- MODAL GESTION DES TAGS -->
<div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal_tags">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <h4 class="modal-title" id="myModalLabel2">LISTE DES TAGS DISPONIBLES</h4> 
            </div>
            <div class="modal-body">
                <h4>Liste des tags disponibles</h4>
                <p>
                    Retrouvez ci-dessous la liste des tags que vous pouvez ajouter à votre article. Cliquez sur un tag pour l'ajouter à votre sélection, puis cliquez sur le bouton "Confirmer" pour les ajouter à votre article.
                </p>
                <hr>
                <p class="modal_tags_selection">
                    <strong>Votre sélection</strong>
                    <br><br>
                </p>
                <p>
                    <input type="text" class="modal_tags_filter js-search-tag form-control" placeholder="Filter les tags">
                </p>
                <div class="modal_tags_list">
                    
            <?php 
                foreach($list_tags as $tag)
                {
            ?>
                    <span class="modal_tags_item js-tag" data-slug="<?=$tag->slug()?>" data-name="<?=$tag->name()?>"><?=$tag->name()?></span>
            <?php
                }
            ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-success modal_tags_confirm" data-dismiss="modal">Confirmer</button>
            </div>
        </div>
    </div>
</div>

<!-- CONTENT OF PAGE ELEMENTS -->

<div id="modele_title" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-4">
            <div class="form-group form-checker">
                <label>Sous-titre :</label>
                <input class="form-control content" placeholder="Entrez votre sous-titre :" type="text" value="" name="required[alphanum][body_titles][]" data-required="Veuillez entrer un sous-titre" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_text" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-8">
            <div class="form-group form-checker">
                <label>Votre texte :</label>
                <textarea name="body_texts[]" class="content"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_image" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-4 form-checker">
            <label>Insérer une image <br> <small>Format d'image : 1200x800</small></label>
            <div class="uploadfile">
                <label for="ImageToUpload" class="label-file btn btn-info">Ajouter une image </label>
                <input id="ImageToUpload" class="input-file content" type="file" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" required name="required[image_normal][body_images][]"><br/>
                <span class="nom-fichier">Aucun fichier sélectionné</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 apercu-image">
            <label>Aperçu de votre image </label>
            <img src="" class="img-responsive" alt="">
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_link" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <div class="form-checker">
                    <label>Lien (URL) :</label>
                    <input class="form-control content" placeholder="Entrez l'URL de votre lien :" type="text" name="required[url][body_links][][link]" data-required="Vous devez spécifier l'url de votre lien" required>
                </div>
                <br/>
                <div class="form-checker">
                    <label>Libellé (texte du bouton) :</label>
                    <input class="form-control content" placeholder="Entrez le libellé de votre lien :" type="text" name="required[alphanum][body_links][][label]" data-required="Vous devez spécifier le libellé de votre lien"  required>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_galerie" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-6 apercu-image">
            <label>Aperçu de votre galerie </label>
            <br/>
            <img src="" class="img-responsive" alt="">
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
        <div class="col-xs-12">
        <label>Galerie photo :  <br><small>Format : 1200x800</small></label><br/>
            <div class="uploadfile form-checker">
                <label for="GalerieToUpload" class="label-file btn btn-info">Ajouter des images</label>
                <input id="GalerieToUpload" class="input-galerie content" type="file" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" multiple required name="required[image_galerie][body_galeries][][]" data-required="Vous devez sélectionner des images"><br/>
                <em>Sélectionnez plusieurs images à la fois dans la boîte de dialogue</em>
                <br/>
            </div>
        </div>
    </div>
</div>

<div id="modele_cta" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-4">
            <div class="form-checker">
                <label>Titre du CTA :</label>
                <input class="form-control content" placeholder="Entrez le titre de votre CTA :" type="text" name="required[alphanum][body_cta][][titre]" data-required="Vous devez entrer un titre" required>
            </div><br/>
            <div class="form-checker">
                <label>Texte du CTA :</label>
                <textarea class="form-control content" placeholder="Entrez le texte de votre CTA :" type="text" name="required[body_cta][][texte]" data-required="Vous devez entrer un texte descriptif" required></textarea>
            </div><br/>
            <div class="form-checker">
                <label>URL du lien du CTA :</label>
                <input class="form-control content" placeholder="Entrez l'URL du lien de votre CTA :" type="text" name="required[url][body_cta][][lien]" data-required="Vous devez entrer une URL" required>
            </div><br/>
            <div class="form-checker">
                <label>Libellé du lien du CTA :</label>
                <input class="form-control content" placeholder="Entrez le libellé du lien de votre CTA :" type="text" name="required[alphanum][body_cta][][label]" data-required="Vous devez entrer un label pour votre lien" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1">
            <label>Insérer une image <br/><small>Format : 400x270</small></label>
            <div class="uploadfile form-checker">
                <label for="ImageCTA" class="label-file btn btn-info">Ajouter une image </label>
                <input id="ImageCTA" class="input-file content" type="file" accept=".jpg,.jpeg,.png" data-required="Vous devez choisir une image" name="required[image_small][body_cta][][image]"><br/>
                <span class="nom-fichier">Aucun fichier sélectionné</span>
                <br/>
            </div>
            <br/>
            <div class="apercu-image image-masked">
                <label>Aperçu de votre image </label>
                <img src="" class="img-responsive" alt="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_video" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-4">
            <div class="form-group form-checker">
                <label>Vidéo :</label>
                <input class="form-control content" placeholder="Entrez l'URL de votre vidéo (Youtube / Viméo) :" type="text" name="required[url][body_videos][]" data-required="Vous devez entrer l'URL de votre vidéo" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_pdf" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-4">
            <div class="form-checker">
                <label>Intitulé du fichier :</label>
                <input class="form-control content" placeholder="Entrez l'intitulé de votre fichier :" type="text" name="required[body_pdf][][titre]" data-required="Vous devez entrer un titre" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1">
            <label>Sélectionner un fichier <br/><small>Format : PDF</small></label>
            <div class="uploadfile form-checker">
                <label for="PDFToUpload" class="label-file btn btn-info">Ajouter un fichier</label>
                <input id="PDFToUpload" class="input-file content" type="file" accept=".pdf" data-required="Vous devez choisir un fichier" name="required[pdf][body_pdf][][file]"><br/>
                <span class="nom-fichier">Aucun fichier sélectionné</span>
                <br/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_html" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-4">
            <div class="form-checker">
                <label>Insérer votre code HTML :</label>
                <textarea class="form-control content" placeholder="Copiez / Coller le code HTML à afficher sur le site" name="required[body_html_element][]" data-required="Vous devez copier/coller le code HTML à insérer" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>