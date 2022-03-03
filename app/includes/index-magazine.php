<section class="index-magazine beige-bg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="h1 font bold center vert index-magazine_title anim-title woow" data-woow-toggle="true"
                    data-woow-offset="80"><span>Le magazine</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <?php
                    $articlesALaUne = $ArticleManager->create_list_featured(false,1);
                    if(!empty($articles_list))
                    {
                        $count = 0;
                        foreach($articlesALaUne as $article)
                        {
                            $count++;
                ?>
                <a href="<?=$NAV_mag_article?><?=$article->slug()?>" class="index-magazine_content anim-opacity woow"
                    data-woow-toggle="true" data-woow-offset="80">
                    <div class="index-magazine_content_text">
                        <div>
                            <p class="date anim-opacity woow" data-woow-toggle="true" data-woow-offset="80">
                                <?=$article->date_publication()?></p>
                            <h2 class="h3 title"><?=$article->title()?></h2>
                            <div class="s-trait v-margeTitre anim-tiret woow" data-woow-toggle="true"
                                data-woow-offset="80" style="--traitColor: #fff;">
                                <span><?php include "img/svg/tiret.svg";?></span></div>
                            <p class="blanc anim-opacity woow" data-woow-toggle="true" data-woow-offset="80">
                                <?=$tools->createPreview($article->intro_text(),180)?></p>
                        </div>
                    </div>
                    <figure class="index-magazine_content_img">
                        <img src="<?=$article->cover_image()?>" alt="<?=$article->title()?>">
                    </figure>
                </a>

                <?php 
                    }
                } 
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 center anim-opacity woow" data-woow-toggle="true" data-woow-offset="80">
                <a href="<?php echo $NAV_mag; ?>" title="<?php echo $NAV_TITLE_mag; ?>" class="bouton">
                    <span>TOUS LES ARTICLES</span>
                </a>
            </div>
        </div>
    </div>
</section>