<?php

class CategorieMenuManager extends Manager
{
    // ========================================================
    // Ajout d'une catégorie
    // ========================================================
    
    public function create(CategorieMenu $categorie_menu) 
    {
        // Préparation de la requête à executer pour ajouter une catégorie.
        $q = $this->_db->prepare('INSERT INTO categories_menu(name, plats, sous_categories, is_sous_categorie) VALUES(:name, :plats, :sous_categories, :is_sous_categorie)');

        // Assignation des différentes valeurs 
        $q->bindValue(':name', $categorie_menu->name());
        $q->bindValue(':plats', serialize($categorie_menu->plats()));
        $q->bindValue(':sous_categories', serialize($categorie_menu->sous_categories()));
        $q->bindValue(':is_sous_categorie', $categorie_menu->is_sous_categorie());

        // Execution de la requête
        $q->execute(); 
            
        return (int) $this->_db->lastInsertId();
    }
    
    // ========================================================
    // Modification d'une catégorie
    // ========================================================
    
    public function update(CategorieMenu $categorie_menu) 
    {
        // Préparation de la requête à executer pour modifier la categorie
        $q = $this->_db->prepare('UPDATE categories_menu SET name = :name, plats = :plats, sous_categories = :sous_categories, is_sous_categorie = :is_sous_categorie WHERE id_categorie_menu = :id_categorie_menu');

        // Assignation des différentes valeurs.
        $q->bindValue(':name', $categorie_menu->name());
        $q->bindValue(':plats', serialize($categorie_menu->plats()));
        $q->bindValue(':sous_categories', serialize($categorie_menu->sous_categories()));
        $q->bindValue(':is_sous_categorie', $categorie_menu->is_sous_categorie());
        $q->bindValue(':id_categorie_menu', $categorie_menu->id_categorie_menu());

        // Execution de la requête.
        $q->execute();
            
        return true;
    }
    
    // ========================================================
    // Suppression d'une categorie
    // ========================================================
    
    public function delete($id) 
    {
        // Préparation de la requête à executer pour supprimer l'meta tag.
        $q = $this->_db->prepare('DELETE FROM categories_menu WHERE id_categorie_menu = :id_categorie_menu');
        
        // Assignation des valeurs
        $q->bindValue(':id_categorie_menu',$id);
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Récupération d'une catégorie
    // ========================================================
    
    public function get($id) 
    {
        // Préparation de la requête à executer pour obtenir les données de la categorie.
        $q = $this->_db->prepare('SELECT * FROM categories_menu WHERE id_categorie_menu = :id_categorie_menu');
        
        // Assignation des valeurs
        $q->bindValue(':id_categorie_menu',$id);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne un objet de type Categorie
        return new CategorieMenu($donnees);
    }
    
    // ========================================================
    // Récupération du name d'une catégorie
    // ========================================================
    
    public function getName($id) 
    {
        // Préparation de la requête à executer pour obtenir les données de la categorie.
        $q = $this->_db->prepare('SELECT name FROM categories_menu WHERE id_categorie_menu = :id_categorie_menu');
        
        // Assignation des valeurs
        $q->bindValue(':id_categorie_menu', $id);
        
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
        $q = $this->_db->prepare('SELECT id_categorie_menu FROM categories_menu WHERE name = :name');
        
        // Assignation des valeurs
        $q->bindValue(':name', $name);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne le name de la catégorie
        return $donnees['id_categorie_menu'];
    }
    
    // ========================================================
    // Lister toutes les categories (spécifier le rôle 0 ou 1 pour lister les catégories ou sous categories)
    // ========================================================
    
    public function lists() 
    {
        // Création du tableau qui contiendra nos meta categories
        $categories = [];
        
        // Préparation de la requête à executer pour obtenir la liste des categories
        $q = $this->_db->prepare('SELECT * FROM categories_menu ORDER BY name');
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Categorie
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $categories[] = new CategorieMenu($donnees);
        }
        
        return $categories;
    }
    
    // ========================================================
    // Vérifier qu'une catégorie existe
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête à executer (COUNT) pour vérifier que la categorie existe
        $q = $this->_db->prepare('SELECT COUNT(*) FROM categories_menu WHERE id_categorie_menu = :id_categorie_menu');
        
        // Assignation des valeurs
        $q->bindValue(':id_categorie_menu', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
    
    // ========================================================
    // Vérifier si le name de la catégorie n'est pas déjà utilisé
    // ========================================================
    
    public function matchName($id=false) 
    {
        // Préparation de la requête à executer pour récupérer les names des tags existants
        $q = $this->_db->prepare('SELECT id_categorie_menu, slug FROM categories_menu');
        
        // Execution de la requête.
        $q->execute();
        
        // Variables utiles
        $slugs = [];
        $match = false;
        $i = 0;
        while($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $slugs[$i]['id_categorie_menu'] = $donnees['id_categorie_menu'];
            $i++;
        }
        return $match;
    }
}
?>