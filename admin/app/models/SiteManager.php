<?php
class SiteManager extends Manager
{
    // ========================================================
    // Modification de la configuration du site
    // ========================================================
    
    public function update(Site $site) 
    {
        // Préparation de la requête à executer pour modifier la categorie
        $q = $this->_db->prepare('UPDATE options SET name= :name, email = :email, domain = :domain, url = :url, url_admin = :url_admin, srcimg = :srcimg, colorimg = :colorimg WHERE id = :id');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':id', 1);
        $q->bindValue(':name', $site->name());
        $q->bindValue(':email', $site->email());
        $q->bindValue(':domain', $site->domain());
        $q->bindValue(':url', $site->url());
        $q->bindValue(':url_admin', $site->url_admin());
        $q->bindValue(':srcimg', $site->srcimg());
        $q->bindValue(':colorimg', $site->colorimg());
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Récupération de la config
    // ========================================================
    
    public function get($id) 
    {
        // Préparation de la requête à executer pour obtenir les données du meta tag.
        $q = $this->_db->prepare('SELECT * FROM options WHERE id = :id');
        
        // Assignation des valeurs à la requête
        $q->bindValue(':id', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Enrgistrement des données dans une variable
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        // Retourne un objet de type Site
        return new Site($donnees);
    }
}
?>