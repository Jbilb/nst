<?php
class MenuManager extends Manager
{

    // ========================================================
    // Ajout d'un article
    // ========================================================
    
    public function create(Menu $menu) 
    {
        // Préparation de la requête à executer pour ajouter un article.
        $q = $this->_db->prepare('INSERT INTO menu(categories_menu) VALUES(:categories_menu)');
        
        // Assignation des différentes valeurs
        $q->bindValue(':categories_menu', serialize($menu->categories_menu()));
        
        // Execution de la requête
        $q->execute();
        
        // Renvoie le dernier ID inséré en base de données
        return $this->_db->lastInsertId();
    }
    
    // ========================================================
    // Modification d'un article
    // ========================================================
    
    public function update(Menu $menu) 
    {
        // Récupération du projet à modifier
        $menu_old = $this->get($menu->id_menu());
    
        // Préparation de la requête à executer pour modifier la categorie
        $q = $this->_db->prepare('UPDATE menu SET categories_menu = :categories_menu WHERE id_menu = :id_menu');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':categories_menu', serialize($menu->categories_menu()));
        $q->bindValue(':id_menu', $menu->id_menu());
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Suppression d'un article
    // ========================================================
    
    public function delete($id) 
    {
        // Préparation de la requête à executer pour supprimer l'article
        $q = $this->_db->prepare('DELETE FROM menu WHERE id_menu = '.$id);
        
        // Execution de la requête
        $q->execute();
    }
    
    // ========================================================
    // Récupération d'un article
    // ========================================================
    
    public function get($id_menu) 
    {
        // Préparation de la requête à executer pour obtenir les données du meta tag.
        $q = $this->_db->prepare('SELECT * FROM menu WHERE id_menu = :id_menu');
        
         // Assignation des valeurs
        $q->bindValue(':id_menu', $id_menu);
        
        // Execution de la requête.
        $q->execute();
        
        // Stockage des données renvoyées dans une variable
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        if(!$donnees)
        {
            return false;
        }
        
        // Retourne un objet de type Article
        return new Menu($donnees);
    }
    
    // ========================================================
    // Vérifier qu'un article n'existe pas déjà
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête pour vérifier l'existence en base de données d'une intervention
        $q = $this->_db->prepare('SELECT COUNT(*) FROM menu WHERE id_menu = :id_menu');
        
        // Assignation des valeurs
        $q->bindValue(':id_menu', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
}
?>