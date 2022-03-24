<?php
class Restaurant 
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    
    private $_id_restaurant;
    private $_name;
    private $_title_content;
    private $_text_content;
    private $_phone;
    private $_email;
    private $_address;
    private $_image_restaurants;
    private $_amenities;
    private $_url_order;
    private $_url_google;
    private $_url_itinary;
    private $_url_youtube;
    private $_button_title;
    private $_url_symbiose;
    private $_date_publishing;
    private $_is_published;
    private $_lat;
    private $_lng;
    private $_time_monday;
    private $_time_tuesday;
    private $_time_wenesday;
    private $_time_thursday;
    private $_time_friday;
    private $_time_saturday;
    private $_time_sunday;

    
    // ========================================================
    // Création du constructeur
    // ========================================================
    
    public function __construct(array $donnees) 
    {
        $this->hydrate($donnees);
    }
    
    // ========================================================
    // Création de la fonction d'hydratation de la classe
    // ========================================================
    
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    
    // ========================================================
    // Getters : récupèrent les valeurs des attributs de l'élément
    // ========================================================
    
    public function id_restaurant()
    {
        return $this->_id_restaurant;
    }
    public function name()
    {
        return $this->_name;
    }
    public function title_content()
    {
        return $this->_title_content;
    }
    public function text_content()
    {
        return $this->_text_content;
    }
    public function phone()
    {
        return $this->_phone;
    }
    public function email()
    {
        return $this->_email;
    }
    public function address()
    {
        return $this->_address;
    }
    public function image_restaurants()
    {
        return $this->_image_restaurants;
    }
    public function amenities()
    {
        return $this->_amenities;
    }
    public function url_order()
    {
        return $this->_url_order;
    }
    public function url_google()
    {
        return $this->_url_google;
    }
    public function url_itinary()
    {
        return $this->_url_itinary;
    }
    public function url_youtube()
    {
        return $this->_url_youtube;
    }
    public function button_title()
    {
        return $this->_button_title;
    }
    public function url_symbiose()
    {
        return $this->_url_symbiose;
    }
    public function date_publishing()
    {
        return $this->_date_publishing;
    }
    public function is_published()
    {
        return $this->_is_published;
    }
    public function lat()
    {
        return $this->_lat;
    }
    public function lng()
    {
        return $this->_lng;
    }
    public function time_monday()
    {
        return $this->_time_monday;
    }
    public function time_tuesday()
    {
        return $this->_time_tuesday;
    }
    public function time_wenesday()
    {
        return $this->_time_wenesday;
    }
    public function time_thursday()
    {
        return $this->_time_thursday;
    }

    public function time_friday()
    {
        return $this->_time_friday;
    }
    public function time_saturday()
    {
        return $this->_time_saturday;
    }
    public function time_sunday()
    {
        return $this->_time_sunday;
    }
    
    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId_restaurant($id_restaurant)
    {
        $id_restaurant = (int) $id_restaurant;
        
        if ($id_restaurant > 0)
        {
          $this->_id_restaurant = $id_restaurant;
        }
    }
    
    public function setName($name)
    {
        if (is_string($name))
        {
          $this->_name = $name;
        }
    }

    public function setTitle_content($title_content)
    {
        if (is_string($title_content))
        {
          $this->_title_content = $title_content;
        }
    }

    public function setText_content($text_content)
    {
        if (is_string($text_content))
        {
          $this->_text_content = $text_content;
        }
    }

    public function setPhone($phone)
    {
        if (is_string($phone))
        {
          $this->_phone = $phone;
        }
    }

    public function setEmail($email)
    {
        if (is_string($email))
        {
          $this->_email = $email;
        }
    }

    public function setAddress($address)
    {
        if (is_string($address))
        {
          $this->_address = $address;
        }
    }
    
    public function setImage_restaurants($image_restaurants)
    {
        if (is_array($image_restaurants))
        {
          $this->_image_restaurants = $image_restaurants;
        }
        elseif (is_string($image_restaurants))
        {
          $this->_image_restaurants = unserialize($image_restaurants);
        }
    } 

    public function setAmenities($amenities)
    {
        if (is_array($amenities))
        {
          $this->_amenities = $amenities;
        }
        elseif (is_string($amenities))
        {
          $this->_amenities = unserialize($amenities);
        }
    } 

    public function setUrl_order($url_order)
    {
        if (is_string($url_order))
        {
          $this->_url_order = $url_order;
        }
    }

    public function setUrl_goole($url_google)
    {
        if (is_string($url_google))
        {
          $this->_url_google = $url_google;
        }
    }

    public function setUrl_itinary($url_itinary)
    {
        if (is_string($url_itinary))
        {
          $this->_url_itinary = $url_itinary;
        }
    }

    public function setUrl_youtube($url_youtube)
    {
        if (is_string($url_youtube))
        {
          $this->_url_youtube = $url_youtube;
        }
    }

    public function setButton_title($button_title)
    {
        if (is_string($button_title))
        {
          $this->_button_title = $button_title;
        }
    }

    public function setUrl_symbiose($url_symbiose)
    {
        if (is_string($url_symbiose))
        {
          $this->_url_symbiose = $url_symbiose;
        }
    }

    public function setDate_publishing($date_publishing)
    {
        if (is_string($date_publishing))
        {
            $timestamp = strtotime($date_publishing);
            $date = date('d-m-Y',$timestamp);
            $this->_date_publishing = $date;
        }
    }

    public function setIs_published($is_published)
    {
        $is_published = (int) $is_published;
        if ($is_published == 0 || $is_published == 1)
        {
          $this->_is_published = $is_published;
        }
    }

    public function setlat($lat)
    {
        $lat = (float) $lat;
        
        if ($lat > 0)
        {
          $this->_lat = $lat;
        }
    }

    public function setLng($lng)
    {
        $lng = (float) $lng;
        
        if ($lng > 0)
        {
          $this->_lng = $lng;
        }
    }

    public function setTime_monday($time_monday)
    {
        if (is_string($time_monday))
        {
          $this->_time_monday = $time_monday;
        }
    }

    public function setTime_tuesday($time_tuesday)
    {
        if (is_string($time_tuesday))
        {
          $this->_time_tuesday = $time_tuesday;
        }
    }

    public function setTime_wenesday($time_wenesday)
    {
        if (is_string($time_wenesday))
        {
          $this->_time_wenesday = $time_wenesday;
        }
    }

    public function setThursday($time_thursday)
    {
        if (is_string($time_thursday))
        {
          $this->_time_thursday = $time_thursday;
        }
    }

    public function setTime_friday($time_friday)
    {
        if (is_string($time_friday))
        {
          $this->_time_friday = $time_friday;
        }
    }

    public function setTime_saturday($time_saturday)
    {
        if (is_string($time_saturday))
        {
          $this->_time_saturday = $time_saturday;
        }
    }

    public function setTime_sunday($time_sunday)
    {
        if (is_string($time_sunday))
        {
          $this->_time_sunday = $time_sunday;
        }
    }
}
?>