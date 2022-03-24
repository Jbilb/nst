<?php
class RestaurantManager extends Manager
{

    // ========================================================
    // Ajout d'un restaurant
    // ========================================================
    
    public function create(Restaurant $restaurant) 
    {
        // Préparation de la requête à executer pour ajouter un restaurant.
        $q = $this->_db->prepare('INSERT INTO restaurants(name, title_content, text_content, phone, email, address, image_restaurants, amenities, url_order, url_google, url_itinary, url_youtube, button_title, url_symbiose, date_publishing, is_published, lat, lng, time_monday, time_tuesday, time_wenesday, time_thursday, time_friday, time_saturday, time_sunday) VALUES(:name, :title_content, :text_content, :phone, :email, :address, :image_restaurants, :amenities, :url_order, :url_google, :url_itinary, :url_youtube, :button_title, :url_symbiose, :date_publishing, :is_published, :lat, :lng, :time_monday, :time_tuesday, :time_wenesday, :time_thursday, :time_friday, :time_saturday, :time_sunday)');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':name', $restaurant->name());
        $q->bindValue(':tile_content', $restaurant->title_content());
        $q->bindValue(':text_content', $restaurant->text_content());
        $q->bindValue(':phone', $restaurant->phone());
        $q->bindValue(':email', $restaurant->email());
        $q->bindValue(':address', $restaurant->address());
        $q->bindValue(':image_restaurants', serialize($restaurant->image_restaurants()));
        $q->bindValue(':amenities', serialize($restaurant->amenities()));
        $q->bindValue(':url_order', $restaurant->url_order());
        $q->bindValue(':url_itinary', $restaurant->url_itinary());
        $q->bindValue(':url_youtube', $restaurant->url_youtube());
        $q->bindValue(':button_title', $restaurant->button_title());
        $q->bindValue(':url_symbiose', $restaurant->url_symbiose());
        $q->bindValue(':date_publishing', $restaurant->date_publishing());
        $q->bindValue(':is_published', $restaurant->is_published());
        $q->bindValue(':lat', $restaurant->lat());
        $q->bindValue(':lng', $restaurant->lng());
        $q->bindValue(':time_monday', $restaurant->time_monday());
        $q->bindValue(':time_tuesday', $restaurant->time_tuesday());
        $q->bindValue(':time_wenesday', $restaurant->time_wenesday());
        $q->bindValue(':time_thursday', $restaurant->time_thursday());
        $q->bindValue(':time_friday', $restaurant->time_friday());
        $q->bindValue(':time_saturday', $restaurant->time_saturday());
        $q->bindValue(':time_sunday', $restaurant->time_sunday());
        
        // Execution de la requête
        $q->execute();
        
