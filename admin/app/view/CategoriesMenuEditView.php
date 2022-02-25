<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';

?>
<!-- start content  -->
<div class="row actualite">
    <form id="enregistrer-offre" action="categories-menu/<?=$action?>" method="post" class="col-xs-12"
        enctype="multipart/form-data">
        <div class="page-title">
            <div class="title_left">
                <h3><?=$title?></h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right text-right">
                    <a href="categories-menu/" class="btn btn-danger">Annuler</a>
                    <button type="button" class="btn btn-success" data-form-checker>Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel row">
                    <div class="col-xs-12 col-sm-6 col-lg-5">
                        <!-- start content-->
                        <div class="form-group form-checker">
                            <label>Nom de la catégorie :</label>
                            <input class="form-control" placeholder="Entrez le nom de la catégorie :" type="text"
                                value="<?=$categorie_menu->name()?>" name="required[alphanum][name]"
                                data-required="Vous devez entrez un nom" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-lg-3 col-lg-offset-1 form-checker">
                        <label>Cette catégorie est une sous-catégorie :</label><br>
                        <strong>Non</strong>&nbsp;&nbsp;
                        <label class="switch">
                            <input id="js-sous-categorie-checkbox" type="checkbox" name="is_sous_categorie" value="1"
                                <?=($categorie_menu->is_sous_categorie()) ? "checked" : ""?> />
                            <span class="slider"></span>
                        </label>
                        &nbsp;&nbsp;<strong>Oui</strong>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="x_panel row">
                    <!-- Page builder -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>CONSTRUCTION DE LA CATEGORIE</strong></h3>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    <div class="col-xs-12 sortable" id="articleBody">
                        <?php 
                            if(!empty($categorie_body)) 
                            {
                                foreach($categorie_body as $key => $element)
                                {
                                    foreach($element as $index => $value)
                                    if($index === 'plats') {
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-8">
                                    <div class="form-group form-checker">
                                        <label class="btn btn-plat">Plat</label><br>
                                        <label><?=$list_name_plats[$value];?></label>
                                        <input type="text" name="plats[<?=$key?>]" class="content hidden"
                                            value="<?=$value;?>">
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
                                    if($index === 'sous_categories') {
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-8">
                                    <div class="form-group form-checker">
                                        <label class="btn btn-sous-categorie">Sous catégorie</label><br>
                                        <label><?=$list_name_sous_categories[$value];?></label>
                                        <input type="text" name="sous_categories[<?=$key?>]" class="content hidden"
                                            value="<?=$value;?>">
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
                                }
                            }
                        ?>
                    </div>

                    <!-- / Page builder -->

                    <div class="col-xs-12">
                        <hr>
                    </div>
                    <div id="js-ajout-plat" class="col-xs-12 col-md-5 buttons-edition-article">
                        <h4>Ajouter un plat à la catégorie</h4>
                        <br />
                        <div class="bouton-wrapper">
                            <?php 
                                if(!empty($list_plats)) 
                                {
                                    foreach($list_plats as $plat)
                                    {
                            ?>
                            <button type="button" class="btn btn-plat articleAddItem"
                                data-target="modele_<?=$plat->id_plat();?>" data-type="text">
                                <b><?=$plat->title();?></b>
                            </button>
                            <?php  
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div id="js-ajout-sous-categorie"
                        class="col-xs-12 col-md-5 col-md-offset-1 buttons-edition-article">
                        <h4>Ajouter une sous-catégorie</h4>
                        <br />
                        <div class="bouton-wrapper">
                            <?php 
                                if(!empty($list_sous_categories)) 
                                {
                                    foreach($list_sous_categories as $sous_categorie)
                                    {
                            ?>
                            <button type="button" class="btn btn-sous-categorie articleAddItem"
                                data-target="modele_sous_categorie_<?=$sous_categorie->id_categorie_menu();?>"
                                data-type="text">
                                <b><?=$sous_categorie->name();?></b>
                            </button>
                            <?php  
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group pull-right text-right">
                            <a href="categories-menu/" class="btn btn-danger">Annuler</a>
                            <button type="button" class="btn btn-success" data-form-checker>Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- CONTENT OF PAGE ELEMENTS -->
<?php 
    if(!empty($list_plats)) 
    {
        foreach($list_plats as $plat)
        {
    ?>
<div id="modele_<?=$plat->id_plat();?>" class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-8">
            <div class="form-group form-checker">
                <label class="btn btn-plat">Plat</label><br>
                <label><?=$plat->title();?></label>
                <input type="text" name="plats[]" class="content hidden" value="<?=$plat->id_plat();?>">
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
    }
    else {

?>
<p>
    Vous devez ajouter des plats l'onglet "Plats" avant de pouvoir construire le corps de la catégorie.
</p>
<?php 
    }
?>

<?php 
    if(!empty($list_sous_categories)) 
    {
        foreach($list_sous_categories as $sous_categorie)
        {
    ?>
<div id="modele_sous_categorie_<?=$sous_categorie->id_categorie_menu();?>"
    class="article-item ui-state-default form-group hidden">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-8">
            <div class="form-group form-checker">
                <label class="btn btn-sous-categorie">Sous catégorie</label><br>
                <label><?=$sous_categorie->name();?></label>
                <input type="text" name="sous_categories[]" class="content hidden"
                    value="<?=$sous_categorie->id_categorie_menu();?>">
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
    }
?>

<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>