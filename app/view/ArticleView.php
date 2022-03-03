<div class="mag_content c-actu">
    <?php
    include 'includes/form-sort.php';
    ?>
    <div class="c-actu__cover">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1 col-xl-8 col-xl-offset-2">
                    <div class="c-actu__cover_content">
                        <div class="c-actu__cover_text">
                            <h1 class="c-actu__title center">
                                <?=$article->title()?>
                            </h1>
                        </div>
                        <p class="c-actu__date center">
                            Article publié le <?=$article->date_publication(); ?>
                        </p>
                        <div class="c-actu__tags center">
                            <?php
                            foreach($article_tags as $tag) 
                            {
                            ?>
                            <div class="c-actu__tag">#<?=$tag->name()?></div>
                            <?php
                            }  
                            ?>
                        </div>
                        <div class="c-actu__social center">
                            <div class="c-actu__social_links">
                                <a href="https://twitter.com/share?url=<?=urlencode($ogURL)?>" class="bt-share twitter"
                                    target="_blank">
                                    <span class="icon-mag-twitter"></span>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?=urlencode($ogURL)?>"
                                    class="bt-share facebook" target="_blank">
                                    <span class="icon-mag-facebook"></span>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?=urlencode($ogURL)?>"
                                    class="bt-share linkedin" target="_blank">
                                    <span class="icon-mag-linkedin"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <figure class="c-actu__cover_img">
                        <img src="<?=$article->cover_image()?>" alt="<?=$article->title();?>" />
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1 col-xl-8 col-xl-offset-2">
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
                        <img src="<?=$content?>" alt="<?=$article->title()?>" />
                    </figure>

                    <?php
                                    break;
                                    case 'body_links':
                                ?>
                    <div class="c-actu__button">
                        <a class="c-actu__button_item bouton v-vert" href="<?=$content['link']?>" target="_blank">
                            <span><?=$content['label']?></span>
                        </a>
                    </div>
                    <?php
                                    break;
                                    case 'body_cta':
                                ?>
                    <div class="c-actu__cta">
                        <p class="c-actu__cta_img">
                            <img src="<?=$content['image']?>" alt="<?=$content['titre']?>">
                        </p>
                        <div class="c-actu__cta_text">
                            <strong class="c-actu__cta__title">
                                <?=$content['titre']?>
                            </strong><br />
                            <span class="c-actu__cta__content">
                                <?=$content['texte']?>
                            </span>
                            <div>
                                <a class="c-actu__cta__button bouton bg0-white-brvert " href="<?=$content['lien']?>"
                                    target="_blank"><span><?=$content['label']?></span></a>
                            </div>
                        </div>
                    </div>
                    <?php
                                    break;
                                    case 'body_videos':
                                        $id_video = str_replace('https://www.youtube.com/watch?v=',"", $content);
                                ?>
                    <div class="c-actu__video">
                        <iframe width="800" height="600" src="https://www.youtube.com/embed/<?=$id_video?>"
                            frameborder="0" allowfullscreen></iframe>
                    </div>
                    <?php
                                    break;
                                    case 'body_pdf':
                                ?>
                    <div class="c-actu__pdf">
                        <p class="c-actu__pdf_title"><strong><?=$content['titre']?></strong></p>
                        <div class="center">
                            <a href="<?=$content['file']?>" target="_blank" class="c-actu__pdf_button bouton v-vert">
                                <span>
                                    Télécharger
                                </span>
                            </a>
                        </div>
                    </div>
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
                                <img src="<?=$image?>" />
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
                </div>
            </div>
        </div>
    </div>
    <div class="c-actu_similar beige-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header class="c-actu_similar_head">
                        <h3 class="c-actu_similar__title h2 bold center rose">
                            Sur le même sujet
                        </h3>
                    </header>
                </div>
                <div class="col-xs-12">
                    <div class="flex align-stretch c-articles_container">
                        <?php 
                        for($i=0;$i<3;$i++) 
                        {
                        if(isset($articles_similar_list[$i]))
                        {
                            $article_similar = $articles_similar_list[$i];
                        ?>
                        <article class="c-article c-article--card <?php if($i === 2){ echo "visible-lg";}?>">
                            <a class="c-article--card_link" href="<?=$NAV_mag_article.$article_similar->slug()?>">
                                <figure class="c-article__img">
                                    <img src="<?=$article_similar->cover_image()?>"
                                        alt="<?=$article_similar->title()?>">
                                </figure>
                                <div class="c-article__infos">
                                    <div>
                                        <p class="c-article__date">
                                            <?=$article_similar->date_publication()?>
                                        </p>
                                        <p class="c-article__category">
                                            <?=$CategorieManager->getName($article_similar->id_categorie())?>
                                        </p>
                                        <h2 class="c-article__title"><?=$article_similar->title()?></h2>
                                    </div>
                                    <div><button class="bouton bg0-white-brvert"><span>Lire la suite</span></button>
                                    </div>
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
</div>