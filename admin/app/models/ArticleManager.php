<?php
class ArticleManager extends Manager
{

    // ========================================================
    // Ajout d'un article
    // ========================================================
    
    public function create(Article $article) 
    {
        // Préparation de la requête à executer pour ajouter un article.
        $q = $this->_db->prepare('INSERT INTO articles(id_categorie, title, tags, cover_image, date_publication, intro_text, body_titles, body_texts, body_images, body_links, body_galeries, body_cta, body_videos, body_pdf, body_html_element, lectures, auteur, id_user, is_active, featured, slug) VALUES(:id_categorie, :title, :tags, :cover_image, :date_publication, :intro_text, :body_titles, :body_texts, :body_images, :body_links, :body_galeries, :body_cta, :body_videos, :body_pdf, :body_html_element, :lectures, :auteur, :id_user, :is_active, :featured, :slug)');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':id_categorie', $article->id_categorie());
        $q->bindValue(':title', $article->title());
        $q->bindValue(':tags', serialize($article->tags()));
        $q->bindValue(':cover_image', $article->cover_image());
        $q->bindValue(':date_publication', $article->date_publication());
        $q->bindValue(':intro_text', $article->intro_text());
        $q->bindValue(':body_titles', serialize($article->body_titles()));
        $q->bindValue(':body_texts', serialize($article->body_texts()));
        $q->bindValue(':body_images', serialize($article->body_images()));
        $q->bindValue(':body_links', serialize($article->body_links()));
        $q->bindValue(':body_galeries', serialize($article->body_galeries()));
        $q->bindValue(':body_cta', serialize($article->body_cta()));
        $q->bindValue(':body_videos', serialize($article->body_videos()));
        $q->bindValue(':body_pdf', serialize($article->body_pdf()));
        $q->bindValue(':body_html_element', serialize($article->body_html_element()));
        $q->bindValue(':lectures', $article->lectures());
        $q->bindValue(':auteur', $article->auteur());
        $q->bindValue(':id_user', $article->id_user());
        $q->bindValue(':is_active', $article->is_active());
        $q->bindValue(':featured', $article->featured());
        $q->bindValue(':slug', $article->slug());
        
        // Execution de la requête
        $q->execute();
        
