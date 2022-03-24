<?php
class Offer 
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    
    private $_id_offer;
    private $_title;
    private $_title_vignette;
    private $_description;
    private $_date_start;
    private $_date_end;
    private $_image_vignette;
    private $_image_photo;
    private $_image_desktop;
    private $_image_mobile;
    private $_text_button;
    private $_url_button;
    private $_is_published;
    private $_is_featured;
    
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
    
    public function id_offer()
    {
        return $this->_id_offer;
    }
    public function title()
    {
        return $this->_title;
    }
    public function title_vignette()
    {
        return $this->_title_vignette;
    }
    public function description()
    {
        return $this->_description;
    }
    public function date_start()
    {
        return $this->_date_start;
    }
    public function date_end()
    {
        return $this->_date_end;
    }
    public function image_vignette()
    {
        return $this->_image_vignette;
    }
    public function image_photo()
    {
        return $this->_image_photo;
    }
    public function image_desktop()
    {
        return $this->_image_desktop;
    }
    public function image_mobile()
    {
        return $this->_image_mobile;
    }
    public function text_button()
    {
        return $this->_text_button;
    }
    public function url_button()
    {
        return $this->_url_button;
    }
    public function is_published()
    {
        return $this->_is_published;
    }
    public function is_featured()
    {
        return $this->_is_featured;
    }
    

    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId_offer($id_offer)
    {
        $id_offer = (int) $id_offer;
        
        if ($id_offer > 0)
        {
          $this->_id_offer = $id_offer;
        }
    }
    
    public function setTitle($title)
    {
        if (is_string($title))
        {
          $this->_title = $title;
        }
    }

    public function setTitleVignette($title_vignette)
    {
        if (is_string($title_vignette))
        {
          $this->_title_vignette = $title_vignette;
        }
    }

    public function setDescription($description)
    {
        if (is_string($description))
        {
          $this->_description = $description;
        }
    }

    public function setDate_start($date_start)
    {
        if (is_string($date_start))
        {
            $timestamp = strtotime($date_start);
            $date = date('d-m-Y',$timestamp);
            $this->_date_start = $date;
        }
    }

    public function setDate_end($date_end)
    {
        if (is_string($date_end))
        {
            $timestamp = strtotime($date_end);
            $date = date('d-m-Y',$timestamp);
            $this->_date_end = $date;
        }
    }

    public function setImage_vignette($image_vignette)
    {
        if (is_string($image_vignette))
        {
          $this->_image_vignette = $image_vignette;
        }
    }

    public function setImage_photo($image_photo)
    {
        if (is_string($image_photo))
        {
          $this->_image_photo = $image_photo;
        }
    }

    public function setImage_desktop($image_desktop)
    {
        if (is_string($image_desktop))
        {
          $this->_image_desktop = $image_desktop;
        }
    }

    public function setImage_mobile($image_mobile)
    {
        if (is_string($image_mobile))
        {
          $this->_image_mobile = $image_mobile;
        }
    }

    public function setText_button($text_button)
    {
        if (is_string($text_button))
        {
          $this->_text_button = $text_button;
        }
    }

    public function setUrlButton($url_button)
    {
        if (is_string($url_button))
        {
          $this->_url_button = $url_button;
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

    public function setIs_featured($is_featured)
    {
        $is_featured = (int) $is_featured;
        if ($is_featured == 0 || $is_featured == 1)
        {
          $this->_is_featured = $is_featured;
        }
    }
}
?>