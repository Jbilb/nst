<?php
class Site
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    
    private $_id;
    private $_name;
    private $_email;
    private $_domain;
    private $_url;
    private $_url_admin;
    private $_srcimg;
    private $_colorimg;
    
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
    
    public function id()
    {
        return $this->_id;
    }
    public function name()
    {
        return $this->_name;
    }
    public function email()
    {
        return $this->_email;
    }
    public function domain()
    {
        return $this->_domain;
    }
    public function url()
    {
        return $this->_url;
    }
    public function url_admin()
    {
        return $this->_url_admin;
    }
    public function srcimg()
    {
        return $this->_srcimg;
    }
    public function colorimg()
    {
        return $this->_colorimg;
    }
    
    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId($id)
    {
        $id = (int) $id;
        
        if ($id > 0)
        {
          $this->_id = $id;
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
        if (is_string($email))
        {
          $this->_email = $email;
        }
    }
    public function setDomain($domain)
    {
        if (is_string($domain))
        {
          $this->_domain = $domain;
        }
    }
    public function setUrl($url)
    {
        if (is_string($url))
        {
          $this->_url = $url;
        }
    }
    public function setUrl_admin($url_admin)
    {
        if (is_string($url_admin))
        {
          $this->_url_admin = $url_admin;
        }
    }
    public function setSrcimg($srcimg)
    {
        if (is_string($srcimg))
        {
          $this->_srcimg = $srcimg;
        }
    }
    public function setColorimg($colorimg)
    {
        if (is_string($colorimg))
        {
          $this->_colorimg = $colorimg;
        }
    }
}
?>