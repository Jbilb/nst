<?php
class Article 
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    
    private $_id_article;
    private $_id_categorie;
    private $_title;
    private $_tags;
    private $_cover_image;
    private $_date_publication;
    private $_intro_text;
    private $_body_texts;
    private $_body_titles;
    private $_body_images;
    private $_body_galeries;
    private $_body_cta;
    private $_body_links;
    private $_body_videos;
    private $_body_pdf;
    private $_body_html_element;
    private $_lectures;
    private $_auteur;
    private $_id_user;
    private $_is_active;
    private $_featured;
    private $_slug;
    
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
    
    public function id_article()
    {
        return $this->_id_article;
    }
    public function id_categorie()
    {
        return $this->_id_categorie;
    }
    public function title()
    {
        return $this->_title;
    }
    public function tags()
    {
        return $this->_tags;
    }
    public function cover_image()
    {
        return $this->_cover_image;
    }
    public function date_publication()
    {
        return $this->_date_publication;
    }
    public function intro_text()
    {
        return $this->_intro_text;
    }
    public function body_texts()
    {
        return $this->_body_texts;
    }
    public function body_titles()
    {
        return $this->_body_titles;
    }
    public function body_images()
    {
        return $this->_body_images;
    }
    public function body_galeries()
    {
        return $this->_body_galeries;
    }
    public function body_cta()
    {
        return $this->_body_cta;
    }
    public function body_links()
    {
        return $this->_body_links;
    }
    public function body_videos()
    {
        return $this->_body_videos;
    }
    public function body_pdf()
    {
        return $this->_body_pdf;
    }
    public function body_html_element()
    {
        return $this->_body_html_element;
    }
    public function lectures()
    {
        return $this->_lectures;
    }
    public function auteur()
    {
        return $this->_auteur;
    }
    public function id_user()
    {
        return $this->_id_user;
    }
    public function is_active()
    {
        return $this->_is_active;
    }
    public function featured()
    {
        return $this->_featured;
    }
    public function slug()
    {
        return $this->_slug;
    }
    
    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId_article($id_article)
    {
        $id_article = (int) $id_article;
        
        if ($id_article > 0)
        {
          $this->_id_article = $id_article;
        }
    }
    
    public function setId_categorie($id_categorie)
    {
        $id_categorie = (int) $id_categorie;
        
        if ($id_categorie > 0)
        {
          $this->_id_categorie = $id_categorie;
        }
    }
    
    public function setTitle($title)
    {
        if (is_string($title))
        {
          $this->_title = $title;
        }
    }
    
    public function setTags($tags)
    {
        if (is_array($tags))
        {
          $this->_tags = $tags;
        }
        elseif (is_string($tags))
        {
          $this->_tags = unserialize($tags);
        }
    }
    
    public function setCover_image($cover_image)
    {
        if (is_string($cover_image))
        {
          $this->_cover_image = $cover_image;
        }
    }
    
    public function setDate_publication($date_publication)
    {
        if (is_string($date_publication))
        {
            $timestamp = strtotime($date_publication);
            $date = date('d-m-Y',$timestamp);
            $this->_date_publication = $date;
        }
    }
    
    public function setIntro_text($intro_text)
    {
        if (is_string($intro_text))
        {
          $this->_intro_text = $intro_text;
        }
    }
    
    public function setBody_texts($body_texts)
    {
        if (is_array($body_texts))
        {
          $this->_body_texts = $body_texts;
        }
        elseif (is_string($body_texts))
        {
          $this->_body_texts = unserialize($body_texts);
        }
    }
    
    public function setBody_titles($body_titles)
    {
        if (is_array($body_titles))
        {
          $this->_body_titles = $body_titles;
        }
        elseif (is_string($body_titles))
        {
          $this->_body_titles = unserialize($body_titles);
        }
    }
    
    public function setBody_images($body_images)
    {
        if (is_array($body_images))
        {
          $this->_body_images = $body_images;
        }
        elseif (is_string($body_images))
        {
          $this->_body_images = unserialize($body_images);
        }
    }
    
    public function setBody_galeries($body_galeries)
    {
        if (is_array($body_galeries))
        {
          $this->_body_galeries = $body_galeries;
        }
        elseif (is_string($body_galeries))
        {
          $this->_body_galeries = unserialize($body_galeries);
        }
    }
    
    public function setBody_cta($body_cta)
    {
        if (is_array($body_cta))
        {
          $this->_body_cta = $body_cta;
        }
        elseif (is_string($body_cta))
        {
          $this->_body_cta = unserialize($body_cta);
        }
    }
    
    public function setBody_links($body_links)
    {
        if (is_array($body_links))
        {
          $this->_body_links = $body_links;
        }
        elseif (is_string($body_links))
        {
          $this->_body_links = unserialize($body_links);
        }
    }
    
    public function setBody_videos($body_videos)
    {
        if (is_array($body_videos))
        {
          $this->_body_videos = $body_videos;
        }
        elseif (is_string($body_videos))
        {
          $this->_body_videos = unserialize($body_videos);
        }
    }
    
    public function setBody_pdf($body_pdf)
    {
        if (is_array($body_pdf))
        {
          $this->_body_pdf = $body_pdf;
        }
        elseif (is_string($body_pdf))
        {
          $this->_body_pdf = unserialize($body_pdf);
        }
    }
    
    public function setBody_html_element($body_html_element)
    {
        if (is_array($body_html_element))
        {
          $this->_body_html_element = $body_html_element;
        }
        elseif (is_string($body_html_element))
        {
          $this->_body_html_element = unserialize($body_html_element);
        }
    }
    
    public function setLectures($lectures)
    {
        $lectures = (int) $lectures;
        $this->_lectures = $lectures;
    }
    
    public function setAuteur($auteur)
    {
        if (is_string($auteur))
        {
          $this->_auteur = $auteur;
        }
    }
    
    public function setId_user($id_user)
    {
        $id_user = (int) $id_user;
        
        if ($id_user > 0)
        {
          $this->_id_user = $id_user;
        }
    }
    
    public function setIs_active($is_active)
    {
        $is_active = (int) $is_active;
        if ($is_active == 0 || $is_active == 1)
        {
          $this->_is_active = $is_active;
        }
    }
    
    public function setFeatured($featured)
    {
        $featured = (int) $featured;
        if ($featured == 0 || $featured == 1)
        {
          $this->_featured = $featured;
        }
    }
    
    public function setSlug($slug)
    {
        if (is_string($slug))
        {
          $this->_slug = $slug;
        }
    }
    
    public function create_body()
    {
        $page_body = [];
        
        if(!empty($this->_body_titles))
        {
            foreach($this->_body_titles as $key => $value)
            {
                $page_body[$key]['body_titles'] = $value;
            }
        }
        
        if(!empty($this->_body_texts))
        {
            foreach($this->_body_texts as $key => $value)
            {
                $page_body[$key]['body_texts'] = $value;
            }
        }
        
        if(!empty($this->_body_images))
        {
            foreach($this->_body_images as $key => $value)
            {
                $page_body[$key]['body_images'] = $value;
            }
        }
        
        if(!empty($this->_body_links))
        {
            foreach($this->_body_links as $key => $value)
            {
                $page_body[$key]['body_links'] = $value;
            }
        }
        
        if(!empty($this->_body_cta))
        {
            foreach($this->_body_cta as $key => $value)
            {
                $page_body[$key]['body_cta'] = $value;
            }
        }
        
        if(!empty($this->_body_galeries))
        {
            foreach($this->_body_galeries as $key => $value)
            {
                $page_body[$key]['body_galeries'] = $value;
            }
        }
        
        if(!empty($this->_body_videos))
        {
            foreach($this->_body_videos as $key => $value)
            {
                $page_body[$key]['body_videos'] = $value;
            }
        }
        
        if(!empty($this->_body_pdf))
        {
            foreach($this->_body_pdf as $key => $value)
            {
                $page_body[$key]['body_pdf'] = $value;
            }
        }
        
        if(!empty($this->_body_html_element))
        {
            foreach($this->_body_html_element as $key => $value)
            {
                $page_body[$key]['body_html_element'] = $value;
            }
        }
        
        return $page_body;
    }
}
?>