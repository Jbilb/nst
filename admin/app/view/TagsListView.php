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
                <h3>Tags - Mots clés</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right text-right"> 
                    <a href="tags/new/" class="btn btn-success">Créer un nouveau tag</a>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <!-- start tags list -->
                    <table class="table table-responsive table-striped projects">
                      <thead>
                        <tr>
                          <th>Tags existants :</th>
                        <?php 
                            // Si l'utilisateur est admin, alors il peut modifier ou supprimer le tag
                            if($_SESSION['user']->role() == 0) 
                            { 
                        ?>
                          <th style="width: auto; text-align:right"></th>
                        <?php 
                            } 
                        ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            if(!empty($tags_list))
                            {
                                foreach($tags_list as $tag)
                                {
                        ?>
                        <tr>
                          <td><strong><?=$tag->name()?></strong></td>
                        <?php 
                                // Si l'utilisateur est admin, alors il peut modifier ou supprimer le tag
                                if($_SESSION['user']->role() == 0) 
                                { 
                        ?>
                          <td style="text-align:right">
                           <form method="post" class="edition">
                                <a href="tags/edit/<?=$tag->id_tag()?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                                <button id="<?=$tag->id_tag()?>" class="btn btn-danger btn-xs delete-post" type="button" data-toggle="modal" data-target=".modal-delete"><i class="fa fa-trash-o"></i> Supprimer</button>
                            </form>
                          </td>
                        <?php 
                                } 
                        ?>
                        </tr>
                        
                        <?php 
                                }
                          }
                          else
                          {
                        ?>
                          <tr>
                              <td colspan="2">
                                  <p class="center">
                                      <br/>Il n'y a pas encore de tags enregistrés.
                                  </p>
                              </td>
                            </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                    <!-- end tags list -->

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
                <h4 class="modal-title" id="myModalLabel2">EFFACER</h4> </div>
            <div class="modal-body">
                <h4>Supprimer ce mot-clé ?</h4>
                <p>
                    Vous êtes sur le point de supprimer ce mot-clé.<br/>
                    <strong>Cette opération est irréversible.</strong><br/>
                    Souhaitez-vous continuer ?
                </p>
            </div>
            <form class="modal-footer" method="get" action="index.php">
                <input id="page" type="hidden" name="page" value="tags">
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