        // Renvoie le dernier ID inséré en base de données
        return $this->_db->lastInsertId();
    }
    
    // ========================================================
    // Modification d'un article
    // ========================================================
    
    public function update(Article $article) 
    {
        // Récupération du projet à modifier
        $article_old = $this->get($article->id_article());
        
        // Suppression de l'ancienne cover si elle a été modifiée
        if($article_old->cover_image() !== $article->cover_image())
        {
            unlink(realpath(__DIR__ . '/../..').'/'.$article_old->cover_image());
        }
        
        // Suppression des anciennes images si elles ont été modifiées
        if(!empty($article_old->body_images()))
        {
            foreach($article_old->body_images() as $image) 
            {
                if(empty($article->body_images()))
                {
                     unlink(realpath(__DIR__ . '/../..').'/'.$image);
                }
                else
                {
                    if(!in_array($image,$article->body_images()))
                    {
                        unlink(realpath(__DIR__ . '/../..').'/'.$image);
                    }
                }
            } 
        }
        
        // Suppression des anciennes galeries si elles ont été modifiées
        $new_galerie_images = [];
        if(!empty($article->body_galeries()))
        {
            foreach($article->body_galeries() as $new_galerie) 
            {
                foreach($new_galerie as $new_image) 
                {
                    $new_galerie_images[] = $new_image;
                }
            }
        }
        
        if(!empty($article_old->body_galeries()))
        {
            foreach($article_old->body_galeries() as $galerie)
            {
                foreach($galerie as $image)
                {
                    if(empty($article->body_galeries()) || !in_array($image,$new_galerie_images))
                    {
                         unlink(realpath(__DIR__ . '/../..').'/'.$image);
                    }
                }
            }
        }
        
        // Suppression des anciennes images de CTA si elles ont été modifiées
        $new_cta_images = [];
        if(!empty($article->body_cta()))
        {
            foreach($article->body_cta() as $new_cta)
            {
                $new_cta_images[] = $new_cta['image'];
            }
        }
        if(!empty($article_old->body_cta()))
        {
            foreach($article_old->body_cta() as $cta) 
            {
                if(empty($article->body_cta()) || !in_array($cta['image'],$new_cta_images))
                {
                     unlink(realpath(__DIR__ . '/../..').'/'.$cta['image']);
                }
            }
        }
        
        // Suppression des anciens fichiers PDF si ils ont été modifiés
        $new_pdf_files = [];
        if(!empty($article->body_pdf()))
        {
            foreach($article->body_pdf() as $new_pdf)
            {
                $new_pdf_files[] = $new_pdf['file'];
            }
        }
        if(!empty($article_old->body_pdf()))
        {
            foreach($article_old->body_pdf() as $pdf) 
            {
                if(empty($article->body_pdf()) || !in_array($pdf['file'],$new_pdf_files))
                {
                     unlink(realpath(__DIR__ . '/../..').'/'.$pdf['file']);
                }
            }
        }
        
        
        // Préparation de la requête à executer pour modifier la categorie
        $q = $this->_db->prepare('UPDATE articles SET id_categorie = :id_categorie, title = :title, tags = :tags, cover_image = :cover_image, date_publication = :date_publication, intro_text = :intro_text, body_titles = :body_titles, body_texts = :body_texts, body_images = :body_images, body_links = :body_links, body_galeries = :body_galeries, body_cta = :body_cta, body_videos = :body_videos, body_pdf = :body_pdf, body_html_element = :body_html_element, lectures = :lectures, auteur = :auteur, id_user = :id_user, is_active = :is_active, featured = :featured, slug = :slug WHERE id_article = :id_article');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':id_categorie', $article->id_categorie());
        $q->bindValue(':title', $article->title());
        $q->bindValue(':tags', serialize($article->tags()));
        $q->bindValue(':cover_image', $article->cover_image());
        $q->bindValue(':date_publication', $article->date_publication());
        $q->bindValue(':intro_text', $article->intro_text());
        $q->bindValue(':body_titles', serialize($article->body_titles()));
        $q->bindValue(':body_texts', serialize($article->body_texts()));
        $q->bindValue(':body_images', serialize($article->body_images()));
        $q->bindValue(':body_links', serialize($article->body_links()));
        $q->bindValue(':body_galeries', serialize($article->body_galeries()));
        $q->bindValue(':body_cta', serialize($article->body_cta()));
        $q->bindValue(':body_videos', serialize($article->body_videos()));
        $q->bindValue(':body_pdf', serialize($article->body_pdf()));
        $q->bindValue(':body_html_element', serialize($article->body_html_element()));
        $q->bindValue(':lectures', $article->lectures());
        $q->bindValue(':auteur', $article->auteur());
        $q->bindValue(':id_user', $article->id_user());
        $q->bindValue(':is_active', $article->is_active());
        $q->bindValue(':featured', $article->featured());
        $q->bindValue(':slug', $article->slug());
        $q->bindValue(':id_article', $article->id_article());
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Suppression d'un article
    // ========================================================
    
    public function delete($id) 
    {
        // Récupération de l'article à supprimer
        $article = $this->get($id);
        
        // Suppression des images sur le serveur
        unlink(realpath(__DIR__ . '/../..').'/'.$article->cover_image());
        
        if(!empty($article->body_images()))
        {
            foreach($article->body_images() as $key => $image)
            {
                unlink(realpath(__DIR__ . '/../..').'/'.$image);
            }
        }
        
        if(!empty($article->body_galeries()))
        {
            foreach($article->body_galeries() as $key => $galerie)
            {
                foreach($galerie as $image)
                {
                    unlink(realpath(__DIR__ . '/../..').'/'.$image);
                }
            }
        }
        
        if(!empty($article->body_cta()))
        {
            foreach($article->body_cta() as $key => $cta)
            {
                unlink(realpath(__DIR__ . '/../..').'/'.$cta['image']);
            }
        }
        
        if(!empty($article->body_pdf()))
        {
            foreach($article->body_pdf() as $key => $pdf)
            {
                unlink(realpath(__DIR__ . '/../..').'/'.$pdf['file']);
            }
        }
        
        // Préparation de la requête à executer pour supprimer l'article
        $q = $this->_db->prepare('DELETE FROM articles WHERE id_article = '.$id);
        
        // Execution de la requête
        $q->execute();
    }
    
    // ========================================================
    // Récupération d'un article
    // ========================================================
    
    public function get($id_article) 
    {
        // Préparation de la requête à executer pour obtenir les données du meta tag.
        $q = $this->_db->prepare('SELECT * FROM articles WHERE id_article = :id_article');
        
         // Assignation des valeurs
        $q->bindValue(':id_article', $id_article);
        
        // Execution de la requête.
        $q->execute();
        
        // Stockage des données renvoyées dans une variable
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        if(!$donnees)
        {
            return false;
        }
        
        // Retourne un objet de type Article
        return new Article($donnees);
    }
    
    // ========================================================
    // Récupération d'un article via le slug
    // ========================================================
    
    public function getBySlug($slug) 
    {
        // Préparation de la requête à executer pour obtenir les données  de l'article
        $q = $this->_db->prepare('SELECT * FROM articles WHERE slug = :slug');
        
        // Assignation des valeurs
        $q->bindValue(':slug', $slug);
        
        // Execution de la requête.
        $q->execute();
        
        // Stockage dans une variable du résultat renvoyé par la requête
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        if(!$donnees)
        {
            return false;
        }
        
        // Retourne un objet de type Article
        return new Article($donnees);
    }
    
    // ========================================================
    // Lister tous les articles
    // ========================================================
    
    public function lists($id_user) 
    {
        // Création du tableau qui contiendra nos articles
        $articles = [];
        
        // Création du tableau des dates qui permettra de trier de la moins récente à la plus récente
        $dates = [];
        
        // Préparation de la requête à executer pour obtenir la liste des articles
        if(!$id_user)
        {
            // Utilisateur = admin, on récupère tous les articles
            $q = $this->_db->prepare('SELECT * FROM articles');
        }
        else
        {
            // Utilisateur = rédacteur, on ne récupère que ses articles
            $q = $this->_db->prepare('SELECT * FROM articles WHERE id_user = :id_user');
            $q->bindValue(':id_user', $id_user);
        }
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Article + un tableau des dates de chacun
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $articles[] = new Article($donnees);
            $dates[] = strtotime($donnees['date_publication']);
        }
        
        // Tri des articles par ordre décroissant de dates
        array_multisort($dates, SORT_DESC, $articles);
        
        // Renvoi de la liste des articles
        return $articles;
    }
    
    // ========================================================
    // Créer des listes personnalisées pour le front-end
    // ========================================================
    
    public function create_list($published,$id_categorie = false,$id_tag = false) 
    {
        // Création du tableau qui contiendra nos articles
        $articles = [];
        
        // Création du tableau des dates qui permettra de trier de la moins récente à la plus récente
        $dates = [];
        
        // Création de la requête SQL qui sera envoyée
        $query = 'SELECT * FROM articles ';
        
        // Cas 1 : publiés / non publiés en fonction du paramètre transmis
        if(!$published)
        {
            $query .= "WHERE is_active IN (0,1) ";
        }
        else
        {
            $query .= "WHERE is_active = 1 ";
        }
        
        // Cas 2 : catégorie spécifique, en fonction du paramètre transmis
        if($id_categorie)
        {
            $query .= "AND id_categorie = ".$id_categorie;
        }
        
        // Préparation de la requête
        $q = $this->_db->prepare($query);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Article + un tableau des dates de chacun
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $articles[] = new Article($donnees);
            $dates[] = strtotime($donnees['date_publication']);
        }
        
        // Tri des articles par ordre décroissant de dates
        array_multisort($dates, SORT_DESC, $articles);
        
        // Suppression des articles pas encore publiés (date supérieure à maintenant)
        foreach($articles as $key => $article)
        {
            if(strtotime($article->date_publication()) > time())
            {
                unset($articles[$key]);
            }
        }
        
        // Application d'un filtre supplémentaire (tags)
        if($id_tag)
        {
            foreach($articles as $key => $article)
            {
                if(!in_array($id_tag,$article->tags()))
                {
                    unset($articles[$key]);
                }
            }
        }
        
        // Renvoi de la liste des articles
        return $articles;
    }
    
    // ========================================================
    // Créer une liste d'articles à la une pour le front-end
    // Paramètre Catégorie : false > toutes / true > un article à la une par catégorie / int > l'id de la catégorie
    // Paramètre number : false > renvoit tous les articles trouvés / int > renvoi le nombre d'articles spécifiés
    // ========================================================
    
    public function create_list_featured($categorie = false, $number = false) 
    {
        // Création du tableau qui contiendra nos articles
        $articles = $list_featured = [];
        
        // Création du tableau des dates qui permettra de trier de la moins récente à la plus récente
        $dates = [];
        
        // Création de la requête SQL qui sera envoyée pour récupérer les articles publiés et à la une
        $query = 'SELECT * FROM articles WHERE is_active = 1 AND featured = 1';
        
        // Paramètre Catégorie
        if(is_int($categorie))
        {
            $query .= " AND id_categorie = ".$categorie;
        }
        
        // Préparation de la requête
        $q = $this->_db->prepare($query);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Article + un tableau des dates de chacun
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $articles[] = new Article($donnees);
            $dates[] = strtotime($donnees['date_publication']);
        }
        
        // Tri des articles par ordre décroissant de dates
        array_multisort($dates, SORT_DESC, $articles);
        
        // Suppression des articles pas encore publiés (date supérieure à maintenant)
        foreach($articles as $key => $article)
        {
            if(strtotime($article->date_publication()) > time())
            {
                unset($articles[$key]);
            }
        }
        
        // Si Catégorie est strictement égal à true > on renvoi un article à la une (le dernier en date) par catégorie
        if($categorie === true)
        {
            foreach($articles as $article)
            {
                if(!isset($list_featured[$article->id_categorie()]))
                {
                    $list_featured[$article->id_categorie()] = $article;
                }
            }
        }
        else
        {
            // On réduit la liste au nombre d'articles voulus
            if($number)
            {
                $i = 0;
                foreach($articles as $article)
                {
                    if($i < $number)
                    {
                        $list_featured[] = $article;
                        $i++;
                    }
                }
            }
            else
            {
                $list_featured = $articles;
            }
        }
        
        // Renvoi de la liste des articles
        return $list_featured;
    }
    
    // ========================================================
    // Vérifier qu'un article n'existe pas déjà
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête pour vérifier l'existence en base de données d'une intervention
        $q = $this->_db->prepare('SELECT COUNT(*) FROM articles WHERE id_article = :id_article');
        
        // Assignation des valeurs
        $q->bindValue(':id_article', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
    
    
    
    // ========================================================
    // Récupère les commentaires d'un article
    // ========================================================
    
    public function getComments($id_article) 
    {
        // Préparation de la requête à exécuter
        $q = $this->_db->prepare('SELECT * FROM commentaires WHERE id_article = :id_article AND is_active = 1');
        
        $q->bindValue(':id_article', $id_article);
        
        // Execution de la requête.
        $q->execute();
        
        // Création des variables utiles
        $commentaires = [];
        $dates = [];
        
        // Recupère les commentaires
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $commentaires[] = new Commentaire($donnees);
            $dates[] = strtotime($donnees['date_publication']);
        }
        
        // Tri des commentaires par ordre décroissant de dates
        array_multisort($dates, SORT_DESC, $commentaires);
        
        return $commentaires;
    }
    
    
    
    // ========================================================
    // Ajoute +1 au nombre de lectures de l'article
    // ========================================================
    
    public function ajoutLecture($id) 
    {
        // Préparation de la requête à exécuter
        $q = $this->_db->prepare('SELECT lectures FROM articles WHERE id_article = :id');
        
        $q->bindValue(':id', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Recupère le nombre total de lectures
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $lectures = $donnees['lectures'];
        }
        
        // Incrémente le nombre de lectures de 1
        $lectures ++;
        
        // Mise à jour de la base de données : préparation de la requête
        $q = $this->_db->prepare('UPDATE articles SET lectures = :lectures WHERE id_article = :id');
        $q->bindValue(':lectures', $lectures);
        $q->bindValue(':id', $id);
        
        // Execution de la requête.
        $q->execute();
        
    }
}
?>