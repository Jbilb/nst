<?php
class TagManager extends Manager
{
    
    // ========================================================
    // Ajout d'un meta tag
    // ========================================================
    
    public function create(Tag $tag) 
    
    {
        if($this->matchName($tag->slug()))
        {
            // Si le tag à ajouter existe déja dans la base de données, on empêche sa création
            return false;
        }
        else
        {
            // Sinon, on crée le tag
            // Préparation de la requête à executer pour ajouter un meta tag.
            $q = $this->_db->prepare('INSERT INTO tags(name, slug) VALUES(:name, :slug)');

            // Assignation des différentes valeurs 
            $q->bindValue(':name', $tag->name());
            $q->bindValue(':slug', $tag->slug());

            // Execution de la requête
            $q->execute();
            
            // Renvoi de l'id de l'ajout en base de données
            return (int) $this->_db->lastInsertId();
        }
    }
    
    // ========================================================
    // Modification d'un meta tag
    // ========================================================
    
    public function update(Tag $tag) 
    {
        if($this->matchName($tag->slug(), $tag->id_tag()))
        {
            // Si le tag à ajouter existe déja dans la base de données, on empêche sa création
            return false;
        }
        else
        {
            // Préparation de la requête à executer pour modifier l'meta tag.
            $q = $this->_db->prepare('UPDATE tags SET name = :name, slug = :slug WHERE id_tag = :id_tag');

            // Assignation des différentes valeurs.
            $q->bindValue(':name', $tag->name());
            $q->bindValue(':slug', $tag->slug());
            $q->bindValue(':id_tag', $tag->id_tag());

            // Execution de la requête.
            $q->execute();
            
            return true;
        }
    }
    
    // ========================================================
    // Suppression d'un tag
    // ========================================================
    
    public function delete($id) 
    {
        // Préparation de la requête à executer pour supprimer l'meta tag.
        $q = $this->_db->prepare('DELETE FROM tags WHERE id_tag = :id_tag');
        
        // Assignation des valeurs
        $q->bindValue(':id_tag',$id);
        
        // Execution de la requête.
        $q->execute();
        
        // Suppression du tag dans les articles où il est utilisé
        $this->deleteFromArticles($id);
    }
    
    // ========================================================
    // Récupération d'un meta tag
    // ========================================================
    
    public function get($id) 
    {
        // Préparation de la requête à executer pour obtenir les données du meta tag.
        $q = $this->_db->prepare('SELECT * FROM tags WHERE id_tag = :id_tag');
        
        // Assignation des valeurs
        $q->bindValue(':id_tag',$id);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne un objet de type Tag
        return new Tag($donnees);
    }
    
    // ========================================================
    // Vérifier qu'un tag existe
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête pour vérifier l'existence en base de données d'un client
        $q = $this->_db->prepare('SELECT COUNT(*) FROM tags WHERE id_tag = :id_tag');
        
        // Assignation des valeurs
        $q->bindValue(':id_tag', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
    
    // ========================================================
    // Récupération du name d'un meta tag
    // ========================================================
    
    public function getName($id) 
    {
        // Préparation de la requête à executer pour obtenir le name du meta tag.
        $q = $this->_db->prepare('SELECT name FROM tags WHERE id_tag = :id_tag');
        
        // Assignation des valeurs
        $q->bindValue(':id_tag', $id);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne le name du tag
        return $donnees['name'];
    }
    
    // ========================================================
    // Récupération d'un tag via le slug
    // ========================================================
    
    public function getBySlug($slug) 
    {
        // Préparation de la requête à executer pour obtenir le name du meta tag.
        $q = $this->_db->prepare('SELECT * FROM tags WHERE slug = :slug');
        
        // Assignation de la valeur
        $q->bindValue(':slug', $slug);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Si le slug n'existe pas, on renvoie false
        if(!$donnees)
        {
            return false;
        }
        
        // Retourne un objet de type Tag
        return new Tag($donnees);
    }
    
    // ========================================================
    // Lister tous les meta tags
    // Si $frequence est transmis, on classe les tags par nombre d'apparitions
    // ========================================================
    
    public function lists($frequence = false) 
    {
        // Création du tableau qui contiendra nos meta tags
        $tags = [];
        
        // Préparation de la requête à executer pour obtenir la liste des meta tags
        $q = $this->_db->prepare('SELECT * FROM tags ORDER BY name');

        // Execution de la requête.
        $q->execute();

        // Retourne un tableau d'objets de type Tag
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $tags[$donnees['id_tag']] = new Tag($donnees);
        } 
        
        // Si on doit classer les tags par nombre d'occurences
        if($frequence)
        {
            $tags_ids = [];
            $tags_sorted = [];
            
            // Préparation de la requête à executer pour obtenir la liste des tags des articles publiés
            $q = $this->_db->prepare('SELECT tags FROM articles WHERE is_active = :is_active');
            
            $q->bindValue(':is_active', 1);

            // Execution de la requête.
            $q->execute();

            // Récupération des ID
            while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
            {
                $tags_ids = array_merge($tags_ids,unserialize($donnees['tags']));
            } 
            
            // On compte le nombre d'occurence de chaque ID
            $tags_ids = array_count_values($tags_ids);
            
            // On trie par ordre décroissant
            arsort($tags_ids);
            
            // On renvoit les objets dans un tableau
            foreach($tags_ids as $id => $frequence)
            {
                $tags_sorted[$id] = $tags[$id];
            }
            
            return $tags_sorted;
        }
        
            
        return $tags;
    }
    
    // ========================================================
    // Vérifier si le name n'est pas déjà utilisé
    // ========================================================
    
    public function matchName($slug, $id=false) 
    {
        // Préparation de la requête à executer pour récupérer les names des tags existants
        $q = $this->_db->prepare('SELECT id_tag, slug FROM tags');
        
        // Execution de la requête.
        $q->execute();
        
        // Variables utiles
        $slugs = [];
        $match = false;
        $i = 0;
        while($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $slugs[$i]['slug'] = $donnees['slug'];
            $slugs[$i]['id_tag'] = $donnees['id_tag'];
            $i++;
        }
        foreach($slugs as $key => $item)
        {
            if($item['slug'] === $slug) 
            {
                if($id && $id == $item['id_tag'])
                {
                    $match = false;
                    break;
                }
                $match = true;
                break;
            }
        }
        return $match;
    }
    
    // ========================================================
    // Supprimer un tag de tous les articles
    // ========================================================
    
    public function deleteFromArticles($id) 
    {
        // Préparation de la requête à executer (COUNT) pour vérifier que le meta tag existe
        $q = $this->_db->prepare('SELECT id_article, tags FROM articles');
        
        // Execution de la requête.
        $q->execute();
        
        // Variables utiles
        $articles = [];
        
        // On ajoute les données récoltées en base de données dans le tableau vide
        while($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $articles[] = [
                "id_article" => $donnees['id_article'],
                "tags" => unserialize($donnees['tags'])
            ];
        }
        // On parcourt les tableaux renvoyés pour essayer de trouver la valeur
        foreach($articles as $article)
        {
            $update = false;
            foreach($article['tags'] as $key => $value) {
                if($value == $id) {
                    unset($article['tags'][$key]);
                    $update = true;
                }
            }
            
            if($update)
            {
                $q = $this->_db->prepare('UPDATE articles SET tags = :tags WHERE id_article = :id_article');
        
                // Assignation des différentes valeurs 
                $q->bindValue(':id_article', $article['id_article']);
                $q->bindValue(':tags', serialize($article['tags']));

                // Execution de la requête.
                $q->execute();
            }
        }
    }
}
?>