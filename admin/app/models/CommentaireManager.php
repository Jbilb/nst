<?php
class CommentaireManager extends Manager
{    
    // ========================================================
    // Ajout d'un commentaire
    // ========================================================
    
    public function create(Commentaire $commentaire) 
    {
        // Préparation de la requête à executer pour ajouter un commentaire.
        $q = $this->_db->prepare('INSERT INTO commentaires(name, email, date_publication, content, id_article, is_active) VALUES(:name, :email, :date_publication, :content, :id_article, :is_active)');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':name', $commentaire->name());
        $q->bindValue(':email', $commentaire->email());
        $q->bindValue(':date_publication', $commentaire->date_publication());
        $q->bindValue(':content', $commentaire->content());
        $q->bindValue(':id_article', $commentaire->id_article());
        $q->bindValue(':is_active', $commentaire->is_active());
        
        // Execution de la requête
        $q->execute();
    }
    
    // ========================================================
    // Modification d'un commentaire
    // ========================================================
    
    public function update(Commentaire $commentaire) 
    {
        // Préparation de la requête à executer pour modifier le commentaire.
        $q = $this->_db->prepare('UPDATE commentaires SET is_active = :is_active WHERE id_commentaire = :id_commentaire');
        
        // Assignation des différentes valeurs.
        $q->bindValue(':is_active', $commentaire->is_active());
        $q->bindValue(':id_commentaire', $commentaire->id_commentaire());
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Suppression d'un commentaire
    // ========================================================
    
    public function delete($id) 
    {
        // Préparation de la requête à executer pour supprimer le commentaire.
        $q = $this->_db->prepare('DELETE FROM commentaires WHERE id_commentaire = :id_commentaire');
        
        // Assignation des valeurs
        $q->bindValue(':id_commentaire', $id);
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Récupération d'un commentaire
    // ========================================================
    
    public function get($id) 
    {
        // Préparation de la requête à executer pour obtenir les données du commentaire.
        $q = $this->_db->prepare('SELECT * FROM commentaires WHERE id_commentaire = :id_commentaire');
        
        // Assignation des valeurs
        $q->bindValue(':id_commentaire', $id);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne un objet de type Commentaire
        return new Commentaire($donnees);
    }
    
    // ========================================================
    // Lister tous les commentaires
    // Par défaut : listing par ordre décroissant de date
    // ========================================================
    
    public function lists($id_user) 
    {
        // Initialisation de la variable
        $commentaires = [];
        
        // On inclut la classe de gestion des articles pour lister les articles de l'utilisateur / tous les articles (admin)
        $ArticleManager = new ArticleManager($this->_db);
        
        // On liste tous les articles dans une variable
        $articlesList = $ArticleManager->lists($id_user);
        
        // Préparation de la variable des tableaux
        $tableauId = [];
        
        // On parcourt notre variable si elle n'est pas vide
        if(!empty($articlesList)) {
            
            foreach($articlesList as $key => $article) {
                // ON RECUPERE LES ID DES ARTICLES
                $tableauId[] = $article->id_article();
            }
        } else {
            $tableauId[] = 0;
        }
        
        // Préparation de la requête à executer pour obtenir la liste des commentaires
        $q = $this->_db->prepare('SELECT * FROM commentaires WHERE id_article IN ('.implode(',',$tableauId).')');

        // Execution de la requête.
        $q->execute();

        // Retourne un tableau d'objets de type Commentaire
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $commentaires[] = new Commentaire($donnees);
        }
        
        // Classement par date (ordre décroissant)
        
        $dates = [];
        foreach($commentaires as $commentaire) {
            $dates[] = strtotime($commentaire->date_publication());
        }
          
        array_multisort($dates, SORT_DESC, $commentaires);
        
        // Renvoi de la liste des commentaires
        return $commentaires;
    }
    
    // ========================================================
    // Vérifier s'il y a de nouveaux commentaires
    // ========================================================
    
    public function is_new($id_user) 
    {
        // Récupération des commentaires
        $commentaires = $this->lists($id_user);
        
        // Création de la variable (false par défaut)
        $new_com = false;
        
        // On parcourt les commentaires pour vérifier leur is_active
        
        foreach($commentaires as $key => $com) {
            if($com->is_active() == 0) {
                $new_com = true;
            }
        }
        
        // Variable de retour : faux si pas de nouveaux commentaires / true si nouveaux commentaires
        return $new_com;
    }
    
    // ========================================================
    // Récupérer le name de l'article auquel le commentaire est associé 
    // ========================================================
    
    public function getArticleName($id_commentaire)
    {
        // Préparation de la requête à executer (COUNT) pour vérifier que l'email renseigné est présent dans la base de données
        $q = $this->_db->prepare('SELECT id_article FROM commentaires WHERE id_commentaire = :id_commentaire');
        
        // Execution de la requête.
        $q->bindValue(':id_commentaire', $id_commentaire);
        $q->execute();
        
        // Retourne l'id de l'article
        $id_article = (int) $q->fetchColumn(0);
        
        // Récupération de l'article
        $ArticleManager = new ArticleManager($this->_db);
        $article = $ArticleManager->get($id_article);
        
        // Renvoi du titre de l'article
        return $article->title();
    }
    
    // ========================================================
    // Récupérer les id des commentaire d'un article
    // ========================================================
    
    public function getArticleCommentaires($id_article)
    {
        $tableauId = [];
        // Préparation de la requête à executer (COUNT) pour vérifier que l'email renseigné est présent dans la base de données
        $q = $this->_db->prepare('SELECT id_commentaire FROM commentaires WHERE id_article = :id_article');
        
        // Execution de la requête.
        $q->bindValue(':id_article', $id_article);
        $q->execute();
        
        while($id = $q->fetchColumn(0)) 
        {
            $tableauId[] = (int) $id;
        }
        
        return $tableauId;
    }
    
    // ========================================================
    // Vérifier qu'un commentaire existe
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête à executer (COUNT) pour vérifier que la categorie existe
        $q = $this->_db->prepare('SELECT COUNT(*) FROM commentaires WHERE id_commentaire = :id_commentaire');
        
        // Assignation des valeurs
        $q->bindValue(':id_commentaire', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
}
?>