<?php
class Plat
{
    // ========================================================
    // Définition des attributs de base
    // ========================================================
    
    private $_id_plat;
    private $_title;
    private $_descriptif;
    private $_price;
    
    
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
    
    public function id_plat()
    {
        return $this->_id_plat;
    }
    public function title()
    {
        return $this->_title;
    }
    public function descriptif()
    {
        return $this->_descriptif;
    }
    public function price()
    {
        return $this->_price;
    }
    
    // ========================================================
    // Setters : mettent à jour les valeurs des attributs de l'élément
    // ========================================================
    
    public function setId_plat($id_plat)
    {
        $id_plat = (int) $id_plat;
        
        if ($id_plat > 0)
        {
          $this->_id_plat = $id_plat;
        }
    }
    public function setTitle($title)
    {
        if (is_string($title))
        {
          $this->_title = $title;
        }
    }
    public function setDescriptif($descriptif)
    {
        if (is_string($descriptif))
        {
          $this->_descriptif = $descriptif;
        }
    }
    public function setPrice($price)
    {
        if (is_string($price))
        {
          $this->_price = $price;
        }
    }
}
?>