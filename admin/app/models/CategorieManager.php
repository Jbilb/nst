<?php

class CategorieManager extends Manager
{
    // ========================================================
    // Ajout d'une catégorie
    // ========================================================
    
    public function create(Categorie $categorie) 
    {
        if($this->matchName($categorie->slug()))
        {
            return false;
        }
        else
        {
            // Préparation de la requête à executer pour ajouter une catégorie.
            $q = $this->_db->prepare('INSERT INTO categories(name, slug) VALUES(:name, :slug)');

            // Assignation des différentes valeurs 
            $q->bindValue(':name', $categorie->name());
            $q->bindValue(':slug', $categorie->slug());

            // Execution de la requête
            $q->execute(); 
            
            return (int) $this->_db->lastInsertId();
        }
    }
    
    // ========================================================
    // Modification d'une catégorie
    // ========================================================
    
    public function update(Categorie $categorie) 
    {
        if($this->matchName($categorie->slug(), $categorie->id_categorie()))
        {
            // Si le tag à ajouter existe déja dans la base de données, on empêche sa création
            return false;
        }
        else
        {
            // Préparation de la requête à executer pour modifier la categorie
            $q = $this->_db->prepare('UPDATE categories SET name = :name, slug = :slug WHERE id_categorie = :id_categorie');

            // Assignation des différentes valeurs.
            $q->bindValue(':name', $categorie->name());
            $q->bindValue(':id_categorie', $categorie->id_categorie());
            $q->bindValue(':slug', $categorie->slug());

            // Execution de la requête.
            $q->execute();
            
            return true;
        }
    }
    
    // ========================================================
    // Suppression d'une categorie
    // ========================================================
    
    public function delete($id) 
    {
        // Préparation de la requête à executer pour supprimer l'meta tag.
        $q = $this->_db->prepare('DELETE FROM categories WHERE id_categorie = :id_categorie');
        
        // Assignation des valeurs
        $q->bindValue(':id_categorie',$id);
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Récupération d'une catégorie
    // ========================================================
    
    public function get($id) 
    {
        // Préparation de la requête à executer pour obtenir les données de la categorie.
        $q = $this->_db->prepare('SELECT * FROM categories WHERE id_categorie = :id_categorie');
        
        // Assignation des valeurs
        $q->bindValue(':id_categorie',$id);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne un objet de type Categorie
        return new Categorie($donnees);
    }
    
    // ========================================================
    // Récupération d'une categorie via le slug
    // ========================================================
    
    public function getBySlug($slug) 
    {
        // Préparation de la requête à executer pour obtenir le name du meta tag.
        $q = $this->_db->prepare('SELECT * FROM categories WHERE slug = :slug');
        
        // Assignation de la valeur
        $q->bindValue(':slug', $slug);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        if(!$donnees)
        {
            return false;
        }
        
        // Retourne un objet de type Tag
        return new Categorie($donnees);
    }
    
    // ========================================================
    // Récupération du name d'une catégorie
    // ========================================================
    
    public function getName($id) 
    {
        // Préparation de la requête à executer pour obtenir les données de la categorie.
        $q = $this->_db->prepare('SELECT name FROM categories WHERE id_categorie = :id_categorie');
        
        // Assignation des valeurs
        $q->bindValue(':id_categorie', $id);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne le name de la catégorie
        return $donnees['name'];
    }
    
    // ========================================================
    // Récupération d'un ID de catégorie grâce à son name
    // ========================================================
    
    public function getIdByName($name) 
    {
        // Préparation de la requête à executer pour obtenir les données de la categorie.
        $q = $this->_db->prepare('SELECT id_categorie FROM categories WHERE name = :name');
        
        // Assignation des valeurs
        $q->bindValue(':name', $name);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne le name de la catégorie
        return $donnees['id_categorie'];
    }
    
    // ========================================================
    // Lister toutes les categories (spécifier le rôle 0 ou 1 pour lister les catégories ou sous categories)
    // ========================================================
    
    public function lists() 
    {
        // Création du tableau qui contiendra nos meta categories
        $categories = [];
        
        // Préparation de la requête à executer pour obtenir la liste des categories
        $q = $this->_db->prepare('SELECT * FROM categories ORDER BY name');
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Categorie
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $categories[] = new Categorie($donnees);
        }
        
        return $categories;
    }
    
    // ========================================================
    // Vérifier qu'une catégorie existe
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête à executer (COUNT) pour vérifier que la categorie existe
        $q = $this->_db->prepare('SELECT COUNT(*) FROM categories WHERE id_categorie = :id_categorie');
        
        // Assignation des valeurs
        $q->bindValue(':id_categorie', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
    
    // ========================================================
    // Vérifier si le name de la catégorie n'est pas déjà utilisé
    // ========================================================
    
    public function matchName($slug, $id=false) 
    {
        // Préparation de la requête à executer pour récupérer les names des tags existants
        $q = $this->_db->prepare('SELECT id_categorie, slug FROM categories');
        
        // Execution de la requête.
        $q->execute();
        
        // Variables utiles
        $slugs = [];
        $match = false;
        $i = 0;
        while($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $slugs[$i]['slug'] = $donnees['slug'];
            $slugs[$i]['id_categorie'] = $donnees['id_categorie'];
            $i++;
        }
        foreach($slugs as $key => $item)
        {
            if($item['slug'] === $slug) 
            {
                if($id && $id == $item['id_categorie'])
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
    // Vérifier que la catégorie n'est pas utilisée dans un article
    // ========================================================
    
    public function usedInArticle($id) 
    {
        // Préparation de la requête à executer (COUNT) pour vérifier que le categorie existe
        $q = $this->_db->prepare('SELECT id_categorie FROM articles');
        
        // Execution de la requête.
        $q->execute();
        
        // Variables utiles
        $categoriesArticles = [];
        
        // On ajoute les données récoltées en base de données dans le tableau vide
        while($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $categoriesArticles[] = $donnees['id_categorie'];
        }
        
        // On parcourt les tableaux renvoyés pour essayer de trouver la valeur

        if(in_array($id, $categoriesArticles)) 
        {
            // La valeur a été retrouvée dans l'un des tableaux, on renvoie true
            return true;   
        }
        else 
        {
            // La valeur n'a pas été retrouvée dans l'un des tableaux, on renvoie false
            return false; 
        }
    }
}
?>