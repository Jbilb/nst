<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
?>
<!-- start content  -->
<div class="row actualites">
    <div class="col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Articles</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right text-right"> 
                    <a href="articles/new/" class="btn btn-success">Ajouter un article</a>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <!-- start project list -->
                    <table class="table table-responsive table-striped projects">
                      <thead>
                        <tr>
                          <th>Statut</th>
                          <th>Miniature</th>
                          <th>Titre</th>
                          <th>Date de publication</th>
                          <th>Auteur</th>
                          <th>Catégorie</th>
                          <th>Apercu</th>
                          <th style="width: auto; text-align:right"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            if(!empty($article_list))
                            {
                                foreach($article_list as $article)
                                {
                                    $categorie_name = $CategorieManager->getName($article->id_categorie());
                        ?>
                        <tr>
                          <td>
                              <strong>
                                  <?=($article->is_active()) ? "<span class='green'>Publié</span>" : "Non publié"?>
                                  <?=($article->featured()) ? " / <span class='green'>En une</span>" : ""?>
                              </strong>
                          </td>
                          <td>
                              <img src="../<?=$article->cover_image()?>" class="miniature-article">
                          </td>
                          <td>
                              <?=$article->title()?>
                          </td>
                          <td>
                              <?=$article->date_publication()?>
                          </td>
                          <td>
                              <?=$article->auteur()?>
                          </td>
                          <td>
                              <?=$categorie_name?>
                          </td>
                          <td>
                              <a href="<?=SITE_FRONT_BASE."apercu-article/".$article->id_article()."/"?>" target="_blank"><i class="fa fa-desktop"></i> Aperçu</a>
                          </td>
                          <td style="text-align:right">
                              <form method="post" class="edition">
                                  <a href="articles/edit/<?=$article->id_article()?>" class="btn btn-info btn-xs">
                                      <i class="fa fa-pencil"></i> Modifier
                                  </a>
                                  <button id="<?=$article->id_article()?>" class="btn btn-danger btn-xs delete-post" type="button" data-toggle="modal" data-target=".modal-delete">
                                      <i class="fa fa-trash-o"></i> Supprimer
                                  </button>
                              </form>
                          </td>
                        </tr>
                        
                        <?php 
                            }
                        }
                        else
                        {
                        ?>
                          <tr>
                              <td colspan="8">
                                  <p class="center"><br/>Il n'y a pas encore d'articles publiés.</p>
                              </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
            </div>
        </div>
      </div>
</div>

<!-- modal -->
<div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <h4 class="modal-title" id="myModalLabel2">SUPPRIMER</h4> 
            </div>
            <div class="modal-body">
                <h4>Supprimer cette article ?</h4>
                <p>
                    Vous êtes sur le point de supprimer cette article.<br/>
                    <strong>Cette opération est irréversible.</strong><br/>
                    Souhaitez-vous continuer ?
                </p>
            </div>
            <form class="modal-footer" method="get" action="index.php">
                <input id="page" type="hidden" name="page" value="articles">
                <input id="action" type="hidden" name="action" value="delete">
                <input id="id" type="hidden" name="id" value="4">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Confirmer</button>
            </form>
        </div>
    </div>
</div>
<!-- /modal -->

<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>