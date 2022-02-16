<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
?>
<!-- start content  -->
<div class="row actualites">
    <!-- START ARTICLES -->
    <div class="col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Commentaires</h3>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <!-- start project list -->
                    <?php
                        if(!empty($commentaires_list)){
                    ?>
                    <h4>Commentaires en attente de validation</h4>
                    <table class="table table-responsive table-striped projects">
                      <thead>
                        <tr>
                          <th>Statut</th>
                          <th>Date</th>
                          <th>Nom</th>
                          <th>Article associé</th>
                          <th style="width: auto; text-align:right"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $i = 0;
                            foreach($commentaires_list as $commentaire){
                               
                                $article_name = $manager->getArticleName($commentaire->id_commentaire());
                                if(!$commentaire->is_active()) 
                                {
                                    $i ++;
                        ?>
                        <tr>
                          <td class="waiting">En attente</td>
                          <td><strong><?=$commentaire->date_publication()?></strong></td>
                          <td><strong><?=$commentaire->name()?></strong></td>
                          <td><strong><?=$article_name?></strong></td>
                          <td style="text-align:right">
                           <form method="post" class="edition">
                                <a href="commentaires/moderer/<?=$commentaire->id_commentaire()?>/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modérer</a>
                                <button id="<?=$commentaire->id_commentaire()?>" class="btn btn-danger btn-xs delete-post" type="button" data-toggle="modal" data-target=".modal-delete"><i class="fa fa-trash-o"></i> Supprimer</button>
                            </form>
                          </td>
                        </tr>
                        <?php
                                }
                            }
                            if(empty($i)) {
                        ?>
                        <td colspan="5"><p class="center"><br/>Il n'y a pas de commentaires en attente de validation.</p></td>
                        <?php
                            }
                        ?>
                      </tbody>
                    </table>
                    <br/>
                    <h4>Commentaires validés</h4>
                    <table class="table table-responsive table-striped projects">
                      <thead>
                        <tr>
                          <th>Statut</th>
                          <th>Date</th>
                          <th>Nom</th>
                          <th>Article associé</th>
                          <th style="width: auto; text-align:right"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $i = 0;
                            foreach($commentaires_list as $commentaire)
                            {
                                
                                $article_name = $manager->getArticleName($commentaire->id_commentaire());
                                if($commentaire->is_active()) 
                                {
                                    $i++;
                        ?>
                        <tr>
                          <td class="published">Publié</td>
                          <td><strong><?=$commentaire->date_publication()?></strong></td>
                          <td><strong><?=$commentaire->name()?></strong></td>
                          <td><strong><?=$article_name?></strong></td>
                          <td style="text-align:right">
                            <form method="post" class="edition">
                                <a href="commentaires/moderer/<?=$commentaire->id_commentaire()?>/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modérer</a>
                                <button id="<?=$commentaire->id_commentaire()?>" class="btn btn-danger btn-xs delete-post" type="button" data-toggle="modal" data-target=".modal-delete"><i class="fa fa-trash-o"></i> Supprimer</button>
                            </form>
                          </td>
                        </tr>
                        <?php
                                }
                            }
                            if(empty($i)) {
                        ?>
                        <td colspan="5"><p class="center"><br/>Il n'y a pas encore de commentaires validés.</p></td>
                        <?php
                            }
                        ?>
                      </tbody>
                    </table>
                    <?php
                        }
                        else 
                        {
                    ?>
                    <h4>Commentaires</h4>
                    <table class="table table-responsive table-striped projects">
                      <tbody>
                        <td><p class="center"><br/>Il n'y a pas encore de commentaires publiés sur vos articles.</p></td>
                      </tbody>
                    </table>
                    <?php   
                        }
                    ?>
                    <!-- end project list -->

                  </div>
                </div>
            </div>
        </div>
      </div>
      <!-- END CATEGORIES -->
      
</div>

<!-- modal -->
<div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <h4 class="modal-title" id="myModalLabel2">EFFACER</h4> </div>
            <div class="modal-body">
                <h4>Supprimer ce commentaire ?</h4>
                <p>
                    Vous êtes sur le point de supprimer ce commentaire.<br/>
                    <strong>Cette opération est irréversible.</strong><br/>
                    Souhaitez-vous continuer ?
                </p>
            </div>
            <form class="modal-footer" method="get" action="index.php">
                <input id="page" type="hidden" name="page" value="commentaires">
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