<?php
class Commentaire 
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    private $_id_commentaire;
    private $_name;
    private $_email;
    private $_date_publication;
    private $_content;
    private $_id_article;
    private $_is_active;
    
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
    
    public function id_commentaire()
    {
        return $this->_id_commentaire;
    }
    public function name()
    {
        return $this->_name;
    }
    public function email()
    {
        return $this->_email;
    }
    public function date_publication()
    {
        return $this->_date_publication;
    }
    public function content()
    {
        return $this->_content;
    }
    public function id_article()
    {
        return $this->_id_article;
    }
    public function is_active()
    {
        return $this->_is_active;
    }
    
    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId_commentaire($id)
    {
        $id = (int) $id;
        
        if ($id > 0)
        {
          $this->_id_commentaire = $id;
        }
    }
    public function setName($name)
    {
        if (is_string($name))
        {
          $this->_name = $name;
        }
    }
    public function setEmail($email)
    {
        if (filter_var($email, FILTER_SANITIZE_EMAIL))
        {
          $this->_email = $email;
        }
    }
    public function setDate_publication($date_publication)
    {
        if (is_string($date_publication))
        {
          $this->_date_publication = $date_publication;
        }
    }
    public function setContent($content)
    {
        if (is_string($content))
        {
          $this->_content = $content;
        }
    }
    
    public function setId_article($id)
    {
        $id = (int) $id;
        
        if ($id > 0)
        {
          $this->_id_article = $id;
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
}
?>