<?php include 'includes/inc_header.php'; ?>
<div class="login">
    <div class="login_wrapper">
        <div class="form login_form">
            <section class="login_content">
                    <div class="wrapper-logo">
                        <img class="login-image" src="<?=$site->srcimg()?>" alt="">
                    </div>
                    <h1 class="login-title"><?=$site->name()?></h1>
                    <form action="<?=SITE_ADMIN_BASE.'identification/login'?>" method="post" enctype="multipart/form-data">
                        <div class="col-xs-12 form-group has-feedback  form-checker">
                            <input name="required[mail][email]" class="form-control has-feedback-left" placeholder="Identifiant" type="mail" data-required="Vous devez entrer une adresse email">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-12 form-group has-feedback form-checker">
                            <input name="required[password]" type="password" class="form-control has-feedback-left" placeholder="Mot de passe" data-required="Vous devez entrer votre mot de passe">
                            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div> 
                            <button class="btn btn-primary" type="submit">Se connecter</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                        <div class="clearfix"></div>
                        <div class="copyright">
                            <p>Une réalisation <a href="https://www.melting-k.fr/" target="_blank">Melting K</a></p>
                        </div>
                        </div>
                    </form>
            </section>
        </div>
    </div>
</div>
<?php include 'includes/inc_footer.php'; ?>