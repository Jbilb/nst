<?php

class PlatManager extends Manager
{
    // ========================================================
    // Ajout d'un plat
    // ========================================================
    
    public function create(Plat $plat) 
    {
        // Préparation de la requête à executer pour ajouter une catégorie.
        $q = $this->_db->prepare('INSERT INTO plats(title, descriptif, price, is_takeaway) VALUES(:title, :descriptif, :price, :is_takeaway)');

        // Assignation des différentes valeurs 
        $q->bindValue(':title', $plat->title());
        $q->bindValue(':descriptif', $plat->descriptif());
        $q->bindValue(':price', $plat->price());
        $q->bindValue(':is_takeaway', $plat->is_takeaway());

        // Execution de la requête
        $q->execute(); 
            
        return (int) $this->_db->lastInsertId();
    }
    
    // ========================================================
    // Modification d'une catégorie
    // ========================================================
    
    public function update(Plat $plat) 
    {
        // Préparation de la requête à executer pour modifier le plat
        $q = $this->_db->prepare('UPDATE plats SET title = :title, descriptif = :descriptif, price = :price, is_takeaway = :is_takeaway WHERE id_plat = :id_plat');

        // Assignation des différentes valeurs.
        $q->bindValue(':title', $plat->title());
        $q->bindValue(':descriptif', $plat->descriptif());
        $q->bindValue(':price', $plat->price());
        $q->bindValue(':id_plat', $plat->id_plat());
        $q->bindValue(':is_takeaway', $plat->is_takeaway());

        // Execution de la requête.
        $q->execute();
            
        return true;
    }
    
    // ========================================================
    // Suppression d'un plat
    // ========================================================
    
    public function delete($id) 
    {
        // Préparation de la requête à executer pour supprimer l'meta tag.
        $q = $this->_db->prepare('DELETE FROM plats WHERE id_plat = :id_plat');
        
        // Assignation des valeurs
        $q->bindValue(':id_plat',$id);
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Récupération d'une catégorie
    // ========================================================
    
    public function get($id) 
    {
        // Préparation de la requête à executer pour obtenir les données du plat.
        $q = $this->_db->prepare('SELECT * FROM plats WHERE id_plat = :id_plat');
        
        // Assignation des valeurs
        $q->bindValue(':id_plat',$id);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne un objet de type Plat
        return new Plat($donnees);
    }
    
    // ========================================================
    // Récupération du name d'une catégorie
    // ========================================================
    
    public function getName($id) 
    {
        // Préparation de la requête à executer pour obtenir les données du plat.
        $q = $this->_db->prepare('SELECT name FROM plats WHERE id_plat = :id_plat');
        
        // Assignation des valeurs
        $q->bindValue(':id_plat', $id);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne le name de la catégorie
        return $donnees['title'];
    }
    
    // ========================================================
    // Récupération d'un ID de catégorie grâce à son name
    // ========================================================
    
    public function getIdByName($title) 
    {
        // Préparation de la requête à executer pour obtenir les données du plat.
        $q = $this->_db->prepare('SELECT id_plat FROM plats WHERE title = :title');
        
        // Assignation des valeurs
        $q->bindValue(':title', $title);
        
        // Execution de la requête.
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne le name de la catégorie
        return $donnees['id_plat'];
    }
    
    // ========================================================
    // Lister toutes les plats (spécifier le rôle 0 ou 1 pour lister les catégories ou sous Plats)
    // ========================================================
    
    public function lists() 
    {
        // Création du tableau qui contiendra nos meta plats
        $plats = [];
        
        // Préparation de la requête à executer pour obtenir la liste des plats
        $q = $this->_db->prepare('SELECT * FROM plats ORDER BY title');
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Plat
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $plats[] = new Plat($donnees);
        }
        
        return $plats;
    }
    
    // ========================================================
    // Vérifier qu'une catégorie existe
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête à executer (COUNT) pour vérifier que le plat existe
        $q = $this->_db->prepare('SELECT COUNT(*) FROM plats WHERE id_plat = :id_plat');
        
        // Assignation des valeurs
        $q->bindValue(':id_plat', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
    
    
    // ========================================================
    // Vérifier que la catégorie n'est pas utilisée dans un plat
    // ========================================================
    
    public function usedInCategorie($id) 
    {
        // Préparation de la requête à executer (COUNT) pour vérifier que le categorie existe
        $q = $this->_db->prepare('SELECT id_plat FROM categories_menu');
        
        // Execution de la requête.
        $q->execute();
        
        // Variables utiles
        $categoriesPlats = [];
        
        // On ajoute les données récoltées en base de données dans le tableau vide
        while($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $categoriesPlats[] = $donnees['id_plat'];
        }
        
        // On parcourt les tableaux renvoyés pour essayer de trouver la valeur

        if(in_array($id, $categoriesPlats)) 
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