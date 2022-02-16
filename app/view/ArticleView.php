<div class="container mag_content c-actu">
    <div class="row">
        <div class="col-xs-12 col-lg-10 col-lg-offset-1 col-xl-8 col-xl-offset-2">
            <div class="c-actu__cover">
                <img src="<?=$article->cover_image()?>" alt="<?=$article->title();?>"/>
                <p class="c-actu__category">
                    <?=$article_categorie?>
                </p>
                <div class="c-actu__cover_text">
                    <h1 class="h2 c-actu__title">
                        <?=$article->title()?>
                    </h1>
                    <span class="c-actu__date">
                        Publié le <?=$article->date_publication(); ?>
                    </span>
                    <p class="c-actu__tags">
                        
                    <?php
                        foreach($article_tags as $tag) 
                        {
                    ?>
                            <a href="<?=$NAV_mag.$tag->slug()?>" class="c-actu__tag">#<?=$tag->name()?></a>
                    <?php
                        }  
                    ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-lg-10 col-lg-offset-1 col-xl-8 col-xl-offset-2">
            <div class="c-actu_wrapper">
                <p class="c-actu__preview">
                    <?=$article->intro_text()?>
                </p>
                
            <?php 
                if(!empty($article_body)) 
                {
                    foreach($article_body as $order => $element)
                    {
                        foreach($element as $type => $content)
                        {
                            switch($type)
                            {
                                case 'body_titles':
                            ?>
                <h2 class="c-actu__subtitle">
                    <?=$content?>
                </h2>
                            <?php
                                break;
                                case 'body_texts':
                            ?>
                <p class="c-actu__text">
                    <?=$content?>
                </p>
                            <?php
                                break;
                                case 'body_images':
                            ?>
                <figure class="c-actu__image">
                    <img src="<?=$content?>" alt="<?=$article->title()?>"/>
                </figure>
                
                            <?php
                                break;
                                case 'body_links':
                            ?>
                <div class="c-actu__button" >
                    <a class="c-actu__button_item" href="<?=$content['link']?>" target="_blank">
                        <?=$content['label']?>
                    </a>
                </div>
                            <?php
                                break;
                                case 'body_cta':
                            ?>
                <div class="c-actu__cta flex">
                    <p class="c-actu__cta_img">
                        <img src="<?=$content['image']?>" alt="<?=$content['titre']?>">
                    </p>
                    <p class="c-actu__cta_text">
                        <strong class="c-actu__cta__title">
                            <?=$content['titre']?>
                        </strong><br/>
                        <span class="c-actu__cta__content">
                            <?=$content['texte']?>
                        </span>
                        <a class="bouton c-actu__cta__button" href="<?=$content['lien']?>" target="_blank"><?=$content['label']?></a>
                    </p>
                </div>
                            <?php
                                break;
                                case 'body_videos':
                                    $id_video = str_replace('https://www.youtube.com/watch?v=',"", $content);
                            ?>
                <div class="c-actu__video">
                    <iframe width="800" height="600" src="https://www.youtube.com/embed/<?=$id_video?>" frameborder="0" allowfullscreen></iframe>
                </div>
                            <?php
                                break;
                                case 'body_pdf':
                            ?>
                <p class="c-actu__pdf">
                    <span class="c-actu__pdf_title">Téléchargement :<br/> <strong><?=$content['titre']?></strong></span>
                    <br><br>
                    <a href="<?=$content['file']?>" target="_blank" class="c-actu__pdf_button">Télécharger le fichier <span class="icon-mag-pdf"></span></a>
                </p>
                            <?php
                                break;
                                case 'body_html_element':
                            ?>
                <div class="c-actu__html-element">
                    <?=$content?>
                </div>
                            <?php
                                break;
                                case 'body_galeries':
                            ?>
                <div class="c-actu__gallery">
                            <?php
                                foreach($content as $image) 
                                {
                            ?>
                    <div class="slide">
                        <div class="wrapper">
                            <img src="<?=$image?>"/>
                        </div>
                    </div>
                            <?php
                                }
                            ?>
                </div>
                            <?php
                                    
                                break;
                            }
                        }
                    }
                }
                        
                            ?>
                
                <div class="c-actu__social flex justify-end">
                    <div class="c-actu__social_links">
                        <p class="c-actu__social_text">
                            Partagez cet article : 
                        </p>
                        <a href="https://twitter.com/share?url=<?=urlencode($ogURL)?>" class="bt-share twitter" target="_blank">
                            <span class="icon-mag-twitter"></span>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?=urlencode($ogURL)?>" class="bt-share facebook" target="_blank">
                            <span class="icon-mag-facebook"></span>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?=urlencode($ogURL)?>" class="bt-share linkedin" target="_blank">
                            <span class="icon-mag-linkedin"></span>
                        </a>
                    </div>
                </div>
                
                <div class="c-actu_comments">
                    <h3 class="c-actu_comments_title">
                        Commentaires
                    </h3>
                    <div class="c-actu_comments_content">
            <?php
                if(!empty($commentaires_list)) 
                {
                    foreach($commentaires_list as $commentaire) 
                    {
            ?>
                        <div class="c-actu__comment">
                            <p class="c-actu__comment_title">
                                <?=$commentaire->name()?> 
                                <span class="c-actu__comment__date">- <?=$commentaire->date_publication()?></span>
                            </p>
                            <p class="c-actu__comment_text">
                                <?=$commentaire->content()?>
                            </p>
                        </div>
            <?php
                    }
                }
                else
                {
            ?>
                    <div class="c-actu__comment">
                        <p class="c-actu__comment_title">
                            Soyez le premier à commenter cet article !
                        </p>
                    </div>
            <?php
                }
            ?>
                    </div>
                </div>
                <button class="c-actu_comments_button" type="button" data-toggle="collapse" data-target="#form-comment" aria-expanded="false" aria-controls="form-comment">
                    <span>Laissez un commentaire</span>
                </button>
              
                <div class="c-actu__form c-form-comment collapse" id="form-comment" aria-expanded="false">
                    <form action="<?=SITE_ADMIN_BASE."controller/AjoutCommentaireController.php"?>" method="post" id="form-commentaire">
                        <input type="hidden" value="<?=$article->id_article()?>" name="id_article"/>
                        <div class="c-form-comment_field form-checker">
                            <input name="required[alphanum][name]" data-required="Vous devez entrer votre nom / pseudo" placeholder="Votre nom / pseudo :" type="text">
                        </div>
                        <div class="c-form-comment_field form-checker">
                            <input name="required[mail][email]" data-required="Vous devez entrer votre email" placeholder="Votre email :" type="email">
                        </div>
                        <div class="c-form-comment_field form-checker">
                            <textarea name="required[content]" placeholder="Votre commentaire :" data-required="Vous devez entrez votre commentaire"></textarea>
                        </div>
                        <div class="c-form-comment_field form-checker">
                            <div class="row">
                                <div class="col-xs-12 col-sm-7">
                                    <div class="form-radio">
                                        <input id="consentement" name="required[consentement]" type="checkbox" data-required="Vous devez cocher cette case pour soumettre le formulaire" value="Oui"/><!--
                                        --><label for="consentement">En soumettant ce commentaire, j'accepte que mon adresse email soit exploitée par <?=$client_name?> afin de pouvoir me contacter si nécessaire.</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 right">
                                    <button type="button" class="c-form-comment_submit" data-form-checker>Soumettre</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            
            <div class="c-actu_similar">
                <header class="c-actu_similar_head">
                    <h3 class="c-actu_similar__title">
                        Sur le même sujet
                    </h3>
                </header>
                <div class="flex align-stretch c-articles_container">
            <?php 
                for($i=0;$i<3;$i++) 
                {
                    if(isset($articles_similar_list[$i]))
                    {
                        $article_similar = $articles_similar_list[$i];
            ?>
                    <article class="c-article c-article--small">
                        <a href="<?=$NAV_mag_article.$article_similar->slug()?>">
                            <figure class="c-article__img">
                                <img src="<?=$article_similar->cover_image()?>" alt="<?=$article_similar->title()?>">
                                <span class="c-article__category">
                                    <?=$CategorieManager->getName($article_similar->id_categorie())?>
                                </span>
                            </figure>
                            <div class="c-article__infos">
                                <span class="c-article__date">
                                    <?=$article_similar->date_publication()?>
                                </span>
                                <h3 class="c-article__title">
                                    <?=$article_similar->title()?>
                                </h3>
                            </div>
                        </a>
                    </article>
            <?php
                    }
                }
            ?>
                </div>
            </div>
        </div>
    </div>
</div>