        // Renvoie le dernier ID inséré en base de données
        return $this->_db->lastInsertId();
    }
    
    // ========================================================
    // Modification d'un restaurant
    // ========================================================
    
    public function update(Restaurant $restaurant) 
    {
        // Récupération du projet à modifier
        $restaurant_old = $this->get($restaurant->id_restaurant());
        
        // Suppression des anciennes images si elles ont été modifiées
        if(!empty($restaurant_old->image_restaurants()))
        {
            foreach($restaurant_old->image_restaurants() as $image) 
            {
                if(empty($restaurant->image_restaurants()))
                {
                     unlink(realpath(__DIR__ . '/../..').'/'.$image);
                }
                else
                {
                    if(!in_array($image,$restaurant->image_restaurants()))
                    {
                        unlink(realpath(__DIR__ . '/../..').'/'.$image);
                    }
                }
            } 
        }
        
        // // Suppression des anciennes galeries si elles ont été modifiées
        // $new_galerie_images = [];
        // if(!empty($restaurant->body_galeries()))
        // {
        //     foreach($restaurant->body_galeries() as $new_galerie) 
        //     {
        //         foreach($new_galerie as $new_image) 
        //         {
        //             $new_galerie_images[] = $new_image;
        //         }
        //     }
        // }
        
        // if(!empty($restaurant_old->body_galeries()))
        // {
        //     foreach($restaurant_old->body_galeries() as $galerie)
        //     {
        //         foreach($galerie as $image)
        //         {
        //             if(empty($restaurant->body_galeries()) || !in_array($image,$new_galerie_images))
        //             {
        //                  unlink(realpath(__DIR__ . '/../..').'/'.$image);
        //             }
        //         }
        //     }
        // }
        
        // Préparation de la requête à executer pour modifier la categorie
        $q = $this->_db->prepare('UPDATE restaurants SET name = :name, title_content = :title_content, text_content = :text_content, phone = :phone, email = :email, address = :address, image_restaurants = :image_restaurants, amenities = :amenities, url_order = :url_order, url_google = :url_google, url_itinary = :url_itinary, url_youtube = :url_youtube, button_title = :button_title, url_symbiose = :url_symbiose, date_publishing = :date_publishing, is_published = :is_published, lat = :lat, lng = :lng, time_monday = :time_monday, time_tuesday = :time_tueday, time_wenesday = :time_wenesday, time_thursday = :time_thursday, time_friday = :time_friday, time_saturday = :time_saturday, time_sunday = :time_sunday  WHERE id_restaurant = :id_restaurant');
        
        // Assignation des différentes valeurs 
        $q->bindValue(':name', $restaurant->name());
        $q->bindValue(':tile_content', $restaurant->title_content());
        $q->bindValue(':text_content', $restaurant->text_content());
        $q->bindValue(':phone', $restaurant->phone());
        $q->bindValue(':email', $restaurant->email());
        $q->bindValue(':address', $restaurant->address());
        $q->bindValue(':image_restaurants', serialize($restaurant->image_restaurants()));
        $q->bindValue(':amenities', serialize($restaurant->amenities()));
        $q->bindValue(':url_order', $restaurant->url_order());
        $q->bindValue(':url_itinary', $restaurant->url_itinary());
        $q->bindValue(':url_youtube', $restaurant->url_youtube());
        $q->bindValue(':button_title', $restaurant->button_title());
        $q->bindValue(':url_symbiose', $restaurant->url_symbiose());
        $q->bindValue(':date_publishing', $restaurant->date_publishing());
        $q->bindValue(':is_published', $restaurant->is_published());
        $q->bindValue(':lat', $restaurant->lat());
        $q->bindValue(':lng', $restaurant->lng());
        $q->bindValue(':time_monday', $restaurant->time_monday());
        $q->bindValue(':time_tuesday', $restaurant->time_tuesday());
        $q->bindValue(':time_wenesday', $restaurant->time_wenesday());
        $q->bindValue(':time_thursday', $restaurant->time_thursday());
        $q->bindValue(':time_friday', $restaurant->time_friday());
        $q->bindValue(':time_saturday', $restaurant->time_saturday());
        $q->bindValue(':time_sunday', $restaurant->time_sunday());
        $q->bindValue(':id_restaurant', $restaurant->id_restaurant());
        
        // Execution de la requête.
        $q->execute();
    }
    
    // ========================================================
    // Suppression d'un restaurant
    // ========================================================
    
    public function delete($id) 
    {
        // Récupération de l'restaurant à supprimer
        $restaurant = $this->get($id);
        
        if(!empty($restaurant->image_restaurants()))
        {
            foreach($restaurant->image_restaurants() as $key => $galerie)
            {
                foreach($galerie as $image)
                {
                    unlink(realpath(__DIR__ . '/../..').'/'.$image);
                }
            }
        }
        
        // Préparation de la requête à executer pour supprimer l'restaurant
        $q = $this->_db->prepare('DELETE FROM restaurants WHERE id_restaurant = '.$id);
        
        // Execution de la requête
        $q->execute();
    }
    
    // ========================================================
    // Récupération d'un restaurant
    // ========================================================
    
    public function get($id_restaurant) 
    {
        // Préparation de la requête à executer pour obtenir les données du meta tag.
        $q = $this->_db->prepare('SELECT * FROM restaurants WHERE id_restaurant = :id_restaurant');
        
         // Assignation des valeurs
        $q->bindValue(':id_restaurant', $id_restaurant);
        
        // Execution de la requête.
        $q->execute();
        
        // Stockage des données renvoyées dans une variable
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        if(!$donnees)
        {
            return false;
        }
        
        // Retourne un objet de type restaurant
        return new Restaurant($donnees);
    }
    
    // // ========================================================
    // // Récupération d'un restaurant via le slug
    // // ========================================================
    
    // public function getBySlug($slug) 
    // {
    //     // Préparation de la requête à executer pour obtenir les données  de l'restaurant
    //     $q = $this->_db->prepare('SELECT * FROM restaurants WHERE slug = :slug');
        
    //     // Assignation des valeurs
    //     $q->bindValue(':slug', $slug);
        
    //     // Execution de la requête.
    //     $q->execute();
        
    //     // Stockage dans une variable du résultat renvoyé par la requête
    //     $donnees = $q->fetch(PDO::FETCH_ASSOC);

    //     if(!$donnees)
    //     {
    //         return false;
    //     }
        
    //     // Retourne un objet de type restaurant
    //     return new restaurant($donnees);
    // }
    
    // ========================================================
    // Lister tous les restaurants
    // ========================================================
    
    public function lists() 
    {
        // Création du tableau qui contiendra nos meta plats
        $restaurants = [];
        
        // Préparation de la requête à executer pour obtenir la liste des plats
        $q = $this->_db->prepare('SELECT * FROM restaurants ORDER BY name');
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Plat
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $restaurants[] = new Restaurant($donnees);
        }
        
        return $restaurants;
    }
    
    // ========================================================
    // Vérifier qu'un restaurant n'existe pas déjà
    // ========================================================
    
    public function exists($id) 
    {
        // Préparation de la requête pour vérifier l'existence en base de données d'une intervention
        $q = $this->_db->prepare('SELECT COUNT(*) FROM restaurants WHERE id_restaurant = :id_restaurant');
        
        // Assignation des valeurs
        $q->bindValue(':id_restaurant', $id);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un booleen (True / False)
        return (bool) $q->fetchColumn();
    }
}
?>