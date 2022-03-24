<?php
class OfferManager extends Manager
{

    // ========================================================
    // Ajout d'un offer
    // ========================================================
    
    public function create(Offer $offer) 
    {
        // Préparation de la requête à executer pour ajouter un offer.
        $q = $this->_db->prepare('INSERT INTO offers(title, title_vignette, description, date_start, date_end, image_vignette, image_photo, image_desktop, image_mobile, text_button, url_button, is_published, is_featured) VALUES(:title, :title_vignette, :description, :date_start, :date_end, :image_vignette, :image_photo, :image_desktop, :image_mobile, :text_button, :url_button, :is_published, :is_featured)');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':title', $offer->title());
        $q->bindValue(':title_vignette', $offer->title_vignette());
        $q->bindValue(':description', $offer->description());
        $q->bindValue(':date_start', $offer->date_start());
        $q->bindValue(':date_end', $offer->date_end());
        $q->bindValue(':image_vignette', $offer->image_vignette());
        $q->bindValue(':image_photo', $offer->image_photo());
        $q->bindValue(':image_desktop', $offer->image_desktop());
        $q->bindValue(':image_mobile', $offer->image_mobile());
        $q->bindValue(':text_button', $offer->text_button());
        $q->bindValue(':url_button', $offer->url_button());
        $q->bindValue(':is_published', $offer->is_published());
        $q->bindValue(':is_featured', $offer->is_featured());
 
        // Execution de la requête
        $q->execute();
        
        // Renvoie le dernier ID inséré en base de données
        return $this->_db->lastInsertId();
    }
    
    // ========================================================
    // Modification d'un offer
    // ========================================================
    
    public function update(Offer $offer) 
    {  
        // Préparation de la requête à executer pour modifier la categorie
        $q = $this->_db->prepare('UPDATE offers SET title = :title, title_vignette = :title_vignette, description = :description, date_start = :date_start, date_end = :date_end, image_vignette = :image_vignette, image_photo = :image_photo, image_desktop = :image_desktop, image_mobile = :image_mobile, text_button = :text_button, url_button = :url_button, is_published = :is_published, is_featured = :is_featured  WHERE id_offer = :id_offer');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':title', $offer->title());
        $q->bindValue(':title_vignette', $offer->title_vignette());
        $q->bindValue(':description', $offer->description());
        $q->bindValue(':date_start', $offer->date_start());
        $q->bindValue(':date_end', $offer->date_end());
        $q->bindValue(':image_vignette', $offer->image_vignette());
        $q->bindValue(':image_photo', $offer->image_photo());
        $q->bindValue(':image_desktop', $offer->image_desktop());
        $q->bindValue(':image_mobile', $offer->image_mobile());
        $q->bindValue(':text_button', $offer->text_button());
        $q->bindValue(':url_button', $offer->url_button());
        $q->bindValue(':is_published', $offer->is_published());
        $q->bindValue(':is_featured', $offer->is_featured());
        $q->bindValue(':id_offer', $offer->id_offer());
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Suppression d'un offer
    // ========================================================
    
    public function delete($id) 
    {
        // Préparation de la requête à executer pour supprimer l'meta tag.
        $q = $this->_db->prepare('DELETE FROM offers WHERE id_offer = :id_offer');
        
        // Assignation des valeurs
        $q->bindValue(':id_offer',$id);
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Récupération d'un offer
    // ========================================================
    
    public function get($id_offer) 
    {
        // Préparation de la requête à executer pour obtenir les données du meta tag.
        $q = $this->_db->prepare('SELECT * FROM offers WHERE id_offer = :id_offer');
        
         // Assignation des valeurs
        $q->bindValue(':id_offer', $id_offer);
        
        // Execution de la requête.
        $q->execute();
        
        // Stockage des données renvoyées dans une variable
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        if(!$donnees)
        {
            return false;
        }
        
        // Retourne un objet de type offer
        return new Offer($donnees);
    }
    
    // ========================================================
    // Lister tous les offer
    // ========================================================
    
    public function lists() 
    {
        // Création du tableau qui contiendra nos meta offers
        $offers = [];
        
        // Préparation de la requête à executer pour obtenir la liste des offers
        $q = $this->_db->prepare('SELECT * FROM offers ORDER BY title');
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Offer
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $offers[] = new Offer($donnees);
        }
        
        return $offers;
    }
    
    // ========================================================
    // Vérifier qu'un offer n'existe pas déjà
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête pour vérifier l'existence en base de données d'une intervention
        $q = $this->_db->prepare('SELECT COUNT(*) FROM offes WHERE id_offer = :id_offer');
        
        // Assignation des valeurs
        $q->bindValue(':id_offer', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
}
?>