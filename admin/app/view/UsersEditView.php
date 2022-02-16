<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
?>
<!-- start content  -->
<div class="row actualite">
    <form id="enregistrer-utilisateur" action="users/<?=$action?>" method="post" class="col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><?=$title?></h3> 
            </div>
            <div class="title_right">
                <div class="form-group pull-right text-right"> 
                    <a href="users/" class="btn btn-danger">Annuler</a>
                    <button type="button" class="btn btn-success" data-form-checker>Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel row">
                    <div class="col-xs-12 col-lg-6">
                        <!-- start content-->
                        <div class="form-group form-checker">
                            <label>Nom</label>
                            <input class="form-control" placeholder="Entrez votre nom :" type="text" value="<?=$user->lastname()?>" data-required="Vous devez spécifier un nom" name="required[alpha][lastname]">
                        </div>
                        <br>
                        <div class="form-group form-checker">
                           <label>Prénom</label>
                           <input class="form-control" placeholder="Entrez votre prénom :" type="text" value="<?=$user->firstname()?>" data-required="Vous devez spécifier un prénom" name="required[alpha][firstname]">
                        </div>
                        <br>
                        <div class="form-group form-checker">
                           <label>Rôle</label>
                           <select class="form-control" data-required="Vous devez attribuer un rôle à l'utilisateur" name="required[role]" required <?=($_SESSION['user']->role() !== 0 || $_SESSION['user']->id_user() == $user->id_user()) ? "disabled" : ""?> >
                               <option value="0" <?=(!$user->role()) ? "selected" : ""?>>Admin</option>
                               <option value="1" <?=($user->role()) ? "selected" : ""?>>Auteur</option>
                           </select>
                       <?php 
                            if($_SESSION['user']->role() !== 0 || $_SESSION['user']->id_user() == $user->id_user()) 
                            { 
                        ?>
                           <input type="hidden" name="role" value="<?=$user->role()?>"/>
                        <?php 
                            } 
                        ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-offset-1 col-lg-5">
                        <div class="form-group form-checker">
                            <label>Adresse email (login) </label>
                            <input class="form-control" placeholder="Entrez votre email :" type="email" value="<?=$user->email()?>" data-required="Vous devez spécifier une adresse email" name="required[mail][email]">
                        </div>
                        <br/>
                        <div class="form-group form-checker">
                            <label>Mot de passe </label>
                            <input class="form-control" placeholder="Password" type="password" value="<?=$user->password()?>" data-required="Vous devez spécifier un mot de passe" name="required[password]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </form>
</div>
<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>